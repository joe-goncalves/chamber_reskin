<?php include './-local_settings.php';?>
<?php include './includes/-custom_functions.php';?>
<?php include './includes/-classes.php';?>
<?php include "./includes/-header.php";?>
<?php include "./includes/-sidebar.php"; ?>
<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <?php include "./includes/-slideshow.php"; ?>
        </div>    
    </div>
    <hr>
    <div class="row">
	   <div class="col-md-6">
		  <h4>Please Join Us In Welcoming Our New Members</h4>
		  <?php  member::getLastXmembers(4); ?>
	   </div>
     <hr>
	   <div class="col-md-6">
		  <h4>Today's Member of the Day Is</h4>
		  <?php $member=new member();$member->drawMemberOfTheDay();?>
	   </div>
    </div>
    <hr>
    <div class="row">
	   <div class="col-md-12">
		  <?php postLatestFlyer();?>
	   </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
          <h4>Upcoming Chamber Meeting</h4>
          <?php  event::postNextMeeting();?>
       </div>
    </div>
    <hr>
    <div class="row">
       <div class="col-md-12">
          <h4>Presidents Message</h4>
          <?php getPresMessage(true);?>
       </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h4>Welcome To Ronkonkoma</h4> 
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-3">
        <img class='thumbnail' src="./images/about_ronk.jpg" alt=" ">
      </div>
      <div class="col-md-9">
        The chamber is comprised of people who are committed to improving the economic climate and quality of life in the greater Ronkonkomas. The strength of the chamber lies in the size and diversity of its membership. Both large and small businesses from virtually every profession are represent. The members ARE the chamber.
      </div>
    </div>
  </div>
<?php include "./includes/-footer.php";?>
   