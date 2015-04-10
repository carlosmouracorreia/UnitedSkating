<?php
$pagina = $_GET["pagina"];
$modo = $_GET["mode"];
if(!is_numeric($pagina) && $pagina!="") {
	
	header("Location: blog.php?mode=".$modo."");
	}

 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");
	 }
	 include("topo.php");
	 
  if($pagina==null) {$paginanr=2; }
	 else {$paginanr = $pagina + 1;}
	 
if($pagina == null) { $algurit = 0;}

else { $algurit=$pagina*$ppp-$ppp;}

if($modo=="pt") { $contarposts2 = mysql_query ( "SELECT * FROM blog ORDER BY dataordem DESC LIMIT ".$algurit.", 100000000 " );
 $nrposts2=mysql_num_rows($contarposts2);
}
else {
	 $contarposts2 = mysql_query ( "SELECT * FROM blog2 ORDER BY dataordem DESC LIMIT ".$algurit.", 100000000 " );
 $nrposts2=mysql_num_rows($contarposts2);
}
 if($pagina!="") {
if($pagina < 1 or preg_match('/^[\p{L&} -]+$/u', $´pagina)) {  header("Location: index.php"); } }
if($modo=="pt") {
	$result = mysql_query("SELECT * FROM blog  ORDER BY dataordem DESC LIMIT ".$algurit.", ".$ppp."");

	} else { 	$result = mysql_query("SELECT * FROM blog2  ORDER BY dataordem DESC LIMIT ".$algurit.", ".$ppp.""); }

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
				if($_GET["msg"]=="registado") {
					echo "<b class='red5'>Registado com sucesso. Diriga-se ao seu email para activar a sua conta. O prazo de validade do email é de 12 horas.</b>";
					}
					
					if($_GET["msg"]=="regnexiste") {
					echo "<b class='red3'>Link inválido ou expirou. Registe-se novamente ou contacte o utilizador <a href='#'>geral@unitedskating.com</a></b>";
					}
						if($_GET["msg"]=="password") {
					echo "<b class='red3'>Password alterada com sucesso. Por favor faça login de novo.</a></b>";
					}
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
if($numcom == "1") { 			$comtrue = '<div align="right">'. $numcom . ' Comentário </div>'; }
else { $comtrue = '<div align="right">'. $numcom . ' Comentários </div>'; }
$comlink = ' <a href="post.php?mode='.$modo.'&a='. $row['id'] . '#co" class="linkcomment">';
			$comlink2 = '</a>';
			}
			
			if($row['datau']!="") {
			$ifedit = '<br /> <b class="red3"> Ultima edição em: </b> '. $row['datau'] . ' ás '. $row['horau'] . '';	
			} else { $ifedit = ''; }
  echo '
	    <div class="post">
				<h2 class="title"><a href="post.php?a='. $row['id'] . '&mode='.$modo.'">'. $row['titulo'] . ' </a></h2>
				<p class="meta"> <b class="red3"> Data da Publicação: </b> '. $row['data'] . ' ás '. $row['hora'] . '  <b class="red3">&nbsp; Autor: </b>   '.$row['autor'].' '.$ifedit.' '.$comlink.''.$comtrue.''.$comlink2.'  </p> 
				<div class="entry">
					'. $row['post'] . '	<br />
										<b class="red3"> tags: </b>  <a href="tags.php?tag='. $row['tag1'] . '&mode='.$modo.'">'. $row['tag1'] . ' </a> <a href="tags.php?tag='. $row['tag2'] . '&mode='.$modo.'">'. $row['tag2'] . '</a> <a href="tags.php?tag='. $row['tag3'] . '&mode='.$modo.'"> '. $row['tag3'] . ' </a>
					</div>
		</div>
       
	';
        }
		 $paginanr2 = $pagina - 1;
if($pagina!="" and $pagina!=1 and $pagina!=2) { echo "<a href='blog.php?mode=".$modo."&pagina=".$paginanr2."'>Página Anterior</a>&nbsp;";}
if($pagina==2) {echo "<a href='blog.php?mode=".$modo."'>Página Anterior</a>&nbsp;";} 
  if($modo=="pt") { $contarposts = mysql_query ( "SELECT * FROM blog ORDER BY dataordem DESC LIMIT ".$algurit.", 100000000 " );
 $nrposts=mysql_num_rows($contarposts); }
else {
	$contarposts = mysql_query ( "SELECT * FROM blog2 ORDER BY dataordem DESC LIMIT ".$algurit.", 100000000 " );
 $nrposts=mysql_num_rows($contarposts);
}
if($nrposts > $ppp) { echo "<a href='blog.php?mode=".$modo."&pagina=".$paginanr."'>Página Seguinte</a>";}
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
