<?php /* Smarty version Smarty 3.1.4, created on 2016-01-28 14:46:39
         compiled from "templates\canvas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:817756a9debc129b20-76156995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28c819609645ef67a152e23a7b61f41dd8d7ed38' => 
    array (
      0 => 'templates\\canvas.tpl',
      1 => 1453981597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '817756a9debc129b20-76156995',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_56a9debc49b4b',
  'variables' => 
  array (
    'action' => 0,
    'canvases' => 0,
    'canvas' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a9debc49b4b')) {function content_56a9debc49b4b($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='show'){?>
    <?php echo adminTitle('Canvas');?>

    <?php if (!empty($_smarty_tpl->tpl_vars['canvases']->value)){?>
        <a href="?page=canvas&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Add canvas</a>
        <table class="dt_canvas display">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars["canvas"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["canvas"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['canvases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["canvas"]->key => $_smarty_tpl->tpl_vars["canvas"]->value){
$_smarty_tpl->tpl_vars["canvas"]->_loop = true;
?>
                <tr class="odd gradeA">
                    <td style="width: 40px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['canvas']->value['id'];?>
</td>
                    <td style="width: 110px; text-align: center;">
                        <?php if (strlen($_smarty_tpl->tpl_vars['canvas']->value['img'])>2){?>
                        <a class="fancybox" rel="Canvas" href="img/canvas/<?php echo $_smarty_tpl->tpl_vars['canvas']->value['img'];?>
"><img src="img/canvas/<?php echo $_smarty_tpl->tpl_vars['canvas']->value['img'];?>
" class="img" alt=""></a>
                        <?php }else{ ?>
                        <img src="img/design/noimg.jpg" class="img" alt="">
                        <?php }?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['canvas']->value['name'];?>
</td>
                    <td style="width: 120px; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['canvas']->value['price'];?>
</td>
                    <td style="width: 80px; text-align: center;">
                        <table class="events">
                            <tr>
                                <td>
                                    <a href="?page=canvas&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['canvas']->value['id'];?>
">
                                	<span class="icon_cont icon_cont_edit" title="Edit">
                                	</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="confirmDelete('Delete canvas', 'Do you accept deleting this canvas?', '?page=canvas&action=del&id=<?php echo $_smarty_tpl->tpl_vars['canvas']->value['id'];?>
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
        <?php echo error('Canvases are empty');?>

        <a href="?page=canvas&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Add canvas</a>
    <?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='add'){?>
    <?php echo adminTitle('<a href="?page=canvas">Canvas</a> / Add canvas');?>

    <a href="?page=canvas" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=canvas&action=add" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Enter name" maxlength="128" size="32" require="true" label="name" />
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
                    Price:
                </td>
                <td>
                    <input type="text" name="price" placeholder="Enter price" maxlength="128" size="32" require="true" label="price" />
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
    <?php echo adminTitle('<a href="?page=canvas">Canvas</a> / Edit canvas');?>

    <a href="?page=canvas" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=canvas&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Enter name" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['canvas']->value['name']);?>
" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Cover:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                    <?php if (strlen($_smarty_tpl->tpl_vars['canvas']->value['img'])>2){?>
                        <div class="cat_del_img">
                            <a class="fancybox help" rel="group" href="img/canvas/<?php echo $_smarty_tpl->tpl_vars['canvas']->value['img'];?>
">View picture</a>
                        </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    Price:
                </td>
                <td>
                    <input type="text" name="price" placeholder="Enter price" maxlength="128" size="32" require="true" label="price" value="<?php echo $_smarty_tpl->tpl_vars['canvas']->value['price'];?>
" />
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