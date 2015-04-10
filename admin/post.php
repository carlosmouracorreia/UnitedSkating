<?php
if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");	
 }
 include('../config.php');
 $modo = $_GET["mode"];
if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
 $id = $_GET["post"];
 if($modo=="pt") {
 $numcom23 = mysql_query ( "SELECT count(*) from blog WHERE id='".$id."'" );
 }
 else {
	  $numcom23 = mysql_query ( "SELECT count(*) from blog2 WHERE id='".$id."'" );

 }
 list ( $numcom5 ) = mysql_fetch_row ( $numcom23 );
 
 if($numcom5!=0) {
	  if($modo=="pt") {
	 $array2 = mysql_query("SELECT * FROM blog WHERE id='".$id."'");
	  }
	  else {
		  	 $array2 = mysql_query("SELECT * FROM blog2 WHERE id='".$id."'");

	  }
$row = mysql_fetch_array($array2);
?>
	<?php include ("barra.php"); ?>
<script type="text/javascript" src="../htmleditor/ckeditor.js"></script>
	<script src="sample.js" type="text/javascript"></script>
	<link href="sample.css" rel="stylesheet" type="text/css" />

		
				
  
                <h2>Criar Post</h2>
             <?php
			 
			 $data2 = date("Y-m-d",$timeAfterOneHour);
$hora2 = date("H:i:s",$timeAfterOneHour);

$titulo = $row["titulo"];
$post = $row["post"];
$tag1 = $row["tag1"];
$tag2 = $row["tag2"];
$tag3 = $row["tag3"];
$mes = $row["mes"];
$data = $row["data"];
$hora = $row["hora"];
			 			 $dataordem = $row["dataordem"];


			
			  $verif = $_POST["verif"];
			
			 
			  if($verif!="") { 
			  $post = $_POST["post"];
			 $tag1 = $_POST["categoria1"];
			 $tag2 = $_POST["categoria2"];
			 $tag3 = $_POST["categoria3"];
			 $titulo = $_POST["titulo"];
			 $mes = $row["mes"];
			 			 $dataordem = $row["dataordem"];


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
							 
				 
				   if($verif!="") { 
			  
			  if(!isset($_POST["pt"]) && !isset($_POST["global"]) ) { echo '<div align="center" class="red">Escolha o blog em que vai inserir o post.</div>';}
			  elseif(isset($_POST["pt"]) && isset($_POST["global"])) {
				  echo '<div align="center" class="red">Escolha apenas um blog para inserir o post.</div>';
				  }
				  else {  $categoriaverif="true"; } }
				  
				  if($tag1 =="" && $tag2=="" && $tag3=="") {  echo '<div align="center" class="red">Insira pelo menos uma tag.</div>';}
				  else {
					  $tagverif = "true";
					  }
				  
				  if( $tagverif == "true" && $postverif == "true" && $tituloverif=="true"  && $categoriaverif=="true") {
					  if($tag1=="" and $tag2!="") {$tag1=$tag2; $tag2="";}
					  if($tag1=="" and $tag3!="") {$tag1=$tag3;  $tag3="";}
					  
					  if($modo=="pt") { 
					  
					   if(isset($_POST["pt"])) {
					  
					  mysql_query("UPDATE blog SET titulo='$titulo', post='$post', data='$data', hora='$hora', tag1='$tag1', tag2='$tag2', tag3='$tag3', autor='unitedskating', datau='$data2', horau='$hora2'  WHERE id=".$id."");
					   }
					   
					   else {
						   
						   						   mysql_query("DELETE FROM  blog WHERE id='".$id."'" );
												    mysql_query("INSERT INTO blog2 (titulo,post,data,hora,tag1,tag2,tag3,mes,autor,datau,horau,dataordem,modi)
VALUES ('$titulo', '$post', '$data', '$hora', '$tag1', '$tag2', '$tag3', '$mes', 'unitedskating', '$data2', '$hora2', '$dataordem', 'global')");
						   
					   }
					  
					  
					  }
					  
					  else {
						  
						   if(isset($_POST["global"])) {
						   mysql_query("UPDATE blog2 SET titulo='$titulo', post='$post', data='$data', hora='$hora', tag1='$tag1', tag2='$tag2', tag3='$tag3', autor='unitedskating', datau='$data2', horau='$hora2' WHERE id=".$id."");
						   } else {
						  						   						   mysql_query("DELETE FROM  blog2 WHERE id='".$id."'" );
						 mysql_query("INSERT INTO blog (titulo,post,data,hora,tag1,tag2,tag3,mes,autor,datau,horau,dataordem,modi)
VALUES ('$titulo', '$post', '$data', '$hora', '$tag1', '$tag2', '$tag3', '$mes', 'unitedskating', '$data2', '$hora2', '$dataordem', 'pt')");
						   
						   }
					  }

echo '<script type="text/javascript">

<!--
window.location = "posts.php?a=editado&mode='.$modo.'"
//-->
</script>';
					  }
				  }
			 ?>
                <div align="center">
             <form action="post.php?post=<?php echo $id; ?>&mode=<?php echo $modo; ?>" method="post">
             Titulo: <input name="titulo" type="text" size="40" maxlength="40" value="<?php echo $titulo; ?>" /><br />
			<textarea class="ckeditor" cols="80" id="editor1" name="post" rows="10"><?php echo $post; ?></textarea>
		</p>
		<p>
			
		</p>
        Tag1
        <input name="categoria1" type="text" value="<?php echo $tag1; ?>" />  
        Tag2
        <input name="categoria2" type="text" value="<?php echo $tag2; ?>" /> <input name="verif" type="hidden" value="ok" /> 
        Tag3
        <input name="categoria3" type="text" value="<?php echo $tag3; ?>" />
        <br/>
        Blog: <input name="pt" type="checkbox" value="pt" <?php if($_GET["mode"]=="pt") { echo 'checked="checked"';}?> /> Nacional <input name="global" type="checkbox" value="global" <?php if($_GET["mode"]=="global") { echo 'checked="checked"';}?> /> Internacional
        
        <input type="submit" value="Enviar" />
	</form>
</div>
         
<?php
}
else {
	echo '<script type="text/javascript">

<!--
window.location = "posts.php?a=nexiste&mode='.$modo.'"
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