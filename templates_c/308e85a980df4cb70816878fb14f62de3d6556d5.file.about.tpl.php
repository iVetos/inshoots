<?php /* Smarty version Smarty 3.1.4, created on 2016-07-21 13:15:37
         compiled from "templates\about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:326765555b7ffef2646-06091560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '308e85a980df4cb70816878fb14f62de3d6556d5' => 
    array (
      0 => 'templates\\about.tpl',
      1 => 1469096127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326765555b7ffef2646-06091560',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5555b8000dcd9',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5555b8000dcd9')) {function content_5555b8000dcd9($_smarty_tpl) {?><div id="about-me" class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="addr">
                <a href="/">Main</a> / About me
            </div>
            <h1><span>About me</span></h1>
            <?php echo $_smarty_tpl->tpl_vars['content']->value['text'];?>

        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("lets_talk.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>