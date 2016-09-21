<?php

/**
 * Products
 * 
 * @package UPcms\Catalog
 * @author UP Studio <info@up-studio.net>
 * @date 27/06/2015
 */

if (!defined('__CONST_INCLUDES'))
    exit('Access denied');
    
Up::checkPerm($page);

include_once (__DIR_CLASSES . 'class.category.php'); // categories
include_once (__DIR_CLASSES . 'class.product.php');  // products
include_once (__DIR_CLASSES . 'class.params.php');   // params
include_once (__DIR_CLASSES . 'class.image.php');    // work with images

$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
$id = (isset($_GET['id'])) ? Db::prepare($_GET['id']) : 0;

function delProducts($id)
{
    $products = Product::show($id);
    foreach($products as $product)
    {
        // Deleting product
        if(Product::del($product['id']))
        {
            Log::write(100, __file__, 'Deleting product - (id:' . $product['id'] . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Product was successfully deleted.';
            
            // Deleting images
            for ($i = 1; $i <= 4; $i++)
            {
                if(strlen($product['img_'.$i]) > 0 )
                {
                    unlink(__CONST_PRODUCTS_DIR . $product['img_'.$i]);
                    unlink(__CONST_PRODUCTS_DIR . 'small_' . $product['img_'.$i]);
                }
            }
        }
        else
        {
            Log::write(101, __file__, 'An error has occurred - product delete - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'An error has occurred.';
        }
    }
}

switch ($action)
{
    // All categories or products
    case 'show':
        $categories = Category::show($id);
        $products = Product::show($id);

        $smarty->assign('categories', $categories);
        $smarty->assign('products', $products);
        break;

    // Adding category
    case 'addCat':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);
            
            // Adding cover
            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                $img = Image::imageAdd('img', __CONST_CATEGORIES_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_CATEGORIES_DIR, __CONST_CATEGORY_COVER_WIDTH, __CONST_CATEGORY_COVER_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }
            else {
                $img = '';
            }
            
            // Adding to DB
            if(Category::add($id, $name, $text, $img, $title, $description, $keywords))
            {
                $id_catalog = Db::returnId();
            
                // Adding params
                (__CONST_SHOP_PARAMS) ? Params::add($id_catalog, $_POST) : Params::addEmpty($id_catalog);
                
                Log::write(100, __file__, 'Adding category - (id:' . $id_catalog . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Category was successfully added.';
            }
            else
            {
                Log::write(101, __file__, 'An error has occurred - add - [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred.';
            }

            redirect('../admin/?page=catalog&action=show&id=' . $id . '');
        }
        else
            if (__CONST_SHOP_PARAMS)
            {
                if ($id != 0)
                {
                    $paramsC = Params::returnParams($id);
                    $smarty->assign('params', $paramsC);
                }
                else
                {
                    $smarty->assign('mainCat', true);
                    $smarty->assign('params', array());
                }
            }
        break;

    // Редактирование раздела
    case 'editCat':
        if (isset($_POST['name']))
        {
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);
            
            // Добавляем обложку
            if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name']))
            {
                // Удаление старой обложки
                $cover = Category::returnCover($id);
                if(!empty($cover))
                {
                   Image::imageDel(__CONST_CATEGORIES_DIR . $cover); 
                }
                    
                $img = Image::imageAdd('img', __CONST_CATEGORIES_DIR);
                Image::imageResize($img['full'], 'admin/' . __CONST_CATEGORIES_DIR, __CONST_CATEGORY_COVER_WIDTH, __CONST_CATEGORY_COVER_HEIGHT, $img['name'], 1);
                $img = $img['name_full'];
            }
            else {
                $img = Category::returnCover($id);
            }
            
            // Редактируем раздел
            if(Category::edit($id, $name, $text, $img, $title, $description, $keywords))
            {
                Log::write(100, __file__, 'Editing category - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Category was successfully edited.';
            }
            else
            {
                Log::write(101, __file__, 'An error has occurred - edit - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred.';
            }
            
            // Рудактируем параметры
            if (__CONST_SHOP_PARAMS)
            {
                Params::edit($id, $_POST);
            }

            $categoryCur = Category::returnCategory($id);
            redirect('../admin/?page=catalog&action=show&id=' . $categoryCur['id_parent'] . '');
        }
        else
        {
            $categoryCur = Category::returnCategory($id);
            if (!empty($categoryCur))
            {
                $smarty->assign('category', $categoryCur);
                if (__CONST_SHOP_PARAMS)
                {
                    $paramsC = Params::returnParams($id);
                    $smarty->assign('params', $paramsC);
                }
            }
            else
            {
                redirect('../admin/?page=catalog');
            }
        }
        break;

    // Удаление раздела
    case 'delCat':
        $categoryCur = Category::returnCategory($id);        
        $cover = Category::returnCover($id);

        if (Category::del($id))
        {
            // Удаление обложки
            if(!empty($cover))
            {
               Image::imageDel(__CONST_CATEGORIES_DIR . $cover); 
            }
            
            // Удаляем параметры
            Params::del($id);
            
            // Удаление подразделов и товаров
            $categories = Category::show($id);
            // Если есть подкатегории, то удаляем товары в них
            if(!empty($categories))
            {
                foreach($categories as $category)
                {
                    delProducts($category['id']);
                    
                    // Удаляем текущую подкатегорию
                    $cover = Category::returnCover($category['id']);
                                      
                    if (Category::del($category['id']))
                    {
                        // Удаляем параметры
                        Params::del($category['id']);
                        
                        // Удаление обложки
                        if(!empty($cover))
                        {
                           Image::imageDel(__CONST_CATEGORIES_DIR . $cover); 
                        }
                        
                        Log::write(100, __file__, 'Delete category - (id:' . $category['id'] . ') [' . $_SESSION['adm_user_name'] . ']');
                    }
                    else
                    {
                        Log::write(101, __file__, 'Error when delete category - (id:' . $category['id'] . ') [' . $_SESSION['adm_user_name'] . ']');
                    }
                }
            }
            else
            {
                delProducts($id);
            }
            
            Log::write(100, __file__, 'Deleting category - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Category was successfully deleted.';
        }
        else
        {
            Log::write(101, __file__, 'An error has occurred - delete - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'An error has occurred.';
        }
        redirect('../admin/?page=catalog&action=show&id=' . $categoryCur['id_parent'] . '');
        break;
        
    case 'sort':
        if (isset($_GET['data']))
        {
            $data = explode(',', str_replace('id-', '', Db::prepare($_GET['data'])));
            for ($i = 0; $i < count($data); $i++)
            {
                $sql = "UPDATE `categories` SET `sort` = " . ($i + 1) . " WHERE `id` = " . $data[$i];
                if (Db::exec($sql))
                {
                    Log::write(100, __file__, 'Сортировка категорий [' . $_SESSION['adm_user_name'] . ']');
                }
                else
                {
                    Log::write(101, __file__, 'Ошибка при сортировке категорий [' . $_SESSION['adm_user_name'] . ']');
                }
            }
        }
        else
        {            
            $categories = Category::show($id);
            if (empty($categories))
            {
                redirect('../admin/?page=catalog&action=show&id=' . $id . '');
            }
            $smarty->assign('categories', $categories);
        }
        break;

/** Products */
    // Adding product
    case 'addProduct':
        if (isset($_POST['name']))
        {
            $price = (__CONST_SHOP_PRICE) ? Db::prepare(strip_comma($_POST['price'])) : 0.00;
            $parent = 0;
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $orient = (isset($_POST['orient'])) ? Db::prepare(strip_comma($_POST['orient'])) : 1;
            $nft = (isset($_POST['nft'])) ? 1 : 0;
            $param1 = (isset($_POST['param1'])) ? Db::prepare(strip_comma($_POST['param1'])) : '';
            $param2 = (isset($_POST['param2'])) ? Db::prepare(strip_comma($_POST['param2'])) : '';
            $param3 = (isset($_POST['param3'])) ? Db::prepare(strip_comma($_POST['param3'])) : '';
            $param4 = (isset($_POST['param4'])) ? Db::prepare(strip_comma($_POST['param4'])) : '';
            $param5 = (isset($_POST['param5'])) ? Db::prepare(strip_comma($_POST['param5'])) : '';
            $param6 = (isset($_POST['param6'])) ? Db::prepare(strip_comma($_POST['param6'])) : '';
            $param7 = (isset($_POST['param7'])) ? Db::prepare(strip_comma($_POST['param7'])) : '';
            $param8 = (isset($_POST['param8'])) ? Db::prepare(strip_comma($_POST['param8'])) : '';
            $param9 = (isset($_POST['param9'])) ? Db::prepare(strip_comma($_POST['param9'])) : '';
            $param10 = (isset($_POST['param10'])) ? Db::prepare(strip_comma($_POST['param10'])) : '';
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);
            

            if(Product::add($id, $parent, $name, $text, $price, $nft, $orient, $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $title, $description, $keywords))
            {
                $id_product = Db::returnId();                
                Log::write(100, __file__, 'Adding product - (id:' . $id_product . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Product was successfully added.';

                // Add img if exist img
                if (!empty($_FILES['img_1']['name'])){

                    // Original
                    $img_original = md5(microtime() . rand(0, 9999) . 'Alex13UP'); // protect
                    $img = Image::imageAdd('img_1', __CONST_PRODUCTS_DIR, $img_original);

                    // Copy
                    $img_name = md5(microtime() . rand(0, 9999));
                    Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, __CONST_PRODUCT_MED_IMG_WIDTH, __CONST_PRODUCT_MED_IMG_HEIGHT, 'med_'.$img_name, 0);

                    // Watermark for copy
                    $img_path = __CONST_PRODUCTS_DIR . 'med_'.$img_name . '.jpg';
                    // Checking orientation
                    if($orient == 2){
                        // Vertical image
                        // If photo isn't for trade
                        if($nft){
                            Image::watermarkImage($img_path, 'img/products/watermark_mid_v.png', 'img/products/med_'.$img_name.'.jpg', 'center');
                            Image::watermarkImage($img_path, 'img/products/watermark_bottom_nft_v.png', 'img/products/med_'.$img_name.'.jpg', 'bottom');
                        }
                        // Photo for trade
                        else {
                            Image::watermarkImage($img_path, 'img/products/watermark_up_v.png', 'img/products/med_'.$img_name.'.jpg', 'top');
                            Image::watermarkImage($img_path, 'img/products/watermark_mid_v.png', 'img/products/med_'.$img_name.'.jpg', 'center');
                            Image::watermarkImage($img_path, 'img/products/watermark_bottom_v.png', 'img/products/med_'.$img_name.'.jpg', 'bottom');
                        }

                        // Small copy
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, __CONST_PRODUCT_IMG_VERT_WIDTH, __CONST_PRODUCT_IMG_VERT_HEIGHT, 'small_'.$img_name, 1);
                        Image::watermarkImage(__CONST_PRODUCTS_DIR . 'small_'.$img_name . '.jpg', 'img/products/watermark_mid_sm.png', 'img/products/small_'.$img_name.'.jpg', 'center');
                    }
                    else {
                        // Horizontal image
                        // If photo isn't for trade
                        if($nft){
                            Image::watermarkImage($img_path, 'img/products/watermark_mid.png', 'img/products/med_'.$img_name.'.jpg', 'center');
                            Image::watermarkImage($img_path, 'img/products/watermark_bottom_nft.png', 'img/products/med_'.$img_name.'.jpg', 'bottom');
                        }
                        // Photo for trade
                        else {
                            Image::watermarkImage($img_path, 'img/products/watermark_up.png', 'img/products/med_'.$img_name.'.jpg', 'top');
                            Image::watermarkImage($img_path, 'img/products/watermark_mid.png', 'img/products/med_'.$img_name.'.jpg', 'center');
                            Image::watermarkImage($img_path, 'img/products/watermark_bottom.png', 'img/products/med_'.$img_name.'.jpg', 'bottom');
                        }

                        // Small copy
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, __CONST_PRODUCT_IMG_WIDTH, __CONST_PRODUCT_IMG_HEIGHT, 'small_'.$img_name, 1);
                        Image::watermarkImage(__CONST_PRODUCTS_DIR . 'small_'.$img_name . '.jpg', 'img/products/watermark_mid_sm.png', 'img/products/small_'.$img_name.'.jpg', 'center');
                    }

                    // Add info to DB
                    $img = $img['name_full'];
                    // If photo isn't for trade
                    if($nft){
                        // Deleting original
                        Image::imageDel(__CONST_PRODUCTS_DIR . $img);
                        Product::setImg($id_product, 'img_2', $img_name . '.jpg');
                    }
                    else {
                        Product::setImg($id_product, 'img_1', $img);
                        Product::setImg($id_product, 'img_2', $img_name . '.jpg');
                    }
                }
            }
            else
            {
                Log::write(101, __file__, 'An error has occurred - add product - [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred.';
            }
            
            redirect('../admin/?page=catalog&action=show&id=' . $id . '');
        }
        else
        {
            // If set params
            if (__CONST_SHOP_PARAMS)
            {
                $smarty->assign('params', Params::returnParams($id));
            }
        }
        break;

    // Editing product
    case 'editProduct':
        if (isset($_POST['name']))
        {
            // Prepare vars
            $price = (__CONST_SHOP_PRICE) ? Db::prepare(strip_comma($_POST['price'])) : 0.00;
            $parent = 0;
            $name = Db::prepare($_POST['name']);
            $text = Db::prepare($_POST['text']);
            $nft = (isset($_POST['nft'])) ? 1 : 0;
            $orient = (isset($_POST['orient'])) ? Db::prepare(strip_comma($_POST['orient'])) : 1;
            $param1 = (isset($_POST['param1'])) ? Db::prepare(strip_comma($_POST['param1'])) : '';
            $param2 = (isset($_POST['param2'])) ? Db::prepare(strip_comma($_POST['param2'])) : '';
            $param3 = (isset($_POST['param3'])) ? Db::prepare(strip_comma($_POST['param3'])) : '';
            $param4 = (isset($_POST['param4'])) ? Db::prepare(strip_comma($_POST['param4'])) : '';
            $param5 = (isset($_POST['param5'])) ? Db::prepare(strip_comma($_POST['param5'])) : '';
            $param6 = (isset($_POST['param6'])) ? Db::prepare(strip_comma($_POST['param6'])) : '';
            $param7 = (isset($_POST['param7'])) ? Db::prepare(strip_comma($_POST['param7'])) : '';
            $param8 = (isset($_POST['param8'])) ? Db::prepare(strip_comma($_POST['param8'])) : '';
            $param9 = (isset($_POST['param9'])) ? Db::prepare(strip_comma($_POST['param9'])) : '';
            $param10 = (isset($_POST['param10'])) ? Db::prepare(strip_comma($_POST['param10'])) : '';
            $title = Db::prepare($_POST['title']);
            $description = Db::prepare($_POST['description']);
            $keywords = Db::prepare($_POST['keywords']);

            // Edit product
            if(Product::edit($id, $parent, $name, $text, $price, $nft, $orient, $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $title, $description, $keywords))
            {
                // If all ok
                Log::write(100, __file__, 'Product edit - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'Product was successfully edited.';

                // If exist img
                if (!empty($_FILES['img_1']['name'])){
                    // Deleting current image
                    $cur_img = Product::returnImg($id, 1);
                    if (!empty($cur_img)) {
                        // Deleting original
                        Image::imageDel(__CONST_PRODUCTS_DIR . $cur_img);

                        // Deleting copies
                        $cur_img = Product::returnImg($id, 2);
                        Image::imageDel(__CONST_PRODUCTS_DIR . 'med_' . $cur_img);
                        Image::imageDel(__CONST_PRODUCTS_DIR . 'small_' . $cur_img);
                    }

                    // Original
                    $img_original = md5(microtime() . rand(0, 9999) . 'Alex13UP'); // protect
                    $img = Image::imageAdd('img_1', __CONST_PRODUCTS_DIR, $img_original);

                    // Copy
                    $img_name = md5(microtime() . rand(0, 9999));
                    if($orient == 2){
                        // Vertical
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, __CONST_PRODUCT_MED_VERT_IMG_WIDTH, __CONST_PRODUCT_MED_VERT_IMG_HEIGHT, 'med_'.$img_name, 0);
                    }
                    else {
                        // Horizontal
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, __CONST_PRODUCT_MED_IMG_WIDTH, __CONST_PRODUCT_MED_IMG_HEIGHT, 'med_'.$img_name, 0);
                    }

                    // Watermark for copy
                    $img_path = __CONST_PRODUCTS_DIR . 'med_'.$img_name . '.jpg';
                    // Checking orientation
                    if($orient == 2){
                        // Vertical image
                        // If photo isn't for trade
                        if($nft){
                            Image::watermarkImage($img_path, 'img/products/watermark_mid_v.png', 'img/products/med_'.$img_name.'.jpg', 'center');
                            Image::watermarkImage($img_path, 'img/products/watermark_bottom_nft_v.png', 'img/products/med_'.$img_name.'.jpg', 'bottom');
                        }
                        // Photo for trade
                        else {
                            Image::watermarkImage($img_path, 'img/products/watermark_up_v.png', 'img/products/med_'.$img_name.'.jpg', 'top');
                            Image::watermarkImage($img_path, 'img/products/watermark_mid_v.png', 'img/products/med_'.$img_name.'.jpg', 'center');
                            Image::watermarkImage($img_path, 'img/products/watermark_bottom_v.png', 'img/products/med_'.$img_name.'.jpg', 'bottom');
                        }

                        // Small copy
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, __CONST_PRODUCT_IMG_VERT_WIDTH, __CONST_PRODUCT_IMG_VERT_HEIGHT, 'small_'.$img_name, 1);
                        Image::watermarkImage(__CONST_PRODUCTS_DIR . 'small_'.$img_name . '.jpg', 'img/products/watermark_mid_sm.png', 'img/products/small_'.$img_name.'.jpg', 'center');
                    }
                    else {
                        // Horizontal image
                        // If photo isn't for trade
                        if($nft){
                            Image::watermarkImage($img_path, 'img/products/watermark_mid.png', 'img/products/med_'.$img_name.'.jpg', 'center');
                            Image::watermarkImage($img_path, 'img/products/watermark_bottom_nft.png', 'img/products/med_'.$img_name.'.jpg', 'bottom');
                        }
                        // Photo for trade
                        else {
                            Image::watermarkImage($img_path, 'img/products/watermark_up.png', 'img/products/med_'.$img_name.'.jpg', 'top');
                            Image::watermarkImage($img_path, 'img/products/watermark_mid.png', 'img/products/med_'.$img_name.'.jpg', 'center');
                            Image::watermarkImage($img_path, 'img/products/watermark_bottom.png', 'img/products/med_'.$img_name.'.jpg', 'bottom');
                        }

                        // Small copy
                        Image::imageResize($img['full'], 'admin/' . __CONST_PRODUCTS_DIR, __CONST_PRODUCT_IMG_WIDTH, __CONST_PRODUCT_IMG_HEIGHT, 'small_'.$img_name, 1);
                        Image::watermarkImage(__CONST_PRODUCTS_DIR . 'small_'.$img_name . '.jpg', 'img/products/watermark_mid_sm.png', 'img/products/small_'.$img_name.'.jpg', 'center');
                    }

                    // Add info to DB
                    $img = $img['name_full'];
                    // If photo isn't for trade
                    if($nft){
                        // Deleting original
                        Image::imageDel(__CONST_PRODUCTS_DIR . $img);
                        Product::setImg($id, 'img_2', $img_name . '.jpg');
                    }
                    else {
                        Product::setImg($id, 'img_1', $img);
                        Product::setImg($id, 'img_2', $img_name . '.jpg');
                    }
                }
            }
            else
            {
                // Error
                Log::write(101, __file__, 'An error has occurred - add product - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
                $_SESSION['walert'] = 'An error has occurred.';
            }

            // Redirecting to current category
            $category = Product::returnProduct($id);
            $id_cat = $category['id_cat'];
            redirect('../admin/?page=catalog&action=show&id=' . $id_cat . '');
        }
        else
        {
            // Prepare data to edit
            $productCur = Product::returnProduct($id);
            if (!empty($productCur))
            {
                $smarty->assign('product', $productCur);
            }
            else
            {
                // Product doesn't exist
                redirect('../admin/?page=catalog');
                break;
            }

            // When set params
            if (__CONST_SHOP_PARAMS)
            {
                $smarty->assign('params', Params::returnParams($productCur['id_cat']));
            }

        }
        break;

    // Deleting product
    case 'delProduct':
        // Prepare data
        $product = Product::returnProduct($id);
        $img_original = Product::returnImg($id, 1);
        $img_copy = Product::returnImg($id, 2);

        // Deleting
        if(Product::del($id))
        {
            // If all ok
            Log::write(100, __file__, 'Product delete - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'Product was successfully deleted.';

            // Deleting current image
            if (!empty($img_original)) {
                // Deleting original
                Image::imageDel(__CONST_PRODUCTS_DIR . $img_original);
            }
            if(!empty($img_copy)) {
                // Deleting copies
                Image::imageDel(__CONST_PRODUCTS_DIR . 'med_' . $img_copy);
                Image::imageDel(__CONST_PRODUCTS_DIR . 'small_' . $img_copy);
            }
        }
        else
        {
            // Error
            Log::write(101, __file__, 'An error has occurred - product delete - (id:' . $id . ') [' . $_SESSION['adm_user_name'] . ']');
            $_SESSION['walert'] = 'An error has occurred.';
        }

        redirect('../admin/?page=catalog&action=show&id=' . $product['id_cat'] . '');
        break;
}
$smarty->assign('id', $id);
$smarty->assign('action', $action);
$smarty->display('catalog.tpl');