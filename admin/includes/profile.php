<?php

/**
 * My profile
 * 
 * @package UPcms\Profile
 * @author UP Studio <info@up-studio.net>
 * @date 2015-03-06
 */

if (!defined('__CONST_INCLUDES')) exit('Access denied');

$error = array();
// If form was send
if (isset($_POST['old_pass']) && isset($_POST['pass']))
{
    $old_pass = Db::prepare($_POST['old_pass']);
    $new_pass = Db::prepare($_POST['pass']);
    $new_pass2 = Db::prepare($_POST['pass2']);

    $sql = "SELECT `pass` FROM `admins` WHERE `id` = " . $_SESSION['adm_user_id'];
    $pass = Db::doOne($sql);
    $pass = $pass['pass'];

    if ($pass != $old_pass)
    {
        $error['pass'] = 'Неверно указан текущий пароль';
        Log::write(101, __file__, 'Изменение пароля - Неверно указан текущий пароль [' . $_SESSION['adm_user_name'] . ']');
    }
    elseif ($new_pass != $new_pass2)
    {
        $error['pass'] = 'Пароли не совпадают';
        Log::write(101, __file__, 'Изменение пароля - Пароли не совпадают [' . $_SESSION['adm_user_name'] . ']');
    }
    else
    {
        $sql = "UPDATE `admins` SET `pass` = '$new_pass' WHERE `id` = " . $_SESSION['adm_user_id'];
        Db::exec($sql);
        Log::write(100, __file__, 'Changing pass [' . $_SESSION['adm_user_name'] . ']');
        $_SESSION['walert'] = 'Changes was saved';
        redirect('../admin/?page=profile');
    }
}

$sql = "SELECT `admins`.`name` AS `name`, `last_date`, `levels`.`name` AS `level` FROM `admins`, `levels` WHERE `admins`.`id_level` = `levels`.`id` AND `admins`.`id` = " . $_SESSION['adm_user_id'];
$user = Db::doOne($sql);

$smarty->assign('error', $error);
$smarty->assign('user', $user);
$smarty->display('profile.tpl');