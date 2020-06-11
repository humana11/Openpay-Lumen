<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/',function(){
   return response('The requested method is not available or has been deprecated',299);
});
$router->post('/Charge','ChargesController');

$router->post('/Notifications','NotificationsController@handle');
