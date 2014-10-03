
<?php include "includes/-header.php";?>
<div class="col-lg-10">
    <div class="row">
        <div class="col-lg-12">
            <?php include("includes/-slideshow.php"); ?>
        </div>    
    </div>
    <div class="row">
	   <div class="col-lg-6">
		  <h4>Please join us in welcoming our new member</h4>
		  <?php  member::getLastXmembers(4,$mysqli); ?>
	   </div>
	   <div class="col-lg-6">
		  <h4>Today's member of the day is:</h4>
		  <?php $member=new member();$member->drawMemberOfTheDay($mysqli);?>
	   </div>
    </div>
    <div class="row">
	   <div class="col-lg-12">
		  <?php postLatestFlyer($mysqli);?>
	   </div>
    </div>
    <div class="row">
       <div class="col-lg-6">
          <h4>Upcoming Chamber Meeting</h4>
          <?php  event::postNextMeeting($mysqli);?>
       </div>
    </div>
    <div class="row">
       <div class="col-lg-12">
          <h4>Presidents Message</h4>
          <?php  getPresMessage($mysqli);?>
       </div>
    </div>
    
<?php include "includes/-footer.php";?>
   