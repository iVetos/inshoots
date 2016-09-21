<?php

/**
 * Внутренний класс
 * 
 * @package UPcms\Up
 * @author UP Studio <info@up-studio.net>
 * @date 09.012.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Up
{
    
    /**
     * Возращает права пользователя
     * 
     * @param integer $id - ИД типа пользователей
     * @return array
     */
    public static function getPerm()
    {
        $sql = "SELECT * FROM `levels` WHERE `id` = " . $_SESSION['adm_user_lvl'];
        $perm = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $perm;
    }
    
    /**
     * Проверяет есть ли права на данный раздел
     * 
     * @param string $page - адрес страницы
     * @return boolean
     */
    public static function checkPerm($page)
    {
        $sql = "SELECT `$page` FROM `levels` WHERE `id` = " . $_SESSION['adm_user_lvl'];
        if (Db::numRows($sql) < 1)
        {
            $perm = false;
        }
        else
        {
            $perm = Db::doOne($sql);
            $perm = $perm[$page];
        }
        if (!$perm)
            exit('У Вас нет прав доступа');
    }  
}