<br />
<form method="post" action="/game.php?village={$village.id}&screen=ally&mode=intro_igm&action=intro_igm&h=5568">
  <table class="vis">
    <tbody>
      <tr>
        <th>IGM-de &#238;nt&#226;mpinare:
        </th>
      </tr>
      <tr id="bbcode">
          <td>
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
      <tr>
      <td><textarea id="message" name="text"  cols="70" rows="20"/>{$allyIgm}</textarea></td>
      </tr>
      <tr><td>
          <input type="submit" value="Modificare"/></td>
      </tr>
    </tbody>
  </table>
</form> 