<?php /* Smarty version Smarty 3.1.4, created on 2015-07-20 19:07:03
         compiled from "templates\services.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1350055acbf22899a04-74142388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b064c45176be2d7f2d98c4bf110b23d6fb579be5' => 
    array (
      0 => 'templates\\services.tpl',
      1 => 1437408421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1350055acbf22899a04-74142388',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55acbf22c77e8',
  'variables' => 
  array (
    'action' => 0,
    'page_name' => 0,
    'some' => 0,
    'page_addr' => 0,
    'id' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55acbf22c77e8')) {function content_55acbf22c77e8($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle($_smarty_tpl->tpl_vars['page_name']->value);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['some']->value)){?>
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Add service</a>
    <table class="datatable display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Name</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['some']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
				<td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Edit service">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Deleting of the service', 'Do you accept deleting this service?', '?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=del&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');">
            						<span class="icon_cont icon_cont_del" title="Delete service">
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
        <?php echo error('Services are empty');?>

        <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="button"><img src="img/icons/plus.png" alt=""/>Add service</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle('<a href="?page=services">Services</a> / Add service');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Enter service name" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Image:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Short text:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Enter short text"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Full text:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Enter full text"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter keywords"></textarea>
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
    <?php echo adminTitle('<a href="?page=services">Services</a> / Edit service');?>

    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=<?php echo $_smarty_tpl->tpl_vars['page_addr']->value;?>
&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Enter service name" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['some']->value['name']);?>
" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Image:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Short text:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Enter short text"><?php echo $_smarty_tpl->tpl_vars['some']->value['text_s'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Full text:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Enter full text"><?php echo $_smarty_tpl->tpl_vars['some']->value['text'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter title"><?php echo $_smarty_tpl->tpl_vars['some']->value['title'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter description"><?php echo $_smarty_tpl->tpl_vars['some']->value['description'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter keywords"><?php echo $_smarty_tpl->tpl_vars['some']->value['keywords'];?>
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