<?php

/*
 * This file is part of Laravel Watchable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
