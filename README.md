# PhpEnum

A PHP Abstract Enum Class

## Installation

Install [Composer](https://getcomposer.org) and run following command in your project's root directory:

```
composer require miladrahimi/php-enum "1.*"
```

## Documentation

To make your Enum feel alive, just use the `Enum` abstract class as its parent.

Consider `SampleEnum` in the following class.

```php
use MiladRahimi\PhpEnum\Enum;

class SampleEnum extends Enum
{
    const ONE = 1;
    const TWO = 2;
    const STR = "sth";
}
```

Now you are able to use declared methods in the abstract Enum class like this:

```php
SampleEnum::items(); // ['ONE' => 1, 'TWO' => 2, 'STR' => 'sth']

SampleEnum::keys(); // ['ONE', 'TWO', 'STR'];

SampleEnum::values(); // [1, 2, 'sth']

SampleEnum::hasKey('ONE'); // true

SampleEnum::hasKey('xXx'); // false

SampleEnum::hasValue(2); // true

SampleEnum::hasValue('xXx'); // false
```

## License
PhpEnum is initially created by [Milad Rahimi](https://miladrahimi.com)
and released under the [MIT License](http://opensource.org/licenses/mit-license.php).
