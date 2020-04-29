@extends('school.d')

	@section('dashbord')
					
					<div class="card">
				  		<div class="card-body">
							<div class="tab-content" id="nav-tabContent">
							 

teachers v
<a class="btn btn-primary" href="{{ route('teacher') }}">{{ __('lang.teacher') }}</a>
							  <!--  -->
							</div>
						</div>
					</div>
	@endsection