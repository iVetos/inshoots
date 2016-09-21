<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$title|strip_tags}</title>
    <meta name="description" content="{$description|strip_tags}"/>
    {if strlen($keywords) > 0}<meta name="keywords" content="{$keywords|strip_tags}"/>{/if}
    <meta name="author" content="UP Studio"/>
    <link rel="icon" href="/img/favicon.png"/>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/component.css"/>
    <link rel="stylesheet" type="text/css" href="/css/animate.css"/>
    <link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox.css"/>


    <!-- MasterSlider -->
    <link rel="stylesheet" href="/js/masterslider/style/masterslider.css" />
    <link href="/js/masterslider/skins/default/style.css" rel='stylesheet' type='text/css'>
    <link href='/js/masterslider/style/ms-fullscreen.css' rel='stylesheet' type='text/css'>

    <!-- google font Lato
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    -->


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
</head>
<body>
<div id="fb-root"></div>{literal}
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=398657950337998";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>{/literal}
<header id="sticky">
    <div class="container">
        <div id="logo" class="col-lg-3 col-md-2 col-sm-2 hidden-xs">
            <a href="/"><img src="/img/logo.png" class="img-responsive" alt=""></a>
        </div>
        <div class="col-lg-6 col-md-7 col-sm-7 col-xs-12">
            <div class="col-lg-12 navbar navbar-default" id="menu-div">
                <div class="navbar-header pointer" data-toggle="collapse" data-target="#menu">
                    <div class="hidden" id="xs-menu">Open menu</div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 visible-xs">
                        <a href="/"><img src="/img/logo.png" alt="" class="small-logo img-responsive"></a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 visible-xs">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                            <span class="sr-only">Open menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav">
                        {foreach from=$menu item=item name="menu"}
                            {if $item.sub_count < 1}
                                {if $url.page == $item.link || ($item.link == "../" && $url.pageAddress == NULL)}
                                    {if $item.link == 'gallery'}
                        <li class="dropdown">
                            <a href="#" class="active dropdown-toggle" data-toggle="dropdown">{$item.name} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                {foreach from=$menu_cats item="cat"}
                                    <li><a href="/gallery/{$cat.id}">{$cat.name}</a></li>
                                {/foreach}
                            </ul>
                        </li>
                                    {else}
                        <li><a href="/{$item.link}" class="active">{$item.name}</a></li>
                                    {/if}
                                {elseif $item.link == 'gallery'}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$item.name} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                {foreach from=$menu_cats item="cat"}
                                    <li><a href="/gallery/{$cat.id}">{$cat.name}</a></li>
                                {/foreach}
                            </ul>
                        </li>
                                {else}
                        <li><a href="/{$item.link}">{$item.name}</a></li>
                                {/if}
                            {else}
                            {/if}
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
        <div id="cart" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <ul>
                <li><a href="https://www.instagram.com/ichbinerster/" class="icon icon-inst" target="_blank"><span></span></a></li>
                <li><a href="https://www.facebook.com/allvasi" class="icon icon-fb" target="_blank"><span></span></a></li>
                <li><a href="#" class="icon icon-cart"><span></span>{$cart_count}</a></li>
            </ul>
            {*}
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span id="top_cart_count">
                    {$cart_count|numEnd}
                </span>
                $
                <span id="top_cart_summ">
    				{$cart_sum}
    			</span>
            </a>
            <ul class="dropdown-menu">
                {if $cart_count > 0}
                {$i = 1}
                {foreach from=$cartProducts item="cartProduct"}
                    <li>
                        <img src="/admin/img/products/small_{$cartProduct.img}" alt="{$cartProduct.name}" />
                        {$cartProduct.count} X {$cartProduct.name}<br>
                        {$cartProduct.type_name}
                        <span class="cart-open-price">$ {$cartProduct.total}</span>
                    </li>
                {/foreach}
                {else}
                There is empty
                {/if}
            </ul>{*}
        </div>
    </div>
</header>