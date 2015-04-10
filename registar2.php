<?php
 if(isset($_COOKIE["user"]) and $_COOKIE["user"]!=$security["securitymd5"]) {
 if($_GET["mode"]=="pt") {}
 elseif($_GET["mode"]=="global") {}
 else {
	header("Location: index.php");	
	 }
	 $modo = $_GET["mode"];

include("topo.php");

$user=$_GET["user"];
$id=$_GET["id"];
$datareg = mysql_query ( "SELECT * from utilizadores WHERE user='". $user . "'" );
$regdata = mysql_fetch_array ( $datareg );
$tempolola = $timeAfterOneHour - $regdata["datareg"];
if($tempolola > 43200 and  $regdata["activo"]=="nao") { 
mysql_query ( "DELETE from utilizadores WHERE user='". $user . "'" );
}
$linha = mysql_fetch_array(mysql_query("SELECT * FROM utilizadores WHERE user='$user'"));
if($linha["user"]==$user && $linha["activo"]=="nao" && $linha["pass"]==$id )
{
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
               <h2> registo. </h2>
					<p>&nbsp;</p>
                     <?php
				mysql_query("UPDATE utilizadores SET activo='sim' WHERE user='$user'");
				echo '<b class="red">Registado com sucesso. Já pode efectuar login!</b>';
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
window.location = "blog.php?msg=regnexiste&mode='.$modo.'"
//-->
</script>';
	
}
 }
else {
header("Location: index.php");	
}
?>
