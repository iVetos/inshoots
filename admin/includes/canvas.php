<?php

/**
 * Canvas
 *
 * @package UPcms\Canvas
 * @author UP Studio <info@up-studio.net>
 * @date 28/01/2016
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');

Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.canvas.php');
include_once (__DIR_CLASSES . 'class.image.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    // Show all
    case 'show':
        $smarty->assign('canvases', Canvas::show());
        break;

    // Adding
    case 'add':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $price = strip_comma(Db::prepare($_POST['price']));
            $img = '';

            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                $img = Image::imageAdd('img', __CONST_CANVAS_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_CANVAS_DIR, __CONST_PRODUCT_IMG_WIDTH, __CONST_PRODUCT_IMG_HEIGHT, $img['name'], 0);
                $img = $img['name_full'];
            }

            // Add canvas
            if (Canvas::add($name, $img, $price))
            {
                $id = Db::returnId();

                Log::write(100, __file__, 'Canvas adding - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Canvas was successfully added';
            }
            else
            {
                Log::write(101, __file__, 'An error has occurred - add - [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred';
            }
            redirect('../admin/?page=canvas&action=show&id=' . $id . '');
        }
        break;

    // Editing
    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $price = strip_comma(Db::prepare($_POST['price']));

            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                // Cover
                $cover = Canvas::returnCover($id);
                if(!empty($cover))
                {
                    Image::imageDel(__CONST_CANVAS_DIR . $cover);
                }

                $img = Image::imageAdd('img', __CONST_CANVAS_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_CANVAS_DIR, __CONST_PRODUCT_IMG_WIDTH, __CONST_PRODUCT_IMG_HEIGHT, $img['name'], 0);
                $img = $img['name_full'];
            }
            else
            {
                $img = Canvas::returnCover($id);
            }

            // Edit
            if (Canvas::edit($id, $name, $img, $price))
            {
                Log::write(100, __file__, 'Canvas editing - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Canvas was successfully edited';
            }
            else
            {
                Log::write(101, __file__, 'An error has occurred - edit [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred';
            }
            redirect('../admin/?page=canvas&action=show');
        }
        else
        {
            $smarty->assign('canvas', Canvas::returnOne($id));
        }
        break;

    // Delete
    case 'del':
        $cover = Canvas::returnCover($id);
        if (Canvas::del($id))
        {
            // Deleting img file
            if(!empty($cover))
            {
                Image::imageDel(__CONST_CANVAS_DIR . $cover);
            }
            Log::write(100, __file__, 'Canvas deleting - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Canvas was successfully deleted';
        }
        else
        {
            Log::write(101, __file__, 'An error has occurred - delete - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'An error has occurred';
        }
        redirect('../admin/?page=canvas&action=show');
        break;
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('canvas.tpl');

?>