<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|max:255',
            'address' => 'required',
            'transaction_total' => 'required|max:255',
            'transaction_status' => 'nullable|string|in:PENDING,SUCCESS,GAGAL',
            'transaction_details' => 'required|array',
            'transaction_details.*' => 'integer|exist:products,id',
        ];
    }
}
