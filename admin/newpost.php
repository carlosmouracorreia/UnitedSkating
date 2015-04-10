<?php include('../config.php');
if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
?>
<?php include ("barra.php"); ?>
<script type="text/javascript" src="../htmleditor/ckeditor.js"></script>
	<script src="sample.js" type="text/javascript"></script>
	<link href="sample.css" rel="stylesheet" type="text/css" />

			
				
  
                <h2>Criar Post</h2>
             <?php
			 
			 $data = date("Y-m-d",$timeAfterOneHour);
$hora = date("H:i:s",$timeAfterOneHour);

			 $post = $_POST["post"];
			 $tag1 = $_POST["categoria1"];
			 $tag2 = $_POST["categoria2"];
			 $tag3 = $_POST["categoria3"];
			  $verif = $_POST["verif"];
			  $titulo = $_POST["titulo"];
			 
			  if($verif!="") { 
			  
			  if($titulo=="") { echo '<div align="center" class="red">Escreva um titulo.</div>';}
			  elseif(strlen($titulo)  < 5) {
				  echo '<div align="center" class="red">Escreva um titulo maior que 5 caracteres.</div>';
				  }
				  else {  $tituloverif="true"; }
				  if($post == "<br />" or $post == "" ) {
					  echo '<div align="center" class="red">Escreva algo.</div>';
					  }
					  
					  elseif(strlen($post)  < 20) {
						    echo '<div align="center" class="red">Post tem de ter mais de 20 caracteres.</div>';
						  }
						  
						  else {
							 $postverif = "true";
							 }
			  }
				  
				   if($verif!="") { 
			  
			  if(!isset($_POST["pt"]) && !isset($_POST["global"]) ) { echo '<div align="center" class="red">Escolha o blog em que vai inserir o post.</div>';}
			  elseif(isset($_POST["pt"]) && isset($_POST["global"])) {
				  echo '<div align="center" class="red">Escolha apenas um blog para inserir o post.</div>';
				  }
				  else {  $categoriaverif="true"; }
				 
				
			  
			 
				  
				  if($tag1 =="" && $tag2=="" && $tag3=="") {  echo '<div align="center" class="red">Insira pelo menos uma tag.</div>';}
				 elseif($tag1 == $tag2 or $tag1 == $tag3 or $tag2 == $tag3) 
				 { 
				 if($tag2=="" or $tag3=="") {  $tagverif = "true";}
				 else {
				 
				 echo '<div align="center" class="red">>Não pode repetir tags.</div>'; }
				 }
				 else {
					  $tagverif = "true";
					  }
					  
				   }
				  
				  if( $tagverif == "true" && $postverif == "true" && $tituloverif=="true" && $categoriaverif=="true") {
					  
					  if(isset($_POST["pt"])) { $cate = "blog"; $cate2 = "pt";  }
					  if(isset($_POST["global"])) { $cate = "blog2"; $cate2 = "global"; }
					  if($tag1=="" and $tag2!="") {$tag1=$tag2; $tag2="";}
					  if($tag1=="" and $tag3!="") {$tag1=$tag3;  $tag3="";}
					  
					  $mes = date("Y-m",$timeAfterOneHour);

					  
					  mysql_query("INSERT INTO ".$cate." (titulo,post,data,hora,tag1,tag2,tag3,mes,autor,dataordem,modi)
VALUES ('$titulo', '$post', '$data', '$hora', '$tag1', '$tag2', '$tag3', '$mes', 'unitedskating', '$timeAfterOneHour', '$cate2')");
echo '<script type="text/javascript">

<!--
window.location = "posts.php?a=enviado&mode='.$cate2.'"
//-->
</script>';					  }
				  
			 ?>
                <div align="center">
             <form action="newpost.php" method="post">
             Titulo: <input name="titulo" type="text" size="40" maxlength="100" value="<?php echo $titulo; ?>" /><br />
			<textarea class="ckeditor" cols="80" id="editor1" name="post" rows="10"><?php echo $post; ?></textarea>
		</p>
		<p>
			
		</p>
       <h3> <b> Tags Existentes: </b> </h3> <br />
                                        <b> Tags blog nacional </b> <br />

        <?php
		
					
								$stack = array("", "");
									$resultad = mysql_query("SELECT * FROM blog");
while($tagsf=mysql_fetch_array($resultad)) {
	if($tagsf["tag1"]!="") {
array_push($stack, $tagsf["tag1"]);
	}
	if($tagsf["tag2"]!="") {
array_push($stack, $tagsf["tag2"]);
	}
	if($tagsf["tag3"]!="") {
array_push($stack, $tagsf["tag3"]);
	}
	
	$finali= array_unique($stack);
	$final = array_filter($finali); 
	sort($final);

}
	foreach ($final as $numero => $tagok) {
		    echo ''.$tagok.' &nbsp;';
	}

								
								?> <br />
                                <b> Tags blog internacional </b> <br />
                                <?php
								$stack2 = array("", "");
									$resultad2 = mysql_query("SELECT * FROM blog2");
while($tagsf2=mysql_fetch_array($resultad2)) {
	if($tagsf2["tag1"]!="") {
array_push($stack2, $tagsf2["tag1"]);
	}
	if($tagsf2["tag2"]!="") {
array_push($stack2, $tagsf2["tag2"]);
	}
	if($tagsf2["tag3"]!="") {
array_push($stack2, $tagsf2["tag3"]);
	}
	
	$finali2= array_unique($stack2);
	$final2 = array_filter($finali2); 
	sort($final2);

}
	foreach ($final2 as $numero2 => $tagok2) {
		    echo ''.$tagok2.' &nbsp;';
	}

								
							?>
        <br/>
        tag1
        <input name="categoria1" type="text" value="<?php echo $tag1; ?>" />  
        tag2
        <input name="categoria2" type="text" value="<?php echo $tag2; ?>" /> <input name="verif" type="hidden" value="ok" /> 
        tag3
        <input name="categoria3" type="text" value="<?php echo $tag3; ?>" /> <br />
        <input name="pt" type="checkbox" value="" /> Blog Nacional         <input name="global" type="checkbox" value="" /> Blog Internacional
       
        <br />
        <input type="submit" value="Enviar" />
	</form>

   
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