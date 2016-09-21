<?php /* Smarty version Smarty 3.1.4, created on 2016-06-03 13:29:23
         compiled from "templates\catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:302915233985f413a12-49946209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2964be95a233d57da5022adee9d671ed4c7ac1c' => 
    array (
      0 => 'templates\\catalog.tpl',
      1 => 1464949760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '302915233985f413a12-49946209',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52339860d0e3c',
  'variables' => 
  array (
    'action' => 0,
    'categories' => 0,
    'id' => 0,
    'category' => 0,
    'products' => 0,
    'product' => 0,
    'mainCat' => 0,
    'params' => 0,
    'item' => 0,
    'foo' => 0,
    'param_name' => 0,
    'param' => 0,
    'param_type' => 0,
    'param_step' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52339860d0e3c')) {function content_52339860d0e3c($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle('Products');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['categories']->value)){?>
    <a href="?page=catalog&action=addCat&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/> Add category</a>
    <a href="?page=catalog&action=sort&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/sort.png" alt=""/>Sort order</a>
    <table class="datatable display">
		<thead>
			<tr>
				<th>#</th>
				<th><b>Name</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['category']->value['sort'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</td>
				<td style="width: 160px;">
                    <table class="events">
                        <tr>
                            <td class="visible">
                                <?php if ($_smarty_tpl->tpl_vars['category']->value['actual']==1){?>
                                <span class="none vid"><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</span><span class="none vvalue">0</span><span class="none vtable">categories</span>
                                <a href="javascript:void(0);">
            						<span class="icon_cont icon_cont_visible" title="Hide"></span>
            					</a>
                                <?php }else{ ?>
                                <span class="none vid"><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</span><span class="none vvalue">1</span><span class="none vtable">categories</span>
                                <a href="javascript:void(0);">
            						<span class="icon_cont icon_cont_invisible" title="Show"></span>
            					</a>
                                <?php }?>
                            </td>
                            <td>
                                <a href="?page=catalog&action=show&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
            						<span class="icon_cont icon_cont_more" title="More"></span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=catalog&action=editCat&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Edit"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Deleting of the category', 'If you will delete the category, then it will delete items in this<br/> category. This action cannot be undone. <br/><br/> Do you accept deleting of the category?', '?page=catalog&action=delCat&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="Delete"></span>
            					</a>
                            </td>
                        </tr>
                    </table>
				</td>
			</tr>
            <?php } ?>
		</tbody>
	</table>
    <?php }elseif(!empty($_smarty_tpl->tpl_vars['products']->value)){?>
        <a href="?page=catalog" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
        <a href="?page=catalog&action=addProduct&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Add product</a>
        <table class="dt_products display">
		<thead>
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Name</th>
                <th><b>Price</b></th>
                <th><b>Not for trade</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
                <td style="width: 110px; text-align: center;">
                    <?php if (strlen($_smarty_tpl->tpl_vars['product']->value['img_2'])>2){?>
                        <a class="fancybox" rel="Canvas" href="img/products/med_<?php echo $_smarty_tpl->tpl_vars['product']->value['img_2'];?>
"><img src="img/products/small_<?php echo $_smarty_tpl->tpl_vars['product']->value['img_2'];?>
" class="img" alt=""></a>
                    <?php }else{ ?>
                        <img src="img/design/noimg.jpg" class="img" alt="">
                    <?php }?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</td>
                <td style="width: 100px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
                <td style="width: 100px; text-align: center;"><?php if ($_smarty_tpl->tpl_vars['product']->value['nft']==1){?>yes<?php }else{ ?>no<?php }?></td>
				<td style="width: 80px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=catalog&action=editProduct&id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Edit"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Delete product', 'Do you accept deleting of the product?', '?page=catalog&action=delProduct&id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="Delete"></span>
            					</a>
                            </td>
                        </tr>
                    </table>
				</td>
			</tr>
            <?php } ?>
		</tbody>
	</table>
    <?php }else{ ?>
        <?php echo error('Catlog is empty');?>

        <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
        <a href="?page=catalog&action=addCat&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Add category</a>
        <a href="?page=catalog&action=addProduct&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Add product</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='addCat'){?>
    <?php echo adminTitle('<a href="?page=catalog">Products</a> / Add category');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=catalog&action=addCat&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter category name" maxlength="128" size="32" require="true" label="category name" />
                </td>
            </tr>
            <tr>
                <td>
                    Cover:
                </td>
                <td>
                    <input type="file" name="img"/>&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    About:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
                </td>
            </tr>
            <?php if (@__CONST_SHOP_PARAMS){?>
            <tr>
                <td>
                    Param 1:
                </td>
                <td>
                    <input type="text" name="param1" size="24" placeholder="Param name 1" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param1_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param1_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param1_type_1" name="param1_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param1_type_2" name="param1_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param1_type_3" name="param1_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_3"> Float</label>
                    </span>
                    <input type="text" name="param1_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param1_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param1_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 2:
                </td>
                <td>
                    <input type="text" name="param2" size="24" placeholder="Param name 2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param2_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param2_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param2_type_1" name="param2_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param2_type_2" name="param2_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param2_type_3" name="param2_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_3"> Float</label>
                    </span>
                    <input type="text" name="param2_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param2_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param2_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 3:
                </td>
                <td>
                    <input type="text" name="param3" size="24" placeholder="Param name 3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param3_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param3_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param3_type_1" name="param3_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param3_type_2" name="param3_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param3_type_3" name="param3_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_3"> Float</label>
                    </span>
                    <input type="text" name="param3_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param3_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param3_step'];?>
<?php }?>"<?php }?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Param 4:
                </td>
                <td>
                    <input type="text" name="param4" size="24" placeholder="Param name 4" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param4_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param4_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param4_type_1" name="param4_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param4_type_2" name="param4_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param4_type_3" name="param4_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_3"> Float</label>
                    </span>
                    <input type="text" name="param4_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param4_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param4_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 5:
                </td>
                <td>
                    <input type="text" name="param5" size="24" placeholder="Param name 5" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param5_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param5_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param5_type_1" name="param5_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param5_type_2" name="param5_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param5_type_3" name="param5_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_3"> Float</label>
                    </span>
                    <input type="text" name="param5_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param5_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param5_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 6:
                </td>
                <td>
                    <input type="text" name="param6" size="24" placeholder="Param name 6" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param6_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param6_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param6_type_1" name="param6_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param6_type_2" name="param6_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param6_type_3" name="param6_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_3"> Float</label>
                    </span>
                    <input type="text" name="param6_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param6_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param6_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 7:
                </td>
                <td>
                    <input type="text" name="param7" size="24" placeholder="Param name 7" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param7_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param7_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param7_type_1" name="param7_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param7_type_2" name="param7_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param7_type_3" name="param7_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_3"> Float</label>
                    </span>
                    <input type="text" name="param7_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param7_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param7_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 8:
                </td>
                <td>
                    <input type="text" name="param8" size="24" placeholder="Param name 8" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param8_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param8_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param8_type_1" name="param8_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param8_type_2" name="param8_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param8_type_3" name="param8_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_3"> Float</label>
                    </span>
                    <input type="text" name="param8_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param8_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param8_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 9:
                </td>
                <td>
                    <input type="text" name="param9" size="24" placeholder="Param name 9" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param9_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param9_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param9_type_1" name="param9_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param9_type_2" name="param9_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param9_type_3" name="param9_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_3"> Float</label>
                    </span>
                    <input type="text" name="param9_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param9_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param9_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 10:
                </td>
                <td>
                    <input type="text" name="param10" size="24" placeholder="Param name 10" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param10_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param10_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param10_type_1" name="param10_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param10_type_2" name="param10_type" value="2" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param10_type_3" name="param10_type" value="3" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_3"> Float</label>
                    </span>
                    <input type="text" name="param10_step" size="4" maxlength="10" placeholder="Step" <?php if (!isset($_smarty_tpl->tpl_vars['mainCat']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param10_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param10_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the Title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the Description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the Keywords"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Add" class="button" />
                </td>
            </tr>
        </table>	
	</form>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='editCat'){?>
    <?php echo adminTitle('<a href="?page=catalog">Products</a> / Edit category');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=catalog&action=editCat&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название раздела" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['name']);?>
" maxlength="128" size="32" require="true" label="category name" />
                </td>
            </tr>
            <tr>
                <td>
                    Cover:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    About:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['text']);?>
</textarea>
                </td>
            </tr>
            <?php if (@__CONST_SHOP_PARAMS){?>
            <tr>
                <td>
                    Param 1:
                </td>
                <td>
                    <input type="text" name="param1" size="24" placeholder="Param name 1" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param1_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param1_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param1_type_1" name="param1_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param1_type_2" name="param1_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param1_type_3" name="param1_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param1_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param1_type_3"> Float</label>
                    </span>
                    <input type="text" name="param1_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param1_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param1_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 2:
                </td>
                <td>
                    <input type="text" name="param2" size="24" placeholder="Param name 2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param2_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param2_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param2_type_1" name="param2_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param2_type_2" name="param2_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param2_type_3" name="param2_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param2_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param2_type_3"> Float</label>
                    </span>
                    <input type="text" name="param2_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param2_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param2_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 3:
                </td>
                <td>
                    <input type="text" name="param3" size="24" placeholder="Param name 3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param3_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param3_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param3_type_1" name="param3_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param3_type_2" name="param3_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param3_type_3" name="param3_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param3_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param3_type_3"> Float</label>
                    </span>
                    <input type="text" name="param3_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param3_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param3_step'];?>
<?php }?>"<?php }?>/>
                </td>
            </tr>
            <tr>
                <td>
                    Param 4:
                </td>
                <td>
                    <input type="text" name="param4" size="24" placeholder="Param name 4" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param4_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param4_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param4_type_1" name="param4_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param4_type_2" name="param4_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param4_type_3" name="param4_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param4_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param4_type_3"> Float</label>
                    </span>
                    <input type="text" name="param4_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param4_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param4_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 5:
                </td>
                <td>
                    <input type="text" name="param5" size="24" placeholder="Param name 5" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param5_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param5_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param5_type_1" name="param5_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param5_type_2" name="param5_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param5_type_3" name="param5_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param5_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param5_type_3"> Float</label>
                    </span>
                    <input type="text" name="param5_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param5_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param5_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 6:
                </td>
                <td>
                    <input type="text" name="param6" size="24" placeholder="Param name 6" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param6_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param6_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param6_type_1" name="param6_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param6_type_2" name="param6_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param6_type_3" name="param6_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param6_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param6_type_3"> Float</label>
                    </span>
                    <input type="text" name="param6_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param6_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param6_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 7:
                </td>
                <td>
                    <input type="text" name="param7" size="24" placeholder="Param name 7" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param7_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param7_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param7_type_1" name="param7_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param7_type_2" name="param7_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param7_type_3" name="param7_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param7_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param7_type_3"> Float</label>
                    </span>
                    <input type="text" name="param7_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param7_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param7_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 8:
                </td>
                <td>
                    <input type="text" name="param8" size="24" placeholder="Param name 8" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param8_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param8_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param8_type_1" name="param8_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param8_type_2" name="param8_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param8_type_3" name="param8_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param8_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param8_type_3"> Float</label>
                    </span>
                    <input type="text" name="param8_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param8_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param8_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 9:
                </td>
                <td>
                    <input type="text" name="param9" size="24" placeholder="Param name 9" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param9_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param9_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param9_type_1" name="param9_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param9_type_2" name="param9_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param9_type_3" name="param9_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param9_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param9_type_3"> Float</label>
                    </span>
                    <input type="text" name="param9_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param9_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param9_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <tr>
                <td>
                    Param 10:
                </td>
                <td>
                    <input type="text" name="param10" size="24" placeholder="Param name 10" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param10_name'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param10_name'];?>
<?php }?>"<?php }?>/>
                    <span class="radio">
                        <input type="radio" id="param10_type_1" name="param10_type" value="1" <?php if (empty($_smarty_tpl->tpl_vars['params']->value)){?>checked="checked"<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==1){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param10_type_2" name="param10_type" value="2" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==2){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param10_type_3" name="param10_type" value="3" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?><?php if ($_smarty_tpl->tpl_vars['params']->value['param10_type']==3){?>checked="checked"<?php }?><?php }?>/><label for="param10_type_3"> Float</label>
                    </span>
                    <input type="text" name="param10_step" size="5" maxlength="10" placeholder="Step" <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>value="<?php if (!empty($_smarty_tpl->tpl_vars['params']->value['param10_step'])){?><?php echo $_smarty_tpl->tpl_vars['params']->value['param10_step'];?>
<?php }?>"<?php }?> />
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the Title"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['title']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the Description"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['description']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the Keywords"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value['keywords']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Edit" class="button" />
                </td>
            </tr>
        </table>	
	</form>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='sort'){?>
<?php echo adminTitle('<a href="?page=catalog">Products</a> / Sort order');?>

<span id="page_id" class="none"><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</span>
<a href="?page=catalog&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
<ul id="sortable_cat">
    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["categories"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["categories"]['iteration']++;
?>
    <li id="id-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><span><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['iteration'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</li>
    <?php } ?>
</ul>
<?php echo alert('Sort order is saved');?>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='addProduct'){?>
    <?php echo adminTitle('<a href="?page=catalog">Products</a> / Add product');?>

    <a href="?page=catalog&action=show&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=catalog&action=addProduct&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter name" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Image:
                </td>
                <td>
                    <input type="file" name="img_1" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    About:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Orient:
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="orient" value="1" id="rad_h" checked="checked" /> <label for="rad_h">Horizontal</label>&nbsp;
                        <input type="radio" name="orient" value="2" id="rad_v" /> <label for="rad_v">Vertical</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Price:
                </td>
                <td>
                    <input type="text" name="price" maxlength="15" size="6" />
                </td>
            </tr>
            <tr>
                <td>
                    More:&nbsp;
                </td>
                <td>
                    <div id="cb">
                        <input type="checkbox" name="nft" value="1" id="cb_new" /><label for="cb_new">Not for trade</label>
                    </div>
                </td>
            </tr>
            <?php if (@__CONST_SHOP_PARAMS){?>
        <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
            <?php $_smarty_tpl->tpl_vars["param"] = new Smarty_variable(('param').($_smarty_tpl->tpl_vars['foo']->value), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["param_name"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_name'), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["param_type"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_type'), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["param_step"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_step'), null, 0);?>
            <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_name']->value])){?>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_name']->value];?>
:
                </td>
                <td>
                    <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" placeholder="Enter value" size="24"/>
                    <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==1){?>Text<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==2){?>Number с шагом <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value])){?><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value];?>
<?php }else{ ?>1<?php }?><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==3){?>Float с шагом <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value])){?><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value];?>
<?php }else{ ?>1<?php }?><?php }?>
                </td>
            </tr>
            <?php }?>
        <?php }} ?>
            <?php }?>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the Title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the Description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the Keywords"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Add" class="button" />
                </td>
            </tr>
        </table>	
	</form>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='editProduct'){?>
    <?php echo adminTitle('<a href="?page=catalog">Products</a> / Product edit');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=catalog&action=editProduct&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" id="product_id" />
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter name" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value['name']);?>
" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Image:
                </td>
                <td>
                    <input type="file" name="img_1" />&nbsp;
                    <?php if (strlen($_smarty_tpl->tpl_vars['product']->value['img_1'])>2){?>
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none"><?php echo $_smarty_tpl->tpl_vars['product']->value['img_1'];?>
</span>
                        <span class="cat_del_img_num none">img_1</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['img_1'];?>
">See</a>
                        <span class="cat_del_img_but help">Delete</span>
                    </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    About:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value['text']);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Orient:
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="orient" value="1" id="rad_h" <?php if ($_smarty_tpl->tpl_vars['product']->value['orient']==1){?>checked="checked"<?php }?> /> <label for="rad_h">Horizontal</label>&nbsp;
                        <input type="radio" name="orient" value="2" id="rad_v" <?php if ($_smarty_tpl->tpl_vars['product']->value['orient']==2){?>checked="checked"<?php }?> /> <label for="rad_v">Vertical</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Price:
                </td>
                <td>
                    <input type="text" name="price" maxlength="15" size="6" require="true" label="цену товара" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    More:&nbsp;
                </td>
                <td>
                    <div id="cb">
                        <input type="checkbox" name="nft" value="1" id="cb_new" <?php if ($_smarty_tpl->tpl_vars['product']->value['nft']==1){?>checked="checked"<?php }?>/><label for="cb_new">Not for trade</label>
                    </div>
                </td>
            </tr>
            <?php if (@__CONST_SHOP_PARAMS){?>
        <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
            <?php $_smarty_tpl->tpl_vars["param"] = new Smarty_variable(('param').($_smarty_tpl->tpl_vars['foo']->value), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["param_name"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_name'), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["param_type"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_type'), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["param_step"] = new Smarty_variable((('param').($_smarty_tpl->tpl_vars['foo']->value)).('_step'), null, 0);?>
            <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_name']->value])){?>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_name']->value];?>
:
                </td>
                <td>
                    <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" placeholder="Enter value" size="24" value="<?php echo $_smarty_tpl->tpl_vars['product']->value[$_smarty_tpl->tpl_vars['param']->value];?>
"/>
                    <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==1){?>Text<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==2){?>Number с шагом <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value])){?><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value];?>
<?php }else{ ?>1<?php }?><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_type']->value]==3){?>Float с шагом <?php if (!empty($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value])){?><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['param_step']->value];?>
<?php }else{ ?>1<?php }?><?php }?>
                </td>
            </tr>
            <?php }?>
        <?php }} ?>
            <?php }?>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the Title"><?php echo $_smarty_tpl->tpl_vars['product']->value['title'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the Description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the Keywords"><?php echo $_smarty_tpl->tpl_vars['product']->value['keywords'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Edit" class="button" />
                </td>
            </tr>
        </table>	
	</form>
<?php }?><?php }} ?>