<?php

/**
 * Page editor
 * 
 * @package UPcms\Pages
 * @author UP Studio <info@up-studio.net>
 * @date 2015-03-06
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Page
{

    /**
     * Show all
     * 
     * @param integer $id - parent's ID
     * @return array
     */
    public static function show($id)
    {
        $sql = "SELECT * FROM `pages` WHERE `id_parent` = $id ORDER BY `id`";
        $pages = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $pages;
    }

    /**
     * Add
     * 
     * @param integer $id - parent's ID
     * @param string $name
     * @param string $text
     * @param string $addr - URL
     * @param string $title
     * @param string $description
     * @param string $keywords
     * @return boolean
     */
    public static function add($id, $name, $text, $addr, $title, $description, $keywords)
    {
        $sql = "INSERT INTO `pages` SET 
                            `id_parent` = $id,
                            `name` = '$name',
                            `text` = '$text',
                            `addr` = '$addr',
                            `title` = '$title',
                            `description` = '$description',
                            `keywords` = '$keywords',
                            `actual` = 1";
        return Db::exec($sql);
    }

    /**
     * Edit
     * 
     * @param integer $id - page's ID
     * @param string $name
     * @param string $text
     * @param string $addr - URL
     * @param string $title
     * @param string $description
     * @param string $keywords
     * @return boolean
     */
    public static function edit($id, $name, $text, $addr, $title, $description, $keywords)
    {
        $sql = "UPDATE `pages` SET 
                            `name` = '$name',
                            `text` = '$text',
                            `addr` = '$addr',
                            `title` = '$title',
                            `description` = '$description',
                            `keywords` = '$keywords'
                        WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Delete
     * 
     * @param integer $id - page's ID
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `pages` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Return one page
     * 
     * @param integer $id - page's ID
     * @return array
     */
    public static function returnPage($id)
    {
        $sql = "SELECT * FROM `pages` WHERE `id` = $id";
        $page = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $page;
    }

    /**
     * Return parent's ID
     * 
     * @param integer $id - page's ID
     * @return integer
     */
    public static function returnParentId($id)
    {
        $sql = "SELECT `id_parent` FROM `pages` WHERE `id` = $id";

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