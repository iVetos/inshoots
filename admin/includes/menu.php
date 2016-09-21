<?php

/**
 * Menu editor
 * 
 * @package UPcms\Menu
 * @author UP Studio <info@up-studio.net>
 * @date 2015-03-06
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm('pages');

include_once (__DIR_CLASSES . 'class.menu.php');
$menu = new Menu();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    case 'show':
        $menu = Menu::show($id);
        $id_cat = ($id != 0) ? Menu::returnParentId($id) : 0;
        $smarty->assign('id_cat', $id_cat);
        $smarty->assign('menu', $menu);
        break;

    case 'add':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $link = Db::prepareHtml($_POST['link']);

            if (Menu::add($id, $name, $link))
            {
                Log::write(100, __file__, 'Adding item [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Item was successfully added.';
            }
            else
            {
                Log::write(101, __file__, 'An error has occurred - add item - [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred.';
            }
            redirect('../admin/?page=menu&action=show&id=' . $id . '');
        }
        break;

    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $link = Db::prepareHtml($_POST['link']);

            if (Menu::edit($id, $name, $link))
            {
                Log::write(100, __file__, 'Editing item [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Item was successfully edited.';
            }
            else
            {
                Log::write(101, __file__, 'An error has occurred - edit item [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred.';
            }
            $id_cat = Menu::returnParentId($id);
            redirect('../admin/?page=menu&action=show&id=' . $id_cat . '');
        }
        else
        {
            $menu = Menu::returnOne($id);
            if (!empty($menu))
            {
                $smarty->assign('menu', $menu);
            }
            else
            {
                redirect('../admin/?page=menu');
            }
        }
        break;

    case 'del':
        $id_cat = Menu::returnParentId($id);
        if (Menu::del($id))
        {
            Log::write(100, __file__, 'Deleting item [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Item was successfully deleted.';
        }
        else
        {
            Log::write(101, __file__, 'An error has occurred - delete item - [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'An error has occurred.';
        }
        redirect('../admin/?page=menu&action=show&id=' . $id_cat . '');
        break;

    case 'sort':
        if (isset($_GET['data']))
        {
            $data = explode(',', str_replace('id-', '', Db::prepare($_GET['data'])));
            for ($i = 0; $i < count($data); $i++)
            {
                $sql = "UPDATE `menu` SET `sort` = " . ($i + 1) . " WHERE `id` = " . $data[$i];
                if (Db::exec($sql))
                {
                    Log::write(100, __file__, 'Sorting items [' . $_SESSION['adm_user_name'] . ']');
                }
                else
                {
                    Log::write(101, __file__, 'An error has occurred when sorting [' . $_SESSION['adm_user_name'] . ']');
                }
            }
        }
        else
        {
            $menu = Menu::show($id);
            if (empty($menu))
            {
                redirect('../admin/?page=menu&action=show&id=' . $id . '');
            }
            $smarty->assign('menu', $menu);
        }
        break;
}

$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('menu.tpl');