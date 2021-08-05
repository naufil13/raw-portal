@include('admin.layouts.inc.header')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    {{--@includeWhen(!$is_form, 'admin.layouts.inc.stickybar')--}}

       @include('admin.layouts.inc.alerts')


        @yield('content')

</div>


@include('admin.layouts.inc.footer')
@include('admin.layouts.inc.modal')
