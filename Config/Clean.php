<?php


namespace config;


class Clean
{
    public function __construct(){}

    public function stringClean($s):String{
        return filter_var($s,FILTER_SANITIZE_STRING);
    }

    public function mailClean($m):String{
        return filter_var($m,FILTER_SANITIZE_EMAIL);
    }
}