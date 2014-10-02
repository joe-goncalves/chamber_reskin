<?php include $_SERVER['DOCUMENT_ROOT']."/chamber/-local_settings.php";?>
<?php include '-classes.php';?>
<?php include '-custom_functions.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $local_url; ?></title>
    <link href="<?=$local_url?>/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <img id='header-img' src="<?=$img_url?>/header-img.png"/>
    <nav class="navbar navbar-default" role="navigation" id='nav-holder'>
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" id = 'nav-holder'>
            <ul class="nav navbar-nav">
                <li class="dropdown first">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$local_url?>/member_by_category.php">Browse By Category</a></li>
                        <li><a href="<?=$local_url?>/member_by_name.php">Browse By Name</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About The Chamber</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$local_url?>/about_chamber/our_mission.php">Our Misson</a></li>
                        <li><a href="<?=$local_url?>/about_chamber/message_from_president.php">President's Message</a></li>
                        <li><a href="<?=$local_url?>/about_chamber/officers_and_directors.php">Chamber Officers and Directors</a></li>
                        <li><a href="<?=$local_url?>/about_chamber/advertise.php">Advertise With Us</a></li>
                        <li><a href="<?=$local_url?>/about_chamber/super_saver.php">Super Saver Program</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events &amp; Meetings</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$local_url?>/event-upcoming-list.php">Upcoming Events &amp; Meetings</a></li>
                        <li><a href="<?=$local_url?>/event-past-list.php">Past Events &amp; Meetings</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Ronkonkoma</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$local_url?>/about_ronkonkoma/orignal_residents.php">Original Residents and Early Settlers</a>
                        <li><a href="<?=$local_url?>/about_ronkonkoma/summer_resort.php">Summer Resort</a></li>
                        <li><a href="<?=$local_url?>/about_ronkonkoma/myths_and_legends.php">Myths and Legends</a></li>
                        <li><a href="<?=$local_url?>/about_ronkonkoma/the_future.php">The Future</a></li>
                    </ul>
                </li>
                <li class="dropdown last">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Membership</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$local_url?>/join_renew/membership_types.php">Membership Details</a></li>
                        <li><a href="<?=$local_url?>/join_renew/form.php">Begin or Renew your Membership</a></li>
                    </ul>
                </li>
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- side nav -->
    <div class="container-fluid">
        <div class="row" id="page-content">
            <div id="sidebar-wrapper" class="col-lg-2">
                <?php include $_SERVER['DOCUMENT_ROOT']."/chamber/includes/-sidebar.php";?>
            </div>