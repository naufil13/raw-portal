@php
    $pass_data['form_buttons'] = ['save', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    {{-- Content --}}


    <form action="{{ admin_url('store', true) }}" class="d-flex flex-column-fluid" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.layouts.inc.stickybar', $pass_data)
        <input type="hidden" name="id" value="{{ old('id', $row->id) }}">
        <!-- begin:: Content -->
        <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            Form
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="mt10"></div>
                        <div class="form-group row">
                            <label for="parent_id" class="col-3 col-form-label text-right">Parent Module:
                                <span class="required">*</span></label>
                            <div class="col-6">
                                <select class="form-control kt-select2" name="parent_id" id="parent_id">
                                    <option value="0">- Select -</option>
                                    @php
                                        $_M = new Multilevel();
                                        $_M->type = 'select';
                                        $_M->id_Column = 'id';
                                        $_M->title_Column = 'title';
                                        $_M->link_Column = 'module';
                                        $_M->option_html = '<option {selected} value="{id}" data--icon="{icon}">{level}{title}</option>';
                                        $_M->level_spacing = 6;
                                        $_M->selected = old('parent_id', $row->parent_id);
                                        $_M->query = "SELECT * FROM `modules` WHERE `status`='Active' ORDER BY ordering ASC";
                                        echo $_M->build();
                                    @endphp

                                    <?php
                                    //$obj = ['id' => '', 'title' => '- Select -'];
                                    //$obj += \App\Module::all()->toArray();
                                    //$obj = DB::select('SELECT id , title FROM modules');
                                    //$obj = 'SELECT id , title FROM modules';
                                    //$obj = ['Main' => ['page' => 'Pages', 'menu' => 'Menu'], 'Reports' => ['page' => 'Pages', 'menu' => 'Menu']];
                                    //$obj = Arr::pluck($obj, 'title', 'id');
                                    //echo selectBox($obj, $row->parent_id, null, ['id' => 'title']);
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                        <div class="form-group row">
                            <label for="module" class="col-3 col-form-label text-right required">Module:</label>
                            <div class="col-6">
                                <input name="module" value="{{ old('module', $row->module) }}" class="form-control" type="text" placeholder="Enter module">
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                        <div class="form-group row">
                            <label for="title" class="col-3 col-form-label text-right">Title:
                                <span class="required">*</span></label>
                            <div class="col-6">
                                <input name="title" value="{{ old('title', $row->title) }}" class="form-control" type="text" placeholder="Title" id="title">
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                        <div class="form-group row m_icon">
                            <label for="email" class="col-3 col-form-label text-right">Module Icon:
                                <span class="required">*</span></label>
                            <div class="col-3">
                                <button type="button" class="btn btn-brand btn-md btn-block"> Select Module Icon</button>
                            </div>
                            <div class="col-2"><i class="flaticon2-bar-chart"></i></div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                        <div class="form-group row">
                            <label for="actions" class="col-3 col-form-label text-right">Actions:
                                <span class="required">*</span></label>
                            <div class="col-6">
                                <input name="actions" value="{{ old('actions', $row->actions) }}" id="actions" class="form-control" type="text" placeholder="add|edit|delete|status|download">
                            </div>
                        </div>
                        <div class="btn-group offset-md-3">
                            <button type="submit" class="btn btn-md btn-brand btn-sm">
                                <i class="la la-save"></i>Submit Now
                            </button>
                            <button type="button" class="btn btn-sm btn-brand dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-left">
                                <a class="dropdown-item" href="#"><i class="la la-plus"></i> Save & New</a>
                                <a class="dropdown-item" href="#"><i class="la la-undo"></i> Save & Close</a>
                            </div>
                        </div>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-secondary btn-sm"><i class="la la-undo"></i> Back</button>

                    </div>
                    <div class="kt-portlet__foot">
                       </div>
                </div>
            </div>

            <!--======= begin::right sidebar -->
            <div class="col-lg-3">
                <div class="card card-custom">
                   <div class="card-header">
                       <h3 class="card-title">
                        <i class="flaticon2-protected"></i> &nbsp;
                         Show in Menu
                       </h3>
                   </div>
                    <div class="card-body pt-5 pb-5">
                        <div class="kt-portlet__content">
                            <div class="form-group mb-0">
                                <select class="custom-select form-control" name="show_in_menu">
                                    <?php echo selectBox(array_combine(['1', '0'], ['Yes', 'No']), old('show_in_menu', $row->show_in_menu));?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-custom mt-5">
                   <div class="card-header">
                       <h3 class="card-title">
                        <i class="flaticon2-dashboard"></i> &nbsp; Ordering
                       </h3>
                   </div>
                    <div class="card-body pt-5 pb-5">
                        <div class="kt-portlet__content">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input name="ordering" value="{{ old('ordering', $row->ordering) }}" placeholder="100" type="text" id="kt_touchspin_5" type="text" class="form-control bootstrap-touchspin-vertical-btn">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-custom mt-5">
                   <div class="card-header">
                       <h3 class="card-title">
                        <i class="flaticon2-image-file"></i> &nbsp; Module Icon
                       </h3>
                   </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="form-group row mx-center">
                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar fImg">
                                <a href="{{ asset_url('media/rj_images/' . $row->image, 1) }}" data-fancybox="image">
                                    <div class="kt-avatar__holder del-img" style="background-image: url({{_img(asset_url('media/rj_images/' . $row->image, 1), 115, 115)}});"></div>
                                </a>
                                <label class="kt-avatar__upload" data-skin="dark" data-toggle="kt-tooltip" title="choose image">
                                    <i class="fa fa-pen"></i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg .gif .svg">
                                </label>
                                <span class="kt-avatar__cancel" data-skin="dark" data-toggle="kt-tooltip" title="remove image" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--======= end::right sidebar -->
        </div>
        <!-- end:: Content -->
    </div>
    </form>

@endsection

{{-- Scripts --}}
@section('scripts')

@endsection
