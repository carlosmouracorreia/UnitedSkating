<?php
require("phpmailer/class.phpmailer.php");
 if(!isset($_COOKIE["user"])) {
 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");	
	 }
	 $modo = $_GET["mode"];

include("topo.php");
if($tempo <= 60) {$tentardenovo = "$tempo segundos..";}
else { 
$tempo = $tempo / 60;
$tentardenovo = "$tempo minutos..";
}
 if($validrecup=="1") { $validrecup = "$validrecup hora";}
 else { $validrecup = "$validrecup horas";}
 

?>

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
	<!-- end #header -->

	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<p>&nbsp;</p>
                       <div class="post">
				<h2 class="title">Esqueceu password?</h2>
				<div class="entry">
                <form action="recup.php?mode=<?php echo $modo; ?>" method="post">Email: <input name="email" type="text" /><input name="" type="submit" value="ok" /><input name="verif" type="hidden" value="verif" /></form>
                <?php
				$verif = $_POST["verif"];
				$email = $_POST["email"];
				
				$validrecup2 = $validrecup*60*60;
			
				//verificar e apagar registos de pedido de rep de password com mais de 1 hora
				$result1 = mysql_query("SELECT * FROM utilizadores WHERE email='$email'");
				
						$linha1 = mysql_fetch_array($result1);
						
						$resulta2 = mysql_query("SELECT * FROM configs");
				
						$linha2 = mysql_fetch_array($resulta2);
						
					$tempofin = $timeAfterOneHour - $linha1["hrecup"];
					if($linha1["recup"]=="sim" and $tempofin>$validrecup2) { 
					mysql_query("UPDATE utilizadores SET recup='', hrecup='' WHERE email='".$email."'");
					}
					$tempofin2 = $timeAfterOneHour - $linha2["hrecup"];
					if($linha2["recup"]=="sim" and $tempofin2>$validrecup2) { 
					mysql_query("UPDATE configs SET recup='', hrecup=''");
					}
					
					//acaba aqui
					
					$resulta2 = mysql_query("SELECT * FROM configs");

						$linha2 = mysql_fetch_array($resulta2);
				
				
				$result1 = mysql_query("SELECT * FROM utilizadores WHERE email='$email'");
				
						$linha1 = mysql_fetch_array($result1);
				if($contlogin!="1") {
				if($verif=="") {
					
				}
			elseif($email=="") { echo '<b class="red2">Escreva um email.</b>'; }
			
		
 
 	elseif($linha1["recup"]=="sim") { echo '<b class="red2">Um mensagem já foi enviada para esse endereço de email. <br> Aguarde '.$validrecup.' ou se não tiver recebido a mensagem contacte o administrador.</b><br>'; }
	elseif($linha2["recup"]=="sim" and $emailadmin==$email) { echo '<b class="red2">Um mensagem já foi enviada para esse endereço de email(admin). <br> Aguarde '.$validrecup.' ou se não tiver recebido a mensagem contacte o administrador.</b><br>'; }
	
 else {
	 
				
						$result1 = mysql_query("SELECT * FROM utilizadores WHERE email='$email'");
						$linha1 = mysql_fetch_array($result1);
						$result13 = mysql_query("SELECT * FROM configs");
						$linha2 = mysql_fetch_array($result13);
						$numcom20 = mysql_query ( "SELECT count(*) from utilizadores WHERE email='$email'" );
 list ( $semail ) = mysql_fetch_row ( $numcom20 );
 if($semail=="1") { 
//mail

$mail = new PHPMailer();

	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->Host = "smtp.unitedskating.com"; // Endereço do servidor SMTP
	$mail->SMTPAuth = true;
	$mail->Username = 'geral@unitedskating.com';
	$mail->Password = 'Bateaporta123@';
	$mail->From = "sem-resposta@unitedskating.com"; // Seu e-mailm
	$mail->FromName = "unitedskating"; // Seu nome
	$mail->AddAddress($email);
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	 	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Pedido de recup.password - unitedskating.com"; // Assunto da mensagem
	$mail->Body = '<style>
h1 {
	font-size: 30px;
	font-family: Arial, Helvetica, sans-serif;
}
</style></head><body>
<h1>&nbsp;</h1>
<table width="484" border="0">
  <tr>
    <td width="100"><b><img src="'.$hostsite.'/images/logomail.jpg" width="99" height="86"></b></td>
    <td width="374"><b><h1>'.$titulosite.'</h1></b></td>
  </tr>
</table>
<hr>
Olá '.$linha1["pnome"].' '.$linha1["unome"].', foi enviado um pedido de reposição de password em seu nome, com o seu email. Caso não tenha sido você, ignore este email, e se estes emails continuarem a chegar à sua caixa de correio fale com o administrador através do email acima. <p>
*Devido á politica do nosso website e a questoes relacionadas com a segurança, as passwords dos utilizadores são encriptadas, sendo assim impossivel obter a password e mostra-la a si. Sendo assim temos de lhe pedir que reponha a sua password.*
</p> <br>
Para repor a sua password clique <a href="'.$hostsite.'/recup2.php?a='.$linha1["pass"].'&user='.$linha1["user"].'&mode='.$modo.'">neste link</a>. Este link só é valido durante '.$validrecup.'. <br> Com os melhores cumprimentos, o Administrador.
</body></html>';
	$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();	 
 
mysql_query("UPDATE utilizadores SET recup='sim', hrecup='$timeAfterOneHour' WHERE user='".$linha1["user"]."'");
echo '<b class="red2">Email Enviado.</b> <br> *verifique a pasta spam.<br>';

 
   }
   
  elseif($email==$emailadmin) {
	  
	  
	  $titulo = "Pedido de rep.password ADMIN - unitedskating";

 
$mensagem = '<html><head><style>
h1 {
	font-size: 30px;
	font-family: Arial, Helvetica, sans-serif;
}
</style></head><body>
<h1>&nbsp;</h1>
<table width="484" border="0">
  <tr>
    <td width="100"><b><img src="'.$hostsite.'/images/logomail.jpg" width="99" height="86"></b></td>
    <td width="374"><b><h1>'.$titulosite.'</h1></b></td>
  </tr>
</table>
<hr>
Olá caro Administrador, foi enviado um pedido de reposição de password em seu nome, com o seu email. Caso não tenha sido você, ignore este email. <p>
*Devido á politica do nosso website e a questoes relacionadas com a segurança, as passwords dos utilizadores são encriptadas, sendo assim impossivel obter a password e mostra-la a si. Sendo assim temos de lhe pedir que reponha a sua password.*
</p> <br>
Para repor a sua password clique <a href="'.$hostsite.'/recup2.php?a='.$linha2["passadmin"].'&user=ADMIN&mode='.$modo.'">neste link</a>. Este link só é valido durante '.$validrecup.'. <br> 
</body></html>';

$cabeca = "MIME-Version: 1.0\r\n";
$cabeca.= "Content-type: text/html; charset=ISO-8859-1\r\n";
$cabeca.= "From: ".$emailadmin."";
mail($email,$titulo,$mensagem,$cabeca);
mysql_query("UPDATE configs SET recup='sim', hrecup='$timeAfterOneHour'");
echo '<b class="red2">Email Enviado ADMIN.</b> <br> *verifique a pasta spam.<br>';
	  
	  
	  } 
  
  
					else { echo '<b class="red2">Email não existente na base de dados.</b>'; }
					}
					
					
					 }
					 else { 
					 echo '<script type="text/javascript">

<!--
window.location = "index.php"
//-->
</script>';
					 } ?>
					</div>
                    </div>
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

 }
else {
header("Location: index.php");	
}
?>
