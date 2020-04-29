						<div class="col-sm-12">
						    <span><b><a href="{{route('back')}}">Back to Pages List ></a></b></span>

						    <div class="row list-group-item-info page-title">
						        <div class="col-xs-12">
						        الشعب الدراسية ل :- {{-- $level->LevelNeme --}}
						        </div>
						    </div>

						    <!-- foreach ($level->notes as $note) -->
						    <div class="row list-group-item">
						        <div class="col-xs-5  btn btn-default">
						        {{-- $note->text --}}
						        </div>
						        <div class="col-xs-4 pull-right">
						            <button type="button" class="btn btn-danger pull-right">Delete</button> 
						            <button type="button" class="btn btn-default pull-right">Edit</button> 
						        </div>
						    </div>
						    <!-- endforeach -->


						    <div class="row list-group-item">
						        <form method="POST" action="/addnote">
						            {{ csrf_field() }}
						            <div class="input-group">
						            <input type="hidden" name="level_id" class="form-control" type="hidden" value="{{-- $level->id --}}">     
						            <input type="text" name="text" class="form-control" placeholder="Add Note . . .">
						            <span class="input-group-btn">
						                <button class="btn btn-default" type="submit">Add</button>
						            </span>
						            </div>
						        </form>
						    </div>
						</div>