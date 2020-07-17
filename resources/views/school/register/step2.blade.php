@extends('layouts.app')

@section('side')
@section('content')
@php
$lang=app()->getLocale();
$lr=($lang == 'en') ? 'left' : 'right' ;
$dir=($lang == 'en') ? 'ltr' : 'rtl' ;
@endphp
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card card-primary">
            <div class="card-header">
               <div class="card-titel">
                  <div class="row text-{{ $lr }}" dir="{{ $dir }}">
                     <div class="col-10">
                        <h3>{{ $school->name }}</h3>
                        <small>{{ $school['bransh'] ?? 'e' }}</small>
                           
                           
                           {{-- {{ $school['id'] ?? 'e' }} --}}
                           {{-- {{ $school['uuid'] ?? 'e' }} --}}
                           {{-- {{ $school['status'] ?? 'e' }} --}}
                           {{-- {{ $school['logo'] ?? 'e' }} --}}
                           {{-- {{ $school['name'] ?? 'e' }} --}}
                           
                           <label>{{__('lang.email').' : ' }} {{ $school->email ?? 'e' }}</label>
                           <label>{{__('lang.wep').' : ' }} {{ $school->wep ?? 'e' }}</label>
                           <label>{{__('lang.fax').' : ' }} {{ $school->fax ?? 'e' }}</label>
                           <label>{{__('lang.tel').' : ' }} {{ $school->tel ?? 'e' }}</label>
                           {{-- {{ $school['address_id'] ?? 'e' }} --}}
                           {{-- {{ $school['password'] ?? 'e' }} --}}
                           {{-- {{ $school['created_at'] ?? 'e' }} --}}
                           {{-- {{ $school['updated_at'] ?? 'e' }} --}}
                     </div>
                     <div class="col-2 " style="background-image: url({{ url("Images/school/".$school->logo) }}); background-repeat: no-repeat; background-size: contain;">
                        {{-- <img src="{{ url('Images/school/'.$school->logo) }}" class="img-circle w-100 elevation-2 float-right" alt="User Image"> --}}
                     </div>
                  </div>
               </div>
            </div>
         <!-- form start -->
         <form role="form" action="{{ route('step2.seve' , $school->uuid  ) }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $school->uuid }}" name="school_uuid">
            <div class="card-body text-lg">

               <div class="row">
                  <!-- left column -->
                  <div class="col-md-7">
                     <!-- general form elements -->
                     <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">{{ __('lang.users') }}</h3>
                     </div>
                     <!-- /.card-header -->
                        <div class="card-body">
                           {{--  --}}
                           <div class="form-group">
                           <label for="manager">{{ __('lang.manager') }}</label>
                           <input type="text" class="form-control @error('manager') is-invalid @enderror " value="{{ old('manager') }}" id="manager" name="manager" placeholder="{{ __('lang.Enter name manager') }}">
                          @error('manager')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                        </div>
                           {{--  --}}
                           <div class="form-group">
                           <label for="agent">{{ __('lang.agent') }}</label>
                           <input type="text" class="form-control @error('agent') is-invalid @enderror " value="{{ old('agent') }}" id="agent" name="agent" placeholder="{{ __('lang.Enter name agent') }}">
                          @error('agent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                        </div>
                           {{--  --}}
                           <div class="form-group">
                           <label for="school_admin">{{ __('lang.school_admin') }}</label>
                           <input type="text" class="form-control @error('school_admin') is-invalid @enderror " value="{{ old('school_admin') }}" id="school_admin" name="school_admin" placeholder="{{ __('lang.Enter name school_admin') }}">
                          @error('school_admin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                        </div>
                           {{--  --}}
                           <div class="form-group">
                           <label for="financial">{{ __('lang.financial') }}</label>
                           <input type="text" class="form-control @error('financial') is-invalid @enderror " value="{{ old('financial') }}" id="financial" name="financial" placeholder="{{ __('lang.Enter name financial') }}">
                          @error('financial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                        </div>
                           {{--  --}}
                           <div class="form-group">
                           <label for="secretarie">{{ __('lang.secretarie') }}</label>
                           <input type="text" class="form-control @error('secretarie') is-invalid @enderror " value="{{ old('secretarie') }}" id="secretarie" name="secretarie" placeholder="{{ __('lang.Enter name secretarie') }}">
                          @error('secretarie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                        </div>
                           {{--  --}}
                           <div class="form-group">
                           <label for="specialist">{{ __('lang.specialist') }}</label>
                           <input type="text" class="form-control @error('specialist') is-invalid @enderror " value="{{ old('specialist') }}" id="specialist" name="specialist" placeholder="{{ __('lang.Enter name specialist') }}">
                          @error('specialist')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                        </div>
                           {{--  --}}
                        </div>
                        <!-- /.card-body -->

                        
                     </div>
                     <!-- /.card -->
                  </div>
                  {{--  --}}
                  <!-- right column -->
                  <div class="col-md-5 float-{{ $lr }}">
                     <!-- iCheck -->
                     <div class="card card-success">
                        <div class="card-header">
                           <h3 class="card-title">{{ __('lang.check levels') }}</h3>
                        </div>
                  
                        <div class="card-body">
                           <!-- Minimal red style -->
                                 <!-- Minimal style -->
                                 <div class="row" >
                                    <div class="col-md-12">
                                       <!-- checkbox -->
                                       <div class="form-group clearfix">
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L1as" name="L1as" checked required />
                                             <label for="L1as" class="w-100 ">
                                                   {{ __('lang.Level.L1as') }}
                                             </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L2as" name="L2as" checked required />
                                             <label for="L2as" class="w-100 ">
                                                   {{ __('lang.Level.L2as') }}
                                             </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L3as" name="L3as" checked required />
                                             <label for="L3as" class="w-100 ">
                                                   {{ __('lang.Level.L3as') }}
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <!-- checkbox -->
                                       <div class="form-group clearfix">
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L4as" name="L4as" />
                                             <label for="L4as" class="w-100 ">
                                                   {{ __('lang.Level.L4as') }}
                                             </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L5as" name="L5as" />
                                             <label for="L5as" class="w-100 ">
                                                   {{ __('lang.Level.L5as') }}
                                             </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L6as" name="L6as" />
                                             <label for="L6as" class="w-100 ">
                                                   {{ __('lang.Level.L6as') }}
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    
                                 </div>
                                 <!-- Minimal red style -->
                                 <div class="row " >
                                    <div class="col-md-12">
                                       <!-- checkbox -->
                                       <div class="form-group clearfix">
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L7as" name="L7as" />
                                             <label for="L7as" class="w-100 ">
                                                   {{ __('lang.Level.L7as') }}
                                             </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L8as" name="L8as" />
                                             <label for="L8as" class="w-100 ">
                                                   {{ __('lang.Level.L8as') }}
                                             </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L9as" name="L9as" />
                                             <label for="L9as" class="w-100 ">
                                                   {{ __('lang.Level.L9as') }}
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <!-- checkbox -->
                                       <div class="form-group clearfix">
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L1th" name="L1th" />
                                             <label for="L1th" class="w-100 ">
                                                   {{ __('lang.Level.L1th') }}
                                             </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L2th" name="L2th" />
                                             <label for="L2th" class="w-100 ">
                                                   {{ __('lang.Level.L2th') }}
                                             </label>
                                          </div>
                                          <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="L3th" name="L3th" />
                                             <label for="L3th" class="w-100 ">
                                                   {{ __('lang.Level.L3th') }}
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>                        
                        </div>
                        <!-- /.card-body -->
                        
                     </div>
                  </div>
               </div>

            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">{{ __('lang.Submit') }}</button>
            </div>
         </form>
         </div>
      </div>
   </div>
</div>
@endsection