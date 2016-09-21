<?php
$sql = "SELECT * FROM `pages` WHERE `addr` = ''";

$content = Db::doOne($sql);
$smarty->assign('title', $content['title']);
$smarty->assign('description', $content['description']);
$smarty->assign('keywords', $content['keywords']);

$sql = "SELECT * FROM `products` ORDER BY `id` DESC LIMIT 6";
$products = Db::doArray($sql);
//dump($products);

$sql = "SELECT * FROM `services` ORDER BY `id`";
$services = Db::doArray($sql);

$smarty->assign('products', $products);
$smarty->assign('services', $services);
$smarty->display('header.tpl');
$smarty->display('main.tpl');