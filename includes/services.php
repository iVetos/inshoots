<?php
if(isset($url['id'])){
    $id = Db::prepare($url['id']);
    
    $sql = "SELECT * FROM `services` WHERE `id` = $id";
    $service = Db::doOne($sql);
    
    $smarty->assign('service', $service);
    $smarty->assign('title', $service['title']);
    $smarty->display('header.tpl');
    $smarty->display('service.tpl');
}
else {
    $sql = "SELECT * FROM `pages` WHERE `addr` = 'services'";
    
    $content = Db::doOne($sql);
    $smarty->assign('title', $content['title']);
    $smarty->assign('description', $content['description']);
    $smarty->assign('keywords', $content['keywords']);
    
    $sql = "SELECT * FROM `services` ORDER BY `id`";
    $services = Db::doArray($sql);
    
    $smarty->assign('services', $services);
    $smarty->display('header.tpl');
    $smarty->display('services.tpl');
}