<?php
/*
	Thaana_Transliterator by naxeem (http://naxeem.com)
	A Thaana PHP Transliterator

	Inspired by works of
	Kailash Nadh (github.com/knadh/ml2en) and Ayaz (github.com/ifreaker/Thaana-Transliterater)

	This work is licensed under GPL v2

	Usage: echo Thaana_Transliterator::transliterate("ސަލާމް");
*/

class Thaana_Transliterator {

	private static $all_akuru_fili = array(
		"ަ"		=> "a",		"ާ"		=> "aa",	"ި"		=> "i",
        "ީ"		=> "ee",	"ު"		=> "u",		"ޫ"		=> "oo",
        "ެ"		=> "e",		"ޭ"		=> "ey",	"ޮ"		=> "o",
        "ޯ"		=> "oa",	"ް"		=> "",		"ހ"		=> "h",
        "ށ"		=> "sh",	"ނ"		=> "n",		"ރ"		=> "r",
        "ބ"		=> "b",		"ޅ"		=> "lh",	"ކ"		=> "k",
        "އ"		=> "a",		"ވ"		=> "v",		"މ"		=> "m",
        "ފ"		=> "f",		"ދ"		=> "dh",	"ތ"		=> "th",
        "ލ"		=> "l",		"ގ"		=> "g",		"ޏ"		=> "y",
        "ސ"		=> "s",		"ޑ"		=> "d",		"ޒ"		=> "z",
        "ޓ"		=> "t",		"ޔ"		=> "y",		"ޕ"		=> "p",
        "ޖ"		=> "j",		"ޗ"		=> "ch",	"ޙ"		=> "h",
        "ޚ"		=> "kh",	"ޛ‎"		=> "z",		"ޜ‎"		=> "z",
        "ޝ‎"		=> "sh",	"ޝ"		=> "sh",	"ޤ"		=> "q",
        "ޢ"		=> "a",		"ޞ"		=> "s",		"ޟ"		=> "dh",
        "ޡ"		=> "z", 	"ޠ"		=> "t", 	"ާާޣ"		=> "gh",
        "ޘ"		=> "th", 	"ޛ"		=> "dh", 	"ާާޜ"		=> "z"
	);

	private static $fili_fix = array(
		"އަ"		=> "a",		"އާ"		=> "aa",	"އި"		=> "i",
        "އީ"		=> "ee",	"އު"		=> "u",		"އޫ"		=> "oo",
        "އެ"		=> "e",		"އޭ"		=> "ey",	"އޮ"		=> "o",
        "ޢަ"		=> "a",		"ޢާ"		=> "aa",	"ޢި"		=> "i",
        "ޢީ"		=> "ee",	"ޢު"		=> "u",		"ޢޫ"		=> "oo",
        "ޢެ"		=> "e",		"ޢޭ"		=> "ey",	"ޢޮ"		=> "o",
        "އޯ"		=> "oa",	"ުއް"		=> "uh",	"ިއް"		=> "ih",
		"ެއް"		=> "eh",	"ަށް"		=> "ah",	"ައް"		=> "ah",
		"ށް"		=> "h",		"ތް"		=> "i",		"ާއް"		=> "aah",
		"އް"		=> "ih",	"އް"		=> "h"
	);

	private static $punctuations = array(
		"]"		=> "[",		"["		=> "]",		"\\"	=> "\\",
        "\'"	=> "\'",	"،"		=> ",",		"."		=> ".",
        "/"		=> "/",		"÷"		=> "",		"}"		=> "{",
        "{"		=> "}",		"|"		=> "|",		":"		=> ":",
        "\""	=> "\"",	">"		=> "<",		"<"		=> ">",
        "؟"		=> "?",		")"		=> ")",		"("		=> "("
	);

	private static $word_list = array(
		"މުހައްމަދު" => "Mohamed",
		"އަހްމަދު" => "Ahmed",
		"އެއާޕޯޓް" => "airport",
		"އިންސްޓިޓިއުޓް" => "institute",
	);

	public static function transliterate($input) {
		// replace zero width non joiners
		$input = preg_replace("/\xE2\x80\x8C/u", '', $input);

		// fix words that normally dont transliterate well
		// like names and english words.
		foreach(self::$word_list as $k=>$v) {
			$input = preg_replace("/\\".$k."/u", $v, $input);
		}

		// fili_fix first before replacing akuru and fili
		foreach(self::$fili_fix as $k=>$v) {
			$input = preg_replace("/\\".$k."/u", $v, $input);
		}

		// akuru and fili
		foreach(self::$all_akuru_fili as $k=>$v) {
			$input = preg_replace("/".$k."/u", $v, $input);
		}

		// punctuations
		foreach(self::$punctuations as $k=>$v) {
			$input = preg_replace("/\\".$k."/u", $v, $input);
		}

			// capitalize every letter AFTER a full-stop (period).
			$input = preg_replace_callback('/[.!?].*?\w/', function($matches) {
				return strtoupper($matches[0]);
			},ucfirst(strtolower($input)));
 
		return ucfirst($input);
	}
}
?>