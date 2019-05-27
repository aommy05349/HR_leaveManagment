<?php
namespace App\Http\Controllers;
use App\Models\Users;
use Spatie\MediaLibrary\Models\Media;
use Yajra\DataTables\DataTables; 
use Illuminate\Http\Request;
use App\Http\Requests\UserConfigurationRequest;
use App\Http\Requests\UpdateUserConfigurationRequest;
use App\Http\Middleware\AuthenticateAdmin;
use Illuminate\Auth\Middleware\Authenticate;

class ProfileController extends Controller
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
        //
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
        //
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
		$users->birthdate = !empty($request->birthdate)? $request->birthdate : null;
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
        //
    }
    public function manageProfile($id){

        $users = Users::findOrFAil($id);
        $avatar = $users->getMedia('images')->first();
        return view('user.profile_form',[
            'user' => $users,
            'avatar' => $avatar,
            ]);
       
    }
    public function uploadprofile(Request $request)
    {
         \Log::info($request);
            $users = Users::find($request->user_id);
            if($request->avatar != NULL){
                $users->clearMediaCollection('avatar');
                $users->addMediaFromRequest('avatar')->toMediaCollection('avatar');
            }
        return response()->json(['Message'=>'success', 'status'=>(int)true]);
    }
    public function deleteProfile($id){

        $users = Users::find($id);
        $users->clearMediaCollection('avatar');
        return response()->json(['result'=>'success']);
    }
}
