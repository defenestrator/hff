<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'geojson', 'lat','lng','name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function destinations()
    {
        return $this->hasMany(Destinations::class);
    }
}
