<?php

namespace App\Http\Middleware;

use Closure;

class Ajax
{
    /*
    *  Error message to respond with
    *  @var string 
    */
    protected $message="Invalid request";
    
    /*
    *  Error code to respond with
    *  @var int 
    */
    
    protected $code=403;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //check whether the request is via ajax
        if(!$request->ajax())
            return response($this->message,$this->code);
        
        return $next($request);
    }
}
