

<?php include "includes/-header.php";?>
<?php
if(isset($_POST['upload']) &&   $_FILES['userfile']['size'] > 0){
        $fileName = $_FILES['userfile']['name'];
        $tmpName  = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $fileType = $_FILES['userfile']['type'];
        $upload_type = $_POST['upload_type'];
        $fp      = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        $content = addslashes($content);
        fclose($fp);
        if(!get_magic_quotes_gpc()){
            $fileName = addslashes($fileName);
        }
        $query = "INSERT INTO upload (name, size, type, content, upload_type_id) "."VALUES ('$fileName', '$fileSize', '$fileType', '$content', $upload_type)";
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
                <div class="form-group">
                    <label class = 'control-label' for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <input type="file" id="userfile" name="userfile" class="form-control">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-upload"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class = 'control-label' for="exampleInputFile">Upload Role</label>
                    <select name = "upload_type" class="form-control">
                        <?php drawOptionsFromTable("upload_types", $mysqli);?>
                    </select>
                </div>
                <div id="exp_date_holder" class="form-group hidden">
                    <label class = 'control-label' for = 'exp_date'>expiration date</label>
                    <div class='input-group date' id='exp_date'>
                        <input type='text' class="form-control" name='exp_date'/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>



                <input type="submit" name="upload" class="btn btn-lg-default" id="upload" value="Upload">
              </div>
            </form>
	   </div>
<?php include "includes/-footer.php";?>
<script>
$(document).ready(function(){
  $("[name='upload_type']").change(function(){
    $("#exp_date_holder").addClass('hidden');
    var curval = $(this).children("option:selected").val();
    if (curval==3){
        $("#exp_date_holder").removeClass('hidden');      
    }
  }); 
});
</script>

