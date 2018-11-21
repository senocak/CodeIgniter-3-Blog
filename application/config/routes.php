<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['yazilar'] = 'yazilar/index';
$route['yazi/(:any)'] = 'yazilar/yazi/$1';
$route['kategori/(:any)'] = 'yazilar/kategoriler/$1';
$route['kategori/(:any)/(:num)'] = 'yazilar/kategoriler/$1/$2';

$route['default_controller'] = 'sayfa/index';
$route['(:any)'] = 'sayfa/index/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;