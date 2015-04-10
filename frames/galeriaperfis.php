<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1"> 
<link rel="stylesheet" href="../css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
<style>
body {
	background: #C7C7C7;


}
#myGallery
{
width: 360px !important;
height: 220px !important;
} 
</style>
<script src="../scripts/mootools-1.2.1-core-yc.js" type="text/javascript"></script>
		<script src="../scripts/mootools-1.2-more.js" type="text/javascript"></script>
		<script src="../scripts/jd.gallery.js" type="text/javascript"></script>
		<script src="../scripts/jd.gallery.transitions.js" type="text/javascript"></script>
<script type="text/javascript">
function startGallery() {
var myGallery = new gallery($('myGallery'), {
timed: true
});
}
window.addEvent('domready', startGallery);
</script> 
<?php
include("../config.php");
$id = $_GET["id"];
$tipo = $_GET["tipo"];
$result = mysql_query("SELECT * FROM galeriaperfis WHERE perfilid='".$id."' and tipo='".$tipo."' order by id DESC");
while($row = mysql_fetch_array($result)) {
echo "<script language='JavaScript'>
function openNewWindow".$row["id"]."() {
 popupWin = window.open('".$row["link"]."',
 'open_window')
 }
 </script>";	
}
?>

<p></p>
					<div id="myGallery">
                    <?php 
					$result2 = mysql_query("SELECT * FROM galeriaperfis WHERE perfilid='".$id."' and tipo='".$tipo."' order by id DESC");
while($row2 = mysql_fetch_array($result2)) {
	?>
                    <div class="imageElement">
<h3><?php echo $row2["titulo"]; ?></h3>
<p><font size="1px"><?php echo $row2["descricao"]; ?></font></p>
<a href="javascript:openNewWindow<?php echo $row2["id"]; ?>();" title="clique para ver!" target="_top" class="open"></a>
<img src="<?php echo $row2["foto"]; ?>" class="full" />
</div>
<?php
}
?>
</div> 