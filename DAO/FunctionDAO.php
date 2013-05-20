<?php
 include 'DAO/BaseDAO.php';
  class FunctionDAO extends BaseDAO{
	function LogInUser($username,$password){
		
			$this->openCon();
			
				$stmt= $this->con->prepare("SELECT user_username,user_password FROM users where user_username=? and user_password=?;");
				$stmt->bindParam(1,$username);
				$stmt->bindParam(2,$password);
				
				$stmt->execute();
		
				 
					if($row=$stmt->fetch() ){
						return true;
					}else{
						return false;
					}
				 
				
			$this->closeCon();
		}
	
		/*----------------------------------------------USERSINTERFACE-----------------------------------------*/
			function view_data(){
		   $this->openCon();

		   	$stmt=$this->con->prepare("SELECT * FROM places_TLAIB ORDER BY places_id DESC");
		   	$stmt->execute();
		   	while($row = $stmt->fetch() ){
					echo "<tr id=".$row[0].">";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td><i class=' icon-thumbs-up' title ='Like' onclick = 'like(".$row[0].")'></i></td>";

					echo "</tr>";
					
				}
			
			$this -> closeCon();
		}
		
		function add_user($firstname,$lastname,$address,$contact_info,$email,$username,$password) {
				$this->openCon();
				
				$stmt = $this->con->prepare("INSERT INTO users (user_name,user_lastname,user_address,user_contact_info,user_email_address,user_username,user_password) VALUES (?,?,?,?,?,?,?)");
				$stmt->bindParam(1, $firstname);
				$stmt->bindParam(2, $lastname);
				$stmt->bindParam(3, $address);
				$stmt->bindParam(4, $contact_info);
				$stmt->bindParam(5, $email);
				$stmt->bindParam(6, $username);
				$stmt->bindParam(7, $password);
				$stmt->execute();
				
				$this->closeCon();
		}
		function add_places($places_id, $place_name,$place_location,$place_description,$place_classification,$username){
			$this->openCon();
			
			$stmt = $this->con->prepare("INSERT INTO places_TLAIB (places_name,places_location,places_description,places_classification) values(?,?,?,?)");
			$stmt->bindParam(1, $place_name);
			$stmt->bindParam(2, $place_location);
			$stmt->bindParam(3, $place_description);
			$stmt->bindParam(4, $place_classification);
			$stmt->execute();
			$places_id=$this->con->lastInsertId();

			$stmt1=$this->con->prepare("SELECT user_id FROM users WHERE user_username=?");
        	$stmt1->bindParam(1, $username);
        	$stmt1->execute();
        	$users_id=$stmt1->fetch();

        	$stmt2=$this->con->prepare("INSERT INTO fave_places(users_id,places_id)values(?,?)");
        	$stmt2->bindParam(1, $users_id[0]);
        	$stmt2->bindParam(2, $places_id);
        	$stmt2->execute();

			$this->closeCon();
		}
		function view($username){
			$this->openCon();
			$stmt= $this->con->prepare("SELECT DISTINCT * FROM places_TLAIB as pt,users as u,fave_places as fp WHERE fp.users_id=u.user_id AND fp.places_id=pt.places_id AND u.user_username=?");
			$stmt->bindParam(1,$username);

			$stmt->execute();

			
			while($row = $stmt->fetch()){
			   echo "<tr id=".$row[0].">";
				echo "<td>".$row[1]."</td>";
				echo "<td>".$row[2]."</td>";
				echo "<td>".$row[3]."</td>";
				echo "<td>".$row[4]."</td>";
				echo "<td><i class='icon-remove'  onclick='user_delete(".$row[0].")'></i></td>";
				echo "<td><i class='icon-pencil' title ='Edit Data' onclick='user_edit(".$row[0].")'></i></td>";
				echo "</tr>";
			}
			$this->closecon();

		}

	
	function userdelete($id){
		$this->openCon();

		$stmt=$this->con->prepare("DELETE from places_TLAIB where places_id=?");
		$stmt->bindParam(1, $id);
	    $stmt->execute();
	    $places_id=$stmt->fetch();
	    $this->closeCon();

		
	}
	function usersprofile($username){
		$this->openCon();
		$stmt=$this->con->prepare("SELECT * FROM users WHERE user_username=? ");
		$stmt->bindParam(1, $username);
		$stmt->execute();
			while($row = $stmt->fetch()){
				echo "<div id=".$row[0].">";
				echo "Name :".$row[1].", ".$row[2]." <br/><br/>";
				echo "Address : ".$row[3]."<br /><br/>";
				echo "Contact Info : ".$row[4]."<br /><br/>";
				echo "Email Address: ".$row[5]."<br /><br/>";
				echo "Username : ".$row[6]."<br /><br/>";
				echo "Password :".$row[7]."<br /><br/>";
				echo "</div>";
			}
		$this->closeCon();

		}
		function search_data($name){
			$this->openCon();
			$stmt=$this->con->prepare("SELECT * from places_TLAIB WHERE places_id=%?% OR places_classification=%?%");
			$stmt->bindParam(1, $name);
			$stmt->execute();
			while ($row=$stmt->fetch()){
				echo "<tr id=".$row[0].">";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td><i class=' icon-thumbs-up' title ='Like' onclick = 'like(".$row[0].")'></i></td>";
					echo "</tr>";
			}

			$this->closeCon();
		}
		function likes_count($id,$username){
			$this->openCon();
			$stmt=$this->con->prepare("SELECT user_id from users WHERE user_username=?");
			$stmt->bindParam(1, $username);
			$stmt->execute();
			$user_id=$stmt->fetch();

			$stmt1=$this->con->prepare("INSERT INTO like_places(users_id,places_like)values(?,?)");
			$stmt1->bindParam(1, $user_id[0]);
			$stmt1->bindParam(2, $id);
			$stmt1->execute();

			$this->closeCon();

		}
		function total_likes(){
			$this->openCon();
			$stmt=$this->con->prepare("");
	
		}
/*----------------------Admin---------------------------------*/
	function count_user(){
		$this-openCon();

		$stmt=$this->con->prepare("SELECT COUNT(user_id) from users");
		$stmt->execute();

		while($row=$stmt->fetch()){
			echo"Users Total Number:".$row[0]."<br />";
		}

		$this->closeCon();
	}	
	function user_tracker(){
		$this->openCon();

		$stmt=$this->con->prepare("SELECT user_id,user_name,user_lastname,user_address,user_contact_info,user_email_address,date FROM users ORDER BY date DESC");

		$stmt->execute();

		while($row=$stmt->fetch()){
			echo "<tr id=".$row[0].">";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";
			echo "</tr>";

		}
		$this->closeCon();

	}	

	function manage_data(){
		$this->openCon();
		$stmt=$this->con->prepare("SELECT pt.places_id,places_name,places_location,places_description,places_classification,rating,public,user_username FROM  users AS u, places_TLAIB AS pt,fave_places AS fp WHERE fp.users_id=u.user_id AND fp.places_id=pt.places_id");

		$stmt->execute();


		while($row=$stmt->fetch()){
			echo "<tr id=".$row[0].">";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";
			echo "<td>".$row[7]."</td>";
			echo "</tr>";

		}
		$this->closeCon();

	}
	function email_confirmation($user_id){
		$this->openCon();

		$stmt=$this->con->prepare("SELECT user_email_address ,user_name,user_lastname from users where user_id=?");

		$stmt->execute();

		$this->closeCon();
	}
	


			}
?>
