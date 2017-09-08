@extends('admin.layouts.app')

@section('body')
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/dashboard') }}">{{ 'Mommy\'s Secret' }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i>個人資料</a>
                </li>
                <li>
                    @if(Auth::check())
                        <a href="{{ url('logout') }}">
                            <i class="fa fa-sign-out fa-fw"></i> Logout
                        </a>
                    @else
                        <a href="{{ url('login') }}">
                            <i class="fa fa-sign-in fa-fw"></i> Login
                        </a>
                    @endif
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> 數據報表</a>
                        </li>
                        <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                            <a href="{{ url ('shippingRecord') }}"><i class="fa fa-shopping-cart fa-fw"></i> 訂單管理</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                            <a href="{{ url ('members') }}"><i class="fa fa-user fa-fw"></i> 會員管理</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                            <a href="{{ url ('itemCategory') }}"><i class="fa fa-download fa-fw"></i> 到貨管理</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                            <a href="{{ url ('remitRecord') }}"><i class="fa fa-money fa-fw"></i> 對帳管理</a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @yield('section')
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection
