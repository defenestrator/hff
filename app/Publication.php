<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Publications
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $type
 * @property int|null $post_id
 * @property int|null $podcast_id
 * @property int|null $newsletter_id
 * @property int|null $report_id
 * @property int|null $archived
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Newsletter[] $newsletter
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Podcast[] $podcast
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $post
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Report[] $report
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereArchived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereNewsletterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication wherePodcastId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereUpdatedAt($value)
 * @property int|null $showcase_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Showcase[] $showcase
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Publication whereShowcaseId($value)
 */
class Publication extends Model
{
    protected $table = 'publications';
    protected $fillable = ['type', 'post_id', 'report_id', 'showcase_id', 'newsletter_id'];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function showcase()
    {
        return $this->hasMany(Showcase::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function newsletter()
    {
        return $this->hasMany(Newsletter::class);
    }
}
