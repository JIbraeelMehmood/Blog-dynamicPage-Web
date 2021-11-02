<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('components.head')
<style>
    .background
    {
    background-image: url('/assets/images/2.jpg');
    background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        width: 100%;  
    }
</style>
@notifyCss
<!-- style="background-image: url('{{ asset('assets/images/b2b/graph-01.svg')}}');" -->
<body class="layout-fixed  layout-footer-fixed background" >
    <x:notify-messages />
    <div id="app">
        <nav class="navbar bg-dark navbar-expand-md ">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md">
                    <a class="navbar-brand" href="{{ url('') }}">
                        <!-- {{ config('app.name', 'BLOG') }} -->
                        <span>BLOG</span>
                    </a>
                    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                        <span class="navbar-toggler-icon">
                            
                        </span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="navbar-nav">
                            @foreach($page_use as $key=> $use)
                                <li class="nav-item"><a href="admin/{{ $use->page_name }}" class="nav-link">{{ $use->page_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
<!-- ===================================================================================== -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
<!-- ===================================================================================== -->
            </div>
        </nav>
<!-- -------------------------------------------------------------------------------------- -->
    <div class="wrapper" >
        <!-- SIDE BAR -->
<!-- --------------------------------------------------------- -->       
        <!-- Content Wrapper. Contains page content -->
        <!-- content-wrapper -->
        <div class="" style=" width: 100%;">
        <!--<main class="py-4">
            </main>-->
            <!-- Main content -->
            <section class="content  mt-2 pt-2">
                <div class="container-fluid">
                    @yield('content')
                </div><!--/. container-fluid -->
            </section>
        <!-- /.content -->
        </div>
    </div>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++  -->
</div>
@notifyJs
@extends('components.script')
</body>
<!--
-->
</html>
