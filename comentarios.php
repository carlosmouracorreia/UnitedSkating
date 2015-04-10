<?php
$pagina = $_GET["pagina"];
$modo = $_GET["mode"];


 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");
	 }
	 include("topo.php");
	 
  $id = $_GET["user"];
  	  $id = mysql_real_escape_string($id);
	  $numcom23 = mysql_query ( "SELECT count(*) from utilizadores WHERE id='".$id."'" );
 list ( $numcom5 ) = mysql_fetch_row ( $numcom23 );
 
 if($numcom5!=0) {
	 $array23 = mysql_query("SELECT * FROM utilizadores WHERE id='".$id."'");
$row3 = mysql_fetch_array($array23);

 } else {
echo '<script type="text/javascript">

<!--
window.location = "index.php"
//-->
</script>';	 
 }


 $result= mysql_query ( "SELECT * FROM comments WHERE modo='".$modo."' and userid='".$row3["id"]."' ORDER BY id DESC  " );

	
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
                <h3> comentários do utilizador <?php echo $row3["user"]; ?> ( blogroll <?php if($modo=="pt") { echo "português ) <a href='comentarios.php?mode=global&user=".$id."'>internacional</a>";} else { echo "internacional  ) <a href='comentarios.php?mode=pt&user=".$id."'>nacional</a>";}?> </h2>
                <?php
	  while($row = mysql_fetch_array($result))
  {
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
					'. $row['comentario'] . '	<br />
										
					</div>
		</div>
       
	';
        }
		
		$numcom2ab = mysql_query ( "SELECT count(*) from comments WHERE modo='".$modo."' and userid='".$security2["id"]."'" );
 list ( $numcomab ) = mysql_fetch_row ( $numcom2ab );

if($numcomab=="0") {
	echo "<h3 class='red3'> O utilizador ainda não escreveu qualquer comentário! </b>";
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

?>
