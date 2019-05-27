@extends("layouts.app")
@section("content")
<div class="row justify-content-md-center">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/leave/create') }}"><button class="btn btn-inverse-info btn-fw" >Leave Request</button></a>
            </div>
            <div class="card-body">
               <h4 class="card-title">Leave History</h4>     
             
               <div class="table-responsive">
                   <table class="table table-striped" id="leave-table">
                        <thead>
                            <tr>
                                <th>Leave On</th>
                                <th>Total(day)</th>
                                <th>Type</th>
                                <th>Status </th>
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
        <script src="{{ mix('js/datatable/leavehistory.js') }}"></script>
@endsection