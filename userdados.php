<?php
 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");
	 }
	 $modo = $_GET["mode"];
include("config.php");
 $querysec = mysql_query ( "SELECT * from utilizadores WHERE securitymd5='".$_COOKIE["user"] . "'" );
 $security = mysql_fetch_array ( $querysec );
 if(isset($_COOKIE["user"]) and $_COOKIE["user"]==$security["securitymd5"] ) {
	 



include("topo.php");
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
               <h2> editar dados. </h2>
					
					  <?php
			 $array2 = mysql_query("SELECT * FROM utilizadores WHERE user='".$security["user"]."'");
$row = mysql_fetch_array($array2);
			 

$user = $row["user"];
$email = $row["email"];
$pnome = $row["pnome"];
$morada = $row["morada"];
$codigo = $row["codigo"];
$telefone = $row["telefone"];
		 
		$site = $row["site"];	
			
			
				  
			  $verif = $_POST["verif"];
			
			 
			  if($verif!="") { 
			  
			   $pass = $_POST["pass"];
			    $passAR = $_POST["passAR"];
			 $email = $_POST["email"];
			 $pnome = $_POST["pnome"];
			 $morada = $_POST["morada"];
			 $codigo = $_POST["codigo"];
			 $telefone = $_POST["telefone"];
			$passactual = $_POST["passactual"];
			 $site = $_POST["site"];
			  
			
			  }
				  
			 ?>
                <?php
				$a = $_GET["a"];
				  if($a=="editado") {
			   echo '<div align="center" class="red">Dados editados com suceso!</div>';
			   }
				?>
           <form action="userdados.php?mode=<?php echo $modo ;?>" method="post">     <table width="500" height="227" border="1" bordercolor="#990000">
  <tr>
    <td width="64">Utilizador:</td>
    <td width="120"><label for="user"></label>
    <input type="text" name="user" id="user" value="<?php echo $user; ?>" readonly="readonly">
    (não é possivel alterar)</td>
  </tr>
 
 
  
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
    <input name="pnome" type="text" id="pnome" value="<?php echo $pnome; ?>" size="35"></td>
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
    <td colspan="2"><b class="red">O seu site tem de ter entre 8 a 60 caracteres.</b></td>
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
    <td colspan="2" align="center">Password: <input name="checkpass" type="checkbox" value="" <?php if(isset($_POST["checkpass"])) { echo 'checked="checked"'; } ?> />(Alterar)</td>
  </tr>
   <tr>
    <td>Password Actual:</td>
    <td><label for="pass"></label>
    <input type="password" name="passactual" id="pass"></td>
  </tr>
   <tr>
    <td>Nova Password:</td>
    <td><label for="pass"></label>
    <input type="password" name="pass" id="pass"></td>
  </tr>
  <tr>
    <td>Repetir Password:</td>
    <td>
    <input type="password" name="passAR" id="pass"   ></td>
  </tr>
   <?php 
  if($verif!="") {
	
	  if(isset($_POST["checkpass"])) { 
	$procurarpass = mysql_query ( "SELECT * from utilizadores WHERE user='". $user . "'" );
 $ppass = mysql_fetch_array (  $procurarpass );
	if(md5($passactual)==$ppass["pass"])
	
{
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
	  
	  else {
		  
		  if($pass!=$passAR) {  echo '<tr>
    <td colspan="2"><b class="red">Passwords não correspondem!</b></td>
    </tr>';}
	
	else {
		$passverif="true";
		}
	  }
		  
}

elseif($passactual=="") {echo '<tr>
    <td colspan="2"><b class="red">Escreva a password actual!</b></td>
    </tr>';}
else {
	echo '<tr>
    <td colspan="2"><b class="red">Passwords actual errada!</b></td>
    </tr>';
	}
		  
		  }
		  
	  
	
	 
		  else {
			  $passverif="true"; 
			  
		  }
		  
  }
   ?>
  <tr>
    <td colspan="2"><input name="verif" type="hidden" id="verif" value="ok"><input type="submit" name="button" id="button" value="Editar"></td>
  </tr>
</table>
</form>
                <?php
		    if($verif!="") {

		if($telefoneverif=="true" and  $codigoverif=="true" and $moradaverif=="true" and $nomeverif=="true" and $emailverif=="true" and $passverif =="true" and $siteverif=="true")
		{
			
			$titulo = "Utilizador alterou dados - unitedskating";

 
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
    <td width="100"><b><img src="http://www.unitedskating.com/images/logomail.jpg"></b></td>
    <td width="374"><b><h1>Unitedskating</h1></b></td>
  </tr>
</table>
<hr>
Caro administrador, o utilizador '.$user.' alterou os seus dados. <p>

 Os seus dados são:
<p><span class="cinza">****************************************************************<br />
<br />Email: '.$email.'
<br /> Password: '.$pass.'
<br/> Nome Completo: '.$pnome.'
<br /> Idade: '.$morada.'
<br /> Localidade: '.$codigo.'
<br /> Site: '.$telefone.'<br />
<br /> Sobre mim: '.$site.'<br />
****************************************************************</span><br>
  Com os melhores cumprimentos, o Administrador.
</body></html>';

$cabeca = "MIME-Version: 1.0\r\n";
$cabeca.= "Content-type: text/html; charset=utf-8\r\n";
$cabeca.= "From: ".$emailadmin."";
mail($emailadmin,$titulo,$mensagem,$cabeca);
if($pass=="") {$pass=$row["pass"];}
else {
$pass = md5($pass);
}
				mysql_query("UPDATE utilizadores SET pass='$pass', email='$email', pnome='$pnome',morada='$morada', codigo='$codigo', telefone='$telefone', site='$site'");
 echo '<script type="text/javascript">

<!--
window.location = "userdados.php?a=editado&mode='.$modo.'"
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
	 echo '<script type="text/javascript">

<!--
window.location = "blog.php?mode='.$modo.'"
//-->
</script>';

}
?>
