@extends("layouts.app")
@section("content")
<div class="row justify-content-md-center">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
               <h4 class="card-title">Leave Application</h4>     
             
               <div class="table-responsive">
                   <table class="table table-striped" id="leaveApp-table">
                        <thead>
                            <tr>
                                <th>Name Employee</th>
                                <th>Leave Type</th>
                                <th>Leave on</th>
                                <th>Total(day)</th>
                                <th>Status </th>
                                <th>Requested on</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                   </table>
               </div>     
            </div>

        </div>
    </div>
</div>
@endsection
@section("script")
        <script src="{{ mix('js/datatable/leaveApphistory.js') }}"></script>
@endsection