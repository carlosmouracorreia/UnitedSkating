<?php include('../config.php');
if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
?>
<?php 
 $id = $_GET["user"];
 $numcom23 = mysql_query ( "SELECT count(*) from utilizadores WHERE id='".$id."'" );
 list ( $numcom5 ) = mysql_fetch_row ( $numcom23 );
 
 if($numcom5!=0) {
	 $array2 = mysql_query("SELECT * FROM utilizadores WHERE id='".$id."'");
$row = mysql_fetch_array($array2);
?>


			<?php include ("barra.php"); ?>
				
  
                <h2>Editar utilizador "<?php echo $row["user"]; ?>": </h2>
             <?php
			 
			 

$user = $row["user"];
$email = $row["email"];
$pnome = $row["pnome"];
$morada = $row["morada"];
$codigo = $row["codigo"];
$telefone = $row["telefone"];
		$activo = $row["activo"];	 
		$site = $row["site"];	
			
			 if($activo=="sim") { $acts="selected"; }  
				  if($activo=="nao") { $actn="selected"; }
				  
			  $verif = $_POST["verif"];
			
			 
			  if($verif!="") { 
			  $user = $_POST["user"];
			   $pass = $_POST["pass"];
			 $email = $_POST["email"];
			 $pnome = $_POST["pnome"];
			 $morada = $_POST["morada"];
			 $codigo = $_POST["codigo"];
			 $telefone = $_POST["telefone"];
			 $activo = $_POST["activo"];
			 $site = $_POST["site"];
			  
			  if($activo=="sim") { $acts="selected"; }  
				  if($activo=="nao") { $actn="selected"; }
			  }
				  
			 ?>
                <div align="center">
           <form action="user.php?user=<?php echo $id; ?>" method="post">     <table width="500" height="227" border="1" bordercolor="#00FF00">
  <tr>
    <td width="64">Utilizador:</td>
    <td width="120"><label for="user"></label>
    <input type="text" name="user" id="user" value="<?php echo $user; ?>"></td>
  </tr>
  <?php
    if($verif!="") {
 $procurarusers = mysql_query ( "SELECT count(*) from utilizadores WHERE user='". $user . "'" );
 list ( $nrusers ) = mysql_fetch_row (  $procurarusers );
		
		if(strlen($user)  < 3 or strlen($user) > 12) {
			echo '<tr>
    <td colspan="2"><b class="red">O nome de utilizador tem de ter entre 3 a 12 caracteres.</b></td>
    </tr>';
			}
			elseif(strpos($user," ")) { echo '<tr>
    <td colspan="2"><b class="red">Utilizador inválido.</b></td>
    </tr>'; }
			elseif($nrusers=="1") {
				if($user==$row["user"]){ $userverif="true"; }
				else {
				 echo '<tr>
    <td colspan="2"><b class="red">Utilizador existente na base de dados.</b></td>
    </tr>';
				}
	 }
			
			
			else { $userverif="true";}
  }
  ?>
  <tr>
    <td>Password:</td>
    <td><label for="pass"></label>
    <input type="password" name="pass" id="pass"></td>
  </tr>
  <?php
  if($verif!="") {
  if($pass=="") { 
  
  $passverif="true";
  
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
		$passverif="true";
		
		
	  }
  }
  ?>
  <tr>
    <td>Email:</td>
    <td><label for="email"></label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>"></td>
  </tr>
   <?php 
  if($verif!="") {
	   $procuraremails = mysql_query ( "SELECT count(*) from utilizadores WHERE email='". $email . "'" );
 list ( $nremails ) = mysql_fetch_row (  $procuraremails );
  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) { echo '<tr>
    <td colspan="2"><b class="red">Email incorrecto!</b></td>
    </tr>'; }
	
	elseif($nremails=="1") { 
	if($email==$row["email"]){ $emailverif="true"; }
	else {
	echo '<tr>
    <td colspan="2"><b class="red">Email existente na base de dados.</b></td>
    </tr>'; 
	}
	}
	
	elseif($email==$emailadmin) { echo '<tr>
    <td colspan="2"><b class="red">Email invalido!</b></td>
    </tr>'; }
  
 else {
	
	  $emailverif="true"; 
	
	  }
  }
   ?>
  <tr>
    <td>Nome:</td>
    <td><label for="pnome"></label>
    <input name="pnome" type="text" id="pnome" value="<?php echo $pnome; ?>" size="45"></td>
  </tr>
  <?php
    if($verif!="") {
		if(strlen($pnome)  < 10 or strlen($pnome) > 50) {
			echo '<tr>
    <td colspan="2"><b class="red">O nome tem de ter entre 10 a 50 caracteres.</b></td>
    </tr>';
			}
			else { $nomeverif="true";}
  }
  ?>
   <tr>
    <td>Idade:</td>
    <td><label for="morada"></label>
    <input name="morada" type="text" id="morada" value="<?php echo $morada; ?>" size="8" maxlength="2"></td>
  </tr>
  
  <?php
    if($verif!="") {
		if($morada=="") { $moradaverif="true";}
		else {
		if(strlen($morada)  < 1 or strlen($morada) > 2) {
			echo '<tr>
    <td colspan="2"><b class="red">A idade só pode ter 1 ou 2 caracteres.</b></td>
    </tr>';
			}
			elseif(!is_numeric($morada)) {
				echo '<tr>
    <td colspan="2"><b class="red">A idade tem de ser um número.</b></td>
    </tr>';
				}
			else { $moradaverif="true";}
		}
  }
  ?>
  <tr>
    <td>Localidade:</td>
    <td><label for="codigo"></label>
    <input type="text" name="codigo" id="codigo" value="<?php echo $codigo; ?>"></td>
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

  <tr>
    <td>Site:</td>
    <td><label for="telefone"></label>
    <input type="text" name="telefone" id="telefone" value="<?php echo $telefone; ?>"></td>
  </tr>
  <?php
    if($verif!="") {
		if($telefone=="") { $telefoneverif="true";}
		else {
			
		if(strlen($telefone)  < 8 or strlen($telefone) > 60) {
			echo '<tr>
    <td colspan="2"><b class="red">Site tem de ter entre 8 a 60 caracteres.</b></td>
    </tr>';
			}
			
			else { $telefoneverif="true";}
		}
  }
  ?>
   <tr>
    <td>Sobre mim:</td>
    <td><textarea name="site" cols="40" rows="4" id="site"><?php echo $site; ?></textarea></td>
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
    <td>Activo:</td>
    <td><label for="activo"></label>
      <select name="activo" id="activo">
        <option value="sim" <?php echo $acts; ?>>sim</option>
        <option value="nao" <?php echo $actn; ?>>nao</option>
    </select>      <label for="textfield8"></label></td>
  </tr>
  <tr>
    <td colspan="2"><input name="verif" type="hidden" id="verif" value="ok"><input type="submit" name="button" id="button" value="Editar"></td>
  </tr>
</table>
</form>
                <?php
		    if($verif!="") {

		if($telefoneverif=="true" and  $codigoverif=="true" and $moradaverif=="true" and $nomeverif=="true" and $emailverif=="true" and $passverif =="true" and $userverif=="true" and $siteverif=="true")
		{
			
			$titulo = "Dados alterados - unitedskating";

 
$mensagem = '<html><head><style>
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
Olá '.$pnome.' , o Administrador alterou os seus dados. <p>

 Os seus dados são:
<p><span class="cinza">****************************************************************<br />
Utilizador: '.$user.'
<br />Email: '.$email.'
<br /> Password: '.$pass.'
<br/> Nome Completo: '.$pnome.'
<br /> Morada: '.$morada.'
<br /> Código Postal: '.$codigo.'
<br /> Telefone/Telemovel: '.$telefone.'<br />
<br /> Site: '.$site.'<br />
<br /> Activo: '.$activo.'<br />
****************************************************************</span><br>
  Com os melhores cumprimentos, o Administrador.
</body></html>';

$cabeca = "MIME-Version: 1.0\r\n";
$cabeca.= "Content-type: text/html; charset=utf-8\r\n";
$cabeca.= "From: ".$emailadmin."";
mail($email,$titulo,$mensagem,$cabeca);
if($pass=="") {$pass=$row["pass"];}
else {
$pass = md5($pass);
}
				mysql_query("UPDATE utilizadores SET user='$user', pass='$pass', email='$email', pnome='$pnome',morada='$morada', codigo='$codigo', telefone='$telefone', activo='$activo', site='$site'");
echo '<script type="text/javascript">

<!--
window.location = "users.php?a=editado"
//-->
</script>';			}
			
			else {
					echo '<div align="center"><b class="red">Existem erros para corrigir!</b></div>';

				}
			}
		?>

    
<?php
}
else {
	echo '<script type="text/javascript">

<!--
window.location = "users.php?a=nexiste"
//-->
</script>';	
	}
}
else {
	echo '<script type="text/javascript">

<!--
window.location = "../index.php"
//-->
</script>';
}
?>