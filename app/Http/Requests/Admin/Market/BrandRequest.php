<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
                'original_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u' ,
                'persian_name'  => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u' ,
                'logo'          => 'required|image|mimes:png,jpg,jpeg,gif' ,
                'status'        => 'required|numeric|in:0,1' ,
                'tags'          => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u' ,
            ];
        }
        else                                        //This Request is For Store Something
        {
            return [
                'original_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u' ,
                'persian_name'  => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u' ,
                'logo'          => 'image|mimes:png,jpg,jpeg,gif' ,
                'status'        => 'required|numeric|in:0,1' ,
                'tags'          => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u' ,
            ];
        }
    }
}
