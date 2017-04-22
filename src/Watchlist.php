<?php



declare(strict_types=1);

namespace BrianFaust\Watchable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Watchlist extends Model
{
    use HasSlug;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function items(): HasMany
    {
        return $this->hasMany(WatchlistItem::class);
    }

    public function addItem(Model $model): WatchlistItem
    {
        return (new WatchlistItem())->addItem($this, $model);
    }

    public function removeItem(Model $model): bool
    {
        return (new WatchlistItem())->removeItem($this, $model);
    }

    public function author(): MorphTo
    {
        return $this->morphTo('author');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
