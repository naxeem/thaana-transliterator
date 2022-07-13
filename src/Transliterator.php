<?php

namespace naxeem\ThaanaTransliterator;

use naxeem\ThaanaTransliterator\Interfaces\TransliteratorInterface;
use naxeem\ThaanaTransliterator\Traits\Helpers;

class Transliterator implements TransliteratorInterface
{

	use Helpers;

	protected array $dictionary;

	protected array $all_akuru_fili;

	protected array $fili_fix;

	protected array $punctuations;

	protected string $text;

	public function __construct()
	{

		$this->dictionary = $this->loadDictionary();
		$this->all_akuru_fili = $this->loadConfig('all_akuru_fili');
		$this->fili_fix = $this->loadConfig('fili_fix');
		$this->punctuations = $this->loadConfig('punctuations');
	}

	/**
	 * transliterate
	 *
	 * @param  string $input
	 *
	 * @return string
	 */
	public function transliterate($input) : string
	{

		$this->text = $input;
		
		$this->replaceZeroWidthNonJoiners();

		// fix words that normally dont translate well
		// like names and english words.
		$this->replaceFromText($this->dictionary);

		// fili_fix first before replacing akuru and fili
		$this->replaceFromText($this->fili_fix);

		// akuru and fili
		$this->replaceFromText($this->all_akuru_fili);

		// punctuations
		$this->replaceFromText($this->punctuations);

		// capitalize every letter AFTER a full-stop (period).
		$this->capitalizeFirstLetterOfNewSentence();

		return ucfirst($this->text);
	}
}
