<?php

/**
 * Services
 * 
 * @package UPcms\Service
 * @author UP Studio <info@up-studio.net>
 * @date 20/07/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Service
{

    /**
     * All services
     * 
     * @param string $table - table name
     * @return array
     */
    public static function show($table)
    {
        $sql = "SELECT * FROM `$table` ORDER BY `id`";
        $some = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $some;
    }

    /**
     * Adding
     * 
     * @param string $table - table name
     * @param string $name - name
     * @param string $text_s - short text
     * @param string $text - full text
     * @param string $img - image name
     * @param string $title - metatag Title
     * @param string $description - metatag Description
     * @param string $keywords - metatag Keywords
     * @return boolean
     */
    public static function add($table, $name, $text_s, $text, $img, $title, $description, $keywords)
    {
        $sql = "INSERT INTO `$table` SET 
                        `name` = '$name',
                        `text_s` = '$text_s',
                        `text` = '$text',
                        `img` = '$img',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'";
        return Db::exec($sql);
    }

    /**
     * Editing
     * 
     * @param integer $id - service ID
     * @param string $table - table name
     * @param string $name - name
     * @param string $text_s - short text
     * @param string $text - full text
     * @param string $img - image name
     * @param string $title - metatag Title
     * @param string $description - metatag Description
     * @param string $keywords - metatag Keywords
     * @return boolean
     */
    public static function edit($id, $table, $name, $text_s, $text, $img, $title, $description, $keywords)
    {
        $sql = "UPDATE `$table` SET
                        `name` = '$name',
                        `text_s` = '$text_s',
                        `text` = '$text',
                        `img` = '$img',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'
                    WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Deleting
     * 
     * @param integer $id - service ID
     * @param string $table - table name
     * @return boolean
     */
    public static function del($id, $table)
    {
        $sql = "DELETE FROM `$table` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Return one service
     * 
     * @param integer $id - service ID
     * @param string $table - table name
     * @return array
     */
    public static function returnOne($id, $table)
    {
        $sql = "SELECT * FROM `$table` WHERE `id` = $id";
        $some = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $some;
    }
    
    /**
     * Return image's name
     * 
     * @param integer $id - service ID
     * @param string $table - table name
     * @return string
     */
    public static function returnCover($id, $table)
    {
        $sql = "SELECT `img` FROM `$table` WHERE `id` = {$id}";

        if (Db::numRows($sql) < 1)
        {
            $name = false;
        }
        else
        {
            $result = Db::doOne($sql);
            $name = $result['img'];
        }

        return $name;
    }
}

?>