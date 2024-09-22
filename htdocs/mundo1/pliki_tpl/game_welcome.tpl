	                                <div id="welcome-page" class="clearfix">
	<div class="col">
		<div class="row" id="welcome-back">
			<h4>
	Bem vindo de volta, {$user.username} 	<a style="float: right" href="game.php?village={$village.id}&amp;id={$user.id}&amp;screen=info_player">Perfil</a>
</h4>
<ul class="welcome-list">
	<li class="list-item a">
		<span class="list-left">
			Ranking:		</span>
		<span class="list-right">
			{$user.rang|format_number}		</span>
	</li>
	<li class="list-item b">
		<span class="list-left">
			Aldeias:		</span>
		<span class="list-right">
			{$user.villages|format_number}		</span>
	</li>
	<li class="list-item a">
		<span class="list-left">
			Pontos:		</span>
		<span class="list-right">
			{$user.points|format_number}		</span>
	</li>	<li class="list-item b">		<span class="list-left">			Pontos premium:		</span>		<span class="list-right">			{$user.premium_p|format_number}		</span>	</li>	<li class="list-item a">		<span class="list-left">			Sua identidade deste mundo:		</span>		<span class="list-right">			{$user.id|format_number}		</span>	</li>	<li class="list-item b">		<span class="list-left">			Seu código de jogo:		</span>         		<span class="list-right">			{$user.tw_id|format_number}		</span>	</li>
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
						<a href="game.php?village={$village.id}&screen=support" target="_blank">Experimentar o nosso  suporte</a>
					</span>
		<span class="list-right">
					</span>
	</li>

	</ul>

		</div>
			<div class="row" id="stats">
			<h4>O jogador mais novo no mundo {$serwerid}</h4>

<ul class="widget-tabs">
	
	<center><b>O mais novo jogador é {php}

	$query['big_arr'] = mysql_query("SELECT * FROM `users` ORDER BY start_gaming DESC LIMIT 1");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
	$use[$og_info['id']]['username'] = urldecode($og_info['username']);
	$use[$og_info['id']]['id'] = urldecode($og_info['id']);
		}		
		$this->_tpl_vars['us'] = $use;
		{/php}
		{foreach from=$us item=u key=id}<a href="game.php?village={$village.id}&screen=info_player&id={$u.id}">{$u.username}</a> {/foreach}</b></center>	
	</ul>

<div class="widget-content">
		<div style="background:#F4E4BC;padding: 8px 8px 0 0">
		<div id="chartdiv" style="height:250px"></div>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
{php}

	$query['big_arr'] = mysql_query("SELECT * FROM `gracze` ORDER BY time DESC LIMIT 58");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
	$gra[$og_info['id']]['ilosc'] = urldecode($og_info['ilosc']);
	$gra[$og_info['id']]['time'] = urldecode($og_info['time']);
		}		
		$this->_tpl_vars['gracze'] = $gra;
		{/php}
var StatsWidget = {ldelim}
	// graph data assoc
	stats: {ldelim}"player_points":[{foreach from=$gracze item=gr key=id}["{$gr.time}000","{$gr.ilosc}"],{/foreach}]},

	// chart div - canvas
	chartdiv: $("#chartdiv"),

	// currently shown graph data
	current: null,

	// previous tooltip position
	previousPoint: null,

	// plot settings
	settings: {ldelim}
		xaxis: {ldelim}
			mode: "time",
			timeformat: "%0m/%0d",
			twelveHourClock: false,
			ticks: 5,
			tickLength: 0 // remove vertical grid lines
		},
		yaxis: {ldelim}
			minTickSize: 1,
			tickDecimals: 0
		},
		grid: {ldelim}
			hoverable: true,
			autoHighlight: true,
			backgroundColor: "#F4E4BC"
		}
	},

	settings_line: {ldelim}
		lines : {ldelim}
			show : true,
			fill : false
		},
		points: {ldelim}
			show: false,
			radius: 1,
			fill: true
		}
	},

	settings_bar: {ldelim}
		bars : {ldelim}
			show : true,
			barWidth:  24 * 60 * 60 * 1000, // one day
			align: "center"
		}
	},

	init: function() {ldelim}
		UI.ToolTip('.tooltip');

		// bind events - type is mapping between clientside and server transmitted names in this.stats
		$("#player_points")  .click({ldelim} type: "player_points"},   this.switchGraph);
		$("#player_villages").click({ldelim} type: "player_villages"}, this.switchGraph);
				$("#ally_points")    .click({ldelim} type: "ally_points"},     this.switchGraph);
						$("#looted_res")     .click({ldelim} type: "looted_res"},      this.switchGraph);
						$("#enemy_units")    .click({ldelim} type: "enemy_units"},     this.switchGraph);
		
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
	plot: function () {ldelim}
		switch (this.current) {ldelim}
			case "looted_res":
			case "enemy_units":
				this.settings.series = this.settings_bar;
				this.settings.yaxis.min = 0;
				break;
			default:
				this.settings.series = this.settings_line;
				if(this.settings.yaxis.hasOwnProperty('min')) {ldelim}
					delete this.settings.yaxis.min;
				}
		}

		$['plot'](this.chartdiv, [{ldelim} data: this.stats[this.current], color:'{$powitalna.kolor}'}], this.settings);
	},


	/**
	 * switching graph data and redraw
	 */
	switchGraph: function(event) {ldelim}
		event.preventDefault();

		$('#stats').find('.widget-tabs > li > a').removeClass('selected');
		$('#' + event.data.type).addClass('selected');

		StatsWidget.current = event.data.type;
		StatsWidget.plot();
	},


	/**
	 * tooltip event bind
	 */
	plothover: function (event, pos, item) {ldelim}
		$("#x").text(pos.x);
		$("#y").text(pos.y);

		if (item) {ldelim}
			if (StatsWidget.previousPoint !== item.dataIndex) {ldelim}
				StatsWidget.previousPoint = item.dataIndex;

				$("#tooltip_graph").remove();
				var timestamp = item.datapoint[0],
					value     = item.datapoint[1];

				StatsWidget.showTooltip(item.pageX, item.pageY, timestamp, value);
			}
		}
		else {ldelim}
			$("#tooltip_graph").remove();
			StatsWidget.previousPoint = null;
		}
	},


	/**
	 * tooltip display - triggered by plot event
	 */
	showTooltip: function (x, y, timestamp, value) {ldelim}
		var date = new Date(timestamp);
		var tooltipContent =
			'<div class="warstats_popup_date">'+date.toLocaleDateString()+' '+date.toLocaleTimeString()+'</div>'+
			'<div>Número de jogadores: '+number_format(value, ".")+'</div>';

		$('<span id="tooltip_graph" class="tooltip-style">' + tooltipContent + '</span>').css( {ldelim}
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
	tickFormatter: function(value) {ldelim}
		if (value >= 1e7) {ldelim}
			value /= 1e6;
			return (Math.round(value * 100) / 100) + ' M ';
		}
		if (value >= 1e4) {ldelim}
			value /= 1e3;
			return (Math.round(value * 100) / 100) + ' K ';
		}

		return value;
	}
};

$(window).load(function() {ldelim}
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
	<p><img src="{$powitalna.wsk_tyg_img}" alt="">{$powitalna.wsk_tyg_text}</p>
	</div>
	
		</div>

		
				<div class="row" id="tribe-activity">
			<h4>atividade de tribo</h4>

	{if $user.ally == -1}<center><b>Não é membro de nenhuma tribo{else}<ul class="widget-tabs">

{if $num_pages>1}
					<li><center>
							{section name=countpage start=1 loop=$num_pages+1 step=1}
			
	<li>								<a id="tab_all"{if $site==$smarty.section.countpage.index}
 class="selected"{/if}href="game.php?village={$village.id}&amp;screen=welcome&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
</li>															{/section}
						</center></li>				{/if}



		
	</ul>

					

		<div class="widget-content" style="padding: 2px">
								<div id="all" style="">
				<table class="vis" width="100%">
																						<tbody>{foreach from=$events item=arr key=id} 
																							{php}
	$id++;
			if($id % 2 == 0) $styl = "row_a"; else $styl="row_b";
			{/php}
							<tr class="{php} echo $styl;{/php}">
							<td style="text-align: center">{$arr.time}</td><td>{$pl->compile_ally_events($arr.message)}</td>
						</tr>
						 

															<tr class="event_hidden row_a" style="display:none">
							
						</tr>																				

																			
																																				

																																			

					{/foreach}																						</tbody></table>{/if}
			</div>
			</div>
	


	
		</div>
			</div>
	<div id="welcome-page-footer-left">
		
	</div>
	<div id="welcome-page-footer-right">
		<a href="game.php?village={$village.id}&amp;screen=overview">Ir para o jogo</a>
	</div>
</div>


	                                </td>