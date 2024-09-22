<?php /* Smarty version 2.6.14, created on 2016-12-22 21:33:19
         compiled from game_quickbar.tpl */ ?>

<?php 
$getUser = mysql_query("SELECT userid FROM villages WHERE id = '".$_GET['village']."'");
  while ($fetch = mysql_fetch_assoc($getUser)) {
          $u = $fetch['userid'];
  }
$getQuickbar = mysql_query("SELECT id, name, img, href, target FROM quickbar WHERE uid = $u");
if (mysql_num_rows($getQuickbar) > 0) {
 ?>
<table style="border-spacing:1px; background-color:#fee47d; border:0px;" class="menu nowrap" align="center">
  <tr>
      <?php 
      $count = 0;
      require("include/config.php");
       ?>
    <?php $_from = $this->_tpl_vars['quickbar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quick']):
?>
      <?php if (substr ( $this->_tpl_vars['quick']['href'] , 0 , 8 ) == 'game.php'): ?>
      <td height="24"><a href="<?php echo $this->_tpl_vars['quick']['href']; ?>
&village=<?php echo $this->_tpl_vars['quick']['vid']; ?>
" <?php if ($this->_tpl_vars['quick']['target'] == 1): ?> target="_blank"<?php endif; ?>><img src="<?php echo $this->_tpl_vars['quick']['img']; ?>
" alt="" /> <?php echo $this->_tpl_vars['quick']['name']; ?>
</a></td>
      <?php else: ?>
      <td height="24"><a href="<?php echo $this->_tpl_vars['quick']['href']; ?>
" <?php if ($this->_tpl_vars['quick']['target'] == 1): ?> target="_blank"<?php endif; ?>><img src="<?php echo $this->_tpl_vars['quick']['img']; ?>
" alt="" /> <?php echo $this->_tpl_vars['quick']['name']; ?>
</a></td>
      <?php endif; ?>
      <?php 
      $count = $count + 1;
      
      
      if (($count % $config['quickbar']) == 0) {
      echo "</tr>";
      echo "<tr>";
      
      }
       ?>
   <?php endforeach; endif; unset($_from); ?>
  </tr>
</table><br />
<?php 
}
 ?>