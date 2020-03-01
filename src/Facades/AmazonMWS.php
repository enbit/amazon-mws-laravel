<?php


namespace Enbit\LaravelAmazonMWS\Facades\AmazonMWS;

use Illuminate\Support\Facades\Facade;

class AmazonMWS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'enbit-amazon-mws';
    }
}