<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Positions;
use App\Models\Contracts;
use App\Models\Rankings;
use App\Models\Status;
use App\Models\Levels;
use Spatie\MediaLibrary\Models\Media;
use Yajra\DataTables\DataTables; 
use Illuminate\Http\Request;
use App\Http\Requests\UserConfigurationRequest;
use App\Http\Requests\UpdateUserConfigurationRequest;
use App\Http\Middleware\AuthenticateAdmin;
use Illuminate\Auth\Middleware\Authenticate;

class UserController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth.admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user.user_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Positions::all();
        $contracts = Contracts::all();
        $rankings = Rankings::all();
        $status = Status::all();
        $levels = Levels::all();
        // dd($levels->leavel);
        // return view('user.user_form',['user'=> new Users()]);
        return view('user.user_form',[
            'user' => new Users(),
            'rankings' => $rankings,
            'positions' => $positions,
            'status' => $status,
            'contracts' => $contracts,
            'levels' => $levels,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserConfigurationRequest $request)
    {          

                $users = new Users;
                // \Log::info($request->level); 
                $users->email = $request->email;
                $users->username = $request->username;
                $users->full_name = $request->fullname;
                $users->level = !empty($request->level)?$request->level:null;
                $users->nick_name = $request->nickname;
                $users->password = bcrypt($request->password);
                $users->password_confirmation = bcrypt($request->password_confirmation);
                $users->birthdate = !empty($request->birthdate)? $request->birthdate : null;
		        $users->start_working_date = !empty($request->start_working_date)? $request->start_working_date : null;
                $users->stop_working_date = !empty($request->stop_working_date)? $request->stop_working_date : null;
                $users->status =  !empty($request->status)? $request->status : null;
                $users->position = !empty($request->position)? $request->position : null;
                $users->rank = !empty($request->rank) ? $request->rank : null;
                $users->contract = !empty($request->contract) ? $request->contract : null;
                $validated = $request->validated();
                $users->save();
                return response()->json(['data'=>['users_id'=>$users->id]]);
                // $users->username = $request->username;
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
    public function edit(Request $request,$id)
    {
        $positions = Positions::all();
        $contracts = Contracts::all();
        $rankings = Rankings::all();
        $status = Status::all();
        $levels = Levels::all();
        $users = Users::findOrFAil($id);
        $avatar = $users->getMedia('images')->first();
      
        return view('user.user_form',[
            'user' => $users,
            'avatar' => $avatar,
            'positions' => $positions,
            'status' => $status,
            'contracts' => $contracts,
            'rankings' => $rankings,
            'levels' => $levels,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserConfigurationRequest $request,$id)
    {
        $users = Users::findOrFail($id);
        if(!empty($request->password)){
            $users->password = bcrypt($request->password);
        }
        
		$users->username = $request->username;
		$users->full_name = $request->fullname;
		$users->nick_name = $request->nickname;
		$users->email = $request->email;
        $users->level = !empty($request->level)?$request->level:null;
		$users->birthdate = !empty($request->birthdate)? $request->birthdate : null;
		$users->start_working_date = !empty($request->start_working_date)? $request->start_working_date : null;
        $users->stop_working_date = !empty($request->stop_working_date)? $request->stop_working_date : null;
        $users->status =  !empty($request->status)? $request->status : null;
        $users->position = !empty($request->position )? $request->position : null;
        $users->rank = !empty($request->rank) ? $request->rank : null;
        $users->contract = !empty($request->contract) ? $request->contract : null;
        $validated = $request->validated();
        
        $users->save();
       
        return response()->json(['data'=>['users_id'=>$users->id]]) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::findOrFail($id);
        $users->delete();
        return response(['status' => true, 'message'=>'success'], 200);
    }
    public function data()
    {
        return Datatables::of(Users::query())->make(true);
    }

    /**
     *   dropzone Upload Image 
     *   Use Laravel media Library
     */
   
    public function uploadImage(Request $request)
    {
         \Log::info($request);
            $users = Users::find($request->user_id);
            if($request->avatar != NULL){
                $users->clearMediaCollection('avatar');
                $users->addMediaFromRequest('avatar')->toMediaCollection('avatar');
            }
        return response()->json(['Message'=>'success', 'status'=>(int)true]);
    }

    public function deleteAvatar($id){

        $users = Users::find($id);
        $users->clearMediaCollection('avatar');
        return response()->json(['result'=>'success']);
    }

    
}
