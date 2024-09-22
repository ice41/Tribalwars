<table cellspacing="0">
<tr><td valign="top">
{if $user.ally_found==1}
    <form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=change&amp;h={$hkey}" method="post">
    <table class="vis" width="100%">
        <tr><th colspan="2">&#206;nsusiri</th></tr>
        <tr><td>Numele tribului:</td><td><input type="text" name="name" value="{$ally.name}" /></td></tr>
        <tr><td width="140">Prescurtare (maxim 6 caractere):</td><td><input type="text" name="tag" maxlength="6" value="{$ally.short}" /></td></tr>
        <tr><td width="140">Homepage:</td><td><input type="text" name="homepage" maxlength="128" size="50"  value="{$ally.homepage}" /></td></tr>
        <tr><td width="140">IRC-Channel:</td><td><input type="text" name="irc-channel" maxlength="128" size="50"  value="{$ally.irc}" /></td></tr>
        <tr><td colspan="2"><input type="submit" value="Modificare" /></td></tr>
    </table>
    </form>

    <table class="vis" width="100%">
    <tr><th>Dizolvarea tribului</th></tr>
    <tr><td><a href="javascript:ask('Dore&#351;ti &#238;ntr-adev&#259;r s&#259;-&#355;i dizolvi tribul?', 'game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=close&amp;h={$hkey}')">Dizolvarea tribului</a></td></tr>
    </table>
{/if}

</td><td valign="top" width="360">

{if $user.ally_diplomacy==1}
    {if !empty($preview)}
        <table class="vis" width="100%">
            <tr><th colspan="2">Vorschau</th></tr>
            <tr><td colspan="2" align="center">{php}
$ce1 = Array("wurde von"," gegründet","Wendet euch bei Fragen an","Dieser Text kann von den Diplomaten des Stammes geändert werden.");
$cu_ce1 = Array("a fost creat de",".","Adresati orice intrebare lui","Acest text poate fi schimbat/editat de liderii tribului.");
echo bb_format(str_replace($ce1,$cu_ce1,$this->_tpl_vars['ally']['description']));
{/php}</td></tr>
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

    <form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=change_desc&amp;h={$hkey}" method="post" name="edit_profile">
    <table class="vis" width="100%">
            <tr><th colspan="2" width="100%">Descriere</th></tr>
        <tr id="show_row" align="center"><td colspan="2">{php}
$ce2 = Array("wurde von"," gegründet","Wendet euch bei Fragen an","Dieser Text kann von den Diplomaten des Stammes geändert werden.");
$cu_ce2 = Array("a fost creat de",".","Adresati orice intrebare lui","Acest text poate fi schimbat/editat de liderii tribului.");
echo bb_format(str_replace($ce2,$cu_ce2,$this->_tpl_vars['ally']['description']));
{/php} </td></tr>
        <tr id="bbcode">
        <td colspan="2">
            <div style="position: relative"> 
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
        <tr id="edit_row"><td colspan="2"><textarea id="message" name="desc_text" cols="40" rows="15">{$ally.edit_description|replace:"wurde von":"(str_replace($ce2,$cu_ce2,$this->_tpl_vars['ally']['description'])"|replace:" gegründet":"."|replace:"Wendet euch bei Fragen an":"Orice intrebare la"|replace:"Dieser Text kann von den Diplomaten des Stammes geändert werden.":"Acest text poate fi schimbat/editat doar de Bosii tribului."}</textarea></td></tr>
        <tr id="submit_row"><td><input type="submit" name="edit" value="Memoreaz&#259;" /> <input type="submit" name="preview" value="Privire control" /></td><td align="right"><a onclick="javascript:popup_scroll('help.php?mode=bb', 700, 400); return false;" href="help.php?mode=bb" target="_blank">BB-Codes</a></td></tr>
    </table>
    </form>
    <a id="edit_link" href="javascript:bbEdit()" style="display:none">prelucrare</a><br />

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
    <br />
    <form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=ally_image&amp;h={$hkey}" enctype="multipart/form-data" method="post">
        <table class="vis" width="100%">
            <tr>
                <th>
                    Emblema tribului:
                </th>
            </tr>
            <tr>
                <td>
                    {if !empty($ally.image)}
                        <img src="graphic/ally/{$ally.image}" alt="Wappen" />
                        <br />
                        <input name="del_image" type="checkbox" />
                        Wappen löschen
                        <br />
                    {/if}
                    <input name="image" type="file" size="40" accept="image/*" maxlength="1048576" />
                    <br />
                    <span style="font-size: xx-small">max. 300x200, max. 256kByte, (jpg, jpeg, png, gif)</span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="OK" />
                </td>
            </tr>
        </table>
 </form>
{/if}

</td></tr></table>