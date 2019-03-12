<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {
        if(auth()->user()->isAdmin()) {
            return view('backend/admins/admin_dashboard');
        } else if(auth()->user()->isEmployee()) {
            return view('backend/employee/employee_dashboard');
        } else if(auth()->user()->isAdmin()) {
            return view('backend/projectowner/project_dashboard');
        } else {
            return view('backend/customers/customer_dashboard');
        }
}
}
