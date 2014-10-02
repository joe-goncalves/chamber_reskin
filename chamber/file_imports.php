
<?php include "includes/-header.php";?>
<?php
if(isset($_POST['upload']) &&   $_FILES['userfile']['size'] > 0){
        $fileName = $_FILES['userfile']['name'];
        $tmpName  = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $fileType = $_FILES['userfile']['type'];
        $fp      = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        $content = addslashes($content);
        fclose($fp);
        if(!get_magic_quotes_gpc()){
            $fileName = addslashes($fileName);
        }
        $query = "INSERT INTO upload (name, size, type, content ) "."VALUES ('$fileName', '$fileSize', '$fileType', '$content')";
        if ($fileSize<$_POST['MAX_FILE_SIZE']){
                $mysqli->query($query);
        }
        echo "<h1>File $fileName uploaded<h1>";
        exit();
} 
?>


        <div class="col-lg-8">
                <form method="post" enctype="multipart/form-data" role="form">
                  <div class="form-group">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="userfile" name="userfile" class="btn btn-sm btn-default">
                    <input type="submit" name="upload" class="box" id="upload" value="Upload">
                    <p class="help-block">Upload your Home page Ad here</p>
                  </div>
                </form>
	</div>
<?php include "includes/-footer.php";?>

