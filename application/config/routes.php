<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['cadastro'] = 'PagesController/cadastro';
$route['login'] = 'PagesController/login';

$route['default_controller'] = 'PagesController/index';

$route['/'] = 'PagesController/index';


/********************************************************
 *                  PORTUGUESES VISAS PAGES             * 
 ********************************************************/
$route['b2-visto-turista'] = 'VisasController/b2tourism';
$route['questionario/b2-visto-turista'] = 'SmartformsController/b2tourism';
$route['b2-visto-turista/confirmacao'] = 'SmartformsController/confirmacaob2tourism';


/********************************************************
 *                 PORTUGUESES BASIC PAGES              * 
 ********************************************************/
$route['politica-de-privacidade'] = 'PagesController/politicas';
$route['termos-e-condicoes'] = 'PagesController/termos';
$route['cookies'] = 'PagesController/cookies';
$route['sobre-emmigre'] = 'PagesController/sobre';


/********************************************************
 *                  STRIPE CALLBACKS                    * 
 ********************************************************/
$route['callbacks/payment_intent_succeeded'] = 'CallbacksController/payment_intent_succeeded';
$route['callbacks/customer_subscription_created'] = 'CallbacksController/customer_subscription_created';
$route['callbacks/docketwise_auth'] = 'CallbacksController/docketwise_auth';

/********************************************************
 *                  JOBS ROUTES                         * 
 ********************************************************/
$route['cron/execute_all_tasks/(:any)'] = 'JobsController/ExecuteAllTasks/$1';


/********************************************************
 *                 ENGLISH BASIC PAGES                  * 
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
