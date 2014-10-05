<?php include "includes/-header.php";?>
<?php
if ($_POST['pres']=="pres"){
    $message = addslashes($_POST['presMsg']);
    $query = "INSERT INTO pres_msg (message) VALUES ('".$message."')";
    $mysqli->query($query);
    echo "<h1>President's Message has been update</h1>";
    include "includes/-footer.php";
    exit();
}
?>
    <div class="col-lg-10">
        <form method="post" enctype="multipart/form-data" role="form">
            <div class='form-group'>
                <label class = 'control-label' for = 'eventLoc'>Event Location*</label>
                <textarea class="form-control" id="presMsg" name="presMsg" rows="3"></textarea>
            </div>
            <input type="submit" name="pres" class="btn btn-lg-default" id="pres" value="pres">
        </form>
    </div>
<?php include "includes/-footer.php";?>


            