<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

      public function messages()
    {
        return [
            'neme.required' => "名前を入力してください。",
            'name.max' => "191文字以内で入力してください。",
            'email.required' => "emailを入力してください。",
            'email.max' => "191文字以内で入力してください。",
            'email.min' => "8文字以上で入力してください。",
            'password.required' => "パスワードを入力してください。",
            'password.max' => "191文字以内で入力してください。",
            'password.min' => "8文字以上で入力してください。",
        ];

    }
}
