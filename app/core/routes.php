<?php

use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Response;
use Pecee\Http\Request;

Router::group(['prefix' => ''], function () {
    Router::get('/', 'HomeController@index');
});

Router::error(function(Request $request, \Exception $exception) {
    switch($exception->getCode()) {
        // Page not found
        case 404:
            $request->setRewriteCallback('ErrorController@index');
        break;

        // Forbidden
        case 403:
            response()->redirect('/forbidden');
        break;

        case 500: 
            response()->json([
				'error' => "",
				'code'  => $exception->getCode(),
			]);
        break;
    }
});

