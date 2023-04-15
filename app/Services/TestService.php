<?php namespace App\Services;
class TestService 
{
    public function log($str)
    {
        logger($str);
    }
}