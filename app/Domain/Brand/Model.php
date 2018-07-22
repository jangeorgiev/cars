<?php

namespace App\Domain\Brand;

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
    protected $table = 'brands';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'active',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function models()
    {
        return $this->hasMany('App\Domain\Model\Model', 'brand_id');
    }

    /**
     * @param mixed  $query
     * @param int    $active
     * @return mixed
     */
    public function scopeByActive($query, $active)
    {
        return $query->where('active', '=', $active);
    }

    /**
     * @return bool|null
     * @throws \Exception
     */
    public function delete()
    {
        $this->models()->delete();

        return parent::delete();
    }
}
