{* Показать все статьи *}
{if $action == 'show'}
    {'Articles'|adminTitle}
    {if !empty($articles)}
    <a href="?page=articles&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Add article</a>
    <table class="dt_three display">
		<thead>
			<tr>
				<th>ID</th>
				<th><b>Name</b></th>
				<th><b>Actions</b></th>
			</tr>
		</thead>
		<tbody>
            {foreach from=$articles item=article}
			<tr class="odd gradeA">
				<td style="width: 40px; text-align: center;">{$article.id}</td>
				<td>{$article.name}</td>
                <td style="width: 80px; text-align: center;">
                    <table class="events">
                        <tr>
                            <td>
                                <a href="?page=articles&action=edit&id={$article.id}">
                                	<span class="icon_cont icon_cont_edit" title="Edit">
                                	</span>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete('Delete article', 'Do you accept deleting this article?', '?page=articles&action=del&id={$article.id}');">
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
        {'Articles are empty'|error}
        <a href="?page=articles&action=add" class="button"><img src="img/icons/plus.png" alt=""/>Add article</a>
    {/if}
{/if}

{* Добавление статьи *}
{if $action == 'add'}
    {'<a href="?page=articles">Articles</a> / Add article'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <form action="?page=articles&action=add" method="post" class="formly" enctype="multipart/form-data">
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
                    Адрес:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="" />
                    /articles/<input id="addr" type="text" name="addr" placeholder="Enter URL" maxlength="128" size="24" />
                    <input id="addr_table" type="hidden" name="table" value="articles" />
                    <a href="javascript: void(0);" title="For example, http://up-studio.net/your_url." class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            {if $smarty.const.__CONST_ARTICLES_COVER}
            <tr>
                <td>
                    Cover:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Date:
                </td>
                <td>
                    <input type="text" name="date" placeholder="Enter date" maxlength="128" size="32" class="datepicker" value="{'Y-m-d'|date}" />
                </td>
            </tr>
            {if $smarty.const.__CONST_ARTICLES_TAGS}
            <tr>
                <td>
                    Tags:
                </td>
                <td style="padding-bottom: 10px;">
                    <input id="tags_field" type="text" placeholder="Enter tags separated by space" maxlength="128" size="32"/>
                    <input id="tags" type="hidden" name="tags"/>
                    <span id="tags_add" class="button3"><img src="img/icons/plus.png" alt=""/></span><br />
                    <div id="tags_cur"></div>
                    <div class="clear"></div>
                    {if !empty($tags)}
                    <span id="tags_but">Available tags</span>
                    <div id="tags_all">
                        {foreach from=$tags item="tag"}<span>{$tag}</span> {/foreach}
                    </div>
                    <div class="clear"></div>
                    {/if}
                    <div id="tags_del"></div>
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Short text:
                </td>
                <td>
                    <textarea name="text_s" rows="15" cols="60" class="ckeditor"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Text:
                </td>
                <td>
                    <textarea name="text" rows="20" cols="60" class="ckeditor"></textarea>
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
                    <input type="submit" value="Добавить" class="button" />
                </td>
            </tr>
        </table>	
	</form>
{/if}

{* Редактирование статьи *}
{if $action == 'edit'}
    {'<a href="?page=articles">Articles</a> / Редактирование статьи'|adminTitle}
    <a href="javascript:history.go(-1)" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <a href="?page=help&cat=articles#actions-edit" class="button"><img src="img/icons/help.png" alt=""/>Справка</a>
    <form action="?page=articles&action=edit&id={$id}" method="post" class="formly" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Название:
                </td>
                <td>
                    <input id="name" type="text" name="name" placeholder="Введите название статьи" value="{$articles.name|stripslashes}" maxlength="128" size="32" require="true" label="название статьи" />
                </td>
            </tr>
            <tr>
                <td>
                    Адрес:
                </td>
                <td>
                    <input id="addr2" type="hidden" name="addr2" value="{$articles.addr}" />
                    /articles/<input id="addr" type="text" name="addr" placeholder="Введите адрес страницы" maxlength="128" size="24" value="{$articles.addr}" />
                    <input id="addr_table" type="hidden" name="table" value="articles" />
                    <a href="javascript: void(0);" title="Этот адрес будет отображаться после адреса сайта. Например, http://up-studio.net/ваше_название." class="tooltip_link"><img src="img/icons/faq.png" alt="" class="faq" /></a>
                    <span id="addr_text"></span>
                </td>
            </tr>
            {if $smarty.const.__CONST_ARTICLES_COVER}
            <tr>
                <td>
                    Обложка:
                </td>
                <td>
                    <input type="file" name="img" />&nbsp;
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Дата:
                </td>
                <td>
                    <input type="text" name="date" placeholder="Введите дату" maxlength="128" size="32" class="datepicker" value="{$articles.date|stripslashes}" />
                </td>
            </tr>
            {if $smarty.const.__CONST_ARTICLES_TAGS}
            <tr>
                <td>
                    Теги:
                </td>
                <td style="padding-bottom: 10px;">
                    <input id="tags_field" type="text" placeholder="Введите теги через пробел" maxlength="128" size="32"/>
                    <input id="tags" type="hidden" name="tags" value="{$articles.tags|stripslashes}"/>
                    <span id="tags_add" class="button3"><img src="img/icons/plus.png" alt=""/></span><br />
                    <div id="tags_cur">
                    {if !empty($curTags)}
                        {foreach from=$curTags item="tag"}<span><img src="/admin/img/icons/dels.png" alt="" />{$tag}</span> {/foreach}
                    {/if}
                    </div>
                    <div class="clear"></div>
                    {if !empty($tags)}
                    <span id="tags_but">Доступные теги</span>
                    <div id="tags_all">
                        {foreach from=$tags item="tag"}<span>{$tag}</span> {/foreach}
                    </div>
                    <div class="clear"></div>
                    {/if}
                    <div id="tags_del"></div>
                </td>
            </tr>
            {/if}
            <tr>
                <td>
                    Краткое описание:
                </td>
                <td>
                    <textarea name="text_s" rows="15" cols="60" class="ckeditor">{$articles.text_s|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Текст:
                </td>
                <td>
                    <textarea name="text" rows="20" class="ckeditor" cols="60">{$articles.text|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <textarea name="title" rows="3" cols="60" placeholder="Enter the title">{$articles.title|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" rows="10" cols="60" placeholder="Enter the description">{$articles.description|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Keywords:
                </td>
                <td>
                    <textarea name="keywords" rows="5" cols="60" placeholder="Enter the keywords">{$articles.keywords|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Изменить" class="button" />
                </td>
            </tr>
        </table>	
	</form>
{/if}