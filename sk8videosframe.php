<?php
include("config.php");
$result = mysql_query("SELECT * FROM sk8videos ORDER BY id DESC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body {
	background: #D3D3D3;
}
#poptrox3 {
	width: 250px;
	margin: 0px auto;
}

#gallery {
	overflow: hidden;
	margin: 0px;
	padding: 0px;
	list-style: none;
}

#gallery li {
	float: left;
	margin: 0px;
	padding: 10px;
}

#gallery img {
	border: 5px solid #FFFFFF;

}


</style>
</head>

<body>

<div id="poptrox3">
	<!-- start -->
	<ul id="gallery">
    <?php
		  while($row = mysql_fetch_array($result)) {
			echo '<li><a href="sk8videos.php?videoid='.$row["id"].'" target="_top"><img src="'.$row["imagem"].'" /></a></li><br />';  
		  }
	?>
	

		
	</ul>
	<p><br class="clear" />
	<script type="text/javascript">
		$('#gallery').poptrox();
		</script>
	<!-- end -->
</p>
</div>
</body>
</html>
