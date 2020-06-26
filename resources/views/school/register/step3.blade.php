@extends('layouts\print')


@section('content')
@php
$lang=app()->getLocale();
$lr=($lang == 'en') ? 'left' : 'right' ;
$dir=($lang == 'en') ? 'ltr' : 'rtl' ;
@endphp


<div class="invoice p-3 m-3 ">
   <!-- title row -->
   <div class="row">
      <div class="tdx col-12">
         <h4>
            <i class="fas fa-globe"></i>{{ 'HowStudy, Inc.' }}
         </h4>
         <small class="float-right">
            <b>Account:</b>
            @if($school->status ==3) {{ ' FREE' }} 
            @elseif($school->status == 30) {{ ' PRO' }}
            @endif
         </small>
         <hr>
      </div>
      <!-- /.col -->
   </div>
   <!-- info row -->
   <div class="row invoice-info">
      <div class="col-4">
         <kbd> From </kbd>



         <address>
            <strong>{{ 'HowStudy, Inc.' }}</strong><br>
            {{-- 795 Folsom Ave, Suite 600<br> --}}
            <br>

            {{ "Yemen ,Sana'a hail 0000" }}<br>
            Phone: {{ '+967772540888' }}<br>
            Email: {{ 'HowStudy@gmail.com' }}
         </address>
      </div>
      <!-- /.col -->
      <div class="col-4">
         <kbd>To</kbd>
         {{-- <abbr>gg</abbr>
                        <del>hg</del>
                        <dd>mn</dd>
                        <bdi> mn</bdi>
                        <bdo>kj</bdo>
                        <dfn  >dfn</dfn>
                        <dl>jh</dl>
                        <dt>dt</dt>
                        <details>jh</details> --}}
         <address>
            <strong>{{ $school->name }}</strong><br><br>
            {{-- 795 Folsom Ave, Suite 600<br> --}}
            {{ $school->address->country }},{{$school->address->cite}} {{ $school->address->zip }}<br>
            tel: {{ $school->tel }}<br>
            {{-- fax: {{ $school->fax }}<br> --}}
            Email: {{ $school->email }}
            {{-- wep: {{ $school->wep }} --}}
         </address>
      </div>
      <!-- /.col -->
      <div class="col-4">
         <br><br>
         <b>Invoice {{ '# '.date_timestamp_get($school->updated_at) }}</b>
         {{-- <br> --}}
         <b>OrderID:</b> {{ $school->no }}<br>
         <b>Due:</b>{{ $school->created_at }}<br>
         <b>Date:</b>{{ $school->updated_at }}
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   <hr>

   {{-- manager --}}
   <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
      <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; ">
         {{-- style="background-color: mediumblue;" --}}
         <tr style="background-color:gainsboro;">
            <td>
               <div class="row p-0 m-0 text-sm">
                  <div class="col-6 bg- p-0 " style="text-align: right" dir="rtl">
                     {{-- {{ $school->name ?? 'scomana'}} <br> --}}

                     <br><small class="pl-3 pr-3">{{ __('lang.manager') }}</small>
                     <br>
                     <span class="text-sm"><b> {{ $manager->name ?? 'ايمن نجيب اليوسفي' }}</b></span>
                     <br>
                     <small><b>{{ __('no') }}</b> {{ $manager->no ?? 'x2no' }}</small>
                     <br>
                  </div>
                  <div class="col-6 mt-3">
                     <img src="{{ url('Images/school/'.$school->logo) }}"
                        class="img-circle w-50 elevation-2 float-right" alt="User Image">
                  </div>


               </div>
               <hr><small class="bg-info">{{ $manager->uuid ?? 'x2uuid' }}</small>
            </td>
            <th></th>
            {{-- agent --}}
            <td>
               <div class="row p-0 m-0 text-sm">
                  <div class="col-6 bg- p-0 " style="text-align: right" dir="rtl">
                     {{-- {{ $school->name ?? 'scomana'}} <br> --}}

                     <br><small class="pl-3 pr-3">{{ __('lang.agent') }}</small>
                     <br>
                     <span class="text-sm"><b> {{ $agent->name ?? 'ايمن نجيب اليوسفي' }}</b></span>
                     <br>
                     <small><b>{{ __('no') }}</b> {{ $agent->no ?? 'x2no' }}</small>
                     <br>
                  </div>
                  <div class="col-6 mt-3">
                     <img src="{{ url('Images/school/'.$school->logo) }}"
                        class="img-circle w-50 elevation-2 float-right" alt="User Image">
                  </div>


               </div>
               <hr><small class="bg-info">{{ $agent->uuid ?? 'x2uuid' }}</small>
            </td>
         </tr>
      </table>
   </div>

   {{-- admins --}}
   <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
      <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; ">
         {{-- style="background-color: mediumblue;" --}}
         <tr style="background-color:gainsboro;">
            <td>
               <div class="row p-0 m-0 text-sm">
                  <div class="col-6 bg- p-0 " style="text-align: right" dir="rtl">
                     {{-- {{ $school->name ?? 'scomana'}} <br> --}}

                     <br><small class="pl-3 pr-3">{{ __('lang.admins') }}</small>
                     <br>
                     <span class="text-sm"><b> {{ $admins->name ?? 'ايمن نجيب اليوسفي' }}</b></span>
                     <br>
                     <small><b>{{ __('no') }}</b> {{ $admins->no ?? 'x2no' }}</small>
                     <br>
                  </div>
                  <div class="col-6 mt-3">
                     <img src="{{ url('Images/school/'.$school->logo) }}"
                        class="img-circle w-50 elevation-2 float-right" alt="User Image">
                  </div>


               </div>
               <hr><small class="bg-info">{{ $admins->uuid ?? 'x2uuid' }}</small>
            </td>
            <th></th>
            {{-- financial --}}
            <td>
               <div class="row p-0 m-0 text-sm">
                  <div class="col-6 bg- p-0 " style="text-align: right" dir="rtl">
                     {{-- {{ $school->name ?? 'scomana'}} <br> --}}

                     <br><small class="pl-3 pr-3">{{ __('lang.financial') }}</small>
                     <br>
                     <span class="text-sm"><b> {{ $financial->name ?? 'ايمن نجيب اليوسفي' }}</b></span>
                     <br>
                     <small><b>{{ __('no') }}</b> {{ $financial->no ?? 'x2no' }}</small>
                     <br>
                  </div>
                  <div class="col-6 mt-3">
                     <img src="{{ url('Images/school/'.$school->logo) }}"
                        class="img-circle w-50 elevation-2 float-right" alt="User Image">
                  </div>


               </div>
               <hr><small class="bg-info">{{ $financial->uuid ?? 'x2uuid' }}</small>
            </td>
         </tr>
      </table>
   </div>

   {{-- secretary --}}
   <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
      <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; ">
         {{-- style="background-color: mediumblue;" --}}
         <tr style="background-color:gainsboro;">
            <td>
               <div class="row p-0 m-0 text-sm">
                  <div class="col-6 bg- p-0 " style="text-align: right" dir="rtl">
                     {{-- {{ $school->name ?? 'scomana'}} <br> --}}

                     <br><small class="pl-3 pr-3">{{ __('lang.secretary') }}</small>
                     <br>
                     <span class="text-sm"><b> {{ $secretary->name ?? 'ايمن نجيب اليوسفي' }}</b></span>
                     <br>
                     <small><b>{{ __('no') }}</b> {{ $secretary->no ?? 'x2no' }}</small>
                     <br>
                  </div>
                  <div class="col-6 mt-3">
                     <img src="{{ url('Images/school/'.$school->logo) }}"
                        class="img-circle w-50 elevation-2 float-right" alt="User Image">
                  </div>


               </div>
               <hr><small class="bg-info">{{ $secretary->uuid ?? 'x2uuid' }}</small>
            </td>
            <th></th>
            {{-- specialist --}}
            <td>
               <div class="row p-0 m-0 text-sm">
                  <div class="col-6 bg- p-0 " style="text-align: right" dir="rtl">
                     {{-- {{ $school->name ?? 'scomana'}} <br> --}}

                     <br><small class="pl-3 pr-3">{{ __('lang.specialist') }}</small>
                     <br>
                     <span class="text-sm"><b> {{ $specialist->name ?? 'ايمن نجيب اليوسفي' }}</b></span>
                     <br>
                     <small><b>{{ __('no') }}</b> {{ $specialist->no ?? 'x2no'  }}</small>
                     <br>
                  </div>
                  <div class="col-6 mt-3">
                     <img src="{{ url('Images/school/'.$school->logo) }}"
                        class="img-circle w-50 elevation-2 float-right" alt="User Image">
                  </div>


               </div>
               <hr><small class="bg-info">{{ $specialist->uuid ?? 'x2uuid' }}</small>
            </td>
         </tr>
      </table>
   </div>
   <!-- /.row -->

   <!-- this row will not appear when printing -->
   <br>
   <hr>
   <div class="row  mt-4 no-print">
      <div class="col-12">
         <a href="#" onclick="window.print();" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
         <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
            Payment
         </button>

      </div>
   </div>
</div>

@endsection