<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveConfigurationRequest extends FormRequest
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
            return [
                    'startdate' => 'required',
                    'enddate' => 'required',
                    'leavetype' => 'required',
                    'reason' => 'required',
                    'note' => 'required',

                ];
        }else{
            
            return [
                    'onedate' => 'required_if:leaveDate,==,0',
                    'startdate' => 'required_if:leaveDate,==,1',
                    'enddate' => 'required_if:leaveDate,==,1',
                    'leavetype' => 'required',
                    'reason' => 'required',
                   

            ];
           
              

        }
    }
}
