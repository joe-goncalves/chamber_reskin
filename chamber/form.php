
<?php include "includes/-header.php";?>
        <h2>Join Form</h2>
                <div class="col-lg-8">
                <?php
                $res=$mysqli->query("SELECT pkid FROM event where active = 1 and eventDateExp < curdate()");
                while ($row = $res->fetch_assoc()){
                        foreach($row as $key => $val)$$key = $val;
                        $event=new event($pkid, $mysqli);
                        echo "<a class = 'list-group-item' href='event_details.php/?id=".$event->pkid."'>".$event->name."</a>";
                }
        ?>  
</div>
<?php include "includes/-footer.php";?>

