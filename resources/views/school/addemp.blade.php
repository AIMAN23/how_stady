@extends('layouts.app')

@section('content')
@php    $lang =LaravelLocalization::getCurrentLocale();    @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary " style="color: #fff;">
                	{{ __('lang.New_emplooyee') }}
					<span><b><a href="{{route('back')}}">Back to Pages List ></a></b></span>
                </div>
                <div class="card-body">
					<form method="POST" action="#">
						<!--  -->
						@csrf
						<!--  -->
					    <div class="form-group row">
					        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('lang.emplooyee_name_ar')}}</label>
					        <div class="col-md-6">
					            <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus>
							</div>
					    </div>
					    <!--  -->
					    <div class="form-group row">
					        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('lang.emplooyee_name_en')}}</label>
					        <div class="col-md-6">
					            <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus>
							</div>
					    </div>
					    <!--  -->
					    <div class="form-group row">
					        <label for="emp_email" class="col-md-4 col-form-label text-md-right">{{__('lang.emplooyee_email')}}</label>
					        <div class="col-md-6">
					            <input id="emp_email" type="email" class="form-control " name="emp_email" value="" required autocomplete="emp_email" autofocus>
							</div>
					    </div>
					    <!--  -->
						{{--
							<div class="custom-file">
						    <input type="file" value="{{ old('emp_logo') }}" name="emp_logo" class="custom-file-input" id="validatedCustomFile" required>
						    <label  class="custom-file-label" for="validatedCustomFile">{{__('lang.emplooyee_logo')}}</label>
						    <div class="invalid-feedback">Example invalid custom file feedback</div>
						</div>
						--}}
						<div class="form-group row">
							<label for="Temp" class="col-md-4 col-form-label text-md-right">{{__('Temp')}}</label>
						 	<div class="col-md-6">
								<select id="Temp" class="form-control">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</div>
						</div>
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