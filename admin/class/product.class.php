<?php 

require_once 'database.php';
class Product extends Database{
	public $id,$category_id,$title,$short_description,$feature_image,$status,$slider_key,$feature_key,$created_by,$created_date,$modified_by,$modified_date; 

	function create(){
		$sql = "insert into tbl_product (category_id,title,short_description,feature_image,price,status,slider_key,feature_key,created_by,created_date) 
		values('$this->category_id','$this->title','$this->short_description','$this->feature_image','$this->price','$this->status','$this->slider_key','$this->feature_key','$this->created_by','$this->created_date') ";
		
		$res = $this->insert($sql);
		
		if(is_integer($res)){
			return 'Product created with id '. $res;
		}else{
			echo 'Failed to insert Product';
		}
	}


	function lists(){
		$sql = "select p.* , c.name from tbl_product p join tbl_category c on p.category_id=c.id order by p.created_date desc ";
		$ldata = $this->select($sql);
		if(count($ldata)>0){
			return $ldata;
		}else{
			echo 'No data found';
		}
	}



	function delete(){
		$sql = "delete  from tbl_product where id='$this->id'";
		$ldata = $this->remove($sql);
		if($ldata){
			header ('location: list_product.php');
		}else{
			return 'Data not deleted';
		}
	}


	function getProductByCategoryID(){
		$sql = "select p.* , c.name from tbl_product p join tbl_category c on p.category_id=c.id where category_id='$this->category_id'";
		$cdata = $this->select($sql);
		if(count($cdata)>0){
			return $cdata;
		}else{
			echo 'No data found';
		}
	}

	function getProductByID(){
		$sql = "select p.* , c.name from tbl_product p join tbl_category c on p.category_id=c.id   where p.id='$this->id'";
		$cdata = $this->select($sql);
		if(count($cdata)>0){
			return $cdata;
		}else{
			echo 'No data found';
		}
	}

	function edit(){
		$sql = "update  tbl_product set category_id='$this->category_id',title='$this->title',short_description='$this->short_description',feature_image='$this->feature_image',price='$this->price',status='$this->status',slider_key='$this->slider_key',feature_key='$this->feature_key',modified_by='$this->modified_by',modified_date='$this->modified_date'  where id='$this->id'";
		print_r($sql);
		$udata = $this->update($sql);


		if($udata){
			header('location:list_product.php');
		}else{
			return 'Data not Updated';
		}
	}


		function getProductBySliderKey(){
		$sql = "select p.* , c.name from tbl_product p join tbl_category c on p.category_id=c.id   where slider_key=1";
		$sdata = $this->select($sql);
		if(count($sdata)>0){
			return $sdata;
		}else{
			echo 'No data found';
		}
	}


	
		function getProductByFeatureKey(){
		$sql = "select p.* , c.name from tbl_product p join tbl_category c on p.category_id=c.id   where feature_key=1";
		$fdata = $this->select($sql);
		if(count($fdata)>0){
			return $fdata;
		}else{
			echo 'No data found';
		}
	}

	function getProductByStatus(){
		 $sql = "select  p.* , c.name from tbl_product p join tbl_category c on p.category_id=c.id  where p.status=1";
		$cdata = $this->select($sql);
		if(count($cdata)>0){
			return $cdata;
		}else{
			echo 'No data found';
		}
	}



function getProductBySearchTitle(){
		$sql = "select * from tbl_product where status=1 and title like '%$this->search%' order by created_date";

		return $this->select($sql);
	}


}





 ?>