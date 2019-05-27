<?php

namespace App\Http\Requests;

use App\Models\Users;
use Illuminate\Foundation\Http\FormRequest;

class UserConfigurationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method()=='PUT'){
                $rules = [
                    'username' => 'required|min:6',
                    'email'=> 'required|email',           
                ];
                if ($this->request != null && sizeof($this->all()) > 0){ 
                    $user = Users::where('id',$this->user_id)->firstOrFail();
                    if ($user->email != $this->email ) {
                        $rules['email'] ='required|email|unique:users,email';
                    }
                    if ($user->username != $this->username ) {
                        $rules['username'] ='required|unique:users,username';
                    }
                    if ($this->password != null) { 
                        $rules['password'] = 'required|confirmed|min:6';
                    }
                } 
            }else{
                $rules = [
                    'username' => 'required|min:6',
                    'email'=> 'required|email',
                    'password' => 'required|confirmed|min:6',          
                ];
                if ($this->request != null && sizeof($this->all()) > 0){ 
                    $users = Users::all();
                    foreach( $users as $user){
                        if ($user->email != $this->email ) {
                            $rules['email'] ='required|email|unique:users,email';
                        }
                        if ($user->username != $this->username ) {
                            $rules['username'] ='required|unique:users,username';
                        }
                    }
                                        
                } 
            }
            return $rules;
    }
}
