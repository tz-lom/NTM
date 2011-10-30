<?php

spl_autoload_register(function($classname){
    if(file_exists(__DIR__.'/../library/'.str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php'))
    {
        require_once __DIR__.'/../library/'.str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
        return true;
    }
    return false;
});