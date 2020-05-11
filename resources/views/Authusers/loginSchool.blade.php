@extends('layouts.app')

@section('content')
{{--
    <div class="row">   
        <form action="{{ route('loginSchool') }}" method="POST" class="form-control">
            @csrf
            <input type="text" name='usercode' class="form-control">
            <input type="text" name='password' class="form-control">
            <input type="submit" class="">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="float-left">
                    <p>
                         <hr>
                        {{ session('datalogin.taypuser') ?? ''}} <br>
                        {{ session('datalogin.backurl') ?? ''}} <br>
                        {{ session('datalogin.oldurl') ?? ''}} <br>
                    </p>
                </div>
                <div class="card-header">
                    <div class="pr-2 float-left"><a class="btn btn-primary" href="{{ session('datalogin.backurl') ?? session('datalogin.oldurl')  }}">{{ __('lang.back') }}</a></div>
                    <h2 class="">{{ __('Login_Admin_School') }}</h2>
                </div>

                <div class="card-body">
                    <!--  -->
                        <a class="btn btn-primary" href="tel:+967772540888">tel</a>
                        <a class="btn btn-primary" href="mailto:alyosofi36@gmil.com">send Email</a>
                        
                    <!--  -->
                    
                    <form method="POST" action="{{ route('loginSchool') }}">
                        @csrf

                        <div class="form-group row">
                        
                            <label for="usercode" class="col-md-4 col-form-label text-md-right">{{ __('usercode') }}</label>

                            <div class="col-md-6">
                                <input id="usercode" type="usercode" class="form-control @error('usercode') is-invalid @enderror" name="usercode" value="{{ old('usercode') }}" required autocomplete="usercode" autofocus>

                                @error('usercode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{-- route('password.request') --}}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection