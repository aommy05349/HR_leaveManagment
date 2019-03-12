<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('backend/admins/admin_dashboard');
    }
    public function empList()
    {
        return view('backend/admins/manage_employee/employee_list');
    }
    public function storeEmployeeForm()
    {
        return view('backend/admins/manage_employee/employee_add_form');
    }
}
