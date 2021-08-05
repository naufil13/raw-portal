<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Dashboard;

use Breadcrumb;
use File;


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use Str;
use ZanySoft\Zip\Zip;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
     
    public $module = ''; //Project module name
    public $_info = null; // Project module info
    public $_route = '';

    public $model = null; // Model Object
    public $table = '';
    public $id_key = '';

    var $where = '1';

    public function __construct()
    {
        $this->module = getUri(2);
        $this->_route = admin_url($this->module);
        $model = 'App\\' . \Str::studly(\Str::singular($this->module));
        $this->model = new $model;
        $this->table = $this->model->getTable();
        $this->id_key = $this->model->getKeyName();

        $this->_info = getModuleDetail();

        if (user_do_action('self_records')) {
            $user_id = Auth::user()->id;
            $this->where .= " AND {$this->table}.created_by = '{$user_id}'";
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             /** -------- Breadcrumb */
        Breadcrumb::add_item($this->_info->title, $this->_route);

        /** -------- Response */
        return view('admin.dashboard.form', compact('row'), ['_info' => $this->_info]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

}
