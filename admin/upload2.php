<?php
include('../config.php');
                if(isset($_COOKIE["admin"]) and $passadmin==$_COOKIE["admin"]) {
if ((isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : '')) == 'image') {

include('class.upload.php');
include ("barra.php");
$cli = (isset($argc) && $argc > 1);
if ($cli) {
    if (isset($argv[1])) $_GET['file'] = $argv[1];
    if (isset($argv[2])) $_GET['dir'] = $argv[2];
    if (isset($argv[3])) $_GET['pics'] = $argv[3];
}

// set variables
$dir_dest = "images/uploads/";
$dir_pics = "images/uploads/";


// ---------- IMAGE UPLOAD ----------

    // we create an instance of the class, giving as argument the PHP object
    // corresponding to the file field from the form
    // All the uploads are accessible from the PHP object $_FILES
    $handle = new Upload($_FILES['my_field']);

    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if ($handle->uploaded) {

        // yes, the file is on the server
        // below are some example settings which can be used if the uploaded file is an image.
		if(isset($_POST["redimensionar"])) {  $handle->image_resize  = true; } else {  $handle->image_resize = false;
		 }
		if(isset($_POST["redimensionar"])) {      if(isset($_POST["racio"])) {  $handle->image_ratio  = true; } else {  $handle->image_ratio = false;
		 } }
		 
       if($_POST["altura"]!="") { $handle->image_y       = $_POST["altura"]; }
	          if($_POST["largura"]!="") { $handle->image_x       = $_POST["largura"]; }

        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            echo '<fieldset>';
            echo '  <legend>file uploaded with success</legend>';
            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  <p>' . $info['mime'] . ' &nbsp;-&nbsp; ' . $info[0] . ' x ' . $info[1] .' &nbsp;-&nbsp; ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB</p>';
            echo '  link to the file just uploaded: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '</fieldset>';
        } else {
            // one error occured
            echo '<fieldset>';
            echo '  <legend>file not uploaded to the wanted location</legend>';
            echo '  Error: ' . $handle->error . '';
            echo '</fieldset>';
        }

        // we delete the temporary files
        $handle-> Clean();

    } else {
        // if we're here, the upload file failed for some reasons
        // i.e. the server didn't receive the file
        echo '<fieldset>';
        echo '  <legend>file not uploaded on the server</legend>';
        echo '  Error: ' . $handle->error . '';
        echo '</fieldset>';
    }
}
				}
    ?>