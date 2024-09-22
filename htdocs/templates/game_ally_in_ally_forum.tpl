{php}
$action = $_GET["action"];
if($action=="")
$action= "index";
if($action=="index"){
{/php}
<table class="vis" width="800">
<tr><th colspan="3">Forumul Tribului</th></tr>

	<td>
	<table align=left>
<tr> 
	{php}
	$user = mysql_fetch_array(mysql_query("SELECT userid FROM villages WHERE id=$_GET[village]"));
	$trib = mysql_fetch_array(mysql_query("SELECT ally FROM users WHERE id=$user[userid]"));
	$q = mysql_query("SELECT * FROm forum WHERE trib=$trib[ally]");
	$n = mysql_num_rows($q);
	if($n>=1){
		if(!$_GET["forum"]){
	$a = mysql_fetch_array(mysql_query("SELECT * FROM forum WHERE trib=$trib[ally] ORDER BY id ASC"));
	$id = $a["id"];
	}elseif($_GET["forum"]!=""){
	$a = mysql_fetch_array(mysql_query("SELECT * FROM forum WHERE id=$_GET[forum]"));
	$id = $a["id"];
	}
	while($f = mysql_fetch_array($q)){
	

	
	if($id==$f["id"]){
	$name = "<b>$f[name]</b>";
	}else{
	$name = "<a href=\"game.php?village=$_GET[village]&screen=ally&mode=forum&action=index&forum=$f[id]\">$f[name]</a>";
	}
	{/php}

<td class="selected" style="border:1px solid #804000;" height=25><b>{php}print $name;{/php}</b></td> 
<td height=25 wight=10></td> 


{php}
}
}else{
mysql_query("INSERT INTO forum SET trib=$trib[ally], name='General'");
	$a = mysql_fetch_array(mysql_query("SELECT * FROM forum WHERE trib=$trib[ally] ORDER BY id ASC"));
	$id = $a["id"];
{/php}
<td class="selected" style="border:1px solid #804000;" height=25><b>{php}print $a["name"];{/php}</b></td> 

{php}
}
$usr = mysql_fetch_array(mysql_query("SELECT userid FROm villages WHERE id=$_GET[village]"));
$usr = mysql_fetch_array(mysql_query("SELECT * FROm users WHERE id=$usr[userid]"));
if($usr["ally_lead"]=="1"){
session_start();
$_SESSION["village"] = $_GET["village"];
$delete = "l";

}
{/php}
</tr></table>
</td></tr>
<tr><td>
<h2>{php}print $a["name"];{/php}</h2>

<a href="game.php?village={php}print $_GET[village]{/php}&screen=ally&mode=forum&action=new&forum={php}print $id;{/php}"><img style="border:1px;" src="graphic/forum_new.png" /></a> 
<br/><br/>
<form method=post action="tribul.php?action=delforum" >
<table  class="vis" width="800">
<tr>
<th>Teme</th>
<th>Autor</th>
<th>Ultimul Mesaj</th>
<th>Raspunsuri</th>
</tr>
{php}
$j = mysql_query("SELECT * FROm post WHERE forum=$a[id] AND prima='y' ORDER BY first,time DESC");
while($z = @mysql_fetch_array($j)){
$user = mysql_fetch_array(mysql_query("SELECT username FROm users WHERE id=$z[user]"));
$autor = "<a href=\"game.php?village=$_GET[village]&screen=info_player&id=$z[user]\">$user[username]</a>";
$reply = mysql_num_rows(mysql_query("SELECT id FROM post WHERE prima='n' AND prid=$z[id]"));
$name = "<a href=\"game.php?village=$_GET[village]&screen=ally&mode=forum&action=post&id=$z[id]\">$z[name]</a>";
if($reply>=1){
$sql = " AND prima='n' ";
}else{
$sql="";
}
if($z["block"]=="y"){
$block = " <small><b>(Tema Blocata)</b></small>";
}else{
$block = "";
}
$last = mysql_fetch_array(mysql_query("SELECT id,user,date,time FROm post WHERE prid=$z[id] $sql ORDER BY (time+0) DESC"));
$last_user = mysql_fetch_array(mysql_query("SELECT id,username FROm users WHERE id=$last[user]"));
$last_user = "<a href=\"game.php?village=$_GET[village]&screen=info_player&id=$last_user[id]\">$last_user[username]</a>";
if($z["first"]=="y"){
$first = "<b>Important:</b> ";
}else{
$first = "";
}
//READ
$r1 = mysql_num_rows(mysql_query("SELECT id fROm `read` WHERE post=$z[id] AND user=$usr[id]"));
if($r1==0){
$read = "un";
}elseif($r1==1){
$r2 = mysql_num_rows(mysql_query("SELECT id fROm `read` WHERE post=$z[id] AND user=$usr[id] AND time>=$z[time]"));
if($r2==1){
$read = "";
}else{

$read = "un";
}
}

//READ
{/php}
<tr>
<td width=350>
{php}
if($delete=="l"){
{/php}
<input type=checkbox value="post_{php}print $z["id"];{/php}" name="post[]" /> 
{php}
}
{/php}
<img src="/graphic/forum_{php}print $read;{/php}read.png" /> {php}print $first.$name.$block;{/php}</td>
<td width=150 align=center><b>{php}print $autor;{/php}</b><br/> {php}print $z["date"];{/php}</td>
<td width=150 align=center><b>{php}print $last_user;{/php}</b><br/> {php}print $last["date"];{/php}</td>
<td width=150 align=center>{php}print $reply;{/php}</td>

</tr>
{php}
}
{/php}
<tr>
<th colspan=4>
{php}
if($delete=="l"){
{/php}
<input type="checkbox" name="checkall" onclick="checkUncheckAll(this);"/><?=$l["profil_sa"];?> Alege Toate {php}
}
{/php}
&nbsp;</th>
</tr>
</table>{php}
if($delete=="l"){
{/php}
<br/>

<input type=image value="yes" name=delete src="graphic/del.png" onmouseover="this.src='graphic/del_over.png'" onmouseout="this.src='graphic/del.png'" /> <br> <input type=submit value="Muta in" /><select name=forum><option calue=0>Alege</option>
{php}
		if(!$_GET["forum"]){
	$a = mysql_fetch_array(mysql_query("SELECT * FROM forum WHERE trib=$trib[ally] ORDER BY id ASC"));
	$id = $a["id"];
	}elseif($_GET["forum"]!=""){
	$a = mysql_fetch_array(mysql_query("SELECT * FROM forum WHERE id=$_GET[forum]"));
	$id = $a["id"];
	}
$ai = mysql_query("SELECT * FROm forum WHERE trib=$trib[ally] AND id!=$id");
print mysql_num_rows($ai);
while($r = mysql_fetch_array($ai)){
print "<option value=$r[id]>$r[name]</option>";
}
{/php}
</select>{php}
}
{/php}
</td></tr>
	</table>
	{if $user.ally_lead==1 || $user.ally_found==1}
	<Br/>
	
	<div align=center><a href="?village={php}print $_GET[village];{/php}&screen=ally&mode=forum&action=admin">Administreaza Forum</a>
	{/if}
	{php}
	}elseif($action=="new"){
	session_start();
	$_SESSION["village"]=$_GET[village];
	$_SESSION["forum"]=$_GET["forum"];
	{/php}
	<form method=post action="tribul.php?action=new">
<table class="vis" width="500" align=center>

<tr><th colspan="3">Topic Nou</th></tr></table>
<table align=center width=500 align=left class=vis>
<tr><td width=200><b>Numele</b></td><td><input type=text name=name /></td></tr>
<tr><td width=200><b>Mesajul</b></td><td><a href="javascript: insertBBcode('message','[b]','[/b]')"             onMouseover="ddrivetip('<CENTER><font color=white>Bold</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a> 
<a href="javascript: insertBBcode('message','[i]','[/i]')"             onMouseover="ddrivetip('<CENTER><font color=white>Cursiv</font></CENTER>','red', 60)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -20px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a> 
<a href="javascript: insertBBcode('message','[u]','[/u]')"             onMouseover="ddrivetip('<CENTER><font color=white>Subliniat</font></CENTER>','red', 80)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -40px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a> 
<a href="javascript: insertBBcode('message','[citat]','[/citat]')"     onMouseover="ddrivetip('<CENTER><font color=white>Citat</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -140px 0px; padding-left; 0px; padding-bottom: 0px; margin-right: 4px; width: 20px; height: 20px;"></div></a> 
<a href="javascript: insertBBcode('message','[url=','][/url]')"         onMouseover="ddrivetip('<CENTER><font color=white>Link</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -160px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<a href="javascript: insertBBcode('message','[player]','[/player]')"   onMouseover="ddrivetip('<CENTER><font color=white>Jucator</font></CENTER>','red', 70)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -80px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<a href="javascript: insertBBcode('message','[ally]','[/ally]')"       onMouseover="ddrivetip('<CENTER><font color=white>Trib</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -100px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<a href="javascript: insertBBcode('message','[village]','[/village]')" onMouseover="ddrivetip('<CENTER><font color=white>Sat</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -120px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<a href="javascript: insertBBcode('message','[report]','[/report]')" onMouseover="ddrivetip('<CENTER><font color=white>Raport</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -240px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<textarea cols=30 rows=10 id="message" name=body></textarea></td></tr>
<tr><td colspan=2 align=center><input type=submit value=OK /></td></tr>
</table>
</form>
	{php}
	}elseif($action=="post"){
	$id = $_GET["id"];
	$v1 = mysql_fetch_array(mysql_query("SELECT userid FROM villages WHERE id=$_GET[village]"));
	$v2 = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = $v1[userid]"));
	$v3 = mysql_query("SELECT * FROM post WHERE id=$_GET[id] AND prima='y'");
	$v4 = mysql_num_rows($v3);
	if($v4==0)
$error = "yes";
$v5 = mysql_fetch_array($v3);
$v6 = mysql_num_rows(mysql_query("SELECT * FROM forum WHERE id='$v5[forum]' AND trib=$v2[ally]"));
if($v6==0)
$error = "yes";
if($error=="yes"){
header("Location: game.php");
}
$user = mysql_fetch_array(mysql_query("SELECT id,username FROm users WHERE id=$v5[user]"));
$autor = "<a href=\"game.php?village=$_GET[village]&screen=info_player&id=$v5[user]\">$user[username]</a>";
$user1 = mysql_fetch_array(mysql_query("SELECT userid FROM villages WHERE id=$_GET[village]"));
$user1 = mysql_fetch_array(mysql_query("SELECT id,ally_lead FROM users WHERE id=$user1[userid]"));
if($user1["ally_lead"]!=1&&$user[id]!=$user1[id]){
}else{
$edit = "<small>[<a href=\"game.php?village=$_GET[village]&screen=ally&mode=forum&action=editpost&pid=$v5[id]\">Editeaza</a>]</small>";}
//READ
$r1 = mysql_num_rows(mysql_query("SELECT id fROm `read` WHERE post=$v5[id] AND user=$v2[id]"));
if($r1==0){
mysql_query("INSERT INTO `read` SET post=$v5[id], user=$v2[id],time=".date("YmdHi")."");
}elseif($r1==1){
$r2 = mysql_num_rows(mysql_query("SELECT id fROm `read` WHERE post=$v5[id] AND user=$v2[id] AND time>=$v5[time]"));
if($r2==1){
}else{
mysql_query("UPDATE `read` SET time=".date("YmdHi")." WHERE post=$v5[id] AND user=$v2[id]");
}
}
	{/php}
	<table width=800 class=vis><tr>
<td>
<h2>{php}print $v5["name"];{/php}</h2></td></tr>
<tr>
<Td align=center>

{php}

$limit=15;// Number of records per page
$nume=mysql_num_rows(mysql_query("select * from post WHERE prima='n' AND prid=$v5[id]"));
$dir = $_GET["page"];
$eu = $_GET["page"]*$limit;
$pages = ceil($nume / $limit);
if($eu < 0){$eu=0;}
$endrecord =$eu+$limit;

$t=mysql_query("select * from post WHERE prima='n' AND prid=$v5[id] ORDER BY time ASC limit $eu,$limit");

if($dir!=0){
$page1 = "<table align=right height=30 ><tr><td align=center><a href=\"?village=$_GET[village]&screen=ally&mode=forum&action=post&id=$_GET[id]&page=".($dir-1)."\"><small><<</small>";
}else{
$page1 = "<table align=right height=30 ><tr><td align=center><small><<</small>";
}
if($dir!=($pages-1)){
$page2 = "<a href=\"?village=$_GET[village]&screen=ally&mode=forum&action=post&id=$_GET[id]&page=".($dir+1)."\"><small>>></small></td></tr></table>";
}else{
$page2 = "<small>>></small></td></tr></table>";
}
//paging
	if ($nume) {
		$pagerarr = array();
		for ($i = 0; $i < $pages; $i++) {

			$start = $i * $rpp + 1;
			$end = $start + $rpp - 1;
			if ($end > $count)
				$end = $count;

			 $text = $i+1;
			 
if($i>2 && $i <($dir-1)){
			 if(!$x)
				   $pagerarr[] = "<td align=center>...</td>";
				   $x = 1;
				   continue;
}
elseif($i>=($dir+2)&&$i<=($pages-4)){
			 if(!$tra)
				   $pagerarr[] = "<td align=center>...</td>";
				   $tra = 1;
				   continue;
}else{
			if ($i != $dir){
				$pagerarr[] = " <A href=\"?village=$_GET[village]&screen=ally&mode=forum&action=post&id=$_GET[id]&page=".($i)."\" >$text</a> ";
			}else
				$pagerarr[] = " <font color=red><b>$text</b></font> ";
}
				  }
		$pagerstr = join("", $pagerarr);
		$pagertop = "$page1 $pagerstr $page2 <br/>";
	}
	if($pages!=1){
	print $pagertop;
//paging
}
if($_GET["page"]==0){{/php}
<input type=hidden value="{php}print $v5[body];{/php}" id="text_{php}print $v5[id];{/php}" />
<input type=hidden value="{php}print $user[username];{/php}" id="user_{php}print $v5[id];{/php}" />

<table class=vis width=800><tr><th>{php}print $autor." <small>$v5[date]</small> $edit";{/php} <small>[<a href=# onclick="citat('{php}print $v5[id];{/php}');">Citeaza</a>]</small></th>
</tr>
<tr><td align=left>
{php}

 print bbcode(nl2br(str_replace("  ","&nbsp;&nbsp;",str_replace("<","&lt;",$v5[body]))));{/php}

</td></tr></table><Br/>
{php}}
while($fetch = mysql_fetch_array($t)){
$user1 = mysql_fetch_array(mysql_query("SELECT id,username FROm users WHERE id=$fetch[user]"));
$autor1 = "<a href=\"game.php?village=$_GET[village]&screen=info_player&id=$v5[user]\">$user1[username]</a>";
session_start();
$_SESSION["vill"] = $_GET["village"];

$user = mysql_fetch_array(mysql_query("SELECT id,userid FROM villages WHERE id=$_GET[village]"));
$user = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id=$user[userid]"));
if($user["ally_lead"]!=1&&$user[id]!=$user1[id]){
}else{
$del = "[<a href=\"tribul.php?action=delpost&pid=$fetch[id]\">Sterge</a>]";
$edit = "[<a href=\"game.php?village=$_GET[village]&screen=ally&mode=forum&action=editpost&pid=$fetch[id]\">Editeaza</a>]";
}
{/php}
<input type=hidden value="{php}print $fetch[body];{/php}" id="text_{php}print $fetch[id];{/php}" />
<input type=hidden value="{php}print $user[username];{/php}" id="user_{php}print $fetch[id];{/php}" />

<table class=vis width=800><tr><th>{php}print $autor1." <small>$fetch[date] $del $edit</small>";{/php} <small>[<a href=# onclick="citat('{php}print $fetch[id];{/php}');">Citat</a>]</small></th>
</tr>
<tr><td align=left>
{php} print bbcode(nl2br(str_replace("  ","&nbsp;&nbsp;",str_replace("<","&lt;",$fetch[body]))));{/php}

</td></tr></table><Br/>
{php}
}

	if($pages!=1){
	print $pagertop;
//paging
}
session_start();
$_SESSION["id"] = $_GET["id"];

$_SESSION["village"] = $_GET["village"];
{/php}

<table>
{php}if($v5["block"]=="n"){{/php}
<form method=post action="tribul.php?action=add">
<Table align=center width=500><tr><th>Raspunde</th></tr><tr><td align=center>

<script src="tool.js" type="text/javascript"></script>
<script src="tool.js" type="text/javascript"></script>
<a href="javascript: insertBBcode('message','[b]','[/b]')"             onMouseover="ddrivetip('<CENTER><font color=white>Bold</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a> 
<a href="javascript: insertBBcode('message','[i]','[/i]')"             onMouseover="ddrivetip('<CENTER><font color=white>Cursiv</font></CENTER>','red', 60)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -20px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a> 
<a href="javascript: insertBBcode('message','[u]','[/u]')"             onMouseover="ddrivetip('<CENTER><font color=white>Subliniat</font></CENTER>','red', 80)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -40px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a> 
<a href="javascript: insertBBcode('message','[citat]','[/citat]')"     onMouseover="ddrivetip('<CENTER><font color=white>Citat</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -140px 0px; padding-left; 0px; padding-bottom: 0px; margin-right: 4px; width: 20px; height: 20px;"></div></a> 
<a href="javascript: insertBBcode('message','[url=','][/url]')"         onMouseover="ddrivetip('<CENTER><font color=white>Link</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -160px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<a href="javascript: insertBBcode('message','[player]','[/player]')"   onMouseover="ddrivetip('<CENTER><font color=white>Jucator</font></CENTER>','red', 70)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -80px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<a href="javascript: insertBBcode('message','[ally]','[/ally]')"       onMouseover="ddrivetip('<CENTER><font color=white>Trib</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -100px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<a href="javascript: insertBBcode('message','[village]','[/village]')" onMouseover="ddrivetip('<CENTER><font color=white>Sat</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -120px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<a href="javascript: insertBBcode('message','[report]','[/report]')" onMouseover="ddrivetip('<CENTER><font color=white>Raport</font></CENTER>','red', 40)"; onMouseout="hideddrivetip()"><div style="float: left; background:url(/ro7/graphic/bbcodes/bbcodes.png) no-repeat -240px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px"></div></a>
<br/><textarea cols="60" rows="10" name="body" id ="message"></textarea></td></tr>
<tr><td colspan=2 align=center><input type=submit value=OK /></td></tr></table>
</form>
{php}}
{/php}
</td></tr>
</table>

</td></tr>
</table>
	{php}
	}elseif($action=="admin"){
{/php}
	{if $user.ally_lead==0 && $user.ally_found==0}
	{php}
	header("Location: /game.php");
	{/php}
	{/if}
{php}
$user = mysql_fetch_array(mysql_query("SELECT userid FROM villages WHERE id=$_GET[village]"));
$user = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id=$user[userid]"));
$q = mysql_query("SELECT * FROm forum WHERE trib=$user[ally]");

{/php}
		<table width=800 class=vis><tr>
<td>
<h2>Administreaza Forumurile</h2></td></tr>
<tr>
<Td align=center>
<table width=500><tr>
<th>Numele</th>
<th>Redenumeste</th>
<th>Sterge</th>
</tr>
{php}
session_start();
$_SESSION["village"]=$_GET["village"];
while($q1 = mysql_fetch_array($q)){
{/php}
<tr>
<td>{php}print $q1[name];{/php}</td>
<td><form method=post action="tribul.php?action=rename&id={php}print $q1[id]{/php}"><input type=text name=name value="{php}print $q1[name];{/php}" /><input type=submit value=OK /></form></td>
<td><form method=post action="tribul.php?action=deltop&id={php}print $q1[id]{/php}"><input type=submit value=Sterge /></form></td>

</tr>
{php}}{/php}
</table>
<br/><br/>

<table width=300><tr>
<th>Creaza Forum Nou</th>
</tr>
<tr>
<td align=center><form method=post action="tribul.php?action=addtop"><input type=text name=name value="" /><input type=submit value=Adauga /></form></td>
</tr>
</table>
</td></tr></table>
{php}
	}elseif($action=="editpost"){
$id = mysql_real_escape_string($_GET["pid"]);
$village = $_GET["village"];
$user = mysql_fetch_array(mysql_query("SELECT userid FROM villages WHERE id=$village"));
$user = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id=$user[userid]"));
$z = mysql_query("SELECT * FROM post WHERE id=$id");
if($user["ally_lead"]!=1){
$num = mysql_num_rows(mysql_query("SELECT id FROM post WHERE user=$user[id] AND id=$id"));
if($num==0)
$error = true;
}else{
$num = mysql_num_rows($z);
if($num==0)
$error = true;
$forum = mysql_fetch_array($z);
$forum2 = mysql_num_rows(mysql_query("SELECT id FROm forum WHERE id=$forum[forum] AND trib=$user[ally]"));
if($forum2==0)
$error = true;
}
if($error){
$name = "game.php?village=$village&screen=ally&mode=forum&action=forum&error=Eroare";
header("Location: $name");die();}
$forum = mysql_fetch_array(mysql_query("SELECT * FROM post WHERE id=$id"));
{/php}
<form method=post action="tribul.php?action=editpost&id={php}print $forum[id];{/php}">
<table align=center width=300 class=vis><tr><th>Editeaza Mesajul</th></tr><tr><Td align=center>

{php}if($forum["prima"]=="y"){{/php}
<input type=text name=name value="{php}print $forum[name];{/php}" /><br/><br/>
{php}}{/php}
<textarea cols=30 rows=5 name=body>{php}print $forum[body];{/php}</textarea>
{php}if($forum["prima"]=="y"){{/php}
	{if $user.ally_lead==1 || $user.ally_found==1}
	{php}
	if($forum["first"]=="y"){
	$c = "checked";
	}else{
	$c = "";
	}
		if($forum["block"]=="y"){
	$b = "checked";
	}else{
	$b = "";
	}
	{/php}
<Br/><b>Important: </b><input type=checkbox name=first {php}print $c;{/php}/> <b>Blocat: </b><input type=checkbox name=block {php}print $b;{/php}/>
	{/if}{php}}{/php}
</td></tr><tr><Td colspan=2 align=center><input type=submit value=Redacteaza /></table></form>
{php}
	}
	{/php}