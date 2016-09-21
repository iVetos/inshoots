<?php /* Smarty version Smarty 3.1.4, created on 2016-08-25 01:01:27
         compiled from "templates\photo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25573551bb8d751f044-18103521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a5a42870f135b22d14e924110ac7c3b83cdd52e' => 
    array (
      0 => 'templates\\photo.tpl',
      1 => 1472076086,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25573551bb8d751f044-18103521',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_551bb8d755a4c',
  'variables' => 
  array (
    'product' => 0,
    'cat_name' => 0,
    'prev' => 0,
    'next' => 0,
    'canvases' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551bb8d755a4c')) {function content_551bb8d755a4c($_smarty_tpl) {?><div id="photo" class="container-fluid">
    <div class="container">
        <div id="addr">
            <a href="/">Main</a> / <a href="/gallery">Gallery</a> / <a href="/gallery/<?php echo $_smarty_tpl->tpl_vars['product']->value['id_cat'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat_name']->value;?>
</a> / <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>

        </div>
        <div class="row">
            <div id="photo-block" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div id="photo-img-block">
                    <img src="/admin/img/products/med_<?php echo $_smarty_tpl->tpl_vars['product']->value['img_2'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
" class="img-responsive">
                    <span class="photo-img-hover animated fadeIn">
                        <span>
                            <span id="photo-img-hover-left">
                                <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/photo/<?php echo $_smarty_tpl->tpl_vars['prev']->value;?>
"><img src="/img/photo-left.png" alt=""></a>
                            </span>
                            <span id="photo-img-hover-zoom">
                                <a id="photo-zoom" href="/admin/img/products/med_<?php echo $_smarty_tpl->tpl_vars['product']->value['img_2'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
                                    <img src="/img/photo-zoom.png" alt="">
                                </a>
                            </span>
                            <span id="photo-img-hover-right">
                                <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/photo/<?php echo $_smarty_tpl->tpl_vars['next']->value;?>
"><img src="/img/collection-more.png" alt=""></a>
                            </span>
                        </span>
                    </span>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="row product-info-back">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <a href="/gallery/<?php echo $_smarty_tpl->tpl_vars['product']->value['id_cat'];?>
">Back to gallery</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        FB share
                    </div>
                </div>
                <div class="row product-info-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        Information about this photo:
                    </div>
                </div>
                <div class="row product-info-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h2>
                        <span class="product-info-id">ID: <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</span>
                    </div>
                </div>
                <div class="row product-info-block2">
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['nft']==1){?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        Photo not for trade
                    </div>
                    <?php }else{ ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        $ <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        Size: <?php echo $_smarty_tpl->tpl_vars['product']->value['width'];?>
 x <?php echo $_smarty_tpl->tpl_vars['product']->value['height'];?>

                    </div>
                    <?php }?>
                </div><?php if ($_smarty_tpl->tpl_vars['product']->value['nft']!=1){?>
                <div class="row product-info-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span id="product-buy"><img src="/img/icon-cart.png" alt=""> Add to cart</span>
                    </div>
                </div><?php }?>
            </div>
        </div>
    </div>
</div>

<div id="canvas-block" class="container-fluid">
    <div class="container">
        <?php if ($_smarty_tpl->tpl_vars['product']->value['text']!=''){?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3>About this photo:</h3>
                    <?php echo $_smarty_tpl->tpl_vars['product']->value['text'];?>

                </div>
            </div>
        <?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['canvases']->value)){?>
            <div id="canvas" class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3><span>Canvas Prints</span></h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="canvas-col">
                        <h4><span>Square</span></h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <img src="/img/canvas1.png" alt="" class="center-block">
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="canvas-col">
                        <h4><span>Rectangle</span></h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <img src="/img/canvas2.png" alt="" class="center-block">
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="canvas-col">
                        <h4><span>Panoramic</span></h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <img src="/img/canvas3.png" alt="" class="center-block">
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("lets_talk.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>