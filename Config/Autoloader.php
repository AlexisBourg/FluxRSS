<?php


namespace config;

//TODO a terminer
class Autoloader
{
    public static function load($class){
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }

}