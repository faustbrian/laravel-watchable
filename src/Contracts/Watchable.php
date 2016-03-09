<?php

/*
 * This file is part of Laravel Watchable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Watchable\Contracts;

/**
 * Interface Watchable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
interface Watchable
{
    /**
     * @return mixed
     */
    public function watchlists();

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getWatchlist($id);

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getWatchlistBySlug($slug);

    /**
     * @param $type
     *
     * @return mixed
     */
    public function getWatchlistByType($type);

    /**
     * @param $data
     *
     * @return mixed
     */
    public function createWatchlist($data);

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateWatchlist($id, $data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteWatchlist($id);
}
