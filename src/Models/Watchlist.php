<?php

/*
 * This file is part of Laravel Watchable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Watchable\Models;

use Cviebrock\EloquentSluggable\SluggableInterface as Sluggable;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Watchlist.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class Watchlist extends Model implements Sluggable
{
    use SluggableTrait;

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
    ];

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(WatchlistItem::class);
    }

    /**
     * @param Model $model
     *
     * @return static
     */
    public function addItem(Model $model)
    {
        return (new WatchlistItem())->addItem($this, $model);
    }

    /**
     * @param Model $model
     *
     * @return bool
     */
    public function removeItem(Model $model)
    {
        return (new WatchlistItem())->removeItem($this, $model);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function author()
    {
        return $this->morphTo('author');
    }
}
