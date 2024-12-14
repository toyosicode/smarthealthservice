<?php
namespace Controllers;

use Helpers\Dojah;
use Helpers\Func;
use Helpers\Mailer;
use Models\Admin;
use Models\AdminPrivilege;
use Models\Department;
use Models\Facility;
use Models\Patient;
use Models\PatientSession;

class AdminHomeController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->check_login();

        $view_data = [
            'total_facility' => Facility::count(),
            'total_workers' => Admin::count(),
            'total_patients' => Patient::count(),
            'latest_sessions' => PatientSession::orderBy('created_at', 'desc')->take(5)->get()
        ];

        $this->loadView('admin/index', $view_data);
    }

    public function new_facility()
    {
        $this->check_login();

        $view_data = [];

        $this->loadView('admin/new-facility', $view_data);
    }

    public function save_new_facility()
    {
        $this->check_login();

        foreach ($_REQUEST as $key => &$value) {
            Func::sanitizeInput($value);
        }

        extract($_REQUEST);

        // Map the NIN info to the Patient model fields
        $add_new_facility = Facility::insert([
            'name' => $facility_name,
            'address' => $facility_address,
            'phone_number' => $facility_phone,
            'director_name' => $director_name,
            'director_phone' => $director_phone,
            'director_email' => $director_email
        ]);

        if($add_new_facility) {
            Func::putFlash("success", "Facility registered successfully.");
            Func::redirect_back();
        } else {
            Func::putFlash("error", "An error occurred, the facility was not registered.");
            Func::redirect_back();
        }
    }

    public function manage_facility()
    {
        $this->check_login();

        $this->manage_items(Facility::class, 'admin/manage-facility');
    }

    public function new_admin()
    {
        $this->check_login();

        $view_data = [
            'departments' => Department::get()
        ];

        $this->loadView('admin/new-admin', $view_data);
    }

    public function manage_admins()
    {
        $this->check_login();

        $this->manage_items(Admin::class, 'admin/manage-admins');
    }

    public function register_patient()
    {
        $this->check_login();

        $view_data = [];

        $this->loadView('admin/register-patient', $view_data);
    }

    public function register_patient_manual()
    {
        $this->check_login();

        $view_data = [];

        $this->loadView('admin/register-patient-manual', $view_data);
    }

    public function do_register_patient_manual()
    {
        $this->check_login();

        // Extract form input data
        extract($_POST);

        // Map the NIN info to the Patient model fields
        $add_new_patient = Patient::insert([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'dob' => $dob,
            'phone_number' => $phone_number,
            'email' => $email_address,
        ]);

        if($add_new_patient) {
            Func::putFlash("success", "Patient registered successfully.");
            Func::redirect_back();
        } else {
            Func::putFlash("error", "An error occurred, the patient was not registered.");
            Func::redirect_back();
        }
    }

    public function do_register_patient()
    {
        $this->check_login();

        extract($_POST);

        $nin_info = Dojah::nin_lookup($nin_number);

        if(Patient::where('nin', $nin_number)->doesntExist()) {
            // Check if NIN info is valid
            if (isset($nin_info['entity'])) {

                // Map the NIN info to the Patient model fields
                $add_new_patient = Patient::insert([
                    'nin' => $nin_number,
                    'first_name' => $nin_info['entity']['first_name'],
                    'last_name' => $nin_info['entity']['last_name'],
                    'dob' => $nin_info['entity']['date_of_birth'],
                    'gender' => $nin_info['entity']['gender'],
                    'phone_number' => $nin_info['entity']['phone_number'],
                    'email' => $nin_info['entity']['email'],
                ]);

                if($add_new_patient) {
                    Func::putFlash("success", "Patient registered successfully.");
                    Func::redirect_back();
                } else {
                    Func::putFlash("error", "An error occurred, the patient was not registered.");
                    Func::redirect_back();
                }

            } else {
                Func::putFlash("error", "Invalid NIN provided.");
                Func::redirect_back();
            }
        } else {
            Func::putFlash("error", "The nin provided already exist. Patient registered before.");
            Func::redirect_back();
        }
    }

    public function manage_patient()
    {
        $this->check_login();

        $this->manage_items(Patient::class, 'admin/manage-patient');
    }

    public function new_session()
    {
        $this->check_login();

        $view_data = [];

        $this->loadView('admin/new-session', $view_data);
    }

    public function do_new_session()
    {
        $this->check_login();

        foreach ($_REQUEST as $key => &$value) {
            Func::sanitizeInput($value);
        }

        extract($_REQUEST);

        $query_result = Patient::where('nin', 'like', $search_query)
            ->orWhere('first_name', 'like', $search_query)
            ->orWhere('last_name', 'like', $search_query)
            ->orWhere('email', 'like', $search_query)
            ->orWhere('phone_number', 'like', $search_query)
            ->get();

        $query_result = [
            'query_result' => $query_result,
            'total' => $query_result->count(),
        ];

        $this->loadView('admin/new-session', $query_result);
    }

    public function manage_session()
    {
        $this->check_login();

        $this->manage_items(PatientSession::class, 'admin/manage-session');
    }

    public function new_session_form($param)
    {
        $this->check_login();

        $view_data = [];

        $patient_id = Func::dec_enc('decrypt', $param['patient_ref']);

        if(Patient::where('patient_id', $patient_id)->exists()) {

            $view_data = [
                'patient_details' => Patient::where('patient_id', $patient_id)->first()
            ];

            $this->loadView('admin/new-session-form', $view_data);
        } else {
            Func::putFlash("error", "An error occurred, please try again.");
            Func::redirect_back();
        }

    }

    public function log_new_session($param)
    {
        $this->check_login();

        foreach ($_REQUEST as $key => &$value) {
            Func::sanitizeInput($value);
        }

        extract($_REQUEST);

        $patient_id = Func::dec_enc('decrypt', $param['patient_ref']);

        if(Patient::where('patient_id', $patient_id)->exists()) {

            $add_new_session = PatientSession::insert([
                'patient_id' => $patient_id,
                'facility_id' => Patient::where('patient_id', $patient_id)->first()->facility->facility_id,
                'vitals_taken' => $patient_vitals
            ]);

            if($add_new_session) {
                Func::putFlash("success", "The session has been created.");
                Func::redirect_to(Func::host() . '/admin/manage-session');
            } else {
                Func::putFlash("error", "An error occurred, the session was not created.");
                Func::redirect_to(Func::host() . '/admin/new-session');
            }

        } else {
            Func::putFlash("error", "An error occurred, please try again.");
            Func::redirect_back();
        }

    }

    public function patient_profile($param)
    {
        $this->check_login();

        if(!isset($param['patient_ref'])) {
            Func::redirect_to(Func::host(). '/admin/');
        }

        $patient_id = Func::dec_enc('decrypt', $param['patient_ref']);

        $view_data = [
            'patient_details' => Patient::where('patient_id', $patient_id)->first(),
            'patient_session' => PatientSession::where('patient_id', $patient_id)->get()
        ];

        $this->loadView( 'admin/patient-profile', $view_data );
    }

    public function do_new_admin()
    {
        $this->check_login();

        extract($_POST);

        if(Admin::where('email_address', $email_address)->doesntExist()) {
            $pass = Func::rand_string(7);
            $password_hash = password_hash($pass, PASSWORD_DEFAULT);

            $inserted_id = Admin::insertGetId([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email_address' => $email_address,
                'phone_number' => $phone_number,
                'my_password' => $password_hash,
                'department_id' => $department,
            ]);

            AdminPrivilege::insert([
                'admin_code' => $inserted_id,
            ]);

            $subject = "Smart Health Service Admin Login";
            $body = <<<MAIL
            <p>Hi $first_name,</p>
            
            <p>A new Smart Health Service Admin profile has been created for you.</p>
            
            <p>Your system generated password is $pass</p>
            <p>Your username is $email_address</p>
                            
            <p><a href="https://smarthealthservice.com.ng/admin">Login Here</a></p>
                            
            <br /><br />
            <p>www.smarthealthservice.com.ng</p>
MAIL;

            Mailer::send_email($subject, $body, $email_address, $first_name);

            Func::putFlash("success", "You have created the profile, login details sent to the Admin.");
            Func::redirect_back();
        } else {
            Func::putFlash("error", "The email address already registered as an admin.");
            Func::redirect_back();
        }

    }

    public function modify_admins($param)
    {
        $this->check_login();

        if(!isset($param['admin_ref'])) {
            Func::redirect_to(Func::host(). '/admin/');
        }

        $admin_id = Func::dec_enc('decrypt', $param['admin_ref']);

        if(Admin::where('staff_id', $admin_id)->exists()) {
            $admin_ref = Func::dec_enc('decrypt', $param['admin_ref']);

            $allowed_pages = AdminPrivilege::where('admin_code', $admin_ref)->get()[0]->allowed_pages;

            if($allowed_pages) {
                $admin_privileges = explode(',', $allowed_pages);
            } else {
                $admin_privileges = [];
            }

            $view_data = [
                'admin_details' => Admin::where('staff_id', $admin_ref)->first(),
                'departments' => Department::get(),
                'admin_privileges' => $admin_privileges
            ];

            $this->loadView( 'admin/modify-admins', $view_data );
        } else {
            Func::putFlash("error", "An error occurred, please try again.");
            Func::redirect_back();
        }

    }

    public function do_modify_admins($param)
    {
        $this->check_login();

        if(!isset($param['admin_ref'])) {
            Func::redirect_to(Func::host(). '/admin/');
        }

        $admin_id = Func::dec_enc('decrypt', $param['admin_ref']);

        if(Admin::where('staff_id', $admin_id)->exists()) {

            extract($_POST);

            $update_admin = Admin::where('staff_id', $admin_id)->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email_address' => $email_address,
                'phone_number' => $phone_number,
                'department_id' => $department,
            ]);

            if($update_admin) {
                Func::putFlash("success", "Update is successful.");
                Func::redirect_back();
            } else {
                Func::putFlash("error", "An error occurred, please try again.");
                Func::redirect_back();
            }

        } else {
            Func::putFlash("error", "An error occurred, please try again.");
            Func::redirect_back();
        }
    }

    public function do_modify_admin_privilege($param)
    {
        $this->check_login();

        if(!isset($param['admin_ref'])) {
            Func::redirect_to(Func::host(). '/admin/');
        }

        $admin_id = Func::dec_enc('decrypt', $param['admin_ref']);

        if(AdminPrivilege::where('admin_code', $admin_id)->exists()) {

            extract($_POST);

            $update_admin = AdminPrivilege::where('admin_code', $admin_id)->update([
                'allowed_pages' => implode(',', $page)
            ]);

            if($update_admin) {
                Func::putFlash("success", "You have successfully updated the privileges.");
                Func::redirect_back();
            } else {
                Func::putFlash("danger", "The information was not saved. Please try again.");
                Func::redirect_back();
            }
        }

    }

}