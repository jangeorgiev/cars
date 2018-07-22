<?php

namespace App\Http\Requests\Car;

use App\Http\Requests\AbstractRequest;

/**
 * Class Request
 * @package App\Http\Requests
 */
class Request extends AbstractRequest
{
    protected $routeKey = 'id';

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
        $rules = [
            'model_id' => 'required|numeric|exists:models,id',
            'engine_id' => 'required|numeric|exists:engines,id',
            'coupe_type_id' => 'required|numeric|exists:coupe_types,id',
            'name' => 'required|string|max:255|unique:cars,name,{{id}},id',
            'color' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/i',
            'price' => 'required|numeric|min:0|max:1000000',
            'image' => 'max:1024|image|mimes:jpg,jpeg,png',
            'active' => 'required|in:0,1',
        ];

        // on create require brand_id
        if (!$this->route('id') && !$this->hasFile('image')) {
            $rules['image'] .= '|required';
        }

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        $messages = [
            "name.required" => "We'll need the name of your product.",
            "name.unique" => "You have already entered a product with the same name.",
            "name.regex" => "Your color needs to contains only alphabetical letters.",
        ];

        return $messages;
    }
}
