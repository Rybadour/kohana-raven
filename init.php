<?php defined('SYSPATH') or die('No direct script access.');

require_once Kohana::find_file('vendor','lib/Raven/Autoloader');
Raven_Autoloader::register();

Raven::instance()->registerSeverityMap(array(
    Log::EMERGENCY => Raven_Client::FATAL,
    Log::ALERT     => Raven_Client::FATAL,
    Log::CRITICAL  => Raven_Client::FATAL,
    Log::ERROR     => Raven_Client::ERROR,
    Log::WARNING   => Raven_Client::WARN,
    Log::NOTICE    => Raven_Client::INFO,
    Log::INFO      => Raven_Client::INFO,
    Log::DEBUG     => Raven_Client::DEBUG,
    Log::STRACE    => Raven_Client::DEBUG
));

//You can register yourself a fancy logger
Kohana::$log->attach(Log_Raven::instance(), Log::EMERGENCY, Log::ERROR);