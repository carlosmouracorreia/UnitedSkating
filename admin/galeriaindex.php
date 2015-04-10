<?php 
include('../config.php');
  if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
include ("barra.php"); 
                ?>


    <h1>Galeria Pag Inicial</h1>
    <h2>(apenas 8 primeiras divulgadas)</h2>
    <?php  
	$id = $_GET["id"];
	$ordem = $_GET["ordem"];
	if($a=="apagar") { 						  
	
	mysql_query("DELETE FROM  galeriaindex WHERE id='".$id."'" ); 
	  mysql_query("UPDATE galeriaindex SET ordem = ordem - 1 WHERE ordem > '".$ordem."' " ); 
	 echo '<script type="text/javascript">

<!--
window.location = "galeriaindex.php?a=apagado"
//-->
</script>';
	}
	if($a=="apagado") {  echo "<b> entrada apagada com sucesso. </b>";
	}
	?>
    <?php
	$info = $_POST["info"];
    $link = $_POST["link"];
	$imagem = $_POST["imagem"];
	if($_POST["verif"]!="") {
	if($info=="") { echo "<b>info vazia.</b> "; } else { $v1 = true; }
	if($link=="") { echo "<b>link vazio.</b> "; } else { $v2 = true; }
	if($imagem=="") { echo "<b>link da imagem vazio.</b> "; } else { $v3 = true; }
	}
	if ($v1==true and $v2==true and $v3==true) { 
	mysql_query("UPDATE galeriaindex SET ordem = ordem + 1");
	  mysql_query("INSERT INTO galeriaindex (info,link,imagem,ordem)
VALUES ('$info', '$link', '$imagem', '1')");
	echo "<b>entrada adicionada com sucesso.</b> ";
	}
	?>
    <form id="form1" name="form1" method="post" action="galeriaindex.php">
<table width="584" border="1">
  <tr>
    <td colspan="2"><b>nova entrada.</b></td>
  </tr>
  <tr>
    <td width="292">info:</td>
    <td width="276"><label for="link"></label>
      <input name="info" type="text" id="info" value="<?php echo $info; ?>" /></td>
  </tr>
  <tr>
    <td>link:</td>
    <td><input type="text" name="link" id="link" value="<?php echo $link; ?>" /></td>
  </tr>
  <tr>
    <td>link da imagem: (610x300px - <a href="upload.php">upload aqui</a>)</td>
    <td><input type="text" name="imagem" id="imagem" value="<?php echo $imagem; ?>" /><input name="verif" type="hidden" value="verif" /></td>
  </tr>
  <tr>
    <td><input type="submit" name="button" id="button" value="enviar" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<table width="900" border="1">
  <tr>
    <td><b>info.</b></td>
    <td><b>link.</b></td>
    <td><b>imagem.</b></td>
            <td><b>ordem.</b></td>
    <td><b>apagar.</b></td>
  </tr>
   <?php
   $select = mysql_query("SELECT * FROM galeriaindex order by ordem ASC");
   while($row = mysql_fetch_array($select)) {
	   ?>
       <script type="text/javascript">

                function confirmar<?php echo $row["id"]; ?>() {
               var answer = confirm("Deseja mesmo apagar a entrada?")
			   if (answer){
		window.location = "galeriaindex.php?a=apagar&id=<?php echo $row["id"]; ?>&ordem=<?php echo $row["ordem"]; ?>";
	}
	else{
		
	}

               }
			   </script>
       <tr>
    <td><?php echo $row["info"] ?></td>
    <td><?php echo $row["link"] ?></td>
    <td><?php echo $row["imagem"] ?></td>
        <td><?php echo $row["ordem"] ?></td>
    <td><a onclick="confirmar<?php echo $row["id"] ?>()"><u>Apagar</u></a></td>
  </tr>
       <?php
   }
   ?>
   </table>


</body>

</html>
<?php } ?>