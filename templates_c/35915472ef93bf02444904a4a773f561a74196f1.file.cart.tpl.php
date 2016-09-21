<?php /* Smarty version Smarty 3.1.4, created on 2016-02-02 19:56:06
         compiled from "templates\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1326856ab6dc155ed11-95521546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35915472ef93bf02444904a4a773f561a74196f1' => 
    array (
      0 => 'templates\\cart.tpl',
      1 => 1454432165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1326856ab6dc155ed11-95521546',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_56ab6dc155f88',
  'variables' => 
  array (
    'products' => 0,
    'i' => 0,
    'product' => 0,
    'cart_sum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ab6dc155f88')) {function content_56ab6dc155f88($_smarty_tpl) {?><div id="content">
    <div id="addr">
        <a href="/">Main</a> / Products
    </div>
    <h1>Products</h1>
    <table id="cart-table">
        <thead>
        <tr>
            <th></th>
            <th>Product</th>
            <th>Name</th>
            <th>Type</th>
            <th>Count</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value){
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?></td>
            <td>
                <a href="/admin/img/products/med_<?php echo $_smarty_tpl->tpl_vars['product']->value['img'];?>
" class="fancybox" rel="cart" title="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
                    <img src="/admin/img/products/small_<?php echo $_smarty_tpl->tpl_vars['product']->value['img'];?>
" class="cart-img" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
" />
                </a>
            </td>
            <td>
                <a href="/photo/<?php if ($_smarty_tpl->tpl_vars['product']->value['type']==1){?><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a>
                <div>$ <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</div>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['product']->value['type_name'];?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['type']==1){?>
                    <?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>

                <?php }else{ ?>
                    <input type="text" size="3" maxlength="3" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
" class="cart-product-count"/>
                    <a class="cart-product-count-update" rel="<?php echo $_smarty_tpl->tpl_vars['product']->value['canvas_id'];?>
"><img src="/img/refresh.png" alt=""></a>
                    <div class="cart-product-count-update-saved">Saved</div>
                    <span class="cart-product-price none"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</span>
                <?php }?>
            </td>
            <td class="cart-product-total">$ <?php echo $_smarty_tpl->tpl_vars['product']->value['total'];?>
</td>
            <td class="cart-delete">
                X
                <span class="cart-product-id none"><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</span>
                <span class="cart-product-type none"><?php echo $_smarty_tpl->tpl_vars['product']->value['type'];?>
</span>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <span id="cart-sum">Total: $ <span><?php echo $_smarty_tpl->tpl_vars['cart_sum']->value;?>
</span></span>
    <div class="order-buttons">
        <input type="submit" class="order-send" value="Commit to buy">&nbsp;&nbsp;&nbsp;&nbsp;<a href="/" class="order-button">Return to main</a>
    </div>

</div><?php }} ?>