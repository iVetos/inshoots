<?php
// Security
define('__CONST_INCLUDES', true);

// Include configs
require_once('../configs/const.inc.php');
require_once('../includes/functions.inc.php');
require_once('../classes/class.db.php');
Db::connect();

$id = Db::prepare($_POST['id']);
$name = Db::prepare($_POST['img']);
$num = Db::prepare($_POST['num']);

$sql = "SELECT `img_2` FROM `products` WHERE `id` = $id";
$img2 = Db::doOne($sql);
$img2 = $img2['img_2'];

if(strlen($_POST['img']) > 0 )
{
    unlink('../' . __CONST_PRODUCTS_DIR . $name);
    unlink('../' . __CONST_PRODUCTS_DIR . 'med_' . $img2);
    unlink('../' . __CONST_PRODUCTS_DIR . 'small_' . $img2);
    
    $sql = "UPDATE `products` SET `img_1` = '', `img_2` = '' WHERE `id` = $id";
    Db::exec($sql);
}

echo 'Image was successfully deleted';
?>