<?php /* Smarty version 2.6.14, created on 2011-01-16 17:37:51
         compiled from index_users_edit.tpl */ ?>
<table class="vis" border="1" style=border:1px solid">
 <th><h4>Editare de jucatori:</h4></th>
 <th>&nbsp;<?php echo $this->_tpl_vars['username']; ?>
</th>
 <th>&nbsp;&nbsp;<a href="index.php?screen=users">&raquo; Inapoi la administrarea de utilizatori</a></th>
 <tr>
  <td><b>&raquo; Schimbare nume de utilizator</b></td>
<td> <form method="post" action="index.php?screen=users&action=edit&mode=change_name&name=<?php echo $this->_tpl_vars['username']; ?>
&id=<?php echo $this->_tpl_vars['id']; ?>
">
                              <input type="text" name="username" size="13">
                              </input>
  </td>
  <td>
                              <input type="submit" name="submit" value="Schimba nume">
                              </input>
                             </form>
  </td>
   </tr>
   <tr>
   <td><b>&raquo; Scoate utilizatoru din joc (Sessiune expirata)</b></td>
   <td colspan="2">
   <a href="index.php?screen=users&action=edit&mode=kick&id=<?php echo $this->_tpl_vars['id']; ?>
">&raquo; Scoate utilizatoru din joc (Sessiune expirata)</a>
  
   </td>
   </tr>
   <tr>
    <td><b>&raquo; Stergeti utilizator</b> </td>
    <td colspan="2">
    <a href="index.php?screen=users&action=edit&mode=delete&id=<?php echo $this->_tpl_vars['id']; ?>
">&raquo; Stergeti utilizator</a>
    </td>
   </tr>
   <tr>
    <td><b>&raquo; Scoate utilizatoru din Trib</b> </td>
    <td colspan="2">
    <a href="index.php?screen=users&action=edit&mode=kick_tribe&id=<?php echo $this->_tpl_vars['id']; ?>
">&raquo; Scoate utilizatoru din Trib</a>
    </td>
   </tr>
   <tr> 
    <td height="80"><b>Sate de Administra&#355;ie</b></td>
    <td colspan="3">
    <table class="vis" border="1" style=border:1px solid">
 <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Coordonate</th>
  <th>Puncte</th>
  <th>Continent</th>
  <th></th>
 </tr>
<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['village']):
?>
<td>
<?php echo $this->_tpl_vars['village']['id']; ?>

</td>
<td>
<?php echo $this->_tpl_vars['village']['name']; ?>

</td>
<td>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>

</td>
<td>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['village']['points']; ?>

</td>
<td>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['village']['continent']; ?>

</td>
<td>
<a href="index.php?screen=users&action=edit&mode=village&id=<?php echo $this->_tpl_vars['id']; ?>
&village_id=<?php echo $this->_tpl_vars['village']['id']; ?>
">Ia un sat</a>
</tr>
<tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</td>
   </tr> 
</table>