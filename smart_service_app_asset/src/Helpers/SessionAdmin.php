<?php
namespace Helpers;

use Models\AdminPrivilege;

class SessionAdmin {
    private $logged_in = false;
    public $admin_code;

    function __construct() {
        ob_start();
        $sess_name = session_name();
        if ($sess_name != "smart_service_admin") {
            session_name("smart_service_admin");
        }
        session_start();
        $this->check_login();
        if($this->logged_in) {
            // actions to take right away if user is logged in
        } else {
            // actions to take right away if user is not logged in
        }
    }

    public function is_logged_in() {
        return $this->logged_in;
    }

    public function login($user) {
        if($user) {
            $this->admin_code = $_SESSION['admin_code'] = $user->staff_id;
            $_SESSION['admin_first_name'] = $user->first_name;
            $_SESSION['admin_last_name'] = $user->last_name;
            $_SESSION['admin_full_name'] = $user->last_name . " " . $user->first_name;
            $_SESSION['admin_email'] = $user->email_address;
            $_SESSION['admin_time'] = time();
            $_SESSION['admin_privilege'] = AdminPrivilege::where('admin_code', $_SESSION['admin_code'])->get()[0]->allowed_pages;
            $_SESSION['admin_id'] = $user->id;

            $this->logged_in = true;
        }
    }

    public function logout() {
        unset($_SESSION['admin_first_name']);
        unset($_SESSION['admin_last_name']);
        unset($_SESSION['admin_full_name']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['admin_time']);
        unset($_SESSION['admin_privilege']);

        unset($this->admin_code);
        session_unset();
        session_destroy();
        $this->logged_in = false;
    }

    private function auto_logout() {
        // Set time allowed to be inactive in seconds. 60min x 60 = 3600
        $inactive = 3600;
        $t = time();
        if (isset($_SESSION['admin_time'])) {
            $to = $_SESSION['admin_time'];
            $diff = $t - $to;
            if ($diff > $inactive) {
                return true;
            } else {
                $_SESSION['admin_time'] = time();
                return false;
            }

        } else {
            return false;
        }
    }

    private function check_login() {
        if ($this->auto_logout()) {
            $this->logout();
            Func::redirect_to(Func::host(). "/admin/login");
        } elseif(isset($_SESSION['admin_code'])) {
            $this->admin_code = $_SESSION['admin_code'];
            $this->logged_in = true;
        } else {
            unset($this->admin_code);
            $this->logged_in = false;
        }
    }
}