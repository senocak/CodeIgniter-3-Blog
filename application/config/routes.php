<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['yazilar'] = 'yazilar/index';
$route['yazi/(:any)'] = 'yazilar/view/$1';

$route['categories'] = 'categories/index';
$route['categories/yazilar/(:any)'] = 'categories/yazilar/$1';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;