@extends('school.d')

	@section('dashbord')
					
					<div class="card">
				  		<div class="card-body">
							<div class="tab-content" id="nav-tabContent">
							 
branches v
<a class="btn btn-primary" href="{{ route('branche') }}">{{ __('lang.branche') }}</a>
							  <!--  -->
							</div>
						</div>
					</div>
	@endsection