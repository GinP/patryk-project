<?php

namespace App\Http\Requests\Adverts;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['string', 'required', 'min:3'],
            'description' => ['required', 'min:3', 'max:5000'],
            'category_id' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'negotiation' => ['boolean']
        ];
    }
}
