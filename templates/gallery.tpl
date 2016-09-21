{if $action eq 'all'}
<div id="main-portfolio" class="container-fluid">
    <div class="row">
        <h1><span>Gallery</span></h1>
        {foreach from=$menu_cats item="cat" name="cats"}
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <a href="/gallery/{$cat.id}"><img src="/admin/img/categories/{$cat.img}" class="img-responsive" alt=""><span>{$cat.name}</span></a>
            </div>
        {/foreach}
    </div>
</div>{*}
<div id="categories" class="nomargin">
    <table>
        <tr>
            <td class="empty"></td><td class="empty"></td><td class="empty"></td><td class="empty"></td>
        </tr>
        <tr>
            {foreach from=$cats item="cat" name="cats"}
            {if $smarty.foreach.cats.iteration == 1 or ($smarty.foreach.cats.iteration - 1) % 3 == 0}
            <td class="td_cover" colspan="2">
                <a href="/gallery/{$cat.id}"><img src="/admin/img/categories/{$cat.img}" alt="" /></a>
            </td>
            <td>
                <a href="/"><img src="/admin/img/products/small_{$cat.products[0].img_1}" alt="" /></a>
            </td>
            <td>
                <a href="/"><img src="/admin/img/products/small_{$cat.products[1].img_1}" alt="" /></a>
            </td>
            {else if $smarty.foreach.cats.iteration == 2 or ($smarty.foreach.cats.iteration - 2) % 3 == 0}
            <td>
                <a href="/"><img src="/admin/img/products/small_{$cat.products[0].img_1}" alt="" /></a>
            </td>
            <td class="td_cover" colspan="2"> 
                <a href="/gallery/{$cat.id}"><img src="/admin/img/categories/{$cat.img}" alt="" /></a>
            </td>
            <td>
                <a href="/"><img src="/admin/img/products/small_{$cat.products[1].img_1}" alt="" /></a>
            </td>
            {else}
            <td>
                <a href="/"><img src="/admin/img/products/small_{$cat.products[0].img_1}" alt="" /></a>
            </td>
            <td>
                <a href="/"><img src="/admin/img/products/small_{$cat.products[1].img_1}" alt="" /></a>
            </td>
            <td class="td_cover" colspan="2">
                <a href="/gallery/{$cat.id}"><img src="/admin/img/categories/{$cat.img}" alt="" /></a>
            </td>
            {/if}
            {if !$smarty.foreach.cats.last}</tr><tr>{/if}
            {/foreach}
        </tr>
    </table>
</div>{*}
{/if}

{if $action eq 'one'}
<div id="gallery" class="container-fluid">
    <div class="products">
        <div id="addr">
            <a href="/">Main</a> / <a href="/gallery">Gallery</a> / {$catName}
        </div>
        {*}<h1><span>{$catName}</span></h1>{*}
        <div class="row gallery-horizontal">
            {foreach from=$h_products item="product"}
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                <a href="/photo/{$product.id}" class="products-link">
                    <img src="/admin/img/products/small_{$product.img_2}" class="img-responsive">
                    <span class="products-name animated fadeIn">
                    <span>
                        <img src="/img/collection-more.png" alt="">
                    </span>
                </span>
                </a>
            </div>
            {/foreach}
        </div>
        <div class="row gallery-vertical">
            {foreach from=$v_products item="product"}
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <a href="/photo/{$product.id}"><img src="/admin/img/products/small_{$product.img_2}" class="img-responsive center-block" /></a>
            </div>
            {/foreach}
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <h2 class="h2">Other galleries</h2>
        <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
        {foreach from=$cats item="cat" name="cats"}
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 other-gallery">
            <a href="/gallery/{$cat.id}">
                <img src="/admin/img/categories/{$cat.img}" class="img-responsive center-block" />
                <span class="gallery-name">{$cat.name}</span>
                <div class="gallery-text">{$cat.text}</div>
                <a href="/gallery/{$cat.id}" class="other-gallery-read-more">Read more</a>
            </a>
            {*}<div class="gallery-info center-block">
                <span class="gallery-name">{$cat.name}</span>
                <div class="gallery-text">{$cat.text}</div>
                <a href="/gallery/{$cat.id}">Read more</a>
            </div>{*}
        </div>
        {/foreach}
        <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
    </div>
</div>
{include file="lets_talk.tpl"}
{/if}