<?php

/**
 * Menu editor
 * 
 * @package UPcms\Menu
 * @author UP Studio <info@up-studio.net>
 * @date 2015-06-03
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Menu
{

    /**
     * Show all
     * 
     * @param integer $id - parent's ID
     * @return array
     */
    public static function show($id)
    {
        $sql = "SELECT * FROM `menu` WHERE `id_parent` = $id ORDER BY `sort`, `id`";
        $menu = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $menu;
    }

    /**
     * Add
     * 
     * @param integer $id - parent's ID
     * @return boolean
     */
    public static function add($id, $name, $link)
    {
        $sql = "INSERT INTO `menu` SET 
                       `id_parent` = $id,
                       `name` = '$name',
                       `link` = '$link'";
        return Db::exec($sql);
    }

    /**
     * Edit
     * 
     * @param integer $id - item's ID
     * @return boolean
     */
    public static function edit($id, $name, $link)
    {
        $sql = "UPDATE `menu` 
                       SET `name` = '" . $name . "',
                           `link` = '" . $link . "'
                       WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Delete
     * 
     * @param integer $id - item's ID
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `menu` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Return one item
     * 
     * @param integer $id - item's ID
     * @return array
     */
    public static function returnOne($id)
    {
        $sql = "SELECT * FROM `menu` WHERE `id` = $id";
        $item = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $item;
    }

    /**
     * Return parent's ID
     * 
     * @param integer $id - item's ID
     * @return integer
     */
    public static function returnParentId($id)
    {
        $sql = "SELECT `id_parent` FROM `menu` WHERE `id` = $id";
        
        if (Db::numRows($sql) < 1)
        {
            $id_parent = false;
        }
        else
        {
            $result = Db::doOne($sql);
            $id_parent = $result['id_parent'];
        }

        return $id_parent;
    }
}