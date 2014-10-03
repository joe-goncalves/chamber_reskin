<?php
class memberCategory {
	public $name;
	public $id;
	public $mysqli;
	public $count;
	function __construct ($name, $id, $mysqli, $formArray) {
		$this->name=$name;
		$this->id=$id;
		$this->mysqli=$mysqli;
		$res = $mysqli->query("SELECT COUNT(pkid) AS count FROM member WHERE memberCatID=".$id);
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

	function __construct  ($id, $mysqli){
		$this->pkid=$id;
		$res=$mysqli->query("SELECT * FROM event WHERE pkid = ".$id);
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
	public static function postNextMeeting($mysqli){
		$query = "SELECT pkid FROM event WHERE eventType=2 AND curdate() < eventDateExp ORDER BY pkid DESC LIMIT 1";
		$res = $mysqli->query($query);
		if ($res->num_rows == 1){
			$row = $res->fetch_assoc();	
			$mtg=new event ($row['pkid'],$mysqli);
			$mtg->drawEventLink();
		}else {
			echo "No upcoming chamber meetings.";	
		}
		
		
	}
	public function drawEventLink(){
		echo "<a class = 'list-group-item' href='event_details.php/?id=".$this->pkid."'>".$this->name.":  ".$this->date. " at " . $this->time."</a>";
	}
	public function properNameArray(){
		$values = [];
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
	public $mysqli; 
	public $name;
	public $catid;
	public $catnm;
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
	
	public function getLinkData($id,$mysqli){
		$query = "SELECT pkid, memberName FROM member WHERE pkid = ".$id." LIMIT 1";
		$res = $mysqli->query($query);
		$row = $res->fetch_assoc();
		$this->id=$row['pkid'];
		$this->name=$row['memberName'];
	}

	public function drawLink(){
		echo "<a class = 'list-group-item' href='member_details.php/?id=".$this->id."'>".$this->name."</a>";
	}

	public static function getLastXmembers($howmany, $mysqli){
		$res = $mysqli->query("SELECT pkid FROM member WHERE active = 1 ORDER BY pkid DESC LIMIT ".$howmany);
		while ($row = $res->fetch_assoc()){
			$cur = new member();
			$cur->getLinkData($row['pkid'],$mysqli);
			$cur->drawLink();
		}
	}

	public function drawMemberOfTheDay($mysqli){		
		$res = $mysqli->query("SELECT COUNT(pkid) as count FROM member_of_day WHERE date(daydate)=curdate()");
		$row = $res->fetch_assoc();
		if ($row['count'] < 1){
			$mysqli->query("TRUNCATE member_of_day");
			$mysqli->query("insert INTO member_of_day (member_pkid) SELECT pkid FROM member WHERE active = 1 ORDER BY RAND() LIMIT 1");
		}
		$res=$mysqli->query("SELECT member.pkid, member.memberName FROM member LEFT JOIN member_of_day ON member.pkid = member_of_day.member_pkid WHERE date(daydate)=curdate()"); 
		$row = $res->fetch_assoc();
		$this->id=$row['pkid'];
		$this->name=$row['memberName'];
		$this->drawLink();

	}

	public function getAllPropsByID ($id, $mysqli){
		$res = $mysqli->query("SELECT member.*,member_cat.member_cat_name as member_cat_name, member_lvl.name as member_level FROM member LEFT JOIN member_cat ON member_cat.pkid = member.memberCatID LEFT JOIN member_lvl ON member.memberLevel = member_lvl.pkid WHERE member.pkid=".$id);
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
		$this->desc = $memberDesc;
		$this->address = $memberStreetAddress;
		$this->town = $memberTown;
		$this->state = $memberState;
		$this->zip = $memberZip;
		$this->contact_nm = $memberContactName;
		$this->contact_fax = $memberContactFax;
		$this->contact_nmbr = $memberContactNum;
		$this->contact_email = $memberContactEmail;
		$this->contact_website = $memberWebsite;
		$this->level= $member_level;
	}

	public function addAsNew ($newMemberFormData, $mysqli){
		$keyholder=$valholder=[];
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
		$query = "INSERT INTO member (".join(",",$keyholder).") VALUES ('".join("','",$valholder)."')";
		$mysqli->query($query);
	}
	

	public function properNameArray(){
		$values = [];
		$friendlyfields = array(
			"name" => "Member Name", 
			"catnm" => "Category", 
			"desc" => "Description", 
			"address" => "Street Address", 
			"town" => "City", 
			"state" => "State", 
			"zip" => "Zip", 
			"contact_nm" => "Contact Name", 
			"contact_nmbr" => "Contact Number", 
			"contact_fax" => "Fax Number", 
			"memberContactEmail" => "Email", 
			"contact_website" => "Website",
			"level" => "Level"
		);
		foreach($friendlyfields as $key => $val){
			if ($this->$key!=""){
				$values[$val]=$this->$key;
			}
			
		}
		return $values;
	}
}

?>