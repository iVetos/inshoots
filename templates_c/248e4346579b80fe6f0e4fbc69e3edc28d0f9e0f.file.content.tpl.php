<?php /* Smarty version Smarty 3.1.4, created on 2015-03-07 00:23:58
         compiled from "templates\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2913854fa1bb0dedca5-67286655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '248e4346579b80fe6f0e4fbc69e3edc28d0f9e0f' => 
    array (
      0 => 'templates\\content.tpl',
      1 => 1425680597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2913854fa1bb0dedca5-67286655',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_54fa1bb0e411c',
  'variables' => 
  array (
    'addr' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fa1bb0e411c')) {function content_54fa1bb0e411c($_smarty_tpl) {?><div id="content">
    <div id="addr">
        <?php echo $_smarty_tpl->tpl_vars['addr']->value;?>

    </div>
    <h1><?php echo $_smarty_tpl->tpl_vars['content']->value['name'];?>
</h1>
    <?php echo stripslashes($_smarty_tpl->tpl_vars['content']->value['text']);?>

</div><?php }} ?>