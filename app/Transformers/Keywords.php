<?php


namespace App\Transformers;

use App\Destination;
use App\Region;
use App\FishSpecies;
use App\Habitat;

class Keywords
{
    public function __construct(Destination $destination, Region $region, FishSpecies $fishSpecies, Habitat $habitat)
    {
        $this->destinations = $destination;
        $this->fishSpecies = $fishSpecies;
        $this->regions = $region;
        $this->habitats = $habitat;
    }


    public function services($words)
    {
        $f = [];
        $ff = [];
        $keywords = [];
        foreach ($this->services as $service) {
            array_push($f, "\"fishing " . $service ."\"\n");
            array_push($ff, "\"fly fishing " . $service  ."\"\n");
            array_push($f, "fishing " . $service ."\n");
            array_push($ff, "fly fishing " . $service  ."\n");
            foreach ($words as $word) {
                array_push($keywords, "\"" . $word . $service ."\"\n");
                array_push($keywords, $word . $service ."\n");
            }
        }

        return array_merge($f, $ff, $keywords);
    }

    public function generate()
    {
        $dest = $this->destinations->pluck('name')->toArray();
        $d = [];
        foreach($dest as $x) {
            array_push($d, $x);
        }

        $h = [];
        if ($this->habitats->count() > 0) {
            $habi = $this->habitats->pluck('habitat')->toArray();
            foreach($habi as $x) {
                array_push($h, $x);
            }
        }

        $fs = [];
        if ($this->fishSpecies->count() > 0) {
            $fish = $this->fishSpecies->pluck('common_name')->toArray();
            foreach($fish as $x) {
                array_push($fs, $x);
            }
        }

        $r = [];
        $regi = $this->regions->pluck('name')->toArray();
        foreach($regi as $x) {
            array_push($r, $x);
        }


        $base = array_merge($d, $h, $fs, $r);
        $words = [];
        foreach ($base as $x) {
            array_push($words, $x . ' fishing ');
            array_push($words, $x . ' fly fishing ');
        }
        return $this->services($words);
    }

    protected $services = [
        'guide',
        'lodge',
        'vacation',
        'holiday',
        'getaway',
        'expedition',
        'charter',
        'all inclusive',
        'package'
    ];
    protected $destinations;
    protected $regions;
    protected $fishSpecies;
    protected $habitat;

}