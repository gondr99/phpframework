<?php

namespace Gondr;

class Lib
{
    public static function dump($var)
    {
        echo "<div style='width:450px;box-shadow:2px 2px 5px #ddd;padding:4px;'>";
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        echo "</div>";
    }
}


