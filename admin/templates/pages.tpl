{* All pages *}
{if $action == 'show'}
    {'Page editor'|adminTitle}
    {if !empty($pages)}
    {if isset($id) && $id neq 0}
        <a href="?page=pages&id={$id_cat}" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    {/if}
    <a href="?page=pages&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Add page</a>
    <table class="dt_pages display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Name</b></th>
                <th><b>URL</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$pages item=page}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$page.id}</td>
				<td>{$page.name}</td>
                <td>
                {if strlen($page.addr) > 0}
                    ../{$page.addr}
                {else}
                    ../page/{$page.id}
                {/if}
                </td>
				<td style="width: 120px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=pages&action=show&id={$page.id}">
            						<span class="icon_cont icon_cont_more" title="Subpages">
            						</span>
            					</a>
                            </td>
                            <td>
                                <a href="?page=pages&action=edit&id={$page.id}">
                                	<span class="icon_cont icon_cont_edit" title="Edit">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Deleting page', 'Do you accept deleting this page?', '?page=pages&action=del&id={$page.id}');">
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
        {'Page editor is empty'|error}
        {if isset($id) && $id neq 0}
        <a href="?page=pages&id={$id_cat}" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
        {/if}
        <a href="?page=pages&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Add page</a>
    {/if}
{/if}

{* Adding page *}
{if $action == 'add'}
    {'<a href="?page=pages">Page editor</a> / Add page'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=pages&action=add&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Enter name" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    URL:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="" />
                    /<input id="addr" type="text" name="addr" placeholder="Enter URL" maxlength="128" size="31" />
                    <input id="addr_table" type="hidden" name="table" value="pages" />
                    <a href="javascript: void(0);" title="For exapmple, http://up-studio.net/your _url." class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <tr>
                <td>
                    Text:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Enter text"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the keywords"></textarea>
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

{* Editing page *}
{if $action == 'edit'}
    {'<a href="?page=pages">Page editor</a> / Edit page'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=pages&action=edit&id={$id}" method="post" class="formly">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Enter name" value="{$page.name|stripslashes}" maxlength="128" size="32" />
                </td>
            </tr>
            <tr>
                <td>
                    URL:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="{$page.addr}" />
                    /<input id="addr" type="text" name="addr" placeholder="Enter URL" maxlength="128" size="31" value="{$page.addr}" />
                    <input id="addr_table" type="hidden" name="table" value="pages" />
                    <a href="javascript: void(0);" title="For example, http://up-studio.net/ваше_название." class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            <tr>
                <td>
                    Text:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60">{$page.text|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the title">{$page.title|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the description">{$page.description|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the keywords">{$page.keywords|stripslashes}</textarea>
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