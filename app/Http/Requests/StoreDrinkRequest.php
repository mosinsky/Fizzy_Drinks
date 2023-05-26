<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDrinkRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  => 'required|max:255',
            'image_url'             => 'required|max:516',
            'description'           => 'required|max:2056',
            'sugar_grams_per_100ml' => 'required',
        ];
    }
}
