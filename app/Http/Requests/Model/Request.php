<?php

namespace App\Http\Requests\Model;

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
        if ($this->isMethod('get')) {
            $rules = [
                'brand_id' => 'numeric|exists:brands,id',
            ];
        } else {
            $rules = [
                'brand_id' => 'required|numeric|exists:brands,id',
                'name' => 'required|string|max:255|unique:models,name,{{id}},id',
                'active' => 'required|in:0,1'
            ];
        }

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            "name.required" => "Please, provide a name.",
            "name.unique" => "The name needs to be unique and not used by anyone else.",
            "brand_id.required" => "We'll need your brand name.",
            "brand_id.exists" => "We'll need the brand name.",
        ];
    }
}
