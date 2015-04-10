<?php
include("php/v.inc");
 include("php/q.inc");
 $validator = new ValidateForm();
$manobra = $_GET["videoid"];
if($manobra=="") { $manobranull="true"; }
elseif(!is_numeric($manobra)) { header("Location: galeria.php");}
include("topo.php");
$querysec = mysql_query ( "SELECT * from utilizadores WHERE securitymd5='".$_COOKIE["user"] . "'" );
 $security = mysql_fetch_array ( $querysec );
 $resultado3 = mysql_query ( "SELECT * from utilizadores WHERE user='".$security["user"] . "'" );
 $linha3 = mysql_fetch_array($resultado3);
$manobra = mysql_real_escape_string($manobra);
$result = mysql_query("SELECT * FROM galeria WHERE id='".$manobra."'");
$contarids = mysql_query ( "SELECT * FROM galeria  WHERE id='".$manobra."'" );
$idsnumero=mysql_num_rows($contarids);
if($idsnumero=="0" and $manobra!="") { $idsnull="true";}
?>
<div id="menu">

				<ul>
					<li class="current_page_item"><a href="index.php">Portal</a></li>
 <li><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li><a href="shopsparks.php">Shops/Parks</a></li>
<li class="current_page_item2"><a href="fotofilme.php">Foto/Filme</a></li>
					<li><a href="blog.php?mode=pt">Nacional</a></li>
					<li><a href="blog.php?mode=global">lá fora</a></li>
					
                                       
				</ul>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page">
<p></p>
				<div id="contenttotal">
				  <h2>galeria unitedskating.</h2>

<p>Nesta secção vais encontrar os melhores vídeos feitos pela equipa unitedskating.com. Vídeos de norte a sul do páis, entrevistas, profiles, tours, e muito mais. Podes <b>deixar o teu comentário</b> sobre o clip em questão <b>mais abaixo!</b></p>
				
  <div id="bg1a">
		<div id="bg2a">
			<div id="bg3a">

<div id="quadrado">
<?php
if($manobranull=="true") {
$result = mysql_query("SELECT * FROM galeria ORDER BY id DESC LIMIT 1");
$row = mysql_fetch_array($result);
echo $row["embed"]; }
elseif($idsnull=="true") {
echo "<h3>o vídeo especificado não existe.</h3>"; 
} else {
$row = mysql_fetch_array($result);
echo $row["embed"];
}
?>

			
                 
</div>
<div id="fotografias">
   <h2>vídeos.</h2>
					<p>


	<div id="poptrox5">
	<!-- start -->
    
	<ul id="gallery3">
    <?php
	$result2 = mysql_query("SELECT * FROM galeria ORDER BY id DESC");
		  while($row2 = mysql_fetch_array($result2)) {
			echo '<li><a href="galeria.php?videoid='.$row2["id"].'" target="_top"><img src="'.$row2["imagem"].'" /></a></li>';  
		  }
	?>		
   
	</ul>
	<p>
     <br class="clear" />
	<script type="text/javascript">
		$('#gallery3').poptrox();
		</script>
	<!-- end -->
</p>
</div>



				
                
                </div>
                </div>
                </div>
			
</div>
<p>&nbsp;</p>
<?php
if($idsnull!="true") {
$data = date("Y-m-d",$timeAfterOneHour);
$hora = date("H:i:s",$timeAfterOneHour);
if($manobra!="") {$id = $_GET["videoid"]; } else {
$resultget = mysql_query("SELECT * FROM galeria ORDER BY id DESC LIMIT 1");
$rowget = mysql_fetch_array($resultget);
$id = $rowget["id"];
}
$result2 = mysql_query("SELECT * FROM `comments` WHERE post='$id' and modo='galeria' ORDER BY id DESC"); 
if(!$result2) { echo "erro de selecionar tabela";}
$numcom2 = mysql_query ( "SELECT count(*) from comments WHERE post='$id' and modo='galeria'" );
 list ( $numcom ) = mysql_fetch_row ( $numcom2 );
$postid = $row['id'];
?>

				<a name="co"></a>
				<h3 class="title">Coment&aacute;rios em "<?php echo $row["nome"]; ?>" (<?php echo "$numcom"; ?>) </h2>
				<a name="co2"></a>
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
window.location = "galeria.php?videoid='.$id.'&b=apagado#co"
//-->
</script>';
						}
			  if($b=="apagar" and isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
				   
					   
					    mysql_query("DELETE FROM comments WHERE id='".$idco."'" );
					 $numcom2a = mysql_query ( "SELECT count(*) from comments WHERE post='". $id . "' and modo='galeria'" ); 
						
 list ( $numcom56 ) = mysql_fetch_row ( $numcom2a );
 if($numcom56==0) {  
 
 
  echo '<script type="text/javascript">

<!--
window.location = "galeria.php?videoid='.$id.'&b=apagado2#co"
//-->
</script>';
 
 }
 
 else {
	 
 echo '<script type="text/javascript">

<!--
window.location = "galeria.php?videoid='.$id.'&b=apagado#co"
//-->
</script>';
	 
					   
 }
					   }
					   
					   $envi=$_GET['env'];
  if($envi=="sim") {echo '<b class="red2">Comentário enviado com sucesso.</b><br>'; }
  ?>
  <p>&nbsp;</p>
       <div id="zonac">
       <?php
				
				while($row2 = mysql_fetch_array($result2))
  {
	    if($row2['tipo']=="user") {
		  $result24 = mysql_query("SELECT * FROM utilizadores WHERE id='".$row2['userid']."'");
		  $row24 = mysql_fetch_array($result24);
		   $nome = "".$row24['user']."";
		   $reg = "(Utilizador registado) (carregar no nome para informações de perfil)";
		  $site = "utilizador.php?user=".$row24['user']."&mode=pt";
			 
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
	  ?>
      <?php
	  if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
?>
       <script type="text/javascript">

                function confirmar<?php echo $row2["id"]; ?>() {
               var answer = confirm("Deseja mesmo apagar o comentário de '<?php echo $nome; ?>'?")
			   if (answer){
				  
		window.location = "galeria.php?videoid=<?php echo $id; ?>&b=apagar&idco=<?php echo $row2["id"]; ?>";
		
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
				  
		window.location = "galeria.php?videoid=<?php echo $id; ?>&b=apagar2&idco=<?php echo $row2["id"]; ?>";
		
	}
	else{
		
	}

               }
			   </script>
               
               
       <?php
	  
	  }
	  ?>
      <?php
	  if($site =="") { $linkarya = ""; $linkarya2 = "";}
	  else { 

	  
	  $linkarya = "<a href=" .  $site . ">";
	  $linkarya2 = "</a>"; 
	   }
	   ?>
       
     <?php
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

  
  
			    $nomecomment = $_POST["nome"];
				$nomecomment = mysql_real_escape_string($nomecomment);
				$emailcomment = $_POST["email"];
								$emailcomment = mysql_real_escape_string($emailcomment);
				$webcomment = $_POST["website"];
												$webcomment = mysql_real_escape_string($webcomment);
				$textcomment = $_POST["comment"];
												$textcomment = mysql_real_escape_string($textcomment);
				
				$numcom6 = mysql_query ( "SELECT count(*) from comments WHERE ip='".$ip."' and modo='galeria'" );
 list ( $numcom8 ) = mysql_fetch_row ( $numcom6 );
 $result6 = mysql_query("SELECT * FROM comments WHERE ip='$ip' and modo='galeria' ORDER BY id DESC");
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
VALUES ('$id', '$nomecomment', '$emailcomment', '$textcomment', '$webcomment', '$data', '$hora', '$ip', '$timeAfterOneHour', 'galeria')");


					
					echo '<script type="text/javascript">

<!--
window.location = "galeria.php?videoid='.$id.'&env=sim#co2"
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
VALUES ('$id', '$nomee', '$userid', '$textcomment',  '$data', '$hora', '$ip', '$timeAfterOneHour', 'user', 'galeria' )");


					echo '<script type="text/javascript">

<!--
window.location = "galeria.php?videoid='.$id.'&env=sim#co2"
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
                     <form id="form1" method="post" action="galeria.php?videoid=<?php echo $id; ?>#co3">&nbsp;
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
					      <td colspan="2"><textarea name="comment" id="comment" cols="45" rows="9"><?php echo $textcomment; ?></textarea></td>
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
VALUES ('$id', 'admin', '$textcomment',  '$data', '$hora', '$ip', '$timeAfterOneHour', 'admin', 'galeria' )");


					
					echo '<script type="text/javascript">

<!--
window.location = "galeria.php?videoid='.$id.'&env=sim#co2"
//-->
</script>';
					}
				}
						?>
               <p>Deixe o seu coment&aacute;rio: <?php
					$array = mysql_query("SELECT * FROM configs");
$linhar = mysql_fetch_array($array);

					 echo 'Logado como <b class="red3">ADMIN</b>' ?> </p>
         <form id="form1" method="post" action="galeria.php?videoid=<?php echo $id; ?>#co2">

				      <label for="comment"></label><input name="verif3" type="hidden" value="true" />
				      <textarea name="comment" id="comment" cols="45" rows="9"><?php echo $textcomment; ?></textarea>
			        </p>
					  <p>
					    <input type="submit" name="button" id="button" value="Enviar" />
				    </p>
	              </form>
                        <?php
						}
					else {
						if($podercom=="nao")
						{ echo '<b class="red2">Precisa de estar logado para fazer comentários. <a href="blog.php?mode=pt">Login ou Registo aqui</a></b><br>'; }
						else {
							
							if($poder!="") { echo "<b class='red2'>Escreveu um comentário à menos de $tempoespera segundos, aguarde esse tempo e volte a tentar.</b><br>";}
					
					else {
					?>
					
				  <p>Deixe o seu coment&aacute;rio: <br />
                  (*campos obrigat&oacute;rios) (Pode enviar coment&aacute;rios com o seu utilizador.)<a name="co4" id="co4"></a></p>
				  <form id="form1" method="post" action="galeria.php?videoid=<?php echo $id; ?>#co4">
			
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
}
				  ?> </div>

					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->

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