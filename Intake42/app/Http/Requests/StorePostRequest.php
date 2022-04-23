<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
        return [
            'title'=> [
                'required', 
                Rule::unique('posts', 'title')->ignore($this->post),
                'min:3'
            ], 
            'description'=> ['required','min:10'], 

            // to handle hacks >>gives user id is required in creating case/
            // 'user_id'=>['required','exists:users,id'], 
        ];
    }
}
