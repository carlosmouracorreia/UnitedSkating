<?php
require("phpmailer/class.phpmailer.php");
include("php/v.inc");
 include("php/q.inc");
 include('admin/class.upload.php');
 $validator = new ValidateForm();
?>
<?php
include("topo.php");
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
            
            <?php
			$querysec = mysql_query ( "SELECT * from utilizadores WHERE securitymd5='".$_COOKIE["user"] . "'" );
 $security = mysql_fetch_array ( $querysec );
			if(isset($_COOKIE["user"]) and $_COOKIE["user"]==$security["securitymd5"] ) { 
			 if($_GET["msg"]=="enviado") {
	
	echo "<div align='center'><b> Email enviado com sucesso! Por favor aguarde até 48 horas para a resposta por parte da unitedskating para o seu email. fique atento. </b> </div>
	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p>
	 <p>&nbsp;</p> 	 <p>&nbsp;</p>
 	 <p>&nbsp;</p>
	";
	 }
			elseif($security["pediuformulario"]=="truenactivo") { 
			echo "<div align='center'><b> Já foi enviado um pedido de inscrição por este formulário. Por favor aguarde resposta pelo seu email ou contacte o email administrativo (geral@unitedskating.com) </b> <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p>
	 <p>&nbsp;</p> 	 <p>&nbsp;</p>
 	 <p>&nbsp;</p> </div>";
			} elseif ($security["pediuformulario"]=="trueactivo") { echo "<div align='center'><b> O seu perfil já está activo! Para fazer alterações diriga-se à pagina administrativa através do lado direito da navegação na área do blog. </b></div> <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p>
	 <p>&nbsp;</p> 	 <p>&nbsp;</p>
 	 <p>&nbsp;</p>"; } else {
			?>
            
<div align="center"> 
  <p><b class="red">Formulário de inscrição como fotografo/filmer:</b></p>
  <p>Todas as informações são de preenchimento obrigatório. As informações sobre musica e afins servem para complementar o perfil do fotógrafo/filmer.
    
    <br/> Os seus dados serao enviados para o nosso email e ter&aacute; uma resposta em menos de 48 horas.</p>
  <p>Os campos marcados por asteriscos (*) , (**) ou (***) tem informa&ccedil;&otilde;es suplementares para consulta no fim da pagina.</p>
<?php

$idade = $_POST["idade"];
$localidade = $_POST["localidade"];
$canal = $_POST["canal"];
$musica = $_POST["musica"];
$skaters = $_POST["skaters"];
$skatersint = $_POST["skatersint"];
$manobra = $_POST["manobra"];
$melhorparte = $_POST["melhorparte"];
$melhorfilmer = $_POST["melhorfilmer"];
$sobremim = $_POST["sobremim"];





?>
  <form id="form1" method="post" enctype="multipart/form-data" action="formfilmer.php">
   <table width="459" border="1" bordercolor="#333333" bordercolordark="#000000" bordercolorlight="#CCCCCC">
   
    <tr>
      <td>Fotografo ou Filmer?</td>
      <td><input type="checkbox" name="fotografo" id="fotografo" />
        <label for="fotografo"></label>        <label for="radio">Fotografo 
          
          <input type="checkbox" name="filmer" id="filmer" />
          Filmer</label></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(!$_POST["fotografo"] and !$_POST["filmer"]) { echo "<b class='red2'> Escolha se é fotografo ou filmer. </b>";}
elseif($_POST["fotografo"] and $_POST["filmer"]) {  echo "<b class='red2'> Só pode selecionar uma opção. </b>";}
else {
	$tipoverif="true";
	 if(!$_POST["fotografo"]) { $tipofinal = "filmer";} 
  if(!$_POST["filmer"]) { $tipofinal = "fotografo";} 
	mysql_query("UPDATE utilizadores SET tipo = '".$tipofinal."' WHERE id='".$security["id"]."'");
	}
	 }
 ?>
 </td>
    </tr>
     <tr>
      <td>Idade:</td>
      <td><input name="idade" type="text" id="idade" value="<?php echo $idade; ?>" /></td>
    </tr>
     <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if($_POST["idade"] > 100 or $_POST["idade"] < 9 or strlen($_POST["idade"]) > 2) { echo "<b class='red2'> Insira uma idade entre 9 e 100 anos! </b>";}
else {
	$idadeverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Localidade:</td>
      <td><input name="localidade" type="text" id="localidade" value="<?php echo $localidade; ?>" /></td>
    </tr>
      <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["localidade"]) < 5 or strlen($_POST["localidade"]) > 40 ) { echo "<b class='red2'> Localidade entre 5 e 40 caractéres.  </b>";}
else {
	$localidadeverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Canal de fotos*/videos**</td>
      <td><input name="canal" type="text" id="canal" value="<?php echo $canal; ?>" /></td>
    </tr>
     <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["canal"]) < 10 or strlen($_POST["canal"]) > 300 ) { echo "<b class='red2'> Link do canal entre 10 e 300 caractéres.  </b>";}
else {
	$canalverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>M&uacute;sica:</td>
      <td><input name="musica" type="text" id="musica" value="<?php echo $musica; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["musica"]) < 5 or strlen($_POST["musica"]) > 400 ) { echo "<b class='red2'> Musica entre 10 e 400 caracteres.  </b>";}
else {
	$musicaverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Skaters nacionais:</td>
      <td><input name="skaters" type="text" id="skaters" value="<?php echo $skaters; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["skaters"]) < 10 or strlen($_POST["skaters"]) > 400 ) { echo "<b class='red2'> Espaço deve ter entre 10 e 400 caractéres.  </b>";}
else {
	$skatersverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Skaters internacionais:</td>
      <td><input name="skatersint" type="text" id="skatersint" value="<?php echo $skatersint; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["skatersint"]) < 10 or strlen($_POST["skatersint"]) > 400 ) { echo "<b class='red2'> Espaço deve ter entre 10 e 400 caractéres.  </b>";}
else {
	$skatersintverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Melhores manobras filmadas/fotografadas:</td>
      <td><input name="manobra" type="text" id="manobra" value="<?php echo $manobra; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["manobra"]) < 4 or strlen($_POST["manobra"]) > 80 ) { echo "<b class='red2'> Nome das manobras entre 4 a 80 caractéres.  </b>";}
else {
	$manobraverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Melhores partes/filmes de skate (para filmers) / revistas de skate (para fotógrafos):</td>
      <td><input name="melhorparte" type="text" id="melhorparte" value="<?php echo $melhorparte; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["melhorparte"]) < 10 or strlen($_POST["melhorparte"]) > 150 ) { echo "<b class='red2'> Espaço deve ter entre 10 e 150 caractéres. </b>";}
else {
	$melhorparteverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Filmers/Videographers / Fotógrafos :</td>
      <td><input name="melhorfilmer" type="text" id="melhorfilmer" value="<?php echo $melhorfilmer; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 if(strlen($_POST["melhorfilmer"]) < 5 or strlen($_POST["melhorfilmer"]) > 150 ) { echo "<b class='red2'> Espaço deve ter entre 5 e 150 caractéres. </b>";}
else {
	$melhorfilmerverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td colspan="2">
     <?php
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
  
  ?>
  </td>
  </tr>
     <tr>
      <td><?php print AskQuestion();?> <br/>
      (anti spam)***</td>
      <td><input name="Spamtrap" type="text" id="melhorfilmer" value="<?php print $validator->get("Spamtrap");?>" /></td>
    </tr>
    
    <tr>
    <tr>
      <td>Sobre Mim: (Um parágrafo com uma pequena descrição da pessoa e trabalho)</td>
      <td><label for="sobremim"></label>
        <textarea name="sobremim" id="sobremim" cols="45" rows="5"><?php echo $sobremim; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2">  <?php
 if($_POST["verif"]!="") {
	 
	 if(strlen($_POST["sobremim"]) < 65 or strlen($_POST["sobremim"]) > 600 ) { echo "<b class='red2'> Sobre mim entre 65 e 600 caractéres.  </b>";}
else {
	$sobremimverif="true";
	}
	 }
 ?>
 </td>
    </tr>
    <tr>
      <td>Imagem de Perfil: (500kbs max)</td>
      <td><input type="file" size="32" name="my_field" value="" /></td>
    </tr>
    <tr>
   <?php
   if($_POST["verif"]!="") {
	 
   //UPLOAD SHITS
   $cli = (isset($argc) && $argc > 1);
if ($cli) {
    if (isset($argv[1])) $_GET['file'] = $argv[1];
    if (isset($argv[2])) $_GET['dir'] = $argv[2];
    if (isset($argv[3])) $_GET['pics'] = $argv[3];
}

// set variables


$weird = mysql_query("SELECT * FROM utilizadores WHERE id=".$security["id"]."");
	$wee = mysql_fetch_array($weird);
if($wee["tipo"]=="filmer") { $bdloli = "filmers"; $bdloli2 = "filmers"; }
if($wee["tipo"]=="fotografo") { $bdloli = "fotografos";  $bdloli2 = "foto";}
  $idobter = mysql_query("SELECT * FROM ".$bdloli." order by id DESC limit 1");
$obterid = mysql_fetch_array($idobter);
$idfinal = $obterid["id"] + 1;
$dir_dest = "images/".$bdloli."/".$idfinal."/";
$dir_pics = "images/".$bdloli."/".$idfinal."/";
			
// ---------- IMAGE UPLOAD ----------

    // we create an instance of the class, giving as argument the PHP object
    // corresponding to the file field from the form
    // All the uploads are accessible from the PHP object $_FILES
    $handle = new Upload($_FILES['my_field'], 'pt_BR');

    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if ($handle->uploaded) {

        // yes, the file is on the server
        // below are some example settings which can be used if the uploaded file is an image.
		 $handle->image_resize  = true; 
		 $handle->image_ratio  = true;
		 $handle->image_y       = 230; 
	     $handle->image_x       = 290; 
		 $handle->file_max_size = 524288;

        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
       if($localidadeverif=="true" and $idadeverif=="true" and $canalverif=="true" and $manobraverif=="true" and $musicaverif=="true" and $skatersverif=="true" and $skatersintverif=="true" and $sobremimverif=="true" and $melhorparteverif=="true" and $melhorfilmerverif=="true" and $tipoverif=="true" and $spamverif=="true") { 
	    $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            
			$caminho = ''.$dir_pics.'/' . $handle->file_dst_name . '';
           $uploadverif="true";
        } else {
       
            echo '  <tr>
      <td colspan="2"> <b class="red2"> Erro: ' . $handle->error . ' </b> </td> </tr>';
           
        }
		
	   

        // we delete the temporary files
        $handle-> Clean();
	   }
    } else {
      
        echo ' <tr>
      <td colspan="2"> <b class="red2"> Erro: ' . $handle->error . ' </b> </td> </tr>';
        
    }
   }
 
				?>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Enviar" />
        <input name="verif" type="hidden" id="verif" value="verif" /></td>
    </tr>
  </table>
  <?php
	  
  if($_POST["verif"]!="") {
  if($localidadeverif=="true" and $idadeverif=="true" and $canalverif=="true" and $manobraverif=="true" and $musicaverif=="true" and $skatersverif=="true" and $skatersintverif=="true" and $sobremimverif=="true" and $melhorparteverif=="true" and $melhorfilmerverif=="true" and $tipoverif=="true" and $spamverif=="true" and $uploadverif=="true") { 
  
  
 
 if(!$_POST["fotografo"]) { $tipofinal = "filmer";} 
  if(!$_POST["filmer"]) { $tipofinal = "fotografo";} 

 
  date_default_timezone_set('GMT');
					$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = $currentTime+60*60;
$pass = md5($pass);
$data = date("Y-m-d",$timeAfterOneHour);
$hora = date("H:i:s",$timeAfterOneHour);


$mail = new PHPMailer();

	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->Host = "smtp.unitedskating.com"; // Endereço do servidor SMTP
	$mail->SMTPAuth = true;
	$mail->Username = 'geral@unitedskating.com';
	$mail->Password = 'Bateaporta123@';
	$mail->From = "sem-resposta@unitedskating.com"; // Seu e-mailm
	$mail->FromName = "unitedskating"; // Seu nome
	$mail->AddAddress($emailadmin);
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	 	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Pedido de aprovação para fotografo/filmer - unitedskating"; // Assunto da mensagem
	$mail->Body = '<head><style>
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
    <td width="374"><b><h1>United Skating | '.$tipofinal.'</h1></b></td>
  </tr>
</table>
<hr>
Caro administrador, foi enviado um pedido para a criação de um perfil de fotografo/filmer. <p>

 Dados do formulário:
<p><span class="cinza">****************************************************************<br />
Nome: '.$security["pnome"].'
<br />Email: '.$security["email"].'
<br /> Localidade '.$localidade.'
<br/> Idade: '.$idade.'
<br /> Canal: '.$canal.'
<br /> filmer/fotografo: '.$tipofinal.'
<br /> Musica: '.$musica.'
<br /> Skaters nacionais: '.$skaters.'
<br /> Skaters internacionais: '.$skatersint.'
<br /> Melhores partes\melhores Revistas: '.$melhorparte.'
<br /> Melhores filmers\ Melhores fotografos: '.$melhorfilmer.'
<br /> Melhores manobras filmadas\fotografadas: '.$manobra.'
<br /> Sobre mim: <br/>'.$sobremim.'<br />
****************************************************************</span><br>
</body>';
	$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	//obter o id	
 
	
mysql_query("UPDATE utilizadores SET pediuformulario='truenactivo' WHERE id='".$security["id"]."'");
//inserir na base de dados foto ou filme os dados principais
mysql_query("INSERT INTO ".$bdloli." (id,nome,imagem,link,fotoinicio,ativo,email,userid)
VALUES ('$idfinal', '".$security["pnome"]."', 'images/".$bdloli."/".$idfinal.".jpg', '".$bdloli2.".php?".$tipofinal."id=".$idfinal."', 'images/".$bdloli."/".$idfinal."_big.jpg', 'nao', '".$security["email"]."', '".$security["id"]."')");
//inserir dados na tabela dadosperfis 
//sobre mim - info
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('info', '$sobremim', '$tipofinal', '$idfinal', 'infos' )");
//idade - info
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('Idade:', '$idade', '$tipofinal', '$idfinal', 'maisinfo' )");
//localidade - info
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('Localidade:', '$localidade', '$tipofinal', '$idfinal', 'maisinfo' )");
//site - info
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('Website/Canal:', '$canal', '$tipofinal', '$idfinal', 'maisinfo' )");
//musica - info
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('Música:', '$musica', '$tipofinal', '$idfinal', 'maisinfo' )");
//skaters nacionais - info
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('Skaters Nacionais;', '$skaters', '$tipofinal', '$idfinal', 'maisinfo' )");
//skaters internacionais - info
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('Skaters Internacionais:', '$skatersint', '$tipofinal', '$idfinal', 'maisinfo' )");
//revistas/filmes skate - info
if($tipofinal=="fotografo") { $partew = "Revistas de Skate:"; } else { $partew = "Melhores partes/Filmes de skate:"; }
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('$partew', '$melhorparte', '$tipofinal', '$idfinal', 'maisinfo' )");
//manobras melhores - info
if($tipofinal=="fotografo") { $manobraw = "Melhores manobras fotografadas:"; } else { $manobraw = "Melhores manobras filmadas:"; }
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('$manobraw', '$manobra', '$tipofinal', '$idfinal', 'maisinfo' )");
//fotografos/filmers - info
if($tipofinal=="fotografo") { $melhorfilmerw = "Fotógrafos Internacionais:"; } else { $melhorfilmerw = "Filmers Internacionais:"; }
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('$melhorfilmerw', '$melhorfilmer', '$tipofinal', '$idfinal', 'maisinfo' )");
mysql_query("INSERT INTO temporario (campo,dados,tipo,perfilid,limitar)
VALUES ('linkfoto', '$caminho', '$tipofinal', '$idfinal', 'infos' )");

 echo '<script type="text/javascript">

<!--
window.location = "formfilmer.php?msg=enviado"
//-->
</script>';

  }
  
  else { echo "<b class='red2'> Existem erros por corrigir.  </b>";} 
  }
  
	  
   ?>
  </form>
<p>*Para termos acesso &aacute;s suas fotografias indique nos um canal onde as tenha dispon&iacute;veis para que as possamos transferir para o site mais tarde.  (ex: flickr, olhares) Pode tamb&eacute;m optar pelo envio das fotografias por email. <br/> 
Para isso envie-nos as fotografias em anexo para o email geral@unitedskating.com com o seu nome na descri&ccedil;&atilde;o. Se optar por enviar pelo email escreva no campo do canal &quot;enviado para o email&quot; .</p>
  **Para termos acesso aos seus v&iacute;deos indique nos um canal onde tenha exposto os seus videos. (ex: youtube/vimeo)</p>
  <p>Se preferir enviar por email escreva no campo do canal de videos/fotos &quot;optei por enviar por email&quot;</p>
  <p>***Na verificação anti-spam, na pergunta dos dias da semana escreva apenas a primeira parte do dia (ex:terça) e tudo em letra pequena.
</div>
</p>
<!-- end #content --><!-- end #sidebar -->

				
			  <div style="clear: both;">&nbsp;</div>
			</div>
            <?php
			}
			
	 
	
	 
			} else {
	 echo "<div align='center'><b> É necessário estar registado para proceder à inscrição como filmer/fotógrafo. Por favor registe-se <a href='registo.php?mode=global'>por aqui</a> ou faça login <a href='blog.php?mode=pt'>aqui</a> (lado direito).</div>
	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p> 	 <p>&nbsp;</p>
	 <p>&nbsp;</p> 	 <p>&nbsp;</p>
 	 <p>&nbsp;</p>
 ";
 
	 
	 
	 }
	  ?>
      	<!-- end #page -->
		</div>
        
	</div>
    
</div>

<?php
include("rodape.php");
?>