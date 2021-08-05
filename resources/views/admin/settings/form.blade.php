@php

    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')

    <form action="{{ admin_url('store', true) }}" class="container" method="post" enctype="multipart/form-data" id="directories">
        @csrf
        @include('admin.layouts.inc.stickybar', compact('form_buttons'))
        @if(Session::has('message') or Session::has('alert-class'))
         <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
        <input type="hidden" name="id" value="{{ $row->id }}">
        <!-- begin:: Content -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                   <div class="card-header">
                    <h3 class="card-title">
                   
                    </h3>
                   </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-3">
                                <div class="nav flex-column nav-pills mb-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" aria-controls="general"><i class="flaticon-settings"></i> &nbsp; General Setting</a>
                                    <a class="nav-link" id="header_footer-tab" data-toggle="pill" href="#header_footer" aria-controls="header_footer"><i class="flaticon2-cube-1"></i> &nbsp; Header & Footer</a>
                                    {{-- <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" aria-controls="contact"><i class="flaticon2-open-text-book"></i> &nbsp; Contact Detail</a> --}}
                                    <a class="nav-link" id="admin-tab" data-toggle="pill" href="#admin" aria-controls="admin"><i class="flaticon2-help"></i> &nbsp; Admin Setting</a>
                                    {{-- <a class="nav-link" id="social-tab" data-toggle="pill" href="#social" aria-controls="social"><i class="flaticon2-link"></i> &nbsp; Social Networks</a> --}}
                                    <a class="nav-link" id="smtp-tab" data-toggle="pill" href="#smtp" aria-controls="smtp"><i class="flaticon2-mail"></i> &nbsp; SMTP Setting</a>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content mb-5 mr-5" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="general">@include('admin.settings.general')</div>
                                    <div class="tab-pane fade" id="header_footer">@include('admin.settings.header_footer')</div>
                                    {{-- <div class="tab-pane fade" id="contact">@include('admin.settings.contact')</div> --}}
                                    <div class="tab-pane fade" id="admin">@include('admin.settings.admin')</div>
                                    {{-- <div class="tab-pane fade" id="social">@include('admin.settings.social')</div> --}}
                                    <div class="tab-pane fade" id="smtp">@include('admin.settings.smtp')</div>
                                    {{--<div class="tab-pane fade" id="widgets">@include('admin.settings.footer') </div>--}}
                                </div>
                            </div>
                        </div>


                        <div class="btn-group offset-md-3">
                            @php
                                $Form_btn = new Form_btn();
                                echo $Form_btn->buttons($form_buttons);
                            @endphp
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
    <script>

        $("form#directories").validate({
            // define validation rules
            rules: {
                'association_id': {
                    required: true,
                },
                'name': {
                    required: true,
                },
                'designation': {
                    required: true,
                },
            },
            /*messages: {
            'name' : {required: 'Name is required',},'designation' : {required: 'Designation is required',},    },*/
            //display error alert on form submit
            invalidHandler: function (event, validator) {
                KTUtil.scrollTop();
                //validator.errorList[0].element.focus();
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    </script>@endsection
