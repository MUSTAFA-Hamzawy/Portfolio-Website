@php
    $needsAjax = true;
    $float = LaravelLocalization::getCurrentLocaleDirection() == 'rtl' ? 'left' : 'right';
@endphp
    <!DOCTYPE html>
<html lang="en" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('PageTitle')</title>
    @include('Includes.css')
    <style>
        div.dataTables_wrapper div.dataTables_filter {
            text-align: {{$float}};
        }
        .float-sm-right{
            float: {{$float}} !important;
        }
    </style>
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('Includes.preloader')
    @include('Includes.navbar')
    @include('Includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('Includes.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('Includes.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@yield('AjaxScript')
@include('Includes.js')
@yield('js')
</body>
</html>
