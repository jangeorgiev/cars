<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class CustomValidatorServiceProvider
 * @package App\Providers
 */
class CustomValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->addLowerThanValidator();
        $this->addGreaterThanOrEqualTo();
        $this->addMbStrlenValidator();
        $this->addRelationIdsExistsValidator();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function addRelationIdsExistsValidator()
    {
        $this->app['validator']->extend(
            'relation_ids_exists',
            function ($attribute, $value, $parameters, $validator) {
                if (! is_array($value) || count(array_filter($value, 'is_numeric')) != count($value)) {
                    return false;
                }

                $res = \DB::table($parameters[0])->whereIn('id', $value)->count();

                return $res == count($value);
            }
        );

        $this->app['validator']->replacer(
            'relation_ids_exists',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':field', $parameters[0], $message);
            }
        );
    }

    protected function addLowerThanValidator()
    {
        $this->app['validator']->extend(
            'lower_than',
            function ($attribute, $value, $parameters, $validator) {
                $data = $validator->getData();

                return $value <= defaultValue($data, $parameters[0], 0);
            }
        );

        $this->app['validator']->replacer(
            'lower_than',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':field', $parameters[0], $message);
            }
        );
    }

    protected function addGreaterThanOrEqualTo()
    {
        $this->app['validator']->extend(
            'greater_than_or_equal_to',
            function ($attribute, $value, $parameters, $validator) {
                $data = $validator->getData();
                $againstValue = defaultValue($data, $parameters[0], 0);

                if (isset($parameters[1]) && isset($data[$parameters[1]])) { // array key
                    $againstValue = defaultValue($data[$parameters[1]], $parameters[0], 0);
                }

                return (float) $value >= $againstValue;
            }
        );

        $this->app['validator']->replacer(
            'greater_than_or_equal_to',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':field', $parameters[0], $message);
            }
        );
    }

    protected function addMbStrlenValidator()
    {
        app('validator')->extend(
            'mb_strlen',
            function ($attribute, $value, $parameters) {
                if (mb_strlen($value, '8bit') <= $parameters[0]) {
                    return true;
                }

                return false;
            }
        );

        app('validator')->replacer(
            'mb_strlen',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':field', $parameters[0], $message);
            }
        );
    }
}
