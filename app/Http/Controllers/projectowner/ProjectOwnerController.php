<?php

namespace App\Http\Controllers\projectowner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectOwnerController extends Controller
{
    public function index()
    {
        return view('/backend/projectowner/project_dashboard');
    }
}
