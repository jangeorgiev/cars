<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class BaseModel
 * @package App\Domain
 */
class BaseModel extends EloquentModel
{
    /**
     * @param string $sRelated
     * @param string $sThrough
     * @param string $sFirstKey
     * @param string $sSecondKey
     * @param string $sPivotKey
     * @return mixed
     */
    public function manyThroughMany($sRelated, $sThrough, $sFirstKey, $sSecondKey, $sPivotKey)
    {
        $model = new $sRelated();
        $sTable = $model->getTable();
        $oThroughModel = new $sThrough();
        $oPivot = $oThroughModel->getTable();

        return $model
            ->join($oPivot, $oPivot.'.'.$sPivotKey, '=', $sTable.'.'.$sSecondKey)
            ->select($sTable.'.*')
            ->where($oPivot.'.'.$sFirstKey, '=', $this->getKey());
    }

    /**
     * @param string $sRelated
     * @param string $sThrough
     * @param string $sFirstKey
     * @param string $sSecondKey
     * @param string $sPivotKey
     * @return mixed
     */
    public function hasOneThrough($sRelated, $sThrough, $sFirstKey, $sSecondKey, $sPivotKey)
    {
        return $this->hasManyThrough($sRelated, $sThrough, $sFirstKey, $sSecondKey, $sPivotKey);
    }
}
