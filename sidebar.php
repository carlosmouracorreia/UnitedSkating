<div id="sidebar">
					<ul>
						<li>
							<?php
							include("login.php");
							?>
							<div style="clear: both;">&nbsp;</div>
						</li>
						<?php
						if($modo=="pt") { 
						?> <li>
							<h2>Blogroll nacional</h2>
							<p>Nesta secçao podem ser encontradas noticias relacionadas com o panorma nacional de skate, incluindo campeonatos, revistas, videos, marcas entre outros. Este blog está em constante actualizaçao para que estejas sempre actualizado.</p>
						</li> <?php
						}
						else {
							?>
							<h2>Blogroll internacional</h2>
							<p>Nesta secçao podem ser encontradas noticias relacionadas com o panorma internacional de skate, incluindo noticias de pros, campeonatos espalhados pelo mundo, videos  entre outros. Este blog está em constante actualizaçao para que estejas sempre actualizado.</p>
						</li><?php
							}
						?>
						<li>
							<h2>Tags</h2>
                            <?php
							if($modo=="pt") {
									echo "<ul>";
								$stack = array("", "");
									$resultad = mysql_query("SELECT * FROM blog");
while($tagsf=mysql_fetch_array($resultad)) {
	if($tagsf["tag1"]!="") {
array_push($stack, $tagsf["tag1"]);
	}
	if($tagsf["tag2"]!="") {
array_push($stack, $tagsf["tag2"]);
	}
	if($tagsf["tag3"]!="") {
array_push($stack, $tagsf["tag3"]);
	}
	
	$finali= array_unique($stack);
	$final = array_filter($finali); 
	sort($final);

}
	foreach ($final as $numero => $tagok) {
		    echo '<li><a href="tags.php?mode=pt&tag='.$tagok.'">'.$tagok.'</a></li>';
	}
										echo "</ul>";

								}
								if($modo=="global") {
									echo "<ul>";
								$stack = array("", "");
									$resultad = mysql_query("SELECT * FROM blog2");
while($tagsf=mysql_fetch_array($resultad)) {
	if($tagsf["tag1"]!="") {
array_push($stack, $tagsf["tag1"]);
	}
	if($tagsf["tag2"]!="") {
array_push($stack, $tagsf["tag2"]);
	}
	if($tagsf["tag3"]!="") {
array_push($stack, $tagsf["tag3"]);
	}
	
	$finali= array_unique($stack);
	$final = array_filter($finali); 
	sort($final);

}
	foreach ($final as $numero => $tagok) {
		    echo '<li><a href="tags.php?mode=global&tag='.$tagok.'">'.$tagok.'</a></li>';
	}
										echo "</ul>";

								}
							?>
							
							
						</li>
						<li>
							<h2>Arquivo</h2>
                             <?php
							if($modo=="pt") {
									echo "<ul>";
								$stack2 = array("", "");
									$resultad2 = mysql_query("SELECT * FROM blog");
while($tagsf2=mysql_fetch_array($resultad2)) {
	
	
array_push($stack2, $tagsf2["mes"]);
	
	
	$finali2 = array_unique($stack2);
	$final2 = array_filter($finali2); 
	arsort($final2);

}
	foreach ($final2 as $numero2 => $tagok2) {
		    echo '<li><a href="arquivo.php?mode=pt&mes='.$tagok2.'">'.$tagok2.'</a></li>';
	}
										echo "</ul>";

								}
								
								?>
                                    <?php
							if($modo=="global") {
									echo "<ul>";
								$stack2 = array("", "");
									$resultad2 = mysql_query("SELECT * FROM blog2");
while($tagsf2=mysql_fetch_array($resultad2)) {
	
	
array_push($stack2, $tagsf2["mes"]);
	
	
	$finali2 = array_unique($stack2);
	$final2 = array_filter($finali2); 
	arsort($final2);

}
	foreach ($final2 as $numero2 => $tagok2) {
		    echo '<li><a href="arquivo.php?mode=global&mes='.$tagok2.'">'.$tagok2.'</a></li>';
	}
										echo "</ul>";

								}
								?>
						
						</li>
						
					</ul>
				</div>