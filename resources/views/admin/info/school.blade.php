@extends('layouts.admin')


@section('main-header-li-left')
{{-- @include('admin.include.main-header-li-left') --}}
@endsection

@section('main-header-li-right')
{{-- @include('admin.include.main-header-li-right') --}}

@section('sidebar-li')
{{-- @include('admin.include.sidebar-li') --}}
@endsection

{{-- عنوان الصفحة :معلومات المدرسة --}}
@section('content-header')<h1>{{ __('admin.info school') }}</h1>@endsection
{{-- انتها العنوان --}}

{{-- تعريف متغيرات  من اجل تغير اتجاه الصفحة عربي\انجليزي --}}
@php
$lang=app()->getLocale();
$lr=($lang == 'en') ? 'left' : 'right' ;
$dir=($lang == 'en') ? 'ltr' : 'rtl' ;
@endphp
{{-- انتها تعريف المتغيرات --}}


{{-- بداية محتوا الصفحة : --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- بداية عرض معلومات المدرسة الاساسية --}}
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    {{-- header --}}
                    <div class="card-titel">
                        <div class="row text-{{ $lr }}" dir="{{ $dir }}">
                            {{-- name bransh --}}
                            <div class="col-10">
                                <h3>{{ session('school.name') }}
                                        <small>{{ $school['bransh'] ?? 'e' }}</small>
                                    </h3>
                                    <dt>{{ _('lang.email').' : ' }} {{ session('school.email') ?? 'e' }}</dt>
                                    <dt>{{ _('lang.wep').' : ' }} {{ session('school.wep') ?? 'e' }}</dt>
                                    <dt>{{ _('lang.fax').' : ' }} {{ session('school.fax') ?? 'e' }}</dt>
                                    <dt>{{ _('lang.tel').' : ' }} {{ session('school.tel') ?? 'e' }}</dt>
                            </div>
                            {{-- logo --}}
                            <div class="col-2 "
                                style="background-image: url({{ url("Images/school/".session('school.logo')) }}); background-repeat: no-repeat; background-size: contain;">
                                {{-- <img src="{{ url('Images/school/'.session('school.logo')) }}" class="img-circle
                                w-100 elevation-2 float-right" alt="User Image"> --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- info --}}
                <div class="card-body text-{{ $lr }}" dir="{{ $dir }}">
                    <dl class="">
                        <dt class="">{{ __('school.status app') }}</dt>
                        <dd class="">{{ __('school.status.s'.session('school.status')) }}</dd>
                        <dt class="">{{ __('school.name') }} </dt>
                        <dd class=""> {{ session('school.name') ?? 'e' }} </dd>
                        <dt class="">{{ __('school.country') }} </dt>
                        <dd class=""> {{ Auth::user()->school->address->country }} </dd>
                        <dt class="">{{ __('school.cite') }} </dt>
                        <dd class=""> {{ Auth::user()->school->address->cite }} </dd>
                        <dt class="">{{ __('school.street') }} </dt>
                        <dd class=""> {{ Auth::user()->school->address->street }} </dd>
                        <dt class="">{{ __('school.zip code') }} </dt>
                        <dd class=""> {{ Auth::user()->school->address->zip }} </dd>
                        <dt class="">{{ __('school.id') }} </dt>
                        <dd class=""> {{ session('school.id') ?? 'e' }} </dd>
                        {{-- <dt class="">{{ __('school.uuid') }} </dt> --}}
                        {{-- <dd class=""> {{ session('school.uuid') ?? 'e' }} </dd> --}}
                        {{-- <dt class="">{{ __('school.logo') }} </dt> --}}
                        {{-- <dd class=""> {{ session('school.logo') ?? 'e' }} </dd> --}}
                        <dt class="">{{ __('school.created_at') }} </dt>
                        <dd class=""> <time> {{ session('school.created_at') ?? 'e' }} </time></dd>
                        {{-- <dt class=""> {{ __('school.updated_at') }} </dt> --}}
                        {{-- <dd class=""> {{ session('school.updated_at') ?? 'e' }} </dd> --}}
                    </dl>
                </div>
            </div>
        </div>
        {{-- بداية عرض معلومات المدرسة الاساسية --}}
    </div>
    {{-- انتها التوسيط --}}
</div>
@endsection
{{-- انتهاء محتوا الصفحة --}}


{{-- بداية اوامر الجيكويري --}}
@section('ajax')
    <script>
        $(document).ready(function(){
            // لايوجد اوامر حاليا
        });
    </script>
@endsection
{{-- انتهاء اوامر الجيكويري --}}