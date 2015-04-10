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
 $idco = $_GET["idco"];
 $a = $_GET["a"];
 $numcom23 = mysql_query ( "SELECT count(*) from comments WHERE post='".$id."' and modo='".$modo."'" );
 list ( $numcom5 ) = mysql_fetch_row ( $numcom23 );
 
 if($numcom5!=0) {
	 $array2 = mysql_query("SELECT * FROM comments WHERE post='".$id."' and modo='".$modo."'");
if($modo == "pt") { 	 $array3 = mysql_query("SELECT * FROM blog WHERE id='".$id."'"); }
if($modo == "global") { 	 $array3 = mysql_query("SELECT * FROM blog2 WHERE id='".$id."'"); }

$row3 = mysql_fetch_array($array3);
?>
<div id="page">
		<div id="content2">
		  <div class="post2">
			<?php include ("barra.php"); ?>
				<div class="entry">
  
                <h2>Coment&aacute;rios para o post "<?php echo $row3["titulo"]; ?>" </h2>
             <?php
			  if($a=="apagado") {
			   echo '<div align="center" class="red">Comentário apagado com sucesso!</div>';
			   }
			  if($a=="apagar") {					   
					    mysql_query("DELETE FROM comments WHERE id='".$idco."'" );
						$numcom2a = mysql_query ( "SELECT count(*) from comments WHERE post='". $id . "' and modo='".$modo."'" );
 list ( $numcom56 ) = mysql_fetch_row ( $numcom2a );
 if($numcom56==0) {  
  echo '<script type="text/javascript">

<!--
window.location = "posts.php?a=coapagado&mode='.$modo.'"
//-->
</script>';
 }
 
 else {
					   echo '<script type="text/javascript">

<!--
window.location = "comments.php?post='.$id.'&a=apagado&mode='.$modo.'"
//-->
</script>';
					   
 }
					   }
				   
			 
			while($row2 = mysql_fetch_array($array2))
  {
	  
	   if($row2['tipo']=="user") {
		  $result24 = mysql_query("SELECT * FROM utilizadores WHERE id='".$row2['userid']."'");
		  $row24 = mysql_fetch_array($result24);
		   $nome = "".$row24['user']."";
		   $email = "".$row24['email']."";
		   $reg = "(User)";
		  $site = "".$hostsite."/utilizador.php?user=".$row24['user']."";
			 
		  }
		  
		  elseif($row2['tipo']=="admin") {  
		  $site = $hostsite;
			  $nome = $useradmin;
			  $reg = "(Admin)";
			  $email = $emailadmin;
			  }
		  else {
			  $site = $row2['site'];
			  $nome = $row2['nome'];
			  $email =  $row2['email'];
			  $reg = "";
			  }
			  
			   $numcom233 = mysql_query ( "SELECT count(*) from utilizadores WHERE id='".$row2['userid']."'" );
 list ( $numcom1 ) = mysql_fetch_row ( $numcom233 );
 if($numcom1==0 and $row2['tipo']=="user") {
	 $nome = "<strike>".$row2['nome']."</strike>";
	 $email = "user apagado";
	  $reg = "User apagado";
	 }
	  ?>
      <script type="text/javascript">

                function confirmar<?php echo $row3["id"]; ?>() {
               var answer = confirm("Deseja mesmo apagar o comentário de <?php echo $nome; ?>?")
			   if (answer){
		window.location = "comments.php?a=apagar&post=<?php echo $id; ?>&idco=<?php echo $row2["id"]; ?>&mode=<?php echo $modo; ?>";
	}
	else{
		
	}

               }
			   </script>
      <?php
	  if($site =="") { $linkarya = ""; $linkarya2 = "";}
	  else { $linkarya = "<a href=" . $site . ">";
	  $linkarya2 = "</a>"; 
	   }
  echo '<table width="680" border="1" bordercolor="#00FF33" align="center">
  <tr>
    <td width="114">Nome:</td>
    <td width="162">Data:</td>
    <td width="137">Email:</td>
	 <td width="137">Opçoes:</td>
  </tr>
  <tr>
    <td>'.$linkarya.''. $nome . ''.$linkarya2.' '.$reg.'</td>
    <td>'. $row2['data'] . '&nbsp;'. $row2['hora'] . '</td>
    <td>'. $email . '</td>
	<td><a onclick="confirmar'.$row3["id"].'()"><u>Apagar</u></a></td>
  </tr>
  <tr>
    <td colspan="4">'. $row2['comentario'] . '</td>
  </tr>
</table>
';
  }
  
			 ?>
              

        
<?php
}
else {
	echo '<script type="text/javascript">

<!--
window.location = "posts.php?a=nexistec"
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