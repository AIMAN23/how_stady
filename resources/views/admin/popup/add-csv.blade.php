<div class="modal fade" id="modal-add-csv">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">level</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{{-- مودل اظافة الطلاب --}}
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">{{ __('admin.add student') }}</h3>
					</div>
					<div class="card-body">
						<!-- form ajax -->
						<fieldset style="border:1px blue solid; margin: 10px;padding: revert;">
							<legend style="width: auto; padding: 10px;">{{ __('admin.add student') }}</legend>

							<form id="addcsv" enctype="multipart/form-data">
								<div class="form-group">
									<label for="level">{{ __('admin.levels') }}</label>
									<select class="form-control form-control-sm " name="level_uuid" id="level_uuid"
										aria-placeholder="اختر المرحلة الدراسية">
										<option value="" selected>{{ __('admin.levels') }}</option>
										@foreach (session('levels') as $level)
										<option value="{{ $level->uuid }}">{{ __('lang.Level.'.$level->name) }}</option>
										@endforeach
									</select><br>
									<span id="error_levels" style="color:brown;"></span>
								</div>
								<input type="text" name="description" id="description" class="form-control-sm" placeholder="ملاحظة"><br>
								<span id="error_description" style="color:brown;"></span>
								<input type="file" name="csv" id="#csv" class="form-control-sm"><br>
								<span id="error_csv" style="color:brown;"></span>
								{{-- <input type="text" name="level_uuid" id="description"> --}}
								<div class="modal-footer justify-content-between">
									<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
									<input type="submit" value="حفظ" class="btn btn-info">
									{{-- <button type="button" class="btn btn-primary">حفظ </button> --}}
								</div>
								
							</form>

						</fieldset>
					</div>
				</div>
				{{-- انتهاء المودل --}}
			</div>
			
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>