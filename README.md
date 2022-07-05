
# Cast Eloquent Fields To Custom DTOs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jaetoole/castable-dto.svg?style=flat-square)](https://packagist.org/packages/jaetoole/castable-dto)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/jaetoole/castable-dto/run-tests?label=tests)](https://github.com/jaetoole/castable-dto/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/jaetoole/castable-dto/Check%20&%20fix%20styling?label=code%20style)](https://github.com/jaetoole/castable-dto/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jaetoole/castable-dto.svg?style=flat-square)](https://packagist.org/packages/jaetoole/castable-dto)

Do you want to harness the power of DTOs with Eloquent? If so, this is the package for you. Using PHP 8 DTOs, you can now cast any array/json eloquent column to a DTO.
This package is inspired by [this awesome package](https://github.com/jessarcher/laravel-castable-data-transfer-object).

## Installation

You can install the package via composer:

```bash
composer require jaetoole/castable-dto
```

It's as simple as that!

## Usage
Imagine we have a Data Transfer Object like the below:
```php
<?php

class MyDto
{
    public function __construct(
        public string $myField
        public int $mySecondField
    ) {
    }
}
```

That's good but how would we populate this from an Eloquent array or JSON object?

First off, let's extend the `CastableDto` class.
```php
<?php

class MyDto extends \JaeToole\CastableDto\CastableDto
{
    public function __construct(
        public string $myField
        public int $mySecondField
    ) {
    }
}
```

Then, in your model, you can specify the following:

```php
protected $casts => [
    'myArrayField' => MyDto::class
]
```
Then, when fetching or storing your `myArrayField`, it will be automatically converted to your Data Transfer Object.


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/jaetoole/.github/blob/main/CONTRIBUTING.md) for details.

## Credits

- [jaetoole](https://github.com/jaetoole)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
