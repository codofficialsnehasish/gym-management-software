<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'authentication';
$route['404_override'] = 'Notfound_404/index';
$route['translate_uri_dashes'] = TRUE;

$route['login'] = 'authentication/index';
$route['recover-password'] = 'authentication/recoverpassword';

$route['auth-process'] = 'authentication/ajax_login_process';

$route['asign-role'] = 'role-permission/asign_role';

$route['get-state-list']='dashboard/get_state_list';
$route['get-city-list']='dashboard/get_city_list';
$route['get-package']='members/get_package';
$route['get-all-package']='members/get_all_package';
$route['get-continue-charge']='members/get_continue_charge';

$route['gym-c-info']='Gym_c_info/index';
$route['gym-c-info/add-new']='Gym_c_info/add_new';
$route['gym-c-info/process']='Gym_c_info/process';
$route['gym-c-info/edit/(:num)']='Gym_c_info/edit';
$route['gym-c-info/update-process/(:num)']='Gym_c_info/update_process';
$route['gym-c-info/delete']='Gym_c_info/delete';
$route['gym-c-info/assign-member-in-class/(:num)']='Gym_c_info/assign_member_in_class';

$route['gym-c-info/process-assign/']='Gym_c_info/process_assign';

$route['member-category/'] = 'Member_Category/index';

$route['continue-charge'] = 'Continue_Charge/index';
$route['continue-charge/add-new'] = 'Continue_Charge/add_new';
$route['continue-charge/process'] = 'Continue_Charge/process';
$route['continue-charge/edit/(:num)'] = 'Continue_Charge/edit';
$route['continue-charge/update-process/(:num)'] = 'Continue_Charge/update_process';
$route['continue-charge/delete'] = 'Continue_Charge/delete';

$route['report/expire-report'] = 'report/Expire_Report/index';
$route['report/expire-report/generate-expiry-report'] = 'report/Expire_Report/generate_expiry_report';