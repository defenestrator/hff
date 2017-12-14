<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

/**
 * App\Outfitter
 *
 * @property int $id
 * @property int $owner_id
 * @property string $name
 * @property string|null $slug
 * @property string|null $photo_url
 * @property string|null $website
 * @property string|null $stripe_id
 * @property string|null $current_billing_plan
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $card_country
 * @property string|null $billing_address
 * @property string|null $billing_address_line_2
 * @property string|null $billing_city
 * @property string|null $billing_state
 * @property string|null $billing_zip
 * @property string|null $billing_country
 * @property string|null $vat_id
 * @property string|null $extra_billing_information
 * @property \Carbon\Carbon $trial_ends_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Destination[] $destinations
 * @property-read string $email
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\Invitation[] $invitations
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\LocalInvoice[] $localInvoices
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Spark\TeamSubscription[] $subscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereBillingAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereBillingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereBillingCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereBillingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereBillingZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereCardCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereCurrentBillingPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereExtraBillingInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereVatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Outfitter whereWebsite($value)
 * @mixin \Eloquent
 */
class Outfitter extends SparkTeam
{
    protected $fillable = ['name', 'slug', 'uuid'];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}
