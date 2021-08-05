@php
    $pass_data['form_buttons'] = ['back'];
@endphp
@extends('admin.layouts.admin', $pass_data)

@section('content')
{{-- Content --}}
<!-- begin:: Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="flaticon-list-2"></i> Information
                    </h3>
                </div>

                <div class="card-body">
                    <div class="mt10"></div>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-2 ">Upload</label>
                            <div class="col-lg-6">
                                <input type="file" name="file" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <input type="submit" name="submit" class="btn btn-success" value="submit">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="kt-portlet__foot">
                    &nbsp;&nbsp;
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end:: Content -->

@endsection

{{-- Scripts --}}
@section('scripts')

@endsection
