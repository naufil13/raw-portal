<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>@yield('title') | Admin</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('assets/admin/media/logos/favicon.png') }}"/>
    <!--begin::Fonts -->
    <script src="{{ asset('assets/admin/js/webfont.js') }}" type="text/javascript"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Fonts -->


    <link href="{{ asset_url('css/jquery.fancybox.min.css', true) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset_url('css/jstree.bundle.css', true) }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset_url('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset_url('plugins/global/plugins.bundle.css', true) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset_url('plugins/custom/prismjs/prismjs.bundle.css', true) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_url('css/style.bundle.css', true) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset_url('css/themes/layout/header/base/light.css', true) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_url('css/themes/layout/header/menu/light.css', true) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset_url('css/themes/layout/brand/light.css', true) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_url('css/themes/layout/aside/light.css', true) }}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">

    {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1uhklcml8aiudlxwn8zeurif2hkgr0afhyen119v6gufnv8n"></script>--}}
    <script src="{{ asset_url('js/jquery-3.3.1.min.js', true) }}"></script>
    <script src="{{ asset_url('js/jquery.countdown.min.js', true) }}"></script>

    <style>
        .table td,.table th{
            vertical-align: middle !important;
            text-align:left !important;
        }
        .menu-icon img{width:20px !important;}
    </style>
</head>
<body  id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!-- begin:: Page -->
