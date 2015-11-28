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
    $app->post('/articles', 'App\Http\Controllers\ArticlesController@create');
    $app->get('/articles', 'App\Http\Controllers\ArticlesController@all');
    $app->get('/articles/{id}', 'App\Http\Controllers\ArticlesController@get');

    $app->get('/tags/{id}', 'App\Http\Controllers\TagsController@get');

    $app->get('/members', 'App\Http\Controllers\MembersController@all');
    $app->get('/members/{id}', 'App\Http\Controllers\MembersController@get');
    $app->post('/members', 'App\Http\Controllers\MembersController@create');

    $app->get('/commands', 'App\Http\Controllers\CommandsController@all');
    $app->get('/commands/{id}', 'App\Http\Controllers\CommandsController@get');
    $app->post('/commands', 'App\Http\Controllers\CommandsController@create');
});
