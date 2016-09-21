<?php /* Smarty version Smarty 3.1.4, created on 2016-08-25 00:08:25
         compiled from "templates\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12813534d102f36b315-46477999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab7755c9dae14f847e3cac29631cc2ab39d09ffd' => 
    array (
      0 => 'templates\\footer.tpl',
      1 => 1472072878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12813534d102f36b315-46477999',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_534d102f370c3',
  'variables' => 
  array (
    'f_services' => 0,
    'fservice' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534d102f370c3')) {function content_534d102f370c3($_smarty_tpl) {?><div id="pre-footer" class="container-fluid hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-justify">
                <h4>About Me</h4>
                <p>My name is Alex and I live in Sydney, Australia.</p>

                <p>I am a lifestyle photographer who absolutely loves his job and everything comes with it. I completely appreciate the people I meet, the places I go, the hours I keep and the spontaneity in every shoot.</p>

                <p>I recognise the photography as the 'art of freezing a moment'. Photo card for me is just a moment in life, which has been captured and saved for years. I appreciate the raw...
                    <a href="">Read More</a></p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h4>My Services</h4>
                <ul>
                    <?php  $_smarty_tpl->tpl_vars["fservice"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["fservice"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['f_services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["fservice"]->key => $_smarty_tpl->tpl_vars["fservice"]->value){
$_smarty_tpl->tpl_vars["fservice"]->_loop = true;
?>
                    <li><a href="/services/<?php echo $_smarty_tpl->tpl_vars['fservice']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['fservice']->value['name'];?>
</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div  class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h4>Collections</h4>
                <ul>
                    <li><a href="/gallery/1"><img src="/img/folder.png" alt=""> City</a></li>
                    <li><a href="/gallery/1"><img src="/img/folder.png" alt=""> Australia</a></li>
                    <li><a href="/gallery/1"><img src="/img/folder.png" alt=""> Landscape</a></li>
                    <li><a href="/gallery/1"><img src="/img/folder.png" alt=""> Ocean</a></li>
                    <li><a href="/gallery/1"><img src="/img/folder.png" alt=""> Wedding</a></li>
                    <li><a href="/gallery/1"><img src="/img/folder.png" alt=""> Studio</a></li>
                    <li><a href="/gallery/1"><img src="/img/folder.png" alt=""> Kids</a></li>
                    <li><a href="/gallery/1"><img src="/img/folder.png" alt=""> Sunset</a></li>
                    <li><a href="/gallery/1"><img src="/img/folder.png" alt=""> Europe</a></li>
                </ul>
            </div>
            <div id="pre-footer-inst" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h4>My Instagram</h4>
                <p>ICHBINERSTER</p>
                <a href="https://instagram.com/ichbinerster" target="_blank"><img src="/img/inst.jpg" class="img-responsive" alt="" /></a>
                <h5>Let's be a Friends</h5>
            </div>
        </div>
    </div>
</div>
<footer>
    &copy; Inshoots 2015-<?php echo date('Y');?>
. Design and development <a href="http://up-studio.com.au" target="_blank">UP Studio</a>
</footer>

<script src="/js/jquery-1.9.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/masterslider/jquery.easing.min.js"></script>
<script src="/js/masterslider/masterslider.min.js"></script>

<?php if ($_smarty_tpl->tpl_vars['url']->value['page']=='contacts'){?><script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="/js/map.js"></script><?php }?>
<script src="//www.paypalobjects.com/api/checkout.js" async></script>
<script src="/js/smoothscroll.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/modernizr.custom.js"></script>
<script src="/js/fancybox/jquery.fancybox.pack.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="/js/scripts.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-15550973-53', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html><?php }} ?>