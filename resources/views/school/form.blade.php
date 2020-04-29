@extends('layouts.app')

@section('content')
@php    $lang =LaravelLocalization::getCurrentLocale();    @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary " style="color: #fff;">
                {{ __('lang.New_School') }}
                <span><b><a href="{{route('back')}}">Back to Pages List ></a></b></span>
            </div>

                <div class="card-body">
					<form method="POST" action="#">
						<!--  -->
						@csrf
						<!--  -->
					    <div class="form-group row">
					        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('lang.school_name_ar')}}</label>
					        <div class="col-md-6">
					            <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus>
							</div>
					    </div>
					    <!--  -->
					    <div class="form-group row">
					        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('lang.school_name_en')}}</label>
					        <div class="col-md-6">
					            <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus>
							</div>
					    </div>
					    <!--  -->
					    <div class="form-group row">
					        <label for="school_email" class="col-md-4 col-form-label text-md-right">{{__('lang.school_email')}}</label>
					        <div class="col-md-6">
					            <input id="school_email" type="email" class="form-control " name="school_email" value="" required autocomplete="school_email" autofocus>
							</div>
					    </div>
					    <!--  -->
						<div class="custom-file">
						    <input type="file" value="{{ old('school_logo') }}" name="school_logo" class="custom-file-input" id="validatedCustomFile" required>
						    <label  class="custom-file-label" for="validatedCustomFile">{{__('lang.school_logo')}}</label>
						    <div class="invalid-feedback">Example invalid custom file feedback</div>
						</div>
						<br>
						<br>
					    <!--  -->
					    <div class="form-group row">
							<div class="col-sm-4">
						        <select name="country" class="form-control custom-select" require>
						            <option>{{__('lang.country')}}</option>
						            @include('include.input_slecet_contere_'.$lang)
						        </select>  
						    </div>
						    <div class="col-sm-4"> 
						        <input id="input" class="form-control" value="{{ old('city') }}" name="city" placeholder="{{__('lang.city')}}" maxlength="1000" tabindex="0" required="">
						    </div>
						    <div class="col-sm-4">
						        <input id="input" class="form-control" value="{{ old('Zip') }}" name="Zip" placeholder="{{__('lang.Zip')}}" maxlength="1000" tabindex="0" required="">
						    </div>
						</div>
						<!--  -->
					    <div class="form-group">
					        {{--<label for="school_massge" class="col-md-4 col-form-label text-md-right">{{__('lang.school_massge')}}</label>--}}
  							<textarea value="{{ old('school_massge') }}" style="width: 100%;" name="school_massge" type="textarea" id="article-ckeditor" placeholder="1234 Main St" >{{__('lang.school_massge')}}</textarea>
					    </div>

					    <div class="form-group row mb-0">
					        <div class="col-md-6 offset-md-4">
					            <button type="submit" class="btn btn-primary">
					                {{__('lang.Register')}}
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
