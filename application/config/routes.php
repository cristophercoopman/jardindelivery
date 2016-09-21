<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* URL AMIGABLES */
$route['home'] 			=	'Welcome/index';
$route['home'] 			= 	'Admin_controller/home';
$route['php_info'] 		=	'Welcome/info';
$route['php_info']		=	'Admin_controller/info';
$route['panel']			=	'Admin_controller/logueado';
$route['404_override'] 	= 	'Error/error404';
