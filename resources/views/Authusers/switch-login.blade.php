@extends('layouts.app')

@section('content')

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
                <div class="card-header">{{ __('Login') }}</div>
                <label for="">{{ session('backUrl') }}</label>
                <div class="card-body">
                    <form method="POST" action="{{ route('switch.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="usercode" class="col-md-4 col-form-label text-md-right">{{ __('usercode') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="tayp-login">
                                    <option value="nell" selected> {{ __('lang.usre tayp') }}</option>
                                    <option value="student">طالب</option>
                                    <option value="teacher">معلم</option>
                                    <option value="admin">Admin</option>
                                </select>


                            </div>
                        </div>

                        

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('next') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection