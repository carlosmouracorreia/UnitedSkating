<?php

 include('../config.php');
if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
$array2 = mysql_query("SELECT * FROM configs");
$lconfig = mysql_fetch_array($array2);
$tempologinhoras = $lconfig["tempologin"] /3600;
?>



			<?php include ("barra.php"); ?>
				<div class="entry"><h2>CONFIGS</h2>
                <?php
				$msg = $_GET["msg"];
				if($msg=="ok") {
					echo '<br><div align="center"><b class="red">Alteraçoes feitas com sucesso!</b></div>';
					}
$ppp = $_POST["ppp"];
$tempoespera = $_POST["tempoespera"];
$tempologin = $_POST["tempologin"];
$nrtenta = $_POST["nrtenta"];
$tempoblock = $_POST["tempoblock"];
$titulosite = $_POST["titulosite"];
$descsite = $_POST["descsite"];
$titulosidebar = $_POST["titulosidebar"];
$textosidebar = $_POST["textosidebar"];
$hostsite = $_POST["hostsite"];
$useradmin = $_POST["useradmin"];
$emailadmin = $_POST["emailadmin"];
$pass = $_POST["pass"];
$passAR = $_POST["passAR"];
$validrecup = $_POST["validrecup"];
$verif = $_POST["verif"];
$passfinal = md5($pass);
$passactual = $_POST["passactual"];
$poderc = $_POST["poderc"];
 if($poderc=="sim") { $acts="selected"; }  
				  if($poderc=="nao") { $actn="selected"; }
				  
$array2 = mysql_query("SELECT * FROM configs");
$lconfig = mysql_fetch_array($array2);
?>
              <form action="configs.php" method="post">  <table width="335" border="1" align="center" bordercolor="#CCCCCC">
  <tr>
    <td colspan="2"><div align="center" class="red">CONFIGS ALEATORIAS:</div></td>
    </tr>
  <tr>
    <td width="152">Posts por P&aacute;gina:</td>
    <td width="167">
      <input name="ppp" type="text" value="<?php echo $lconfig["ppp"]; ?>" /></td>
  </tr>
  <?php 
  if($verif!="") {
  if(!is_numeric($ppp)) { echo '<tr>
    <td colspan="2"><b class="red">Isto não é um numero!</b></td>
    </tr>'; }
  
 else {
	 if($ppp < 1 or $ppp > 30) {  echo '<tr>
    <td colspan="2"><b class="red">Insira um numero entre 1 e 30!</b></td>
    </tr>'; }
	
	else {
	  $pppverif="true"; 
	}
	  }
  }
   ?>
  <tr>
    <td>Tempo espera entre comments:(segundos)</td>
    <td><input type="text" name="tempoespera" value="<?php echo $lconfig["tempoespera"]; ?>" /></td>
  </tr>
  <?php 
  if($verif!="") {
  if(!is_numeric($tempoespera)) { echo '<tr>
    <td colspan="2"><b class="red">Isto não é um numero!</b></td>
    </tr>'; }
  
 else {
	 if($tempoespera < 1 or $tempoespera > 100000) {  echo '<tr>
    <td colspan="2"><b class="red">Insira um numero entre 1 e 100000!</b></td>
    </tr>'; }
	
	else {
	  $tempoesperaverif="true"; 
	}
	  }
  }
   ?>
  <tr>
    <td> validade ticket recup password: (horas)</td>
    <td><input name="validrecup" type="text" id="validrecup" value="<?php echo $lconfig["validrecup"]; ?>" /></td>
  </tr>
  <?php 
  if($verif!="") {
  if(!is_numeric($validrecup)) { echo '<tr>
    <td colspan="2"><b class="red">Isto não é um numero!</b></td>
    </tr>'; }
  
 else {
	 if($validrecup < 1 or $validrecup > 24) {  echo '<tr>
    <td colspan="2"><b class="red">Insira um numero entre 1 e 24!</b></td>
    </tr>'; }
	
	else {
	  $validrecupverif="true"; 
	}
	  }
  }
   ?>
   <tr>
    <td> Poder comentar sem login:</td>
    <td><?php if(!isset($_POST["verif"])) { if($lconfig["podercom"]=="sim") { $acts="selected"; }  
				  if($lconfig["podercom"]=="nao") { $actn="selected"; }} ?><select name="poderc">
        <option value="sim" <?php echo $acts; ?>>sim</option>
        <option value="nao" <?php echo $actn; ?>>nao</option>
    </select>    </td>
  </tr>
  <tr>
    <td colspan="2"><div align="center" class="red">CONFIGS LOGIN:</div></td>
    </tr>
  <tr>
    <td>Tempo de login users: (horas)</td>
    <td><input type="text" name="tempologin" value="<?php echo $tempologinhoras; ?>" /></td>
  </tr>
  <?php 
  if($verif!="") {
  if(!is_numeric($tempologin)) { echo '<tr>
    <td colspan="2"><b class="red">Isto não é um numero!</b></td>
    </tr>'; }
  
 else {
	 if($tempologin < 0.001 or $tempologin > 100) {  echo '<tr>
    <td colspan="2"><b class="red">Insira um numero entre 0.001 e 100!</b></td>
    </tr>'; }
	
	else {
	  $tempologinverif="true"; 
	}
	  }
  }
   ?>
  <tr>
    <td>Numero de tentativas login:</td>
    <td><input type="text" name="nrtenta" value="<?php echo $lconfig["nrtenta"]; ?>" /></td>
  </tr>
    <?php 
  if($verif!="") {
  if(!is_numeric($nrtenta)) { echo '<tr>
    <td colspan="2"><b class="red">Isto não é um numero!</b></td>
    </tr>'; }
  
 else {
	 if($nrtenta < 1 or $nrtenta > 20) {  echo '<tr>
    <td colspan="2"><b class="red">Insira um numero entre 1 e 20!</b></td>
    </tr>'; }
	
	else {
	  $nrtentaverif="true"; 
	}
	  }
  }
   ?>
  <tr>
    <td>Tempo de bloqueio login: (segundos)</td>
    <td><input type="text" name="tempoblock" value="<?php echo $lconfig["tempoblock"]; ?>" /></td>
  </tr>
    <?php 
  if($verif!="") {
  if(!is_numeric($tempoblock)) { echo '<tr>
    <td colspan="2"><b class="red">Isto não é um numero!</b></td>
    </tr>'; }
  
 else {
	 if($tempoblock < 1 or $tempoblock > 500) {  echo '<tr>
    <td colspan="2"><b class="red">Insira um numero entre 1 e 500!</b></td>
    </tr>'; }
	
	else {
	  $tempoblockverif="true"; 
	}
	  }
  }
   ?>
  <tr>
    <td colspan="2"><div align="center" class="red">SITE:</div></td>
    </tr>
  
   <?php 
  if($verif!="") {
  if(strlen($textosidebar)  < 5 or strlen($textosidebar) > 200 ) { echo '<tr>
    <td colspan="2"><b class="red">Texto da sidebar entre 5 e 200 caracteres!</b></td>
    </tr>'; }
  
 else {
	
	  $textosidebarverif="true"; 
	
	  }
  }
   ?>
  <tr>
    <td>Host Site:</td>
    <td><input type="text" name="hostsite" value="<?php echo $lconfig["hostsite"]; ?>" /></td>
  </tr>
   <?php 
  if($verif!="") {
  if(strlen($hostsite)  < 5 or strlen($hostsite) > 100 ) { echo '<tr>
    <td colspan="2"><b class="red">Host site entre 5 e 100 caracteres!</b></td>
    </tr>'; }
  
 else {
	
	  $hostsiteverif="true"; 
	
	  }
  }
   ?>
  <tr>
    <td colspan="2"><div align="center" class="red">ADMIN: <a name="admin"></a></div></td>
    </tr>
  <tr>
    <td>Utilizador:</td>
    <td><input type="text" name="useradmin" value="<?php echo $lconfig["useradmin"]; ?>" /></td>
  </tr>
   <?php 
  if($verif!="") {
  if(strlen($useradmin)  < 4 or strlen($useradmin) > 25 ) { echo '<tr>
    <td colspan="2"><b class="red">User entre 5 e 25 caracteres!</b></td>
    </tr>'; }
  
 else {
	
	  $useradminverif="true"; 
	
	  }
  }
   ?>
  
  
  <tr>
    <td>Email:</td>
    <td><input type="text" name="emailadmin" value="<?php echo $lconfig["emailadmin"]; ?>" />
      <input name="verif" type="hidden" id="verif" value="ok"></td>
  </tr>
     <?php 
  if($verif!="") {
  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emailadmin)) { echo '<tr>
    <td colspan="2"><b class="red">Email incorrecto!</b></td>
    </tr>'; }
  
 else {
	
	  $emailadminverif="true"; 
	
	  }
  }
   ?>
   <tr>
    <td colspan="2" align="center" class="red">PASSWORD: 
      <input name="checkpass" type="checkbox" value="" <?php if(isset($_POST["checkpass"])) { echo 'checked="checked"'; } ?> />(Alterar)</td>
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
	$procurarpass = mysql_query ( "SELECT * from configs" );
 $ppass = mysql_fetch_array (  $procurarpass );
	if(md5($passactual)==$ppass["passadmin"])
	
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
$passverif2="true";
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
			   $passfinal = $lconfig["passadmin"];
		  }
		  
  }
   ?>
  <tr>
    <td colspan="2"><input type="submit" name="button" id="button" value="Enviar" /></td>
    </tr>
              </table>
</form>
<?php
if($verif!="") {
	
	$tempologin = $tempologin * 3600;

if($emailadminverif=="true" and $passverif=="true" and $useradminverif=="true" and  $hostsiteverif=="true" and  $tempoblockverif=="true" and $nrtentaverif=="true" and $tempologinverif=="true" and $validrecupverif=="true" and  $tempoesperaverif=="true" and $pppverif=="true") {
mysql_query("UPDATE configs SET ppp='".$ppp."', tempoespera='".$tempoespera."', tempologin='".$tempologin."', nrtenta='".$nrtenta."', tempoblock='".$tempoblock."', hostsite='".$hostsite."', useradmin='".$useradmin."', emailadmin='".$emailadmin."', passadmin='".$passfinal."', validrecup='".$validrecup."', podercom='".$poderc."'");

if($passverif2=="true") {
	echo '<script type="text/javascript">

<!--
window.location = "../blog.php?mode=pt&msg=password"
//-->
</script>';
}
else {
echo '<script type="text/javascript">

<!--
window.location = "configs.php?msg=ok'.$passlolada.'"
//-->
</script>';
}
}

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
window.location = "../index.php"
//-->
</script>';
}
?>