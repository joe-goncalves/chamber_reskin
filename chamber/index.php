
<?php include "includes/-header.php";?>
        <div class="col-lg-10">
            <?php include("includes/-slideshow.php"); ?>
        </div>
        <div class="row">
        	<div class="col-lg-4">
        		<h4>Please join us in welcoming our new member</h4>
        		<?php  member::getLastXmembers(4,$mysqli); ?>
        	</div>
        	<div class="col-lg-4">
        		<h4>Today's member of the day is:</h4>
        		<?php $member=new member();$member->drawMemberOfTheDay($mysqli);?>
        	</div>
        </div>
        <div class = "row">
        	<div class="col-lg-8">
        		
        	</div>
       	</div>
<?php include "includes/-footer.php";?>
   