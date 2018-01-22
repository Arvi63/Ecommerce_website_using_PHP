<?php 

require_once 'database.php';
class Category extends Database{
	public $id,$name,$rank,$status,$created_by,$created_date,$modified_by,$modified_date;

	function create(){
		$sql = "insert into tbl_category (name,rank,status,created_by,created_date) 
		values('$this->name','$this->rank','$this->status','$this->created_by','$this->created_date') ";

		$res = $this->insert($sql);
		if(is_integer($res)){
			return 'Category created with id '. $res;
		}else{
			echo 'Failed to insert Cateory';
		}
	}


	function lists(){
		$sql = "select * from tbl_category ";
		$ldata = $this->select($sql);
		if(count($ldata)>0){
			return $ldata;
		}else{
			echo 'No data found';
		}
	}



	function delete(){
		$sql = "delete  from tbl_category where id='$this->id'";
		$ldata = $this->remove($sql);
		if($ldata){
			header ('location: list_category.php');
		}else{
			return 'Data not deleted';
		}
	}


	function getCategoryByID(){
		$sql = "select * from tbl_category where id=$this->id";
		$cdata = $this->select($sql);
		if(count($cdata)>0){
			return $cdata;
		}else{
			echo 'No data found';
		}
	}

	function edit(){
		$sql = "update  tbl_category set name='$this->name',rank='$this->rank',status='$this->status',modified_by='$this->modified_by',modified_date='$this->modified_date'  where id='$this->id'";
		$udata = $this->update($sql);
		if($udata){
			header('location:list_category.php');
		}else{
			return 'Data not Updated';
		}
	}

	function getCategoryByStatus(){
		$sql = "select * from tbl_category where status=1";
		$cdata = $this->select($sql);
		if(count($cdata)>0){
			return $cdata;
		}else{
			echo 'No data found';
		}
	}


}





 ?>