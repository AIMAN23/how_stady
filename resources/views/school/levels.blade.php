<div class="col-sm-12">
    <div class="bs-example" data-example-id="panel-without-body-with-table">
        <div class="panel panel-primary">
            <div class="panel-heading">المستويات الدراسية : {{--count($countlevels)--}} مستويات</div>
                {{-- @foreach ($levels as $level) --}}
                <span><b><a href="{{route('back')}}">Back to Pages List ></a></b></span>
                <a href="levels{{-- $level->id --}}">
                    <div class="row list-group-item page-title-list">
                        <div class="col-xs-5  btn btn-default">
                        {{-- $level->LevelNeme --}}
                        </div>
                        <div class="col-xs-4 pull-right">
                            <div><a href="levels/{{-- $level->id --}}/delete" class="btn btn-danger pull-right">Delete</a> </div>
                        </div>
                    </div>
                </a>
                {{-- @endforeach --}}
            </div> 
        </div>
        {{--$levels->links()--}}
    
        <div class="row list-group-item">
            <form method="POST" action="addlevel">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="LevelNeme" class="form-control" placeholder="Add LevelNeme . . .">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
