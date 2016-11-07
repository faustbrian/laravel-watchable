<?php

namespace BrianFaust\Watchable\Interfaces;

interface HasWatchlists
{
    public function watchlists();

    public function getWatchlist($id);

    public function getWatchlistBySlug($slug);

    public function getWatchlistByType($type);

    public function createWatchlist($data);

    public function updateWatchlist($id, $data);

    public function deleteWatchlist($id);
}
