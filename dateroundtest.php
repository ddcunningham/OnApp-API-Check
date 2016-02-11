<?php
date_default_timezone_set("America/Denver");
$today = getdate();
print_r($today);
echo date("Y-m-d H:00:00",$today[0]);
?>
