<?php
namespace naxeem\ThaanaTransliterator\Traits;

use Exception;

trait Helpers {

  /**
   *
   * @return void
   */
  protected function replaceZeroWidthNonJoiners() : void
  {
    preg_replace("/\xE2\x80\x8C/u", '', $this->text);
  }

  /**
   *
   * @return void
   */
  protected function capitalizeFirstLetterOfNewSentence() : void
  {
    // Shout out to @inerds for this
    $this->text = preg_replace_callback('/[.!?].*?\w/', function ($matches) {
      return  strtoupper($matches[0]);
    }, ucfirst(strtolower($this->text)));
  }

  /**
   * replaces passed array items from text
   * 
   * @param array $collection
   * @return void
   */
  protected function replaceFromText($collection) : void
  {
    foreach ($collection as $k => $v) {
      $this->text = preg_replace("/\\" . $k . "/u", $v, $this->text);
    }
  }

  /**
   *
   * @param  string $filename
   * @return array
   */
  protected function loadConfig($filename) : array
  {
      return $this->loadFile('configs/'.$filename);
  }

  /**
   *
   * @return array
   */
  protected function loadDictionary() : array
  {
      return $this->loadFile('dictionary/translations');
  }

  /**
   *
   * @param  string $filepath
   * @return array
   */
  private function loadFile($filepath) : array
  {
    $fullpath = __DIR__ . '/../../' . $filepath . '.json';
    if(!file_exists($fullpath)) {
      throw new Exception($filepath.'.json not found!');
    }

    return json_decode(
      file_get_contents($fullpath),
      true
    );
  }
}