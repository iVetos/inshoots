{if $action eq 'show'}
    {'Customers'|adminTitle}
    {if !empty($users)}
    <table class="dt_users display">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th><b>Имя</b></th>
                <th><b>Телефон</b></th>
                <th><b>Город</b></th>
                <th><b>Email</b></th>
                <th><b>Заходил</b></th>
                <th><b></b></th>
    		</tr>
    	</thead>
    	<tbody>
            {foreach from=$users item=user}
    		<tr class="odd gradeA">
    			<td style="width: 40px; text-align: center;">{$user.id}</td>
    			<td>{$user.name}</td>
                <td>{$user.phone}</td>
                <td>{$user.city}</td>
                <td>{$user.email}</td>
                <td>{$user.last_date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'}</td>
                <td style="width: 40px; text-align: center;">
                    <a href="?page=users&action=see&id={$user.id}">
    					<span class="icon_cont icon_cont_see" title="Подробнее">
    					</span>
    				</a>
                </td>
    		</tr>
            {/foreach}
    	</tbody>
    </table>
    {else}
        {'Nobody here'|error}
    {/if}
{/if}

{if $action eq 'see'}
    {'<a href="?page=users">Покупатели</a> / Просмотр профиля'|adminTitle}
    <a href="page=users" class="button"><img src="img/icons/back.png" alt=""/> Back</a>
    <table>
        <tr>
            <td>
                <strong>Имя:</strong>
            </td>
            <td class="padding10">
                {$user.name}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Телефон:</strong>
            </td>
            <td class="padding10">
                {$user.phone}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Email:</strong>
            </td>
            <td class="padding10">
                {$user.email}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Город:</strong>
            </td>
            <td class="padding10">
                {$user.city}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Дата регистрации:</strong>&nbsp;
            </td>
            <td class="padding10">
                {$user.date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Последний визит:</strong>
            </td>
            <td class="padding10">
                {$user.last_date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'}
            </td>
        </tr>
    </table>
{/if}