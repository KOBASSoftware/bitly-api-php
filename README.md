# Kobas Bit.ly API v4 Library

**This package:**
- Provides an easy way to get bit.ly to shorten a URL using their v4 API. 
- Only supports using [Bit.ly Generic Access Tokens](https://dev.bitly.com/v4/#section/Application-using-a-single-account). 

## Installation

To install, use composer:

```
composer require kobas/bitly-api-php
```

## Usage

```php
$bitly = new \Kobas\Bitly\Bitly('YOUR_ACCESS_TOKEN');
$url = $bitly->shortenUrl('https://google.com');
echo $url;

```

## Licensing
The MIT License (MIT). Please see [License File](https://github.com/kobas/bitly-api-php/blob/master/LICENSE) for more information.