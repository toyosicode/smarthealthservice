<?php
use FastRoute\RouteCollector;
use Helpers\Func;

// Define your routes
$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $r) {
    // Public Routes
    $r->addRoute('GET', '/', 'Controllers\\PublicHomeController@index');

    // Admin Routes - Auth
    $r->addRoute('GET', '/admin/login', 'Controllers\\AdminAuthController@login');
    $r->addRoute('POST', '/admin/login', 'Controllers\\AdminAuthController@do_login');
    $r->addRoute('GET', '/admin/logout', 'Controllers\\AdminAuthController@logout');

    // Admin Routes - Dashboard
    $r->addRoute('GET', '/admin', 'Controllers\\AdminHomeController@index');
    $r->addRoute('GET', '/admin/', 'Controllers\\AdminHomeController@index');

    $r->addRoute('GET', '/admin/new-facility', 'Controllers\\AdminHomeController@new_facility');
    $r->addRoute('POST', '/admin/new-facility', 'Controllers\\AdminHomeController@save_new_facility');
    $r->addRoute('GET', '/admin/manage-facility', 'Controllers\\AdminHomeController@manage_facility');

    $r->addRoute('GET', '/admin/new-admin', 'Controllers\\AdminHomeController@new_admin');
    $r->addRoute('POST', '/admin/new-admin', 'Controllers\\AdminHomeController@do_new_admin');

    $r->addRoute('GET', '/admin/manage-admins', 'Controllers\\AdminHomeController@manage_admins');
    $r->addRoute('GET', '/admin/modify-admins/{admin_ref}', 'Controllers\\AdminHomeController@modify_admins');
    $r->addRoute('POST', '/admin/modify-admins/{admin_ref}', 'Controllers\\AdminHomeController@do_modify_admins');
    $r->addRoute('POST', '/admin/modify-admin-privilege/{admin_ref}', 'Controllers\\AdminHomeController@do_modify_admin_privilege');
    $r->addRoute('GET', '/admin/register-patient', 'Controllers\\AdminHomeController@register_patient');
    $r->addRoute('POST', '/admin/register-patient', 'Controllers\\AdminHomeController@do_register_patient');
    $r->addRoute('GET', '/admin/register-patient/manual', 'Controllers\\AdminHomeController@register_patient_manual');
    $r->addRoute('POST', '/admin/register-patient/manual', 'Controllers\\AdminHomeController@do_register_patient_manual');

    $r->addRoute('GET', '/admin/manage-patient', 'Controllers\\AdminHomeController@manage_patient');
    $r->addRoute('GET', '/admin/new-session', 'Controllers\\AdminHomeController@new_session');
    $r->addRoute('POST', '/admin/new-session', 'Controllers\\AdminHomeController@do_new_session');
    $r->addRoute('GET', '/admin/manage-session', 'Controllers\\AdminHomeController@manage_session');
    $r->addRoute('GET', '/admin/new-session/{patient_ref}', 'Controllers\\AdminHomeController@new_session_form');
    $r->addRoute('POST', '/admin/new-session/{patient_ref}', 'Controllers\\AdminHomeController@log_new_session');


    $r->addRoute('GET', '/admin/patient-profile/{patient_ref}', 'Controllers\\AdminHomeController@patient_profile');

});

// Fetch method and URI from the environment
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Dispatch the request
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

// Handle the result
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        Func::redirect_to('./');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
//        Func::sendJsonResponse([], false, 'Method not allowed', 405);
        Func::redirect_to('./');
        break;
    case FastRoute\Dispatcher::FOUND:
        list($controller, $action) = explode('@', $routeInfo[1]);
        $vars = $routeInfo[2];
        $controllerInstance = new $controller();
        $controllerInstance->$action($vars);
        break;
}