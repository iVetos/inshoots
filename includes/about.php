<?php

$sql = "SELECT * FROM `pages` WHERE `addr` = 'about'";
$content = Db::doOne($sql);

$smarty->assign('title', $content['title']);
$smarty->assign('content', $content);

$smarty->display('header.tpl');
$smarty->display('about.tpl');