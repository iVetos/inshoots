<?php
/**
 * News
 * @author UP Studio
 * @lastmodify 20.09.2013
 */

if(!defined('__CONST_INCLUDES')) exit('Access denied');

Up::checkPerm($page);

$smarty->display('options.tpl');
?>