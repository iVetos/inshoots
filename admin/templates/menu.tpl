{* Показать все разделы *}
{if $action == 'show'}
    {'Menu editor'|adminTitle}
    {if !empty($menu)}
    {if isset($id) && $id neq 0}
        <a href="?page=menu&id={$id_cat}" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    {/if}
    <a href="?page=menu&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Add item</a>
    <a href="?page=menu&action=sort&id={$id}" class="button"><img src="img/icons/sort.png" alt=""/>Sort order</a>
    <table class="dt_menu display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Name</b></th>
                <th><b>Link</b></th>
                <th><b>Order</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$menu item=page}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$page.id}</td>
				<td>{$page.name}</td>
                <td>{$page.link}</td>
                <td style="width: 90px; text-align: center;">{$page.sort}</td>
				<td style="width: 120px;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=menu&action=show&id={$page.id}">
            						<span class="icon_cont icon_cont_more" title="More">
            						</span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=menu&action=edit&id={$page.id}">
                                	<span class="icon_cont icon_cont_edit" title="Edit">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Delete item', 'Do you accept deleting this item?', '?page=menu&action=del&id={$page.id}');">
            						<span class="icon_cont icon_cont_del" title="Delete">
            						</span>
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
        {'Menu editor is empty'|error}
        {if isset($id) && $id neq 0}
        <a href="?page=menu&id={$id_cat}" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
        {/if}
        <a href="?page=menu&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Add item</a>
    {/if}
{/if}

{* Добавление разделы *}
{if $action == 'add'}
    {'<a href="?page=menu">Menu editor</a> / Add item'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=menu&action=add&id={$id}" method="post" class="formly">
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
                    Link:
                </td>
                <td>
                    <input type="text" name="link" placeholder="Enter link" maxlength="256" size="32" require="true" label="link" />
                    <a href="javascript: void(0);" title="Full (http://up-studio.net/contacts/) or short (../contacts/) путь" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
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

{* Редактирование разделы *}
{if $action == 'edit'}
    {'<a href="?page=menu">Menu editor</a> / Edit item'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=menu&action=edit&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter name" maxlength="128" size="32" require="true" label="name" value="{$menu.name|stripslashes}" />
                </td>
            </tr>
            <tr>
                <td>
                    Link:
                </td>
                <td>
                    <input type="text" name="link" placeholder="Enter link" maxlength="256" size="32" require="true" label="link" value="{$menu.link|stripslashes}" />
                    <a href="javascript: void(0);" title="Full (http://up-studio.net/contacts/) or short (../contacts/) путь" class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
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

{* Порядок сортировки *}
{if $action == 'sort'}
{'<a href="?page=menu">Menu editor</a> / Sort order'|adminTitle}
<span id="page_id" class="none">{$id}</span>
<a href="?page=menu&id={$id}" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
<ul id="sortable">
    {foreach from=$menu item="item" name="menu"}
    <li id="id-{$item.id}"><span>{$smarty.foreach.menu.iteration}</span> {$item.name}</li>
    {/foreach}
</ul>
{'Порядок сортировки сохранён'|alert}
{/if}