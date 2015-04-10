<?php
$modo = $_GET["mode"];


 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");
	 }
	 include("topo.php");
	  $id = $_GET["user"];
	  $id = mysql_real_escape_string($id);
	  $numcom23 = mysql_query ( "SELECT count(*) from utilizadores WHERE user='".$id."'" );
 list ( $numcom5 ) = mysql_fetch_row ( $numcom23 );
 
 if($numcom5!=0) {
	 $array2 = mysql_query("SELECT * FROM utilizadores WHERE user='".$id."'");
$row = mysql_fetch_array($array2);

 } else {
echo '<script type="text/javascript">

<!--
window.location = "index.php"
//-->
</script>';	 
 }
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
                <h3> Utilizador "<?php echo $id; ?>"</h2>
                <p>&nbsp;</p>
                <?php
$user = $row["user"];
$pnome = $row["pnome"];
$site = $row["site"];	
			if($row["data"]!="") {$data = date("Y-m-d",$row["data"]);
$hora = date("H:i:s",$row["data"]);
}
else {
	$data="NUNCA";
	$hora="NUNCA";
}
$commts = mysql_query ( "SELECT count(*) from comments WHERE userid='".$row["id"]."' and modo='pt'" );
 list ( $comments ) = mysql_fetch_row ( $commts );
  $commts2 = mysql_query ( "SELECT count(*) from comments WHERE userid='".$row["id"]."' and modo='global'" );
 list ( $comments2 ) = mysql_fetch_row ( $commts2 );
$commentssoma = $comments2 + $comments;
			 ?>
                <div align="center">
                <h3> dados principais. </h3>
                <b class="red3"> Utilizador: </b> <?php echo $id ; ?> <br />
                               <b class="red3"> Ultima Visita: </b>  <?php echo "$data $hora" ; ?> <br />
                                             <b class="red3"> Nome:  </b> <?php echo $pnome ; ?> <br />
<p>&nbsp;</p>
<h3> outros dados. </h3>
              <b class="red3"> Idade:  </b> <?php echo $row["morada"]; ?> <br />
               <b class="red3"> Localidade:  </b> <?php echo $row["codigo"]; ?> <br />
               <b class="red3"> Site:  </b> <?php echo $row["telefone"]; ?> <br />
               <b class="red3">Sobre Mim: </b> <?php echo $site ; ?> <br />
              <b class="red3"> Comentários no blog: </b> <?php echo $commentssoma ;  if ($commentssoma!=0) { echo '&nbsp;<a href="comentarios.php?user='.$row["id"].'&mode='.$modo.'">Ver comentários</a>';}?>
              </div>
	 
					
					
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
