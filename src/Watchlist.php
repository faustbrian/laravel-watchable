<?php

/*
 * This file is part of Laravel Watchable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Watchable;

use Cviebrock\EloquentSluggable\SluggableInterface as Sluggable;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model implements Sluggable
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function items()
    {
        return $this->hasMany(WatchlistItem::class);
    }

    public function addItem(Model $model)
    {
        return (new WatchlistItem())->addItem($this, $model);
    }

    public function removeItem(Model $model)
    {
        return (new WatchlistItem())->removeItem($this, $model);
    }

    public function author()
    {
        return $this->morphTo('author');
    }
}
