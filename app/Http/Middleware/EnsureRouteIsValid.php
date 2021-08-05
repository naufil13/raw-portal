<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Closure;

class EnsureRouteIsValid
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
        $userId = Auth::id();
        
        $data = DB::table('users')
            ->join('user_type_module_rel', 'user_type_module_rel.user_type_id', '=', 'users.user_type_id')
            ->join('modules', 'user_type_module_rel.module_id', '=', 'modules.id')
            ->where('users.id','=',$userId)
            ->select('modules.module')
            ->get();
            $module = "modules";
            $module_names=array();
            foreach($data as $m)
            {
                
                array_push($module_names,$m->module);
            }
            
            
            if( in_array($module, $module_names) == false)
            {
                return $next($request);
                
            }
            return $next($request);
              
            
    }
}
