<?php defined('SYSPATH') or die('No direct script access.');

class Raven
{
    protected static $instance;
    public static function instance()
    {
        if(self::$instance === null)
        {
            $api = Kohana::$config->load('raven.api');
            if($api === null)
            {
                throw new RuntimeException("Could not find Sentry API key. Please setup config/raven");
            }
            self::$instance = new Raven_Client($api);
        }
        return self::$instance;
    }
}