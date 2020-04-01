[![Latest Stable Version](https://poser.pugx.org/miladrahimi/php-enum/v/stable)](https://packagist.org/packages/miladrahimi/php-enum)
[![Total Downloads](https://poser.pugx.org/miladrahimi/php-enum/downloads)](https://packagist.org/packages/miladrahimi/php-enum)
[![Build Status](https://travis-ci.org/miladrahimi/php-enum.svg?branch=master)](https://travis-ci.org/miladrahimi/php-enum)
[![Coverage Status](https://coveralls.io/repos/github/miladrahimi/php-enum/badge.svg?branch=master)](https://coveralls.io/github/miladrahimi/php-enum?branch=master)
[![License](https://poser.pugx.org/miladrahimi/php-enum/license)](https://packagist.org/packages/miladrahimi/php-enum)

# PHP-Enum

To make your Enums feel alive, just make them extend `Enum` abstract class!

## Installation

Install [Composer](https://getcomposer.org) and run following command in your project's root directory:

```
composer require miladrahimi/php-enum "1.*"
```

## Documentation

Consider this enum class:


```php
namespace MiladRahimi\Enum\Enum;

class SampleEnum extends Enum
{
    const UNO = 1;
    const ONE = 1;
    const TWO = 2;
    const STR = "sth";
}
```

Now you are able to use this methods:

```php
SampleEnum::all(); // ['UNO' => 1, 'ONE' => 1, 'TWO' => 2, 'STR' => 'sth']

SampleEnum::keys(); // ['UNO', 'ONE', 'TWO', 'STR'];

SampleEnum::values(); // [1, 1, 2, 'sth']

SampleEnum::hasKey('ONE'); // true

SampleEnum::hasKey('xXx'); // false

SampleEnum::hasValue(2); // true

SampleEnum::hasValue('xXx'); // false

SampleEnum::valueOf('ONE'); // 1

SampleEnum::keysOf(1); // ['UNO', 'ONE']

SampleEnum::keyOf(1); // 'UNO'

SampleEnum::randomKey(); // One of 'UNO', 'ONE', 'TWO', 'STR'

SampleEnum::randomValue(); // One of 1, 2, 'sth'
```

## License
PHP-Enum is initially created by [Milad Rahimi](https://miladrahimi.com)
and released under the [MIT License](http://opensource.org/licenses/mit-license.php).
