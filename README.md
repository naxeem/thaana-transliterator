# Thaana Transliterator

Thaana text to Latin transliterator.

You can use the copmoser package, or the simple PHP class or Javascript fuction.

## Install

```bash/shell
composer require naxeem/thaana-transliterator
```

### Usage

```php

use naxeem\ThaanaTransliterator\Transliterator;

$transliterator =  new Transliterator;

echo $transliterator->transliterate("ސަލާމް");

```
### Other versions

#### NPM
[github.com/mapmeld/thaana-transliterator](https://github.com/mapmeld/thaana-transliterator) by [@mapmeld](https://github.com/mapmeld)

#### Javascript
[github.com/naxeem/thaana-transliterator-js](https://github.com/naxeem/thaana-transliterator-js)

#### PHP Class
[github.com/naxeem/thaana-transliterator-php-class](https://github.com/naxeem/thaana-transliterator-php-class)

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