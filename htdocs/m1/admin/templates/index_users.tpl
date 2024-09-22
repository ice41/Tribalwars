{if empty($id)}
{include file="index_users_overview.tpl"}
{/if}
{if $id}
{include file="index_users_edit.tpl"}
{/if}