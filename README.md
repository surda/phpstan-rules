# Extra PHPStan rules

[![Licence](https://img.shields.io/packagist/l/surda/phpstan-rules.svg?style=flat-square)](https://packagist.org/packages/surda/phpstan-rules)
[![Latest stable](https://img.shields.io/packagist/v/surda/phpstan-rules.svg?style=flat-square)](https://packagist.org/packages/surda/phpstan-rules)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan)

## Installation

The recommended way to is via Composer:

```
composer require --dev surda/phpstan-rules
```

## Manual installation
Include rules.neon in your project's PHPStan config:
```neon
includes:
    - vendor/surda/phpstan-rules/rules.neon
```

## Rules
### disallowedFunctionCalls
Disallow Tracy functions dump(), bdump(), dumpe() 
