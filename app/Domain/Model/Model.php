<?php

namespace App\Domain\Model;

use App\Domain\BaseModel;

/**
 * Class Model
 * @package App\Domain\Model
 */
class Model extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'models';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'brand_id',
        'active',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne('App\Domain\Brand\Model', 'id', 'brand_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cars()
    {
        return $this->hasMany('App\Domain\Car\Model', 'model_id');
    }

    /**
     * @param mixed  $query
     * @param int    $brandId
     * @return mixed
     */
    public function scopeByBrand($query, $brandId)
    {
        return $query->where('brand_id', '=', $brandId);
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
        $this->cars()->delete();

        return parent::delete();
    }
}
