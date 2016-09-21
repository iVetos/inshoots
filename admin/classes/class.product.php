<?php

/**
 * Products
 * 
 * @package UPcms\Catalog
 * @author UP Studio <info@up-studio.net>
 * @date 2015-03-06
 */

class Product
{

    /**
     * Show all from category
     * 
     * @param integer $id - ИД категории
     * @return array
     */
    public static function show($id)
    {
        $sql = "SELECT * FROM `products` WHERE `id_cat` = $id ORDER BY `id`";
        return Db::doArray($sql);
    }

    /**
     * Add
     *
     * @param integer $id - category ID
     * @param integer $parent - parent ID
     * @param string $name - name
     * @param string $text - about
     * @param float $price - price
     * @param boolean $nft - not for trade
     * @param boolean $orient - photo orientation
     * @param string $param1-$param10 - params
     * @param string $title - Title
     * @param string $description - Description
     * @param string $keywords - Keywords 
     * @return boolean
     */
    public static function add($id, $parent, $name, $text, $price,
        $nft, $orient, $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9,
        $param10, $title, $description, $keywords)
    {
        $sql = "INSERT INTO `products` 
                    SET `id_cat` = $id,
                        `id_parent` = '$parent',
                        `name` = '$name',
                        `text` = '$text',
                        `price` = '$price',
                        `nft` = '$nft',
                        `orient` = '$orient',
                        `param1` = '$param1',
                        `param2` = '$param2',
                        `param3` = '$param3',
                        `param4` = '$param4',
                        `param5` = '$param5',
                        `param6` = '$param6',
                        `param7` = '$param7',
                        `param8` = '$param8',
                        `param9` = '$param9',
                        `param10` = '$param10',
                        `title` = '$title',
                        `description` = '$description',
                        `keywords` = '$keywords'";
        return Db::exec($sql);
    }

    /**
     * Edit
     * 
     * @param integer $id - product's ID
     * @param integer $parent - parent ID
     * @param string $name - name
     * @param string $text - about
     * @param float $price - price
     * @param boolean $nft - not for trade
     * @param boolean $orient - photo orientation
     * @param string $param1-$param10 - params
     * @param string $title - Title
     * @param string $description - Description
     * @param string $keywords - Keywords 
     * @return boolean
     */
    public static function edit($id, $parent, $name, $text, $price,
        $nft, $orient, $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9,
        $param10, $title, $description, $keywords)
    {
        $sql = "UPDATE `products` 
                   SET `id_parent` = '$parent',
                       `name` = '$name',
                       `text` = '$text',
                       `price` = '$price',
                       `nft` = '$nft',
                       `orient` = '$orient',
                       `param1` = '$param1',
                       `param2` = '$param2',
                       `param3` = '$param3',
                       `param4` = '$param4',
                       `param5` = '$param5',
                       `param6` = '$param6',
                       `param7` = '$param7',
                       `param8` = '$param8',
                       `param9` = '$param9',
                       `param10` = '$param10',
                       `title` = '$title',
                       `description` = '$description',
                       `keywords` = '$keywords'
                   WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Delete
     * 
     * @param integer $id - ИД товара
     * @return boolean
     */
    public static function del($id)
    {
        $sql = "DELETE FROM `products` WHERE `id` = $id";
        return Db::exec($sql);
    }

    /**
     * Один товар
     * 
     * @param integer $id - ИД товара
     * @return array
     */
    public static function returnProduct($id)
    {
        $sql = "SELECT * FROM `products` WHERE `id` = $id";
        $product = (Db::numRows($sql) > 0) ? Db::doOne($sql) : array();
        return $product;
    }
    
    /**
     * Возращает имя изображения
     * 
     * @param integer $id - ИД товара
     * @param integer $num - номер картинки
     * @return string
     */
    public static function returnImg($id, $num)
    {
        $sql = "SELECT `img_$num` FROM `products` WHERE `id` = {$id}";

        if (Db::numRows($sql) < 1)
        {
            $name = false;
        }
        else
        {
            $result = Db::doOne($sql);
            $name = $result['img_'.$num];
        }

        return $name;
    }
    
    /**
     * Устанавливает фото
     * 
     * @param integer $id - ИД товара
     * @param string $field - поле
     * @param string $img - название фото
     * @return boolean
     */
    public static function setImg($id, $field, $img) {
        $db = new db();
        $sql = "UPDATE `products` SET `$field` = '$img' WHERE `id` = $id";
        Db::exec($sql);
    }
}

?>