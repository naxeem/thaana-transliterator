# Thaana Transliterator

Thaana text to Latin transliterator.

You can use the copmoser package, or the simple PHP class or Javascript fuction.

## Composer

```bash/shell
composer require naxeem/thaana-transliterator
```

### Usage

```php

require_once '../vendor/autoload.php';

use Thaana\Thaana;

echo Thaana::transliterate("ސަލާމް"); // Salaam

```

## Using this simple versions, instead of composer package

### Usage PHP

Download/copy and include the **class-thaana-transliterator.php** file.

```php
include "./class-thaana-transliterator.php";

$text = Thaana_Transliterator::transliterate("ސަލާމް"); // Salaam
```

### Usage JavaScript

Download/copy and add the **thaana-transliterator.js** file.

```html
<script type="text/javascript" src="./thaana-transliterator.js"></script>
```

```js
let text = thaanaTransliterator("ދުނިޔެއަށް ސަލާމް!"); // Hello World!
```

## Use Online / Demo

[Online Thaana Transliterator](https://www.naxeem.com/lab/thaana-transliterator/)

## Input/Output

### Input

ހުރިހާ އިންސާނުން ވެސް އުފަންވަނީ، ދަރަޖައާއި ޙައްޤުތަކުގައި މިނިވަންކަމާއި ހަމަހަމަކަން ލިބިގެންވާ ބައެއްގެ ގޮތުގައެވެ. އެމީހުންނަށް ހެޔޮވިސްނުމާއި، ހެޔޮ ބުއްދީގެ ބާރު ލިބިގެންވެއެވެ. އަދި އެމީހުން އެކަކު އަނެކަކާ މެދު މުޢާމަލާތް ކުރަންވަނީ، އުޚުއްވަތްތެރި ކަމުގެ ރޫޙެއްގައެވެ.

### Output

Hurihaa insaanun ves ufanvanee, dharajaaai hahquthakugai minivankamaai hamahamakan libigenvaa baehge gothugaeve. Emeehunnah heyovisnumaai, heyo buhdheege baaru libigenveeve. Adhi emeehun ekaku anekakaa medhu muaamalaai kuranvanee, ukhuhvaitheri kamuge roohehgaeve.

## Contributing

Anyone is welcome to improve this.

Many thanks to [@jinas123](https://github.com/jinas123) for porting taana transliterator to composer.