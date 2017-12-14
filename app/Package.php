<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Package
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $destination_id
 * @property int|null $min_anglers
 * @property int|null $max_anglers
 * @property string $type
 * @property string $title
 * @property string|null $description
 * @property int $price_per_angler
 * @property int|null $percent_deposit_per_angler
 * @property string|null $terms
 * @property string|null $misc_fees
 * @property string|null $dates_available
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDatesAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDestinationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereMaxAnglers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereMinAnglers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereMiscFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePercentDepositPerAngler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package wherePricePerAngler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Expedition[] $expeditions
 */
class Package extends Model
{
    public function expeditions()
    {
        return $this->hasMany(Expedition::class);
    }
}
