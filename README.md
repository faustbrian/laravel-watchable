# Laravel Watchable

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-watchable
```

And then include the service provider within `app/config/app.php`.

``` php
BrianFaust\Watchable\WatchableServiceProvider::class
```

At last you need to publish and run the migration.
```
php artisan vendor:publish --provider="BrianFaust\Watchable\WatchableServiceProvider" && php artisan migrate
```

## Usage

### Setup a Model
``` php
<?php


namespace App;

use BrianFaust\Watchable\HasWatchlistsTrait;
use BrianFaust\Watchable\Interfaces\HasWatchlists;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements HasWatchlists
{
    use HasWatchlistsTrait;
}

```

### Create a new watchlist for the $user-model
``` php
$user->createWatchlist([
    'title' => str_random(10),
    'description' => str_random(10),
    'type' => 'favorites',
]);
```

### Add an item to a watchlist
``` php
$watchlist->addItem(Post::first());
```

### Remove an item from a watchlist
``` php
$watchlist->removeItem(Post::first());
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
