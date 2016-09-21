<?php /* Smarty version Smarty 3.1.4, created on 2016-08-25 00:08:25
         compiled from "templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5943534d102e97b5d0-06718230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20a5b87bf1d249a8e4b5bdf6dc560aa9c65c681a' => 
    array (
      0 => 'templates\\header.tpl',
      1 => 1472072903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5943534d102e97b5d0-06718230',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_534d102f26ac3',
  'variables' => 
  array (
    'title' => 0,
    'description' => 0,
    'keywords' => 0,
    'menu' => 0,
    'item' => 0,
    'url' => 0,
    'menu_cats' => 0,
    'cat' => 0,
    'cart_count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534d102f26ac3')) {function content_534d102f26ac3($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['title']->value);?>
</title>
    <meta name="description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['description']->value);?>
"/>
    <?php if (strlen($_smarty_tpl->tpl_vars['keywords']->value)>0){?><meta name="keywords" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['keywords']->value);?>
"/><?php }?>
    <meta name="author" content="UP Studio"/>
    <link rel="icon" href="/img/favicon.png"/>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/component.css"/>
    <link rel="stylesheet" type="text/css" href="/css/animate.css"/>
    <link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox.css"/>


    <!-- MasterSlider -->
    <link rel="stylesheet" href="/js/masterslider/style/masterslider.css" />
    <link href="/js/masterslider/skins/default/style.css" rel='stylesheet' type='text/css'>
    <link href='/js/masterslider/style/ms-fullscreen.css' rel='stylesheet' type='text/css'>

    <!-- google font Lato
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    -->


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
</head>
<body>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=398657950337998";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<header id="sticky">
    <div class="container">
        <div id="logo" class="col-lg-3 col-md-2 col-sm-2 hidden-xs">
            <a href="/"><img src="/img/logo.png" class="img-responsive" alt=""></a>
        </div>
        <div class="col-lg-6 col-md-7 col-sm-7 col-xs-12">
            <div class="col-lg-12 navbar navbar-default" id="menu-div">
                <div class="navbar-header pointer" data-toggle="collapse" data-target="#menu">
                    <div class="hidden" id="xs-menu">Open menu</div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 visible-xs">
                        <a href="/"><img src="/img/logo.png" alt="" class="small-logo img-responsive"></a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 visible-xs">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                            <span class="sr-only">Open menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['sub_count']<1){?>
                                <?php if ($_smarty_tpl->tpl_vars['url']->value['page']==$_smarty_tpl->tpl_vars['item']->value['link']||($_smarty_tpl->tpl_vars['item']->value['link']=="../"&&$_smarty_tpl->tpl_vars['url']->value['pageAddress']==null)){?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['link']=='gallery'){?>
                        <li class="dropdown">
                            <a href="#" class="active dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php  $_smarty_tpl->tpl_vars["cat"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cat"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["cat"]->key => $_smarty_tpl->tpl_vars["cat"]->value){
$_smarty_tpl->tpl_vars["cat"]->_loop = true;
?>
                                    <li><a href="/gallery/<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                                    <?php }else{ ?>
                        <li><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" class="active"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                                    <?php }?>
                                <?php }elseif($_smarty_tpl->tpl_vars['item']->value['link']=='gallery'){?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php  $_smarty_tpl->tpl_vars["cat"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cat"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["cat"]->key => $_smarty_tpl->tpl_vars["cat"]->value){
$_smarty_tpl->tpl_vars["cat"]->_loop = true;
?>
                                    <li><a href="/gallery/<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                                <?php }else{ ?>
                        <li><a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                                <?php }?>
                            <?php }else{ ?>
                            <?php }?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="cart" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <ul>
                <li><a href="https://www.instagram.com/ichbinerster/" class="icon icon-inst" target="_blank"><span></span></a></li>
                <li><a href="https://www.facebook.com/allvasi" class="icon icon-fb" target="_blank"><span></span></a></li>
                <li><a href="#" class="icon icon-cart"><span></span><?php echo $_smarty_tpl->tpl_vars['cart_count']->value;?>
</a></li>
            </ul>
        </div>
    </div>
</header><?php }} ?>