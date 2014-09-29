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
	public $contact_nm;
	public $contact_nmbr;
	public $contact_email;
	public $contact_website;
	public $supersaver;
	public $insertquery="";
	
	function __construct  ($id=false, $mysqli, $newMemberFormData=false){
		if ($newMemberFormData){
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
			$id = $mysqli->insert_id;
		}


		$res = $mysqli->query("SELECT member.*,member_cat.member_cat_name as member_cat_name FROM member LEFT JOIN member_cat ON member_cat.pkid = member.memberCatID WHERE member.pkid=".$id);
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
			"contact_website" => "Website"
		);
		foreach($friendlyfields as $key => $val){
			if ($this->$key!=""){
				$values[$val]=$this->$key;
			}
			
		}
		return $values;
	}
}

class event{
	public $mysqli;
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
			$this->active = $active;
			$this->price = $eventPrice;
			$this->time = $eventTime;
			$this->type = $eventType;
			$this->name = $eventName;
			$this->day = $eventDay;
			$this->desc = $eventDesc;
			$this->date = $eventDate;
			$this->loc = $eventLoc;

		}
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
?>