Options for Laravel
==========

[![Latest Stable Version](http://poser.pugx.org/golchha21/options/v)](https://packagist.org/packages/golchha21/options)
[![Total Downloads](http://poser.pugx.org/golchha21/options/downloads)](https://packagist.org/packages/golchha21/options)
[![License](http://poser.pugx.org/golchha21/options/license)](https://packagist.org/packages/golchha21/options)

A Laravel package for global key-value options.

## Installation

Install via composer

```bash
composer require golchha21/options
```

### Publish configuration file

```bash
php artisan vendor:publish --provider Golchha21\Options\Providers\ServiceProvider
```

## Example configuration file

```php
// config/Options.php

return [
    // Table Name
    'table' => 'options',
];
```

## Usage

###### Option 1 (Facades)
``` php
    // Get option
    Option::get('key');
    // Option Exists
    Option::exists('key');
    // Remove Option
    Option::remove('key');
    // Set option
    Option::set('key', 'value');
    // Set options
    $keys = [
        "key1" => "value1",
        "key2" => "value2",
        "key3" => "value3",
    ];
    Option::set($keys);
```

###### Option 2 (Helper Functions)
``` php
    // Get option
    option('key');
    // Set Option
    option(['key' => 'value'], true);
    // Option Exists
    option_exists('key');
    // Remove Option
    option_remove('key');
```

###### Option 3 (Blade Directives)
``` php
    // Get option
    @option('key')
    // Option Exists
    @option_exists('key')
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email vardhans@ulhas.net instead of using the issue tracker.

## Author

- [Ulhas Vardhan Golchha](https://github.com/golchha21) - *Initial work*

See also the list of [contributors](https://github.com/golchha21/options/graphs/contributors) who participated in this project.

## License

Options for Laravel is open-sourced software licensed under the [MIT license](LICENSE.md).
