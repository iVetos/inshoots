<?php

/**
 * Mein menu
 * 
 * @package UPcms\Menu
 * @author UP Studio <info@up-studio.net>
 * @date 20/07/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

$menu_titles = array();  // Names
$menu_links = array();   // Links
$menu_classes = array(); // Styles

$perm = Up::getPerm();

// Page and menu editors
if (__MOD_EDIT && $perm['pages'])
{
    $menu_titles[] = 'Page editor';
    $menu_titles[] = 'Menu editor';
    $menu_links[] = 'pages';
    $menu_links[] = 'menu';
    $menu_classes[] = 'pages';
    $menu_classes[] = 'menu';
}

// Services
$menu_titles[] = 'Services';
$menu_links[] = 'services';
$menu_classes[] = 'tms';

// Articles
if (__MOD_ARTICLES && $perm['articles'])
{
    $menu_titles[] = 'Articles';
    $menu_links[] = 'articles';
    $menu_classes[] = 'articles';
}

// News
if (__MOD_NEWS && $perm['news'])
{
    $menu_titles[] = 'News';
    $menu_links[] = 'news';
    $menu_classes[] = 'articles';
}

// Canvas
$menu_titles[] = 'Canvas';
$menu_links[] = 'canvas';
$menu_classes[] = 'img';

// Shop
if (__MOD_SHOP && $perm['catalog'])
{
    $menu_titles[] = 'Products';
    $menu_links[] = 'catalog';
    $menu_classes[] = 'catalog';
}

// Orders
if (__MOD_SHOP_ORDERS && $perm['orders'])
{
    $menu_titles[] = 'Orders';
    $menu_links[] = 'orders';
    $menu_classes[] = 'orders';
}

// Users and their permissions
if (__MOD_SHOP_USERS && $perm['users'])
{
    $menu_titles[] = 'Customers';
    $menu_links[] = 'users';
    $menu_classes[] = 'users';
}

// Slider at main
if (__MOD_SLIDER && $perm['slider'])
{
    $menu_titles[] = 'Main page slider';
    $menu_links[] = 'slider';
    $menu_classes[] = 'slider';
}

// Gallery
if (__MOD_GALLERY && $perm['gallery'])
{
    $menu_titles[] = 'Gallery';
    $menu_links[] = 'gallery';
    $menu_classes[] = 'img';
}

// Admins
if (__MOD_USERS && $perm['admins'])
{
    $menu_titles[] = 'Admins';
    $menu_links[] = 'admins';
    $menu_classes[] = 'admins';
}

// Profile
$menu_titles[] = 'My profile';
$menu_links[] = 'profile';
$menu_classes[] = 'profile';

// Options
if (__MOD_OPTIONS && $perm['options'])
{
    $menu_titles[] = 'Options';
    $menu_links[] = 'options';
    $menu_classes[] = 'options';
}

// To main page
$menu_titles[] = 'Go to the site';
$menu_links[] = 'to_site';
$menu_classes[] = 'home';

// Exit
$menu_titles[] = 'Exit';
$menu_links[] = 'exit';
$menu_classes[] = 'exit';

// Create menu
$menu = array();
for ($i = 0; $i < count($menu_titles); $i++)
{
    $menu[$i]['title'] = $menu_titles[$i];
    $menu[$i]['link']  = $menu_links[$i];
    $menu[$i]['class'] = $menu_classes[$i];
}

$smarty->assign('menus', $menu);
?>