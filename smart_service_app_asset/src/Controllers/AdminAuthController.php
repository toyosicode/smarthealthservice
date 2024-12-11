<?php
namespace Controllers;

use Helpers\Func;
use Models\Admin;

class AdminAuthController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if($this->session_admin->is_logged_in()) {
            Func::redirect_to(Func::host() . "/admin/");
        }

        $this->loadView('admin/login', []);
    }

    public function do_login()
    {
        foreach($_REQUEST as $key => $value) {
            if(gettype($value) == "string") { $value = trim($value); }
            // Sanitize here
        }

        extract($_REQUEST);

        if(Admin::where('email_address', $username)->exists()) {

            $admin_info = Admin::where('email_address', $username)->first();

            if(password_verify($password, $admin_info->my_password)) {
                // login user, password match, set session
                $this->session_admin->login($admin_info);
                Func::redirect_to("./");
            } else {
                // deny user, password do not match
                // user does not email
                Func::putFlash("danger", "Username and password combination do not match. Please try again.");
                Func::redirect_back();
            }

        } else {
            // user does not email
            Func::putFlash("danger", "Username and password combination do not match. Please try again.");
            Func::redirect_back();
        }
    }

    public function logout()
    {
        $this->session_admin->logout();
        Func::redirect_to("login");
    }
}