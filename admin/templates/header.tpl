<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{$title}</title>
	<meta name="description" content="{$description}" />
	<meta name="keywords" content="{$keywords}" />
	<meta name="Author" content="UP Studio" />
	<link rel="icon" href="img/design/favicon.png"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/style_ie.css" type="text/css" media="screen, projection" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="css/upcms.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	{* jQuery UI *}
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css"  />
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
    {* Formly *}
    <link rel="stylesheet" type="text/css" href="css/formly.css"  />
	<script type="text/javascript" src="js/formly.js"></script>
    {* Datatables *}
    <link rel="stylesheet" type="text/css" href="css/data_table.css" />
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dt.scripts.js"></script>
    {* CKEditor *}
    <script type="text/javascript" src="libs/ckeditor/ckeditor.js"></script>
    {* Uploadify *}
    <link rel="stylesheet" type="text/css" href="css/uploadify.css" />
    <script type="text/javascript" src="js/jquery.uploadify.js"></script>
    {* upInputFile *}
    <link rel="stylesheet" type="text/css" href="css/upInputFile.css" />
	<script type="text/javascript" src="js/upInputFile.js"></script>
    {* Fancybox *}
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    {* Scripts *}
    <script type="text/javascript" src="js/scripts.js"></script>
</head>
<body>
<div id="wrapper">
    {if isset($smarty.session.walert) and strlen($smarty.session.walert) > 0}<div id="walert" class="ns-show"><img src="img/icons/walert.png" alt="" />{$smarty.session.walert}</div>{/if}
    <div id="header">
        <div id="logo">
            <a href="/admin"><img src="img/design/upcms_logo_sm.png" alt="upcms logo" /></a>
        </div>
		<div id="user_block">
			<a href="?page=profile"><img src="img/icons/user.png" alt="" class="icon_sm" /> {$adm_user_name}</a>
			&nbsp;|&nbsp;
			<a href="?page=exit"><img src="img/icons/logout.png" alt="" class="icon_sm" /> Exit</a>
            <div class="btn_block">
                <a href="javascript:history.go(-1)" class="button left" title="Back"><img src="img/icons/back.png" alt="back" /> Back</a>
                <a href="../" class="button" title="На сайт"><img src="img/icons/home.png" alt="home" /> Go to site</a>
            </div>
		</div>
        <div class="clear"></div>
    </div>
    <div id="middle">
        <div id="container">
            <div id="content" class="lifted2">
            {*}<div id="tape2"></div>{*}