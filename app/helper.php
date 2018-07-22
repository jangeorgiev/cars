<?php


if (!function_exists('defaultValue')) {
    /**
     * @param mixed  $mItem
     * @param string $sKey
     * @param mixed  $mDefaultValue
     * @return mixed
     */
    function defaultValue($mItem, $sKey, $mDefaultValue)
    {
        if (is_object($mItem)) {
            return property_exists($mItem, $sKey) ? $mItem->{$sKey} : $mDefaultValue;
        }

        if (is_array($mItem)) {
            return array_key_exists($sKey, $mItem) ? $mItem[$sKey] : $mDefaultValue;
        }

        return $mDefaultValue;
    }
}

if (!function_exists('defaultAttribute')) {
    /**
     * @param mixed  $mItem
     * @param string $sKey
     * @param mixed  $mDefaultValue
     * @return mixed
     */
    function defaultAttribute($mItem, $sKey, $mDefaultValue)
    {
        if (is_object($mItem)) {
            return $mItem->{$sKey} ? $mItem->{$sKey} : $mDefaultValue;
        }

        return $mDefaultValue;
    }
}

if (!function_exists('setSchemaPagination')) {
    /**
     * @param null|mixed|\Illuminate\Support\Collection $collection
     * @return null|mixed|\Illuminate\Support\Collection
     */
    function setSchemaPagination($collection = null)
    {
        if (\App::environment() != 'local' && $collection !== null) {
            $collection->setPath('https://'.\Request::getHttpHost().'/'.\Request::path());
        }

        return $collection;
    }
}

if (!function_exists('statusRenderer')) {
    /**
     * @param int $status
     * @return string
     */
    function statusRenderer($status)
    {
        switch ((int) $status) {
            case 0:
                $sTitle = 'Inactive';
                $sBadge = 'danger';
                break;
            case 1:
                $sTitle = 'Active';
                $sBadge = 'success';
                break;
            default:
                $sTitle = 'None';
                $sBadge = 'default';
        }

        return '<span class="text-'.$sBadge.'">'.$sTitle.'</span>';
    }
}