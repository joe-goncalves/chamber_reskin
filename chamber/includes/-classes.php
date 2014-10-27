<?php
class memberCategory {
	public $name;
	public $id;
	public $count;
	function __construct ($name, $id, $formArray) {
		$this->name=$name;
		$this->id=$id;
		$res = $GLOBALS["mysqli"]->query("SELECT COUNT(pkid) AS count FROM member WHERE chamber_id = ".$GLOBALS['chamberid']." AND memberCatID=".$id);
		$row = $res -> fetch_assoc();
		$this->count=$row['count'];
	}
	function drawSelector(){
		echo "<option value='".$this->id."'>".$this->name."</option>";
	}
}


class event{
	
	public $active;
	public $pkid;
	public $price;
	public $time;
	public $type;
	public $loc;
	public $desc;
	public $date;
	public $day;
	public $name;

	function __construct  ($id){
		$this->pkid=$id;
		$res=$GLOBALS["mysqli"]->query("SELECT * FROM event WHERE pkid = ".$id);
		while ($row = $res->fetch_assoc()){
			foreach($row as $key => $val){
				$$key = $val;
			}
			$dateobj = new DateTime($eventDate);
			$date=$dateobj->format('m/d/Y'); 
			$this->active = $active;
			$this->price = $eventPrice;
			$this->time = $eventTime;
			$this->type = $eventType;
			$this->name = $eventName;
			$this->day = $eventDay;
			$this->desc = $eventDesc;
			$this->date = $date;
			$this->loc = $eventLoc;
		}
	}
	
	public static function postNextMeeting(){
		$query = "SELECT pkid FROM event WHERE chamber_id = ".$GLOBALS['chamberid']." AND eventType=2 AND curdate() < eventDateExp ORDER BY pkid DESC LIMIT 1";
		$res = $GLOBALS["mysqli"]->query($query);
		if ($res->num_rows == 1){
			$row = $res->fetch_assoc();	
			$mtg=new event ($row['pkid']);
			$mtg->drawEventLink();
		}else {
			echo "No upcoming chamber meetings.";	
		}
		
		
	}
	public function drawEventLink($inc_desc=true){
		$date=strtotime($this->date);
		$month=date("F",$date);
		$month=substr($month, 0,3);
		$day=date("d",$date);
		$dayofweek=date("l",$date);

		$output= "<li class='list-group-item'>".
					"<a class = 'event-lnk' href='".$GLOBALS['local_url']."/event_details.php/?id=".$this->pkid."'>".
						"<div class='row'>".
							"<div class='col-md-4'>".
								"<div class='post_date'>".
									"<div class='month'>".$month."</div>".
									"<div class='date'>".$day."</div>".
								"</div>".
							"</div>".
							"<div class='col-md-8'>".
								$this->name."<br>".$this->time;
							"</div>".
						"</div>".
					"</a>";
		if ($inc_desc){
			$output.="<br/>";
			$output.=$dayofweek;
			$output.=", ";
			$output.=$this->date;
			if (isset($this->time) && !empty($this->time)){
				$output.=" at ";
				$output.=$this->time;	
			}
		}
		if (isset($this->desc) && !empty($this->desc) && trim($this->desc)!="" && $inc_desc==true){
			$output.="<br/>";
			$description=strip_tags($this->desc);
			$description_array=explode(" ", $description);
			$exrp='';
			$i=0;
			while($i<15) {
				$exrp.=" ";
				$exrp.=$description_array[$i];
				$i++;
			}
			$exrp.="...";
			$output.=$exrp;	
		}
		$output.='</li>';
		echo $output;
	}

	public function properNameArray(){
		$values = array();
				$friendlyfields = array(
			"name" => "Name", 
			"date" => "Date", 
			"desc" => "Description", 
			"loc" => "Location", 
			"day" => "Day", 
			"time" => "Time", 
		);
		if ($this->price>0){
			$friendlyfields["price"] = "Price";
		}
		foreach($friendlyfields as $key => $val){
			if ($this->$key!=""){
				$values[$val]=$this->$key;
			}
		}
		return $values;

	}
	
}


class member{
	
	public $id;
	public $name;
	public $catid;
	public $catnm;
	public $chamber_id;
	public $URLName;
	public $desc;
	public $address;
	public $town;
	public $state;
	public $zip;
	public $level;
	public $contact_nm;
	public $contact_nmbr;
	public $contact_email;
	public $contact_website;
	public $supersaver;
	
	public function getLinkData($id){
		$query = "SELECT pkid, memberName FROM member WHERE chamber_id = ".$GLOBALS['chamberid']." AND pkid = ".$id." LIMIT 1";
		$res = $GLOBALS["mysqli"]->query($query);
		$row = $res->fetch_assoc();
		$this->id=$row['pkid'];
		$this->name=$row['memberName'];
	}
	
	public function drawLink(){
		echo "<a class = 'list-group-item' href='".$GLOBALS['local_url']."/member_details.php/?id=".$this->id."'>".$this->name."</a>";
	}

	public static function getLastXmembers($howmany){
		$res = $GLOBALS["mysqli"]->query("SELECT pkid FROM member WHERE chamber_id = ".$GLOBALS['chamberid']." AND active = 1 ORDER BY pkid DESC LIMIT ".$howmany);
		while ($row = $res->fetch_assoc()){
			$cur = new member();
			$cur->getLinkData($row['pkid'],$GLOBALS["mysqli"]);
			$cur->drawLink();
		}
	}

	public function drawMemberOfTheDay(){		
		$res = $GLOBALS["mysqli"]->query("SELECT COUNT(pkid) as count FROM member_of_day WHERE date(daydate)=curdate()");
		$row = $res->fetch_assoc();
		if ($row['count'] < 1){
			$GLOBALS["mysqli"]->query("TRUNCATE member_of_day");
			$GLOBALS["mysqli"]->query("insert INTO member_of_day (member_pkid) SELECT pkid FROM member WHERE chamber_id = 1 AND active = 1 ORDER BY RAND() LIMIT 1");
		}
		$res=$GLOBALS["mysqli"]->query("SELECT member.pkid, member.memberName FROM member LEFT JOIN member_of_day ON member.pkid = member_of_day.member_pkid WHERE chamber_id = ".$GLOBALS['chamberid']." AND date(daydate)=curdate()"); 
		$row = $res->fetch_assoc();
		$this->id=$row['pkid'];
		$this->name=$row['memberName'];
		$this->drawLink();

	}

	public function getAllPropsByID ($id){
		$res = $GLOBALS["mysqli"]->query("SELECT member.*,member_cat.member_cat_name as member_cat_name, member_lvl.name as member_level FROM member LEFT JOIN member_cat ON member_cat.pkid = member.memberCatID LEFT JOIN member_lvl ON member.memberLevel = member_lvl.pkid WHERE member.chamber_id = ".$GLOBALS['chamberid']." AND member.pkid=".$id);
		$row = $res -> fetch_assoc();
		foreach ($row as $key => $val){
			$$key = $val;
		}
		$this->id = $pkid;
		$this->catnm = $member_cat_name;
		$this->supersaver = $memberSSS;
		$this->URLName = $memberURLName;	
		$this->name = $memberName;
		$this->catid = $memberCatID;
		$this->catnm = $member_cat_name;
		$this->desc = $memberDesc;
		$this->address = $memberStreetAddress;
		$this->town = $memberTown;
		$this->state = $memberState;
		$this->zip = $memberZip;
		$this->contact_nm = $memberContactName;
		$this->contact_fax = $memberContactFax;
		$this->contact_nmbr = $memberContactNum;
		$this->contact_email = $memberContactEmail;
		$this->contact_website = '<a target="_blank" href ="http://'.$memberWebsite.'">'.$memberWebsite.'</a>';
		$this->level = $member_level;
	}
	
	public function addAsNew ($newMemberFormData){
		$keyholder=$valholder=array();
		foreach($newMemberFormData as $key => $val){
			if ($key!="address2" && $key!="address1"){
				$keyholder[]=$key;
				$valholder[]=$val;
			}
			$$key = $val;
		}
		$memberStreetAddress=$address1." ".$address2;
		$keyholder[]="memberStreetAddress";
		$valholder[]=$memberStreetAddress;
		$keyholder[]="chamber_id";
		$valholder[]=$this->chamber_id;
		$query = "INSERT INTO member (".join(",",$keyholder).") VALUES ('".join("','",$valholder)."')";
		$GLOBALS["mysqli"]->query($query);
	}
	

	public function properNameArray(){
		$values = array();
		$friendlyfields = array(
			"desc" => "Description",
			"level" => "Level",
			"name" => "Member Name", 
			"catnm" => "Category",  
			"contact_nm" => "Contact Name", 
			"address" => "Street Address", 
			"town" => "City", 
			"state" => "State", 
			"zip" => "Zip", 
			"contact_nmbr" => "Contact Number", 
			"contact_fax" => "Fax Number", 
			"memberContactEmail" => "Email", 
			"contact_website" => "Website"
			
		);
		foreach($friendlyfields as $key => $val){
			if ($this->$key!=""){
				$values[$val]=$this->$key;
			}
			
		}
		return $values;
	}
	
	public static function drawAllSuperSavers(){
		$query = "SELECT memberSSS, pkid, memberName FROM member WHERE chamber_id = ".$GLOBALS['chamberid']." AND active = 1 and memberSSS != ''";
		$res=$GLOBALS["mysqli"]->query($query);
		$count=0;
		echo "<div class='row'>";
		while($row=$res->fetch_assoc()){
			$count++;
			$cur=new member();
			$cur->id=$row['pkid'];
			$cur->name=$row['memberName'];
			$cur->supersaver=$row['memberSSS'];
			if ($count%2==1 || $count==1){echo "</div><div class='row'>";}
			$cur->drawSuperSaver();
		}
		echo "</div>";
	}

	public function drawSuperSaver($colsize=6){
		echo'<div class="col-md-'.$colsize.'">'
				.'<div class="media">'
					.'<a class="pull-left" href="'.$GLOBALS['local_url'].'/member_details.php?id='.$this->id.'">'
						.'<img class="media-object" src="'.$GLOBALS['local_url'].'/images/ssHead.jpg" alt="...">'
					.'</a>'
					.'<div class="media-body">'
						.'<h4 class="media-heading"><a href="'.$GLOBALS['local_url'].'/member_details.php?id='.$this->id.'">'.$this->name.'</a></h4>'
						.$this->supersaver
					.'</div>'
				.'</div>'
			.'</div>';
	}
	
}

class boardmember {
	
	public $name;
	public $company; 
	public $email;
	public $role_id;
	public $role;
	public $phone;
	public $bio;
	public $img_id;
	public $website;
	public $img_html;
	public function createFromForm(){
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];
		$upload_type = 1;
		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);
		if(!get_magic_quotes_gpc()){
		    $fileName = addslashes($fileName);
		}
		$query = "INSERT INTO upload (name, size, type, content, upload_type_id) "."VALUES ('$fileName', '$fileSize', '$fileType', '$content', $upload_type)";
		if ($fileSize<$_POST['MAX_FILE_SIZE']){
		        $GLOBALS["mysqli"]->query($query);
		        $this->img_id = $GLOBALS["mysqli"]->insert_id;
		}
		$keyholder=$valholder=array();
		foreach($_POST as $key => $val){
			if ($key != "enterMember" && $key != "MAX_FILE_SIZE"){
				$keyholder[]=addslashes($key);
				$valholder[]=addslashes($val);
				$this->$key=$val;
			}
		}
		$keyholder[]="img_id";
		$valholder[]=$this->img_id;
		$keyholder[]="chamber_id";
		$valholder[]=$this->$chamber_id=1;
		$query = "INSERT INTO board_member (".join(",",$keyholder).") VALUES ('".join("','",$valholder)."')";
		$GLOBALS["mysqli"]->query($query);
	}
	public static function fetchAllBoardMembers(){
		$query="SELECT board_member.*, upload.content as content, board_member_roles.name as role from board_member LEFT JOIN upload ON board_member.img_id = upload.id LEFT JOIN board_member_roles ON board_member.role_id=board_member_roles.pkid WHERE chamber_id=1";
		$res=$GLOBALS["mysqli"]->query($query);
		while($row=$res->fetch_assoc()){
			$cur=new boardmember();
			foreach ($row as $key=>$val){
				if ($key != "content")$cur->$key=$val;
			}
			if (isset($row["content"]) && !empty($row["content"])){
				$cur->img_html='<img class="thumbnail boardmember" alt="board-member img" src="data:image/jpeg;base64,'.base64_encode($row["content"]).'"/>';
			}
		$cur->drawInfo();			
		}
	}

	public function drawInfo(){
	 if (trim($this->company!="")){
	 	$comptext=" of ".$this->company;
	 }else {
	 	$comptext="";
	 }
	echo 	"<div class='row'>" 
				."<div class='col-md-12'>"
					."<h5>".$this->name.$comptext.", <em>".$this->role."</em></h5>"
				."</div>"
			."</div>"
			."<div class='row'>"
				."<div class='col-md-3'>"
						.$this->img_html
				."</div>"
				."<div class='col-md-9'>";
					$info="";
						if (isset($this->email)&&!empty($this->email)){
				    		$info.="<li><i class='fa fa-envelope-square'></i><a target='_blank' href='mailto:".$this->email."'>".$this->email."</a><li>";
						}
						if (isset($this->website)&&!empty($this->website)){
							$info.="<li><i class='fa fa-globe'></i>"."<a href='".$this->website."'>".$this->website."</a><li>";
						}
						if (isset($this->phone)&&!empty($this->phone)){
							$info.='<li><i class="fa fa-phone-square">&nbsp;<a href="tel:+1'.str_replace("-","",str_replace(")","",str_replace("(","",str_replace(" ", "", $this->phone)))).'">'.$this->phone.'</a></i><li>';
						}
					if (strlen($info)>5){
						echo "<ul class='list-unstyled contact'>"
						.$info
						."</ul>";
					}
					echo "<p>".$this->bio."<p>";
					if ($this->role_id == 1){
						echo "<div class='row'>"	
						."<div class='col-md-12'>"
							."<a href='about_chamber/message_from_president.php'>View President's Message</a>"
						. "</div></div>";
		}
				echo "</div>";
			echo "</div>";
		echo "<hr/>";

	}
	
}

class banner_ad{
	public $member_id;
	public $img_html;
	public static function drawXAds($x){
		$query="SELECT upload.content, member.pkid, member.memberName ".
				"FROM upload LEFT JOIN member_with_ad ON upload.id=member_with_ad.upload_id ".
					"LEFT JOIN member ON member_with_ad.member_id=member.pkid ".
				"WHERE member.active=1 AND member.chamber_id=1 ".
				"ORDER BY RAND() LIMIT ".$x;
		$res=$GLOBALS["mysqli"]->query($query);
		while($row=$res->fetch_assoc()){
			$cur=new banner_ad();
			$cur->member_id=$row['pkid'];
			$cur->memberName=$row['member'];
			$cur->img_html='<a href="'.$GLOBALS['local_url'].'/member_details.php/?id='.$cur->member_id.'"><img class="thumbnail banner-ad" alt="'.$cur->member_id.'" style="width:100%" src="data:image/jpeg;base64,'.base64_encode($row["content"]).'"/></a>';
			echo ''
	    			.'<div class="col-md-12 col-sm-6 col-xs-6">'
	            		.$cur->img_html
	    			.'</div>'
				.'';
		}

	}

}

?>