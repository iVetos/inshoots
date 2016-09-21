<?php /* Smarty version Smarty 3.1.4, created on 2015-03-06 23:11:43
         compiled from "templates\profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27146523863a87c4758-30057275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27c7dcc3e823e200143f60b811f55e353289f584' => 
    array (
      0 => 'templates\\profile.tpl',
      1 => 1425676300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27146523863a87c4758-30057275',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_523863a890db0',
  'variables' => 
  array (
    'error' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523863a890db0')) {function content_523863a890db0($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'libs/plugins\modifier.date_format.php';
?><?php echo adminTitle('My profile');?>

<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)){?>
<?php echo error($_smarty_tpl->tpl_vars['error']->value['pass']);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['user']->value)){?>
<form action="?page=profile" method="post" class="formly">
<table>
    <tr>
        <td class="padding10">
            Login:
        </td>
        <td class="padding10">
            <?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>

        </td>
    </tr>
    <tr>
        <td class="padding10">
            Level:
        </td>
        <td class="padding10">
            <?php echo $_smarty_tpl->tpl_vars['user']->value['level'];?>

        </td>
    </tr>
    <tr>
        <td class="padding10">
            Last enter:
        </td>
        <td class="padding10">
            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['last_date'],'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M');?>

        </td>
    </tr>
    <tr>
        <td class="padding10">
            Current pass:
        </td>
        <td>
            <input type="password" name="old_pass" require="require" label="current pass" size="32" maxlength="64" />
        </td>
    </tr>
    <tr>
        <td class="padding10">
            New pass:
        </td>
        <td>
            <input type="password" name="pass" require="require" label="new pass" size="32" maxlength="64" />
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Confim new pass:
        </td>
        <td>
            <input type="password" name="pass2" match="pass" label="Confim new pass" size="32" maxlength="64" />
        </td>
    </tr>
    <tr>
        <td>
            
        </td>
        <td>
            <input type="submit" value="Save" />
        </td>
    </tr>
</table>
</form>
<?php }else{ ?>
<?php echo error('An error has occurred. Contact to developers at cms@up-studio.net');?>

<?php }?><?php }} ?>