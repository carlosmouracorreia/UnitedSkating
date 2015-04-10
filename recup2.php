<?php
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
               <?php
				$verif = $_GET["a"];
				$user = $_GET["user"];
				$validrecup = $validrecup*60*60;
				
				$result1 = mysql_query("SELECT * FROM utilizadores WHERE user='$user'");
						$linha1 = mysql_fetch_array($result1);
					$tempofinal = $timeAfterOneHour - $linha1["hrecup"];
					if($linha1["recup"]=="sim" and $tempofinal>$validrecup) { 
					mysql_query("UPDATE utilizadores SET recup='', hrecup='' WHERE user='".$user."'");
					}
					
					$resulta2 = mysql_query("SELECT * FROM configs");
				
						$linha2 = mysql_fetch_array($resulta2);
						$tempofin2 = $timeAfterOneHour - $linha2["hrecup"];
					if($linha2["recup"]=="sim" and $tempofin2>$validrecup) { 
					mysql_query("UPDATE configs SET recup='', hrecup=''");
					}
					
					$resulta2 = mysql_query("SELECT * FROM configs");
				
						$linha2 = mysql_fetch_array($resulta2);
					
				$result1 = mysql_query("SELECT * FROM utilizadores WHERE user='$user'");
						$linha1 = mysql_fetch_array($result1);
				
				if($verif=="") {
					echo '<script type="text/javascript">

<!--
window.location = "index.php"
//-->
</script>';
					}
				else {
					
				if($linha1["pass"]==$verif and $linha1["recup"]=="sim" ) {
					?>
                    <form action="recup2.php?a=<?php echo $linha1["pass"]; ?>&user=<?php echo $linha1["user"]; ?>&mode=<?php echo $modo; ?>" method="post">
                      
                        <label for="pass"></label>
                      
                      <table width="214" border="1">
                        <tr>
                          <td width="77">Nova Password:</td>
                          <td width="107"><input name="pass" type="password" id="pass" /></td>
                        </tr>
                        <tr>
                          <td>Repetir Password:</td>
                          <td>
                          <input type="password" name="reppass" id="reppass" /><input name="verif" type="hidden" value="ok" /></td>
                        </tr>
                      </table>
                      <p>
                        <input type="submit" name="button" id="button" value="Submit" />
                      </p>
                    </form>
                    <?php
					$virif = $_POST["verif"];
					$pass = $_POST["pass"];
					$reppass = $_POST["reppass"];
					if($virif!="") { 
					if($pass=="") { echo '<b class="red">Escreva uma nova password</b>';}
					elseif (strlen($pass)  < 5 or strlen($nomecomment) > 20 ) {echo '<b class="red">A password tem de ter entre 5 e 20 caracteres.</b>';}
					else {
						if($pass!=$reppass) { echo '<b class="red">Passwords não coincidem!</b>'; }
						
						
						else { 
						$newpass = md5($pass);
						mysql_query("UPDATE utilizadores SET pass='$newpass', recup='', hrecup='' WHERE user='".$linha1["user"]."'");
echo '<b class="red">Password alterada com sucesso! Dados enviados para o seu email.</b>';



$mail = new PHPMailer();

	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->Host = "smtp.unitedskating.com"; // Endereço do servidor SMTP
	$mail->SMTPAuth = true;
	$mail->Username = 'geral@unitedskating.com';
	$mail->Password = 'Bateaporta123@';
	$mail->From = "sem-resposta@unitedskating.com"; // Seu e-mailm
	$mail->FromName = "unitedskating"; // Seu nome
	$mail->AddAddress($linha1["email"]);
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	 	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Novos dados - unitedskating"; // Assunto da mensagem
	$mail->Body = '<style>
h1 {
	font-size: 30px;
	font-family: Arial, Helvetica, sans-serif;
}
</style></head><body>
<h1>&nbsp;</h1>
<table width="484" border="0">
  <tr>
    <td width="100"><b><img src="'.$hostsite.'/images/logomail.jpg" ></b></td>
    <td width="374"><b><h1>'.$titulosite.'</h1></b></td>
  </tr>
</table>
<hr>
Olá '.$linha1["pnome"].' '.$linha1["unome"].', o seu utilzador é <b> '.$linha1["user"].' </b> e a sua nova password é <b> '.$pass.' </b>. <br> Com os melhores cumprimentos, o Administrador.';
	$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();




						}
		
						}
						
						
						}
					?>
                    
              <?php
				}
				
				elseif($linha2["passadmin"]==$verif and $linha2["recup"]=="sim" ) {
					?>
                    
                    <form action="recup2.php?a=<?php echo $linha2["passadmin"]; ?>&user=ADMIN&mode=<?php echo $modo ?>" method="post">
                      
                        <label for="pass"></label>
                      
                      <table width="214" border="1">
                        <tr>
                          <td width="77">Nova Password:</td>
                          <td width="107"><input name="pass" type="password" id="pass" /></td>
                        </tr>
                        <tr>
                          <td>Repetir Password:</td>
                          <td>
                          <input type="password" name="reppass" id="reppass" /><input name="verif" type="hidden" value="ok" /></td>
                        </tr>
                      </table>
                      <p>
                        <input type="submit" name="button" id="button" value="Submit" />
                      </p>
                    </form>
                    <?php
					$virif = $_POST["verif"];
					$pass = $_POST["pass"];
					$reppass = $_POST["reppass"];
					if($virif!="") { 
					if($pass=="") { echo '<b class="red">Escreva uma nova password</b>';}
					elseif (strlen($pass)  < 5 or strlen($nomecomment) > 20 ) {echo '<b class="red">A password tem de ter entre 5 e 20 caracteres.</b>';}
					else {
						if($pass!=$reppass) { echo '<b class="red">Passwords não coincidem!</b>'; }
						
						
						else { 
						$newpass = md5($pass);
						mysql_query("UPDATE configs SET passadmin='$newpass', recup='', hrecup=''");
echo '<b class="red">Password alterada com sucesso ADMIN! Dados enviados para o seu email.</b>';
$titulo = "Novos dados ADMIN - unitedskating.com";
$mensagem = '<html><head><style>
h1 {
	font-size: 30px;
	font-family: Arial, Helvetica, sans-serif;
}
</style></head><body>
<h1>&nbsp;</h1>
<table width="484" border="0">
  <tr>
    <td width="100"><b><img src="'.$hostsite.'/images/logomail.jpg" ></b></td>
    <td width="374"><b><h1>'.$titulosite.'</h1></b></td>
  </tr>
</table>
<hr>
Olá Administrador, a sua nova password é <b> '.$pass.' </b>. <br> 
</body></html>';

$cabeca = "MIME-Version: 1.0\r\n";
$cabeca.= "Content-type: text/html; charset=utf-8\r\n";
$cabeca.= "From: ".$emailadmin."";
mail($emailadmin,$titulo,$mensagem,$cabeca);
						}
		
						}
						
						
						}
					?>
                    
                    <?php
					
					
					}
				
				
					 else { 
					 echo '<b class="red">Pedido expirou ou o url é inválido.</b>'; }
				}
				  ?>
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
