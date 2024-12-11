<?php
namespace Controllers;

use Helpers\Func;

class PublicHomeController extends PublicBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Func::redirect_to(Func::host() . '/admin/login');
    }
}