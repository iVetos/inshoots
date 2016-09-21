<?php

/**
 * Services
 * 
 * @package UPcms\Services
 * @author UP Studio <info@up-studio.net>
 * @date 20/07/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.service.php');
include_once (__DIR_CLASSES . 'class.image.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

// Vars
define('__CONST_SOME_NAME', 'Services');
define('__CONST_SOME_TABLE', 'services');
define('__CONST_SOME_DIR', 'img/services/');
define('__CONST_SOME_IMG_WIDTH', 400);
define('__CONST_SOME_IMG_HEIGHT', 400);

$smarty->assign('page_name', __CONST_SOME_NAME);
$smarty->assign('page_addr', __CONST_SOME_TABLE);

switch ($action)
{
    // Show all
    case 'show':
        $smarty->assign('some', Service::show(__CONST_SOME_TABLE));
        break;
    
    // Adding
    case 'add':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $text_s = Db::prepare($_POST['text_s']);
            $text = Db::prepare($_POST['text']);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);
            $img = '';

            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                $img = Image::imageAdd('img', __CONST_SOME_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_SOME_DIR, __CONST_SOME_IMG_WIDTH, __CONST_SOME_IMG_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }
            
            // Add to DB
            if (Service::add(__CONST_SOME_TABLE, $name, $text_s, $text, $img, $title, $description, $keywords))
            {
                $id = Db::returnId();
                
                Log::write(100, __file__, __CONST_SOME_NAME . ' - Add - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Service was successfully added.';
            }
            else
            {
                Log::write(101, __file__, __CONST_SOME_NAME . ' - An error has occurred - Add - [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred';
            }
            redirect('../admin/?page=' . __CONST_SOME_TABLE . '&action=show&id=' . $id . '');
        }
        break;
    
    // Editing
    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $text_s = Db::prepare($_POST['text_s']);
            $text = Db::prepare($_POST['text']);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);
            
            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                // Delete old image
                $cover = Service::returnCover($id, __CONST_SOME_TABLE);
                if(!empty($cover))
                {
                   Image::imageDel(__CONST_SOME_DIR . $cover);
                }

                $img = Image::imageAdd('img', __CONST_SOME_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_SOME_DIR, __CONST_SOME_IMG_WIDTH, __CONST_SOME_IMG_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }
            else
            {
                $img = Service::returnCover($id, __CONST_SOME_TABLE);
            }
            
            // Edit item in DB
            if (Service::edit($id, __CONST_SOME_TABLE, $name, $text_s, $text, $img, $title, $description, $keywords))
            {
                Log::write(100, __file__, __CONST_SOME_NAME . ' - Edit - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Service was successfully edited.';
            }
            else
            {
                Log::write(101, __file__, __CONST_SOME_NAME . ' - An error has occurred - Edit - [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred.';
            }
            redirect('../admin/?page=' . __CONST_SOME_TABLE . '&action=show');
        }
        else
        {
            // Prepare data for editing
            $some = Service::returnOne($id, __CONST_SOME_TABLE);
            if (!empty($some))
            {
                $smarty->assign('some', $some);
            }
            else
            {
                redirect('../admin/?page=' . __CONST_SOME_TABLE);
            }
        }
        break;
    
    // Deleting
    case 'del':
        $cover = Service::returnCover($id, __CONST_SOME_TABLE);
        if (Service::del($id, __CONST_SOME_TABLE))
        {
            // Deleting image
            if(!empty($cover))
            {
               Image::imageDel(__CONST_SOME_DIR . $cover); 
            }
            Log::write(100, __file__, __CONST_SOME_NAME . ' - Delete - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Service was successfully deleted.';
        }
        else
        {
            Log::write(101, __file__, __CONST_SOME_NAME . ' - An error has occurred - Delete - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'An error has occurred.';
        }
        redirect('../admin/?page=' . __CONST_SOME_TABLE . '&action=show');
        break;
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('services.tpl');

?>