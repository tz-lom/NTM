<?php

spl_autoload_register(function($classname){
    if(strpos($classname,'NTM\\')===0)
    {
        if(file_exists(__DIR__.'/../library/'.str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php'))
        {
            require_once __DIR__.'/../library/'.str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
            return true;
        }
    }
    if($classname=='phpQuery')
    {
        if(file_exists(__DIR__.'/../3dparty/phpQuery/phpQuery/phpQuery.php'))
        {
            require_once __DIR__.'/../3dparty/phpQuery/phpQuery/phpQuery.php';
        }
    }
    return false;
});