<?php
if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");	
 }
 include('../config.php');
if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {

$modo = $_GET["mode"];
if($modo=="pt") {
	$array2 = mysql_query("SELECT * FROM blog ORDER BY dataordem DESC");
	}
if($modo=="global") {
		$array2 = mysql_query("SELECT * FROM blog2 ORDER BY dataordem DESC");

	}

?>


			<?php include ("barra.php"); ?>
				  
                <h2> Manegamento de Posts </h2>
             <h3> ( blogroll <?php if($modo=="pt") { echo "português ) <a href='posts.php?mode=global'>internacional</a>";} else { echo "internacional ) <a href='posts.php?mode=pt'>nacional</a>";}?> </h2>
                <?php
			
			   $a = $_GET["a"];
			   $id = $_GET["id"];
			   
			    if($a=="apagado")
			  {
				   echo '<div align="center" class="red">Post apagado.</div>';
				  }
				  
			    if($a=="apagar") {

if($modo=="pt") {
					    $resultado = mysql_query ( "SELECT count(*) from blog WHERE id='".$id."'" );
}

else {
						    $resultado = mysql_query ( "SELECT count(*) from blog2 WHERE id='".$id."'" );

	}
list ( $numcom88 ) = mysql_fetch_row ( $resultado );
				   if($numcom88==1) {
					if($modo=="pt") {
						   mysql_query("DELETE FROM  blog WHERE id='".$id."'" );
					    mysql_query("DELETE FROM comments WHERE post='".$id."' and modo='".$modo."'" );
						}
					else {
						   mysql_query("DELETE FROM blog2 WHERE id='".$id."'" );
					    mysql_query("DELETE FROM comments WHERE post='".$id."' and modo='".$modo."'" );
						}
					   echo '<script type="text/javascript">

<!--
window.location = "posts.php?a=apagado&mode='.$modo.'"
//-->
</script>';
					   }
				   }
				    if($a=="coapagado") {
			   echo '<div align="center" class="red">Comentário apagado com sucesso, não restaram comments!</div>';
			   }
			   if($a=="enviado") {
			   echo '<div align="center" class="red">Post enviado com suceso!</div>';
			   }
			     if($a=="nexiste") {
			   echo '<div align="center" class="red">Post que requiriu não existe!</div>';
			   }
			    if($a=="nexistec") {
			   echo '<div align="center" class="red">Não existem comentários para esse post!</div>';
			   }
			    if($a=="editado") {
			   echo '<div align="center" class="red">Post editado com suceso!</div>';
			   }
				?>
               <?php 
if($modo=="pt") {
	
				   $numcom23 = mysql_query ( "SELECT count(*) from blog" );
	}
	else {
				   $numcom23 = mysql_query ( "SELECT count(*) from blog2" );	
	}

list ( $numcom5 ) = mysql_fetch_row ( $numcom23 );
			   if($numcom5==0) { echo '<div align="center" class="red">Sem posts.</div>'; }
			   
			   else {
				   
				   ?>
                   
                   <table width="860" border="1" align="center" bordercolor="#999999">
  <tr>
    <td width="280">Titulo:</td>
    <td width="84">Data:</td>
    <td width="89">Hora:</td>
    <td width="150">Tags:</td>
        <td width="60">Autor:</td>
     <td width="110">Coment&aacute;rios:</td>
    <td width="99">Op&ccedil;oes:</td>
  </tr>
                   <?php
				   
			   }
			   while($lconfig = mysql_fetch_array($array2)) {
				   ?>
				    <script type="text/javascript">

                function confirmar<?php echo $lconfig["id"]; ?>() {
               var answer = confirm("Deseja mesmo apagar o Post '<?php echo $lconfig["titulo"]; ?>' e todos os seus comentários?")
			   if (answer){
		window.location = "posts.php?a=apagar&id=<?php echo $lconfig["id"]; ?>&mode=<?php echo $modo; ?>";
	}
	else{
		
	}

               }
			   </script>
               <?php
			   $numcom2 = mysql_query ( "SELECT count(*) from comments WHERE post='". $lconfig['id'] . "' and modo='".$modo."'" );
 list ( $numcom ) = mysql_fetch_row ( $numcom2 );
				   echo '  <tr>
    <td>'.$lconfig["titulo"].'</td>
    <td>'.$lconfig["data"].'</td>
    <td>'.$lconfig["hora"].'</td>
    <td>'.$lconfig["tag1"].' '.$lconfig["tag2"].' '.$lconfig["tag3"].'</td>
	    <td>'.$lconfig["autor"].'</td>
	 <td><a href="comments.php?post='.$lconfig["id"].'&mode='.$modo.'">Editar/apagar</a> (<b>'.$numcom.'</b>)</td>
    <td><a href="post.php?post='.$lconfig["id"].'&mode='.$modo.'">Editar</a>&nbsp;&nbsp; <a onclick="confirmar'.$lconfig["id"].'()"><u>Apagar</u></a></td>
  </tr>
';
				   }
			   ?>
</table>
       
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