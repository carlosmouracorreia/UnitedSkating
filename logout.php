<?php
 
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
if(isset($_COOKIE["user"])) {
	setcookie("user", $user, time()-3600);
	$mensagem = " Logout com sucesso. <a href='blog.php?mode=".$modo."'> Página inicial </a>";
	}
	elseif(isset($_COOKIE["admin"])) {
		   	setcookie("admin", $useradmin, time()-3600);
				$mensagem = " Logout com sucesso. <a href='blog.php?mode=".$modo."'> Página inicial </a>";

	}
	else {
		header ("Location: blog.php?mode=".$modo."");
		}

include("topo.php");
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
               <h2> logout. </h2>
					<?php  echo $mensagem; ?>
					
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
