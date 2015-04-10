<?php
$pagina = $_GET["pagina"];
$modo = $_GET["mode"];


 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");
	 }
	 include("topo.php");
	 
 $querysec = mysql_query ( "SELECT * from utilizadores WHERE securitymd5='".$_COOKIE["user"] . "'" );
 $security = mysql_fetch_array ( $querysec );
 if(isset($_COOKIE["user"]) and $_COOKIE["user"]==$security["securitymd5"] ) {


 $result= mysql_query ( "SELECT * FROM comments WHERE modo='".$modo."' and userid='".$security["id"]."' ORDER BY id DESC  " );

	
if(!$result) { echo "erro de selecionar tabela"; }
?>
<div id="menu">
				<ul>
					<li class="current_page_item"><a href="index.php">Portal</a></li>
 <li><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li><a href="shopsparks.php">Shops/Parks</a></li>
<li><a href="fotofilme.php">Foto/Filme</a></li>
					<li <?php  if($modo=="pt") { echo 'class="current_page_item2"';}?>><a href="blog.php?mode=pt">Nacional</a></li>
					<li <?php  if($modo=="global") { echo 'class="current_page_item2"';}?>><a href="blog.php?mode=global">lá fora</a></li>
					
                                       
				</ul>
			</div>
		</div>
	</div>
	<!-- end #header -->

	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
                <?php
				$idco = $_GET["idco"];
				$idco = mysql_real_escape_string($idco);
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
window.location = "usercomments.php?mode='.$modo.'&b=apagado#co"
//-->
</script>';
						}
                        ?>
                <h2> os meus comentários ( blogroll <?php if($modo=="pt") { echo "português ) <a href='usercomments.php?mode=global'>internacional</a>";} else { echo "internacional ) <a href='usercomments.php?mode=pt'>nacional</a>";}?> </h2>
                <?php
	  while($row = mysql_fetch_array($result))
  {
	  ?>
       <script type="text/javascript">

                function confirmar<?php echo $row["id"]; ?>() {
               var answer = confirm("Deseja mesmo apagar o seu comentário?")
			   if (answer){
				  
		window.location = "usercomments.php?mode=<?php echo $modo; ?>&b=apagar2&idco=<?php echo $row["id"]; ?>";
		
	}
	else{
		
	}

               }
			   </script>
      <?php
	  if($modo=="pt") {
		  $lol = "blog";
		  }
		  else { 		  $lol = "blog2"; }
	   $querysec2 = mysql_query ( "SELECT * from ".$lol." WHERE id='".$row['post'] . "'" );
 $security2 = mysql_fetch_array ( $querysec2 );
 
 
	
  echo '
	    <div class="post">
				<h2 class="title"><a href="post.php?a='. $security2['id'] . '&mode='.$modo.'">'. $security2['titulo'] . ' </a></h2>
				<p class="meta"> <b class="red3"> Data: </b> '. $row['data'] . ' ás '. $row['hora'] . '    </p> 
				<div class="entry">
					'. $row['comentario'] . '	<br /> ';	
 echo '<a onclick="confirmar'.$row["id"].'()"><u>Apagar comentário</u></a>';
 echo '<br>';
 echo '
										
					</div>
		</div>
       
	';
        }
		
		$numcom2ab = mysql_query ( "SELECT count(*) from comments WHERE modo='".$modo."' and userid='".$security["id"]."'" );
 list ( $numcomab ) = mysql_fetch_row ( $numcom2ab );

if($numcomab=="0") {
	echo "<h3 class='red3'> Ainda não escreveu qualquer comentário! </b>";
	}
		?>
					
					
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
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
}
else {
	 echo '<script type="text/javascript">

<!--
window.location = "blog.php?mode='.$modo.'"
//-->
</script>';

}
?>
