<?php

class Http {

/**
 * 
 * redirige vers l'url qui est passé en paramètre
 * @param string
 * @return void
 * 
 */

 // 

public static function redirect(string $url) : void {
   header("Location: ".$url);
    }
}