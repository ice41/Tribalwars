<?php /* Smarty version 2.6.14, created on 2012-12-29 05:45:03
         compiled from game_settings_userdelete.tpl */ ?>
<h3>&#350;terge contul</h3>

<p>&#206;n momentul &#238;n care ai f&#259;cut cererea de &#351;tergere nu te mai po&#355;i &#238;nscrie pe acest cont.</p>

<p>Va fi &#351;ters numai contul de pe lumea aceasta. Contul pentru forum si conturile de pe alte lumi &#238;&#355;i r&#259;m&#226;n.</p>

<form action="game.php?village=<?php echo $this->_tpl_vars['villageid']; ?>
&screen=settings&mode=userdelete&do=delete" method="post">
<br>Parola: <input type="password" name="passwort"> <input type="submit" value="OK"></br>
<?php echo $this->_tpl_vars['err']; ?>