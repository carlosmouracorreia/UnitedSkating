<?php
$using_ie6 = (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') !== FALSE);
if($using_ie6==TRUE) {
	echo "Este website não é compativel com o I.E 6. Está a utilizar uma versão antiga do internet explorer. por favor actualize o seu web browser.";
die();
	}
	
	
include("config.php");
 date_default_timezone_set('GMT');
					$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = $currentTime;
$ip = $_SERVER['REMOTE_ADDR'];
$resultado = mysql_query ( "SELECT * from loginado WHERE ip='". $ip . "'" );
 $linha= mysql_fetch_array($resultado);
  $dif = $timeAfterOneHour - $linha["tempo"];
  
   $numcom305 = mysql_query ( "SELECT count(*) from loginado WHERE ip='". $ip . "'" );
 list ( $contlogin5 ) = mysql_fetch_row ( $numcom305 );
 
 if($contlogin5==1) {
 if($dif > $tempologin) {  mysql_query("delete from loginado WHERE ip='$ip'");
 $expirou = "true";
  }
 }
		 $numcom30 = mysql_query ( "SELECT count(*) from loginado WHERE ip='". $ip . "'" );
 list ( $contlogin ) = mysql_fetch_row ( $numcom30 );
 $resultado = mysql_query ( "SELECT * from loginado WHERE ip='". $ip . "'" );
 $linha= mysql_fetch_array($resultado);
  $resultado3 = mysql_query ( "SELECT * from utilizadores WHERE user='".$linha["user"] . "'" );
 $linha3 = mysql_fetch_array($resultado3);
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<!--
Editado por Carlos Correia. Tema Highway
http://www.freecsstemplates.org

-->
<head>
<meta name="keywords" content="skate, fotografia, skateboarding, pt skate, unitedskating, sk8, portuguese skateboarding" />
<meta name="description" content="skate e cultura em português" />
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1"> 
<title>unitedskating - skate e cultura em português</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
		<script src="scripts/mootools-1.2.1-core-yc.js" type="text/javascript"></script>
		<script src="scripts/mootools-1.2-more.js" type="text/javascript"></script>
		<script src="scripts/jd.gallery.js" type="text/javascript"></script>
		<script src="scripts/jd.gallery.transitions.js" type="text/javascript"></script>
        
        
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
    <div id="fundoheader">
		<div id="header">
			<div id="logo">
                <table width="330" border="0">
  <tr>
    <td width="130"><a href="index.php"><img src="images/logotips.jpg" style="border-style: none" width="130" height="60"></a></td>
      <td width="30">&nbsp;&nbsp;</td>
    <td width="170"><h1>unitedskating</h1>
				<p> skate e cultura em portugu&ecirc;s. <a href="sobre.php"> sobre</a> </p></td>
  </tr>
</table>

			</div>
			