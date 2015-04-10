<div align="center">
<table width="960" border="0">
  <tr>
    <td> <?php
	$selecti3 = mysql_query("SELECT * FROM publicidade order by rand() limit 1");
	$arrayi3 = mysql_fetch_array($selecti3);
	while($arrayi3["nome"]==$arrayi22["nome"]) {
		$selecti3 = mysql_query("SELECT * FROM publicidade order by rand() limit 1");
	$arrayi3 = mysql_fetch_array($selecti3);
		}
	?>
            <?php  if($arrayi3["tipo"]=="flash") { echo $arrayi3["foto"]; } else { ?>

<a href="<?php echo $arrayi3["link"] ?>"><img src="<?php echo $arrayi3["foto"] ?>" id="imglol" style="border-style: none"  alt="" width="640" height="95"></a>

<?php } ?></td>
    <td>	<?php
	$selecti = mysql_query("SELECT * FROM publicidade2 order by rand() limit 1");
	$arrayi = mysql_fetch_array($selecti);
	while($arrayi["nome"]==$arrayi22["nome"] or $arrayi["nome"]==$arrayi3["nome"] ) {
		$selecti = mysql_query("SELECT * FROM publicidade2 order by rand() limit 1");
	$arrayi = mysql_fetch_array($selecti);
		}
	?>
<a href="<?php echo $arrayi["link"] ?>"><img src="<?php echo $arrayi["foto"] ?>" width="298" height="95" id="imglol" style="border-style: none" alt=""></a></td>
  </tr>
</table>
             
                
<p>&nbsp;</p>
                </div>
                

<div id="footer">
	<b><p>Copyright (c) 2011 unitedskating. Tema <a href="http://www.freecsstemplates.org/">Highway</a>. Editado e programado por Carlos Correia</p></b>
</div>
<!-- end #footer -->
</body>
</html>
