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

/**
 * Returns some info about the API
 */
$app->get ("/", "IndexController@index");

/**
 * Gets a quote with the supplied ID, or a random one
 */
$app->get ("/quote/find/{id}", "QuoteController@get");

/**
 * Gets all quotes
 */
$app->get ("/quote/all", "QuoteController@getAll");

/**
 * Creates a new quote
 * @params: quote, author
 */
$app->put ("/quote/create", "QuoteController@create");

/**
 * Deletes a quote
 */
$app->delete ("/quote/delete/{id}", "QuoteController@delete");