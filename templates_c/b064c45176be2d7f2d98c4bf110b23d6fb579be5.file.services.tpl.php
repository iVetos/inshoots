<?php /* Smarty version Smarty 3.1.4, created on 2016-06-01 14:41:06
         compiled from "templates\services.tpl" */ ?>
<?php /*%%SmartyHeaderCode:341655af91941b3285-22232126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b064c45176be2d7f2d98c4bf110b23d6fb579be5' => 
    array (
      0 => 'templates\\services.tpl',
      1 => 1464781263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '341655af91941b3285-22232126',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55af919426c31',
  'variables' => 
  array (
    'services' => 0,
    'service' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55af919426c31')) {function content_55af919426c31($_smarty_tpl) {?><div id="my-services" class="container">
    <div class="row">
        <h1>My Services</h1>
        <?php  $_smarty_tpl->tpl_vars["service"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["service"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["service"]->key => $_smarty_tpl->tpl_vars["service"]->value){
$_smarty_tpl->tpl_vars["service"]->_loop = true;
?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
            <a href="/services/<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
"><img src="/admin/img/services/<?php echo $_smarty_tpl->tpl_vars['service']->value['img'];?>
" alt=""></a>
            <span><?php echo $_smarty_tpl->tpl_vars['service']->value['name'];?>
</span>
        </div>
        <?php } ?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("lets_talk.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>