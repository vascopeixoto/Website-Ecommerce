<?php
namespace vasco\Model;

use \vasco\DB\Sql;
use \vasco\Model;

class Product extends Model{

	public static function listAll(){
		$sql= new Sql();
		return $sql->select("SELECT * FROM tb_products ORDER BY desproduct");
	}

	public function save(){

		$sql= new Sql();
		$results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :desurl)", array(
			":idproduct"=>$this->getidproduct(),
			":desproduct"=>$this->getdesproduct(),
            ":vlprice"=>$this->getvlprice(),
            ":desurl"=>$this->getdesurl()
		));

		$this->setData($results[0]);

	}

	public function get($idproduct){

		$sql= new Sql();
		$results = $sql->select("SELECT * FROM tb_products where idproduct=:idproduct", [
			":idproduct"=>$idproduct
		]);

		$this->setData($results[0]);
	}

	public function delete(){

		$sql= new Sql();
		$sql->query("DELETE  FROM tb_products where idproduct=:idproduct", [
			":idproduct"=>$this->getidproduct()
		]);


	}

	public function checkPhoto(){
		if(file_exists($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "ecommerce" . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "site". DIRECTORY_SEPARATOR . "img". DIRECTORY_SEPARATOR . "products". DIRECTORY_SEPARATOR .$this->getidproduct() . ".jpg")){
				$url= "/ecommerce/res/site/img/products/". $this->getidproduct() . ".jpg"; 
			}else{
				$url= "/ecommerce/res/site/img/products/product.jpg";
			}
		

	return $this->setdesphoto($url);
	}

	public function getValues()
	{
		$this->checkPhoto();
		$values = parent::getValues();
		
		return $values;
	}

	public function setPhoto($file)
	{
		$extension=explode('.',$file['name']);
		$extension=end($extension);
		switch($extension){
			case"jpg":
			case"jpeg":
				$image=imagecreatefromjpeg($file["tmp_name"]);
				break;
			
			case"gif":
				$image=imagecreatefromgif($file["tmp_name"]);
				break;
			
			case"png":
				$image=imagecreatefrompng($file["tmp_name"]);
				break;
		}

		$dist=$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "ecommerce" . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "site". DIRECTORY_SEPARATOR . "img". DIRECTORY_SEPARATOR . "products". DIRECTORY_SEPARATOR .$this->getidproduct() . ".jpg";
		imagejpeg($image,$dist);
		imagedestroy($image);

		$this->checkPhoto();
	}
}
	 
?>