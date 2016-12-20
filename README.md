# laravel-ajax-middleware
A middleware for laravel which allows only ajax requests

**1.** In a new/fresh install of laravel

```
$ php artisan make:middleware ViaAjax
```

**2.** Go to `Middleware/ViaAjax.php` and add your `ajax.php` or:

```
<?php

namespace App\Http\Middleware;

use Closure;

class ViaAjax
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (!$request->ajax()) {
        return response('Forbidden', 403);
      }

      return $next($request);
    }
}
```
**3.** Update `App\Kernel.php`:
```
  protected $routeMiddleware = [
         ...
        'ajax' => \App\Http\Middleware\ViaAjax::class,
    ];
```

**4.** Use the Ajax Middleware properly:
```
Route::group(['middleware' => 'ajax'], function () {
   /* Here goes routes only accesible via ajax */  
});
```
