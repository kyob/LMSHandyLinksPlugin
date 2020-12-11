# HandyLinks plugin for LMS

Useful for frequently used website links are always at hand.
![](handy-links.png?raw=true)

## Requirements

Installed [LMS](https://lms.org.pl/) or [LMS-PLUS](https://lms-plus.org) (recommended).

## Installation

* Copy files to `<path-to-lms>/plugins/`
* Run `composer update` or `composer update --no-dev`
* Go to LMS website and activate it `Configuration => Plugins`

## Configuration

Go to `<path-to-lms>/?m=configlist` then add config parameters and values.

1. Define categories. You can use more than one value separate with comma.
```
handy-links.categories = monitoring, stats, other
```

2. Add links to defined categories. You can use more than one value separate with new line.
```
handy-links.other = Alfa-System, https://alfa-system.pl
kopiszka.com, https://kopiszka.com
```

3. Colors are generated automatically based on category name with PHP functions combination:
```php
$category_background_color = substr(dechex(crc32($category_name)), 0, 6);
```

## Donation

* Bitcoin (BTC): bc1qvwahntcrwjtdp0ntfd0l6kdvdr9d9h6atp6qrr
* Ethereum (ETH): 0xEFCd4b066195652a885d916183ffFfeEEd931f40
