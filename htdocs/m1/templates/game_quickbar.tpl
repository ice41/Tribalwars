
{php}
$getUser = mysql_query("SELECT userid FROM villages WHERE id = '".$_GET['village']."'");
  while ($fetch = mysql_fetch_assoc($getUser)) {
          $u = $fetch['userid'];
  }
$getQuickbar = mysql_query("SELECT id, name, img, href, target FROM quickbar WHERE uid = $u");
if (mysql_num_rows($getQuickbar) > 0) {
{/php}
<table style="border-spacing:1px; background-color:#fee47d; border:0px;" class="menu nowrap" align="center">
  <tr>
      {php}
      $count = 0;
      require("include/config.php");
      {/php}
    {foreach from=$quickbar item=quick}
      {if substr($quick.href, 0, 8) == 'game.php'}
      <td height="24"><a href="{$quick.href}&village={$quick.vid}" {if $quick.target == 1} target="_blank"{/if}><img src="{$quick.img}" alt="" /> {$quick.name}</a></td>
      {else}
      <td height="24"><a href="{$quick.href}" {if $quick.target == 1} target="_blank"{/if}><img src="{$quick.img}" alt="" /> {$quick.name}</a></td>
      {/if}
      {php}
      $count = $count + 1;
      
      
      if (($count % $config['quickbar']) == 0) {
      echo "</tr>";
      echo "<tr>";
      
      }
      {/php}
   {/foreach}
  </tr>
</table><br />
{php}
}
{/php}