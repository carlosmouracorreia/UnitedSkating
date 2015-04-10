<?php
include('../config.php');
if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {

	$postsblog = mysql_query ( "SELECT count(*) from blog" );
 list ( $posts ) = mysql_fetch_row ( $postsblog );
 $postsblog2 = mysql_query ( "SELECT count(*) from blog2" );
 list ( $posts2 ) = mysql_fetch_row ( $postsblog2 );
 $posts3 = $posts2 + $posts;
 $commts = mysql_query ( "SELECT count(*) from comments" );
 list ( $comments ) = mysql_fetch_row ( $commts );
  $userscount = mysql_query ( "SELECT count(*) from utilizadores" );
 list ( $users ) = mysql_fetch_row ( $userscount );
 $logins = $linhar["logins"];
?>

			
				<?php include ("barra.php"); ?>
                <h2>INICIO</h2>
			   Olá caro administrador.
               <br>
               ESTATISTICAS: Nr de posts: <b class="red"> <?php echo "$posts3"; ?> </b> Nr de comments: <b class="red"> <?php echo "$comments"; ?> </b> Nr de users  <b class="red"> <?php echo "$users"; ?> </b> 
			
  
<?php
}
else {
	
 echo '<script type="text/javascript">

<!--
window.location = "../index.php"
//-->
</script>';}
?>