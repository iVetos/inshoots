<?php
/**
 * Class for working with cart
 *
 * @package UPcms
 * @author UP Studio <info@up-studio.net>
 * @date 29/01/2016
 */

class Cart {
    /**
     * Return cart
     * @return array
     */
    public static function returnCart(){
        $products = array();
        $j = 0;
        foreach($_SESSION['cart']['products'] as $product){
            $sql = "SELECT `id`, `name`, `price`, `img_2` FROM `products` WHERE `id` = ".$product['id'];
            $curProduct = Db::doOne($sql);
            $products[$j]['id'] = $product['id'];
            $products[$j]['canvas_id'] = 0;
            $products[$j]['name'] = $curProduct['name'];
            $products[$j]['img'] = $curProduct['img_2'];
            $products[$j]['price'] = $curProduct['price'];
            $products[$j]['count'] = $product['count'];
            $products[$j]['total'] = $curProduct['price'] * $product['count'];
            $products[$j]['type'] = 1;
            $products[$j]['type_name'] = 'Digital licence';
            $j++;
        }

        foreach($_SESSION['cart']['services'] as $product){
            $sql = "SELECT `id`, `name`, `img_2` FROM `products` WHERE `id` = ".$product['parent'];
            $curProduct = Db::doOne($sql);

            $sql = "SELECT * FROM `canvas` WHERE `id` = ".$product['id'];
            $canvas = Db::doOne($sql);

            $products[$j]['id'] = $curProduct['id'];
            $products[$j]['canvas_id'] = $canvas['id'];
            $products[$j]['name'] = $curProduct['name'];
            $products[$j]['img'] = $curProduct['img_2'];
            $products[$j]['price'] = $canvas['price'];
            $products[$j]['count'] = $product['count'];
            $products[$j]['total'] = $canvas['price'] * $product['count'];
            $products[$j]['type'] = 2;
            $products[$j]['type_name'] = $canvas['name'];
            $j++;
        }

        return $products;
    }

    /**
     * Check if new product has already in cart
     * @param integer $id
     * @return boolean
     */
    public static function checkProduct($id){
        return (isset($_SESSION['cart']['products'][$id])) ? true : false;
    }

    /**
     * Check if new service has already in cart
     * @param integer $id
     * @return boolean
     */
    public static function checkService($id){
        return (isset($_SESSION['cart']['services'][$id])) ? true : false;
    }

    /**
     * Return count of products and services
     * @return integer
     */
    public static function returnCount(){
        // Products
        $products = 0;
        if(count($_SESSION['cart']['products'])){
            foreach($_SESSION['cart']['products'] as $product){
                $products += $product['count'];
            }
        }

        // Services
        $services = 0;
        if(count($_SESSION['cart']['services'])){
            foreach($_SESSION['cart']['services'] as $service){
                $services += $service['count'];
            }
        }

        return $products + $services;
    }

    /**
     * Return sum
     * @return mixed
     */
    public static function returnSum(){
        // Products
        $productsSum = 0;
        if(count($_SESSION['cart']['products'])){
            foreach($_SESSION['cart']['products'] as $product){
                $sql = "SELECT `price` FROM `products` WHERE `id` = ".$product['id'];
                $price = Db::doOneField($sql, 'price');
                $productsSum += $product['count'] * $price[0];
            }
        }

        // Services
        $servicesSum = 0;
        if(count($_SESSION['cart']['services'])){
            foreach($_SESSION['cart']['services'] as $service){
                $sql = "SELECT `price` FROM `canvas` WHERE `id` = ".$service['id'];
                $price = Db::doOneField($sql, 'price');
                $servicesSum += $service['count'] * $price[0];
            }
        }

        return $productsSum + $servicesSum;
    }
}