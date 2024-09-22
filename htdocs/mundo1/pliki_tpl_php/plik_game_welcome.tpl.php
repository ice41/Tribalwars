<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2022-11-30 20:20:46
         Wersja PHP pliku pliki_tpl/game_welcome.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_welcome.tpl', 12, false),)), $this); ?>
	                                <div id="welcome-page" class="clearfix">
	<div class="col">
		<div class="row" id="welcome-back">
			<h4>
	Bem vindo de volta, <?php echo $this->_tpl_vars['user']['username']; ?>
 	<a style="float: right" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;id=<?php echo $this->_tpl_vars['user']['id']; ?>
&amp;screen=info_player">Perfil</a>
</h4>
<ul class="welcome-list">
	<li class="list-item a">
		<span class="list-left">
			Ranking:		</span>
		<span class="list-right">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['rang'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
		</span>
	</li>
	<li class="list-item b">
		<span class="list-left">
			Aldeias:		</span>
		<span class="list-right">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['villages'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
		</span>
	</li>
	<li class="list-item a">
		<span class="list-left">
			Pontos:		</span>
		<span class="list-right">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
		</span>
	</li>	<li class="list-item b">		<span class="list-left">			Pontos premium:		</span>		<span class="list-right">			<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['premium_p'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
		</span>	</li>	<li class="list-item a">		<span class="list-left">			Sua identidade deste mundo:		</span>		<span class="list-right">			<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['id'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
		</span>	</li>	<li class="list-item b">		<span class="list-left">			Seu código de jogo:		</span>         		<span class="list-right">			<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['tw_id'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
		</span>	</li>
</ul>

		</div>
				<div class="row" id="checklist">
			<h4>Lista</h4>

<ul class="welcome-list">
	<li class="list-item b">
		<span class="list-left">
						Confirme seu endereço de e-mail?					</span>
		<span class="list-right">
			<img src="/ds_graphic/confirm.png?f058b" alt="">		</span>
	</li>
	<li class="list-item a">
		<span class="list-left">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=support" target="_blank">Experimentar o nosso  suporte</a>
					</span>
		<span class="list-right">
					</span>
	</li>

	</ul>

		</div>
			<div class="row" id="stats">
			<h4>O jogador mais novo no mundo <?php echo $this->_tpl_vars['serwerid']; ?>
</h4>

<ul class="widget-tabs">
	
	<center><b>O mais novo jogador é <?php 

	$query['big_arr'] = mysql_query("SELECT * FROM `users` ORDER BY start_gaming DESC LIMIT 1");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
	$use[$og_info['id']]['username'] = urldecode($og_info['username']);
	$use[$og_info['id']]['id'] = urldecode($og_info['id']);
		}		
		$this->_tpl_vars['us'] = $use;
		 ?>
		<?php $_from = $this->_tpl_vars['us']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['u']):
?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['u']['id']; ?>
"><?php echo $this->_tpl_vars['u']['username']; ?>
</a> <?php endforeach; endif; unset($_from); ?></b></center>	
	</ul>

<div class="widget-content">
		<div style="background:#F4E4BC;padding: 8px 8px 0 0">
		<div id="chartdiv" style="height:250px"></div>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
<?php 

	$query['big_arr'] = mysql_query("SELECT * FROM `gracze` ORDER BY time DESC LIMIT 58");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
	$gra[$og_info['id']]['ilosc'] = urldecode($og_info['ilosc']);
	$gra[$og_info['id']]['time'] = urldecode($og_info['time']);
		}		
		$this->_tpl_vars['gracze'] = $gra;
		 ?>
var StatsWidget = {
	// graph data assoc
	stats: {"player_points":[<?php $_from = $this->_tpl_vars['gracze']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['gr']):
?>["<?php echo $this->_tpl_vars['gr']['time']; ?>
000","<?php echo $this->_tpl_vars['gr']['ilosc']; ?>
"],<?php endforeach; endif; unset($_from); ?>]},

	// chart div - canvas
	chartdiv: $("#chartdiv"),

	// currently shown graph data
	current: null,

	// previous tooltip position
	previousPoint: null,

	// plot settings
	settings: {
		xaxis: {
			mode: "time",
			timeformat: "%0m/%0d",
			twelveHourClock: false,
			ticks: 5,
			tickLength: 0 // remove vertical grid lines
		},
		yaxis: {
			minTickSize: 1,
			tickDecimals: 0
		},
		grid: {
			hoverable: true,
			autoHighlight: true,
			backgroundColor: "#F4E4BC"
		}
	},

	settings_line: {
		lines : {
			show : true,
			fill : false
		},
		points: {
			show: false,
			radius: 1,
			fill: true
		}
	},

	settings_bar: {
		bars : {
			show : true,
			barWidth:  24 * 60 * 60 * 1000, // one day
			align: "center"
		}
	},

	init: function() {
		UI.ToolTip('.tooltip');

		// bind events - type is mapping between clientside and server transmitted names in this.stats
		$("#player_points")  .click({ type: "player_points"},   this.switchGraph);
		$("#player_villages").click({ type: "player_villages"}, this.switchGraph);
				$("#ally_points")    .click({ type: "ally_points"},     this.switchGraph);
						$("#looted_res")     .click({ type: "looted_res"},      this.switchGraph);
						$("#enemy_units")    .click({ type: "enemy_units"},     this.switchGraph);
		
		this.current = "player_points";

		// tickformatter can not be assigned in declaration
		this.settings.yaxis.tickFormatter = this.tickFormatter;

		// bind point hovers
		this.chartdiv.bind("plothover", this.plothover);
		StatsWidget.plot();
	},


	/**
	 * plot graph
	 */
	plot: function () {
		switch (this.current) {
			case "looted_res":
			case "enemy_units":
				this.settings.series = this.settings_bar;
				this.settings.yaxis.min = 0;
				break;
			default:
				this.settings.series = this.settings_line;
				if(this.settings.yaxis.hasOwnProperty('min')) {
					delete this.settings.yaxis.min;
				}
		}

		$['plot'](this.chartdiv, [{ data: this.stats[this.current], color:'<?php echo $this->_tpl_vars['powitalna']['kolor']; ?>
'}], this.settings);
	},


	/**
	 * switching graph data and redraw
	 */
	switchGraph: function(event) {
		event.preventDefault();

		$('#stats').find('.widget-tabs > li > a').removeClass('selected');
		$('#' + event.data.type).addClass('selected');

		StatsWidget.current = event.data.type;
		StatsWidget.plot();
	},


	/**
	 * tooltip event bind
	 */
	plothover: function (event, pos, item) {
		$("#x").text(pos.x);
		$("#y").text(pos.y);

		if (item) {
			if (StatsWidget.previousPoint !== item.dataIndex) {
				StatsWidget.previousPoint = item.dataIndex;

				$("#tooltip_graph").remove();
				var timestamp = item.datapoint[0],
					value     = item.datapoint[1];

				StatsWidget.showTooltip(item.pageX, item.pageY, timestamp, value);
			}
		}
		else {
			$("#tooltip_graph").remove();
			StatsWidget.previousPoint = null;
		}
	},


	/**
	 * tooltip display - triggered by plot event
	 */
	showTooltip: function (x, y, timestamp, value) {
		var date = new Date(timestamp);
		var tooltipContent =
			'<div class="warstats_popup_date">'+date.toLocaleDateString()+' '+date.toLocaleTimeString()+'</div>'+
			'<div>Número de jogadores: '+number_format(value, ".")+'</div>';

		$('<span id="tooltip_graph" class="tooltip-style">' + tooltipContent + '</span>').css( {
			position: 'absolute',
			display: 'none',
			top: y - 20,
			left: x + 13,
			border: '1px solid',
			padding: '2px',
			opacity: 0.90,
			'min-width': '0'
		}).appendTo("body").fadeIn(200);
	},

	/**
	 * formatter for y ticks
	 */
	tickFormatter: function(value) {
		if (value >= 1e7) {
			value /= 1e6;
			return (Math.round(value * 100) / 100) + ' M ';
		}
		if (value >= 1e4) {
			value /= 1e3;
			return (Math.round(value * 100) / 100) + ' K ';
		}

		return value;
	}
};

$(window).load(function() {
	StatsWidget.init();
})
//]]>
</script>



		</div>
	</div>
	<div class="col">
		<div class="row" id="news">
					<h4>Dica da semana</h4>
	<div class="widget-content">
	<p><img src="<?php echo $this->_tpl_vars['powitalna']['wsk_tyg_img']; ?>
" alt=""><?php echo $this->_tpl_vars['powitalna']['wsk_tyg_text']; ?>
</p>
	</div>
	
		</div>

		
				<div class="row" id="tribe-activity">
			<h4>atividade de tribo</h4>

	<?php if ($this->_tpl_vars['user']['ally'] == -1): ?><center><b>Não é membro de nenhuma tribo<?php else: ?><ul class="widget-tabs">

<?php if ($this->_tpl_vars['num_pages'] > 1): ?>
					<li><center>
							<?php unset($this->_sections['countpage']);
$this->_sections['countpage']['name'] = 'countpage';
$this->_sections['countpage']['start'] = (int)1;
$this->_sections['countpage']['loop'] = is_array($_loop=$this->_tpl_vars['num_pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['countpage']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['countpage']['show'] = true;
$this->_sections['countpage']['max'] = $this->_sections['countpage']['loop'];
if ($this->_sections['countpage']['start'] < 0)
    $this->_sections['countpage']['start'] = max($this->_sections['countpage']['step'] > 0 ? 0 : -1, $this->_sections['countpage']['loop'] + $this->_sections['countpage']['start']);
else
    $this->_sections['countpage']['start'] = min($this->_sections['countpage']['start'], $this->_sections['countpage']['step'] > 0 ? $this->_sections['countpage']['loop'] : $this->_sections['countpage']['loop']-1);
if ($this->_sections['countpage']['show']) {
    $this->_sections['countpage']['total'] = min(ceil(($this->_sections['countpage']['step'] > 0 ? $this->_sections['countpage']['loop'] - $this->_sections['countpage']['start'] : $this->_sections['countpage']['start']+1)/abs($this->_sections['countpage']['step'])), $this->_sections['countpage']['max']);
    if ($this->_sections['countpage']['total'] == 0)
        $this->_sections['countpage']['show'] = false;
} else
    $this->_sections['countpage']['total'] = 0;
if ($this->_sections['countpage']['show']):

            for ($this->_sections['countpage']['index'] = $this->_sections['countpage']['start'], $this->_sections['countpage']['iteration'] = 1;
                 $this->_sections['countpage']['iteration'] <= $this->_sections['countpage']['total'];
                 $this->_sections['countpage']['index'] += $this->_sections['countpage']['step'], $this->_sections['countpage']['iteration']++):
$this->_sections['countpage']['rownum'] = $this->_sections['countpage']['iteration'];
$this->_sections['countpage']['index_prev'] = $this->_sections['countpage']['index'] - $this->_sections['countpage']['step'];
$this->_sections['countpage']['index_next'] = $this->_sections['countpage']['index'] + $this->_sections['countpage']['step'];
$this->_sections['countpage']['first']      = ($this->_sections['countpage']['iteration'] == 1);
$this->_sections['countpage']['last']       = ($this->_sections['countpage']['iteration'] == $this->_sections['countpage']['total']);
?>
			
	<li>								<a id="tab_all"<?php if ($this->_tpl_vars['site'] == $this->_sections['countpage']['index']): ?>
 class="selected"<?php endif; ?>href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=welcome&amp;site=<?php echo $this->_sections['countpage']['index']; ?>
"> [<?php echo $this->_sections['countpage']['index']; ?>
] </a>
</li>															<?php endfor; endif; ?>
						</center></li>				<?php endif; ?>



		
	</ul>

					

		<div class="widget-content" style="padding: 2px">
								<div id="all" style="">
				<table class="vis" width="100%">
																						<tbody><?php $_from = $this->_tpl_vars['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?> 
																							<?php 
	$id++;
			if($id % 2 == 0) $styl = "row_a"; else $styl="row_b";
			 ?>
							<tr class="<?php  echo $styl; ?>">
							<td style="text-align: center"><?php echo $this->_tpl_vars['arr']['time']; ?>
</td><td><?php echo $this->_tpl_vars['pl']->compile_ally_events($this->_tpl_vars['arr']['message']); ?>
</td>
						</tr>
						 

															<tr class="event_hidden row_a" style="display:none">
							
						</tr>																				

																			
																																				

																																			

					<?php endforeach; endif; unset($_from); ?>																						</tbody></table><?php endif; ?>
			</div>
			</div>
	


	
		</div>
			</div>
	<div id="welcome-page-footer-left">
		
	</div>
	<div id="welcome-page-footer-right">
		<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview">Ir para o jogo</a>
	</div>
</div>


	                                </td>