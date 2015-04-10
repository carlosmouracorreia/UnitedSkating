<?php
$mysql_host = "localhost";
$mysql_database = "united";
$mysql_user = "root";
$mysql_password = "";

//Site cfgs n mexer

$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = $currentTime-60*60;
$ip = $_SERVER['REMOTE_ADDR'];

$con = mysql_connect("$mysql_host","$mysql_user","$mysql_password");
if (!$con)
  {
  die('Erro de conneccao, fale com o administrador.' . mysql_error());
  }
$bdc = mysql_select_db("$mysql_database", $con);

if(!$bdc) {echo "erro de connect a db";}

 $result9 = mysql_query("SELECT * FROM configs");
	  $row4 = mysql_fetch_array($result9);
	  
	  //adminlogin
$useradmin = $row4['useradmin'];
$passadmin = $row4['passadmin'];
	  $tempoespera = $row4['tempoespera'];
$ppp = $row4['ppp'];
	$titulosidebar = $row4['titulosidebar'];  
	$textosidebar = $row4['textosidebar'];
	$nrtenta = $row4['nrtenta'];
$tempo = $row4['tempoblock'];
$tempologin = $row4['tempologin'];
$titulosite = $row4['titulosite'];
$descsite = $row4['descsite'];
$hostsite = $row4['hostsite'];
$emailadmin = $row4['emailadmin'];
$validrecup = $row4['validrecup'];
$podercom = $row4['podercom'];
?>