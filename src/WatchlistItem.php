<?php



declare(strict_types=1);

namespace BrianFaust\Watchable;

use Illuminate\Database\Eloquent\Model;

class WatchlistItem extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $with = ['watchable'];

    public function watchable(): MorphTo
    {
        return $this->morphTo();
    }

    public function addItem(Model $watchlist, Model $watchable): self
    {
        $data = [
            'watchlist_id'   => $watchlist->id,
            'watchable_id'   => $watchable->id,
            'watchable_type' => get_class($watchable),
        ];

        if (!$item = static::where($data)->first()) {
            $item = new static(array_except($data, ['watchlist_id']));

            $watchlist->items()->save($item);
        }

        return $item;
    }

    public function removeItem(Model $watchlist, Model $watchable): bool
    {
        $data = [
            'watchlist_id'   => $watchlist->id,
            'watchable_id'   => $watchable->id,
            'watchable_type' => get_class($watchable),
        ];

        if (!$item = static::where($data)->first()) {
            return false;
        }

        return (bool) $item->delete();
    }
}
