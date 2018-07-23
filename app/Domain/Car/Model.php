<?php

namespace App\Domain\Car;

use App\Domain\BaseModel;

/**
 * Class Model
 * @package App\Domain\Car
 */
class Model extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model_id',
        'engine_id',
        'coupe_type_id',
        'name',
        'color',
        'price',
        'image_url',
        'active',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function model()
    {
        return $this->hasOne('App\Domain\Model\Model', 'id', 'model_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function engine()
    {
        return $this->hasOne('App\Domain\Engine\Model', 'id', 'engine_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coupeType()
    {
        return $this->hasOne('App\Domain\CoupeType\Model', 'id', 'coupe_type_id');
    }

    public function image()
    {
        return url('images/'.$this->getAttributeValue('image_url'));
    }

    /**
     * @param mixed $query
     * @param array $filters
     * @return mixed
     */
    public function scopeListing($query, array $filters)
    {
        $query->with(['model', 'model.brand', 'engine']);

        $coupeTypeId = defaultValue($filters, 'coupe_type_id', 0);
        if ($coupeTypeId > 0) {
            $query->where('coupe_type_id', '=', $coupeTypeId);
        }

        $modelId = defaultValue($filters, 'model_id', 0);
        if ($modelId > 0) {
            $query->where('model_id', '=', $modelId);
        }

        $engineId = defaultValue($filters, 'engine_id', 0);
        if ($engineId > 0) {
            $query->where('engine_id', '=', $engineId);
        }

        $priceRange = defaultValue($filters, 'price_range', null);
        if ($priceRange !== null) {
            $prices = explode('+-+', str_replace('%24', '', $priceRange));

            if (count($prices) == 2) {
                $query->where('price', '>=', $prices[0]);
                $query->where('price', '<=', $prices[1]);
            }
        }

        // filter by Active
        $active = 1;
        $query->where('active', '=', $active);
        $query->whereHas('model', function ($query) use ($active) {
            $query->where('active', '=', $active);

            $query->whereHas('brand', function ($query) use ($active) {
                $query->where('active', '=', $active);
            });
        });
        $query->whereHas('engine', function ($query) use ($active) {
            $query->where('active', '=', $active);
        });

        return $query->get();
    }
}
