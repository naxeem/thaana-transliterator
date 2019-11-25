<?php

namespace Thaana\Utils;

use Thaana\Interfaces\IUtil;

class Util implements IUtil
{
    /**
     * load
     *
     * @param  mixed $filename
     *
     * @return void
     */
    public static function load($filename)
    {
        return include('../configs/' . $filename . '.php');
    }
}
