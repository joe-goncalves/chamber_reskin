
<div id="sidebar-wrapper" class="col-md-3">
    <div class="row">
        <?php banner_ad::drawXAds(2);?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="button" id = "advertisewithus" class="btn btn-default btn-md">
                <span>Advertise&nbsp;with&nbsp;Us!</span>
                <script>
                    $(document).ready(function(){
                        $("#advertisewithus").click(function(e){
                            e.preventDefault;
                            window.location.replace("http://beta.ronkonkomachamber.com/chamber/about_chamber/advertise.php");
                        });
                    });
                </script>
            </button>
        </div>
    </div>
    <div class="row hidden-xs">
        <div class="col-md-12">
            <ul class="list-unstyled">
                <li class="list-group-item list-group-item-info">Upcoming Events &amp; Meetings</li>
                <?php
                $res = $mysqli->query("SELECT pkid FROM event WHERE eventDateExp>curdate() ORDER BY eventDate LIMIT 3");
                while ($row = $res->fetch_assoc()){
                    $cur=new event($row['pkid'],$mysqli);
                    echo $cur->drawEventLink(false);
                }
                ?>
                <li>
                    <a class='list-group-item' href="<?=$GLOBALS['local_url']?>/event-upcoming-list.php">View Full List</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row hidden-xs">
        <div class="col-md-12">
            <div class="media">
                <a class="pull-left" href="<?=$GLOBALS['local_url']?>/about_chamber/super_saver.php">
                    <img class="media-object" src="<?=$GLOBALS['local_url']?>/images/ssHead.jpg" alt="...">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="<?=$GLOBALS['local_url']?>/about_chamber/super_saver.php">Super Saver Rewards</a></h4>
                        We encourage people to shop local
                        <a href="<?=$GLOBALS['local_url']?>/about_chamber/super_saver.php">view a list of participants</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row hidden-xs">
        <div class="col-md-12">
            <div class="fb-like-box" style="margin-bottom:10px;" data-height="307px" data-href="http://www.facebook.com/pages/Ronkonkoma-Chamber-of-Commerce/193799817361633" data-show-faces="true" data-stream="false" data-header="true"></div>
        </div>    
    </div>
</div>


