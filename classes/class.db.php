<?php

/**
 * Класс для работы с базой данных
 * 
 * Класс позволяет работать с базой данных MySQL.
 * 
 * @package UPcms\DataBase
 * @author UP Studio <info@up-studio.net>
 * @date 08.04.2014
 */
class Db
{
    /**
     * Соединение с БД
     */
    public static function connect()
    {
        $connection = @mysql_connect(__DB_HOST, __DB_USER, __DB_PASS) or die("DB error connecting");
        mysql_select_db(__DB_NAME, $connection);
        mysql_query("SET NAMES utf8");
    }

    /**
     * Метод подгатавливает переменную
     * 
     * @param string $var - переменная
     * @return string
     */
    public static function prepare($var)
    {
        return mysql_real_escape_string($var);
    }

    /**
     * Метод подгатавливает переменную c HTML
     * 
     * @param string var
     * @return string
     */
    public static function prepareHtml($var)
    {
        $var = self::prepare($var);
        $var = htmlspecialchars($var, ENT_QUOTES);
        return $var;
    }

    /**
     * Метод возращает ID последнего Insert
     * 
     * @return integer
     */
    public static function returnId()
    {
        return mysql_insert_id();
    }

    /**
     * Метод выполняет запрос
     * 
     * @param string $sql - запрос
     * @return boolean
     */
    public static function exec($sql)
    {
        $data = (mysql_query($sql)) ? true : false;
        return $data;
    }

    /**
     * Метод выполняет запрос и возращает массив
     * 
     * @param string $sql - запрос
     * @return array
     */
    public static function doArray($sql)
    {
        $data = mysql_query($sql);
        $count = mysql_num_rows($data);
        $array = array();
        if ($count > 0)
        {
            for ($i = 0; $i < $count; $i++)
            {
                $array[] = mysql_fetch_assoc($data);
            }
        }
        return $array;
    }

    /**
     * Метод выполняет запрос и возращает массив из одного элемента
     * 
     * @param string $sql - запрос
     * @return array
     */
    public static function doOne($sql)
    {
        $data = mysql_query($sql);
        $array = array();
        if (mysql_num_rows($data) > 0)
        {
            $array = mysql_fetch_assoc($data);
        }
        return $array;
    }

    /**
     * Метод выполняет запрос возращает массив объектов
     * 
     * @param string $sql - запрос
     * @return array
     */
    public static function doObjects($sql)
    {
        $data = mysql_query($sql);
        $count = mysql_num_rows($data);
        $array = array();
        if ($count > 0)
        {
            for ($i = 0; $i < $count; $i++)
            {
                $array[] = mysql_fetch_object($data);
            }
        }
        return $array;
    }
    
    /**
     * Массив из одного поля
     * 
     * @param string $sql - запрос
     * @param string $field - название поля
     * @return array
     */
    public static function doOneField($sql, $field)
    {
        $data = mysql_query($sql);
        $count = mysql_num_rows($data);
        $array = array();
        if ($count > 0)
        {
            for ($i = 0; $i < $count; $i++)
            {
                $item = mysql_fetch_array($data);
                $array[$i] = $item[$field];
            }
        }
        return $array;
    }

    /**
     * Метод выполняет запрос и возращает количество строк
     * 
     * @param string $sql - запрос
     * @return integer
     */
    public static function numRows($sql)
    {
        $data = mysql_query($sql);
        return mysql_num_rows($data);
    }

    /**
     * Устанавливает локаль на ru_RU
     * 
     * @return void
     */
    public static function setRu()
    {
        mysql_query("SET lc_time_names = 'ru_RU'");
    }
}