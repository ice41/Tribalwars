{if $smarty.get.action == ""}
<h2>Ultimate Cheating</h2>
Cu ajutorul acestui script puteti modifica cladirile unui sat puteti adauga trupe puteti muta satul pe harta si multe altele.
<br><br>
<form action="?screen=cheating&action=fertig" method="post">
 <table>
  <tr>
   <th colspan="2">Setari</th>
  </tr>
  <tr>
   <td>ID satului:</td>
   <td><input name="id"></td>
  </tr>
  <tr>
   <th colspan="2">Cladire</th>
  </tr>
  <tr>
   <td>Cladirea principala:</td>
   <td><input name="main">
  </tr>
  <tr>
   <td>Cazarma:</td>
   <td><input name="barracks">
  </tr>
  <tr>
   <td>Grajd:</td>
   <td><input name="stable">
  </tr>
  <tr>
   <td>Atelier:</td>
   <td><input name="garage">
  </tr>
  <tr>
   <td>Curte nobila:</td>
   <td><input name="snob">
  </tr>
  <tr>
   <td>Fierarie:</td>
   <td><input name="smith">
  </tr>
  <tr>
   <td>Piata centrala:</td>
   <td><input name="place">
  </tr>
  <tr>
   <td>Targ:</td>
   <td><input name="market">
  </tr>
  <tr>
   <td>Taietor de lemne:</td>
   <td><input name="wood">
  </tr>
  <tr>
   <td>Mina de argila:</td>
   <td><input name="stone">
  </tr>
  <tr>
   <td>Mina de fier:</td>
   <td><input name="iron">
  </tr>
  <tr>
   <td>Magazie:</td>
   <td><input name="storage">
  </tr>
  <tr>
   <td>Ferma:</td>
   <td><input name="farm">
  </tr>
  <tr>
   <td>Ascunzatoare:</td>
   <td><input name="hide">
  </tr>
  <tr>
   <td>Zid:</td>
   <td><input name="wall">
  </tr>
  <tr>
   <td colspan="2"><small><a href="javascript: max_build()">Toate la maxim</a></small></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
  </tr>
  <tr>
   <th colspan="2">Unitati</th>
  </tr>
  <tr>
   <td>Lancier:</td>
   <td><input name="spear"></td>
  </tr>
  <tr>
   <td>Luptator cu spada:</td>
   <td><input name="sword"></td>
  </tr>
  <tr>
   <td>Luptator cu toporul:</td>
   <td><input name="axe"></td>
  </tr>
  <tr>
   <td>Luptator cu toporul:</td>
   <td><input name="archer"></td>
  </tr>
  <tr>
   <td>Spion:</td>
   <td><input name="spy"></td>
  </tr>
  <tr>
   <td>Cavalerie usoara:</td>
   <td><input name="light"></td>
  </tr>
  <tr>
   <td>Arcas calaret:</td>
   <td><input name="marcher"></td>
  </tr>
  <tr>
   <td>Cavalerie grea:</td>
   <td><input name="heavy"></td>
  </tr>
  <tr>
   <td>Berbec:</td>
   <td><input name="ram"></td>
  </tr>
  <tr>
   <td>Catapulta:</td>
   <td><input name="catapult"></td>
  </tr>
  <tr>
   <td>Nobili:</td>
   <td><input name="snob1"></td>
  </tr>
  <tr>
   <th colspan="2">Nivelul de cercetare</th>
  </tr>
  <tr>
   <td>Lancier:</td>
   <td><input name="tech_spear"></td>
  </tr>
  <tr>
   <td>Luptator cu spada:</td>
   <td><input name="tech_sword"></td>
  </tr>
  <tr>
   <td>Luptator cu toporul:</td>
   <td><input name="tech_axe"></td>
  </tr>
  <tr>
   <td>Luptator cu toporul:</td>
   <td><input name="tech_archer"></td>
  </tr>
  <tr>
   <td>Spion:</td>
   <td><input name="tech_spy"></td>
  </tr>
  <tr>
   <td>Cavalerie usoara:</td>
   <td><input name="tech_light"></td>
  </tr>
  <tr>
   <td>Arcas calaret:</td>
   <td><input name="tech_marcher"></td>
  </tr>
  <tr>
   <td>Cavalerie grea:</td>
   <td><input name="tech_heavy"></td>
  </tr>
  <tr>
   <td>Berbec:</td>
   <td><input name="tech_ram"></td>
  </tr>
  <tr>
   <td>Catapulta:</td>
   <td><input name="tech_catapult"></td>
  </tr>
  <tr>
   <td colspan="2"><small><a href="javascript: max_tech()">Toate la maxim</a></small></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
  </tr>
  <tr>
   <th colspan="2">Alte setari</th>
  </tr>
  <tr>
   <td>Nume sat:</td>
   <td><input name="name"></td>
  </tr>
  <tr>
   <td>X-Coordonate:</td>
   <td><input name="x"></td>
  </tr>
  <tr>
   <td>Y-Coordonate:</td>
   <td><input name="y"></td>
  </tr>
  <tr>
   <td>Adeziune:</td>
   <td><input name="agree"></td>
  </tr>
  <tr>
   <td>Userid:</td>
   <td><input name="userid"></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
  </tr>
  <tr>
   <td>Lemn:</td>
   <td><input name="wood1"></td>
  </tr>
  <tr>
   <td>Argila:</td>
   <td><input name="stone1"></td>
  </tr>
  <tr>
   <td>Fier:</td>
   <td><input name="iron1"></td>
  </tr>
  <tr>
   <td>Ferma:</td>
   <td><input name="farm1"></td>
  </tr>
  <tr>
   <td colspan="2"><input type="submit" value="OK"></td>
  </tr>
 </table>
</form>
{elseif $smarty.get.action == "fertig"}
Toate setarile au fost salvate<br>
<a href="?screen=cheating">inapoi</a>
{/if}
