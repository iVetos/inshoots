<?php

/**
 * Page editor
 * 
 * @package UPcms\Pages
 * @author UP Studio <info@up-studio.net>
 * @date 2015-06-03
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.page.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    case 'show':
        $pages = Page::show($id);
        $id_cat = ($id != 0) ? Page::returnParentId($id) : 0;
        $smarty->assign('id_cat', $id_cat);
        $smarty->assign('pages', $pages);
        break;

    case 'add':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $addr = Db::prepareHtml($_POST['addr']);
            $addr = replaceSpaces($addr);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);

            if (Page::add($id, $name, $text, $addr, $title, $description, $keywords))
            {
                $id_page = Db::returnId();
                Log::write(100, __file__, 'Adding page - (id:'.$id_page.') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Page was successfully added.';
            }
            else
            {
                Log::write(101, __file__, 'An error has occurred - add page - [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred.';
            }
            
            redirect('../admin/?page=pages&action=show&id=' . $id . '');
        }
        break;

    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $addr = Db::prepare($_POST['addr']);
            $addr = replaceSpaces($addr);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);

            if (Page::edit($id, $name, $text, $addr, $title, $description, $keywords))
            {
                Log::write(100, __file__, 'Editing page - (id:'.$id.') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Page was successfully edited.';
            }
            else
            {
                Log::write(101, __file__, 'An error has occurred - edit page - [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred.';
            }
            $id_cat = Page::returnParentId($id);
            redirect('../admin/?page=pages&action=show&id=' . $id_cat . '');
        }
        else
        {
            $pages = Page::returnPage($id);
            if (!empty($pages))
            {
                $smarty->assign('page', $pages);
            }
            else
            {
                redirect('../admin/?page=pages');
            }
        }
        break;

    case 'del':
        $id_cat = Page::returnParentId($id);
        if (Page::del(($id)))
        {
            Log::write(100, __file__, 'Deleting page - (id:'.$id.') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Page was successfully deleted.';
        }
        else
        {
            Log::write(101, __file__, 'An error has occurred - delete page - [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'An error has occurred.';
        }
        redirect('../admin/?page=pages&action=show&id=' . $id_cat . '');
        break;
}

$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('pages.tpl');