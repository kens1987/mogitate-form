<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MogitateRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'require|int',
            'image' => 'required',
            'description' => 'required|max:120',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.int' => '数値で入力してください',
            'image.required' => '商品画像を登録してください',
            'description.required' => '商品説明を入力してください',
            'description.max:120' => '120文字以内で入力してください'
        ];
    }
}
