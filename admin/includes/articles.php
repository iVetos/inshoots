<?php

/**
 * Статьи
 * 
 * @package UPcms\Articles
 * @author UP Studio <info@up-studio.net>
 * @date 23.09.2014
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.articles.php');
include_once (__DIR_CLASSES . 'class.tags.php');
include_once (__DIR_CLASSES . 'class.image.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

switch ($action)
{
    // Отобразить все статьи
    case 'show':
        $smarty->assign('articles', Article::show());
        break;
    
    // Добавить статью
    case 'add':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $text_s = Db::prepare($_POST['text_s']);
            $date = Db::prepare($_POST['date']);
            $addr = Db::prepare($_POST['addr']);
            $tags = (__CONST_ARTICLES_TAGS) ? Db::prepareHtml($_POST['tags']) . ',' : '';
            $title = Db::prepareHtml($_POST['title']);
            $description = Db::prepareHtml($_POST['description']);
            $keywords = Db::prepareHtml($_POST['keywords']);
            $img = '';
            
            // Установлена ли обложка
            if(__CONST_ARTICLES_COVER)
            {
                if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
                {
                    $img = Image::imageAdd('img', __CONST_ARTICLES_DIR);
                    Image::imageResize($img['full'], 'admin/' . __CONST_ARTICLES_DIR, __CONST_ARTICLES_COVER_WIDTH, __CONST_ARTICLES_COVER_HEIGHT, $img['name'], 1);
                    $img = $img['name_full'];
                }
            }
            
            // Добавляем статью в БД
            if (Article::add($_SESSION['adm_user_id'], $name, $text_s, $text, $tags, $date, $addr, $img, $title, $description, $keywords))
            {
                $id = Db::returnId();
                
                // Установлены ли теги
                if (__CONST_ARTICLES_TAGS) 
                {
                    Tags::add($tags); // Добавляем теги в БД
                }
                Log::write(100, __file__, 'Добавление статьи - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Статья успешно добавлена.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при добавлении статьи [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при добавлении статьи.';
            }
            redirect('../admin/?page=articles&action=show&id=' . $id . '');
        }
        else
        {
            $smarty->assign('tags', Tags::show());
        }
        break;
    
    // Редактирование статьи
    case 'edit':
        if (isset($_POST['name']))
        {
            $name = Db::prepareHtml($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $text_s = Db::prepare($_POST['text_s']);
            $date = Db::prepare($_POST['date']);
            $addr = Db::prepare($_POST['addr']);
            $tags = (__CONST_ARTICLES_TAGS) ? Db::prepareHtml($_POST['tags']) . ',' : '';
            $title = Db::prepareHtml($_POST['title']);
            $description = Db::prepareHtml($_POST['description']);
            $keywords = Db::prepareHtml($_POST['keywords']);
            
            // Установлена ли обложка
            if(__CONST_ARTICLES_COVER)
            {
                if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
                {
                    // Удаление старой обложки
                    $cover = Article::returnCover($id);
                    if(!empty($cover))
                    {
                       Image::imageDel(__CONST_ARTICLES_DIR . $cover); 
                    }
    
                    $img = Image::imageAdd('img', __CONST_ARTICLES_DIR);
                    Image::imageResize($img['full'], 'admin/' . __CONST_ARTICLES_DIR, __CONST_ARTICLES_COVER_WIDTH, __CONST_ARTICLES_COVER_HEIGHT, $img['name'], 1);
                    $img = $img['name_full'];
                }
                else
                {
                    $img = Article::returnCover($id);
                }
            }
            else
            {
                $img = Article::returnCover($id);
            }
            
            // Редактируем статью
            if (Article::edit($id, $name, $text_s, $text, $tags, $date, $addr, $img, $title, $description, $keywords))
            {
                // Установлены ли теги
                if (__CONST_ARTICLES_TAGS)
                {
                    Tags::add($tags);
                }
                Log::write(100, __file__, 'Редактирование статьи - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Статья успешно отредактирована.';
            }
            else
            {
                Log::write(101, __file__, 'Ошибка при редактировании статьи [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Произошла ошибка при редактировании статьи.';
            }
            redirect('../admin/?page=articles&action=show');
        }
        else
        {
            // Подготавливаем данные для редактирования
            $articles = Article::returnOne($id);
            if (!empty($articles))
            {
                $articles['tags'] = substr($articles['tags'], 0, strlen($articles['tags']) - 1);
                $smarty->assign('articles', $articles);
                $smarty->assign('curTags', Tags::doTags($articles['tags']));
                $smarty->assign('tags', Tags::show());
            }
            else
            {
                redirect('../admin/?page=articles');
            }
        }
        break;
    
    // Удаление статьи
    case 'del':
        $cover = Article::returnCover($id);
        if (Article::del($id))
        {
            // Удаление обложки
            if(!empty($cover))
            {
               Image::imageDel(__CONST_ARTICLES_DIR . $cover); 
            }
            Log::write(100, __file__, 'Удаление статьи - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Статья успешно удалена.';
        }
        else
        {
            Log::write(101, __file__, 'Ошибка при удалении статьи - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Произошла ошибка при удалении статьи.';
        }
        redirect('../admin/?page=articles&action=show');
        break;
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('articles.tpl');

?>