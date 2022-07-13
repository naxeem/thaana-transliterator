<?php
namespace naxeem\ThaanaTransliterator\Traits;

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
    protected function loadFile($filename) : array
    {
        return json_decode(
            file_get_contents(__DIR__ . '/../../configs/' . $filename . '.json'),
            true
        );
    }
}