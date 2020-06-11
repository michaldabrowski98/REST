<?php
	class DB{
		private $HOST = 'localhost';
		private $USER = 'root';
		private $PASSWORD = '';
		private $DATABASE = 'rest_db';
		
		public $connect;
		
		public function createConnection(){
			$this->connect = null;
			
			try{
				$this->connect = new PDO("mysql:host=".$this->HOST.";dbname=".$this->DATABASE,$this->USER,$this->PASSWORD);
			}
			catch(PDOException $e){
				echo 'Błąd: nie można nawiązać połączenia:'.$e->getMessage();
			}
			return $this->connect;
		}
	}
?>