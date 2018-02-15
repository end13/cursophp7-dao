<?php

class Sql extends PDO {
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");
	}

	private function setParems($statment,$parametes = array()){
		foreach ($parametes as $key => $value) {
			$this->bindParam($key,$value);
		}
	}	

	private function setParam($statment,$key,$value){
		$statment->bindParam($key,$value);
	}

	public function query($rawQuery, $params = array()){
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParems($stmt,$params);
		$stmt->execute();
		return $stmt;

	} 
	public function select($rawQuery, $params = array()):array{
		$stmt = $this->query($rawQuery,$params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>