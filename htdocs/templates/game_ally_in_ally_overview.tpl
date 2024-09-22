<table width="100%"><tr><td valign="top">
        
    <table class="vis" width="100%">
    {if $num_pages>1}
        <tr>
            <td align="center" colspan="3">
                {section name=countpage start=1 loop=$num_pages+1 step=1}
                    {if $site==$smarty.section.countpage.index}
                        <strong> >{$smarty.section.countpage.index}< </strong>
                    {else}
                        <a href="game.php?village={$village.id}&amp;screen=ally&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
                    {/if}
                {/section}
            </td>
        </tr>
    {/if}
    <tr><th>Data</th><th>Eveniment</th></tr>

        {foreach from=$events item=arr key=id}
            <tr>
                <td>{$arr.time}</td>
                <td>{php}

$text_f = $this->_tpl_vars['arr']['message'];
$text_f = str_replace("Der Stamm wurde von","Tribul a fost &#238;ntemeiat de",$text_f);
$text_f = str_replace(" gegründet","",$text_f);
$text_f = str_replace("ist dem Stamm beigetreten","s-a al&#259;turat tribului",$text_f);
$text_f = str_replace("hat den Stamm verlassen.","a p&#259;r&#259;sit tribul.",$text_f);
$text_f = str_replace("hat die Einladung abgelehnt.","a refuzat invita&#355;ia.",$text_f);
$text_f = str_replace("hat die interne Ankündigung geändert","a modificat anun&#355;ul intern",$text_f);
$text_f = str_replace("hat die Stammesbeschreibung geändert","a modificat descrierea tribului",$text_f);
if(preg_match('/eingeladen/', $text_f)) {
$text_f = str_replace("wurde von","a fost invitat de c&#259;tre",$text_f);
$text_f = str_replace(" eingeladen","",$text_f); 
}
if(preg_match('/entlassen/', $text_f)) {
$text_f = str_replace("wurde von","a fost concediat de c&#259;tre",$text_f);
$text_f = str_replace(" entlassen","",$text_f); 
}
if(preg_match('/Die Einladung an/', $text_f)) {
$text_f = str_replace("Die Einladung an","Invita&#355;ia pentru",$text_f);
$text_f = str_replace("wurde von","a fost retras&#259; de c&#259;tre",$text_f);
$text_f = str_replace(" zurückgezogen","",$text_f); 
}

echo $text_f;
//{$arr.message} 

{/php} </td>
            </tr>
        {/foreach}

    </table>
        
</td><td valign="top" width="360">
    <table class="vis" width="100%"><tr>
    <td><a href="game.php?village=36841&amp;screen=ally&amp;action=exit&amp;h=cc6f" onclick="javascript:ask('Dore&#351;ti &#238;ntr-adev&#259;r s&#259;-&#355;i p&#259;r&#259;se&#351;ti tribul?', 'game.php?village={$village.id}&amp;screen=ally&amp;action=exit&amp;h={$hkey}'); return false;">P&#259;r&#259;se&#351;te tribul</a></td>
    </tr></table>
    
            

    {if !empty($preview)}
        <table class="vis" width="100%">
            <tr><th colspan="2">Vorschau</th></tr>
            <tr><td colspan="2" align="center">{php}
$ce3 = Array("Wendet euch bei Fragen an","Dieser Text kann von der Stammesführung geändert werden.");
$cu_ce3 = Array("Orice intrebare o puteti adresa conducatorilor tribului.","Acest text se poate modifica numai de intemeietorul tribului.");
echo bb_format(str_replace($ce3,$cu_ce3,$this->_tpl_vars['ally']['intern_text']));
{/php} </td></tr>
        </table>
    {/if}
    
    <script type="text/javascript">
    function bbEdit() {ldelim}
        gid("show_row").style.display = 'none';
        gid("edit_link").style.display = 'none';
        gid("edit_row").style.display = '';
        gid("submit_row").style.display = '';
        gid("bbcode").style.display = '';
    {rdelim}
    </script>

    <form action="game.php?village={$village.id}&amp;screen=ally&amp;action=edit_intern&amp;h={$hkey}" method="post" name="edit_profile">
    <table class="vis" width="100%">
            <tr><th colspan="2" width="100%">Anun&#355; intern</th></tr>
        <tr id="show_row" align="center"><td colspan="2">{php}
$ce4 = Array("Wendet euch bei Fragen an","Dieser Text kann von der Stammesführung geändert werden.");
$cu_ce4 = Array("Orice intrebare o puteti adresa conducatorilor tribului.","Acest text se poate modifica numai de intemeietorul tribului.");
echo bb_format(str_replace($ce4,$cu_ce4,$this->_tpl_vars['ally']['intern_text']));
{/php}</td></tr>
    {if $user.ally_found==1}
        <tr id="bbcode">
        <td colspan="2">
            <div style="text-align: left; overflow: visible;">
                <a id="bb_button_bold" title="Fett" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
                    <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
                <a id="bb_button_italic" title="Kursiv" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
            <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
                <a id="bb_button_underline" title="Unterstrichen" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
                    <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
                <a id="bb_button_strikethrough" title="Durchgestrichen" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
                    <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
                <a id="bb_button_quote" title="Zitat" href="#" onclick="BBCodes.insert('[quote=Author]', '[/quote]');return false;">
            <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -140px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
                <a id="bb_button_url" title="Adresse" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;">
                    <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
                <a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;">
                    <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -260px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
                <a id="bb_button_player" title="Spieler" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;">
            <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
                <a id="bb_button_tribe" title="Stamm" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;">
                    <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
                <a id="bb_button_coord" title="Koordinate" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
                    <div style="display: inline-block; background: url(&quot;graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -120px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
                </a>
    
                {literal}
                <script type="text/javascript">
                    $(document).ready(function(){
                        BBCodes.init({target : '#message'});
                    });
                </script>
                {/literal}
    
            </div>            
      </td>
    </tr>
        <tr id="edit_row"><td colspan="2"><textarea id="message" name="intern" cols="40" rows="15">{$ally.edit_intern_text|replace:"Wendet euch bei Fragen an":"Orice intrebare o puteti adresa lui"|replace:"Dieser Text kann von der Stammesführung geändert werden.":"Acest text poate fi schimbat doar de liderii tribului."}</textarea></td></tr>
        <tr id="submit_row"><td><input type="submit" name="edit" value="Memoreaz&#259;" /> <input type="submit" name="preview" value="Privire control" /></td><td align="right"><a onclick="javascript:popup_scroll('help.php?mode=bb', 700, 400); return false;" href="help.php?mode=bb" target="_blank">BB-Codes</a></td></tr>
    {/if}
    </table>
    </form>
    {if $user.ally_found==1}<a id="edit_link" href="javascript:bbEdit()" style="display:none">prelucrare</a><br />{/if}
    
    {if empty($preview)}
        <script type="text/javascript">
          gid("edit_row").style.display = 'none';
            gid("submit_row").style.display = 'none';
            gid("bbcode").style.display = 'none';
            gid("edit_link").style.display = '';
        </script>
    {else}
        <script type="text/javascript">
              gid("edit_row").style.display = '';
              gid("bbcode").style.display = '';
              gid("show_row").style.display = 'none';
            gid("submit_row").style.display = '';
            gid("edit_link").style.display = 'none';
        </script>
    {/if}

</td></tr></table> 