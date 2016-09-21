<?php

/**
 * Class for working with canvas
 *
 * @package UPcms\Canvas
 * @author UP Studio <info@up-studio.net>
 * @date 20/01/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

class Canvas
{

    /**
     * Show all
     *
     * @return array
     */
    public static function show()
    {
        $sql = "SELECT * FROM `canvas` ORDER BY `id`";
        $canvas = (Db::numRows($sql) < 1) ? array() : Db::doArray($sql);
        return $canvas;
    }

    /**
     * Add
     *
     * @param string $name
     * @param string $img - cover
     * @param string $price
     * @return boolean
     */
    public static function add($name, $img, $price)
    {
        $sql = "INSERT INTO `canvas` SET
                        `name` = '$name',
                        `img` = '$img',
                        `price` = '$price'";
        return Db::exec($sql);
    }

    /**
     * Edit
     *
     * @param integer $id
     * @param string $name
     * @param string $img - cover
     * @param string $price
     * @return boolean
     */
    public static function edit($id, $name, $img, $price)
    {
        $sql = "UPDATE `canvas` SET
                        `name` = '$name',
                        `img` = '$img',
                        `price` = '$price'
                    WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Delete
     *
     * @param integer $id
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `canvas` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Return one canvas (for editing)
     *
     * @param integer $id
     * @return array
     */
    public static function returnOne($id)
    {
        $sql = "SELECT * FROM `canvas` WHERE `id` = $id";
        $articles = (Db::numRows($sql) < 1) ? array() : Db::doOne($sql);
        return $articles;
    }

    /**
     * Return cover name
     *
     * @param integer $id
     * @return string
     */
    public static function returnCover($id)
    {
        $sql = "SELECT `img` FROM `canvas` WHERE `id` = {$id}";

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