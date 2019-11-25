<?php

namespace Thaana;

use Thaana\Interfaces\IThaana;
use Thaana\Utils\Util;
/*
	A composer port of Thaana_Transliterator by naxeem (http://naxeem.com)
	A Thaana PHP Transliterator
*/

class Thaana extends Util implements IThaana
{


	public static $word_lists = array();

	public static $all_akuru_fili = array();

	public static $fili_fix = array();

	public static $punctuations = array();


	/**
	 * transliterate
	 *
	 * @param  mixed $input
	 *
	 * @return void
	 */
	public static function transliterate($input)
	{
		//Loading the configs
		self::$word_lists = self::load('wordlist');
		self::$all_akuru_fili = self::load('all_akuru_fili');
		self::$fili_fix = self::load('fili_fix');
		self::$punctuations = self::load('punctuations');


		// replace zero width non joiners
		$input = self::filter($input);

		// fix words that normally dont translate well
		// like names and english words.
		foreach (self::$word_lists as $k => $v) {
			$input = preg_replace("/\\" . $k . "/u", $v, $input);
		}

		// fili_fix first before replacing akuru and fili
		foreach (self::$fili_fix as $k => $v) {
			$input = preg_replace("/\\" . $k . "/u", $v, $input);
		}

		// akuru and fili
		foreach (self::$all_akuru_fili as $k => $v) {
			$input = preg_replace("/" . $k . "/u", $v, $input);
		}

		// punctuations
		foreach (self::$punctuations as $k => $v) {
			$input = preg_replace("/\\" . $k . "/u", $v, $input);
		}

		// capitalize every letter AFTER a full-stop (period).
		// Thanks @inerds
		$input = preg_replace_callback('/[.!?].*?\w/', function ($matches) {
			return  strtoupper($matches[0]);
		}, ucfirst(strtolower($input)));

		return ucfirst($input);
	}

	/**
	 * filter
	 *
	 * @param  mixed $input
	 *
	 * @return void
	 */
	protected static function filter($input)
	{
		$input = preg_replace("/\xE2\x80\x8C/u", '', $input);

		return $input;
	}
}
