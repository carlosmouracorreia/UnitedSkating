<?php

include("config.php");
 date_default_timezone_set('GMT');
					$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = $currentTime;
$ip = $_SERVER['REMOTE_ADDR'];

  
  
		 
 
 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	 echo '<script type="text/javascript">

<!--
window.location = "index.php"
//-->
</script>';
	 }
	 $modo = $_GET["mode"];
if($tempo <= 60) {$tentardenovo = "$tempo segundos..";}
else { 
$tempon = $tempo / 60;
$tentardenovo = "$tempon minutos..";
}
$user = $_POST["user"];
				$password = $_POST["pass"];
				$user = mysql_real_escape_string($user);
			    $password = mysql_real_escape_string($password);
				$result = mysql_query("SELECT * FROM tentalogin WHERE ip='$ip'");
				  $row = mysql_fetch_array($result);
			 
				 $queryusers = mysql_query("SELECT * FROM utilizadores WHERE user='$user'");
				 $linhauser = mysql_fetch_array($queryusers);
				 
				 
$diftempo = $timeAfterOneHour - $row['hora'];
if($diftempo >= $tempo) { mysql_query("delete from tentalogin WHERE ip='$ip'");  
}

$result = mysql_query("SELECT * FROM tentalogin WHERE ip='$ip'");
 $row = mysql_fetch_array($result);
$attempts = $row['tentativa'];
$tentativas = $nrtenta - $attempts ;
if(isset($_POST["user"]) or isset($_POST["pass"])) {
				if($attempts >= $nrtenta) { $mensagem = '<b class="red3">Excedeu o limite de tentativas('.$nrtenta.') de login há menos de '.$tentardenovo.' , tente de novo mais tarde.</b>'; }
				elseif ($user=="" or $password=="") {
					$mensagem = '<b class="red3">Escreva um utilizador e uma password.</b>';
					}
					
					elseif($user==$useradmin && md5($password)==$passadmin)  {
						mysql_query("DELETE from tentalogin WHERE ip='".$ip."'");
setcookie("admin", $passadmin, time()+3600);
$array = mysql_query("SELECT * FROM admin");
$linhar = mysql_fetch_array($array);
if($linhar["logins"]=="") {$linhar["logins"]=0;}
$logins = $linhar["logins"] + 1;




mysql_query("UPDATE admin SET ultimoip2='".$linhar["ultimoip"]."', data2='".$linhar["data"]."'");
mysql_query("UPDATE admin SET ultimoip='$ip', data='$timeAfterOneHour', logins='$logins'");

					header ("Location: admin/index.php");
					
				}
				elseif($user=$linhauser["user"] && md5($password)==$linhauser["pass"] && $linhauser["activo"]=="nao" ) { 
				$mensagem = '<b class="red3">A sua conta está por activar.</b>';
				}
				elseif($user=$linhauser["user"] && md5($password)==$linhauser["pass"] && $linhauser["activo"]=="sim" ) { 
				$userlool = $_POST["user"];
				
$logins2 = $linhauser["logins"] + 1;
 $securitymd5 = md5(rand());
 $numcom29 = mysql_query ( "SELECT count(*) from utilizadores WHERE securitymd5='". $securitymd5 . "'" );
 list ( $numcom9 ) = mysql_fetch_row ( $numcom29 );
 if($numcom9 == "1") {
	  $numcom293 = mysql_query ( "SELECT * from utilizadores WHERE securitymd5='". $securitymd5 . "'" );
  $numcom9 = mysql_fetch_array ( $numcom293 );
 while($numcom9["securitymd5"]==$securitymd5) {
 $securitymd5 = md5(rand());
 mysql_query("UPDATE utilizadores SET securitymd5='".$securitymd5."' WHERE user='".$linhauser["user"]."'");

 }
				}
mysql_query("UPDATE utilizadores SET securitymd5='".$securitymd5."' WHERE user='".$linhauser["user"]."'");
				setcookie("user", $securitymd5, time()+3600);
mysql_query("DELETE from tentalogin WHERE ip='".$ip."'");
$array2 = mysql_query("SELECT * FROM utilizadores WHERE user='".$linhauser["user"]."'");
$linhar2 = mysql_fetch_array($array2);
mysql_query("UPDATE utilizadores SET ultimoip2='".$linhar2["ultimoip"]."', data2='".$linhar2["data"]."' WHERE user='".$linhauser["user"]."'");
mysql_query("UPDATE utilizadores SET ultimoip='$ip', data='$timeAfterOneHour', logins='$logins2' WHERE user='".$linhauser["user"]."'");
					header ("Location: blog.php?mode=".$_GET["mode"]."");
				}
				else { 
				$tentativas = $tentativas - 1;
				if($tentativas!=1) {$s = "s";}
				
				$mensagem = '<b class="red3">Combinação utilizador/password errada. '.$tentativas.' Tentativa'.$s.' restante'.$s.'</b>';
				  
				  $tentativanr = $row['tentativa'] + 1;
				  $numcom2 = mysql_query ( "SELECT count(*) from tentalogin WHERE ip='". $ip . "'" );
 list ( $numcom ) = mysql_fetch_row ( $numcom2 );
				  if($numcom!=0) {mysql_query("UPDATE tentalogin SET tentativa='$tentativanr', hora='$timeAfterOneHour' WHERE ip='".$ip."'");}
				  else{
				mysql_query("INSERT INTO tentalogin (tentativa,ip,hora)
VALUES ('$tentativanr', '$ip', '$timeAfterOneHour')");
				  }
				}
										}
										
										else {
										header("Location: blog.php?mode=".$_GET["mode"]."");	
										}
				
				?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Editado por Carlos Correia. Tema Highway
http://www.freecsstemplates.org

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1"> 
<title>UnitedSkating - skate e cultura em portugues</title>
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
<div id="menu">
				<ul>
					<li class="current_page_item"><a href="index.php">Portal</a></li>
 <li><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li><a href="shopsparks.php">Shops/Parks</a></li>
<li><a href="fotofilme.php">Foto/Filme</a></li>
					<li <?php  if($modo=="pt") { echo 'class="current_page_item2"';}?>><a href="blog.php?mode=pt">Nacional</a></li>
					<li <?php  if($modo=="global") { echo 'class="current_page_item2"';}?>><a href="blog.php?mode=global">lá fora</a></li>
					
                                       
				</ul>
			</div>
            </div>
		</div>
	</div>
	<!-- end #header -->

	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
               <h2> login. </h2>
					<?php  echo $mensagem; ?>
					
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				<?php include("sidebar.php"); ?>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<?php
include("rodape.php");
?>
