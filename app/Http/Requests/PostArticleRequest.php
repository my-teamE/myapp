<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostArticleRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required',
        ];
    }
    public function message(){
        return[
            'title.required'=>'タイトルが入力されていません',
            'body.required'=>'本文が入力されていません',
        ];
    }
}
