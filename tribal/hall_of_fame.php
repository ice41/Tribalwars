<?
$i = true;
include "head.php";
include "config.php";
if(!isset($_GET['world'])) {
$world = 1;
$worlddb = "index_tw";
} else { $world = $_GET['world'];
if($world != 1) {
$worlddb = "index_tw".$world;
} else { $worlddb = "index_tw"; }
}
mysql_select_db($worlddb, $connect) or die('Erro banco de dados!');
$result = mysql_query("SELECT * FROM users ORDER BY points DESC");
?>
			<div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
					<div id="screenshot_image"></div>
				</div>
				<div class="container-block-full">
					<div class="container-top-full"></div>
					<div class="container">
						<table>
						<tr>
							<td valign="top">
								<table class="vis" style="margin:0 18px 0 12px;">
																			/								<tr>
<td   style="width:65px;"><a href="hall_of_fame.php?world=1">Mundo 1</a></td><tr>
<td   style="width:65px;"><a href="hall_of_fame.php?world=2">Mundo 2</a></td>
										</tr>
																	</table>
							</td>
							<td style="width: 650px" valign="top">
								<div class="hof-wrapper">
<div>
	<h2 class="hof-banner">Hall of Fame - Mundo <? echo $world; ?></h2>

	
	<div class="hof-top3">
				<div class="gold">
<? $i = 0; while ($row = mysql_fetch_assoc($result)) { 
if($i == 0) {
?>
<a  class="hof-medium" href=""><? echo $row['username']; ?></a>
			</div>
<? } if($i == 1) { ?>
<div class="silver"><a  class="hof-medium" href="#"><? echo $row['username']; ?></a>
			</div>
<? } if($i == 2) { ?>
<div class="bronze"><a  class="hof-large" href="#"><? echo $row['username']; ?></a>
			</div>

			</div>

			<div class="hof-best-tribe-top">
			<div class="tribe-name"><a class="
									hof-medium
								"href="#">Todos os outros jogadores</a>
			</div>
		</div>
		<div class="hof-best-tribe-body"><? } if($i > 2) { ?>
	<a href="#"><? echo $row['username']; ?></a>,
					<? } $i++; } ?>				</div>
		<div class="hof-best-tribe-bottom">
		</div>
	

	
			<div class="hof-footer">

			<!---->
		</div>
	</div>
</div>
							</td>
						</tr>
					</table>
									</div>
					<div class="container-bottom-full"></div>
				</div>
			</div><!-- content -->
<? include "foot.php"; ?>
