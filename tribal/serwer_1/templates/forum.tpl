<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" type="text/css" href="game.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="script.js" type="text/javascript"></script>
<title>{$category_n}</title>
	</head>
	<body class="b_forum">
	
			{foreach from=$category_id key=value item=id}
			
			{if $category == $id}
			<span class="forum selected">
				<b>{$category_name.$value|urldecode|stripslashes}</b> 
			</span>
			{else}
				<span class="forum"> 
					<a href="forum.php?ally={$ally}&category={$id}">{$category_name.$value|urldecode|stripslashes}</a> 
				</span>
			{/if}
			{/foreach}
			{if $user.ally_titel == '1' OR $user.ally_lead == '1'}
			<span class="forum {if $do == 'new_category'}selected{/if}"> <a href="forum.php?ally={$ally}&do=new_category">[<b>+</b>]</a> </span>
			{/if}

	<table class="main" width="99.3%">
		<tr>
			<td>
			{if isset($error_category_ally)}
				<h2>{$error_category_ally}</h2>
			{else}
				{if $do == 'new_category'}
					{if $user.ally_titel == '1' OR $user.ally_lead == '1'}
						{include file="forum_new_category.tpl"}
					{/if}
				{elseif $do == 'new_thread'}
					{include file="forum_new_thread.tpl"}
				{elseif $do == 'view_thread'}
					{include file="forum_view_thread.tpl"}
				{else}
				<h2>{$category_n} - <a href="forum.php?ally={$ally}&category={$category}&do=new_thread">Novo tópico</a></h2>
				
				<table class="vis" width="100%">
					<tr>
						{if $user.ally_titel == '1' OR $user.ally_lead == '1'}<th>-</th>{/if}
						<th colspan="2">Forum</th>
						<th>Autor</th>
						<th>último post</th>
						<th>Posts</th>
					</tr>
					<form action="" method="POST">
				{foreach from=$thread_id key=value item=id}
					<tr>
						{if $user.ally_titel == '1' OR $user.ally_lead == '1'}<td width="12"><input type="checkbox" name="ids[{$id}]"/></td>{/if}
						<td width="14">
							{if $thread_closed.$value == '1'}
								{if $thread_read.$value == '0'}
									<img src="http://localhost/graphic/forum/thread_close.png"/>
								{elseif $thread_read.$value == '1'}
									<img src="http://localhost/graphic/forum/thread_closed.png"/>
								{/if}
							{else}
								{if $thread_read.$value == '0'}
									<img src="http://localhost/graphic/forum/thread_unread.png"/>
								{elseif $thread_read.$value == '1'}
									<img src="http://localhost/graphic/forum/thread_read.png"/>
								{/if}
							{/if}
						</td>
						<td>
							<a href="forum.php?ally={$ally}&category={$category}&do=view_thread&id={$id}">{$thread_title.$value}</a> {if $thread_closed.$value == '1'}<b>(Inchis)</b>{/if}<br /><font size="1px"></font>
						</td>
						<td align="center"><a href="#"><strong>{$thread_author.$value|urldecode|stripslashes}</strong></a> <br /> {$thread_time.$value}</td>
						{if $thread_post_number.$value < 1}
							<td align="center"><strong> --- </strong></td>
						{else}
						<td align="center"><strong>{$thread_last_post_author.$value|urldecode|stripslashes}</strong> <br /> {$thread_last_post_date.$value}</td>
						{/if}
						<td>{$thread_post_number.$value}</td>
					</tr>
				{/foreach}
					
					<tr>
						<th colspan="100%">
						{if $user.ally_titel == '1' OR $user.ally_lead == '1'}
						Ação:
							<select name="thread_action">
								<option value="close_thread">Fechar Tópico</option>
								<option value="open_thread">Abrir Tópico</option>
								<option value="delete_thread">Apagar Tópico</option>
							</select>
							<input type="submit" value="OK" name="thread_action_go" />
						{else}
						&nbsp;
						{/if}
						</th>
					</tr>
					</form>

				</table>
				{/if}
			{/if}
			</td>
		</tr>
	</table>
	</body>
</html>
