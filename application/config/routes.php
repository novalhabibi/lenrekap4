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
$route['admin/maintenances/tambah']= "MaintenanceController/add";
$route['admin/maintenances/edit']= "MaintenanceController";
$route['admin/maintenances/edit/(:any)']= "MaintenanceController/edit/$1";
$route['admin/maintenances/update']= "MaintenanceController/update";
$route['admin/maintenance/hapus/(:any)']= "MaintenanceController/hapus/$1";

// Services
$route['admin/services']= "ServiceController";
$route['admin/services/tambah']= "ServiceController/add";
$route['admin/services/edit']= "ServiceController";
$route['admin/services/edit/(:any)']= "ServiceController/edit/$1";
$route['admin/services/update']= "ServiceController/update";
$route['admin/service/hapus/(:any)']= "ServiceController/hapus/$1";

// News
$route['admin/news']= "NewsController";
$route['admin/news/add']= "NewsController/add";
$route['admin/news/edit']= "NewsController";
$route['admin/news/edit/(:any)']= "NewsController/edit/$1";
$route['admin/news/update']= "NewsController/update";
$route['admin/news/hapus/(:any)']= "NewsController/hapus/$1";




// Clients
$route['admin/clients']= "ClientController";
$route['admin/clients/tambah']= "ClientController/add";
$route['admin/clients/edit']= "ClientController";
$route['admin/clients/edit/(:any)']= "ClientController/edit/$1";
$route['admin/clients/update']= "ClientController/update";
$route['admin/client/hapus/(:any)']= "ClientController/hapus/$1";

// Sliders
$route['admin/sliders']= "SliderController";
$route['admin/sliders/add']= "SliderController/add";
$route['admin/sliders/edit']= "SliderController";
$route['admin/sliders/edit/(:any)']= "SliderController/edit/$1";
$route['admin/sliders/update']= "SliderController/update";
$route['admin/sliders/hapus/(:any)']= "SliderController/hapus/$1";



$route['admin/setting']='AdminController/settings';
$route['admin/update_setting']='AdminController/update_setting';
$route['maintenances']='FrontendController/maintenances';
$route['news']='FrontendController/news';
$route['news/(:any)']='FrontendController/singlenews/$1';


