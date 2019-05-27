@extends("layouts.app")
@section("content")
<div class="row justify-content-md-center">
        <form method="PUT" action="{{ url('profile/'.$user->id) }}"  enctype="multipart/form-data" id="form-profile" >
                {{ csrf_field() }}
                {{-- {{ method_field(empty($user->id) ? 'POST' : 'PUT') }} --}}
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}"/>
          <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Profile</h4>
                    <div class="row">
                      <div class="col offset-md-5" >   
                        <div class="input-group mb-3">
                          <img alt="avatar" id="inputGroupFile01" class="img-responsive" data-id="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : 0  }}"  src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : asset('images/noimage.png') }}" height="150" width="200">
                          <button type="button" class="close avatar-close" style="{{ $user->getFirstMediaUrl('avatar') != null ? '' :'visibility:hidden;'  }}">
                            <span aria-hidden="true" class="fa fa-times"></span>
                          </button>
                        </div> 
                      </div>
                    </div>
                      <div class="row mt-4">
                        <div class="col-md-6">
                          <div class="form-group row ">
                            <label class="col-sm-5 col-form-label">User Name</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="checkEmtriesUsername" name="username" value="{{ $user->username }}" />
                            </div>
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
                                      <input type="password" placeholder="password confirmation" class="form-control" name="password_confirmation"   />
                                  </div>
                              </div>
                             </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Level : </label>
                                <label class="col-sm-5 col-form-label">{{ $user->level }}</label>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row BirthDate" style="display:none">
                                <label class="col-sm-5 col-form-label">Birth Date</label>
                                <div class="col-sm-7">
                                    <input  class="form-control" name="birthdate" id="BirthDate" value="{{ $user->birthdate }}"/>
                                </div>
                            </div>
                            <div class="form-group row showBirthdate">
                              <label class="col-sm-4 col-form-label">Birth Date</label>
                              <div class="col-sm-5">
                                  <span class="showtime-birthdate "></span>
                                  <input type="hidden" id='showtime-birthdate' class="form-control"  value="{{ $user->birthdate }}" />
                                </div>
                                <input class="btn btn-success  col-sm-3" id="ChangBirth" type="button" value="Change">
                             </div>
                        </div> 
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Start Working Date :</label>
                              <span class="start-working-date col-sm-5"></span>
                               <input type="hidden" id='start-working-date' class="form-control"  value=" {{ $user->start_working_date }}" />
                         </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Stop Working Date :</label>
                                <span class="stop-working-date col-sm-5"></span>
                                <input type="hidden" id='stop-working-date' class="form-control"  value=" {{ $user->stop_working_date }}" /> 
                              </div>     
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Status :</label>
                              <label class="col-sm-5 col-form-label">{{ $user->status }}</label>       
                          </div>
                        </div> 
                          <div class="col-6">
                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Position :    </label>
                              <label class="col-sm-5 col-form-label">{{ $user->position }}</label>
                          </div>                       
                      </div>  
                      </div>
                      <div class="row">
                          <div class="col-md-6">                
                              <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Rank :</label>
                                  <label class="col-sm-5 col-form-label">{{ $user->rank }}</label>    
                              </div>
                          </div>
                          <div class="col-md-6">                
                              <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Contract :</label>
                                  <label class="col-sm-5 col-form-label">{{ $user->contract  }}</label>       
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
  <script src="{{ mix('js/datatable/profile.js') }}"></script>
@endsection