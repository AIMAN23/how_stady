@extends('layouts.app')

@section('content')
<style type="text/css">
        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
</style>
<div class="">
    <div class="">
        <div class="">
            <div class="card">
                <div class="card-header">{{__('lang.home')}}</div>

                <div class="card-body">
        <div class="flex-center position-ref full-height">
           

            <div class="content">
                <div class="title m-b-md">
                    {{__('lang.home')}}
                </div>

                <br><a class="btn btn-primary" href="{{ route('login') }}">{{ __('lang.Login') }}</a>
<br>                <br><a class="btn btn-primary" href="{{ route('new') }}">{{ __('lang.Register') }}</a>
<br>                <br><a class="btn btn-primary" href="{{ route('d') }}">{{ __('lang.dashbord') }}</a>
<br>                <br><a class="btn btn-primary" href="{{ route('dashbord') }}">{{ __('lang.dashbord') }}</a>

               <div class="links">
                    <a href="\chart-line">chart-line</a>
                    <span><b><a href="{{route('back')}}">Back to Pages List ></a></b></span>
                   <!--    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>-->
                </div> 
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection