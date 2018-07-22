<?php

namespace App\Http\Requests\Engine;

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
        return  [
            'name' => 'required|string|max:255|unique:engines,name,{{id}}',
            'description' => 'string|mb_strlen:65535',
            'active' => 'required|in:0,1'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        $messages = [
            "name.required" => "We'll need the name of your engine.",
            "name.unique" => "You have already entered a engine with the same name.",
            "description.required" => "Tell potential customers more about this engine.",
        ];

        return $messages;
    }
}
