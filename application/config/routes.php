<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['cadastro'] = 'PagesController/cadastro';
$route['login'] = 'PagesController/login';

$route['default_controller'] = 'PagesController/index';

$route['/'] = 'PagesController/index';


/********************************************************
 *                  PORTUGUESES  VISAS PAGES            * 
 ********************************************************/
$route['b2-visto-turista'] = 'VisasController/b2tourism';


/********************************************************
 *                 PORTUGUESES BASIC PAGES              * 
 ********************************************************/
$route['politica-de-privacidade'] = 'PagesController/index';
$route['/termos-e-condicoes'] = 'PagesController/index';
$route['/cookies'] = 'PagesController/index';
$route['/sobre-nos'] = 'PagesController/index';


/********************************************************
 *                 ENGLISH BASIC PAGES              * 
 ********************************************************/
$route['/en'] = 'PagesController/index_en';
$route['/en/about-us'] = 'PagesController/index_en';


/********************************************************
 *                 SPANISH BASIC PAGES              * 
 ********************************************************/
$route['/es'] = 'PagesController/index_es';
$route['/es/sobre-nosotros'] = 'PagesController/index_es';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
