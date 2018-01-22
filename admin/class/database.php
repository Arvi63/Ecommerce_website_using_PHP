<?php 

abstract class Database{

	function set($var,$value){
		$conn = $this->connect();
		$this->$var = $conn->real_escape_string($value);
	}

	function connect(){
		$conn = new mysqli('localhost','root','','db_eco');
		if($conn->connect_errno==0){
			return $conn;

		}else{
			die ('Database Connection Failed');
		}
	}

	function select($sql){
		$connect = $this->connect(); 
		$res = $connect->query($sql);
		$data = [];
		if($res->num_rows>0){
			while($obj = $res->fetch_object()){
				array_push($data, $obj);
			}
		}
		return $data;
	}

	function insert($sql){
		$connect = $this->connect(); 
		$connect->query($sql);
		
		if($connect->affected_rows==1 && $connect->insert_id>0){
			return $connect->insert_id;
		}else{
			return false;
		}
		
	}



	function remove($sql){
		$connect = $this->connect(); 
		$connect->query($sql);
		if($connect->affected_rows==1){
			return true;
		}else{
			return false;
		} 
	}

	function update($sql){
		$connect = $this->connect(); 
		 $connect->query($sql);
		if($connect->affected_rows>0){
			return true;
		}else{
			return false;
		}
		
	}






}

 ?>