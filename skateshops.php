<?php
include("topo.php");
$result = mysql_query("SELECT * FROM skateshops ORDER BY localidade ASC");
?>
<div id="menu">
				<ul>
					<li class="current_page_item"><a href="index.php">Portal</a></li>
 <li><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li class="current_page_item2"><a href="shopsparks.php">Shops/Parks</a></li>
<li><a href="fotofilme.php">Foto/Filme</a></li>
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
<p>&nbsp;</p>
				<div id="contenttotal">
				  <h2>skateshops.</h2>
                  <p>Esta secção pretende englobar skateshops por todo o país, recolhendo informações, vídeos de teamriders, fotografias e muito mais.</p>
<p>Se tem uma loja e pretende promover o seu trabalho abrangendo diferentes públicos, esta poderá ser uma boa opção para si. O seu perfil no nosso site poderá conter toda a informação sobre a sua loja, fotografias, teamriders e muito mais. <a href="formloja.php">Preencher formulário de inscrição.</a></p>
                <p>&nbsp;</p>
					<div id="poptrox2">
	<!-- start -->
	<ul id="gallery2">
    <?php
		  while($row = mysql_fetch_array($result)) {
			echo '<li><a href="loja.php?lojaid='.$row["id"].'" target="_top"><img src="'.$row["imagem"].'" /></a></li>';  
		  }
	?>
	</ul>

             <p>&nbsp;</p>


	<p>
     <br class="clear" />
	
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