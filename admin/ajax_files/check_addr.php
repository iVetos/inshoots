<?php
// Security
define('__CONST_INCLUDES', true);

// Include configs
require_once('../configs/const.inc.php');
require_once('../includes/functions.inc.php');
require_once('../classes/class.db.php');
Db::connect();

$addr = replaceSpaces(Db::prepareHtml($_POST['addr']));
$table = replaceSpaces(Db::prepareHtml($_POST['table']));

if(!empty($addr))
{
    $sql = "SELECT * FROM `$table` WHERE `addr` = '$addr'";
    if(Db::numRows($sql) > 0){
        echo '<span class="red">URL already in use</span>';
    }
    else {
        echo '<span class="green">URL is available</span>';
    }
}
else
{
    echo '';
}
?>