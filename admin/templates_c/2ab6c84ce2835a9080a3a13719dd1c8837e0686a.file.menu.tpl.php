<?php /* Smarty version Smarty 3.1.4, created on 2015-03-06 22:33:38
         compiled from "templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22610523863dc93c9a1-26699055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ab6c84ce2835a9080a3a13719dd1c8837e0686a' => 
    array (
      0 => 'templates\\menu.tpl',
      1 => 1425674016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22610523863dc93c9a1-26699055',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_523863dca97d8',
  'variables' => 
  array (
    'action' => 0,
    'menu' => 0,
    'id' => 0,
    'id_cat' => 0,
    'page' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523863dca97d8')) {function content_523863dca97d8($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle('Menu editor');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['menu']->value)){?>
    <?php if (isset($_smarty_tpl->tpl_vars['id']->value)&&$_smarty_tpl->tpl_vars['id']->value!=0){?>
        <a href="?page=menu&id=<?php echo $_smarty_tpl->tpl_vars['id_cat']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <?php }?>
    <a href="?page=menu&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Add item</a>
    <a href="?page=menu&action=sort&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/sort.png" alt=""/>Sort order</a>
    <table class="dt_menu display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Name</b></th>
                <th><b>Link</b></th>
                <th><b>Order</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['page']->value['link'];?>
</td>
                <td style="width: 90px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['page']->value['sort'];?>
</td>
				<td style="width: 120px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=menu&action=show&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
">
            						<span class="icon_cont icon_cont_more" title="More">
            						</span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=menu&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Edit">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Delete item', 'Do you accept deleting this item?', '?page=menu&action=del&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="Delete">
            						</span>
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
        <?php echo error('Menu editor is empty');?>

        <?php if (isset($_smarty_tpl->tpl_vars['id']->value)&&$_smarty_tpl->tpl_vars['id']->value!=0){?>
        <a href="?page=menu&id=<?php echo $_smarty_tpl->tpl_vars['id_cat']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
        <?php }?>
        <a href="?page=menu&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Add item</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle('<a href="?page=menu">Menu editor</a> / Add item');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=menu&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly">
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
                    Link:
                </td>
                <td>
                    <input type="text" name="link" placeholder="Enter link" maxlength="256" size="32" require="true" label="link" />
                    <a href="javascript: void(0);" title="Full (http://up-studio.net/contacts/) or short (../contacts/) путь" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
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
<?php if ($_smarty_tpl->tpl_vars['action']->value=='edit'){?>
    <?php echo adminTitle('<a href="?page=menu">Menu editor</a> / Edit item');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=menu&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter name" maxlength="128" size="32" require="true" label="name" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value['name']);?>
" />
                </td>
            </tr>
            <tr>
                <td>
                    Link:
                </td>
                <td>
                    <input type="text" name="link" placeholder="Enter link" maxlength="256" size="32" require="true" label="link" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value['link']);?>
" />
                    <a href="javascript: void(0);" title="Full (http://up-studio.net/contacts/) or short (../contacts/) путь" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
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
<?php echo adminTitle('<a href="?page=menu">Menu editor</a> / Sort order');?>

<span id="page_id" class="none"><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</span>
<a href="?page=menu&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
<ul id="sortable">
    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["menu"]['iteration']++;
?>
    <li id="id-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><span><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['menu']['iteration'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</li>
    <?php } ?>
</ul>
<?php echo alert('Порядок сортировки сохранён');?>

<?php }?><?php }} ?>