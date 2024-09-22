/*
  ##################################
  # Script by Manuel Mannhardt     #
  # Ingame/Forum SlimShady95       #
  ##################################
*/
function Text(attribut) {
 document.header.text.value += attribut;
}

function Over(was) {
 document.getElementById('was').innerHTML = was;
}

function Leer() {
 document.getElementById('was').innerHTML = "Hilfe (Über die Links fahren)";
}
