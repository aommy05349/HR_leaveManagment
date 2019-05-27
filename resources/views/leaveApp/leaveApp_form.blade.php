@extends("layouts.app")
@section("content")
<form method="PUT" action="{{ url('/leaveApp/'.$leaves->id) }}"  enctype="multipart/form-data" id="checke-form" >
{{-- <form method="POST" action="{{ route('leaveApp.update') }}"  id="checke-form" > --}}
    {{--  {{ csrf_field() }}  --}}
    <input  id='id' type="hidden" name="id" value="{{ $leaves->id }}"  />
    <input  id='user_id' type="hidden" name="user_id" value="{{ $leaves->user_id }}"  />
    {{-- {{ $leaves->id }} --}}
<div class="row justify-content-md-center">
    <div class="col-lg-12 grid-margin">
        <div class="card border-light mb-3" >
            <div class="card-body">
                <h4 class="card-title">Leave</h4>    
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            Requested By :  &nbsp;&nbsp;
                            {{ $leaves->full_name }}
                            <input type="hidden" id='full_name' class="form-control" name="full_name" value="{{ $leaves->full_name }}" /> 
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            Leave Type :  &nbsp;&nbsp;
                            {{ $leaves->leavetype }}
                            <input  type="hidden" id='leavetype' class="form-control" name="leavetype" value="{{ $leaves->leavetype }}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            Leave on : &nbsp;&nbsp;
                            <span class="test01"></span>
                            <input type="hidden" id='leaveOn' class="form-control  " name="startdate" value="{{  $leaves->startdate }}" /> 
                            <input type="hidden" id='leaveEnd' class="form-control" name="enddate" value="{{  $leaves->enddate }}" /> 

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            Total :  &nbsp;&nbsp;
                            <span class="total"></span>
                            <input type="hidden" id='total' class="form-control"   />
                            &nbsp;&nbsp;  Days
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            Reason  : &nbsp;  &nbsp; 
                            {{  $leaves->reason }}
                            <input type="hidden" name="reason" value=" {{  $leaves->reason }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            Example file :  &nbsp;  &nbsp; 
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    @if (  $leaves->getFirstMediaUrl('avatar')  )
                                        <a  href="{{ $leaves->getFirstMediaUrl('avatar')}}"  class="btn btn-secondary btn-fw mdi mdi-file-document" target="_blank" > &nbsp;Click for see file</a>
                                    @else 
                                        <img  src="{{  asset('images/non.png') }}"  alt="logo"/>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            Status  :  &nbsp;  &nbsp;  
                            <span class="Status"></span>
                            <input type="hidden" id="status" value="{{ $leaves->status }}"> 
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            Requested on :  &nbsp;&nbsp;
                            <span class="RequestedOn"></span>
                            <input type="hidden" id='requestOn' class="form-control"  value="{{ $leaves->created_at }}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7 form-group">   
                        annotation : <textarea name="note" id="note" cols="50" rows="5" class="form-control" required>{{  $leaves->note }}</textarea>
                    </div>
                    <div class="col-5 align-self-end ">
                        <button class="btn btn-success mdi mdi-check"  name="approve" id="btn-approve-ajax" >&nbsp;Approved</button>
                        <button class="btn btn-danger mdi mdi-alert-outline" name="reject" id="btn-reject-ajax" >&nbsp;Reject</button>
                    </div>
                </div> 
           </div>
           <div class="card-footer">
                <div class="input-group">
                    <a  href="{{ url("/leaveApp") }} " ><input type="button" class="btn btn-inverse-primary btn-fw" value="Back"></a>
                </div>
           </div>

        </div>
    </div>
</div>
</form>
@endsection
@section("script") 
    <script src="{{ mix('js/datatable/dropzone.js') }}"></script>
    <script src="{{ mix('js/datatable/cheackLeave.js') }}"></script>
@endsection 
