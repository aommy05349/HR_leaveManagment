@extends("layouts.app")
@section("content")
    <div class="row justify-content-md-center">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/user/create') }}"><button class="btn btn-inverse-info btn-fw" >Add User</button></a>
                </div>
                <div class="card-body">
                   <h4 class="card-title">User List</h4>     
                   <div class="table-responsive">
                       <table class="table table-striped" id="users-table">
                            <thead>
                                <tr>
                                    <th>UserName</th>
                                    <th>Full Name</th>
                                    <th>Nick Name</th>
                                    <th>E-mail</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
        
                       </table>
                   </div>     
                </div>

            </div>
        </div>
    </div>
    <span id="user-current-user-id" data="{{ Auth::user()->id }}"></span>
    @endsection
    @section("script")
        <script src="{{ mix('js/datatable/datatable.js') }}"></script>
    @endsection