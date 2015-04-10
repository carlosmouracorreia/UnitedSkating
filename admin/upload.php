<?php 
include('../config.php');
  if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
include ("barra.php"); 
                ?>


    <h1>Envio de Imagens</h1>

    <fieldset>
        <legend>Enviar imagens        </legend>
        <form name="form2" enctype="multipart/form-data" method="post" action="upload2.php" />
            <p><input type="file" size="32" name="my_field" value="" /></p>
            <p>
            <input type="checkbox" name="redimensionar" id="checkbox" />Redimensionar</p>
            <p> <input type="checkbox" name="racio" id="checkbox" />Manter dimensoes. ( se redimensionar)</p>
           <p> <input name="altura" type="text" /> Altura </p>
                       <p> <input name="largura" type="text" /> Largura </p>
            </p>
            <p class="button"><input type="hidden" name="action" value="image" />
            <input type="submit" name="Submit" value="enviar" /></p>
        </form>
    </fieldset>

   


</body>

</html>
<?php } ?>