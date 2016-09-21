{'My profile'|adminTitle}
{if !empty($error)}
{$error.pass|error}
{/if}
{if !empty($user)}
<form action="?page=profile" method="post" class="formly">
<table>
    <tr>
        <td class="padding10">
            Login:
        </td>
        <td class="padding10">
            {$user.name}
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Level:
        </td>
        <td class="padding10">
            {$user.level}
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Last enter:
        </td>
        <td class="padding10">
            {$user.last_date|date_format:'%d.%m.%Y&nbsp;&nbsp;&nbsp;%H:%M'}
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Current pass:
        </td>
        <td>
            <input type="password" name="old_pass" require="require" label="current pass" size="32" maxlength="64" />
        </td>
    </tr>
    <tr>
        <td class="padding10">
            New pass:
        </td>
        <td>
            <input type="password" name="pass" require="require" label="new pass" size="32" maxlength="64" />
        </td>
    </tr>
    <tr>
        <td class="padding10">
            Confim new pass:
        </td>
        <td>
            <input type="password" name="pass2" match="pass" label="Confim new pass" size="32" maxlength="64" />
        </td>
    </tr>
    <tr>
        <td>
            
        </td>
        <td>
            <input type="submit" value="Save" />
        </td>
    </tr>
</table>
</form>
{else}
{'An error has occurred. Contact to developers at cms@up-studio.net'|error}
{/if}