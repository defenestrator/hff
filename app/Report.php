<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Report
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\$related[] $morphedByMany
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Asset[] $assets
 * @property-read \Fishery $fishery
 * @property-read \WaterData $waterData
 * @property-read \Weather $weather
 * @property-read \Privacy $privacy
 * @property int $id
 * @property int $user_id
 * @property int $fishery_id
 * @property string $start_time
 * @property string $end_time
 * @property string $title
 * @property string $report_body
 * @property int $privacy_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HatchReport[] $hatchReports
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereFisheryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report wherePrivacyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereReportBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereUserId($value)
 * @mixin \Eloquent
 */
class Report extends Model
{
    protected $fillable = [
        'asset',
        'user_id',
        'fishery_id',
        'start_time',
        'end_time',
        'title',
        'report_body',
        'privacy_id',
        'weather',
        'water_data'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hatchReports()
    {
        return $this->hasMany(HatchReport::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function fishery()
    {
        return $this->hasOne(Fishery::class);
    }

    public function waterData()
    {
        return $this->hasOne(WaterData::class);
    }

    public function weather()
    {
        return $this->hasOne(Weather::class);
    }

    public function privacy()
    {
        return $this->hasOne(Privacy::class);
    }
}