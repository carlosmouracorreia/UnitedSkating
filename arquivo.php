<?php
include("topo.php");
 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	 echo '<script type="text/javascript">

<!--
window.location = "index.php"
//-->
</script>';
	 }
	 $modo = $_GET["mode"];
$tag = $_GET["mes"];

if($modo=="pt") { $contarposts2 = mysql_query ( "SELECT * FROM blog WHERE mes='$tag' ORDER BY dataordem DESC" );
 $nrposts2=mysql_num_rows($contarposts2);
 if($tag=="" or $nrposts2==0) { echo '<script type="text/javascript">

<!--
window.location = "blog.php?mode=pt"
//-->
</script>'; }

}
else {
	 $contarposts2 = mysql_query ( "SELECT * FROM blog2 WHERE mes='$tag' ORDER BY dataordem DESC " );
 $nrposts2=mysql_num_rows($contarposts2);
  if($tag=="" or $nrposts2==0) { 
  echo '<script type="text/javascript">

<!--
window.location = "blog.php?mode=global"
//-->
</script>'; }

}

if($modo=="pt") {
	$result = mysql_query("SELECT * FROM blog WHERE mes='$tag' ORDER BY dataordem DESC");

	} else { 	$result = mysql_query("SELECT * FROM blog2 WHERE mes='$tag' ORDER BY dataordem DESC"); }

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
                <h3 class="red3">Arquivos de <?php echo $tag; ?>.</h2>
                <?php
	  while($row = mysql_fetch_array($result))
  {
	  if($modo=="pt") {
$numcom2 = mysql_query ( "SELECT count(*) from comments WHERE post='". $row['id'] . "' and modo='pt'" );
  }
  else { 
  $numcom2 = mysql_query ( "SELECT count(*) from comments WHERE post='". $row['id'] . "' and modo='global'" );

  }
 list ( $numcom ) = mysql_fetch_row ( $numcom2 );
 if($numcom == 0) { $comtrue = '<div align="right"><a href="post.php?mode='.$modo.'&a='. $row['id'] . '#co" class="linkcomment">Sem comentários</a></div>'; 
		$comlink = '';
		$comlink2 = '';
		 }
		else {
			$comtrue = '<div align="right">'. $numcom . ' Comentários </div>';
			$comlink = ' <a href="post.php?mode='.$modo.'&a='. $row['id'] . '#co" class="linkcomment">';
			$comlink2 = '</a>';
			}
			
			if($row['datau']!="") {
			$ifedit = '<br /> <b class="red3"> Ultima edição em: </b> '. $row['datau'] . ' ás '. $row['horau'] . '';	
			} else { $ifedit = ''; }
  echo '
	    <div class="post">
				<h2 class="title"><a href="post.php?a='. $row['id'] . '&mode='.$modo.'">'. $row['titulo'] . ' </a></h2>
				<p class="meta"> <b class="red3"> Data: </b> '. $row['data'] . ' ás '. $row['hora'] . ' <b class="red3">&nbsp; Autor: </b>   '.$row['autor'].' '.$ifedit.' '.$comlink.''.$comtrue.''.$comlink2.'   </p> 
				<div class="entry">
					'. $row['post'] . '	<br />
										<b class="red3"> tags: </b>  <a href="tags.php?tag='. $row['tag1'] . '&mode='.$modo.'">'. $row['tag1'] . ' </a> <a href="tags.php?tag='. $row['tag2'] . '&mode='.$modo.'">'. $row['tag2'] . '</a> <a href="tags.php?tag='. $row['tag3'] . '&mode='.$modo.'"> '. $row['tag3'] . ' </a>
					</div>
		</div>
       
	';
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
