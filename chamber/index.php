
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
        <h4>Upcoming Chamber Meeting</h4>
       <div class="col-lg-6">
          <?php  event::postNextMeeting($mysqli);?>
       </div>
    </div>
    <div class="row">
        <h4>Presidents Message</h4>
       <div class="col-lg-12">
          <?php getPresMessage($mysqli, true);?>
       </div>
    </div>
    <div class="row">
        <h4>Welcome To Ronkonkoma</h4> 
        <div class="thumbnail col-lg-2">
            <img src="images/about_ronk.jpg" alt=" ">
        </div>
        <div class="col-lg-10">
          The chamber is comprised of people who are committed to improving the economic climate and quality of life in the greater Ronkonkomas. The strength of the chamber lies in the size and diversity of its membership. Both large and small businesses from virtually every profession are represent. The members ARE the chamber.
        </div>
    </div>
<?php include "includes/-footer.php";?>
   