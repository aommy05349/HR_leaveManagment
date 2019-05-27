<?php
namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Leaves;
use App\Models\LeaveTypes;
use Spatie\MediaLibrary\Models\Media;
use Yajra\DataTables\DataTables; 
use Illuminate\Http\Request;
use App\Http\Requests\LeaveConfigurationRequest;
use App\Mail\NewLeaveRequest;
use Mail;
use Auth;
Use DB;
use Carbon\Carbon;

class LeaveController extends Controller
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
        $users = Users::all();
        return view('leave.leave_list',['leaves'=>$leaves,'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // \Log::info($request);
        $leaveTypes = LeaveTypes::all(); 
        return view('leave.leave_form',[
            'user' => new Leaves(),
            'leaveTypes' => $leaveTypes,
            ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveConfigurationRequest $request)
    {
        $start = Carbon::parse($request->startdate);
        $stop = Carbon::parse($request->enddate);
       
        $diffDate = $start->diffInDays($stop);
        $diffTime = $start->diffInHours($stop);
        
        \Log::info('*******************');
        \Log::info($diffTime);
        $leaves = new Leaves();
        $leaves->startdate = !empty($request->startdate)? $request->startdate : $request->onedate;
        $leaves->enddate = !empty($request->enddate)? $request->enddate : $request->onedate;
        $leaves->leavetype = $request->leavetype;
        $leaves->reason = $request->reason;
        $leaves->user_id = $request->user_id;
        $leaves->full_name = $request->full_name;
        if($request->onedate){
            $leaves->total = '1';
        }else{
            if($diffTime <= 4){
                $leaves->total = '0.5';
            }else{
                $leaves->total = $diffDate + 1;
            } 
        }
     
        $leaves->status = 'PENDING';
        $leaves->note =  !empty($request->note)?$request->note:null;
        $validated = $request->validated();
        $leaves->save();
        
        $users = Users::all()->where('level','=','ADMIN');
        foreach ($users as $user){
            $allmail[] = $user->email;      
        }

           Mail::to($allmail)->send(new NewLeaveRequest($leaves)); 
           
        return response()->json(['leaves'=> $leaves]);
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTotalLeave(Request  $request, $id)
    {
       
        $leaves = Leaves::findOrFail($id);
        $leaves->total = $request->diffDays;
        $leaves->save();
        return response()->json(['Message'=>'success', 'status'=>(int)true]);

    }
    public function update(LeaveConfigurationRequest  $request, $id)
    {
        $leaves = Leaves::findOrFail($id);
        $leaves->note =!empty($request->note)?$request->note:null;
        $leaves->startdate = $request->leaveOn;
        $leaves->enddate = $request->leaveEnd;
        $leaves->leavetype = $request->leavetype;
        
        $leaves->reason = $request->reason;
        if($request->approve){
            $leaves->status = 'APPROVE';
        }else{
            $leaves->status = 'REJECT';
        }
        $leaves->note =  !empty($request->note)?$request->note:null;
        $validated = $request->validated();
        
        $leaves->save();
        return view('leaveApp.leaveApp_list');
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
        return Datatables::of(Leaves::where('user_id', Auth::user()->id)->orderBy('startdate', 'desc'))->make(true); 
    }

   
    public function uploadfile(Request $request)
    {
         \Log::info($request);
         \Log::info('****************');
            $leaves = Leaves::find($request->user_id);
            if($request->avatar != NULL){
                $leaves->clearMediaCollection('avatar');
                $leaves->addMediaFromRequest('avatar')->toMediaCollection('avatar');
            }
        return response()->json(['Message'=>'success', 'status'=>(int)true]);
    }
}
