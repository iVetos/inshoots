<div id="photo" class="container-fluid">
    <div class="container">
        <div id="addr">
            <a href="/">Main</a> / <a href="/gallery">Gallery</a> / <a href="/gallery/{$product.id_cat}">{$cat_name}</a> / {$product.name}
        </div>
        {*}<h1>{$product.name}</h1>{*}
        <div class="row">
            <div id="photo-block" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                {*}<div id="product-arrow-left">
                    <a href="http://{$smarty.server.HTTP_HOST}/photo/{$prev}"><span class="glyphicon glyphicon-menu-left"></span></a>
                </div>
                <div id="product-arrow-right">
                    <a href="http://{$smarty.server.HTTP_HOST}/photo/{$next}"><span class="glyphicon glyphicon-menu-right"></span></a>
                </div>{*}
                {*}<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="/admin/img/products/med_{$product.img_2}" alt="{$product.name}" class="img-responsive">
                </div>{*}
                <div id="photo-img-block">
                    <img src="/admin/img/products/med_{$product.img_2}" alt="{$product.name}" class="img-responsive">
                    <span class="photo-img-hover animated fadeIn">
                        <span>
                            <span id="photo-img-hover-left">
                                <a href="http://{$smarty.server.HTTP_HOST}/photo/{$prev}"><img src="/img/photo-left.png" alt=""></a>
                            </span>
                            <span id="photo-img-hover-zoom">
                                <a id="photo-zoom" href="/admin/img/products/med_{$product.img_2}" title="{$product.name}">
                                    <img src="/img/photo-zoom.png" alt="">
                                </a>
                            </span>
                            <span id="photo-img-hover-right">
                                <a href="http://{$smarty.server.HTTP_HOST}/photo/{$next}"><img src="/img/collection-more.png" alt=""></a>
                            </span>
                        </span>
                    </span>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="row product-info-back">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <a href="/gallery/{$product.id_cat}">Back to gallery</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        FB share
                    </div>
                </div>
                <div class="row product-info-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        Information about this photo:
                    </div>
                </div>
                <div class="row product-info-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>{$product.name}</h2>
                        <span class="product-info-id">ID: {$product.id}</span>
                    </div>
                </div>
                <div class="row product-info-block2">
                    {if $product.nft eq 1}
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        Photo not for trade
                    </div>
                    {else}
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        $ {$product.price}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        Size: {$product.width} x {$product.height}
                    </div>
                    {/if}
                </div>{if $product.nft neq 1}
                <div class="row product-info-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span id="product-buy"><img src="/img/icon-cart.png" alt=""> Add to cart</span>
                    </div>
                </div>{/if}
            </div>
        </div>
    </div>
</div>

<div id="canvas-block" class="container-fluid">
    <div class="container">
        {if $product.text neq ''}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3>About this photo:</h3>
                    {$product.text}
                </div>
            </div>
        {/if}
        {if !empty($canvases)}
            <div id="canvas" class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3><span>Canvas Prints</span></h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="canvas-col">
                        <h4><span>Square</span></h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <img src="/img/canvas1.png" alt="" class="center-block">
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="canvas-col">
                        <h4><span>Rectangle</span></h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <img src="/img/canvas2.png" alt="" class="center-block">
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="canvas-col">
                        <h4><span>Panoramic</span></h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <img src="/img/canvas3.png" alt="" class="center-block">
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="canvas-col-block">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">20 * 20 cm</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">$ 17.00</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">+Add</div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
                {*}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3><span>Canvas Prints</span></h3>
                </div>
                {foreach from=$canvases item="canvas" name="canvas"}
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 product-buy-canvas">
                        <img src="/admin/img/canvas/{$canvas.img}" class="img-responsive" alt="" />
                        <span class="product_name">{$canvas.name}</span>
                        <span class="product_price">{$canvas.price}</span>
                        <span class="product_id none">{$canvas.id}</span>
                        <span class="parent_id none">{$product.id}</span>
                    </div>
                {/foreach}{*}
            </div>
        {/if}
    </div>
</div>
{*}
{if $product.text neq ''}
<div id="product_about">
    <h3>About this photo:</h3>
    {$product.text}
    {if !empty($canvases)}
    <table id="product_buy_as">
        <tr>
            {foreach from=$canvases item="canvas" name="canvas"}
            <td class="product_buy52">
                <img src="/admin/img/canvas/{$canvas.img}" alt="" />
                <span class="product_name">{$canvas.name}</span>
                <span class="product_price">{$canvas.price}</span>
                <span class="product_id none">{$canvas.id}</span>
                <span class="parent_id none">{$product.id}</span>
            </td>
            {if ($smarty.foreach.canvas.iteration % 3) == 0 and !$smarty.foreach.canvas.last}</tr><tr>{/if}
            {/foreach}
        </tr>
    </table>
    {/if}
</div>
{/if}{*}
{include file="lets_talk.tpl"}