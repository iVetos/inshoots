<?php /* Smarty version Smarty 3.1.4, created on 2016-06-01 14:47:08
         compiled from "templates\service.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149415552378a2e7397-19673924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d5ca6c8dc88260dd46de489a01608ec60acc2d7' => 
    array (
      0 => 'templates\\service.tpl',
      1 => 1464781618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149415552378a2e7397-19673924',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5552378a2e820',
  'variables' => 
  array (
    'service' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5552378a2e820')) {function content_5552378a2e820($_smarty_tpl) {?><div id="service-image" class="container-fluid">
    <div id="service-image-icon">
        <img src="/admin/img/services/<?php echo $_smarty_tpl->tpl_vars['service']->value['img'];?>
" alt="" />
    </div>
</div>
<div id="service-text" class="container">
    <div class="row">
        <h1><?php echo $_smarty_tpl->tpl_vars['service']->value['name'];?>
</h1>
        <?php echo $_smarty_tpl->tpl_vars['service']->value['text'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("lets_talk.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>