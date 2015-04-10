<?php
$mysql_host = "localhost";
$mysql_database = "united";
$mysql_user = "root";
$mysql_password = "";
$con = mysql_connect("$mysql_host","$mysql_user","$mysql_password");
if (!$con)
  {
  die('Erro de conneccao, fale com o administrador.' . mysql_error());
  }
$bdc = mysql_select_db("$mysql_database", $con);

if(!$bdc) {echo "erro de connect a db";}
$manobra = $_GET["parkid"];
if(!is_numeric($manobra)) { header("Location: skateparks.php");}
$manobra = mysql_real_escape_string($manobra);
$contarids = mysql_query ( "SELECT * FROM skateparks WHERE id='".$manobra."'" );
$idsnumero=mysql_num_rows($contarids);
if($idsnumero=="0" or $manobra=="") { header("Location: skateparks.php");}
include("topo.php");
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
	<div id="bgtop">
		<div id="page-bgtop">
			<div id="page">
<p></p>
<?php
$result = mysql_query("SELECT * FROM skateparks  WHERE id='".$manobra."'");
$row = mysql_fetch_array($result);
echo $row["codigo"];
?>
                
                </div>
                </div>
			
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