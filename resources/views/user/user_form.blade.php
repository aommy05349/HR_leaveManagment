@extends("layouts.app")
@section("content")
<div class="row justify-content-md-center">
        <form method="POST" action="{{ url('user/'.$user->id) }}"  enctype="multipart/form-data" autocomplete="off" id="form-user" >
                {{ csrf_field() }}
                {{ method_field(empty($user->id) ? 'POST' : 'PUT') }}
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}"/>
          <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Information</h4>
                    <div class="row">
                      <div class="col offset-md-5" >    
                        <label class="col-sm-5 col-form-label">Profile</label>                 
                            <div class="input-group mb-3">
                                <img alt="avatar" id="inputGroupFile01" class="img-responsive" data-id="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : 0  }}"  src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : asset('images/noimage.png') }}" height="150" width="200">
                                <button type="button" class="close avatar-close" style="{{ $user->getFirstMediaUrl('avatar') != null ? '' :'visibility:hidden;'  }}">
                                  <span aria-hidden="true" class="fa fa-times"></span>
                                </button>
                        </div> 
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">User Name</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="checkEmtriesUsername" name="username" value="{{ $user->username }}" />
                            </div>
                            {{--  <span ></span>  --}}
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row ">
                            <label class="col-sm-5 col-form-label">Full Name</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control"  name="fullname" value="{{ $user->full_name }}"  />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Nick Name</label>
                             <div class="col-sm-7">
                                <input type="text" class="form-control" name="nickname" value="{{ $user->nick_name }} "/>
                             </div>
                        </div>
                       </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                            <label for="exampleInputEmail1">Email address</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" placeholder="Enter email"  name="email" value="{{ $user->email }}" >
                             </div>
                        </div>
                       </div>
                      </div>
                      <div class="row ">
                            <div class="col-md-6">
                              <div class="form-group row password-form">
                                  <label class="col-sm-5 col-form-label">Password</label>
                                   <div class="col-sm-7 ">
                                      <input type="password" placeholder="Enter password" class="form-control"  name="password"  />
                                   </div>
                              </div>
                             </div>
                            <div class="col-md-6">
                             <div class="form-group row password-form">
                                    <label class="col-sm-5 col-form-label">Password Confirmation</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" placeholder="password confirmation" name="password_confirmation"   />
                                    </div>
                             </div>
                             </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label">Level</label>
                                <select name="level" class="form-control selectpicker" id="level">  
                                  <option value="">Please Select </option>
                                  @foreach( $levels as $level)
                                        <option value="{{ $level->level }}" {{ $user->level == $level->level ? 'selected' :'' }}>{{ $level->level }}</option>
                                  @endforeach   
                                </select>
                      
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Birth Date</label>
                                <div class="col-sm-7">
                                    <input  class="form-control" name="birthdate" id="BirthDate" value="{{ $user->birthdate }}"/>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Start Working Date</label>
                            <div class="col-sm-7">
                              <input  class="form-control" name="start_working_date" id="StartWorkingDate" value="{{ $user->start_working_date }}"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Stop Working Date</label>
                                <div class="col-sm-7">
                                    <input  class="form-control" name="stop_working_date" id="StopWorkingDate" value="{{ $user->stop_working_date }}" />
                                </div>
                            </div>
                            
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group row">
                                  <label class="control-label">Status</label>
                                  <select name="status" class="form-control selectpicker" id="status">  
                                    <option value="">Please Select </option>
                                    @foreach( $status as $key => $item)
                                        <option value="{{ $item->status }}" {{ $user->status == $item->status ?'selected' :'' }}>{{ $item->status }}</option>
                                    @endforeach       
                                  </select>
                          </div>
                        </div> 
                          <div class="col-6">
                          <div class="form-group row">
                              <label class="control-label">Position</label>
                              <select name="position" class="form-control selectpicker" id="position">  
                                <option value="">Please Select </option>
                                @foreach( $positions as $position)
                                      <option value="{{ $position->position }}" {{ $user->position == $position->position ? 'selected' :'' }}>{{ $position->position }}</option>
                                @endforeach   
                              </select>
                    
                          </div>                       
                      </div>  
                      </div>
                      

                      <div class="row">
                          <div class="col-md-6">                
                                  <div class="form-group row">
                                      <label class="col-sm-5 col-form-label">Rank</label>
                                      <select name="rank" class="form-control selectpicker" id="rank">  
                                          <option value="">Please Select </option>
                                          @foreach( $rankings as $ranking)
                                            <option value="{{ $ranking->rankings }}" {{ $user->rank == $ranking->rankings ? 'selected' :'' }}>{{ $ranking->rankings }}</option>
                                          @endforeach    
                                        </select>
                                      
                              </div>
                          </div>
                          <div class="col-md-6">                
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">Contract</label>
                                  <select name="contract" class="form-control selectpicker" id="contract">  
                                      <option value="">Please Select </option>
                                      @foreach( $contracts as $contract)
                                        <option value="{{ $contract->contracts }}" {{ $user->contract == $contract->contracts ? 'selected' :'' }}>{{ $contract->contracts }}</option>
                                      @endforeach     
                                    </select>
                                  
                          </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-3">
                                <button type="submit" class="btn btn-success mr-2" id="btn-submit-ajax">save</button>&nbsp;
                            </div>
                            <div class="col-2"></div>
                            <div class="col-3">
                                <button type="reset"  class="btn btn-light"  id="btn-reset-ajax">Cancel</button>
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
  <script src="{{ mix('js/jquery.datetimepicker.full.js')  }}"></script> 
  <script src="{{ mix('js/datatable/dropzone.js') }}"></script>
  <script src="{{ mix('js/datatable/user.js') }}"></script>
  
@endsection