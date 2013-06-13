<?php defined('SYSPATH') or die('No direct script access.');

class Raven_Kohana_Exception extends Kohana_Kohana_Exception
{
    public static function handler($e)
    {
        Raven::instance()->captureException($e);

        //Kohana handler adds a Log::ERROR string to log, so double-sending would be undesired
        Kohana::$log->detach(Log_Raven::instance());

        parent::handler($e); //there's death call
    }
}