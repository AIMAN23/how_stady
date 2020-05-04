@extends('layouts.app')

@section('content')
        @include('include.navbarhome')
<div class="content">
	<div class="row m-0">
		<div class="card col-md-3 bg-info pl-0 pr-0" style="height: 100%;">
			<div class="card-body">
				<div class="">
					<div class="list-group " id="nav-tab" role="tablist">
						<a class="list-group-item list-group-item-action text-primary"  href="#xxx" role="tab" aria-controls="xxx" aria-selected="">{{__('lang.Home')}}</a>
						<a class="list-group-item list-group-item-action text-primary" id="nav-profile-tab"  href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="">{{__('lang.Profile')}}</a>
						<a class="list-group-item list-group-item-action text-primary"  href="{{route('emplooyee')}}" role="tab" aria-controls="emplooyee" aria-selected="" >{{__('lang.emplooyee')}}</a>
						<a class="list-group-item list-group-item-action text-primary"  href="{{route('student')}}" role="tab" aria-controls="student" aria-selected="" >{{__('lang.student')}}</a>
						<a class="list-group-item list-group-item-action text-primary"  href="{{route('teacher')}}" role="tab" aria-controls="teachers" aria-selected="" >{{__('lang.teachers')}}</a>
						<a class="list-group-item list-group-item-action text-primary"  href="{{route('level')}}" role="tab" aria-controls="levels" aria-selected="" >{{__('lang.levels')}}</a>
						<a class="list-group-item list-group-item-action text-primary"  href="{{route('branche')}}" role="tab" aria-controls="branches" aria-selected="" >{{__('lang.branches')}}</a>
					</div>
				</div>
			</div>
		</div>
    	<!-- <div class="row justify-content-center"> -->
    	<br>
		<div class="col-md-9">
            <div class="card">
            	<div class="card-header bg-info">xxxx
            		<span><b><a href="{{ route('back') }}">Back to Pages List ></a></b></span>
            	</div>
        		<div class="card-body"  dir="">
					@yield('dashbord')
				</div>
			</div>
        </div>
    </div>
    <!-- </div> -->
</div>
@endsection