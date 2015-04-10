<?php
include("php/v.inc");
 include("php/q.inc");
 $validator = new ValidateForm();
include("config.php");
 date_default_timezone_set('GMT');
					$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$ip = $_SERVER['REMOTE_ADDR'];
$resultado = mysql_query ( "SELECT * from loginado WHERE ip='". $ip . "'" );
 $linha= mysql_fetch_array($resultado);
  $dif = $timeAfterOneHour - $linha["tempo"];
  
   $numcom305 = mysql_query ( "SELECT count(*) from loginado WHERE ip='". $ip . "'" );
 list ( $contlogin5 ) = mysql_fetch_row ( $numcom305 );
 
 
		
 $querysec = mysql_query ( "SELECT * from utilizadores WHERE securitymd5='".$_COOKIE["user"] . "'" );
 $security = mysql_fetch_array ( $querysec );
 
  $resultado3 = mysql_query ( "SELECT * from utilizadores WHERE user='".$security["user"] . "'" );
 $linha3 = mysql_fetch_array($resultado3);
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
<title>unitedskating - skate e cultura em português</title>
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
			
            <?php
$data = date("Y-m-d",$timeAfterOneHour);
$hora = date("H:i:s",$timeAfterOneHour);
$id = $_GET["a"];
$b = $_GET["b"];
$modo = $_GET["mode"];
 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	 echo '<script type="text/javascript">

<!--
window.location = "index.php"
//-->
</script>';
	 }
if($modo=="pt") {
$result = mysql_query("SELECT * FROM blog WHERE id='$id'");
} else {
	$result = mysql_query("SELECT * FROM blog2 WHERE id='$id'");
}
if(!$result) { echo "erro de selecionar tabela";}

?>
<div id="menu">
				<ul>
					<li class="current_page_item"><a href="index.php">Portal</a></li>
 <li><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li><a href="shopsparks.php">Shops/Parks</a></li>
<li><a href="fotofilme.php">Foto/Filme</a></li>
					<li <?php  if($modo=="pt") { echo 'class="current_page_item2"';}?>><a href="blog.php?mode=pt">Nacional</a></li>
					<li <?php  if($modo=="global") { echo 'class="current_page_item2"';}?>><a href="blog.php?mode=global">l&aacute; fora</a></li>
					
                                       
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
      <?php

$row = mysql_fetch_array($result);
  	if($row['datau']!="") {
			$ifedit = '<br /> <b class="red3"> Ultima edição em: </b> '. $row['datau'] . ' ás '. $row['horau'] . '';	
			} else { $ifedit = ''; }
  echo '
	    <div class="post">
				<h2 class="title"><a href="#">'. $row['titulo'] . '</a> </h2>
				<p class="meta"> <b class="red3"> Data: </b> '. $row['data'] . ' ás '. $row['hora'] . ' <b class="red3">&nbsp; Autor: </b>   '.$row['autor'].' '.$ifedit.' '.$comlink.''.$comtrue.''.$comlink2.'   </p> 
				<div class="entry">
					'. $row['post'] . ' <p> '.$tags.''.$tag1.''.$tag2.''.$tag3.' </p>	<br />
										<b class="red3"> tags: </b>  <a href="tags.php?tag='. $row['tag1'] . '&mode='.$modo.'">'. $row['tag1'] . ' </a> <a href="tags.php?tag='. $row['tag2'] . '&mode='.$modo.'">'. $row['tag2'] . '</a> <a href="tags.php?tag='. $row['tag3'] . '&mode='.$modo.'"> '. $row['tag3'] . ' </a> </div>
		</div>
       
	';
        if($modo=="pt") {
		$result2 = mysql_query("SELECT * FROM `comments` WHERE post='$id' and modo='pt' ORDER BY id DESC"); }
		else {
	    $result2 = mysql_query("SELECT * FROM `comments` WHERE post='$id' and modo='global' ORDER BY id DESC"); }

		

if(!$result2) { echo "erro de selecionar tabela";}
  if($modo=="pt") {
$numcom2 = mysql_query ( "SELECT count(*) from comments WHERE post='$id' and modo='pt'" );
  }
  else { 
  $numcom2 = mysql_query ( "SELECT count(*) from comments WHERE post='$id' and modo='global'" );

  }
 list ( $numcom ) = mysql_fetch_row ( $numcom2 );
$postid = $row['id'];
if($id=="" or $id!=$postid) {  echo '<script type="text/javascript">

<!--
window.location = "index.php"
//-->
</script>'; }
?>

<div class="post">
				<a name="co"></a>
				<div class="meta"><h2 class="title">Coment&aacute;rios (<?php echo "$numcom"; ?>) </h2>
				</div> <div class="entry"><a name="co2"></a>
				  <?php
				$idco = $_GET["idco"];
								$idco = mysql_real_escape_string($idco);
				 if($b=="apagado2") {
			   echo '<div align="center" class="red2">Comentário apagado com sucesso, não restaram comentários!</div>';
			   }
				if($b=="apagado") {
			   echo '<div align="center" class="red2">Comentário apagado com sucesso!</div>';
			   }
			    $verificar = mysql_query("SELECT * FROM comments WHERE id='".$idco."'");
			   $rowlol = mysql_fetch_array($verificar);
			   $numcom28 = mysql_query ( "SELECT * from utilizadores WHERE id='".$rowlol["userid"]."'" );
               $verific = mysql_fetch_array ( $numcom28 );
			    if($b=="apagar2" and isset($_COOKIE["user"]) and $_COOKIE["user"]==$security["securitymd5"] and $security["id"]==$verific["id"]) {
				   
					    mysql_query("DELETE FROM comments WHERE id='".$idco."'" ); 
						 echo '<script type="text/javascript">

<!--
window.location = "post.php?mode='.$modo.'&a='.$id.'&b=apagado#co"
//-->
</script>';
						}
			  if($b=="apagar" and isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
				   
					   
					    mysql_query("DELETE FROM comments WHERE id='".$idco."'" );
						if($modo=="pt") { $numcom2a = mysql_query ( "SELECT count(*) from comments WHERE post='". $id . "' and modo='pt'" ); }
						else {
							 $numcom2a = mysql_query ( "SELECT count(*) from comments WHERE post='". $id . "' and modo='global'" ); 
							}
 list ( $numcom56 ) = mysql_fetch_row ( $numcom2a );
 if($numcom56==0) {  
 
 
  echo '<script type="text/javascript">

<!--
window.location = "post.php?mode='.$modo.'&a='.$id.'&b=apagado2#co"
//-->
</script>';
 
 }
 
 else {
	 
 echo '<script type="text/javascript">

<!--
window.location = "post.php?mode='.$modo.'&a='.$id.'&b=apagado#co"
//-->
</script>';
	 
					   
 }
					   }
					   
					   $envi=$_GET['env'];
  if($envi=="sim") {echo '<b class="red2">Comentário enviado com sucesso.</b><br>'; }
				
				while($row2 = mysql_fetch_array($result2))
  {
	    if($row2['tipo']=="user") {
		  $result24 = mysql_query("SELECT * FROM utilizadores WHERE id='".$row2['userid']."'");
		  $row24 = mysql_fetch_array($result24);
		   $nome = "".$row24['user']."";
		   $reg = "(Utilizador registado) (carregar no nome para informações de perfil)";
		  $site = "utilizador.php?user=".$row24['user']."&mode=".$modo."";
			 
		  }
		  
		  elseif($row2['tipo']=="admin") {  
		  $site = $hostsite;
			  $nome = $useradmin;
			  $reg = "(Administrador)";
			  }
		  else {
			  $site = $row2['site'];
			  if(!preg_match("~^(?:f|ht)tps?://~i", $site) and $site!="") {
				 $site = "http://".$site."";
				 }
			  $nome = $row2['nome'];
			  $reg = "";
			  }
			  $numcom233 = mysql_query ( "SELECT count(*) from utilizadores WHERE id='".$row2['userid']."'" );
 list ( $numcom1 ) = mysql_fetch_row ( $numcom233 );
 if($numcom1==0 and $row2['tipo']=="user") {
	 $nome = "<strike>".$row2['nome']."</strike>";
	  $reg = "User apagado";
	 }
	 
	  if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
	  ?>
       <script type="text/javascript">

                function confirmar<?php echo $row2["id"]; ?>() {
               var answer = confirm("Deseja mesmo apagar o comentário de '<?php echo $nome; ?>'?")
			   if (answer){
				  
		window.location = "post.php?mode=<?php echo $modo; ?>&a=<?php echo $id; ?>&b=apagar&idco=<?php echo $row2["id"]; ?>";
		
	}
	else{
		
	}

               }
			   </script>
       <?php
	  }
	  ?>
        <?php
	  if(isset($_COOKIE["user"]) and $_COOKIE["user"]==$security["securitymd5"] and $security["id"]==$row2['userid']) {
?>
       <script type="text/javascript">

                function confirmar<?php echo $row2["id"]; ?>() {
               var answer = confirm("Deseja mesmo apagar o seu comentário?")
			   if (answer){
				  
		window.location = "post.php?mode=<?php echo $modo; ?>&a=<?php echo $id; ?>&b=apagar2&idco=<?php echo $row2["id"]; ?>";
		
	}
	else{
		
	}

               }
			   </script>
               
               
       <?php
	  
	  }		  
	  if($site =="") { $linkarya = ""; $linkarya2 = "";}
	  else { 

	  
	  $linkarya = "<a href=" .  $site . ">";
	  $linkarya2 = "</a>"; 
	   }
  echo '<p><b class="red3"> Nome: </b> '.$linkarya.''. $nome . ''.$linkarya2.' '.$reg.' <br /> <b class="red3"> Data: </b>'. $row2['data'] . '&nbsp; ás &nbsp;'. $row2['hora'] . '<br><b class="red3">Comentário: </b><br>'. $row2['comentario'] . '<br> ';
 if($_COOKIE["admin"]==$passadmin && isset($_COOKIE["admin"])) { 
 echo '<a onclick="confirmar'.$row2["id"].'()"><u>Apagar comentário</u></a>';
 echo '<br>';
 }
if(isset($_COOKIE["user"]) and $_COOKIE["user"]==$security["securitymd5"] and $security["id"]==$row2['userid']) { 
 echo '<a onclick="confirmar'.$row2["id"].'()"><u>Apagar comentário</u></a>';
 echo '<br>';
 }

 
 echo "<hr />";
  }
  
  
  if($numcom == "0") { echo "Sem comentários, seja o primeiro!<br>";}

  
  
				?>
      <?php
			    $nomecomment = $_POST["nome"];
				$nomecomment = mysql_real_escape_string($nomecomment);
				$emailcomment = $_POST["email"];
								$emailcomment = mysql_real_escape_string($emailcomment);
				$webcomment = $_POST["website"];
												$webcomment = mysql_real_escape_string($webcomment);
				$textcomment = $_POST["comment"];
												$textcomment = mysql_real_escape_string($textcomment);
				
				$numcom6 = mysql_query ( "SELECT count(*) from comments WHERE ip='".$ip."' and modo='".$modo."'" );
 list ( $numcom8 ) = mysql_fetch_row ( $numcom6 );
 $result6 = mysql_query("SELECT * FROM comments WHERE ip='$ip' and modo='".$modo."' ORDER BY id DESC");
	  $row3 = mysql_fetch_array($result6);
	  $tempobd = $row3['datas'];
	  
 if($numcom8 > 1) {
	 $tempofim = $timeAfterOneHour - $tempobd;
	 if($tempofim < $tempoespera ) { 
	  $poder = "false";
	 }
	 
	 
	 
	 }
				
				$verif = $_POST["verif"];
				if($verif!="") {
					
				
					$textcomment = strip_tags($_POST["comment"], '<p><a><br><b>');
					if($nomecomment=="") { echo '<b class="red2">Insira um nome.</b><br>';}
					elseif(strlen($nomecomment)  < 4 or strlen($nomecomment) > 20 ) { echo '<b class="red2">Insira um nome entre 4 e 20 caracteres.</b><br>';}
					
					else { $checknome = "true"; }
					
					if($emailcomment=="") { echo '<b class="red2">Insira um email.</b><br>';}
					elseif(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emailcomment) )
 { echo '<b class="red2">Email incorrecto.</b><br>';}
					
					else { $checkemail = "true"; }
					
					if($webcomment!="") { 
					if(strlen($webcomment)  < 9 or strlen($nomecomment) > 60 ) { echo '<b class="red2">Insira um website entre 9 e 60 caracteres.</b><br>';}
					 
					 
					 else { $checklink = "true";}
					 
					 
					 
				}
					else { $checklink = "true";} 
					if($textcomment=="") { echo '<b class="red2">Insira um comentário.</b><br>';}
					elseif(strlen($textcomment)  < 10 or strlen($textcomment) > 30000 ) { echo '<b class="red2">Insira um comentário entre 10 e 30000 caracteres.</b><br>';}
					
					else {
					
					 $checkcomment = "true";
					 
					
$textcomment = wordwrap($textcomment, 85, "<br>", true);
$textcomment = nl2br($textcomment);

					 
					  }
					  
					 
    if ($HTTP_SERVER_VARS['REQUEST_METHOD'] == 'POST'){
      print $validator->getError();
  }
  if ($HTTP_SERVER_VARS['REQUEST_METHOD'] == 'POST' && !checkAnswer()){
      print "<b class='red2'>A questão anti-spam não foi respondida correctamente!</b>";
  }
else {
	if($_POST["verif"]!="") {
		
		$spamverif="true";
		}
	
	}
  
  
					
					
					if($checknome=="true" && $checkemail=="true" && $checklink=="true" && $checkcomment=="true" && $spamverif=="true") { 
					
					//tudo ok, enviar para a base de dados
					

					mysql_query("INSERT INTO comments (post,nome,email,comentario,site,data,hora,ip,datas,modo)
VALUES ('$id', '$nomecomment', '$emailcomment', '$textcomment', '$webcomment', '$data', '$hora', '$ip', '$timeAfterOneHour', '$modo')");


					
					echo '<script type="text/javascript">

<!--
window.location = "post.php?mode='.$modo.'&a='.$id.'&env=sim#co2"
//-->
</script>';
	 
					}
					
				}
				
			
					
					
					//verificar se pode voltar a comentar
					
				?> 
                
                <?php
				
				if($_COOKIE["user"]==$security["securitymd5"] and isset($_COOKIE["user"])) {
					$textcomment = $_POST["comment"];
					$userid = $_POST["userid"];
					$verif2 = $_POST["verif2"];
					$nomee = $_POST["nomee"];
				if($verif2!="") {
					if($textcomment=="") { echo '<b class="red2">Insira um comentário.</b><br>';}
					elseif(strlen($textcomment)  < 10 or strlen($nomecomment) > 30000 ) { echo '<b class="red2">Insira um comentário entre 10 e 30000 caracteres.</b><br>';}
					
					else {
					
					 $checkcomment = "true";
					 
					
$textcomment = wordwrap($textcomment, 85, "<br>", true);
$textcomment = nl2br($textcomment);
					}
					
					 if ($HTTP_SERVER_VARS['REQUEST_METHOD'] == 'POST'){
      print $validator->getError();
  }
  if ($HTTP_SERVER_VARS['REQUEST_METHOD'] == 'POST' && !checkAnswer()){
      print "<b class='red2'>A questão anti-spam não foi respondida correctamente!</b>";
  }
else {
	
	
	if($verif2!="") {
		
		$spamverif="true";
		}
}
					if($checkcomment=="true" and $spamverif=="true") { 
					mysql_query("INSERT INTO comments (post,nome,userid,comentario,data,hora,ip,datas,tipo,modo)
VALUES ('$id', '$nomee', '$userid', '$textcomment',  '$data', '$hora', '$ip', '$timeAfterOneHour', 'user', '$modo' )");


					echo '<script type="text/javascript">

<!--
window.location = "post.php?mode='.$modo.'&a='.$id.'&env=sim#co2"
//-->
</script>';
					
					}
					
				}
					if($poder!="") { echo "<b class='red2'>Escreveu um comentário à menos de $tempoespera segundos, aguarde esse tempo e volte a tentar.</b><br>";}
					
					else {
						
						?>
         <p>Deixe o seu coment&aacute;rio: <?php
					
$arrayr = mysql_query("SELECT * FROM utilizadores WHERE user='".$security["user"]."'");
$linharr = mysql_fetch_array($arrayr);
					 echo 'Logado como <b class="red2">'.$linharr["user"].'</b>' ?> </p>
                     <form id="form1" method="post" action="post.php?mode=<?php echo $modo; ?>&amp;a=<?php echo $id; ?>#co3">&nbsp;
            <label for="nome"></label>
					  
					    <input type="hidden" name="userid" id="nome" value="<?php echo $linharr["id"]; ?>" />
				    
					   
                 
				     <input name="verif2" type="hidden" value="true" /><input name="nomee" type="hidden" value="<?php echo $linha["user"]; ?>" />
				     <a name="co3" id="co3"></a>
				      
					  
					  <table width="200" border="0">
					    <tr>
					      <td width="109"><?php print AskQuestion();?>(anti/spam)</td>
					      <td width="264"><input name="Spamtrap" type="text" id="melhorfilmer2" value="<?php print $validator->get("Spamtrap");?>" /></td>
				        </tr>
					    <tr>
					      <td colspan="2"><textarea name="comment" id="comment" cols="60" rows="9"><?php echo $textcomment; ?></textarea></td>
				        </tr>
					    <tr>
					      <td><input type="submit" name="button3" id="button3" value="Enviar" /></td>
					      <td>&nbsp;</td>
				        </tr>
				       </table>
                  </form>
                    <?php
					}
					} 
					
					elseif ($_COOKIE["admin"]==$passadmin and isset($_COOKIE["admin"])) {
						$textcomment = $_POST["comment"];
					
					$verif3 = $_POST["verif3"];
				if($verif3!="") {
					if($textcomment=="") { echo '<b class="red2">Insira um comentário.</b><br>';}
					elseif(strlen($textcomment)  < 10 or strlen($nomecomment) > 30000 ) { echo '<b class="red2">Insira um comentário entre 10 e 30000 caracteres.</b><br>';}
					
					else {
					
					 $checkcomment = "true";
					 
					
$textcomment = wordwrap($textcomment, 85, "<br>", true);
$textcomment = nl2br($textcomment);
					}
					if($checkcomment=="true") { 
					mysql_query("INSERT INTO comments (post,userid,comentario,data,hora,ip,datas,tipo,modo)
VALUES ('$id', 'admin', '$textcomment',  '$data', '$hora', '$ip', '$timeAfterOneHour', 'admin', '$modo' )");


					
					echo '<script type="text/javascript">

<!--
window.location = "post.php?mode='.$modo.'&a='.$id.'&env=sim#co2"
//-->
</script>';
					}
				}
						?>
               <p>Deixe o seu coment&aacute;rio: <?php
					$array = mysql_query("SELECT * FROM configs");
$linhar = mysql_fetch_array($array);

					 echo 'Logado como <b class="red3">ADMIN</b>' ?> </p>
                     <form id="form1" method="post" action="post.php?mode=<?php echo $modo; ?>&amp;a=<?php echo $id; ?>#co4">

				      <label for="comment"></label><input name="verif3" type="hidden" value="true" />
				      <textarea name="comment" id="comment" cols="60" rows="9"><?php echo $textcomment; ?></textarea>
			        </p>
					  <p>
					    <input type="submit" name="button" id="button" value="Enviar" />
				    </p>
	              </form>
                        <?php
						}
					else {
						if($podercom=="nao")
						{ echo '<b class="red2">Precisa de estar logado para fazer comentários.</b><br>'; }
						else {
							
							if($poder!="") { echo "<b class='red2'>Escreveu um comentário à menos de $tempoespera segundos, aguarde esse tempo e volte a tentar.</b><br>";}
					
					else {
					?>
					
				  <p>Deixe o seu coment&aacute;rio: <br />
                  (*campos obrigat&oacute;rios) (Pode enviar coment&aacute;rios com o seu utilizador.)<a name="co4" id="co4"></a></p>
				  <form id="form1" method="post" action="post.php?mode=<?php echo $modo; ?>&a=<?php echo $id; ?>#co2">
			
					  <table width="554" border="0">
					    <tr>
					      <td width="146">Nome:*</td>
					      <td width="398"><input type="text" name="nome" id="nome2" value="<?php echo $nomecomment; ?>" /></td>
				        </tr>
					    <tr>
					      <td>Email:*
                            <p>
                              <label for="email"></label>(n&atilde;o ser&aacute; divulgado)</p></td>
					      <td><input type="text" name="email" id="email" value="<?php echo $emailcomment; ?>" /></td>
				        </tr>
					    <tr>
					      <td>Site:</td>
					      <td><input name="website" type="text" value="<?php echo $webcomment; ?>" /></td>
				        </tr>
					    <tr>
					      <td><?php print AskQuestion();?>(anti/spam) </td>
					      <td><input name="Spamtrap" type="text" id="melhorfilmer" value="<?php print $validator->get("Spamtrap");?>" />&nbsp;</td>
				        </tr>
					    <tr>
					      <td>Coment&aacute;rio:</td>
					      <td><textarea name="comment" id="comment" cols="40" rows="9"><?php echo $textcomment; ?></textarea></td>
				        </tr>
					    <tr>
					      <td><input type="submit" name="button2" id="button2" value="Enviar" />
				          <input name="verif" type="hidden" value="true" /></td>
					      <td>&nbsp;</td>
				        </tr>
				    </table>
                  </form>
                  
                  <?php
				  
					}
						}
					}
				  ?>
				
					<p>&nbsp;</p>
				</div>
			</div>
 
</div><!-- end #content -->
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