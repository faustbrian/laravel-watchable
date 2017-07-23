<?php

/*
 * This file is part of Laravel Watchable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchlistsTable extends Migration
{
    public function up()
    {
        Schema::create('watchlists', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('author');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('description');
            $table->string('type')->index();
            $table->timestamps();
        });

        Schema::create('watchlist_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('watchlist_id');
            $table->morphs('watchable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('watchlists');
        Schema::drop('watchlist_items');
    }
}
