<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arr = [
            'name' => 'required|max:255|min:2',
            'status' => ['required', Rule::in(['pending', 'in_progress', 'canceled', 'finished'])]
        ];
        if (auth()->user()->id === 1)
            array_merge($arr, ['user_id' => 'required|exists:users,id']);

        return $arr;
    }

}
