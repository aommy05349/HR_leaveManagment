<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leaves;
use App\Models\Users;
use Yajra\DataTables\DataTables; 
use App\Http\Requests\LeaveConfigurationRequest;
use App\Mail\CheckLeavesRequest;
use Spatie\MediaLibrary\Models\Media;
use Mail;
use Auth;
Use DB;

class LeaveAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leaves::all();
        return view('leaveApp.leaveApp_list',['leaves'=>$leaves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }
    public function storeApp1(Request $request,$id)
    {
        $leaves = Leaves::find($id);
        \Log::info($leaves);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leaves = Leaves::find($id);
        $avatar = $leaves->getMedia('images')->first();
       
        return view('leaveApp.leaveApp_form',['leaves'=>$leaves, 'avatar' => $avatar,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function leavesAccept(LeaveConfigurationRequest  $request, $id)
    {
      
        $leaves = Leaves::findOrFail($id);
        $leaves->startdate = $request->startdate;
        $leaves->enddate = $request->enddate;
        $leaves->leavetype = $request->leavetype;
        $leaves->reason = $request->reason;
        $leaves->user_id = $request->user_id;
        $leaves->full_name = $request->full_name;
        $leaves->status = 'APPROVE';
        $leaves->note =  !empty($request->note)?$request->note:null;
        $validated = $request->validated();
        $leaves->save();
        $users = Users::find($request->user_id);
         Mail::to($users->email)->send(new CheckLeavesRequest($leaves)); 
             
       
        return response()->json(['Message'=>'success', 'status'=>(int)true]);
    }
    public function leavesReject(LeaveConfigurationRequest  $request, $id)
    {
        $leaves = Leaves::findOrFail($id);
        $leaves->startdate = $request->startdate;
        $leaves->enddate = $request->enddate;
        $leaves->leavetype = $request->leavetype;
        $leaves->reason = $request->reason;
        $leaves->user_id = $request->user_id;
        $leaves->full_name = $request->full_name;
        $leaves->status = 'REJECT';
        $leaves->note =  !empty($request->note)?$request->note:null;
        $validated = $request->validated();
        $leaves->save();

        $users = Users::find($request->user_id);
        Mail::to($users->email)->send(new CheckLeavesRequest($leaves)); 

        return response()->json(['Message'=>'success', 'status'=>(int)true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function data(Request $request)
    {
        return Datatables::of(Leaves::query())->make(true);
        
    }
    public function sendMailtoApprove(Request $request,$id){
            $leaves = Leaves::find($id);
            $users = USers::find($leaves->user_id);
    }
}
