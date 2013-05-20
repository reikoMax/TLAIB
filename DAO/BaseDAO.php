<?php

	class BaseDAO{	
	
		private $db_con = "mysql:host=localhost;";
		private $db_name= "dbname=abala_TLAIB";
		private $user = "root";
		private $pass = "admin";
		protected $con =null;

		function openCon(){
			$this->con = new PDO($this->db_con.$this->db_name,$this->user,$this->pass);
			
		}
		function closeCon(){
			$this->con=null;
		}
	}

?>
