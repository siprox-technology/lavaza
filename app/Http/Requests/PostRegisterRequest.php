<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRegisterRequest extends FormRequest
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
        //farsi only alphabets
        $farsi_only_alphabets = '\x{0020}\x{2000}-\x{200F}\x{2028}-\x{202F}\x{0621}-\x{0628}\x{062A}-\x{063A}\x{0641}-\x{0642}\x{0644}-\x{0648}\x{064E}-\x{0651}\x{0655}\x{067E}\x{0686}\x{0698}\x{06A9}\x{06AF}\x{06BE}\x{06CC}';

        return [
            'name'=>'required|max:50|regex:/^['.$farsi_only_alphabets.']*$/u',
            'phone'=>'required|unique:users|digits:11',
            'email'=>'email|unique:users|nullable',
            'password'=>'required|confirmed',
        ];
    }
}
