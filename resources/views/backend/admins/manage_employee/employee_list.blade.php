@extends('layouts.header')
@section('content')
    @include('layouts.aside.admin_aside')
    <section id="main-content">
        <section class="wrapper site-min-height">
            {{-- <h3><i class="fa fa-angle-right"></i> Blank Page</h3> --}}
            <div class="row-12 mt justify-content-md-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="dmbox">
                        <div class="service-icon">
                            <h4>จัดการรายชื่อพนักงาน</h4>
                            <a href="{{ url('/admin/add_employee') }}"><button class="btn btn-theme02"><i class="fa fa-plus"></i> &nbsp; เพิ่มชื่อผู้ใช้</button></a>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8 justify-content-md-center">
                  <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                      <h4><i class="fa fa-edit"></i> &emsp; รายชื่อพนักงาน</h4>
                      <hr>
                      <thead>
                        <tr>
                          <th><i class="fa fa-user"></i> #</th>
                          <th class="hidden-phone"><i class="fa fa-user"></i>ชื่อ - นามสกุล</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <a href="basic_table.html#">Company Ltd</a>
                          </td>
                          <td class="hidden-phone">Lorem Ipsum dolor</td>
                          <td>12000.00$ </td>
                          <td><span class="label label-info label-mini">Due</span></td>
                          <td>
                            <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
              </div>
        </section>
        <!-- /wrapper -->
    </section>          
    
@endsection
@section("script")
    <script src=" {{ asset('assets/backend/lib/advanced-datatable/js/jquery.js') }}" ></script>
    <script src=" {{ asset('assets/backend/lib/advanced-datatable/js/jquery.dataTables.js') }}" ></script>
    <script src=" {{ asset('assets/backend/lib/advanced-datatable/js/jquery.dataTables.js') }}" ></script>
    <script src=" {{ asset('assets/backend/lib/advanced-datatable/js/DT_bootstrap.js') }}" ></script>
@endsection