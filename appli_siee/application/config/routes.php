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

$route['calendar'] = 'calendar';

$route['rdv/create/(:any)'] = 'rdv/create/$1';
$route['rdv/(:any)'] = 'rdv/view/$1';
$route['rdv'] = 'rdv';

$route['clients/modif_profil/(:any)'] = 'clients/modif_profil/$1';
$route['clients/deconnexion'] = 'clients/deconnexion'; 
$route['clients/profil/(:any)'] = 'clients/profil/$1'; 
$route['clients/addcookie'] = 'clients/add_cookie'; 
$route['clients/display'] = 'clients/display_cookie'; 
$route['clients/delete'] = 'clients/delete_cookie';
$route['clients/connexion'] = 'clients/connexion';
$route['clients/inscription'] = 'clients/inscription';
$route['clients/(:any)'] = 'clients/view/$1';
$route['clients'] = 'clients';

$route['interventions/create'] = 'interventions/create';
$route['interventions/(:any)'] = 'interventions/view/$1';
$route['interventions'] = 'interventions';

$route['services/create'] = 'services/create';
$route['services/(:any)'] = 'services/view/$1';
$route['services'] = 'services';

$route['types/create'] = 'types/create';
$route['types/(:any)'] = 'types/view/$1';
$route['types'] = 'types';

$route['objets/verif_delete/(:any)'] = 'objets/verif_delete/$1';
$route['objets/delete/(:any)'] = 'objets/delete/$1';
$route['objets/create'] = 'objets/create';
$route['objets/(:any)'] = 'objets/view/$1';
$route['objets'] = 'objets';

$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';

$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';

/*$route['cookies/display'] = 'cookies/display_cookie'; 
$route['cookies/delete'] = 'cookies/delete_cookie';
$route['cookies/(:any)'] = 'cookies/view/$1';
$route['cookies'] = 'cookies'; */

/*$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;*/
