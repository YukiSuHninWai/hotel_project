<?php
namespace App\Http\Middleware;
use Closure;
use Session;
class SuperAdminMiddleware
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
        $user = \Auth::user();
        if($user->role == 'super') {
            return $next($request);    
        }
        Session::flash('message','You do not have permission to access this page');
        return redirect()->route('home');
        
    }
}
