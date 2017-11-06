<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Newsletter
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $email_address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsletterSubscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsletterSubscription whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsletterSubscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsletterSubscription whereUpdatedAt($value)
 * @property string|null $token
 * @property int $confirmed
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsletterSubscription whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsletterSubscription whereToken($value)
 */
class NewsletterSubscription extends Model
{
    protected $fillable = ['email_address', 'confirmed'];

    protected $table = 'newsletter_subscriptions';
}
