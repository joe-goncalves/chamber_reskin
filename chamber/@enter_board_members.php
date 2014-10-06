<?php include "includes/-header.php";?>
<?php
if ($_POST['enterMember']=="done"){
    $cur= new boardmember();
    $cur->createFromForm($mysqli); 
}
?> 
<div class="col-lg-8">
    <form method="post" enctype="multipart/form-data" role="form">
      <div class="form-group">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <div class="form-group">
            <label class = 'control-label' for="exampleInputFile">Member Role</label>
            <select name = "role_id" class="form-control">
                <?php drawOptionsFromTable("board_member_roles", $mysqli);?>
            </select>
        </div>
        <div class="form-group">
            <label class = 'control-label' for = 'name'>Name</label>
            <div class="input-group">
                <input type='text' class="form-control" name='name'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class = 'control-label' for = 'website'>Website</label>
            <div class="input-group">
                <input type='text' class="form-control" name='website'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-globe"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class = 'control-label' for = 'company'>Company</label>
            <div class="input-group">
                <input type='text' class="form-control" name='company'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-building"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class = 'control-label' for = 'phone'>Phone</label>
            <div class="input-group">
                <input type='text' class="form-control" name='phone'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-phone"></span>
                </span>
            </div>
        </div>
        <div class='form-group'>
            <label class = 'control-label' for = 'bio'>Biography</label>
            <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label class = 'control-label' for="email">Email Address</label>
            <div class="input-group">
                <input type="text" id="email" name="email" class="form-control">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope"></span>
                </span>
            </div>

        </div>
        <div class="form-group">
            <label class = 'control-label' for="userfile">Profile Image</label>
            <div class="input-group">
                <input type="file" id="userfile" name="userfile" class="form-control">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-upload"></span>
                </span>
            </div>
        </div>
        <input type="submit" name="enterMember" class="btn btn-lg-default" id="upload" value="done">
      </div>
    </form>
</div>
<?php include "includes/-footer.php";?>


