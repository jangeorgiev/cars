<?php

namespace App\Http\Requests;

/**
 * Class AbstractRequest
 * @package App\Http\Requests
 */
abstract class AbstractRequest extends Request
{
    /*** @var string */
    protected $routeKey = 'id';

    /**
     * @param array|mixed $keys
     * @return array
     */
    public function all($keys = null)
    {
        return $this->request->all();
    }

    protected function getRules()
    {
        $rules = app()->call([$this, 'rules']);
        $data = $this->all();
        foreach ($rules as $key => $rule) {
            if (strpos($rule, 'required') >= 0 && !isset($data[$key]) && in_array($this->method(), ['PATCH', 'GET'])) {
                unset($rules[$key]);
                continue;
            }
            $rule = str_replace('{{id}}', ($this->route($this->routeKey) != null ? $this->route($this->routeKey) : defaultValue($data, 'id', 0)), $rule);
            $rule = str_replace('{{provider_id}}', defaultValue($data, 'provider_id', 0), $rule);
            $rules[$key] = str_replace('{{section_id}}', defaultValue($data, 'section_id', 0), $rule);
        }

        return $rules;
    }

    protected function getValidatorInstance()
    {
        /** @var \Illuminate\Validation\Factory $factory */
        $factory = app(\Illuminate\Validation\Factory::class);

        if (method_exists($this, 'validator')) {
            return app()->call([$this, 'validator'], compact('factory'));
        }

        return $factory->make(
            $this->all(),
            $this->getRules(),
            $this->messages(),
            $this->attributes()
        );
    }
}
