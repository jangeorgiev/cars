<?php

namespace App\Http\Requests\Brand;

use App\Http\Requests\AbstractRequest;

/**
 * Class Request
 * @package App\Http\Requests
 */
class Request extends AbstractRequest
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
     * @return array
     */
    public function rules()
    {
        return  [
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/i|unique:brands,name,{{id}}',
            'active' => 'required|in:0,1'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            "name.required" => "We will need the name of your provider.",
            "name.unique" => "Your brand name needs to be unique and not used by anyone else.",
            "name.regex" => "Your brand name needs to contains only alphabetical letters.",
        ];
    }
}
