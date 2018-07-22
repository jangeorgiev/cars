<?php

namespace App\Domain\CoupeType;

use App\Domain\BaseModel;

/**
 * Class Model
 * @package App\Domain\CoupeType
 */
class Model extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupe_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
