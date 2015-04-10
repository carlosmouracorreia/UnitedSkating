<?php
include("topo.php");
?>
 <script src="galleryview/js/jquery.js"></script>
<script src="galleryview/js/jquery.galleryview-2.0-pack.js"></script>
<script src="galleryview/js/jquery.timers-1.1.2.js"></script>
<script src="galleryview/js/jquery.easing.1.3.js"></script><!-- This is optional !-->
<link rel="stylesheet" href="galleryview/css/galleryview.css" type="text/css" /><script>
	$(document).ready(function(){
		$('#gallery').galleryView({
			panel_width: 610,
			panel_height: 300,
			frame_width: 50,
			frame_height: 50,
      		transition_speed: 350,
     		 easing: 'easeInOutQuad',
			transition_interval: 5000
		});

	});
	

</script>

<div id="menu">
				<ul>
					<li class="current_page_item"><a href="#">Portal</a></li>
 <li><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li><a href="shopsparks.php">Shops/Parks</a></li>
<li><a href="fotofilme.php">Foto/Filme</a></li>
					<li><a href="blog.php?mode=pt">Nacional</a></li>
					<li><a href="blog.php?mode=global">lá fora</a></li>
					
                                       
				</ul>
			</div>
		</div>
        </div>
	</div>
	<!-- end #header -->
	<div id="bgtop">
		<div id="page-bgtop">
			<div id="page">
<p></p>
				<div id="contentportal">
                
               
<div id="galer">
<ul id="gallery">

   
     <?php
								$selectk = mysql_query("SELECT * FROM galeriaindex order by ordem asc limit 8");
								while($arrayk = mysql_fetch_array($selectk)) {
									
									 echo '
									   <li><span class="panel-overlay">'.$arrayk["info"].'<br /><a href="'.$arrayk["link"].'">clica aqui! (vê e sabe mais)</a></span><img src="'.$arrayk["imagem"].'" /></li>';}
							?>
  
</ul>
</div>
               <p>&nbsp;</p>
               <h2>navega.</h2>
					<div id="poptrox">
	<!-- start -->
	<ul id="gallery">
    
		<li><a class="pic1" href="culturarodas.php">.</a></li>
		<li><a class="pic2" href="skateshops.php">.</a></li>
		<li><a class="pic3" href="skateparks.php">.</a></li>
		<li><a class="pic4" href="fotofilme.php">.</a></li>
		<li><a class="pic5" href="blog.php?mode=pt">.</a></li>
		<li><a class="pic6" href="blog.php?mode=global">.</a></li>
		
	</ul>
        <span class="small">(passe por cima das imagens com o rato para obter mais informação)</span>
                <p>&nbsp;</p>

	<br class="clear" />
	</div>

					<div style="clear: both;">&nbsp;</div>
                       
				</div>
				<!-- end #content -->
<div id="sequencia">
                               
<?php
	$selecti22 = mysql_query("SELECT * FROM publicidade2 order by rand() limit 1");
	$arrayi22 = mysql_fetch_array($selecti22);
	
	?>
<a href="<?php echo $arrayi22["link"] ?>"><img src="<?php echo $arrayi22["foto"] ?>" width="286" height="83" alt="" style="border-style: none"></a>
<p>&nbsp;</p>                            <div id="novas">
							<h3>novas no blog.</h3>
                            <ul>
							<?php
								$select2 = mysql_query("SELECT * FROM blog UNION SELECT * FROM blog2 order by dataordem desc limit 5");
								while($array2 = mysql_fetch_array($select2)) {
									if($array2["modi"]=="pt") { $modo = "pt"; } 
									if($array2["modi"]=="global") { $modo = "global"; } 
									 echo '<li><a href="post.php?a='.$array2["id"].'&mode='.$modo.'">'.$array2["titulo"].'</a></li>';}
							?>
                          </ul>
                          </div>
                                      <p>&nbsp;</p>              
                                                    	

    <?php
	$select = mysql_query("SELECT * FROM filmers UNION SELECT * FROM fotografos order by rand() limit 1");
	$array = mysql_fetch_array($select);
	while($array["ativo"]=="nao") {
		$select = mysql_query("SELECT * FROM filmers UNION SELECT * FROM fotografos order by rand() limit 1");
	$array = mysql_fetch_array($select);
	}
	?>
<a href="<?php echo $array["link"] ?>"><img src="<?php echo $array["fotoinicio"] ?>" id="imglol" alt="" width="278" height="165"></a>
<p>&nbsp;</p>
<?php
	$select3 = mysql_query("SELECT * FROM skateshops UNION SELECT * FROM skateparks order by rand() limit 1");
	$array3 = mysql_fetch_array($select3);
	?>
    <a href="<?php echo $array3["link"] ?>"><img src="<?php echo $array3["fotoinicio"] ?>" id="imglol" alt="" width="278" height="165"></a>
   
				</div>
                <p>&nbsp;</p>
						
<p>&nbsp;</p>
<p>&nbsp;</p>




				</div>
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

