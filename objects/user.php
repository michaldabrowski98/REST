<?php
	class User{
		private $conn;
		public $table = "usersx";
		
		public $id;
		public $name;
		public $birthdate;
		public function __construct($db){
			$this->conn = $db;
		}
		
		public function read(){
			$query = "SELECT name FROM ".$this->table." WHERE id = ?";
			
			$statement = $this->conn->prepare($query);
			
			$statement->bindParam(1,$this->id);
			
			$statement->execute();
			
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if(!isset($row['name'])){
				$row['name'] = null;
			}
			$this->name = $row['name'];
			
			
		}
		
		public function create(){
			
			
			$this->name=htmlentities(strip_tags($this->name));
			//zamiana daty w formacie d-m-y na int
			$this->birthdate = htmlentities(strtotime($this->birthdate));
			
			$query = "INSERT INTO ".$this->table."(name,birthdate) VALUES( '".$this->name."','".$this->birthdate."')";
    		
    		$statement = $this->conn->prepare($query);
    					
    		if($statement->execute()){
    			return true;
    		}else{
    			return false;
    		}
		}
	}
?>