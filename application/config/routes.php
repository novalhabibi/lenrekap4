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
|	https://codeigniter.com/user_guide/general/routing.html
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
// $route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'FrontendController';
$route['profile']='FrontendController/profile';

// Admin Platform
$route['admin']= "AdminController";
$route['admin/login']= "AdminController/login";
$route['admin/logout']= "AdminController/logout";
$route['admin/cek_login']= "AdminController/cek_login";


// Trainings
$route['admin/trainings']= "TrainingController";
$route['admin/trainings/tambah']= "TrainingController/tambah";
$route['admin/trainings/edit']= "TrainingController";
$route['admin/trainings/edit/(:any)']= "TrainingController/edit/$1";
$route['admin/trainings/update']= "TrainingController/update";
$route['admin/training/hapus/(:any)']= "TrainingController/hapus/$1";

// Maintenances
$route['admin/maintenances']= "MaintenanceController";
$route['admin/maintenances/tambah']= "MaintenanceController/tambah";
$route['admin/maintenances/edit']= "MaintenanceController";
$route['admin/maintenances/edit/(:any)']= "MaintenanceController/edit/$1";
$route['admin/maintenances/update']= "MaintenanceController/update";
$route['admin/maintenance/hapus/(:any)']= "MaintenanceController/hapus/$1";



$route['maintenances']='FrontendController/maintenances';


