# Laravel Watchable

## Installation

First, pull in the package through Composer.

```js
composer require draperstudio/laravel-watchable:1.0.*@dev
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    DraperStudio\Watchable\ServiceProvider::class
];
```

At last you need to publish and run the migration.
```
php artisan vendor:publish --provider="DraperStudio\Watchable\ServiceProvider" && php artisan migrate
```

-----

### Setup a Model
```php
<?php

namespace App;

use DraperStudio\Watchable\Contracts\Watchable;
use DraperStudio\Watchable\Traits\Watchable as WatchableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Watchable
{
    use WatchableTrait;
}

```

### Create a new watchlist for the $user-model
```php
$user->createWatchlist([
    'title' => str_random(10),
    'description' => str_random(10),
    'type' => 'favorites',
]);
```

### Add an item to a watchlist
```php
$watchlist->addItem(Post::first());
```

### Remove an item from a watchlist
```php
$watchlist->removeItem(Post::first());
```
