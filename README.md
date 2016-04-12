# laravel-ajax-middleware
A middleware for laravel which allows only ajax requests

Place the file in app/Http/Middleware/ directory

Register the middleware in kernel.php under $routeMiddleware

$routeMiddleware=[
...,
'ajax'=>\App\Http\Middleware\Ajax::class,
];

configure the error message and code in Ajax.php

protected $message="Invalid Request";
protected $code=405;

use the middleware on required routes :

Route::('...',...)->middleware('ajax');
