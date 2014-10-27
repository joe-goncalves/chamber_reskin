<!DOCTYPE html>
<html lang="en">
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Ronkonkoma Chamber</title>
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    <script>
    if (screen.width>760){
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=468937846471861&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    }
    </script>
    <script src="<?=$GLOBALS['local_url']?>/js/-bootstrap-list-filter.src.js"></script>
    <script>
        $(document).ready(function(){
            /*  member by category page  */
            $('[data-catid]').click(function(e){
                e.preventDefault();
            })
            $('.list-group-item.first').click(function(){ /*  include a catch to close open lists on click of open list header  */
               $('[data-membercatid]').parent().addClass('hidden');
               var curval = $(this).children('a').attr("data-catid");
               $("#cat-name").html($(this).children('a').text());
               $("#cat-name").removeClass('hidden');
               $('[data-membercatid='+curval+']').parent().removeClass('hidden');
               var pos = $("#cat-name").offset().top
               $('html, body').animate({scrollTop: pos},800);
               //animate({scrollTop: top}, 800);
            });
            $('[name="memberState"] option[value="NY"]').attr("selected","selected");
            if ($(".fa.fa-certificate.residential").size()>0){
                $(".fa.fa-certificate.residential").remove();
            }
        });
    </script>
    <script>
    $(document).ready(function() {
        $('#new-member').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                memberName: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The username is required and cannot be empty'
                        },
                    }
                },
                memberContactEmail: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },
                memberContactName: {
                    message: 'The contact name is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Contact name is required and cannot be empty'
                        },
                    }
                },
                memberDesc: {
                    message: 'The description is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Description is required and cannot be empty'
                        },
                    }
                },
                address1: {
                    message: 'The address is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Address is required and cannot be empty'
                        },
                    }
                },
                memberTown: {
                    message: 'The town is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Town is required and cannot be empty'
                        },
                    }
                },
                memberZip: {
                    message: 'The zip is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Zip code is required and cannot be empty'
                        },
                    }
                },
                memberContactNum: {
                    message: 'The number is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Phone number is required and cannot be empty'
                        },
                        phone: {
                            country: 'US',
                            message: 'The phone number is not valid'
                        }
                    }
                }
            }
        });
    });
    </script>
</head>
<body>
    <a href="<?=$GLOBALS['local_url']?> "><img id='header-img' alt='welcome to the chamber of ronkonkoma' src="<?=$GLOBALS['local_url']?>/images/chamber-redesign.png"/></a>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
            <ul class="nav navbar-nav">
                <li class="first">
                    <a href="<?=$GLOBALS['local_url']?>"><i class="fa fa-home menu"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$GLOBALS['local_url']?>/member_by_category.php">Browse By Category</a></li>
                        <li><a href="<?=$GLOBALS['local_url']?>/member_by_name.php">Browse By Name</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About The Chamber</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$GLOBALS['local_url']?>/about_chamber/our_mission.php">Our Misson</a></li>
                        <li><a href="<?=$GLOBALS['local_url']?>/about_chamber/message_from_president.php">President's Message</a></li>
                        <li><a href="<?=$GLOBALS['local_url']?>/about_chamber/officers_and_directors.php">Chamber Officers and Directors</a></li>
                        <li><a href="<?=$GLOBALS['local_url']?>/about_chamber/advertise.php">Advertise With Us</a></li>
                        <li><a href="<?=$GLOBALS['local_url']?>/about_chamber/super_saver.php">Super Saver Program</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events &amp; Meetings</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$GLOBALS['local_url']?>/event-upcoming-list.php">Upcoming Events &amp; Meetings</a></li>
                        <li><a href="<?=$GLOBALS['local_url']?>/event-past-list.php">Past Events &amp; Meetings</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Ronkonkoma</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$GLOBALS['local_url']?>/about_ronkonkoma/original_residents.php">Original Residents and Early Settlers</a>
                        <li><a href="<?=$GLOBALS['local_url']?>/about_ronkonkoma/summer_resort.php">Summer Resort</a></li>
                        <li><a href="<?=$GLOBALS['local_url']?>/about_ronkonkoma/myths_and_legends.php">Myths and Legends</a></li>
                        <li><a href="<?=$GLOBALS['local_url']?>/about_ronkonkoma/the_future.php">The Future</a></li>
                    </ul>
                </li>
                <li class="dropdown last">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Membership</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$GLOBALS['local_url']?>/join_renew/membership_types.php">Membership Details</a></li>
                        <li><a href="<?=$GLOBALS['local_url']?>/join_renew/form.php">Begin or Renew your Membership</a></li>
                    </ul>
                </li>
                
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- side nav -->
    <div class="container-fluid">
        <div class="row" id="page-content">