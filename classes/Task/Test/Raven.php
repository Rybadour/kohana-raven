<?php defined('SYSPATH') or die('No direct script access.');
/**
 *
 */
class Task_Test_Raven extends Minion_Task
{
    protected $_options = array();

    protected function _execute(array $options){
        Kohana::$log->add(Log::ERROR,"Test error!");
        Kohana::$log->add(Log::WARNING,"Test warning!");
        Kohana::$log->add(Log::INFO,"Test info!");

        Raven::instance()->captureException(
            new Kohana_Minion_Exception_InvalidTask("That was invalid task message",
                array('variable' => 'value'),
                451
            )
        );
    }
}