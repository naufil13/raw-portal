@php

    $form_buttons = ['save','back'];
@endphp
@extends('admin.layouts.admin')

@section('content')


    <form action="{{ admin_url('store', true) }}" class="container" method="post" enctype="multipart/form-data" id="users">
        @csrf
        @include('admin.layouts.inc.stickybar', compact('form_buttons'))
        <input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}" value="{{ $row->id }}">
        <!-- begin:: Content -->


        <div class="row">
            <div class="col-lg-9">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            Admin Users Form
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="mt10"></div>

                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        <div class="form-group row">
                            <label for="first_name" class="col-2 col-form-label required">{{ __('First Name') }}:</label>
                            <div class="col-6">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="<?php echo __('First Name');?>" value="<?php echo htmlentities($row->first_name);?>"/>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        <div class="form-group row">
                            <label for="last_name" class="col-2 col-form-label">{{ __('Last Name') }}:</label>
                            <div class="col-6">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="<?php echo __('Last Name');?>" value="<?php echo htmlentities($row->last_name);?>"/>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        <div class="form-group row">
                            <label for="email" class="col-2 col-form-label required">{{ __('Email') }}:</label>
                            <div class="col-6">
                                <input type="text" name="email" id="email" class="form-control" placeholder="<?php echo __('Email');?>" value="<?php echo htmlentities($row->email);?>"/>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        <div class="form-group row">
                            <label for="phone" class="col-2 col-form-label">{{ __('Phone') }}:</label>
                            <div class="col-6">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="<?php echo __('Phone');?>" value="<?php echo htmlentities($row->phone);?>"/>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        <div class="form-group row">
                            <label for="address" class="col-2 col-form-label">{{ __('Address') }}:</label>
                            <div class="col-6">
                                <textarea name="address" id="address" class="form-control" placeholder="<?php echo __('Address');?>" cols="30" rows="5"><?php echo $row->address;?></textarea>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        <div class="form-group row">
                            <label for="city" class="col-2 col-form-label">{{ __('City') }}:</label>
                            <div class="col-6">
                                <input type="text" name="city" id="city" class="form-control" placeholder="<?php echo __('City');?>" value="<?php echo htmlentities($row->city);?>"/>
                            </div>
                        </div>

                        <div class="btn-group offset-md-2">
                            @php
                                $Form_btn = new Form_btn();
                                echo $Form_btn->buttons($form_buttons);
                            @endphp
                        </div>

                    </div>



                </div>



            </div>

            <div class="col-lg-3">

                <div class="card card-custom" >
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('User Credential') }}
                        </h3>
                    </div>
                    <div class="card-body">
                                <select name="user_type_id" id="user_type_id" class="form-control m-select2">
                                    <option value="">Select User Type</option>
                                    <?php echo selectBox("SELECT id, user_type FROM user_types WHERE level <= '". Auth::user()->usertype->level ."'", ($row->user_type_id));?>
                                </select>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        <input type="text" name="username" id="username" class="form-control mt-5" placeholder="<?php echo __('Username');?>" value="<?php echo htmlentities($row->username);?>"/>

                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        <input type="password" name="password" id="password" class="form-control mt-5" placeholder="<?php echo __('Password');?>" value=""/>
                    </div>
                </div>

                {{-- <div class="kt-portlet" data-ktportlet="true">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon"> <i class="flaticon2-image-file"></i> </span>
                                <h3 class="kt-portlet__head-title"> {{ __('Photo') }} </h3>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <input disabled type="hidden" name="photo--rm" value="{{ echo $row->photo }};">
                                @php
                                    $file_input = `<input type="file" name="image" accept="gif,jpg,jpeg,png" name="photo" id="photo" class="form-control custom-file-input" placeholder="{{ __('Photo') }}" value="{{ ($row->photo) }}" >`;
                                    $thumb_url = asset_url("{$_info->module}/" . $row->photo);
                                    $delete_img_url = admin_url('ajax/delete_img/' . $row->id . '/photo', true);
                                    echo thumb_box($file_input, $thumb_url, $delete_img_url);
                                @endphp
                                <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span></div>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div>
    </form>
    <!--end::Form-->
@endsection

{{-- Scripts --}}
@section('scripts')
    <script>

        $("form#users").validate({
            // define validation rules
            rules: {
                'user_type_id': {
                    required: true,
                },
                'first_name': {
                    required: true,
                },
                'email': {
                    required: true, email: true,
                },
                'username': {
                    required: true,
                },
                'password': {
                    required: true, minlength: 8, maxlength: 8,
                },
            },
            /*messages: {
            'user_type_id' : {required: 'User Type is required',},'first_name' : {required: 'First Name is required',},'email' : {required: 'Email is required',email: 'Email is not valid',},'username' : {required: 'Username is required',},'password' : {required: 'Password is required',minlength: 'Password must be at least 8 character\'s',maxlength: 'Password maximum 8 character\'s',},    },*/
            //display error alert on form submit
            invalidHandler: function (event, validator) {
                KTUtil.scrollTop();
                //validator.errorList[0].element.focus();
            },
            submitHandler: function (form) {
                form.submit();
            }

        });

        @if($row->id > 0)
        $('#password').rules('remove');
        @endif
    </script>
@endsection
