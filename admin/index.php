<?php

/**
 * CMS UPcms
 * @author UP Studio <info@up-studio.net>
 * @date 25.03.2014
 */

session_start();
error_reporting(E_ALL); // Отображение всех ошибок
/**
 * Smarty
 */
// Подключаем Smarty
define('SMARTY_DIR', 'libs/');
require_once (SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty();

// Папки Smarty
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'configs/';
$smarty->cache_dir = 'cache/';

// Security
define('__CONST_INCLUDES', true);

/**
 * Настройки
 */
// Include const
require_once ($smarty->config_dir[0] . 'const.inc.php');
$smarty->assign('title', __SITE_TITLE);
$smarty->assign('description', __SITE_DESCRIPTION);
$smarty->assign('keywords', __SITE_KEYWORDS);

// Include functions and classes
require_once (__DIR_INCLUDES . 'functions.inc.php');
require_once (__DIR_CLASSES . 'class.db.php');
include_once (__DIR_CLASSES . 'class.log.php');
include_once (__DIR_CLASSES . 'class.up.php');
Db::connect();

// Исходя из модулей и прав пользователя, формируем меню (только после авторизации)
if (isset($_SESSION['adm_user_name']))
    require_once ('configs/menu.php');

/**
 * Other
 */
// Проверяем новые заказы
if (__MOD_SHOP_ORDERS)
{
    $sql = "SELECT * FROM `orders` WHERE `id_status` = 1";
    $newOrders = (Db::numRows($sql) > 0) ? '(' . Db::numRows($sql) . ')' : '';
    $smarty->assign('newOrders', $newOrders);
}

// Проверяем авторизацию
if (!isset($_SESSION['adm_user_name']))
{
    require_once (__DIR_INCLUDES . 'enter.php');
}
else
{
    $smarty->assign('adm_user_name', $_SESSION['adm_user_name']);

    /**
     * URL
     */
    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 'main';
    }
    $smarty->assign('page', $page);
    $smarty->display('header.tpl');

    // Проверяем существует ли $page.php файл. Если существует, то подключаем его
    // Иначе аналогично проверяем существует ли $page.tpl
    // Если не существует ни $page.php ни $page.tpl, то подключаем main.php
    if (file_exists(__DIR_INCLUDES . $page . '.php'))
    {
        require_once (__DIR_INCLUDES . $page . '.php');
    }
    elseif (file_exists($smarty->template_dir[0] . $page . '.tpl'))
    {
        $smarty->display($page . '.tpl');
    }
    else
    {
        require_once (__DIR_INCLUDES . 'main.php');
    }
    $smarty->display('footer.tpl');
}
$_SESSION['walert'] = '';

?>