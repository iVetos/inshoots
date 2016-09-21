<div id="content">
    <div id="addr">
        <a href="/">Main</a> / Products
    </div>
    <h1>Products</h1>
    <table id="cart-table">
        <thead>
        <tr>
            <th></th>
            <th>Product</th>
            <th>Name</th>
            <th>Type</th>
            <th>Count</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {$i = 1}
        {foreach from=$products item="product"}
        <tr>
            <td>{$i}{$i = $i + 1}</td>
            <td>
                <a href="/admin/img/products/med_{$product.img}" class="fancybox" rel="cart" title="{$product.name}">
                    <img src="/admin/img/products/small_{$product.img}" class="cart-img" alt="{$product.name}" />
                </a>
            </td>
            <td>
                <a href="/photo/{if $product.type eq 1}{$product.id}{else}{$product.id}{/if}">{$product.name}</a>
                <div>$ {$product.price}</div>
            </td>
            <td>{$product.type_name}</td>
            <td>
                {if $product.type eq 1}
                    {$product.count}
                {else}
                    <input type="text" size="3" maxlength="3" value="{$product.count}" class="cart-product-count"/>
                    <a class="cart-product-count-update" rel="{$product.canvas_id}"><img src="/img/refresh.png" alt=""></a>
                    <div class="cart-product-count-update-saved">Saved</div>
                    <span class="cart-product-price none">{$product.price}</span>
                {/if}
            </td>
            <td class="cart-product-total">$ {$product.total}</td>
            <td class="cart-delete">
                X
                <span class="cart-product-id none">{$product.id}</span>
                <span class="cart-product-type none">{$product.type}</span>
            </td>
        </tr>
        {/foreach}
        </tbody>
    </table>
    <span id="cart-sum">Total: $ <span>{$cart_sum}</span></span>
    <div class="order-buttons">
        <input type="submit" class="order-send" value="Commit to buy">&nbsp;&nbsp;&nbsp;&nbsp;<a href="/" class="order-button">Return to main</a>
    </div>

</div>