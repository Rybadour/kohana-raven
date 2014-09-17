<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Kohana-ish logger for Raven
 */
class Log_Raven extends Log_Writer
{
    static $instance;
    protected function __construct(){}
    public static function instance(){
        if(self::$instance === null){self::$instance = new self();}
        return self::$instance;
    }

    public function write(array $messages)
    {
        if(count($messages) == 0){
            return;
        }
		if ( ! Kohana::$config->load('raven.enabled')) {
			return;
		}

        $r = Raven::instance();
        foreach($messages as $message)
        {
            $r->captureMessage($message['body'], null, $r->translateSeverity($message['level']));
        }
    }
}
