<!DOCTYPE html>
<html lang="en">

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Simple Sidebar - Start Bootstrap Template</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body{
            background-color: #eee;
        }
        #main-nav{
            width:100%;
        }
        #main-nav>li{
            border-right: 0.5px solid #5d62bd;
            max-height: 55px;
            width: 20%;
        }
        #main-nav li.last{
            border-right: 0;
        }
        .navbar-collapse.collapse.in #main-nav li{
            width:100%;
        }
        #main-nav li a{
            color:#fff;
            text-shadow: 2px 2px 1px black;
            text-transform: uppercase;
            font-weight: bold;
            padding-bottom: 14px
        }
        #main-nav .dropdown-menu li{width:100%}
        #header-img{
            width:100%;
            margin-left: 1%;
            position: relative;
            z-index: 1000000;
            pointer-events:none;
            background-color: none;
        }
        #nav-holder{
            background: url('images/nav_background.png');
            background-repeat: repeat-x;
        }
        .navbar-collapse.collapse.in{
            background-color: #5359B5;
            border: none;
        }
        #nav-holder{
            margin-top: -5.2%;
            width:100%;
            margin-right:auto;
            border: none;
        }
        .navbar-default .navbar-toggle{
            background-color: transparent;
            color:#fff;
        }
        .navbar-default .navbar-toggle .icon-bar {
            background-color: #FFF;
        }
        .dropdown-menu {
            background-color: #b88608;
            width:100%;
        }
        #footer{
            background: url("../images/footer_background.png") repeat-x;
            max-height: 218px;
            padding:15px;
            color:#fff;
            position: relative;
            z-index: 500000;
            text-shadow: 2px 2px 1px #000;
        }
        #footer h2:{

        }
    </style>
</head>
<body>
<div id="wrapper">
<img id='header-img' src="images/header-img.png"/>
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
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" id = 'nav-holder'>
        <ul class="nav navbar-nav" id="main-nav">
            <li class="dropdown first">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="member/member_by_category.asp">Browse By Category</a></li>
                    <li><a href="member/member_by_name.asp">Browse By Name</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About The Chamber</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="about_chamber/our_mission.asp">Our Misson</a></li>
                    <li><a href="about_chamber/message_from_president.asp">President's Message</a></li>
                    <li><a href="about_chamber/officers_and_directors.asp">Chamber Officers and Directors</a></li>
                    <li><a href="about_chamber/advertise.asp">Advertise With Us</a></li>
                    <li><a href="about_chamber/super_saver.asp">Super Saver Program</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events &amp; Meetings</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="event_calendar/upcoming_event_list.asp">Upcoming Events &amp; Meetings</a></li>
                    <li><a href="event_calendar/past_event_list.asp">Past Events &amp; Meetings</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Ronkonkoma</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="about_ronkonkoma/orignal_residents.asp">Original Residents and Early Settlers</a>
                    <li><a href="about_ronkonkoma/summer_resort.asp">Summer Resort</a></li>
                    <li><a href="about_ronkonkoma/myths_and_legends.asp">Myths and Legends</a></li>
                    <li><a href="about_ronkonkoma/the_future.asp">The Future</a></li>
                </ul>
            </li>
            <li class="dropdown last">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Membership</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="join_renew/membership_types.asp">Membership Details</a></li>
                    <li><a href="join_renew/form.asp">Begin or Renew your Membership</a></li>
                </ul>
            </li>
        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <?php include("includes/slideshow.php"); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <div id="footer">
        <div class="container">
            <div>
                <h2>The Chamber of Commerce of the Greater Ronkonkomas</h2>
                <table>
                    <tr>
                        <td>Contact Us:</td>
                        <td>PO Box 2546</td>
                        <td>p: 631-963-2796</td>
                    </tr>
                    <tr>
                        <td>Ronkonkoma, NY 11779</td>
                        <td>e:  <a class="foot_links" href="mailto:info@ronkonkomachamber.com">info@ronkonkomachamber.com</a></td>
                    </tr>
                </table>
            </div>
            <p class="footnotes">Copyright &copy; 2013. The Chamber of Commerce of the Great Ronkonkomas</p>
        </div>
    </div>
</body>
</html>
