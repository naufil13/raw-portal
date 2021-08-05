<?php
/**
 * Class User
 * @property App\User $module
 */

namespace App\Http\Controllers\Admin;

use App\User;
use Breadcrumb;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

        $agent_type_id = opt('agent_type_id');
        $this->where .= " AND {$this->table}.user_type_id != '{$agent_type_id}'";
        if (user_do_action('self_records')) {
            $user_id = Auth::user()->id;
            $this->where .= " AND {$this->table}.created_by = '{$user_id}'";
        }
    }


    /**
     * *****************************************************************************************************************
     * @method users index | Grid | listing
     * *****************************************************************************************************************
     */
    public function index()
    {
        /** -------- Breadcrumb */
        Breadcrumb::add_item($this->_info->title, $this->_route);

        /** -------- Pagination Config */
        $config = collect(['sort' => $this->id_key, 'dir' => 'desc', 'limit' => 25, 'group' => 'users.' . $this->id_key])->merge(request()->query())->toArray();

        /** -------- Query */
        $select = "users.id
-- , users.user_type_id
, user_types.user_type
, users.first_name
, users.email
, users.phone
, users.city
, users.photo
, users.status
";
        $SQL = $this->model->select(\DB::raw($select));

        /** -------- WHERE */
               $where = getWhereClauseWithOutQuery(request()->query()['s']);

        if (!empty($where)) {
            $SQL = $SQL->whereRaw($where);
        }

        $SQL = $SQL->leftJoin('user_types', 'user_types.id', '=', 'users.user_type_id');
        $SQL = $SQL->orderBy($config['sort'], $config['dir'])->groupBy($config['group']);

        $paginate_OBJ = $SQL->paginate($config['limit']);

        /** -------- RESPONSE */
        if (request()->ajax()) {
            return $paginate_OBJ;
        } else {
            return view('admin.users.grid', compact('paginate_OBJ'), ['_info' => $this->_info]);
        }
    }


    /**
     * *****************************************************************************************************************
     * @method users form
     * *****************************************************************************************************************
     */
    public function form()
    {
        $id = getUri(4);
        if ($id > 0) {
            $row = $this->model->find($id);
            if ($row->id <= 0) {
                return \Redirect::to(admin_url('', true))->with('error', 'Access forbidden!');
            }
        }

        /** -------- Breadcrumb */
        Breadcrumb::add_item($this->_info->title, $this->_route);
        Breadcrumb::add_item(($id > 0) ? "Edit -> id:[$id]" : 'Add New');

        /** -------- Response */
        return view('admin.users.form', compact('row'), ['_info' => $this->_info]);
    }


    /**
     * *****************************************************************************************************************
     * @method users store | Insert & Update
     * *****************************************************************************************************************
     */
    public function store()
    {
        $id = request()->input($this->id_key);
        
        /** -------- Validation */
        $validator_rules = [
            'user_type_id' => "required",
            'first_name' => "required",
            'email' => "required",
            'photo' => "image|mimes:gif,jpg,jpeg,png|max:2048",

            'username' => "required|unique:{$this->module},username,{$id},{$this->id_key}",
            'password' => "required|min:6|max:16",
        ];
        if($id > 0){
            unset($validator_rules['password']);
        }
        $validator = Validator::make(request()->all(), $validator_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = DB_FormFields($this->model);

        /** -------- Upload Files */
        if(!empty($data['data']['password'])) {
            $data['data']['password'] = Hash::make($data['data']['password']);
        }else{
            unset($data['data']['password']);
        }
        $files = upload_files(['photo'], "assets/front/{$this->table}/");
        if (count($files) > 0) {
            foreach ($files as $name => $file) {
                if ($file) {
                    $data['data'][$name] = $file->getFilename();
                }
            }
        }

        if ($id > 0) {
            $row = $this->model->find($id);
            $row = $row->fill($data['data']);
        } else {
            $row = $this->model->fill($data['data']);
        }

        if ($status = $row->save()) {
            if ($id == 0) {
                $id = $row->{$this->id_key};
                set_notification('Record has been inserted!', 'success');
                activity_log('Add', $this->table, $id);
            } else {
                set_notification('Record has been updated!', 'success');
                activity_log('Update', $this->table, $id);
            }
        } else {
            set_notification('Some error occurred!', 'error');
        }

        if (request()->ajax()) {
            $alert_types = ['success', 'error' => 'danger', 'warning', 'primary', 'info', 'brand'];
            $alerts = collect(session('errors')->all())->append(collect($alert_types)->map(function ($val, $key) {
                return session($val);
            }));
            return $alerts;
        } else {
            $__redirect = (!empty(getVar('__redirect')) ? getVar('__redirect') : admin_url("form/{$id}", true));
            return redirect($__redirect);
        }

    }


    /**
     * *****************************************************************************************************************
     * @method Status
     * @unlink Delete Files (unlink)
     * *****************************************************************************************************************
     */
    function status()
    {
        $id = getUri(4);
        $ids = request()->input('ids');
        if ($id > 0) {
            $ids = [$id];
        }

        $data = ['status' => request('status')];
        $this->model->whereIn($this->id_key, $ids)->update($data);

        set_notification('Status has been updated', 'success');

        activity_log(getUri(3), $this->table, $ids);

        return \Redirect::to(admin_url($this->_route));
    }


    /**
     * *****************************************************************************************************************
     * @method users delete
     * *****************************************************************************************************************
     */
    public function delete()
    {
        $id = getUri(4);
        $ids = request()->input('ids');
        if ($id > 0) {
            $ids = [$id];
        }
        if ($ids == null || count($ids) == 0) {
            return redirect()->back()->with('danger', 'Select minimum one row!');
        }

        $unlink = ['photo' => 'assets/front/{$this->table}',
        ];
        $affectedRows = delete_rows($this->table, "{$this->id_key} IN(" . implode($ids, ',') . ")", true, $unlink);
        //$this->model->whereIn($this->id_key, $ids)->delete();

        activity_log(getUri(3), $this->table, $ids);

        set_notification('Record has been deleted!', 'success');

        return \Redirect::to(admin_url('index', true));
    }


    /**
     * *****************************************************************************************************************
     * @method users view | Record
     * *****************************************************************************************************************
     */
    public function view()
    {
        $id = getUri(1);
        if ($id > 0) {
            $row = $this->model->find($id);
            if ($row->id <= 0) {
                return \Redirect::to(admin_url('', true))->with('error', 'Access forbidden!');
            }

        } else {
            return \Redirect::to(admin_url('', true))->with('error', 'Invalid URL!');
        }

        Breadcrumb::add_item($this->_info->title, $this->_route);
        Breadcrumb::add_item("View -> id:[$id]");

        $data['title'] = $this->_info->title;
        $config['buttons'] = ['new', 'edit', 'delete', 'refresh', 'print', 'back'];
        $config['hidden_fields'] = ['created_by'];
        $config['image_fields'] = [
            'photo' => ['path' => asset_url("front/{$this->table}/"), 'size' => '128x128'],
        ];
        $config['custom_func'] = ['status' => 'status_field'];
        $config['attributes'] = [
            'id' => ['title' => 'ID'],
        ];

        activity_log(getUri(3), $this->table, $id);

        if (request()->ajax()) {
            return $row;
        } else if (view()->exists('admin.modules.view')) {
            return view('admin.users.view', compact('row', 'config'), ['_info' => $this->_info]);
        } else {
            return view('admin.layouts.view_record', compact('row', 'config'), ['_info' => $this->_info]);
        }
    }

    /**
     * *****************************************************************************************************************
     * @method users AJAX actions
     * *****************************************************************************************************************
     */
    function ajax()
    {
        $action = request('action') ?? getUri(4);
        $id = request('id') ?? getUri(5);
        switch ($action) {
            case 'delete_img':
                $field = getUri(6);
                $del_img = [$field => asset_dir("front/{$this->table}/")];
                $JSON['status'] = delete_rows($this->table, [$this->id_key => $id], false, $del_img);
                $JSON['message'] = ucwords($field) . ' has been deleted!';
                break;
            case 'ordering':
                $field = array_keys($_GET)[0];
                $value = getVar($field)[$id];
                $JSON['status'] = $this->model->where($this->id_key, $id)->update([$field => $value]);
                $JSON['message'] = 'updated!';
                break;
            case 'validate':
                $field = array_keys($_GET)[0];
                $value = getVar($field);

                $row = \DB::table($this->table)->where($field, $value);
                if ($id > 0) {
                    $row = $row->where($this->id_key, $id);
                }
                $row = $row->first();
                if ($row->id > 0) {
                    exit('false');
                }
                exit('true');
                break;
        }

        echo json_encode($JSON);
    }


    /**
     * *****************************************************************************************************************
     * @method users import
     * *****************************************************************************************************************
     */

    public function duplicate()
    {
        $id = getUri(4);
        $OBJ = $this->model->find($id);
        $unique = [];
        $newOBJ = $OBJ->replicate($unique);

        $newOBJ->save();
        $newID = $newOBJ->id;

        return \Redirect::to(admin_url("form/{$newID}", true))->with('success', 'Record has been duplicated!');
    }

    /**
     * *****************************************************************************************************************
     * @method users import
     * *****************************************************************************************************************
     */
    public function import()
    {
        if (\request()->isMethod('POST')) {
            $import_CLS = "{$this->module}Import";
            Excel::import(new $import_CLS(), request()->file('file'));
            return \Redirect::to(admin_url('', true))->with('success', 'All records has been import!');
        } else {

            /** -------- Breadcrumb */
            Breadcrumb::add_item($this->_info->title, $this->_route);
            Breadcrumb::add_item("Import");

            return view('admin.layouts.import', ['_info' => $this->_info]);
        }
    }

    /**
     * *****************************************************************************************************************
     * @method users export
     * @type csv & xml
     * *****************************************************************************************************************
     */
    public function export()
    {
        $ext = 'csv';
        $OBJ = $this->model->all();
        return $OBJ->downloadExcel("{$this->module}.{$ext}", ucfirst($ext), true);
        //return Excel::download($OBJ, "{$this->module}.{$ext}");
    }


    public function file_upload()
    {

        $data = [];
        $dir = "assets/front/{$this->table}/";
        $files = upload_files(['photo'], $dir, ['ext' => gif, jpg, jpeg, png]);
        if (count($files) > 0) {
            foreach ($files as $name => $file) {
                if ($file) {
                    $data[$name]->name = $file->getFilename();
                    $data[$name]->image_url = $dir . $data[$name]->name;
                    $data[$name]->thumb_url = _img($dir . $data[$name]->name, 100, 100);
                    $data[$name]->title = $file->getFilename();
                    $data[$name]->size = $file->getSize();
                    $data[$name]->ext = $file->getClientOriginalExtension();
                } else {
                    $data[$name]->name = $file->getFilename();
                    $data[$name]->error = $file->error;
                }
            }
        }

        return $data;
    }

}
