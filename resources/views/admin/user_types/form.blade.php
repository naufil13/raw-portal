@php

    $pass_data['form_buttons'] = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')

    <form action="{{ admin_url('store', true) }}" class="container" method="post" enctype="multipart/form-data" id="user_types">
        @csrf
        @include('admin.layouts.inc.stickybar', $pass_data)
        <input type="hidden" name="id" value="{{ $row->id }}">
        <input type="hidden" name="id" class="form-control" placeholder="ID" value="{{ $row->id }}">
        <!-- begin:: Content -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">

                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="flaticon-file"></i> &nbsp; Form
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="mt10"></div>


                        <div class="form-group row">
                            <label for="user_type" class="col-2 col-form-label text-right required"><?php echo __('User Type');?>:</label>
                            <div class="col-6">
                                <input type="text" name="user_type" id="user_type" class="form-control" placeholder="<?php echo __('User Type');?>" value="<?php echo htmlentities($row->user_type);?>"/>
                            </div>
                        </div>
                        
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                        <div class="form-group row">
                            <label for="level" class="col-2 col-form-label text-right required"><?php echo __('Modules');?>:</label>
                            <div class="col-6">
                                <style>
                                    .tree-module input[type=checkbox]{
                                        margin-left: 200px;
                                        position: absolute;
                                        display: none;
                                    }
                                    .jstree-default .jstree-icon {
                                        color: #000000;
                                    }
                                </style>
                                <div id="tree-module" class="tree-module">
                            <?php

                            $m_rows = \App\Module::all();

                            $menu = array(
                                'items' => array(),
                                'parents' => array()
                            );
                            foreach (collect($m_rows)->toArray() as $items) {
                                $menu['items'][$items['id']] = $items;
                                $menu['parents'][$items['parent_id']][] = $items['id'];

                            }

                            function buildModuleCheckBox($parent, $menu, $modules, $selected_action)
                            {

                                $html = "";
                                if (isset($menu['parents'][$parent])) {
                                    $html .= "<ul>\n";

                                    foreach ($menu['parents'][$parent] as $itemId) {
                                        if (!isset($menu['parents'][$itemId])) {
                                            $actions = '';
                                            $actions_ar = explode('|', str_replace(',', '|', ($menu['items'][$itemId]['actions'])));


                                            if (count($actions_ar) > 0) {
                                                $actions .= '<ul class="module_action">';
                                                foreach ($actions_ar as $act) {

                                                    if ($act != '') {
                                                        $actions .= '<li data-jstree=\'{ "icon" : "fa fa-folder kt-font-default" '. (in_array($act, $selected_action[$menu['items'][$itemId]['id']]) ? ', "selected":true  ' : '') .'}\'>';
                                                        $actions .= "<input class='' type='checkbox'
    " . (in_array($act, $selected_action[$menu['items'][$itemId]['id']]) ? ' checked ' : '') . "
    name='actions[" . $menu['items'][$itemId]['id'] . "][]' id='a' value='" . $act . "' title='" . ucwords(str_replace('_', ' ', $act)) . "'> " . ucwords(str_replace('_', ' ', $act)) . " </li>";
                                                    }
                                                }
                                                $actions .= '</ul>';

                                            }
                                            $html .= '<li data-jstree=\'{ '.((in_array($menu['items'][$itemId]['id'], $modules)) ? '"opened": true, "selected":true ' : '').' }\'>';
                                            //$html .= '<li>';
                                            $html .= "\n
                                            <input type='checkbox'
                                                                            " . ((in_array($menu['items'][$itemId]['id'], $modules)) ? 'checked' : '') . "
                                                                            name='modules[]' value='" . $menu['items'][$itemId]['id'] . "' class=' multi_checkbox '>
                                                                            " . $menu['items'][$itemId]['title'] . $actions . "
                                                                            </li>";
                                        }
                                        if (isset($menu['parents'][$itemId])) {


                                            $html .= '<li data-jstree=\'{ '.((in_array($menu['items'][$itemId]['id'], $modules)) ? '"opened": true, "selected":true ' : '').' }\'>';
                                            //$html .= '<li>';

                                            $html .= "<input " . ((in_array($menu['items'][$itemId]['id'], $modules)) ? 'checked' : '') . "
    type='checkbox' name='modules[]' value='" . $menu['items'][$itemId]['id'] . "' class=' multi_checkbox '>
    " . $menu['items'][$itemId]['title'];


                                            $html .= buildModuleCheckBox($itemId, $menu, $modules, $selected_action);
                                            $html .= "\n</li>";
                                        }
                                    }
                                    $html .= "\n</ul>";
                                }
                                return $html;
                            }


                            echo buildModuleCheckBox(0, $menu, $modules, $selected_action);
                            ?>
                        </div>
                            </div>
                        </div>

                        <div class="btn-group offset-md-2">
                            <input type="submit" class="btn btn-md btn-success btn-sm" value="<?php echo __('Submit');?>">
                            <input type="button" next-url="<?php echo admin_url('form', true);?>" class="btn-brand btn btn-md btn-brand btn-sm" value="<?php echo __('Submit & New');?>">
                            <button type="reset" class="btn btn-dark btn-md btn-brand btn-sm"><?php echo __('Cancel');?></button>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
@endsection

{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
        (function ($) {

            var tree = $("#tree-module").jstree({
                'plugins' : ["checkbox"],
                'checkbox' : {"three_state": false},
                types: {default: {icon: "fa fa-folder"}, file: {icon: "fa fa-file"}},
            });

            tree.on("changed.jstree", function (e, data) {
                console.log(data);
                if(data.node) {
                    $('#' + data.node.id + '_anchor').find('input:checkbox').prop('checked', data.node.state.selected);
                }
                if (data.action == 'deselect_node') {
                    tree.jstree("close_node", "#" + data.node.id);
                }
                else {
                    tree.jstree("open_node", "#" + data.node.id);
                }
            });

            /*$(document).ready(function () {
                $('.tree-form').on('submit', function (e) {
                    $('.jstree input[type=checkbox]', this).each(function () {
                        $(this).prop('checked', false).removeAttr('checked');
                    });
                    $('.jstree-undetermined', this).each(function () {
                        $(this).parent().find('input').prop('checked', true);
                    });
                    $('.jstree-clicked', this).each(function () {
                        $(this).find('input').prop('checked', true);
                    });
                });
            });*/
        })(jQuery)
    </script>
    <script>

        $("form#user_types").validate({
            // define validation rules
            rules: {
                'user_type': {
                    required: true,
                },
                'level': {
                    required: true, digits: true,
                },
            },
            /*messages: {
            'user_type' : {required: 'User Type is required',},'level' : {required: 'Level is required',integer: 'Level is valid integer',},    },*/
            //display error alert on form submit
            invalidHandler: function (event, validator) {
                validator.errorList[0].element.focus();

                /*var alert = $('#_msg');
                alert.removeClass('m--hide').show();
                mUtil.scrollTo(alert, -200);*/
                //mUtil.scrollTo(validator.errorList[0].element, -200);
            },

            submitHandler: function (form) {
                form.submit();
            }

        });
    </script>@endsection
