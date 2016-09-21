<?php
if(isset($url['id'])){
    $id = Db::prepare($url['id']);
    
    $sql = "SELECT * FROM `products` WHERE `id` = $id";
    $product = Db::doOne($sql);

    // Select category name
    $sql = "SELECT * FROM `categories` WHERE `id` = " . $product['id_cat'];
    $catName = Db::doOne($sql);
    $smarty->assign('cat_name', $catName['name']);
    
    // Select num
    $sql = "SELECT * FROM `products` WHERE `id` <= $id AND `id_parent` = 0 AND `id_cat` = " . $product['id_cat'];
    $counts = Db::doArray($sql);
    $num = count($counts);
    
    // Prev and next photo
    $sql = "SELECT MAX(id) AS `max`, MIN(id) AS `min`, COUNT(id) AS `count` FROM `products` WHERE `id_parent` = 0 AND `id_cat` = " . $product['id_cat'];
    $temp = Db::doOne($sql);
    $min = $temp['min'];
    $max = $temp['max'];
    $count = $temp['count'];
    $cur = $id;
    // ????????? "?????????"
    if($cur == $min){
        $prev = $max;
        $sql = "SELECT MIN(id) AS `next` FROM `products` WHERE `id_parent` = 0 AND `id` > $cur AND `id_cat` = " . $product['id_cat'];
        $temp = Db::doOne($sql);
        $next = $temp['next'];
    }
    if($cur == $max)
    {
        $next = $min;
        $sql = "SELECT MAX(id) AS `prev` FROM `products` WHERE `id_parent` = 0 AND `id` < $cur AND `id_cat` = " . $product['id_cat'];
        $temp = Db::doOne($sql);
        $prev = $temp['prev'];
    }
    // ???? ? ????????
    if($cur != $max && $cur != $min)
    {
        $sql = "SELECT MIN(id) AS `next` FROM `products` WHERE `id_parent` = 0 AND `id` > $cur AND `id_cat` = " . $product['id_cat'];
        $temp = Db::doOne($sql);
        $next = $temp['next'];
        
        $sql = "SELECT MAX(id) AS `prev` FROM `products` WHERE `id_parent` = 0 AND `id` < $cur AND `id_cat` = " . $product['id_cat'];
        $temp = Db::doOne($sql);
        $prev = $temp['prev'];
    }
    
    $smarty->assign('next', $next);
    $smarty->assign('prev', $prev);
    $smarty->assign('num', $num);
    $smarty->assign('count', $count);
    
    /*$msg = "Next: $next - Prev: $prev - Num: $num - Count: $count";
    dump($msg);*/
    
    // Services for product
    $sql = "SELECT * FROM `products` WHERE `id_parent` = $id";
    $childs = Db::doArray($sql);

    // Canvas
    $sql = "SELECT * FROM `canvas`";
    $canvas = Db::doArray($sql);

    if($product['nft'] == 0){
        $size = getimagesize('admin/img/products/'.$product['img_1']);
        $product['width'] = $size[0];
        $product['height'] = $size[1];
    }
    
    $smarty->assign('title', $product['name']);
    $smarty->assign('product', $product);
    $smarty->assign('canvases', $canvas);

    $smarty->display('header.tpl');
    $smarty->display('photo.tpl');
}
else {
    redirect('/');
}
