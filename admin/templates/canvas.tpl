{* Show all *}
{if $action == 'show'}
    {'Canvas'|adminTitle}
    {if !empty($canvases)}
        <a href="?page=canvas&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Add canvas</a>
        <table class="dt_canvas display">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$canvases item="canvas"}
                <tr class="odd gradeA">
                    <td style="width: 40px; text-align: center;">{$canvas.id}</td>
                    <td style="width: 110px; text-align: center;">
                        {if strlen($canvas.img) > 2}
                        <a class="fancybox" rel="Canvas" href="img/canvas/{$canvas.img}"><img src="img/canvas/{$canvas.img}" class="img" alt=""></a>
                        {else}
                        <img src="img/design/noimg.jpg" class="img" alt="">
                        {/if}
                    </td>
                    <td>{$canvas.name}</td>
                    <td style="width: 120px; text-align: center;">{$canvas.price}</td>
                    <td style="width: 80px; text-align: center;">
                        <table class="events">
                            <tr>
                                <td>
                                    <a href="?page=canvas&action=edit&id={$canvas.id}">
                                	<span class="icon_cont icon_cont_edit" title="Edit">
                                	</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="confirmDelete('Delete canvas', 'Do you accept deleting this canvas?', '?page=canvas&action=del&id={$canvas.id}');">
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
        {'Canvases are empty'|error}
        <a href="?page=canvas&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Add canvas</a>
    {/if}
{/if}

{* Adding canvas *}
{if $action == 'add'}
    {'<a href="?page=canvas">Canvas</a> / Add canvas'|adminTitle}
    <a href="?page=canvas" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=canvas&action=add" method="post" class="formly" enctype="multipart/form-data">
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
                    Cover:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    Price:
                </td>
                <td>
                    <input type="text" name="price" placeholder="Enter price" maxlength="128" size="32" require="true" label="price" />
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
    {'<a href="?page=canvas">Canvas</a> / Edit canvas'|adminTitle}
    <a href="?page=canvas" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=canvas&action=edit&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Enter name" value="{$canvas.name|stripslashes}" maxlength="128" size="32" require="true" label="name" />
                </td>
            </tr>
            <tr>
                <td>
                    Cover:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                    {if strlen($canvas.img) > 2}
                        <div class="cat_del_img">
                            <a class="fancybox help" rel="group" href="img/canvas/{$canvas.img}">View picture</a>
                        </div>
                    {/if}
                </td>
            </tr>
            <tr>
                <td>
                    Price:
                </td>
                <td>
                    <input type="text" name="price" placeholder="Enter price" maxlength="128" size="32" require="true" label="price" value="{$canvas.price}" />
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