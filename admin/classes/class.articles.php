<?php

/**
 * Класс для работы со статьями
 * 
 * @package UPcms\Articles
 * @author UP Studio <info@up-studio.net>
 * @date 08.04.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Article
{

    /**
     * Show all articles
     * 
     * @return array
     */
    public static function show()
    {
        $sql = "SELECT * FROM `articles` ORDER BY `id`";
        $articles = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $articles;
    }

    /**
     * Add article
     * 
     * @param integer $id_admin - ИД администратора
     * @param string $name - название
     * @param string $text_s - краткое описание
     * @param string $text - полное описание
     * @param string $tags - теги
     * @param date $date
     * @param string $addr - адрес новости
     * @param string $img - обложка
     * @param string $title - метатег Title
     * @param string $description - метатег Description
     * @param string $keywords - метатег Keywords
     * @return boolean
     */
    public static function add($id_admin, $name, $text_s, $text, $tags, $date, $addr,  $img, $title, $description, $keywords)
    {
        $sql = "INSERT INTO `articles` SET 
                        `id_admin` = '$id_admin',
                        `name` = '$name',
                        `addr` = '$addr',
                        `text` = '$text',
                        `text_s` = '$text_s',
                        `tags` = '$tags',
                        `date` = '$date',
                        `cover` = '$img',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'";
        return Db::exec($sql);
    }

    /**
     * Edit
     * 
     * @param integer $id - ИД статьи
     * @param string $name - название
     * @param string $text_s - краткое описание
     * @param string $text - полное описание
     * @param string $tags - теги
     * @param date $date
     * @param string $addr - адрес новости
     * @param string $img - обложка
     * @param string $title - метатег Title
     * @param string $description - метатег Description
     * @param string $keywords - метатег Keywords
     * @return boolean
     */
    public static function edit($id, $name, $text_s, $text, $tags, $date, $addr, $img, $title, $description, $keywords)
    {
        $sql = "UPDATE `articles` SET
                        `name` = '$name',
                        `addr` = '$addr',
                        `text` = '$text',
                        `text_s` = '$text_s',
                        `tags` = '$tags',
                        `date` = '$date',
                        `cover` = '$img',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'
                    WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Delete
     * 
     * @param integer $id - ИД статьи
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `articles` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * One articles
     * 
     * @param integer $id - ИД статьи
     * @return array
     */
    public static function returnOne($id)
    {
        $sql = "SELECT * FROM `articles` WHERE `id` = $id";
        $articles = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $articles;
    }
    
    /**
     * Return cover name
     * 
     * @param integer $id - ИД статьи
     * @return string
     */
    public static function returnCover($id)
    {
        $sql = "SELECT `cover` FROM `articles` WHERE `id` = {$id}";

        if (Db::numRows($sql) < 1)
        {
            $name = false;
        }
        else
        {
            $result = Db::doOne($sql);
            $name = $result['cover'];
        }

        return $name;
    }
}

?>