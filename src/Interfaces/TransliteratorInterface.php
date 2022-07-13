<?php
namespace naxeem\ThaanaTransliterator\Interfaces;

interface TransliteratorInterface
{
    /**
     * transliterate
     *
     * @param  mixed $input
     *
     * @return void
     */
    public function transliterate($input);
}