<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

class Outfitter extends SparkTeam
{
    protected $fillable = ['name', 'slug', 'uuid'];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}
