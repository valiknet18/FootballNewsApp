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

$app->group(['prefix' => 'api'], function ($app) {
    $app->group(['prefix' => 'articles'], function ($app) {
        $app->get('/', 'ArticlesController@all');
        $app->get('/{slug}', 'ArticlesController@get');
        $app->post('/', 'ArticlesController@create');
    });


});