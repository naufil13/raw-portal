@php
    $pass_data['form_buttons'] = ['new', 'delete', 'import', 'export'];
@endphp
@extends('admin.layouts.admin', $pass_data)

@section('content')

    <form action="{{ admin_url('', true) }}" method="get" enctype="multipart/form-data">
        @csrf
        @include('admin.layouts.inc.stickybar', $pass_data)
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                {{ $_info->title }}
                            </h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mt10"></div>

                        @php
                            $grid = new Grid();
                            $grid->status_column_data = $status_column_data;
                            $grid->filterable = false;
                            $grid->show_paging_bar = false;
                            $grid->grid_buttons = ['edit', 'delete', 'status' => ['status' => 'status'], 'view', 'duplicate'];

                            $grid->init($paginate_OBJ);

                            $grid->dt_column(['id' => ['title' => 'ID', 'width' => '20', 'align' => 'center', 'th_align' => 'center', 'hide' => true]]);
                            //$grid->dt_column(['user_type' => ['width' => '200']]);
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
                    {{--  <div class="kt-portlet__foot">
                        <!--begin: Pagination(sm)-->
                        <div class="kt-pagination kt-pagination--sm kt-pagination--danger">
                            @php
                                echo $grid->getTFoot();
                            @endphp
                        </div>
                        <!--end: Pagination-->
                        &nbsp;&nbsp;
                    </div>  --}}
                </div>
            </div>

        </div>
        </div>
    </form>


@endsection

{{-- Scripts --}}
@section('scripts')

@endsection
