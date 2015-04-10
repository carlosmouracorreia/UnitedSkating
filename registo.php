<?php
require("phpmailer/class.phpmailer.php");
 if(!isset($_COOKIE["user"])) {
 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");
	 }
	 $modo = $_GET["mode"];
include("php/v.inc");
include("php/q.inc");
$validator = new ValidateForm();
include("topo.php");
$verif = $_POST["verif"];
$user = $_POST["user"];
$pass = $_POST["pass"];
$passr = $_POST["passr"];
$email = $_POST["email"];
$pnome = $_POST["pnome"];
$morada = $_POST["morada"];
$telefone = $_POST["telefone"];
$codigo = $_POST["codigo"];
$site = $_POST["site"];
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);
$passr = mysql_real_escape_string($passr);
$email = mysql_real_escape_string($email);
$pnome = mysql_real_escape_string($pnome);
$pnome = mysql_real_escape_string($pnome);
$morada = mysql_real_escape_string($morada);		
$telefone = mysql_real_escape_string($telefone);
$codigo = mysql_real_escape_string($codigo);
$site = mysql_real_escape_string($site);
$datareg = mysql_query ( "SELECT * from utilizadores WHERE ultimoip='". $ip . "'" );
$regdata = mysql_fetch_array ( $datareg );
$tempolola = $timeAfterOneHour - $regdata["datareg"];
if($tempolola > 43200 and $ip==$regdata["ultimoip"] and  $regdata["activo"]=="nao") { 
mysql_query ( "DELETE from utilizadores WHERE ultimoip='". $ip . "'" );
}

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
               <h2> registo. </h2>
					 <form name="form1" method="post" action="registo.php?mode=<?php echo $modo; ?>">
	    <table border="1" bordercolor="#990000" align="center">
  <tr>
    <td colspan="2"><div align="center">Dados Obrigatórios:</div></td>
    </tr>
  <tr>
    <td width="129">Utilizador:*</td>
    <td width="320"><label for="user"></label>
      <input type="text" name="user" id="user" value="<?php echo $user; ?>"></td>
  </tr>
  <?php
    if($verif!="") {
 $procurarusers = mysql_query ( "SELECT count(*) from utilizadores WHERE user='". $user . "'" );
 list ( $nrusers ) = mysql_fetch_row (  $procurarusers );
		
		if(strlen($user)  < 3 or strlen($user) > 18) {
			echo '<tr>
    <td colspan="2"><b class="red">O nome de utilizador tem de ter entre 3 a 18 caracteres.</b></td>
    </tr>';
			}
			elseif(strpos($user," ")) { echo '<tr>
    <td colspan="2"><b class="red">Utilizador inválido.</b></td>
    </tr>'; }
			elseif($nrusers=="1") { echo '<tr>
    <td colspan="2"><b class="red">Utilizador existente na base de dados.</b></td>
    </tr>'; }
			
			
			else { $userverif="true";}
  }
  ?>
  <tr>
    <td>Password:*</td>
    <td><input type="password" name="pass" id="pass"></td>
  </tr>
  <tr>
    <td>Repetir Password*</td>
    <td><input type="password" name="passr" id="passr"></td>
  </tr>
  <?php
  if($verif!="") {
  if($pass=="") { 
  
  echo '<tr>
    <td colspan="2"><b class="red">Insira uma password!</b></td>
    </tr>';
  
  } 
  
  
  
 elseif(strlen($pass)  < 4 or strlen($pass) > 25) {
	
	 echo '<tr>
    <td colspan="2"><b class="red">Pass entre 4 e 25 caracteres!</b></td>
    </tr>';
	
	  }
	  
	  elseif(strpos($pass," ")) { echo '<tr>
    <td colspan="2"><b class="red">Password inválida.</b></td>
    </tr>'; }
	  else {
		  
		  if($pass!=$passr) {  echo '<tr>
    <td colspan="2"><b class="red">Passwords não correspondem!</b></td>
    </tr>';}
	
	else {
		$passverif="true";
		
		}
	  }
  }
  ?>
  <tr>
    <td>Email:*</td>
    <td><input name="email" type="text" id="email" value="<?php echo $email; ?>"></td>
  </tr>
  <?php 
  if($verif!="") {
	   $procuraremails = mysql_query ( "SELECT count(*) from utilizadores WHERE email='". $email . "'" );
 list ( $nremails ) = mysql_fetch_row (  $procuraremails );
  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) { echo '<tr>
    <td colspan="2"><b class="red">Email incorrecto!</b></td>
    </tr>'; }
	
	elseif($nremails=="1") { echo '<tr>
    <td colspan="2"><b class="red">Email existente na base de dados.</b></td>
    </tr>'; }
	
	elseif($email==$emailadmin) { echo '<tr>
    <td colspan="2"><b class="red">Email invalido!</b></td>
    </tr>'; }
  
 else {
	
	  $emailverif="true"; 
	
	  }
  }
   ?>
    <tr>
    <td>Nome Completo:*</td>
    <td><input name="pnome" type="text" id="pnome" size="40" value="<?php echo $pnome; ?>"></td>
  </tr>
   <?php
    if($verif!="") {
		if(strlen($pnome)  < 10 or strlen($pnome) > 50) {
			echo '<tr>
    <td colspan="2"><b class="red">O seu nome tem de ter entre 10 a 50 caracteres.</b></td>
    </tr>';
			}
			else { $nomeverif="true";}
  }
  ?>
  <tr>
    <td colspan="2" align="center">Dados Facultativos:(Para complementar o perfil.)</td>
    </tr>
 
  <tr>
    <td>Idade:</td>
    <td><input name="morada" type="text" id="morada" value="<?php echo $morada; ?>" size="8" maxlength="2"></td>
  </tr>
   <?php
    if($verif!="") {
		if($morada=="") { $moradaverif="true";}
		else {
		if(strlen($morada)  < 1 or strlen($morada) > 2) {
			echo '<tr>
    <td colspan="2"><b class="red">A sua idade só pode ter 1 ou 2 caracteres.</b></td>
    </tr>';
			}
			elseif(!is_numeric($morada)) {
				echo '<tr>
    <td colspan="2"><b class="red">A sua idade tem de ser um número.</b></td>
    </tr>';
				}
			else { $moradaverif="true";}
		}
  }
  ?>
  <tr>
    <td>Localidade:</td>
    <td><input type="text" name="codigo" id="codigo" value="<?php echo $codigo; ?>"></td>
  </tr>
   <?php
    if($verif!="") {
		if($codigo=="") { $codigoverif="true";}
		else {
		if(strlen($codigo)  < 3 or strlen($codigo) > 25) {
			echo '<tr>
    <td colspan="2"><b class="red">Localidade entre 3 a 25 caracteres.</b></td>
    </tr>';
			}
			
	
			else { $codigoverif="true";}
		}
  }
  ?>

    <td>Site:</td>
    <td><input type="text" name="telefone" id="telefone" value="<?php echo $telefone; ?>"></td>
  </tr>
   <?php
    if($verif!="") {
		if($telefone=="") { $telefoneverif="true";}
		else {
			
		if(strlen($telefone)  < 8 or strlen($telefone) > 60) {
			echo '<tr>
    <td colspan="2"><b class="red">O seu site tem de ter entre 8 a 60 caracteres.</b></td>
    </tr>';
			}
			
			else { $telefoneverif="true";}
		}
  }
  ?>
  <tr>
    <td>Sobre mim:</td>
    <td><textarea name="site" cols="30" rows="4"><?php echo $site; ?></textarea></td>
  </tr>
   <?php
    if ($HTTP_SERVER_VARS['REQUEST_METHOD'] == 'POST'){
      print $validator->getError();
  }
  if ($HTTP_SERVER_VARS['REQUEST_METHOD'] == 'POST' && !checkAnswer()){
      print '<tr>
    <td colspan="2"><b class="red">A questão anti-spam não foi respondida correctamente!.</b></td>
    </tr>';
  }
else {
	if($_POST["verif"]!="") {
		
		$spamverif="true";
		}
	
	}
  
  ?>
    <tr>
    <td><?php print AskQuestion();?> <br/>
      (anti spam)</td>
    <td><input name="Spamtrap" type="text" value="<?php echo $site; ?>" cols="30" rows="4"></td>
  </tr>
    <?php
    if($verif!="") {
		if($site=="") { $siteverif="true";}
		else {
		if(strlen($site)  < 20 or strlen($site) > 600) {
			echo '<tr>
    <td colspan="2"><b class="red">Sobre mim tem de ter entre 20 a 600 caracteres.</b></td>
    </tr>';
			}
			else { $siteverif="true";}
		}
  }
  ?>
  <tr>
    <td colspan="2"><input type="submit" name="button" id="button" value="Registar!">
      <input name="verif" type="hidden" id="verif" value="ok"></td>
    </tr>
</table>
	  
        </form>
        <?php
		    if($verif!="") {

		if($telefoneverif=="true" and  $codigoverif=="true" and $moradaverif=="true" and $nomeverif=="true" and $emailverif=="true" and $passverif =="true" and $userverif=="true" and $siteverif=="true" and $spamverif=="true")
		{
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
	$mail->Subject  = "Registo de conta - unitedskating.com"; // Assunto da mensagem
	$mail->Body = '<style>
h1 {
	font-size: 30px;
	font-family: Arial, Helvetica, sans-serif;
}
.cinza {
	color:#999;
}
</style></head><body>
<h1>&nbsp;</h1>
<table width="484" border="0">
  <tr>
    <td width="100"><b><img src="'.$hostsite.'/images/logomail.jpg"></b></td>
    <td width="374"><b><h1>'.$titulosite.'</h1></b></td>
  </tr>
</table>
<hr>
Olá '.$pnome.' , foi enviado um pedido de registo no site em seu nome, com o seu email. Caso não tenha sido você, ignore este email, e se estes emails continuarem a chegar à sua caixa de correio fale com o administrador através do email '.$emailadmin.'. <p>

 Os seus dados são:
<p><span class="cinza">****************************************************************<br />
Utilizador: '.$user.'
<br />Email: '.$email.'
<br /> Password: '.$pass.'
<br/> Nome Completo: '.$pnome.'
<br /> Idade: '.$morada.'
<br /> Localidade: '.$codigo.'
<br /> Site: '.$telefone.'<br />
<br /> Sobre mim: '.$site.'<br />
****************************************************************</span><br>
Para activar a sua conta, clique <a href="'.$hostsite.'/registar2.php?user='.$user.'&id='.md5($pass).'&mode='.$modo.'">aqui!</a><br>
  Com os melhores cumprimentos, o Administrador.';
	$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
	
		$mail2 = new PHPMailer();

	$mail2->IsSMTP(); // Define que a mensagem será SMTP
	$mail2->Host = "smtp.unitedskating.com"; // Endereço do servidor SMTP
	$mail2->SMTPAuth = true;
	$mail2->Username = 'geral@unitedskating.com';
	$mail2->Password = 'Bateaporta123@';
	$mail2->From = "sem-resposta@unitedskating.com"; // Seu e-mailm
	$mail2->FromName = "unitedskating"; // Seu nome
	$mail2->AddAddress($emailadmin);
	$mail2->IsHTML(true); // Define que o e-mail será enviado como HTML
	//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	 	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail2->Subject  = "Novo utilizador registado - unitedskating"; // Assunto da mensagem
	$mail2->Body = '<style>
h1 {
	font-size: 30px;
	font-family: Arial, Helvetica, sans-serif;
}
.cinza {
	color:#999;
}
</style></head><body>
<h1>&nbsp;</h1>
<table width="484" border="0">
  <tr>
    <td width="100"><b><img src="http://www.unitedskating.com/images/logomail.jpg"></b></td>
    <td width="374"><b><h1>Unitedskating</h1></b></td>
  </tr>
</table>
<hr>
Caro administrador, o utilizador '.$user.' registou-se. <p>

 Os seus dados são:
<p><span class="cinza">****************************************************************<br />
<br />Email: '.$email.'
<br/> Nome Completo: '.$pnome.'
<br /> Idade: '.$morada.'
<br /> Localidade: '.$codigo.'
<br /> Site: '.$telefone.'<br />
<br /> Sobre mim: '.$site.'<br />
****************************************************************</span><br>
  Com os melhores cumprimentos, o Administrador.';
	$enviado2 = $mail2->Send();
	$mail2->ClearAllRecipients();
	$mail2->ClearAttachments();

$pass = md5($pass);
$data = date("Y-m-d",$timeAfterOneHour);
$hora = date("H:i:s",$timeAfterOneHour);
				mysql_query("INSERT INTO utilizadores (user,pass,email,pnome,ultimoip,morada,codigo,telefone,activo,datareg,dataregi,horareg,site)
VALUES ('$user', '$pass', '$email', '$pnome', '$ip', '$morada', '$codigo', '$telefone', 'nao', '$timeAfterOneHour', '$data', '$hora', '$site' )");
 echo '<script type="text/javascript">

<!--
window.location = "blog.php?msg=registado&mode='.$modo.'"
//-->
</script>';
			}
			
			else {
					echo '<div align="center"><b class="red">Existem erros para corrigir!</b></div>';

				}
			}
		?>
					
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
