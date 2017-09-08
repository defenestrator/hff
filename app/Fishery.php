<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Fishery
 *
 * @property integer $id
 * @property string $name
 * @property string $regs
 * @property string $management
 * @property string $notes
 * @property float $lat
 * @property float $lng
 * @property integer $habitat_id
 * @property boolean $stillwater
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\FishSpecies[] $fishSpecies
 * @property-read \Illuminate\Database\Eloquent\Collection|\Hatch[] $hatches
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Tag[] $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|\TripReport[] $tripReports
 * @property-read \Illuminate\Database\Eloquent\Collection|\HatchReport[] $hatchReports
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereRegs($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereManagement($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereNotes($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereLat($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereLng($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereHabitatId($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereStillwater($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Fishery whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\$related[] $morphedByMany
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Report[] $reports
 * @mixin \Eloquent
 */
class Fishery extends Model
{
    protected $fillable = [
        'name',
        'regs',
        'management',
        'notes',
        'lat',
        'long',
        'habitat',
        'stillwater',
        'hatches'
    ];

    public function fishSpecies()
    {
        return $this->hasMany(FishSpecies::class);
    }

    public function hatches()
    {
        return $this->hasMany(Hatch::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function hatchReports()
    {
        return $this->hasMany(HatchReport::class);
    }

}