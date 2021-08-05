@php
    $params = [
        'title' => 'Import module',
        'class' => 'btn btn-label-warning btn-md btn-sm',
        //'href' => admin_url() . '{_module}/import_module/',//{QUERY_STR}
        'href' => '#upload-zip-modal',
        'attr' => 'data-toggle="modal" data-target="#upload-zip-modal"',
        'icon_cls' => 'la la-cogs',
    ];
    Form_btn::add_button('import_module', $params);

    $form_buttons = ['new', 'delete', 'import', 'export', 'import_module'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    {{-- Content --}}

<!-- begin:: Content -->
    <form action="{{ admin_url('', true) }}" method="get" enctype="multipart/form-data">
    @csrf
    @include('admin.layouts.inc.stickybar', compact('form_buttons'))

    <div class="d-flex flex-column-fluid container">
    <div class="row">
        <div class="col-lg-12">



                <div class="card card-custom gutter-b">

                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Modules</h3>
                        </div>
                    </div>

                    <div class="card-body">

                    @php
                        $params = [
                            'title' => 'Export',
                            'href' => admin_url('export_module/{_id}/', true),
                            'icon_cls' => 'la la-download',
                        ];
                        Grid_btn::add_button('export_module', $params);

                        $status_column_data = DB_enumValues('modules', 'status');
                        $grid = new Grid();
                        $grid->status_column_data = $status_column_data;
                        $grid->filterable = false;
                        $grid->show_paging_bar = false;
                        $grid->url = admin_url('', true);
                        $grid->grid_buttons = ['edit', 'delete', 'status' => ['status' => 'status'], 'view', 'export_module'];

                        $grid->init($paginate_OBJ, $query);

                        $grid->dt_column(['id' => ['title' => 'ID', 'width' => '20', 'align' => 'center', 'th_align' => 'center', 'hide' => true]]);
                        $grid->dt_column(['status' => ['overflow' => 'initial', 'align' => 'center', 'th_align' => 'center', 'filter_value' => '=', 'input_options' => ['options' => $grid->status_column_data, 'class' => '', 'onchange' => true],
                            'wrap' => function($value, $field, $row, $grid) {
                                    return status_options($value, $row, $field, $grid);
                                }
                        ]]);
                        $grid->dt_column(['ordering' => ['width' => '90', 'align' => 'center', 'th_align' => 'center',
                            'wrap' => function($value, $field, $row, $grid) {
                                return ordering_input($value, $row, $field, $grid);
                            }
                        ]]);

                        $grid->dt_column(['created' => ['input_options' => ['class' => 'm_datepicker']]]);
                        $grid->dt_column(['icon' => ['align' => 'center', 'image_path' => asset_url('media/icons/', true)]]);
                        $grid->dt_column(['image' => ['align' => 'center',
                            'wrap' => function($value, $field, $row){
                                $img = asset_url('media/icons/' . $value, true);
                                return grid_img($img, 48, 48);
                            }
                        ]]);
                        $grid->dt_column(['grid_actions' => ['width' => '150',
                            'check_action' => function($row, $html, $button){
                                //if($button != 'delete')
                                {
                                    return $html;
                                }
                            }
                        ]]);

                        echo $grid->showGrid();
                    @endphp
                </div>
            </div>
                <!-- <div class="kt-portlet__foot">
                    begin: Pagination(sm)
                    <div class="kt-pagination kt-pagination--sm kt-pagination--danger">
                        @php
                            echo $grid->getTFoot();
                        @endphp
                    </div>
                    end: Pagination
                    &nbsp;&nbsp;
                </div> -->
            </div>
        </div>

    </div>
</form>
<!-- end:: Content -->

    @if(user_do_action('import_module'))
    <div class="modal fade" id="upload-zip-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Module (Zip)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo admin_url('import_module', true); ?>" method="post" enctype="multipart/form-data" class="form-horizontal validate">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-form-label">Zip File:</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="kt-checkbox kt-checkbox--check-bold kt-checkbox--state-success">
                                    <input type="checkbox" name="insert_module" value="1" /> Insert Module
                                    <span></span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="kt-checkbox kt-checkbox--check-bold kt-checkbox--state-success">
                                    <input type="checkbox" name="create_table" value="1" /> Create Table
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 text-center">
                                <button type="submit" class="btn btn-warning m-btn m-btn--icon -btn-sm m-btn--pill m-btn--air">
                                    <i class="la la-save"></i> &nbsp;&nbsp;Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#upload-zip-modal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let modal = $(this);
        })
    </script>
    @endif

@endsection

{{-- Scripts --}}
@section('scripts')

@endsection
