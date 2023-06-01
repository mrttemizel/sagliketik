<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')| Mpanel - Yönetim Sistemleri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Mpanel - Yönetim Sistemleri" name="description" />
    <meta content="murattemizel" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/my-image/mt.svg')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend.components._partials._head-css')

</head>

<body>
@section('body')
    @include('backend.components._partials._body')
@show
<!-- Begin page -->
<div id="layout-wrapper">

    @include('backend.components._partials._topbar')

    <!-- removeNotificationModal -->
    <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- ========== App Menu ========== -->
    @include('backend.components._partials._sidebar')


    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

      @include('backend.components._partials._footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


@include('backend.components._partials._customizer')


@include('backend.components._partials._vendor-scripts')

</body>

</html>
