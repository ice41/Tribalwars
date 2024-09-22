<?php /* Smarty version 2.6.14, created on 2011-01-16 15:28:22
         compiled from index_users_overview.tpl */ ?>
<h3>Administrare utilizatori</h3><br />


Acest script va permite pur si simplu de a edita un utilizator.  <br /><br />

<table class="vis" style=border:1px solid" border="1">
 <tr>
  <th>Username</th>
  <th>ID</th>
  <th>Rang</th>
  <th>Puncte</th>
  <th>Sate</th>
 </tr>
<?php $_from = $this->_tpl_vars['userInfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
<td><a href="index.php?screen=users&action=edit&name=<?php echo $this->_tpl_vars['user']['username']; ?>
&id=<?php echo $this->_tpl_vars['user']['id']; ?>
"><?php echo $this->_tpl_vars['user']['username']; ?>
</a>
</td>
<td>
&nbsp;<?php echo $this->_tpl_vars['user']['id']; ?>

</td>
<td>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['user']['rang']; ?>

</td>
<td>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['user']['points']; ?>

</td>
<td>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['user']['villages']; ?>

</td>
</tr>
<tr>
<?php endforeach; endif; unset($_from); ?>
</table>