<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//=======>Admin Payment<=================
$route['admin/profile/edit_profile/(:any)']='profile/edit_profile/$1';
$route['admin/profile']='profile/profile';
//=======>Admin Payment<=================
$route['admin/payment/edit/(:any)']='payment/edit/$1';
$route['admin/payment/view_all_payment']='payment/view_all_payment';
$route['admin/payment/add_payment']='payment/add_payment';
//=======>Admin vendor<=================
$route['admin/project/edit/(:any)']='project/edit/$1';
$route['admin/project/view_all_project']='project/view_all_project';
$route['admin/project/add_project']='project/add_project';
//=======>Admin vendor<=================
$route['admin/vendor/edit/(:any)']='vendor/edit/$1';
$route['admin/view_all_vendor']='vendor/view_all_vendor';
$route['admin/add_vendor']='vendor/add_vendor';
//=======>Admin Login And Logout<=================
$route['logout']='admin_controller/logout';
$route['admin/login']='admin_controller/login';
$route['admin']='admin_controller/index';
//=======>Frontend<=================
$route['default_controller'] = 'frontend_controller/index';
$route['insert'] = 'frontend_controller/insert_value';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
