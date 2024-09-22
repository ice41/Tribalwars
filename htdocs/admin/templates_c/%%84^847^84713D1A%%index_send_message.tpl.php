<?php /* Smarty version 2.6.14, created on 2011-01-16 14:30:50
         compiled from index_send_message.tpl */ ?>
<?php 
$nume = urlencode($_POST['nume']);
$subiect = $_POST['subiect'];
$text = urlencode($_POST['text']);
$timp = time();

if ($_GET['send'] == 'succes')
{

if (strlen($nume) <= 2)
{
$err1='<tr><td colspan="2"><div class="error">Numele trebuie sa contina minim 3 caractere!</div></td></tr>';
}
else
{
$err1='';
}
if (strlen($subiect) <= 1)
{
$err2="<tr><td colspan='2'><div class='error'>Nu aveti un subiect!</div></td></tr>";
}
else
{
$err2='';
}

$verificare_nume = mysql_query("SELECT username FROM users WHERE username = '$nume'");
$verificare_nume = mysql_fetch_array($verificare_nume);
$verificare_nume  = $verificare_nume[0];

if ($verificare_nume != $nume)
{

$err3='<tr><td colspan="2"><div class="error">Numele nu exista!</div></td></tr>';

}
else
$err3='';


if ($err1 == '' && $err2 == '' && $err3 == '')
  {
  
  $id = mysql_query("SELECT id FROM users WHERE username = '$nume'");
  $id = mysql_fetch_array($id);
  $id = $id[0];
  $sql4 = "INSERT INTO `mail_in`
                    (from_id,from_username,to_id,to_username,subject,text,is_read,is_answered,output_id,time)
                    VALUES ('-1','Medieval-War','".$id."','".$nume."','".$subiect."','".$text."','0','0','-1','".$timp."')";
					mysql_query("UPDATE users SET new_mail = '1' WHERE username = '$nume'");
            $res4 = mysql_query($sql4) or die(mysql_error());
	
	$succes = '<tr><td colspan="2"><font color="green"><strong>Mesajul a fost trimis!</strong></font></td></tr>';
  }

}
  
 
  
 ?>
<table class="vis">
<h2>Trimite mesaj</h2>
<form method="post" action="index.php?screen=send_message&send=succes">

<label>
<tr>
  <td>Nume jucator:</td><td><input type="text" name="nume" /></td></tr>
  </label>
  <br />
  <label><tr>
  <td>Subiect:</td>
  <td><input type="text" name="subiect" /></td></tr>
  <tr id="bbcode">
        <td colspan="2">
            <div style="text-align: left; overflow: visible;">
                <a id="bb_button_bold" title="Bold" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_italic" title="Italic" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_underline" title="Subliniat" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_strikethrough" title="T&#259;iat" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_quote" title="Citat" href="#" onclick="BBCodes.insert('[quote=Author]', '[/quote]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -140px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                  <a id="bb_button_img" title="Imagine" href="#" onclick="BBCodes.insert('[img]', '[/img]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -180px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_url" title="URL" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -260px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_player" title="Juc&#259;tori" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_tribe" title="Triburi" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_coord" title="Coordonate" href="#" onclick="BBCodes.insert('[village]', '[/village]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -120px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
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
</label>

<?php  echo $succes;  ?>


<?php  echo $err1;  ?>


<?php  echo $err2;  ?>


<?php  echo $err3;  ?>

<br />
<tr>
 <td colspan="2"><textarea id="message" rows="16" cols="80" name="text"></textarea></td>
 </tr>
  <tr>
		      <td colspan="2"><div align="center">
	            <input type="submit" name="submit" value="Trimite">
		      </div></td>
		    </tr>
</form>


</table>

