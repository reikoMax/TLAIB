<?php
	session_start();
	 

	if(!isset($_SESSION['username'])){
	 header('Location: index.php');
	 
	}else{
		$username = $_SESSION['username'];
	} 
?>
<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8"/>
	<link rel="shortcut icon" href="./img/leyte_seal.jpeg">
 	<title>TaClObAn CitY aNd lEyTe aT Its bEst</title>
	<script src="./js/jquery.js"></script>
	<script src="./js/jquery-ui.js"></script>
	<script src="./js/index.js"></script>
	<script src="./js/user_interface.js"></script>
	<script src = "./js/jquery-ui-1.9.0.custom.min.js"></script>
	<link rel="stylesheet" href="./css/jquery-ui1.css" style="text/css"/>
	<link rel="stylesheet" href="./css/bootstrap.min.css"  style="text/css" />
	<link rel="stylesheet" href="./css/bootstrap-responsive.css"  style="text/css" />
	<link rel="stylesheet" href="./css/user_interface.css"  style="text/css" />
</head>
<body onload=”javascript:setTimeout(“location.reload(true);”,5000);”>
	<?php
 	include 'class/header_user_interface.php';
	?>

	<h1>Welcome  <span id ="username"><?php if(isset($username)){ echo $username; }?></span>.<h1>
<div id="wrapper">
		<div class="tabs" id="tabs">
   			<ul>
      			<li class="home"><a href="#home">Home</a></li>
      			<li class="data"><a href="#data">Add</a></li>
      			<li class="list"><a href="#list">List</a></li>
      			<li class="profiles"><a href="#settings_profile">Profiles</a></li>
     
   			</ul>
   	</div><!--tabs-->
   	<div class="BodyContent">
   		<fieldset class="BodyContent_field" id="BodyContent_field">
   			<h2>TaClObAn CitY aNd lEyTe aT Its bEst</h2>
   	<div id="tabContents">
   		<div id="home" class="tabContent">
   			<p>
   			 Others users added suggetion of places and their status and rating.<br /> 
   			 <div class="input-append">
   			<select>
 				 <option value="most popular">Most Popular</option>
				 <option value="hotels">Hotels</option>
  				 <option value="beaches">Beaches</option>
  				 <option value="restourant">Restourant</option>
  				 <option value="adventure">Adventure</option>
  				 <option value="events">Events</option>
  				 <option value="others">Others</option>
			</select>
			<button id="ok_btn" class="btn btn-info">Select</button>
		</div><!--input-append-->
			<p>
				<input type='text' id='search_name' name='search_name' placeholder="Search" class="input-medium search-query" /><img src="img/search.png" id="search_image" />
			</p>
						
			<center>
			
			<table id="places_tbl" class="table">
				<thead>
					<th scope="col">Name</th>
					<th scope="col">Location</th>
					<th scope="col">Description</th>
					<th scope="col">Classification</th>
			        <th scope="col"></th>

				</thead>
				<tbody id="view"></tbody>
			</table><br />
	
		</center>

   		    
   			</p>
   			</div><!--home-->
    <div id="data" class="tabContent">
    	<fieldset name="add" title="ADD PLACES">
    		<legend>Add Places</legend>
    	<form id="add_places" name="data">			
						<label for='place_name'>Place Name:</label>
						<input type='text' id='place_name' name='place_name'  placeholder="Name"/>
					
				
						<label for='location'>Location:</label>
						<input type='text' id='place_location' name='place_location' placeholder="Location" />
					
								
						<label for='place_description'>Place Description:</label>
						<input type='text' id='place_description' name='place_description'  placeholder="Description"/>
					
								
						<label for='place_classification'>Place Classification:</label>
						<input type='text' id='place_classification' name='place_classification' placeholder="Classification" />
					
					<input type="hidden" name="places_id"/>
					<br />
					
						<button type='submit' value='submit' id="btn_submit" class="btn btn-info">Submit</button>
    	 </form>
    	</fieldset>
    
    </div><!--data-->
   
    <div id="list" class="tabContent">
				  	<center>
				      <table id="listTbl" class="table">
					    <th scope="col">Name Of Place</th>
						<th scope="col">Location</th>
						<th scope="col">Description</th>
						<th scope="col">Classifacation</th>
						<th scope="col">Rating</th>
						<th scope="col">Public</th>
						<th scope="col"></th>
						<th scope="col"></th>
					<tbody class='listViewer'></tbody>					
				</table>
			</center>
	</div><!--list-->
	<div id="settings_profile" class="tabContent">
		<button id="notification_btn" class="btn btn-danger">Message Notifications</button>
		<form id="myProfile"  clas="view" border="1">
		</form><!--myprofile-->
	</div><!--settings_profile-->
      
  </fieldset><!--BodyContent_field-->
    </div><!--tabContent-->
   </div><!--BodyContent-->
</div><!--wrapper-->
<div id="edit_form">
	<fieldset name="add" title="ADD PLACES">
    		<legend>Add Places</legend>
    	<form id="add_places" name="data">			
						<label for='place_name'>Place Name:</label>
						<input type='text' id='place_name' name='edit_place_name'  placeholder="Name"/>
					
				
						<label for='location'>Location:</label>
						<input type='text' id='place_location' name='edit_place_location' placeholder="Location" />
					
								
						<label for='place_description'>Place Description:</label>
						<input type='text' id='place_description' name='edit_place_description'  placeholder="Description"/>
					
								
						<label for='place_classification'>Place Classification:</label>
						<input type='text' id='place_classification' name='edit_place_classification' placeholder="Classification" />
					
					<input type="hidden" name="places_id"/>
					<br />
					
						<button type='submit' value='submit' id="btn_submit" class="btn btn-info">Submit</button>
    	 </form>
    	</fieldset>
	</div>
	<?php
   		include 'class/footer.php';
  	 ?>
</body>
</html>
