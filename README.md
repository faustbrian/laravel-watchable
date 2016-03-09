# Laravel Watchable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require draperstudio/laravel-watchable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    DraperStudio\Watchable\ServiceProvider::class
];
```

At last you need to publish and run the migration.
```
php artisan vendor:publish --provider="DraperStudio\Watchable\ServiceProvider" && php artisan migrate
```


## Usage


### Setup a Model
``` php
<?php

/*
 * This file is part of Laravel Watchable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-watchable.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Watchable/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-watchable.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-watchable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-watchable.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-watchable
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Watchable
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-watchable/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-watchable
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-watchable
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
