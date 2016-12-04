<?php

/*
 * This file is part of Laravel Watchable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Laravel Watchable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Watchable;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasWatchlists
{
    public function watchlists(): MorphMany
    {
        return $this->morphMany(Watchlist::class, 'author');
    }

    public function getWatchlist($id): Watchlist
    {
        return $this->watchlists()->find($id);
    }

    public function getWatchlistBySlug($slug): Watchlist
    {
        return $this->watchlists()->findBySlug($slug);
    }

    public function getWatchlistByType($type): Collection
    {
        return $this->watchlists()->whereType($type)->get();
    }

    public function createWatchlist($data): Watchlist
    {
        $data['author_id'] = $this->id;
        $data['author_type'] = get_class($this);

        return $this->watchlists()->create($data);
    }

    public function updateWatchlist($id, $data): bool
    {
        if (is_string($id)) {
            $wishlist = $this->getWatchlistBySlug($id);
        } else {
            $wishlist = $this->getWatchlist($id);
        }

        return (bool) $wishlist->update($data);
    }

    public function deleteWatchlist($id): bool
    {
        if (is_string($id)) {
            $wishlist = $this->getWatchlistBySlug($id);
        } else {
            $wishlist = $this->getWatchlist($id);
        }

        return (bool) $wishlist->delete();
    }
}
