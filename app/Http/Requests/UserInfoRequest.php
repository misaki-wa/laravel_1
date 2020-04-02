<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
			'postalcode' => ['required', 'numeric', 'digits:7'],
			'prefecture' => ['required'],
			'city' => ['required'],
			'address' => ['required'],
			'tell' => ['required', 'numeric', 'digits_between:8,11'],
			'fullname' => ['required', 'string'],
		];
	}
	public function messages()
	{
		return [
			'postalcode.required' => '郵便番号を入力してください。',
			'prefecture.required' => '都道府県を入力してください。',
			'city.required' => '市町村を入力してください。',
			'address.required' => '市町村以下の住所を入力してください。',
			'tell.required' => '電話番号を入力してください。',
			'tell.numeric' => '電話番号は8~11桁の半角数字で入力してください。',
			'tell.digits_between' => '電話番号は8~11桁の半角数字で入力してください。',
			'fullname.required' => 'お届け先氏名を入力してください。',
			'postalcode.numeric' =>'郵便番号は7桁の半角数字で入力してください。',
			'postalcode.digits' =>'郵便番号は7桁の半角数字で入力してください。',
		];
	}
}
