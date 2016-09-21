<?php /* Smarty version Smarty 3.1.4, created on 2016-07-21 13:20:27
         compiled from "templates\contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19291555af90c8f1c00-02301971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2666b23d5b266fe4015805281843011df07bbb05' => 
    array (
      0 => 'templates\\contacts.tpl',
      1 => 1469096426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19291555af90c8f1c00-02301971',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_555af90cadd25',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555af90cadd25')) {function content_555af90cadd25($_smarty_tpl) {?><div id="about-me" class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="addr">
                <a href="/">Main</a> / Contact Me
            </div>
            <h1><span>Contact Me</span></h1>
            <?php echo $_smarty_tpl->tpl_vars['content']->value['text'];?>

        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("lets_talk.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>