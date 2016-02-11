<?php
date_default_timezone_set("UTC");
#$today = getdate();
#$datestring = date("Y-m-d+H:00:00",$today[0]);



$json = file_get_contents("http://23.239.210.199/virtual_machines/frlmso3lgct6ag/network_interfaces/379/usage.json?period[startdate]=2016-02-03+19:00:00&period[enddate]=2016-02-04+21:00:00");
$jvar = json_decode($json,TRUE);
print_r($jvar);

echo $jvar[0]["net_hourly_stat"]["created_at"] 
?>
