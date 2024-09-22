<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Submenu</th></tr>
		<tr><td {if $mode==''}class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=train">{if $mode==''}&raquo; {/if}Recrutar</a></td></tr>
		<tr><td {if $mode=='mass'}class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">{if $mode=='mass'}&raquo; {/if}Recrutamento em massa</a></td></tr>
	</table><br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Centros de recrutamento</th></tr>
		<tr><td><a href="game.php?village={$village.id}&amp;screen=barracks">Quartel</a></td></tr>
		<tr><td><a href="game.php?village={$village.id}&amp;screen=stable">Est&aacute;bulo</a></td></tr>
		<tr><td><a href="game.php?village={$village.id}&amp;screen=garage">Oficina</a></td></tr>
		<tr><td><a href="game.php?village={$village.id}&amp;screen=snob">Academia</a></td></tr>
	</table>
</td>
<td width="80%">
{if $get.action=="train_mass" AND $recruited!=array()}
<table>
	<tr>
		<td><img src="../graphic/build/barracks.jpg" title="Quartel" alt="" /></td>
		<td>
			<h2>Recrutar em massa</h2>
			Nesta visualiza&ccedil;&atilde;o voc&ecirc; pode produzir qualquer tipo de unidade, desde que todos os requerimentos de tais unidades tenham sido preenchidos (edf&iacute;cios e tecnologias).
		</td>
	</tr>
</table>
<b>&raquo; Voc&ecirc; ordenou os seguintes recrutamentos:</b>
<table class="vis" width="50%">
	<tbody>
		<tr>
			<th>Aldeia</th>
			<th>Unidade</th>
		</tr>
		{foreach from=$recruited key=current_village item=single_recruit}
{php}
	//Fetching information about village
	$this->_tpl_vars['cur_vil_info']=$GLOBALS['db']->fetch($GLOBALS['db']->query("SELECT * FROM `villages` WHERE `id`='".$this->_tpl_vars['current_village']."'"));
{/php}
		<tr>
			<td><a href="game.php?village=395&amp;screen=info_village&amp;id={$cur_vil_info.id}">{$cur_vil_info.name|urldecode} ({$cur_vil_info.x}|{$cur_vil_info.y}) K{$cur_vil_info.continent}</a></td>
			<td>
			{foreach from=$single_recruit key=single_unit item=single_count}
				<img class="img" alt="" title="{$cl_units->get_name($single_unit)}" src="{$image_base}/unit/unit_{$cl_units->get_graphicName($single_unit)}.png" /> {$single_count} &nbsp;
			{/foreach}
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>
<table class="vis"><tr><td><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">&laquo; Voltar</a></td></tr></table>
{else}
{ * Javascript * }
<script type='text/javascript'>
	{if $get.mode=="mass"}
	{literal}
    	var trainManagers=new Array();
	{/literal}
	{/if}
	{literal}
    	function trainManager(){
		//IMPORT THINGS (MASS RECRUIT)
			this.arrc=0; //Array Count
			this.village=false;
			//Ressis of Village
			this.v_wood=0;
			this.v_stone=0;
        this.v_iron=0;
          //etc...
        this.name=new Array();    //Names of Elements
        this.wood=new Array();    //Woodprice
        this.iron=new Array();    //Ironprice
        this.stone=new Array();   //Stoneprice
        this.bh=new Array(); //Bhprice
        this.arrc=0;
        this.freebh=0; //The free BH Places
       //Pricemanagment
    this.price=new Array();            //Additional Price ; See Code :D
    //Already given Things...
    this.price["wood"]=new Array();
    this.price["iron"]=new Array();
   this.price["stone"]=new Array();
   this.price["bh"]=new Array();
      //END
              //Functions
    	this.setNumber=function (name,count)
        {
            if(!this.village) var element=document.getElementsByName(name);
            else var element=document.getElementsByName("units["+this.village+"]["+name+"]");
            if(!element[0].value||element[0].value=="") element[0].value=0;
            element[0].value=Number(parseInt(element[0].value))+Number(count);
        }; 
        this.setVillage=function(setvil){
			this.village=setvil;
        };
    this.addUnit=function (name,wood,iron,stone,bh)
        {
            this.name[this.arrc]=name;
            this.wood[this.arrc]=wood;
            this.iron[this.arrc]=iron;
           this.stone[this.arrc]=stone;
           this.bh[this.arrc]=bh;
           //Wood;Iron;Stone;Bh
           this.price["wood"][this.arrc]=0;
           this.price["iron"][this.arrc]=0;
           this.price["stone"][this.arrc]=0;
           this.price["bh"][this.arrc]=0;
           //Next Id
           this.arrc++;
        };
        //Remote Imports
    this.setBh=function (bh)
    {
        this.freebh=bh;
    };
    // @TODO: Make Dynamic Ress "Fetching"
    this.setRessis=function(wood,iron,stone)
    {
		this.v_wood=wood;
		this.v_iron=iron;
		this.v_stone=stone;
    }

      //Get the Used Ressis
    this.getUsedRess=function (name){
        var out=0;
        for(var c=0;c<this.arrc;c++)
            {
                if(name=="wood") out+=this.price['wood'][c]; else
                if(name=="iron") out+=this.price['iron'][c]; else
                if(name=="stone") out+=this.price['stone'][c]; else
                if(name=="bh") out+=this.price['bh'][c];
            }
        return out;
    };
    this.reCalcAll=function(){
        for(var c=0;c<this.arrc;c++)
            {
                this.reCalc(this.name[c]);
            }
    };
    this.tick=function()
    {
        this.reCalcAll();
    };
    this.reCalc=function (name)
        {
               //Fetching Form_Fields
            if(!this.village) var max=document.getElementsByName(name);
            else var max=document.getElementsByName('units['+this.village+']['+name+']');
            var max=parseInt(max[0].value);
               //Handler
            if(!max) max=0;
              //Get Price
            var id=0;
            for(var tid=0;tid<this.arrc;tid++)           //Tid=Testid
              {
                if(this.name[tid]==name) { id=tid; break; }
              }
            //Cost per 1
            var wood=this.wood[id];
            var iron=this.iron[id];
           var stone=this.stone[id];
           var bh=this.bh[id];
           // wtf.!? var village=false; // For Massrecruit (Contains id... (of Village))
           //Available Ressis
           var c_wood=this.v_wood;
           var c_iron=this.v_iron;
           var cstone=this.v_stone;
           //Bonusthings
           var bonus_wood=max*wood;
           var bonus_iron=max*iron;
           var bonus_stone=max*stone;
           var bonus_bh=max*bh;
           
            if(!this.village) var link=document.getElementById(name+"_0_a");
           else var link=document.getElementById(name+"_"+this.village+"_a");
           
                                //Save needed Ressis 
           this.price["wood"][id]=bonus_wood;
           this.price["iron"][id]=bonus_iron;
           this.price["stone"][id]=bonus_stone;
           this.price["bh"][id]=bonus_bh;
           
           
           //Calc
           var calc_wood=(c_wood-this.getUsedRess("wood"))/wood;
           var calc_iron=(c_iron-this.getUsedRess("iron"))/iron;
          var calc_stone=(cstone-this.getUsedRess("stone"))/stone;
          var calc_bh=(this.freebh-this.getUsedRess("bh"))/bh;
          //Save & Set it
          var new_value=Math.floor(Math.min(calc_wood,calc_iron,calc_stone,calc_bh));
          if(!isNaN(new_value)&&new_value>=0)
          {
                        {/literal}
                        {if $get.mode=="mass"}
                        link.href='javascript:trainManagers['+this.village+'].setNumber("'+name+'","'+new_value+'")';
                        {else}
                        link.href='javascript:trainManager.setNumber("'+name+'","'+new_value+'")';
                        {/if}
                        {literal}
              //For Massrecruit
              {/literal}
            		{if $get.mode=="mass"}
			new_value="("+new_value+")";
            		{/if}
              {literal} 
            //End
          link.firstChild.wholeText=new_value;
          link.firstChild.nodeValue=new_value;
          }else if(new_value<0) {
              //For Massrecruit
              {/literal}
            		{if $get.mode=="mass"}
			new_value="("+new_value+")";
            		{/if}
              {literal} 
            //End
          link.firstChild.wholeText=0;
          link.firstChild.nodeValue=0;
          link.href='javascript:trainManager.setNumber("'+name+'","0")';
          }
        };
    };
{/literal}
</script>
	{if $get.mode!="mass"}
	{* Initial Village & get Infos about *}
{php}
	$tmp=new getvillagedata();
	$this->_tpl_vars['cur_vil_inf']=$tmp->getbyid($this->_tpl_vars['village']['id'],array("farm","r_bh","r_wood","r_iron","r_stone"));
    $tmp_farm=$this->_tpl_vars['cur_vil_inf']['farm'];
    $this->_tpl_vars['cur_vil_inf']['farmLimits']=$this->_tpl_vars['arr_farm'][$tmp_farm]-$this->_tpl_vars['cur_vil_inf']['r_bh'];
{/php}   
<script type="text/javascript">    
    trainManager=new trainManager;
	trainManager.setBh({$cur_vil_inf.farmLimits});
	trainManager.setRessis({$cur_vil_inf.r_wood},{$cur_vil_inf.r_iron},{$cur_vil_inf.r_stone});
</script>                             	                                
<table width="100%">
	<tr>
		<td><img src="../graphic/build/barracks.jpg" title="Quartel" alt="" /></td>
		<td>
			<h2>Recrutar</h2>
			Nesta visualiza&ccedil;&atilde;o voc&ecirc; pode produzir qualquer tipo de unidade, desde que todos os requerimentos de tais unidades tenham sido preenchidos (edf&iacute;cios e tecnologias).
		</td>
	</tr>
</table><br />
		{if count($recruit_units)>0}
<table class="vis" width="100%">
	<tr>
		<th width="150">Unidade</th>
		<th width="120">Dura&ccedil;&atilde;o</th>
		<th width="150">T&eacute;rmino</th>
		<th width="100">Cancelar *</th>
	</tr>
			{foreach from=$recruit_units key=key item=value}
    <tr {if $recruit_units.$key.lit}class="lit"{/if}>
		<td>{$recruit_units.$key.num_unit} {$cl_units->get_name($recruit_units.$key.unit)}</td>
					{if $recruit_units.$key.lit && $recruit_units.$key.countdown>-1}
		<td><span class="timer">{$recruit_units.$key.countdown+1|format_time}</span></td>
					{else}
	   	<td>{$recruit_units.$key.countdown+1|format_time}</td>
					{/if}
		<td>{$recruit_units.$key.time_finished|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=train&amp;action=cancel&amp;id={$key}&amp;h={$hkey}">cancelar</a></td>
    </tr>
			{/foreach}
</table>
<div style="font-size: 7pt;">* (Apenas 90% dos recursos ser&atilde;o devolvidos!)</div><br />
		{/if}
		{if !empty($error)}
<div class="error">{$error}</div>
		{/if}
<form action="game.php?village={$village.id}&screen=train&action=train&h={$hkey}" id="train_form" method="post">
	<table class="vis" width="100%">
		<tr>
			<th width="200">Unidade</th>
			<th><center><img src="../graphic/icons/wood.png"></center></th>
			<th><center><img src="../graphic/icons/stone.png"></center></th>
			<th><center><img src="../graphic/icons/iron.png"></center></th>
			<th><center><img src="../graphic/icons/farm.png"></center></th>
			<th class="nowrap" width="120">Dura&ccedil;&atilde;o</th>
			<th class="nowrap">Recrutar</th>
			<th>Recrutar</th>
		</tr>
		{foreach from=$units item=currentunit}
			{$cl_units->check_needed($currentunit,$village)}
			{if is_numeric($cl_units->last_error)}
		<script type="text/javascript">
			trainManager.addUnit('{$currentunit}',{$cl_units->get_woodprice($currentunit)},{$cl_units->get_stoneprice($currentunit)},{$cl_units->get_ironprice($currentunit)},{$cl_units->get_bhprice($currentunit)});
		</script>
		<tr class="row_a">
			<td class="nowrap">
				<img src="{$image_base}/unit/{$currentunit}.png?1" align="absmiddle" alt="" />
					<b>{$cl_units->get_name($currentunit)}</b>
			</td>
			<td class="nowrap" align="center">{$cl_units->get_woodprice($currentunit)}</td>
			<td class="nowrap" align="center">{$cl_units->get_stoneprice($currentunit)}</td>
			<td class="nowrap" align="center">{$cl_units->get_ironprice($currentunit)}</td>
			<td class="nowrap" align="center">{$cl_units->get_bhprice($currentunit)}</td>
			<td align="center">{$cl_units->get_time($village.barracks,$currentunit)+1|format_time}</td>
			<td align="center">{$units_in_village.$currentunit}/{$units_all.$currentunit}</td>
			<td class="nowrap">
				<input name="{$currentunit}"  id="{$currentunit}_0" type="text" size="5" maxlength="5" tabindex="1"/>
				<a href="javascript:insertUnit(document.forms[0].{$currentunit}, {$cl_units->last_error})">(max. {$cl_units->last_error})</a>
			</td>
		</tr>
	        {/if}
		{/foreach}
		<script type='text/javascript'>
			{* Starting Timer... *}
			{if $get.mode!="mass"} window.setInterval("trainManager.tick()", 1000); {/if}
		</script>
		<tr><td colspan="8" align="right"><input type="submit" value="Recrutar" class="button" /></td></tr>
	</table>
</form>
		{else}
		{* Massenrekrutieren *}
<table>
	<tr>
		<td><img src="../graphic/build/barracks.jpg" title="Quartel" alt="" /></td>
		<td>
			<h2>Recrutar em massa</h2>
			<p>Nesta visualiza&ccedil;&atilde;o voc&ecirc; pode produzir qualquer tipo de unidade, desde que todos os requerimentos de tais unidades tenham sido preenchidos (edf&iacute;cios e tecnologias).</p>
		</td>
	</tr>
</table><br />
		{if !empty($error)}
<div class="error">{$error}</div>
		{/if}
<form method="post" action="game.php?village={$village.id}&amp;screen=train&amp;mode=mass&amp;group=0&amp;action=train_mass&amp;h={$hkey}&amp;site={$get.site}" id="mass_train_form">
	<table class="vis" width="100%">
		<thead>
			<tr>
				<th width="120">Aldeias ({php} echo count($this->_tpl_vars['villages']); {/php})</th>
				<th><center><img src="../graphic/icons/wood.png"></center></th>
				<th><center><img src="../graphic/icons/stone.png"></center></th>
				<th><center><img src="../graphic/icons/iron.png"></center></th>
				<th><center><img src="../graphic/icons/farm.png"></center></th>
				{foreach from=$units item=currentunit}
				{* END_PART *}
				<th width="35" style="text-align:center"><img class="" alt="" title="{$cl_units->get_name($currentunit)}" src="{$image_base}/unit/unit_{$cl_units->get_graphicName($currentunit)}.png?1"></th>
				{/foreach}
			</tr>
		</thead>
				<tbody class="row_marker">
				{foreach from=$villages item=currentvillage}
                       {* Fetching Village Infos *}
                    	{php}
	                 $this->_tpl_vars['cur_vil_inf']=$GLOBALS['db']->fetch($GLOBALS['db']->query("SELECT * FROM `villages` WHERE `id`='".$this->_tpl_vars['currentvillage']."'"));
                     $tmp_farm=$this->_tpl_vars['cur_vil_inf']['farm'];
                     $this->_tpl_vars['cur_vil_inf']['farmLimits']=$this->_tpl_vars['arr_farm'][$tmp_farm]-$this->_tpl_vars['cur_vil_inf']['r_bh'];
				{/php}
                                 	{* Initial Current Manager *}
				<script type="text/javascript">
				 trainManagers[{$currentvillage}]=new trainManager;
                 trainManagers[{$currentvillage}].setVillage({$currentvillage});
                 trainManagers[{$currentvillage}].setBh({$cur_vil_inf.farmLimits});
                 trainManagers[{$currentvillage}].setRessis({$cur_vil_inf.r_wood},{$cur_vil_inf.r_iron},{$cur_vil_inf.r_stone});
				 window.setInterval("trainManagers[{$currentvillage}].tick()",1000);
				</script>
			<tr class="row_a selected">
				<td width="100%"><a href="game.php?village={$currentvillage}&amp;screen=overview">{$cur_vil_inf.name|urldecode} ({$cur_vil_inf.x}|{$cur_vil_inf.y}) K{$cur_vil_inf.continent}</a></td>
				<td style="white-space:nowrap; text-align:center;">
					{$cur_vil_inf.r_wood|round}
				</td>
				<td style="white-space:nowrap; text-align:center;">
					{$cur_vil_inf.r_stone|round}
				</td>
				<td style="white-space:nowrap; text-align:center;">
					{$cur_vil_inf.r_iron|round}
				</td>
				<td align="center">{$cur_vil_inf.r_bh}/<br />{php} echo $this->_tpl_vars['farmLimits'][$this->_tpl_vars['cur_vil_inf']['farm']];{/php}</td>  {*Bauernhof Zeugs *} 
				{foreach from=$units item=currentunit}	
				{$cl_units->check_needed($currentunit,$cur_vil_inf)} {* Use infos not id ;D *}	
				{if not is_numeric($cl_units->last_error)} {php} $this->_tpl_vars['cl_units']->last_error=-1; {/php} {/if}						
                <td>
					<div style="white-space:nowrap; margin-bottom: 3px;" align="center">
								{*TODO : If prod is running prod_running.png *}	
								{php} $this->_tpl_vars['prod_tmp']=$this->_tpl_vars['in_prod'][$this->_tpl_vars['cur_vil_inf']['id']]; {/php}
								{if not $prod_tmp.$currentunit}
								<a href="game.php?village={$village.id}&amp;screen=train"><img alt="" title="" src="{$image_base}/dots/grey.png"></a>
								{else}
								{* Is in queue *}
								<a href="game.php?village={$village.id}&amp;screen=train"><img alt="" title="" src="{$image_base}/dots/green.png"></a>
								{/if}
										</div>
										<input {if $cl_units->last_error == -1}disabled="disabled" {/if}type="text" tabindex="" size="3" onmouseover='trainManagers[{$currentvillage}].reCalcAll()' name="units[{$currentvillage}][{$currentunit}]" id="{$currentunit}_{$currentvillage}"><br />
										{if $cl_units->last_error!=-1} <center>
                                        <a href='javascript:trainManagers[{$currentvillage}].setNumber("{$currentunit}","{$cl_units->last_error}")' id="{$currentunit}_{$currentvillage}_a">({$cl_units->last_error})</a></center>
										{* Add Unit :D *}
                <script type='text/javascript'> trainManagers[{$currentvillage}].addUnit("{$currentunit}",{$cl_units->get_woodprice($currentunit)},{$cl_units->get_ironprice($currentunit)},{$cl_units->get_stoneprice($currentunit)},{$cl_units->get_bhprice($currentunit)}); </script>
                                        {else}
										<div><br /></div>
										{/if}
				</td>
				{/foreach}
																
			</tr>
	     {/foreach}
		</tbody>
			<tr><th colspan="13"><div align="right"><input type="submit" value="Recrutar" class="button" /></div></th></tr>
			</table>
	<div align="center">
    {section name=show_sites start=1 loop=$sites+1 step=1}
    {if $smarty.section.show_sites.index != $get.site} <a href='game.php?village={$village.id}&screen=train&mode=mass&site={$smarty.section.show_sites.index}'>[{$smarty.section.show_sites.index}]</a>
    {else}  <b>>{$smarty.section.show_sites.index}<</b>
    {/if}
    {/section}
	</div>
</form>
{/if}
{/if} {* IF END ; ELSE ; Massrecruit Infodialog *}
</td>