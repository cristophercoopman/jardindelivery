<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = 'Error/error404';
$route['translate_uri_dashes'] = FALSE;

/*********************/
/*** URL AMIGABLES ***/
/*********************/

/*** sin login ***/
$route['home'] 			=	'Welcome/index';
$route['php_info'] 		=	'Welcome/info';
$route['detalle'] 		=	'Welcome/detalle_producto';

/*** con login ***/
$route['php_info']		=	'Admin_controller/info';
$route['home'] 			= 	'Admin_controller/home';
$route['panel']			=	'Admin_controller/logueado';
