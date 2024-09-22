<style type="text/css">
body{margin:0;padding:0;background:#3366bb;color:#ddd;margin-top:50px;}
#stats{background:#0088dd;border:1px solid #000;}
#stats td{font-size:15px;font-weight:bold;width:200px;}
#stats td:hover{background:#3366bb;border-bottom:1px solid #000;}
h1{color:#66aa33;text-align:center;}
em{color:#66aa22;font-size:16px;}
</style>
<?php
require("stats_func.php");
$stats=new stats;
echo "<div align='center'>".$stats->stats_table()."</div>";

?>