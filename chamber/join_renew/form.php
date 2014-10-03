
<?php include "../includes/-header.php";?>
<?php
if (isset($_POST['memberName'])){
	$member=new member();
	$member->addAsNew($_POST,$mysqli);
	echo "<h1>".$_POST['memberName']." has been added</h1>";
	include "../includes/-footer.php";
	exit();
}
?>
				<h2>Join Form</h2>
                <div class="col-lg-4">
					<form role="form" method="POST">
					  <div class="form-group">
					    <label for="memberName">Company Name</label>
					    <input type="text" class="form-control" id="memberName" name="memberName" placeholder="Enter company name">
					  </div>
					  <div class="form-group">
					    <label for="memberContactName">Contact Name</label>
					    <input type="text" class="form-control" id="memberContactName" name="memberContactName" placeholder="Enter contact name">
					  </div>
					  <div class="form-group">
					    <label for="memberDesc">Description</label>
					    <input type="text" class="form-control" id="memberDesc" name="memberDesc" placeholder="Enter your description">
					  </div>
					  <div class="form-group">
					    <label for="address1">Address</label>
					    <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter address">
					  </div>
					  <div class="address2">
					    <label for="contactName">Address</label>
					    <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter address">
					  </div>
					  <div class='row'>
						  <div class="form-group col-lg-5">
						    <label for="memberTown">City</label>
						    <input type="text" class="form-control" id="memberTown" name="memberTown" placeholder="Enter address">
						  </div>
						  <div class="form-group col-lg-3">
					        <label>State: <span>*</span></label><br/>
					        <select name="memberState" class="form-control">
					            <option value="AL">AL</option>
					            <option value="AK">AK</option>
					            <option value="AZ">AZ</option>
					            <option value="AR">AR</option>
					            <option value="CA">CA</option>
					            <option value="CO">CO</option>
					            <option value="CT">CT</option>
					            <option value="DE">DE</option>
					            <option value="DC">DC</option>
					            <option value="FL">FL</option>
					            <option value="GA">GA</option>
					            <option value="HI">HI</option>
					            <option value="ID">ID</option>
					            <option value="IL">IL</option>
					            <option value="IN">IN</option>
					            <option value="IA">IA</option>
					            <option value="KS">KS</option>
					            <option value="KY">KY</option>
					            <option value="LA">LA</option>
					            <option value="ME">ME</option>
					            <option value="MD">MD</option>
					            <option value="MA">MA</option>
					            <option value="MI">MI</option>
					            <option value="MN">MN</option>
					            <option value="MS">MS</option>
					            <option value="MO">MO</option>
					            <option value="MT">MT</option>
					            <option value="NE">NE</option>
					            <option value="NV">NV</option>
					            <option value="NH">NH</option>
					            <option value="NJ">NJ</option>
					            <option value="NM">NM</option>
					            <option value="NY">NY</option>
					            <option value="NC">NC</option>
					            <option value="ND">ND</option>
					            <option value="OH">OH</option>
					            <option value="OK">OK</option>
					            <option value="OR">OR</option>
					            <option value="PA">PA</option>
					            <option value="RI">RI</option>
					            <option value="SC">SC</option>
					            <option value="SD">SD</option>
					            <option value="TN">TN</option>
					            <option value="TX">TX</option>
					            <option value="UT">UT</option>
					            <option value="VT">VT</option>
					            <option value="VA">VA</option>
					            <option value="WA">WA</option>
					            <option value="WV">WV</option>
					            <option value="WI">WI</option>
					            <option value="WY">WY</option>
					        </select>
					      </div>
						  <div class="form-group col-lg-4">
						    <label for="memberZip">Zip</label>
						    <input type="text" class="form-control" id="memberZip" name="memberZip" placeholder="Enter zip code">
						  </div>
					  </div>
					  <div class="form-group">
					    <label for="memberContactEmail">Email address</label>
					    <input type="email" class="form-control" id="memberContactEmail" name="memberContactEmail" placeholder="Enter email">
					  </div> 
					  <div class="form-group">
					    <label for="memberContactNum">Phone Number</label>
					    <input type="number" class="form-control" id="memberContactNum" name="memberContactNum" placeholder="Enter phone number">
					  </div>
					  <div class="form-group">
					    <label for="memberWebsite">Website</label>
					    <input type="text" class="form-control" id="memberWebsite" name="memberWebsite" placeholder="Enter your website URL">
					  </div>
					  <div class="form-group">
				        <label>Business Type: <span>*</span></label><br/>
				        <select name="memberCatID" id="memberCatID" class="form-control">
				            <?
				            $res=$mysqli->query("SELECT * FROM member_cat");
				            while($row = $res->fetch_assoc()){
				            	$curval=new memberCategory($row['member_cat_name'],$row['pkid'],$mysqli);
				            	$curval->drawSelector();
				            } 
				            ?>
				        </select>
				      </div>
					  <div class="form-group">
					    <label for="eeNum">Number of Employees</label>
					    <input type="text" class="form-control" id="eeNum" name="eeNum" placeholder="Enter number of employees">
					  </div>
					  <div class="form-group">
					    <label for="yearsInArea">Years in Area</label>
					    <input type="text" class="form-control" id="yearsInArea" name="yearsInArea" placeholder="Enter number of years active">
					  </div>
					  <div class="form-group">
					    <label for="memberLevel">Membership Level</label>
					    <select class="form-control" id="memberLevel" name="memberLevel" >
					    	<?php drawOptionsFromTable("member_lvl", $mysqli, true);?>
					    </select>
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
                </div>
                <div class="col-lg-5">
                	<?php include "../includes/-membership_types.php";?>
                </div>
<?php include "../includes/-footer.php";?>

