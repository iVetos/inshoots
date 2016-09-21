<?php

session_start();
error_reporting(E_ALL); // Show all errors

require_once ('configs/const.inc.php');           // Constants
require_once (__DIR_INCLUDES . 'smarty.inc.php'); // Smarty
require_once (__DIR_INCLUDES . 'main.inc.php');   // Classes and functions
//unset($_SESSION['cart']);
//dump($_SESSION);

/** URL */
$url = Up::url();
$smarty->assign('url', $url);

/** Menu */
$smarty->assign('menu', Up::menu());

/** Include page */
require_once (__DIR_INCLUDES . 'page.inc.php');