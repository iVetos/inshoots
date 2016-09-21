<?php
/**
 * Main classes and functions
 * 
 * @package UPcms\Main
 * @author UP Studio <info@up-studio.net>
 * @date 23/06/2015
 */

require_once (__DIR_CLASSES . 'class.db.php');
Db::connect();
require_once (__DIR_CLASSES . 'class.up.php');
require_once (__DIR_CLASSES . 'class.cart.php');
require_once (__DIR_INCLUDES . 'functions.inc.php');

/**
 * Cart
 */
if (isset($_SESSION['cart_counts'])) {
    $smarty->assign('cart_counts', array_sum($_SESSION['cart_counts']));
} else {
    $smarty->assign('cart_counts', 0);
}
if (!empty($_SESSION['cart_counts'])) {
    if (isset($_SESSION['products_summ'])) {
        $smarty->assign('products_summ', $_SESSION['products_summ']);
    } else {
        $smarty->assign('products_summ', '0.00');
    }
} else {
    $smarty->assign('products_summ', '0.00');
}

$cart_ids = (isset($_SESSION['cart_ids'])) ? $_SESSION['cart_ids'] : array();
$smarty->assign('cart_ids', $cart_ids);

// New cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart']['products'] = array();
    $_SESSION['cart']['services'] = array();
}

$smarty->assign('cart_count', Cart::returnCount());
$smarty->assign('cart_sum', Cart::returnSum());

/* Cats */
$sql = "SELECT * FROM `categories` WHERE `actual` = 1 ORDER BY `sort`";
$menu_cats = Db::doArray($sql);
$i = 0;
foreach($menu_cats as $cat)
{
    $sql = "SELECT * FROM `products` WHERE `id_cat` = ".$cat['id'] ." ORDER BY RAND() LIMIT 2";
    $menu_cats[$i]['products'] = Db::doArray($sql);
    $i++;
}
// dump($cats);
$smarty->assign('menu_cats', $menu_cats);

/* Services */
$sql = "SELECT * FROM `services` ORDER BY `id`";
$smarty->assign('f_services', Db::doArray($sql));

/* Productsfor cart */
$smarty->assign('cartProducts', Cart::returnCart());