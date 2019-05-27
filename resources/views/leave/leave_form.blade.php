@extends("layouts.app")
@section("content")
<div class="row justify-content-md-center">
        <form method="POST" action="{{ url('/leave') }}"  enctype="multipart/form-data" id="form-leave" >
                {{ csrf_field() }}
                 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/> 
                 <input type="hidden" name="full_name" value="{{ Auth::user()->full_name }}"/> 
          <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Leave Request</h4>
                    <div class="row">
                        <div class="col-6">
                            <input type="radio" name="leaveDate" id="btn-oneDays" value="0">&nbsp;1&nbsp;Day &nbsp; &nbsp;&nbsp; 
                            <input type="radio" name="leaveDate" id="btn-moreDays" value="1" checked >&nbsp; Other
                        </div>
                    </div>
                    <div class="row mt-4  One-date ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class='input-group date' data-provide="datepicker">
                                  <label class="col-sm-5 col-form-label">Date to Leave</label> 
                                  <input  id='date-to-leave' class="form-control" name="onedate" /> 
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row mt-4  More-than" >
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class='input-group date' data-provide="datepicker">
                                <label class="col-sm-5 col-form-label">From Date</label>
                                  <input  id='startDate' class="form-control" name="startdate" /> 
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <div class='input-group date' data-provide="datepicker">
                                <label class="col-sm-5 col-form-label">To Date</label>
                                  <input  id='endDate'  class="form-control" name="enddate"/>
                              </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label class="control-label">Leave Type</label> 
                                <select name="leavetype" class="form-control selectpicker" id="status">  
                                    <option value="">Please Select </option>
                                    @foreach( $leaveTypes as $leaveType)
                                        <option>{{ $leaveType->leavetype }}</option>
                                    @endforeach       
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="control-label">Leave Reason</label>
                            </div>
                          </div>
                        </div>
                          <div class="row">

                              <div class="col">
                                  <div class="form-group">
                                      <textarea name="reason" id="" cols="70" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            {{--  id="inputGroupFile01"  --}}
                    <div class="row">
                        <div class="col">                           

                          </div>
                    </div>

                    <div class="row">
                            <div class="col-2">
                                <button type="submit" class="btn btn-success mr-2" id="btn-submit-ajax">save</button>&nbsp;
                            </div>
                            <div class="col">
                                <button type="reset" class="btn btn-light" id="btn-reset-ajax">Cancel</button>
                            </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>
@endsection
@section("script") 
  <script src="{{ mix('js/datatable/dropzone.js') }}"></script>
  <script src="{{ mix('js/jquery.datetimepicker.full.js')  }}"></script> 
  <script src="{{ mix('js/datatable/leave.js') }}"></script>
@endsection 
