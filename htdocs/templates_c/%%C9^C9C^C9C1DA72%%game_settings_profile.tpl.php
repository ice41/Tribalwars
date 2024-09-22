<?php /* Smarty version 2.6.14, created on 2012-04-29 09:15:21
         compiled from game_settings_profile.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;action=change_profile&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" enctype="multipart/form-data" method="post">
    <table class="vis">
        <tr>
            <th colspan="2">
                &#206;nsu&#351;iri
            </th>
        </tr>
        <tr>
            <td>
                Data na&#351;terii:
            </td>
            <td>
                <input name="day" type="text" size="2" maxlength="2" value="<?php echo $this->_tpl_vars['profile']['b_day']; ?>
" />
                    <select name="month">
                        <option label="Ianuarie" value="1" <?php if ($this->_tpl_vars['profile']['b_month'] == 1): ?>selected<?php endif; ?>>Ianuarie</option>
                        <option label="Februarie" value="2" <?php if ($this->_tpl_vars['profile']['b_month'] == 2): ?>selected<?php endif; ?>>Februarie</option>
                        <option label="Martie" value="3" <?php if ($this->_tpl_vars['profile']['b_month'] == 3): ?>selected<?php endif; ?>>Martie</option>
                        <option label="Aprilie" value="4" <?php if ($this->_tpl_vars['profile']['b_month'] == 4): ?>selected<?php endif; ?>>Aprilie</option>
                        <option label="Mai" value="5" <?php if ($this->_tpl_vars['profile']['b_month'] == 5): ?>selected<?php endif; ?>>Mai</option>
                        <option label="Iunie" value="6" <?php if ($this->_tpl_vars['profile']['b_month'] == 6): ?>selected<?php endif; ?>>Iunie</option>
                        <option label="Iulie" value="7" <?php if ($this->_tpl_vars['profile']['b_month'] == 7): ?>selected<?php endif; ?>>Iulie</option>
                        <option label="August" value="8" <?php if ($this->_tpl_vars['profile']['b_month'] == 8): ?>selected<?php endif; ?>>August</option>
                        <option label="Septembrie" value="9" <?php if ($this->_tpl_vars['profile']['b_month'] == 9): ?>selected<?php endif; ?>>Septembrie</option>
                        <option label="Octombrie" value="10" <?php if ($this->_tpl_vars['profile']['b_month'] == 10): ?>selected<?php endif; ?>>Octombrie</option>
                        <option label="Noiembrie" value="11" <?php if ($this->_tpl_vars['profile']['b_month'] == 11): ?>selected<?php endif; ?>>Noiembrie</option>
                        <option label="Decembrie" value="12" <?php if ($this->_tpl_vars['profile']['b_month'] == 12): ?>selected<?php endif; ?>>Decembrie</option>
                    </select>
                <input name="year" type="text" size="4" maxlength="4" value="<?php echo $this->_tpl_vars['profile']['b_year']; ?>
" />
            </td>
        </tr>
        <tr>
            <td>
                Genul:
            </td>
            <td>
                <label>
                    <input type="radio" name="sex" value="f" <?php if ($this->_tpl_vars['profile']['sex'] == 'f'): ?>checked="checked"<?php endif; ?> />
                        feminin
                </label>
                <label>
                    <input type="radio" name="sex" value="m" <?php if ($this->_tpl_vars['profile']['sex'] == 'm'): ?>checked="checked"<?php endif; ?> />
                        masculin
                </label>
                <label>
                    <input type="radio" name="sex" value="x" <?php if ($this->_tpl_vars['profile']['sex'] == 'x'): ?>checked="checked"<?php endif; ?> />
                        nemen&#355;ionat
                </label>
            </td>
        </tr>
        <tr>
            <td>
                Localitate:
            </td>
            <td>
                <input name="home" type="text" size="24" maxlength="32" value="<?php echo $this->_tpl_vars['profile']['home']; ?>
" />
            </td>
        </tr>
        <tr>
            <td>
                Emblem&#259; proprie:
            </td>
            <td>
                <?php if (! empty ( $this->_tpl_vars['user']['image'] )): ?>
                    <img src="graphic/player/<?php echo $this->_tpl_vars['user']['image']; ?>
" alt="Emblema" />
                    <br />
                    <input name="del_image" type="checkbox" />
                    Sterge emblema
                    <br />
                <?php endif; ?>
                   <input name="image" type="file" size="40" accept="image/*" maxlength="1048576" />
                <br />
                <span style="font-size: xx-small">max. 240x180, max. 120kByte, (jpg, jpeg, png, gif)</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="OK" />
            </td>
        </tr>
    </table>
    <br />
</form>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;action=change_text&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
    <table class="vis">
        <tr>
            <th colspan="2">
                Text propriu:
            </th>
        </tr>
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
    
                <?php echo '
                <script type="text/javascript">
                    $(document).ready(function(){
                        BBCodes.init({target : \'#message\'});
                    });
                </script>
                '; ?>

    
            </div>            
      </td>
    </tr>        
        <tr>
            <td colspan="2">
                <textarea id="message" name="personal_text" cols="50" rows="10"><?php echo $this->_tpl_vars['profile']['personal_text']; ?>
</textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="send" value="OK" />
            </td>
            <td align="right">
        <a onclick="javascript:popup_scroll('help.php?mode=bb', 700, 400); return false;" href="help.php?mode=bb" target="_blank">BB-Codes</a>
      </td>
      
        </tr>
    </table>
</form> 