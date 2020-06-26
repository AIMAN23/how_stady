{{-- model form edit classroome --}}
<div class="modal fade" id="modal-edit-classroom" style="z-index: 9999990000;">
	<div class="modal-dialog">
		<div class="modal-content">
			{{-- <div class="overlay d-flex justify-content-center align-items-center">
				<i class="fas fa-2x fa-sync fa-spin"></i>
			</div> --}}
			<div class="modal-header">
				<h4 class="modal-title">model form edit classroome</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<p>One fine body&hellip;</p>
				<div class="flex-center position-ref full-height">
						<div class="content">
							<div class="title m-b-md">
								{{__('messages.Add your offer')}}
			
							</div>
							
							@if(Session::has('success'))
								<div class="alert alert-success" role="alert">
									{{ Session::get('success') }}
								</div>
							@endif
			
							<br>
							<form method="POST"  id="offerFormUpdate" action="" enctype="multipart/form-data">
								@csrf			
								{{-- <div class="form-group"> --}}
									{{-- <label for="id">{{__('level.id')}}</label> --}}
									<input type="hidden" class="form-control" value="" name="id" id="id" placeholder="{{__('level.id')}}">
									{{-- @error('id') --}}
									{{-- <small class="form-text text-danger">{{$message}}</small> --}}
									{{-- @enderror --}}
								{{-- </div> --}}
								{{-- <div class="form-group"> --}}
									{{-- <label for="uuid">{{__('level.uuid')}}</label> --}}
									<input type="hidden" class="form-control" value="" name="uuid" id="uuid" placeholder="{{__('level.uuid')}}">
									{{-- @error('uuid') --}}
									{{-- <small class="form-text text-danger">{{$message}}</small> --}}
									{{-- @enderror --}}
								{{-- </div> --}}
								<div class="form-group">
									<label for="name">{{__('level.name')}}</label>
									<input type="text" class="form-control" value="" name="name" id="name" placeholder="{{__('level.name')}}">
									@error('name')
									<small class="form-text text-danger">{{$message}}</small>
									@enderror
								</div>
								{{-- <div class="form-group"> --}}
									{{-- <label for="code">{{__('level.code')}}</label> --}}
									<input type="hidden" class="form-control" value="" name="code" id="code" placeholder="{{__('level.code')}}">
									{{-- @error('code') --}}
									{{-- <small class="form-text text-danger">{{$message}}</small> --}}
									{{-- @enderror --}}
								{{-- </div> --}}
								{{-- <div class="form-group"> --}}
									{{-- <label for="school_id">{{__('level.school_id')}}</label> --}}
									<input type="hidden" class="form-control" value="" name="school_id" id="school_id" placeholder="{{__('level.school_id')}}">
									{{-- @error('school_id') --}}
									{{-- <small class="form-text text-danger">{{$message}}</small> --}}
									{{-- @enderror --}}
								{{-- </div> --}}
								{{-- <div class="form-group"> --}}
									{{-- <label for="level_id">{{__('level.level_id')}}</label> --}}
									<input type="hidden" class="form-control" value="" name="level_id" id="level_id" placeholder="{{__('level.level_id')}}">
									{{-- @error('level_id') --}}
									{{-- <small class="form-text text-danger">{{$message}}</small> --}}
									{{-- @enderror --}}
								{{-- </div> --}}
								<div class="form-group">
									<label for="teacher_id">{{__('level.teacher_id')}}</label>
									<input type="text" class="form-control" value="" name="teacher_id" id="teacher_id" placeholder="{{__('level.teacher_id')}}">
									@error('teacher_id')
									<small class="form-text text-danger">{{$message}}</small>
									@enderror
								</div>

								
								
								
								


			
								<button id="update_offer" class="btn btn-primary">{{__('level.update')}}</button>
							</form>
			
			
						</div>
					</div>
			</div>

			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

{{-- ================================================================================== --}}
{{--modal-all-students--}}
<div class="modal fade" id="modal-all-students" style="z-index: 9999990000;">
	{{-- <div class="modal-dialog modal-xl"> --}}
	<div class="modal-dialog">
		<div class="modal-content" >
			{{-- <div class="overlay d-flex justify-content-center align-items-center">
				<i class="fas fa-2x fa-sync fa-spin"></i>
			</div> --}}
			<div class="modal-header text-sm">
				{{-- <h4 class="modal-title">modal-all-students</h4> --}}
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body" >
				{{-- <p>One fine body&hellip;</p> --}}
				<div class="flex-center position-ref full-height">
						<div class="content p-0 m-0">
							{{-- <div class="title m-b-md">
								{{__('modal-all-students')}}			
							</div>			
							<br> --}}
							{{-- table students --}}
							{{-- <div id="table-students" class="col-12 text-sm"></div> --}}
							<div class="card m-0 p-0">
								<div id="table-students" class="card-body p-0 m-0" ></div>
							</div>
			
						</div>
					</div>
			</div>

			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
{{--  --}}
{{-- 
	month : <input type="month" name="month" value="{{ date('m') }}" id=""/><br>
	month2 : <input type="month2" name="month2" value="{{ date('M') }}" id=""/><br>
	color : <input type="color" name="color" value="" id=""/><b id="=""/><"r>
	image : <input type="image" src="{{ url('lte/dist/img/AdminLTELogo.png') }}" alt="">
	number : <input type="number" name="number" value="number" id=""/><br>
	tel : <input type="tel" name="tel" value="tel" id=""/><br>
	range : <input type="range" name="range" value="" id=""/><b id="=""/><"r>
	search : <input type="search" name="search" value="search" id=""/><br>
	datetime : <input type="datetime-local" name="local" value="{{ time() }}" id=""/><br>
	week : <input type="week" name="week" value="{{ date('W') }}" id=""/><br>
	url : <input type="url" name="url" value="https://" id=""/><br>
	time : <input type="time" name="time" value="{{ date('H:i:s') }}" id=""/><br>
	date : <input type="date" name="date" value="{{ date("Y-d-M") }}" id=""/><br>
	datetime : <input type="datetime" name="datetime" value="{{ date(DATE_W3C) }}" id=""/><br>
	text : <input type="text" name="text" value="text" id=""/><br>
--}}