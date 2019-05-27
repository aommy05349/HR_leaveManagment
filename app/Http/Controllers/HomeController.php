<?php

namespace App\Http\Controllers;
use App\Models\Leaves;
use App\Models\Users;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
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
    public function index()
    {
        
        $now = Carbon::now();
        $users = Users::find(Auth::user()->id);
        $startWorkingDate = $users->start_working_date;
        $start = Carbon::parse($startWorkingDate);
        if( $now < $start ){
            $result = 0;
        }else{
            $diffDate = $start->diffInDays($now);
            $leaveTotals = $diffDate/30;
            $result = number_format($leaveTotals);
        }
        $employeeLeave = Leaves::where('user_id', Auth::user()->id)->where('status','LIKE','APPROVE')->sum('total'); 
        $totals = $result-$employeeLeave;
        $sickLeave = Leaves::where('user_id', Auth::user()->id)->where('leavetype', 'LIKE','Sick Leave')->where('startdate','<=',$now)->where('status','LIKE','APPROVE')->sum('total');
        $personalLeave = Leaves::where('user_id', Auth::user()->id)->where('leavetype', 'LIKE','Personal Leave')->where('startdate','<=',$now)->where('status','LIKE','APPROVE')->sum('total');
        $leave = Leaves::all();
        $leave = Leaves::where('user_id', Auth::user()->id)->where('startdate','>',$now)->where('status','LIKE','APPROVE')->sum('total');
        $infobirth = Users::all();        
        foreach( $infobirth as $info){
            $currentBirthday = $info->birthdate->year(date('Y'));            
            $remainBirthday = Carbon::today()->diffInDays($currentBirthday, false);
            $info->current_birthday = $currentBirthday;            
        }
        
        $infobirth = $infobirth->sortBy('current_birthday')->values();  
        
        
          
    return view('home',['totals'=>$totals,'sickLeave'=>$sickLeave,'personalLeave'=>$personalLeave,'leave'=>$leave,'infobirth'=>$infobirth]);
       
    }
}
