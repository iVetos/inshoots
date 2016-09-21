{* All categories *}
{if $action == 'show'}
    {'Products'|adminTitle}
    {if !empty($categories)}
    <a href="?page=catalog&action=addCat&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/> Add category</a>
    <a href="?page=catalog&action=sort&id={$id}" class="button"><img src="img/icons/sort.png" alt=""/>Sort order</a>
    <table class="datatable display">
		<thead>
			<tr>
				<th>#</th>
				<th><b>Name</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$categories item=category}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$category.sort}</td>
				<td>{$category.name}</td>
				<td style="width: 160px;">
                    <table class="events">
                        <tr>
                            <td class="visible">
                                {if $category.actual eq 1}
                                <span class="none vid">{$category.id}</span><span class="none vvalue">0</span><span class="none vtable">categories</span>
                                <a href="javascript:void(0);">
            						<span class="icon_cont icon_cont_visible" title="Hide"></span>
            					</a>
                                {else}
                                <span class="none vid">{$category.id}</span><span class="none vvalue">1</span><span class="none vtable">categories</span>
                                <a href="javascript:void(0);">
            						<span class="icon_cont icon_cont_invisible" title="Show"></span>
            					</a>
                                {/if}
                            </td>
                            <td>
                                <a href="?page=catalog&action=show&id={$category.id}">
            						<span class="icon_cont icon_cont_more" title="More"></span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=catalog&action=editCat&id={$category.id}">
                                	<span class="icon_cont icon_cont_edit" title="Edit"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Deleting of the category', 'If you will delete the category, then it will delete items in this<br/> category. This action cannot be undone. <br/><br/> Do you accept deleting of the category?', '?page=catalog&action=delCat&id={$category.id}');">
            						<span class="icon_cont icon_cont_del" title="Delete"></span>
            					</a>
                            </td>
                        </tr>
                    </table>
				</td>
			</tr>
            {/foreach}
		</tbody>
	</table>
    {elseif !empty($products)}
        <a href="?page=catalog" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
        <a href="?page=catalog&action=addProduct&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Add product</a>
        <table class="dt_products display">
		<thead>
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Name</th>
                <th><b>Price</b></th>
                <th><b>Not for trade</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$products item=product}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$product.id}</td>
                <td style="width: 110px; text-align: center;">
                    {if strlen($product.img_2) > 2}
                        <a class="fancybox" rel="Canvas" href="img/products/med_{$product.img_2}"><img src="img/products/small_{$product.img_2}" class="img" alt=""></a>
                    {else}
                        <img src="img/design/noimg.jpg" class="img" alt="">
                    {/if}
                </td>
                <td>{$product.name}</td>
                <td style="width: 100px; text-align: center;">{$product.price}</td>
                <td style="width: 100px; text-align: center;">{if $product.nft eq 1}yes{else}no{/if}</td>
				<td style="width: 80px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=catalog&action=editProduct&id={$product.id}">
                                	<span class="icon_cont icon_cont_edit" title="Edit"></span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Delete product', 'Do you accept deleting of the product?', '?page=catalog&action=delProduct&id={$product.id}');">
            						<span class="icon_cont icon_cont_del" title="Delete"></span>
            					</a>
                            </td>
                        </tr>
                    </table>
				</td>
			</tr>
            {/foreach}
		</tbody>
	</table>
    {else}
        {'Catlog is empty'|error}
        <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
        <a href="?page=catalog&action=addCat&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Add category</a>
        <a href="?page=catalog&action=addProduct&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Add product</a>
    {/if}
{/if}

{* Adding category *}
{if $action == 'addCat'}
    {'<a href="?page=catalog">Products</a> / Add category'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=catalog&action=addCat&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter category name" maxlength="128" size="32" require="true" label="category name" />
                </td>
            </tr>
            <tr>
                <td>
                    Cover:
                </td>
                <td>
                    <input type="file" name="img"/>&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    About:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
                </td>
            </tr>
            {if $smarty.const.__CONST_SHOP_PARAMS}
            <tr>
                <td>
                    Param 1:
                </td>
                <td>
                    <input type="text" name="param1" size="24" placeholder="Param name 1" {if !isset($mainCat)}value="{if !empty($params.param1_name)}{$params.param1_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param1_type_1" name="param1_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param1_type eq 1}checked="checked"{/if}{/if}/><label for="param1_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param1_type_2" name="param1_type" value="2" {if !isset($mainCat)}{if $params.param1_type eq 2}checked="checked"{/if}{/if}/><label for="param1_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param1_type_3" name="param1_type" value="3" {if !isset($mainCat)}{if $params.param1_type eq 3}checked="checked"{/if}{/if}/><label for="param1_type_3"> Float</label>
                    </span>
                    <input type="text" name="param1_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param1_step)}{$params.param1_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 2:
                </td>
                <td>
                    <input type="text" name="param2" size="24" placeholder="Param name 2" {if !isset($mainCat)}value="{if !empty($params.param2_name)}{$params.param2_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param2_type_1" name="param2_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param2_type eq 1}checked="checked"{/if}{/if}/><label for="param2_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param2_type_2" name="param2_type" value="2" {if !isset($mainCat)}{if $params.param2_type eq 2}checked="checked"{/if}{/if}/><label for="param2_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param2_type_3" name="param2_type" value="3" {if !isset($mainCat)}{if $params.param2_type eq 3}checked="checked"{/if}{/if}/><label for="param2_type_3"> Float</label>
                    </span>
                    <input type="text" name="param2_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param2_step)}{$params.param2_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 3:
                </td>
                <td>
                    <input type="text" name="param3" size="24" placeholder="Param name 3" {if !isset($mainCat)}value="{if !empty($params.param3_name)}{$params.param3_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param3_type_1" name="param3_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param3_type eq 1}checked="checked"{/if}{/if}/><label for="param3_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param3_type_2" name="param3_type" value="2" {if !isset($mainCat)}{if $params.param3_type eq 2}checked="checked"{/if}{/if}/><label for="param3_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param3_type_3" name="param3_type" value="3" {if !isset($mainCat)}{if $params.param3_type eq 3}checked="checked"{/if}{/if}/><label for="param3_type_3"> Float</label>
                    </span>
                    <input type="text" name="param3_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param3_step)}{$params.param3_step}{/if}"{/if}/>
                </td>
            </tr>
            <tr>
                <td>
                    Param 4:
                </td>
                <td>
                    <input type="text" name="param4" size="24" placeholder="Param name 4" {if !isset($mainCat)}value="{if !empty($params.param4_name)}{$params.param4_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param4_type_1" name="param4_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param4_type eq 1}checked="checked"{/if}{/if}/><label for="param4_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param4_type_2" name="param4_type" value="2" {if !isset($mainCat)}{if $params.param4_type eq 2}checked="checked"{/if}{/if}/><label for="param4_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param4_type_3" name="param4_type" value="3" {if !isset($mainCat)}{if $params.param4_type eq 3}checked="checked"{/if}{/if}/><label for="param4_type_3"> Float</label>
                    </span>
                    <input type="text" name="param4_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param4_step)}{$params.param4_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 5:
                </td>
                <td>
                    <input type="text" name="param5" size="24" placeholder="Param name 5" {if !isset($mainCat)}value="{if !empty($params.param5_name)}{$params.param5_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param5_type_1" name="param5_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param5_type eq 1}checked="checked"{/if}{/if}/><label for="param5_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param5_type_2" name="param5_type" value="2" {if !isset($mainCat)}{if $params.param5_type eq 2}checked="checked"{/if}{/if}/><label for="param5_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param5_type_3" name="param5_type" value="3" {if !isset($mainCat)}{if $params.param5_type eq 3}checked="checked"{/if}{/if}/><label for="param5_type_3"> Float</label>
                    </span>
                    <input type="text" name="param5_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param5_step)}{$params.param5_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 6:
                </td>
                <td>
                    <input type="text" name="param6" size="24" placeholder="Param name 6" {if !isset($mainCat)}value="{if !empty($params.param6_name)}{$params.param6_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param6_type_1" name="param6_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param6_type eq 1}checked="checked"{/if}{/if}/><label for="param6_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param6_type_2" name="param6_type" value="2" {if !isset($mainCat)}{if $params.param6_type eq 2}checked="checked"{/if}{/if}/><label for="param6_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param6_type_3" name="param6_type" value="3" {if !isset($mainCat)}{if $params.param6_type eq 3}checked="checked"{/if}{/if}/><label for="param6_type_3"> Float</label>
                    </span>
                    <input type="text" name="param6_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param6_step)}{$params.param6_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 7:
                </td>
                <td>
                    <input type="text" name="param7" size="24" placeholder="Param name 7" {if !isset($mainCat)}value="{if !empty($params.param7_name)}{$params.param7_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param7_type_1" name="param7_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param7_type eq 1}checked="checked"{/if}{/if}/><label for="param7_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param7_type_2" name="param7_type" value="2" {if !isset($mainCat)}{if $params.param7_type eq 2}checked="checked"{/if}{/if}/><label for="param7_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param7_type_3" name="param7_type" value="3" {if !isset($mainCat)}{if $params.param7_type eq 3}checked="checked"{/if}{/if}/><label for="param7_type_3"> Float</label>
                    </span>
                    <input type="text" name="param7_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param7_step)}{$params.param7_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 8:
                </td>
                <td>
                    <input type="text" name="param8" size="24" placeholder="Param name 8" {if !isset($mainCat)}value="{if !empty($params.param8_name)}{$params.param8_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param8_type_1" name="param8_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param8_type eq 1}checked="checked"{/if}{/if}/><label for="param8_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param8_type_2" name="param8_type" value="2" {if !isset($mainCat)}{if $params.param8_type eq 2}checked="checked"{/if}{/if}/><label for="param8_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param8_type_3" name="param8_type" value="3" {if !isset($mainCat)}{if $params.param8_type eq 3}checked="checked"{/if}{/if}/><label for="param8_type_3"> Float</label>
                    </span>
                    <input type="text" name="param8_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param8_step)}{$params.param8_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 9:
                </td>
                <td>
                    <input type="text" name="param9" size="24" placeholder="Param name 9" {if !isset($mainCat)}value="{if !empty($params.param9_name)}{$params.param9_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param9_type_1" name="param9_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param9_type eq 1}checked="checked"{/if}{/if}/><label for="param9_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param9_type_2" name="param9_type" value="2" {if !isset($mainCat)}{if $params.param9_type eq 2}checked="checked"{/if}{/if}/><label for="param9_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param9_type_3" name="param9_type" value="3" {if !isset($mainCat)}{if $params.param9_type eq 3}checked="checked"{/if}{/if}/><label for="param9_type_3"> Float</label>
                    </span>
                    <input type="text" name="param9_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param9_step)}{$params.param9_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 10:
                </td>
                <td>
                    <input type="text" name="param10" size="24" placeholder="Param name 10" {if !isset($mainCat)}value="{if !empty($params.param10_name)}{$params.param10_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param10_type_1" name="param10_type" value="1" {if empty($params)}checked="checked"{/if}{if !isset($mainCat)}{if $params.param10_type eq 1}checked="checked"{/if}{/if}/><label for="param10_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param10_type_2" name="param10_type" value="2" {if !isset($mainCat)}{if $params.param10_type eq 2}checked="checked"{/if}{/if}/><label for="param10_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param10_type_3" name="param10_type" value="3" {if !isset($mainCat)}{if $params.param10_type eq 3}checked="checked"{/if}{/if}/><label for="param10_type_3"> Float</label>
                    </span>
                    <input type="text" name="param10_step" size="4" maxlength="10" placeholder="Step" {if !isset($mainCat)}value="{if !empty($params.param10_step)}{$params.param10_step}{/if}"{/if} />
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the Title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the Description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the Keywords"></textarea>
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
{/if}

{* Editing category *}
{if $action == 'editCat'}
    {'<a href="?page=catalog">Products</a> / Edit category'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=catalog&action=editCat&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Введите название раздела" value="{$category.name|stripslashes}" maxlength="128" size="32" require="true" label="category name" />
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
                    About:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60">{$category.text|stripslashes}</textarea>
                </td>
            </tr>
            {if $smarty.const.__CONST_SHOP_PARAMS}
            <tr>
                <td>
                    Param 1:
                </td>
                <td>
                    <input type="text" name="param1" size="24" placeholder="Param name 1" {if !empty($params)}value="{if !empty($params.param1_name)}{$params.param1_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param1_type_1" name="param1_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param1_type eq 1}checked="checked"{/if}{/if}/><label for="param1_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param1_type_2" name="param1_type" value="2" {if !empty($params)}{if $params.param1_type eq 2}checked="checked"{/if}{/if}/><label for="param1_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param1_type_3" name="param1_type" value="3" {if !empty($params)}{if $params.param1_type eq 3}checked="checked"{/if}{/if}/><label for="param1_type_3"> Float</label>
                    </span>
                    <input type="text" name="param1_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param1_step)}{$params.param1_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 2:
                </td>
                <td>
                    <input type="text" name="param2" size="24" placeholder="Param name 2" {if !empty($params)}value="{if !empty($params.param2_name)}{$params.param2_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param2_type_1" name="param2_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param2_type eq 1}checked="checked"{/if}{/if}/><label for="param2_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param2_type_2" name="param2_type" value="2" {if !empty($params)}{if $params.param2_type eq 2}checked="checked"{/if}{/if}/><label for="param2_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param2_type_3" name="param2_type" value="3" {if !empty($params)}{if $params.param2_type eq 3}checked="checked"{/if}{/if}/><label for="param2_type_3"> Float</label>
                    </span>
                    <input type="text" name="param2_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param2_step)}{$params.param2_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 3:
                </td>
                <td>
                    <input type="text" name="param3" size="24" placeholder="Param name 3" {if !empty($params)}value="{if !empty($params.param3_name)}{$params.param3_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param3_type_1" name="param3_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param3_type eq 1}checked="checked"{/if}{/if}/><label for="param3_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param3_type_2" name="param3_type" value="2" {if !empty($params)}{if $params.param3_type eq 2}checked="checked"{/if}{/if}/><label for="param3_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param3_type_3" name="param3_type" value="3" {if !empty($params)}{if $params.param3_type eq 3}checked="checked"{/if}{/if}/><label for="param3_type_3"> Float</label>
                    </span>
                    <input type="text" name="param3_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param3_step)}{$params.param3_step}{/if}"{/if}/>
                </td>
            </tr>
            <tr>
                <td>
                    Param 4:
                </td>
                <td>
                    <input type="text" name="param4" size="24" placeholder="Param name 4" {if !empty($params)}value="{if !empty($params.param4_name)}{$params.param4_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param4_type_1" name="param4_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param4_type eq 1}checked="checked"{/if}{/if}/><label for="param4_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param4_type_2" name="param4_type" value="2" {if !empty($params)}{if $params.param4_type eq 2}checked="checked"{/if}{/if}/><label for="param4_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param4_type_3" name="param4_type" value="3" {if !empty($params)}{if $params.param4_type eq 3}checked="checked"{/if}{/if}/><label for="param4_type_3"> Float</label>
                    </span>
                    <input type="text" name="param4_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param4_step)}{$params.param4_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 5:
                </td>
                <td>
                    <input type="text" name="param5" size="24" placeholder="Param name 5" {if !empty($params)}value="{if !empty($params.param5_name)}{$params.param5_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param5_type_1" name="param5_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param5_type eq 1}checked="checked"{/if}{/if}/><label for="param5_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param5_type_2" name="param5_type" value="2" {if !empty($params)}{if $params.param5_type eq 2}checked="checked"{/if}{/if}/><label for="param5_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param5_type_3" name="param5_type" value="3" {if !empty($params)}{if $params.param5_type eq 3}checked="checked"{/if}{/if}/><label for="param5_type_3"> Float</label>
                    </span>
                    <input type="text" name="param5_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param5_step)}{$params.param5_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 6:
                </td>
                <td>
                    <input type="text" name="param6" size="24" placeholder="Param name 6" {if !empty($params)}value="{if !empty($params.param6_name)}{$params.param6_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param6_type_1" name="param6_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param6_type eq 1}checked="checked"{/if}{/if}/><label for="param6_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param6_type_2" name="param6_type" value="2" {if !empty($params)}{if $params.param6_type eq 2}checked="checked"{/if}{/if}/><label for="param6_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param6_type_3" name="param6_type" value="3" {if !empty($params)}{if $params.param6_type eq 3}checked="checked"{/if}{/if}/><label for="param6_type_3"> Float</label>
                    </span>
                    <input type="text" name="param6_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param6_step)}{$params.param6_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 7:
                </td>
                <td>
                    <input type="text" name="param7" size="24" placeholder="Param name 7" {if !empty($params)}value="{if !empty($params.param7_name)}{$params.param7_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param7_type_1" name="param7_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param7_type eq 1}checked="checked"{/if}{/if}/><label for="param7_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param7_type_2" name="param7_type" value="2" {if !empty($params)}{if $params.param7_type eq 2}checked="checked"{/if}{/if}/><label for="param7_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param7_type_3" name="param7_type" value="3" {if !empty($params)}{if $params.param7_type eq 3}checked="checked"{/if}{/if}/><label for="param7_type_3"> Float</label>
                    </span>
                    <input type="text" name="param7_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param7_step)}{$params.param7_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 8:
                </td>
                <td>
                    <input type="text" name="param8" size="24" placeholder="Param name 8" {if !empty($params)}value="{if !empty($params.param8_name)}{$params.param8_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param8_type_1" name="param8_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param8_type eq 1}checked="checked"{/if}{/if}/><label for="param8_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param8_type_2" name="param8_type" value="2" {if !empty($params)}{if $params.param8_type eq 2}checked="checked"{/if}{/if}/><label for="param8_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param8_type_3" name="param8_type" value="3" {if !empty($params)}{if $params.param8_type eq 3}checked="checked"{/if}{/if}/><label for="param8_type_3"> Float</label>
                    </span>
                    <input type="text" name="param8_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param8_step)}{$params.param8_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 9:
                </td>
                <td>
                    <input type="text" name="param9" size="24" placeholder="Param name 9" {if !empty($params)}value="{if !empty($params.param9_name)}{$params.param9_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param9_type_1" name="param9_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param9_type eq 1}checked="checked"{/if}{/if}/><label for="param9_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param9_type_2" name="param9_type" value="2" {if !empty($params)}{if $params.param9_type eq 2}checked="checked"{/if}{/if}/><label for="param9_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param9_type_3" name="param9_type" value="3" {if !empty($params)}{if $params.param9_type eq 3}checked="checked"{/if}{/if}/><label for="param9_type_3"> Float</label>
                    </span>
                    <input type="text" name="param9_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param9_step)}{$params.param9_step}{/if}"{/if} />
                </td>
            </tr>
            <tr>
                <td>
                    Param 10:
                </td>
                <td>
                    <input type="text" name="param10" size="24" placeholder="Param name 10" {if !empty($params)}value="{if !empty($params.param10_name)}{$params.param10_name}{/if}"{/if}/>
                    <span class="radio">
                        <input type="radio" id="param10_type_1" name="param10_type" value="1" {if empty($params)}checked="checked"{/if}{if !empty($params)}{if $params.param10_type eq 1}checked="checked"{/if}{/if}/><label for="param10_type_1"> Text</label>&nbsp;
                        <input type="radio" id="param10_type_2" name="param10_type" value="2" {if !empty($params)}{if $params.param10_type eq 2}checked="checked"{/if}{/if}/><label for="param10_type_2"> Number</label>&nbsp;
                        <input type="radio" id="param10_type_3" name="param10_type" value="3" {if !empty($params)}{if $params.param10_type eq 3}checked="checked"{/if}{/if}/><label for="param10_type_3"> Float</label>
                    </span>
                    <input type="text" name="param10_step" size="5" maxlength="10" placeholder="Step" {if !empty($params)}value="{if !empty($params.param10_step)}{$params.param10_step}{/if}"{/if} />
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the Title">{$category.title|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the Description">{$category.description|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the Keywords">{$category.keywords|stripslashes}</textarea>
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
{/if}

{* Sort order *}
{if $action == 'sort'}
{'<a href="?page=catalog">Products</a> / Sort order'|adminTitle}
<span id="page_id" class="none">{$id}</span>
<a href="?page=catalog&id={$id}" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
<ul id="sortable_cat">
    {foreach from=$categories item="item" name="categories"}
    <li id="id-{$item.id}"><span>{$smarty.foreach.categories.iteration}</span> {$item.name}</li>
    {/foreach}
</ul>
{'Sort order is saved'|alert}
{/if}

{* --------------------------------------------------------- Products --------------------------------------------------------------------- *}

{* Add product *}
{if $action == 'addProduct'}
    {'<a href="?page=catalog">Products</a> / Add product'|adminTitle}
    <a href="?page=catalog&action=show&id={$id}" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=catalog&action=addProduct&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter name" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Image:
                </td>
                <td>
                    <input type="file" name="img_1" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    About:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Orient:
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="orient" value="1" id="rad_h" checked="checked" /> <label for="rad_h">Horizontal</label>&nbsp;
                        <input type="radio" name="orient" value="2" id="rad_v" /> <label for="rad_v">Vertical</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Price:
                </td>
                <td>
                    <input type="text" name="price" maxlength="15" size="6" />
                </td>
            </tr>
            <tr>
                <td>
                    More:&nbsp;
                </td>
                <td>
                    <div id="cb">
                        <input type="checkbox" name="nft" value="1" id="cb_new" /><label for="cb_new">Not for trade</label>{*}&nbsp;
                        <input type="checkbox" name="top" value="1" id="cb_top" {if $product.top eq 1}checked="checked"{/if}/><label for="cb_top">Топ продаж</label>&nbsp;
                        <input type="checkbox" name="none" value="1" id="cb_none" {if $product.none eq 1}checked="checked"{/if}/><label for="cb_none">Нет в наличии</label>{*}
                    </div>
                </td>
            </tr>
            {if $smarty.const.__CONST_SHOP_PARAMS}
        {for $foo=1 to 10}
            {assign var="param" value='param'|cat:$foo}
            {assign var="param_name" value='param'|cat:$foo|cat:'_name'}
            {assign var="param_type" value='param'|cat:$foo|cat:'_type'}
            {assign var="param_step" value='param'|cat:$foo|cat:'_step'}
            {if !empty($params.$param_name)}
            <tr>
                <td>
                    {$params.$param_name}:
                </td>
                <td>
                    <input type="text" name="{$param}" placeholder="Enter value" size="24"/>
                    {if $params.$param_type eq 1}Text{/if}
                    {if $params.$param_type eq 2}Number с шагом {if !empty($params.$param_step)}{$params.$param_step}{else}1{/if}{/if}
                    {if $params.$param_type eq 3}Float с шагом {if !empty($params.$param_step)}{$params.$param_step}{else}1{/if}{/if}
                </td>
            </tr>
            {/if}
        {/for}
            {/if}
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the Title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the Description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the Keywords"></textarea>
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
{/if}

{* Product edit *}
{if $action == 'editProduct'}
    {'<a href="?page=catalog">Products</a> / Product edit'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=catalog&action=editProduct&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="{$id}" id="product_id" />
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter name" value="{$product.name|stripslashes}" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Image:
                </td>
                <td>
                    <input type="file" name="img_1" />&nbsp;
                    {if strlen($product.img_1) > 2}
                    <div class="cat_del_img">
                        <span class="cat_del_img_name none">{$product.img_1}</span>
                        <span class="cat_del_img_num none">img_1</span>
                        <a class="fancybox help" rel="group" href="../admin/img/products/{$product.img_1}">See</a>
                        <span class="cat_del_img_but help">Delete</span>
                    </div>
                    {/if}
                </td>
            </tr>
            <tr>
                <td>
                    About:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60">{$product.text|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Orient:
                </td>
                <td>
                    <div class="radio">
                        <input type="radio" name="orient" value="1" id="rad_h" {if $product.orient eq 1}checked="checked"{/if} /> <label for="rad_h">Horizontal</label>&nbsp;
                        <input type="radio" name="orient" value="2" id="rad_v" {if $product.orient eq 2}checked="checked"{/if} /> <label for="rad_v">Vertical</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Price:
                </td>
                <td>
                    <input type="text" name="price" maxlength="15" size="6" require="true" label="цену товара" value="{$product.price}" />
                </td>
            </tr>
            <tr>
                <td>
                    More:&nbsp;
                </td>
                <td>
                    <div id="cb">
                        <input type="checkbox" name="nft" value="1" id="cb_new" {if $product.nft eq 1}checked="checked"{/if}/><label for="cb_new">Not for trade</label>{*}&nbsp;
                        <input type="checkbox" name="top" value="1" id="cb_top" {if $product.top eq 1}checked="checked"{/if}/><label for="cb_top">Топ продаж</label>&nbsp;
                        <input type="checkbox" name="none" value="1" id="cb_none" {if $product.none eq 1}checked="checked"{/if}/><label for="cb_none">Нет в наличии</label>{*}
                    </div>
                </td>
            </tr>
            {if $smarty.const.__CONST_SHOP_PARAMS}
        {for $foo=1 to 10}
            {assign var="param" value='param'|cat:$foo}
            {assign var="param_name" value='param'|cat:$foo|cat:'_name'}
            {assign var="param_type" value='param'|cat:$foo|cat:'_type'}
            {assign var="param_step" value='param'|cat:$foo|cat:'_step'}
            {if !empty($params.$param_name)}
            <tr>
                <td>
                    {$params.$param_name}:
                </td>
                <td>
                    <input type="text" name="{$param}" placeholder="Enter value" size="24" value="{$product.$param}"/>
                    {if $params.$param_type eq 1}Text{/if}
                    {if $params.$param_type eq 2}Number с шагом {if !empty($params.$param_step)}{$params.$param_step}{else}1{/if}{/if}
                    {if $params.$param_type eq 3}Float с шагом {if !empty($params.$param_step)}{$params.$param_step}{else}1{/if}{/if}
                </td>
            </tr>
            {/if}
        {/for}
            {/if}
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the Title">{$product.title}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the Description">{$product.description}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the Keywords">{$product.keywords}</textarea>
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
{/if}