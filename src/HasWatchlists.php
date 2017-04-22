<?php



declare(strict_types=1);

namespace BrianFaust\Watchable;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;

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
