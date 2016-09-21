<?php
$sql = "SELECT * FROM `pages` WHERE `addr` = 'contacts'";
$content = Db::doOne($sql);

$smarty->assign('title', $content['title']);
$smarty->assign('content', $content);

$smarty->display('header.tpl');
$smarty->display('contacts.tpl');