<?php 
require_once 'database.php';
class User extends Database {
	public $id,$name,$username,$password,$email,$status,$last_login,$role;


function login(){
	$sql = "select * from tbl_user where email='$this->email' and password='$this->password'";
	$ldata = $this->select($sql);
	if(count($ldata)==1){
		session_start();
		$_SESSION['admin_name']= $ldata[0]->name;
		$_SESSION['admin_username']= $ldata[0]->username;
		$_SESSION['admin_email']= $ldata[0]->email;
		$_SESSION['role']= $ldata[0]->role;
		header ('location:dashboard.php');
	}
	else{
		return 'Login Failed';
	}
}

function clogin(){
	$sql = "select * from tbl_user where email='$this->email' and password='$this->password'";
	$ldata = $this->select($sql);
	if(count($ldata)==1){
		@session_start();
		$_SESSION['name']= $ldata[0]->name;
		$_SESSION['email']= $ldata[0]->email;
		
		header ('location:index.php');
	}
	else{
		return 'Login Failed';
	}
}

function create(){
		$sql = "insert into tbl_user (name,password,email) 
		values('$this->name','$this->password','$this->email') ";
		
		$res = $this->insert($sql);
		
		if(is_integer($res)){
			return 'Your account is created. ';
		}else{
			echo 'Failed to create account';
		}
	}




}



 ?>