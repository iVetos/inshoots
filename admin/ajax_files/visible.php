<?php
// Security
define('__CONST_INCLUDES', true);

// Include configs
require_once('../configs/const.inc.php');
require_once('../includes/functions.inc.php');
require_once('../classes/class.db.php');
Db::connect();

$id = Db::prepare($_POST['id']);
$value = Db::prepare($_POST['value']);
$table = Db::prepare($_POST['table']);

$sql = "UPDATE `$table` SET `actual` = $value WHERE `id` = $id";
Db::exec($sql);

switch($table)
{
    case 'categories':
        $msg = ($value == 1) ? 'Category is shows' : 'Category is hidden';
        break;
        
    case 'products':
        $msg = ($value == 1) ? 'Product is shows' : 'Product is hidden';
        break;
}

echo $msg;
?>