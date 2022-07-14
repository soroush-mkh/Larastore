<?php

namespace App\Http\Requests\Admin\Notify;

use Illuminate\Foundation\Http\FormRequest;

class EmailFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize ()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules ()
    {
        if ( $this->isMethod('post') )      //This Request is For Store Something
        {
            return [
                'file'   => 'required|mimes:png,jpg,jpeg,gif,zip,pdf,docx,doc,rar' ,
                'status' => 'required|numeric|in:0,1' ,
            ];
        }
        else                                        //This Request is For Store Something
        {
            return [
                'file'   => 'mimes:png,jpg,jpeg,gif,zip,pdf,docx,doc,rar' ,
                'status' => 'required|numeric|in:0,1' ,
            ];
        }
    }
}
