@extends('layouts.app')

@section('content')
@php
$lang=app()->getLocale();
@endphp
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-9">
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-titel">{{ __('lang.ok send email ') }}</h3>
            </div>

            <div class="card-body text-lg">
               <br>
               <br>
               <br>
               
               <a href="{{ route('step2' , $school['uuid']) }}" >{{ __('lang.step2') }}</a>
               <blockquote dir="rtl">
                  <h2>{{ session('status') }}</h2>
                  <b>xxx</b>
                  <p>{{ __('lang.step.1.true') }}</p>
                 
               </blockquote>

            </div>
      </div>
   </div>
</div>
</div>
@endsection