<?php
require_once('database.php');
class User{
	
	private $pdo;
	//creating connection instance in constructor
	public function __construct(){
		$this->pdo=new Connection();
		$this->pdo=$this->pdo->getDb();
	}
	
	//function for inserting data into user table
	public function create($user_firstname,$user_lastname,$user_address,$user_city,$user_country){
		try{
		$sql="INSERT INTO user (user_firstname,user_lastname,user_address,user_city,user_country)
			 VALUES (:user_firstname,:user_lastname,:user_address,:user_city,:user_country)"; 
			 $stmt=$this->pdo->prepare($sql);
			 $stmt->bindParam(":user_firstname",$user_firstname,PDO::PARAM_STR);
			 $stmt->bindParam(":user_lastname",$user_lastname,PDO::PARAM_STR);
			 $stmt->bindParam(":user_address",$user_address,PDO::PARAM_STR);
			 $stmt->bindParam(":user_city",$user_city,PDO::PARAM_STR);
			 $stmt->bindParam(":user_country",$user_country,PDO::PARAM_STR);
			 $stmt->execute();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	//function for retrieving user data from user table
	public function retrieve(){
		
		try{
			$sql="SELECT * FROM user ORDER BY id_user DESC LIMIT 1";
			$stmt=$this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	 
	}
}