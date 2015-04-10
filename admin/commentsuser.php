<?php include('../config.php');
if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {

 $id = $_GET["utilizador"];
 $idco = $_GET["id2"];
 $a = $_GET["a"];
 $numcom23 = mysql_query ( "SELECT count(*) from comments WHERE userid='".$id."'" );
 list ( $numcom5 ) = mysql_fetch_row ( $numcom23 );
 
 if($numcom5!=0) {
	 $array2 = mysql_query("SELECT * FROM comments WHERE userid='".$id."'");

	 
?>

			<?php include ("barra.php"); ?>
  
                <h2>Coment&aacute;rios do utilizador "<?php $array4 = mysql_query("SELECT * FROM utilizadores WHERE id='".$id."'");
$row4 = mysql_fetch_array($array4);
				 echo $row4["user"]; ?>" </h2>
             <?php
			  if($a=="apagado") {
			   echo '<div align="center" class="red">Comentário apagado com sucesso!</div>';
			   }
			  if($a=="apagar") {
				  
					   
					    mysql_query("DELETE FROM comments WHERE id='".$idco."'" );
						$numcom2a6 = mysql_query ( "SELECT count(*) from comments WHERE userid='$id'" );
 list ( $numcom5666 ) = mysql_fetch_row ( $numcom2a6 );
 if($numcom5666==0) { 
 echo '<script type="text/javascript">

<!--
window.location = "users.php?a=coapagado"
//-->
</script>';
 }
 
 else {
					   echo '<script type="text/javascript">

<!--
window.location = "commentsuser.php?utilizador='.$id.'&a=apagado"
//-->
</script>';
					   
 }
					   }
				   
			while($row2 = mysql_fetch_array($array2))
  {
	  if($row2["modo"] == "pt") {
		  	  $array3 = mysql_query("SELECT * FROM blog WHERE id='".$row2["post"]."'");

	  }
	  else {
		  		  	  $array3 = mysql_query("SELECT * FROM blog2 WHERE id='".$row2["post"]."'");

	  }
	  
$row3 = mysql_fetch_array($array3);
 $numcom233 = mysql_query ( "SELECT count(*) from utilizadores WHERE id='".$row2['userid']."'" );
 list ( $numcom1 ) = mysql_fetch_row ( $numcom233 );
 if($numcom1==0 and $row2['tipo']=="user") {
	 $nome = "<strike>".$row2['nome']."</strike>";
	  $reg = "User apagado";
	 }
	  ?>
      <script type="text/javascript">

                function confirmar<?php echo $row2["id"]; ?>() {
               var answer = confirm("Deseja mesmo apagar o comentário de <?php echo $row4["user"]; ?>?")
			   if (answer){
		window.location = "commentsuser.php?a=apagar&utilizador=<?php echo $id; ?>&id2=<?php echo $row2["id"]; ?>";
	}
	else{
		
	}

               }
			   </script>
      <?php
	  if($row2['site'] =="") { $linkarya = ""; $linkarya2 = "";}
	  else { $linkarya = "<a href=" . $row2['site'] . ">";
	  $linkarya2 = "</a>"; 
	   }
  echo '<table width="550" border="1" bordercolor="#00FF33" align="center">
  <tr>
    <td width="114">POST: (blog '. $row2['modo'] . ')</td>
    <td width="162">Data:</td>
   
	 <td width="137">Opçoes:</td>
  </tr>
  <tr>
    <td>'. $row3['titulo'] . '</td>
    <td>'. $row2['data'] . '&nbsp;'. $row2['hora'] . '</td>

	<td><a onclick="confirmar'.$row2["id"].'()"><u>Apagar</u></a></td>
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
window.location = "users.php?a=nexistec"
//-->
</script>';	}
}
else {
	echo '<script type="text/javascript">

<!--
window.location = "../index.php"
//-->
</script>';
}
?>