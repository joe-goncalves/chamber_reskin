<?php include './-local_settings.php';?>
<?php include './includes/-custom_functions.php';?>
<?php include './includes/-classes.php';?>
<?php include "./includes/-header.php";?>
<?php include "./includes/-sidebar.php"; ?>
<div class="col-md-9">
  <?php
  $event = new event($_GET['id'], $mysqli);
  echo "<h2>" . $event->name . "</h2>"; 
  echo "<ul class = 'list-unstyled'>"; 
  $details = $event->properNameArray();
  foreach($details as $key => $val){
    if ($key=="Date"){
      $date=strtotime($val);
      $month=date("F",$date);
      $day=date("d",$date);
      $year=date("Y",$date); 
      $dayofweek=date("l",$date);
      if(isset($details['Time'])&&!empty($details['Time'])){
        $timeholder=" at ".$details['Time'];
      }
      echo "<li class='lead'>".
              $dayofweek.", ".$month." ".$day." ".$year.$timeholder.
            "</li>";
    }
    else if($key!="Name"&&$key!="Time"){
      echo "<li>";
      echo $val;
      echo "<li>";
    }
  }
  echo "</ul>";
  ?>
</div>
<?php include "./includes/-footer.php";?>
