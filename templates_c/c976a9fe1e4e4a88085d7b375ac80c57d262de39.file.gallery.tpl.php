<?php /* Smarty version Smarty 3.1.4, created on 2016-07-13 21:12:10
         compiled from "templates\gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2216454fa0ab3c09777-00243705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c976a9fe1e4e4a88085d7b375ac80c57d262de39' => 
    array (
      0 => 'templates\\gallery.tpl',
      1 => 1468433529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2216454fa0ab3c09777-00243705',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_54fa0ab3d418f',
  'variables' => 
  array (
    'action' => 0,
    'menu_cats' => 0,
    'cat' => 0,
    'catName' => 0,
    'h_products' => 0,
    'product' => 0,
    'v_products' => 0,
    'cats' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fa0ab3d418f')) {function content_54fa0ab3d418f($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['action']->value=='all'){?>
<div id="main-portfolio" class="container-fluid">
    <div class="row">
        <h1><span>Gallery</span></h1>
        <?php  $_smarty_tpl->tpl_vars["cat"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cat"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["cat"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["cat"]->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cats"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["cat"]->key => $_smarty_tpl->tpl_vars["cat"]->value){
$_smarty_tpl->tpl_vars["cat"]->_loop = true;
 $_smarty_tpl->tpl_vars["cat"]->iteration++;
 $_smarty_tpl->tpl_vars["cat"]->last = $_smarty_tpl->tpl_vars["cat"]->iteration === $_smarty_tpl->tpl_vars["cat"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cats"]['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cats"]['last'] = $_smarty_tpl->tpl_vars["cat"]->last;
?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <a href="/gallery/<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"><img src="/admin/img/categories/<?php echo $_smarty_tpl->tpl_vars['cat']->value['img'];?>
" class="img-responsive" alt=""><span><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</span></a>
            </div>
        <?php } ?>
    </div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['action']->value=='one'){?>
<div id="gallery" class="container-fluid">
    <div class="products">
        <div id="addr">
            <a href="/">Main</a> / <a href="/gallery">Gallery</a> / <?php echo $_smarty_tpl->tpl_vars['catName']->value;?>

        </div>
        <div class="row gallery-horizontal">
            <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['h_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value){
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                <a href="/photo/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" class="products-link">
                    <img src="/admin/img/products/small_<?php echo $_smarty_tpl->tpl_vars['product']->value['img_2'];?>
" class="img-responsive">
                    <span class="products-name animated fadeIn">
                    <span>
                        <img src="/img/collection-more.png" alt="">
                    </span>
                </span>
                </a>
            </div>
            <?php } ?>
        </div>
        <div class="row gallery-vertical">
            <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value){
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <a href="/photo/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><img src="/admin/img/products/small_<?php echo $_smarty_tpl->tpl_vars['product']->value['img_2'];?>
" class="img-responsive center-block" /></a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <h2 class="h2">Other galleries</h2>
        <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
        <?php  $_smarty_tpl->tpl_vars["cat"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cat"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["cat"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["cat"]->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cats"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["cat"]->key => $_smarty_tpl->tpl_vars["cat"]->value){
$_smarty_tpl->tpl_vars["cat"]->_loop = true;
 $_smarty_tpl->tpl_vars["cat"]->iteration++;
 $_smarty_tpl->tpl_vars["cat"]->last = $_smarty_tpl->tpl_vars["cat"]->iteration === $_smarty_tpl->tpl_vars["cat"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cats"]['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cats"]['last'] = $_smarty_tpl->tpl_vars["cat"]->last;
?>
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 other-gallery">
            <a href="/gallery/<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">
                <img src="/admin/img/categories/<?php echo $_smarty_tpl->tpl_vars['cat']->value['img'];?>
" class="img-responsive center-block" />
                <span class="gallery-name"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</span>
                <div class="gallery-text"><?php echo $_smarty_tpl->tpl_vars['cat']->value['text'];?>
</div>
                <a href="/gallery/<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" class="other-gallery-read-more">Read more</a>
            </a>
        </div>
        <?php } ?>
        <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("lets_talk.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>