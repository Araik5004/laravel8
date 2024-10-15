<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Car Catalog - Admin Panel</title>
        <!-- Bootstrap -->
        <link href="{{asset('/administrator/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('/administrator/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
        <link href="{{asset('/administrator/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
        <link href="{{asset('/administrator/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('/administrator/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('/administrator/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

        <link href="{{asset('/administrator/css/selectize.css')}}" rel="stylesheet">
        <link href="{{asset('/administrator/css/selectize.bootstrap3.css')}}" rel="stylesheet">
        <link href="{{asset('/administrator/css/selectize.legacy.css')}}" rel="stylesheet">
        <link href="{{asset('/administrator/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
        <link href="{{asset('/administrator/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
        <link href="{{asset('/administrator/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{asset('/administrator/build/css/custom.min.css')}}" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="/admin" class="site_title">
                                <img width="150" height="50" src="/administrator/images/logo.jpg" alt="" />
                            </a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="{{asset('/administrator/images/default_avatar.png')}}" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>{{ trans('admin.welcome') }},</span>
                                <h2>{{ App\Models\Admin::getInfo()->name }} {{ App\Models\Admin::getInfo()->surname }}</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /menu profile quick info -->

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li><a href="{{ route('brands.index') }}"><i class="fa fa-user"></i>Марки</span></a></li>
                                    <li><a href="{{ route('modelcars.index') }}"><i class="fa fa-user"></i>Модели</span></a></li>
                                    <li><a href="{{ route('cars.index') }}"><i class="fa fa-user"></i>Автомобили</span></a></li>
                                    <li><a id="LogoutAdmin_2"><i class="fa fa-user"></i>Выход</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('/administrator/images/default_avatar.png')}}" alt="">{{ App\Models\Admin::getInfo()->name }} {{ App\Models\Admin::getInfo()->surname }}
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="/" target="_blank" class="nav-main-lnk">Перейти на сайт</a></li>
                                        <li><a id="LogoutAdmin"><i class="fa fa-sign-out pull-right"></i>Выход</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                            </div>

                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- footer content -->
                <footer>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{asset('/administrator/vendors/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('/administrator/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('/administrator/vendors/fastclick/lib/fastclick.js')}}"></script>
        <!-- NProgress -->
        <script src="{{asset('/administrator/vendors/nprogress/nprogress.js')}}"></script>
        <script src="{{asset('/administrator/vendors/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('/administrator/vendors/switchery/dist/switchery.min.js')}}"></script>
        <script src="{{asset('/administrator/vendors/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{asset('/administrator/vendors/pnotify/dist/pnotify.js')}}"></script>
        <script src="{{asset('/administrator/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
        <script src="{{asset('/administrator/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
        <script src="{{asset('/administrator/js/bootbox.min.js')}}"></script>
        <script src="{{asset('/administrator/js/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('/administrator/js/standalone/selectize.js')}}"></script>
        <link href="{{asset('Administrator/css/jquery.fileuploader.css')}}" rel="stylesheet">
        <script src="{{asset('Administrator/js/jquery.fileuploader.js')}}"></script>
        <script src="{{asset('Administrator/js/jquery-ui.min.js')}}"></script>
        <script>
        $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
            });
        $('#LogoutAdmin,#LogoutAdmin_2').click(function(e){
            e.preventDefault();
            $.ajax({
            url : "{{ route('LogoutAdmin') }}",
                    type : 'post',
                    dataType: 'json',
                    data: {}
            }).done(function(data)
            {
                if (data.status) {
                    location.reload();
                }
            });
        });
        $('select').selectize({
            delimiter: ',',
            persist: false
            });
        var CSRFToken = $('meta[name=csrf-token]').attr("content");

        </script>
        <script>
            $('.changeRadioButton').iCheck();
        </script>


        <!-- Custom Theme Scripts -->
        <script src="{{asset('/administrator/build/js/custom.js')}}"></script>
        @stack('js')


        <!--js for pages/... view -->
        @yield('page_script')

    </body>
</html>
