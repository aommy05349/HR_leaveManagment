@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-cube text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                           <p class="mb-0 text-right"> วันลาสะสมคงเหลือ</p>
                           <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">
                                    {{--  <span class="leave-total"></span>&nbsp; &nbsp;&nbsp;   --}}
                                    <span class="leave-total">{{ $totals ?$totals:'0' }}</span>&nbsp; &nbsp;&nbsp; 
                                    <input type="hidden" id="start-working-date" value="{{ Auth::user()->start_working_date }}">
                                    วัน
                                </h3>
                           </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                           <p class="mb-0 text-right"> ลาป่วย</p>
                           <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">
                                    <span class="sick-leave-total"></span></span>{{ $sickLeave ?$sickLeave:'0' }}&nbsp; &nbsp;&nbsp; 
                                    {{--  <span class="sick-leave-total"></span></span>&nbsp; &nbsp;&nbsp;   --}}
                                    <input type="hidden" id="start-working-date" value="{{ Auth::user()->start_working_date }}">
                                    วัน
                                </h3>
                           </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                           <p class="mb-0 text-right"> ลากิจ</p>
                           <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">
                                    {{--  <span class="personal-leave-total"></span>&nbsp; &nbsp;&nbsp;   --}}
                                    <span class="personal-leave-total">{{ $personalLeave ? $personalLeave :'0' }}</span>&nbsp; &nbsp;&nbsp; 
                                    <input type="hidden" id="start-working-date" value="{{ Auth::user()->start_working_date }}">
                                    วัน
                                </h3>
                           </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                           <p class="mb-0 text-right"> ลาล่วงหน้า</p>
                           <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">
                                    <span class="leave">{{ $leave ? $leave :'0' }}</span>&nbsp; &nbsp;&nbsp;
                                    <input type="hidden" id="start-working-date" value="{{ Auth::user()->start_working_date }}">
                                   วัน
                                </h3>
                           </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Up Comming Birthday</h5>
                    <input type="hidden" id="arr" value=" {{ count($infobirth) }}">
                    @foreach($infobirth as $info)
                        <div class="row ticket-card  border-bottom pb-3 mb-3 comming-birthday">
                            <div class="col-md-2">
                                <img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ $info->getFirstMediaUrl('avatar')?$info->getFirstMediaUrl('avatar'):asset('images/noimage.png') }}" alt="profile image">
                            </div>
                            <div class="ticket-details col-md-4">
                                <div class="d-flex">
                                    <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">{{ $info->full_name   }} </p>
                                    <p class="mb-0 ellipsis">({{ $info->nick_name }})</p>
                                </div>
                                <input type="hidden" id="birthdate" value="{{ $info->birthdate }}">
                                <span class="text-gray ellipsis mb-2 birth-days" >{{ ($info->birthdate)->format('j F ') }}</span>  
                            </div class="ticket-details col-md-2">
                                <p class="fa fa-calendar-o text-success font-weight-semibold mr-2 mb-0 no-wrap" @if (now()->format('j F')!=($info->birthdate)->format('j F') ) style="display:none" @endif> today is {{ $info->nick_name }} birth-days </p>
                                <p class="fa fa-calendar-o text-warning font-weight-semibold mr-2 mb-0 no-wrap" @if (Carbon\Carbon::tomorrow()->format('j F')!=($info->birthdate)->format('j F') ) style="display:none" @endif> Tomorrow is {{ $info->nick_name }} birth-days </p>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    @endsection
    @section("script") 
        <script src="{{ mix('js/datatable/employee.js') }}"></script> 
    @endsection 
    
