<?php

/**
 * Logs
 * 
 * @package UPcms\Logs
 * @author UP Studio <info@up-studio.net>
 * @date 2015-03-06
 */

class Log
{
    /**
     * Create empty file
     * 
     * @param string $name - file's name
     * @return boolean
     */
    public static function create($name)
    {
        $result = (fopen($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt', 'w')) ? true : false;
        return $result;
    }
    
    /**
     * Add log to file
     * 
     * @param integer $code - code of log
     * @example 100 - ok, 101 - error, 102 - access denied, 103 - file not found
     * @param string $file - file's name
     * @param string $str - message
     * @return boolean
     */
    public static function write($code, $file, $str)
    {
        $name = date('Y-m-d');
        if(!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt'))
        {
            self::create($name);
        }
        $str = '[' . $code . '] - ' . $str . ' - ' . $_SERVER['REMOTE_ADDR'] . ' - [' . date('d/M/Y H:i:s P') . '] ' . $file . ' - '.$_SERVER['HTTP_USER_AGENT'] . chr(0x0a);
        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt', 'a+');
        $result = (fwrite($fp, $str)) ? true : false;
        fclose($fp);
        return $result;
    }
    
    /**
     * Show log
     * 
     * @param string $name - file's name
     * @return array
     */
    public static function show($name)
    {
        $logs = (file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt')) ? file($_SERVER['DOCUMENT_ROOT'] . '/admin/' . __DIR_LOGS . $name . '.txt') : array();
        return $logs;
    }
}
?>