<?php
include("topo.php");
$result = mysql_query("SELECT * FROM fotografos where ativo='sim' ORDER BY id DESC");
?>
<div id="menu">
				<ul>
					<li class="current_page_item"><a href="index.php">Portal</a></li>
 <li><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li><a href="shopsparks.php">Shops/Parks</a></li>
<li class="current_page_item2"><a href="fotofilme.php">Foto/Filme</a></li>
					<li><a href="blog.php?mode=pt">Nacional</a></li>
					<li><a href="blog.php?mode=global">lá fora</a></li>
					
                                       
				</ul>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page">
<p></p>
				<div id="contenttotal">
				  <h2>todos os fotógrafos.</h2>


					<div id="poptrox2">
	<ul id="gallery2">
	<!-- start -->
	<?php
		  while($row = mysql_fetch_array($result)) {
			echo '<li><a href="foto.php?fotografoid='.$row["id"].'" target="_top"><img src="'.$row["imagem"].'" /></a></li>';  
		  }
	?>			

		
	</ul>
	<p>
     <br class="clear" />
	<script type="text/javascript">
		$('#gallery').poptrox();
		</script>
	<!-- end -->
</p>
</div>
 

					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->

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