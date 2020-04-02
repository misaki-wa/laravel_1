<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
			'name' => ['required'],
			'description' => ['required', 'max:255'],
			'price' => ['required', 'integer', 'min:0'],
			'stock' => ['required', 'integer', 'min:0'],
        ];
	}
	public function messages()
	{
		return [
			'name.required' => '商品名を入力してください。',
			'description.required' => '商品詳細を入力してください。',
			'description.max' => '商品詳細は255文字以内で入力してください。',
			'price.required' => '値段を入力してください。',
			'price.integer' => '値段は半角整数で入力してください。',
			'price.min' => '値段は0円以上に設定してください。',
			'stock.required' => '在庫数を入力してください。',
			'stock.integer' => '在庫数は半角整数で入力してください。',
			'stock.min' => '在庫数は0以上を入力してください。',
		];
	}
}
