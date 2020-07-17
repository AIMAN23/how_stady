@extends('layouts.center')

@section('body')
<div class="login-box ">
    <div class="login-logo">
        <a href="#"><b>{{ __('lang.NotesApp') }}</b>{{ ', ice' }}</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('lang.manager') }}</p>
            <form method="POST" action="{{ route('manager.login.seve') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="usercode" type="usercode" placeholder="{{ __('E-Mail Address') }}" class="form-control 
                    @error('email') is-invalid @enderror
                    @error('no') is-invalid @enderror
                    @error('usercode') is-invalid @enderror
                    " name="usercode" value="{{ old('usercode') }}" required autocomplete="usercode" autofocus>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('usercode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" placeholder="{{ __('Password') }}"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>


                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            
            <p class="mt-3 mb-1">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </p>
            <p class="mb-0">
                {{-- <a href="register.html" class="text-center">Register a new membership</a> --}}
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection




@section('script')
{{--add  js 

    //hare...
    
--}}
@endsection