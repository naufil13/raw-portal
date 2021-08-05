<!-- begin:: breadcrumb -->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">

    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        @include('admin.layouts.inc.breadcrumb')

        <div class="kt-subheader__toolbar form-btns">
            <div class="btn-group">
                @php
                    $Form_btn = new Form_btn();
                    echo $Form_btn->buttons($form_buttons);
                @endphp
                {{--<a href="{{ admin_url('form', true) }}" class="btn btn-label-brand btn-bold"><i class="flaticon-file-1"></i> Add New</a>
                <a href="#" class="btn btn-label-danger btn-bold"><i class="flaticon2-trash"></i> Delete Selected Items</a>
                <a href="{{ admin_url('export', true) }}" class="btn btn-label-instagram btn-bold"><i class="flaticon-download"></i> Export</a>
                <a href="#" class="btn kt-subheader__btn-primary">Actions &nbsp;&nbsp;<i class="flaticon2-calendar-1"></i></a>--}}
            </div>
        </div>
    </div>
</div>
<!-- end:: breadcrumb -->
