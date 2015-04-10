 
<?php
$mysql_host = "hostingmysql155.amen.pt";
$mysql_database = "unitedskating_com_united";
$mysql_user = "HS158_united";
$mysql_password = "bateaporta123";
$con = mysql_connect("$mysql_host","$mysql_user","$mysql_password");
if (!$con)
  {
  die('Erro de conneccao, fale com o administrador.' . mysql_error());
  }
$bdc = mysql_select_db("$mysql_database", $con);

if(!$bdc) {echo "erro de connect a db";}
$manobra = $_GET["skaterid"];
if($manobra=="") { $manobranull="true"; }
elseif(!is_numeric($manobra)) { header("Location: checkout.php");}
$manobra = mysql_real_escape_string($manobra);
$contarids = mysql_query ( "SELECT * FROM checkout WHERE id='".$manobra."'" );
$idsnumero=mysql_num_rows($contarids);
if($idsnumero=="0" and $manobra!="") { header("Location: checkout.php");}
include("topo.php");
?>
<div id="menu">

				<ul>
					<li class="current_page_item"><a href="index.php">Portal</a></li>
 <li class="current_page_item2"><a href="culturarodas.php">Cultura em Rodas</a></li>
					<li><a href="shopsparks.php">Shops/Parks</a></li>
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
<p></p>
				<div id="contenttotal">
				  <h2>checkout. </h2>


		
	 <a name="main" id="main"></a>
  <div id="bg1a">
		<div id="bg2a">
			<div id="bg3a">
<?php

if($manobranull=="true") {
$result = mysql_query("SELECT * FROM checkout ORDER BY id DESC limit 1");
$row = mysql_fetch_array($result);
echo $row["codigo"];
						}
 else {
	 $result = mysql_query("SELECT * FROM checkout WHERE id='".$manobra."'");
$row = mysql_fetch_array($result);
echo $row["codigo"];
}
?>
				</div>
                
                </div>
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