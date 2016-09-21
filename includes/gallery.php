<?php
if(isset($url['id'])){
    $id = Db::prepare($url['id']);
    
    $sql = "SELECT * FROM `categories` WHERE `id` = $id";
    $category = Db::doOne($sql);
    
    $smarty->assign('title', $category['name']);
    $smarty->assign('description', $category['text']);
    
    $sql = "SELECT * FROM `products` WHERE `id_cat` = $id AND `id_parent` = 0 AND `orient` = 1 ORDER BY RAND()";
    $h_products = Db::doArray($sql);
    
    $sql = "SELECT * FROM `products` WHERE `id_cat` = $id AND `id_parent` = 0 AND `orient` = 2 ORDER BY RAND()";
    $v_products = Db::doArray($sql);
    
    /*
    for($i = 0; $i < count($products); $i++){
        $size = getimagesize('admin/img/products/'.$products[$i]['img_1']);
        $products[$i]['orient'] = ($size[0] >= $size[1]) ? '1' : '2';
    }*/
    
    // Other categories
    $sql = "SELECT * FROM `categories` WHERE `actual` = 1 AND `id` != $id ORDER BY RAND() LIMIT 2";
    $cats = Db::doArray($sql);
    
    $smarty->assign('catName', $category['name']);
    $smarty->assign('cats', $cats);
    $smarty->assign('h_products', $h_products);
    $smarty->assign('v_products', $v_products);
    $smarty->assign('action', 'one');
}
else
{
    $sql = "SELECT * FROM `pages` WHERE `addr` = 'gallery'";

    $content = Db::doOne($sql);
    $smarty->assign('title', $content['title']);
    $smarty->assign('description', $content['description']);
    $smarty->assign('keywords', $content['keywords']);
    
    $sql = "SELECT * FROM `categories` WHERE `actual` = 1 ORDER BY `sort`";
    $cats = Db::doArray($sql);
    $i = 0;
    foreach($cats as $cat)
    {
        $sql = "SELECT * FROM `products` WHERE `id_cat` = ".$cat['id'] ." ORDER BY RAND() LIMIT 2";
        $cats[$i]['products'] = Db::doArray($sql);
        $i++;
    }
    // dump($cats);
    $smarty->assign('cats', $cats);
    $smarty->assign('action', 'all');
}

$smarty->display('header.tpl');
$smarty->display('gallery.tpl');