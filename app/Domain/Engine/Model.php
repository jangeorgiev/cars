<?php

namespace App\Domain\Engine;

use App\Domain\BaseModel;

/**
 * Class App\Domain\Provider\Model
 */
class Model extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'engines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'active',
    ];

    /**
     * @param mixed  $query
     * @param int    $active
     * @return mixed
     */
    public function scopeByActive($query, $active)
    {
        return $query->where('active', '=', $active);
    }
}
