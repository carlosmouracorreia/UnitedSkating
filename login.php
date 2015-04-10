<div id="search" >
								<?php
                                if($_GET["mode"]=="pt") {
									echo ' <form method="post" action="logins.php?mode=pt">';
									}
									if($_GET["mode"]=="global") {
									echo ' <form method="post" action="logins.php?mode=global">';
									}
								?>
								
									<div>
									<?php
									
 $querysec = mysql_query ( "SELECT * from utilizadores WHERE securitymd5='".$_COOKIE["user"] . "'" );
 $security = mysql_fetch_array ( $querysec );
									
									if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
										echo "Bem vindo administrador. <a href='logout.php?mode=".$_GET["mode"]."'> Logout </a>";
										echo "<br /> <a href='admin/index.php'>Area de administração </a> ";
									}
									
								elseif(isset($_COOKIE["user"]) and $_COOKIE["user"]==$security["securitymd5"] ) {
									echo "Bem vindo <b> ".$security["user"]." </b>.  <a href='logout.php?mode=".$_GET["mode"]."'> Logout </a>";
									echo "<br /> <a href='usercomments.php?mode=".$_GET["mode"]."'>Gerir comentários do blog</a> <br /> <a href='userdados.php?mode=".$modo."'>Editar dados</a>";
								}
								else {
									?>
									<table width="270" border="0">
								      <tr>
										    <td width="92">Utilizador:</td>
										    <td width="168">
										      <input type="text" name="user" id="user" />
								      </td>
									      </tr>
										  <tr>
										    <td>Password:</td>
										    <td><input type="password" name="pass" id="pass" /></td>
									      </tr>
										  <tr>
										    <td><input type="submit" id="search-submit" value="Login" /></td>
										    <td><a href="registo.php?mode=<?php echo $modo; ?>">Registe-se</a> <br/> <a href="recup.php?mode=<?php echo $modo; ?>">Recuperar password</a></td>
									      </tr>
</table>
<?php
								}
?>

								  </div>
								</form>
							</div>