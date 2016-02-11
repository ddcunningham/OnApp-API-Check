<?php 
date_default_timezone_set("UTC");
$today = getdate();
$datestring = date("Y-m-d+H:00:00",$today[0]);

/*** DOWNLOAD FILE FROM CURL ****/

//API KEY AND PASSWORD
$username='admin';
$password='hf#-RZFew(78{K7vp~MHZ';
$usernamePassword = $username . ':' . $password;
$headers = array('Authorization: Basic ' . base64_encode($usernamePassword), 'Content-Type: application/json');

//URL
$url= "http://onappcp.accuwebhosting.com/virtual_machines/frlmso3lgct6ag/network_interfaces/379/usage.json?period[startdate]=$datestring&period[enddate]=$datestring";

//FILE NAME
$filename = 'bandwidth_api_call.json';

//DOWNLOAD PATH
$path = '/tmp/'.$filename;

//FOLDER PATH
$fp = fopen($path, 'w');

//SETTING UP CURL REQUEST
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);

//CONNECTION CLOSE
curl_close($ch);
fclose($fp);

echo $url;

$json = file_get_contents($path);
$jvar = json_decode($json,TRUE);
print_r($jvar);

echo $jvar[0]["net_hourly_stat"]["created_at"] 
?>
