<?php /* Smarty version Smarty 3.1.4, created on 2016-07-13 14:16:43
         compiled from "templates\lets_talk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1594855b0a9ab72d2f0-67400418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f96462d04e675f0f05f94973144f6e07e26c742' => 
    array (
      0 => 'templates\\lets_talk.tpl',
      1 => 1468408584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1594855b0a9ab72d2f0-67400418',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55b0a9ab75348',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b0a9ab75348')) {function content_55b0a9ab75348($_smarty_tpl) {?><div id="main-form" class="container-fluid">
    <div class="container">
        <h3><span>Let's Talk</span></h3>
        <span class="form-text">Make a first step. Contact me, so I can start working on your project. Don't forget to leave your message.</span>
        <form action="" method="post">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <textarea id="message" name="message" placeholder="Insert message here"></textarea>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <input id="name" type="text" name="name" placeholder="Your Name" />
                <input id="email" type="text" name="email" placeholder="Your Email"/>
                <span id="main-form-send">Send Message</span>
            </div>
        </form>
        <div id="form_sent"></div>
    </div>
</div><?php }} ?>