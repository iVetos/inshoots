<?php
// Security
define('__CONST_INCLUDES', true);

// Include configs
require_once('../configs/const.inc.php');
require_once('../includes/functions.inc.php');
require_once('../classes/class.db.php');
Db::connect();

$addr = replaceSpaces(Db::prepareHtml($_POST['addr']));
$sql = "SELECT * FROM `pages` WHERE `addr` = '$addr'";
if(Db::numRows($sql) > 0){
    echo '<span class="red">Адрес уже занят</span>';
}
else {
    echo '<span class="green">Адрес свободен</span>';
}
?>