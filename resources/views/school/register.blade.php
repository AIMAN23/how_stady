@extends('layouts.app')

@section('content')
@php
$lang=app()->getLocale();
@endphp
<div class="container">
	{{-- <div id="errors" class="row justify-content-center">
		@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>
					{{$error}}
				</li>
				@endforeach
			</ul>
		</div>
		@endif

		@if (session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
		@endif
	</div> --}}
	<div class="row justify-content-center">
		<div class="col-md-9">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-titel">{{ __('lang.New_School') }}</h3>
				</div>

				<div class="card-body text-lg">

					<form action="{{ route('school.seve') }}" method="post" enctype="multipart/form-data">
						<!-- _token -->
						@csrf
						<!-- name -->
						<div class="form-group row">
							<label for="name" class="col-md-3 col-form-label">{{__('lang.school_name_ar')}}</label>
							<div class="col-md-4">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
									name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<!-- bransh -->
							<div class="col-md-4">
								<input id="bransh" type="text" class="form-control " name="bransh" value="{{ old('bransh') }}"
									placeholder="{{ __('lang.bransh') }}" required autocomplete="bransh" autofocus />
							</div>
						</div>
						<!-- email -->
						<div class="form-group row">
							<label for="school_email" class="col-md-3 col-form-label">{{__('lang.school_email')}}</label>
							<div class="col-md-8">
								<input id="school_email" type="email" class="form-control @error('email') is-invalid @enderror"
									name="email" value="{{ old('email') }}" required autocomplete="school_email" autofocus />
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<!-- wep -->
						<div class="form-group row">
							<label for="wep" class="col-md-3 col-form-label">{{__('lang.school wep')}}</label>
							<div class="col-md-8">
								<input id="wep" type="text" class="form-control @error('wep') is-invalid @enderror" name="wep"
									value="{{ old('wep') }}" required autocomplete="wep" autofocus />
								@error('wep')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<!-- tel -->
						<div class="form-group row">
							<label for="tel" class="col-md-3 col-form-label">{{__('lang.tel')}}</label>
							<div class="col-md-8">
								<input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel"
									value="{{ old('tel') }}" required autocomplete="tel" autofocus />
								@error('tel')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<!-- fax -->
						<div class="form-group row">
							<label for="fax" class="col-md-3 col-form-label">{{__('lang.fax')}}</label>
							<div class="col-md-8">
								<input id="fax" type="text" class="form-control @error('fax') is-invalid @enderror" name="fax"
									value="{{ old('fax') }}" required autocomplete="fax" autofocus />
								@error('fax')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<!-- logo -->
						<div class="form-group row">
							<label for="file" class="col-md-3 col-form-label">{{__('lang.school_logo')}}</label>
							<div class="col-md-8">
								<div class="custom-file">
									<input type="file" value="{{ old('logo') }}" name="logo"
										class="custom-file-input @error('logo') is-invalid @enderror" id="validatedCustomFile" />
									<label class="custom-file-label" for="validatedCustomFile">{{__('lang.school_logo')}}</label>
									<div class="invalid-feedback">
										@error('logo')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<br>
						<br>
						<!-- address inputs [ country - cite - street - Zip ] -->
						<label for="address" class="col-md-3 ">{{ __('lang.address school') }}</label>
						<div id="address" class="form-group row">
							
							<!-- country -->
							<div class="col-md-3">
								{{-- <label></label> --}}
								<select name="country" class="form-control custom-select @error('country') is-invalid @enderror" aria-placeholder="{{__('lang.country')}}"
									require>
									<legend>{{__('lang.country')}}</legend>
									@include('includes.country_'.$lang)
								</select>
								@error('country')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<!-- cite -->
							<div class="col-md-3">
								<input id="cite" type="text" class="form-control @error('cite') is-invalid @enderror"
									value="{{ old('cite') }}" name="cite" placeholder="{{__('lang.cite')}}"
									required="required" />
								@error('cite')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<!-- street -->
							<div class="col-md-3">
								<input id="street" type="text" class="form-control @error('street') is-invalid @enderror"
									value="{{ old('street') }}" name="street" placeholder="{{__('lang.street')}}"
									required="required" />
								@error('street')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<!-- Zip -->
							<div class="col-md-3">
								<input id="zip" type="number" class="form-control @error('zip') is-invalid @enderror"
									value="{{ old('zip') }}" name="zip" placeholder="{{__('lang.Zip')}}" maxlength="6" min="0"
									tabindex="0" />
								@error('zip')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<!-- submit -->
						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{__('lang.Register')}}
								</button>
							</div>
						</div>
						
						<!--  school_massge  -->
						{{-- <div class="form-group">
							<label for="school_massge" class="col-md-3 col-form-label text-md-right">{{__('lang.school_massge')}}</label>
							<textarea value="{{ old('school_massge') }}" style="width: 100%;" name="school_massge" type="textarea"
							id="article-ckeditor" placeholder="1234 Main St">{{__('lang.school_massge')}}</textarea>
						</div> --}}
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
