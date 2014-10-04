<ul class="list-unstyled">
    
    <li>
        <button type="button" class="btn btn-default btn-lg">
            <span>Advertise&nbsp;with&nbsp;Us!</span>
        </button>
    </li>
    <li>
        <ul class="list-unstyled" >
            <li class="list-group-item list-group-item-info">Upcoming Events &amp; Meetings</li>
            <?php
            $res = $mysqli->query("SELECT pkid FROM event WHERE eventDateExp>curdate() ORDER BY eventDate LIMIT 3");
            while ($row = $res->fetch_assoc()){
                $cur=new event($row['pkid'],$mysqli);
                $cur->drawEventLink();
            }
            ?>
            <li><a class = 'list-group-item' href="<?=$local_url?>/event-upcoming-list.php">View Full List</a></li>
        <ul/>
    </li>
</ul>