<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return \Redirect::to(admin_url('login'));
});



Route::get(env('ADMIN_DIR') . '/login', 'Admin\LoginController@index');
Route::post(env('ADMIN_DIR') . '/login/do_login', 'Admin\LoginController@do_login');
Route::get(env('ADMIN_DIR') . '/login/logout', 'Admin\LoginController@logout');


Route::middleware(['auth', 'admin','routevalidation'])->group( function () {

    Route::get('/dashboard/get_contactqueries','Admin\DashboardController@get_contactqueries');
    Route::get('/dashboard/get_logsheetrequests','Admin\DashboardController@get_logsheetrequests');
    Route::get('/dashboard/get_allbookings','Admin\DashboardController@get_allbookings');
    Route::get('/dashboard/get_acceptedbookings','Admin\DashboardController@get_acceptedbookings');
    Route::get('/dashboard/get_pendingquests','Admin\DashboardController@get_pendingquests');
    Route::get('/dashboard/get_completecampaign','Admin\DashboardController@get_completecampaign');
    Route::get('/dashboard/get_daysc','Admin\DashboardController@get_daysc');
    Route::get('/dashboard/get_draft','Admin\DashboardController@get_draft');
    Route::get('/dashboard/get_paid','Admin\DashboardController@get_paid');
    Route::get('/dashboard/get_unpaid','Admin\DashboardController@get_unpaid');
    Route::get('/dashboard/get_orderhistory','Admin\DashboardController@get_orderhistory');
    Route::get('/dashboard/get_customer','Admin\DashboardController@get_customer');
    Route::get('/dashboard/get_certificates','Admin\DashboardController@get_certificates');

});


Route::middleware(['auth', 'admin','routevalidation'])->prefix(env('ADMIN_DIR'))->group( function () {



    Route::any('/{controller}/{method?}/{params?}',
        function ($controller, $method = 'index', $params = null) {
            $app = app();
            $controller = Str::studly(Str::singular($controller));
            $controller_cls = "App\Http\Controllers\\".Str::studly(env('ADMIN_DIR'))."\\{$controller}Controller";
            if(class_exists($controller_cls))
             {
                $controller = $app->make($controller_cls);
                return $controller->callAction($method, ['params' => $params]);

                    developer_log('', $e);

                }

            else
            {
                return View::make('errors.404');
            }
        }
    )->where('params', '[A-Za-z0-9-_/]+');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::any('/{controller}/{method?}/{params?}',
    function ($controller, $method = 'index', $params = null) {
        $app = app();
        $controller = Str::studly(Str::singular($controller));
        /*if(in_array($controller, ['Cron'])){
            return View::make('errors.404');
        }*/
        $controller_cls = "App\Http\Controllers\\{$controller}Controller";
        if(class_exists($controller_cls)) {
            $controller = $app->make($controller_cls);
            try {
                return $controller->callAction($method, ['params' => $params]);
            } catch (Exception $e) {
                return $e;
            }
        } else {
            return View::make('errors.404');
        }
    }
)->where('params', '[A-Za-z0-9-_/]+');
