{* Show all *}
{if $action == 'show'}
    {$page_name|adminTitle}
    {if !empty($some)}
    <a href="?page={$page_addr}&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Add service</a>
    <table class="datatable display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Name</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$some item=item}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$item.id}</td>
				<td>{$item.name}</td>
				<td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page={$page_addr}&action=edit&id={$item.id}">
                                	<span class="icon_cont icon_cont_edit" title="Edit service">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Deleting of the service', 'Do you accept deleting this service?', '?page={$page_addr}&action=del&id={$item.id}');">
            						<span class="icon_cont icon_cont_del" title="Delete service">
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
        {'Services are empty'|error}
        <a href="?page={$page_addr}&action=add&id={$id}" class="button"><img src="img/icons/plus.png" alt=""/>Add service</a>
    {/if}
{/if}

{* Adding *}
{if $action == 'add'}
    {'<a href="?page=services">Services</a> / Add service'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page={$page_addr}&action=add&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Enter service name" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Image:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Short text:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Enter short text"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Full text:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Enter full text"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter title"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter description"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter keywords"></textarea>
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

{* Editing *}
{if $action == 'edit'}
    {'<a href="?page=services">Services</a> / Edit service'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page={$page_addr}&action=edit&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Enter service name" value="{$some.name|stripslashes}" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Image:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Short text:
                </td>
                <td>
                    <textarea name="text_s" rows="20" cols="60" class="ckeditor" placeholder="Enter short text">{$some.text_s}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Full text:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor" placeholder="Enter full text">{$some.text}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter title">{$some.title}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter description">{$some.description}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter keywords">{$some.keywords}</textarea>
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