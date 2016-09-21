<?php /* Smarty version Smarty 3.1.4, created on 2016-08-10 13:47:56
         compiled from "templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21668534d102f3604e5-23071003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aae8c641d21506c83b2eef3095b796e7ec90482' => 
    array (
      0 => 'templates\\main.tpl',
      1 => 1470826073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21668534d102f3604e5-23071003',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_534d102f36250',
  'variables' => 
  array (
    'menu_cats' => 0,
    'cat' => 0,
    'services' => 0,
    'service' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534d102f36250')) {function content_534d102f36250($_smarty_tpl) {?><div class="ms-fullscreen-template" id="slider1-wrapper">
    <div id="slider-text">
        <div>
            Alex V. photography
        </div>
    </div>
    <!-- masterslider -->
    <div class="master-slider ms-skin-black-1" id="masterslider">
        <div class="ms-slide slide-2">
            <div class="slide-pattern"></div>
            <img src="/js/masterslider/style/blank.gif" data-src="/img/slides/2.jpg" alt="lorem ipsum dolor sit">
        </div>
        <div class="ms-slide slide-2">
            <div class="slide-pattern"></div>
            <img src="/js/masterslider/style/blank.gif" data-src="/img/slides/1.jpg" alt="lorem ipsum dolor sit">
        </div>
        <div class="ms-slide slide-3">
            <div class="slide-pattern"></div>
            <img src="/js/masterslider/style/blank.gif" data-src="/img/slides/3.jpg" alt="lorem ipsum dolor sit">
        </div>
        <div class="ms-slide slide-4">
            <div class="slide-pattern"></div>
            <img src="/js/masterslider/style/blank.gif" data-src="/img/slides//4.jpg" alt="lorem ipsum dolor sit">
        </div>
    </div>
    <!-- end of masterslider -->
</div>

<div id="main-portfolio" class="container-fluid">
    <div class="row">
        <h1><span>Portfolio Collections</span></h1>
        <?php  $_smarty_tpl->tpl_vars["cat"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cat"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["cat"]->key => $_smarty_tpl->tpl_vars["cat"]->value){
$_smarty_tpl->tpl_vars["cat"]->_loop = true;
?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <a href="/gallery/<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" class="main-portfolio-link2">
                <img src="/admin/img/categories/<?php echo $_smarty_tpl->tpl_vars['cat']->value['img'];?>
" class="img-responsive" alt="">
                <span class="main-portfolio-name animated fadeIn">
                    <span>
                        <img src="/img/collection-more.png" alt=""><br><br>
                        <?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>

                    </span>
                </span>
            </a>
        </div>
        <?php } ?>
    </div>
</div>

<div id="main-services" class="container-fluid hidden-xs">
    <div class="container">
        <div class="row">
            <h2><span>My Services</span></h2>
            <?php  $_smarty_tpl->tpl_vars["service"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["service"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["service"]->key => $_smarty_tpl->tpl_vars["service"]->value){
$_smarty_tpl->tpl_vars["service"]->_loop = true;
?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="/services/<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
">
                        <img src="/admin/img/services/<?php echo $_smarty_tpl->tpl_vars['service']->value['img'];?>
" alt="">
                        <span class="service-name"><?php echo $_smarty_tpl->tpl_vars['service']->value['name'];?>
</span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("lets_talk.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>