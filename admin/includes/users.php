<?php
/**
 * Зарегистрированные пользователи (покупатели)
 * 
 * @package UPcms\Users
 * @author UP Studio <info@up-studio.net>
 * @date 09.12.2014
 */

if(!defined('__CONST_INCLUDES')) exit('Access denied');

Up::checkPerm($page);

$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch($action){
    case 'show':
        $sql = "SELECT * FROM `users` ORDER BY `id` DESC";
        $users = Db::doArray($sql);
        $smarty->assign('users', $users);
        break;
    
    case 'see':
        $id = Db::prepare($_GET['id']);
        $sql = "SELECT * FROM `users` WHERE `id` = $id";
        $user = Db::doOne($sql);
        $smarty->assign('user', $user);
        break;
}

$smarty->assign('action', $action);
$smarty->display('users.tpl');
?>