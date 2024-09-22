<?php /* Smarty version 2.6.14, created on 2011-06-17 18:37:44
         compiled from index_awards.tpl */ ?>
<?php echo $this->_tpl_vars['javascript']; ?>

<h3><center><font color="#884000"><?php echo $this->_tpl_vars['headline']; ?>
</font></center></h3>
<p>
<center>
     <?php echo $this->_tpl_vars['text']; ?>

</center>
</p>
<center>
	     <input type="button" value="Reset" onclick="javascript:check('index.php?screen=awards&action=reset')"/>
</center>
<?php if (isset ( $this->_tpl_vars['status'] )): ?>
<?php echo $this->_tpl_vars['status']; ?>

<script type="text/javascript">
window.setTimeout(" location.href = 'index.php?screen=awards' ","2000");
</script>
<?php endif; ?>
     <br/>
<?php echo $this->_tpl_vars['version']; ?>


     