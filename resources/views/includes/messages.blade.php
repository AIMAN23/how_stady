@if($errors->any()) 
    <div dir="{{ session('dir') }}" class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error) 
                <li>
                    {!! $error !!}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div dir="{{ session('dir') }}" class="alert alert-success">
        {{session('status')}}
    </div>
@endif
{{--    --}}
@if(session('success') )
    <div dir="{{ session('dir') }}" class="alert alert-success">
        {!! session('success') ?? ''!!}
    </div>
@endif

@if(session('w') )
    <div dir="{{ session('dir') }}" class="alert alert-warning">
        <p>{!! session('w') ?? '' !!}</p>
        <a href="{{ session('link') }}" class="btn btn-danger">delete</a>
        <a href="{{ Request()->URL() }}" class="btn btn-danger">back</a>
    </div>
    @endif
@if(session('d') )
    <div dir="{{ session('dir') }}" class="alert alert-success">
        {!! session('d') ?? '' !!}
    </div>
    @endif
