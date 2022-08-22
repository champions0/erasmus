<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Promevent') }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="/_dashboard/css/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/_dashboard/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/_dashboard/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="/_dashboard/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="/_dashboard/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/_dashboard/css/colors.min.css" rel="stylesheet" type="text/css">
    <link href="/_dashboard/css/custom.css" rel="stylesheet" type="text/css">
    <link href="/_dashboard/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="/_dashboard/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
    <link href="/_dashboard/css/dashboard_style.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@yield('css')
<!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="/_dashboard/js/jquery.min.js"></script>
    <script src="/_dashboard/js/bootstrap.bundle.min.js"></script>
    <script src="/_dashboard/js/uniform.min.js"></script>
    <script src="/_dashboard/js/plugins/loaders/blockui.min.js"></script>
    <script src="/_dashboard/js/plugins/ui/ripple.min.js"></script>
    <script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
    <script src="/_dashboard/js/custom.js"></script>
    <script src="/_dashboard/js/bootstrap-datepicker.min.js"></script>
    <script src="/_dashboard/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
    <script src="https://kit.fontawesome.com/14cfa96293.js" crossorigin="anonymous"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="/_dashboard/js/app.js"></script>
    <!-- /theme JS files -->
    @yield('scripts')

</head>

<body class="navbar-top">

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light fixed-top">

    <!-- Header with logos -->
{{--    <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center my_navbar">--}}
{{--        <div class="navbar-brand navbar-brand-md">--}}
{{--            <div class="d-flex align-items-center">--}}
{{--                <img class="user__avatar" src="{{ auth()->user()->image->path ?? '/img/avatar.png' }}" alt="User Photo">--}}
{{--                <a href="{{route('dashboard.index')}}" class="d-inline-block" style="color: white">--}}
{{--                    <h5 class="mb-0 text-white text-shadow-dark user__name">{{Auth::user()->name}}</h5>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
    <!-- /header with logos -->



    <!-- Mobile controls -->
    <div class="d-flex flex-1 d-md-none">
        <div class="navbar-brand mr-auto">
            <a href="{{route('dashboard.index')}}" class="d-inline-block" title="Logo">
                <img src="/_dashboard/images/logo_dark.png" alt="Logo">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>

        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <!-- /mobile controls -->

    <!-- Navbar content -->
    <div class="collapse navbar-collapse my__navbar" id="navbar-mobile">
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" style="color: #fff;font-size: 15px;"
                   class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <span>{{Auth::user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-switch2"></i> {{ __('Logout') }}
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <!-- /navbar content -->

</div>
<!-- /main navbar -->

<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md my-sidebar">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user-material">
                <div class="collapse" id="user-nav">
                    <ul class="nav nav-sidebar">
                        <li class="nav-item">

                            <a class="nav-link"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i>
                                <span> {{ __('Logout') }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /user menu -->
            <!-- Main navigation -->
        @include('dashboard.layouts._sidebar')
        <!-- /main navigation -->
        </div>
        <!-- /sidebar content -->
    </div>
    <!-- /main sidebar -->
    <!-- Main content -->
    <div class="content-wrapper pt-4">
        @yield('content')
    </div>
    <!-- /main content -->
</div>

<!-- /page content -->
@yield('script')
<script>


    setTimeout(() => {
        const wrapper = $('.message-wrapper > .alert');

        if (wrapper) {
            wrapper.hide(500)
        }
    }, 2000)

   $('.custom-btn').on('click', function () {
        setTimeout(() => {
            if ($(this).attr('data-toggle') !== 'modal') {
                $(this).attr('disabled', true);
            }
        })
    })

</script>
</body>
</html>

