{if isset($done)}
  {if $done == true}
    <h2 style="color: green; text-align: center;">Trupele au fost recalculate cu succes!</h2>
    <p style="text-align: center;">Dupa ce ati recalculat trupele acum trebuie sa recalculati si fermele! Asta o puteti face de <a href="?screen=bh_neuberechnen&amp;start">aici</a>! Dupa ce ati dat click va trebui sa asteptati cateva secunde!<br />
    
  {/if}
{/if}
<h1 style="text-align: center;">Recalculare trupe!</h1>
<p>Daca o trupa sau mai multe lipsesc din sate,de aici puteti rezolva problema!</p>
<a href="?screen=truppen_neuberechnen&amp;start">&raquo; Recalculati trupele!</a>