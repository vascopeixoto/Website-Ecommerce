<?php
namespace vasco\Model;

use \vasco\DB\Sql;
use \vasco\Model;
use \vasco\Model\User;

class Cart extends Model{

    const SESSION= "Cart";
    const SESSSION_ERROR= "CartError";

    public static function getFromSession(){
        $cart = new Cart();

		if (isset($_SESSION[Cart::SESSION]) && (int)$_SESSION[Cart::SESSION]['idcart'] > 0) {

			$cart->get((int)$_SESSION[Cart::SESSION]['idcart']);

		} else {

			$cart->getFromSessionID();

			if (!(int)$cart->getidcart() > 0) {

				$data = [
					'dessessionid'=>session_id()
				];

				if (User::checkLogin(false)) {

					$user = User::getFromSession();
					
					$data['iduser'] = $user->getiduser();	

				}else{
                    $user = User::getFromSession();
					
					$data['iduser'] = $user->getiduser();	
                }

				$cart->setData($data);

				$cart->save();

				$cart->setToSession();


			}

		}

		return $cart;

	}



	public function get(int $idcart){

		$sql= new Sql();
		$results = $sql->select("SELECT * FROM tb_carts where idcart=:idcart", [
			":idcart"=>$idcart
		]);

        if(count($results)>0){
		    $this->setData($results[0]);
        }
	}

    public function setToSession(){
        $_SESSION[Cart::SESSION]=$this->getValues();
    }

    public function getFromSessionID(){

		$sql= new Sql();
		$results = $sql->select("SELECT * FROM tb_carts where dessessionid=:dessessionid", [
			":dessessionid"=>session_id()
		]);

        if(count($results)>0){
		    $this->setData($results[0]);
        }
	}

	public function save(){

		$sql= new Sql();
		$results = $sql->select("CALL sp_carts_save(:idcart, :dessessionid, :iduser)", array(
			":idcart"=>$this->getidcart(),
			":dessessionid"=>$this->getdessessionid(),
            ":iduser"=>$this->getiduser()
		));

		$this->setData($results[0]);

	}

    public function addProduct(Product $product){
        $sql= new Sql();
		$sql->query("INSERT INTO tb_cartsproducts (idcart, idproduct) VALUES (:idcart, :idproduct)", array(
			":idcart"=>$this->getidcart(),
            ":idproduct"=>$product->getidproduct()
		));

        $this->getCalculateTotal();
    }

    public function removeProduct(Product $product, $all = false){
        $sql= new Sql();
        if($all){
            $sql->query("UPDATE tb_cartsproducts SET dtremoved = NOW() WHERE idcart=:idcart AND idproduct = :idproduct AND dtremoved IS NULL", array(
                ":idcart"=>$this->getidcart(),
                ":idproduct"=>$product->getidproduct()
            ));
        }else{
            $sql->query("UPDATE tb_cartsproducts SET dtremoved = NOW() WHERE idcart=:idcart AND idproduct = :idproduct AND dtremoved IS NULL LIMIT 1", array(
                ":idcart"=>$this->getidcart(),
                ":idproduct"=>$product->getidproduct()
            ));
        }

        $this->getCalculateTotal();
		
    }

    public function getProducts(){

		$sql= new Sql();
		return Product::checkList($sql->select("SELECT b.idproduct, b.desproduct, b.vlprice, b.desurl, COUNT(*) AS nrqtd, SUM(b.vlprice) AS vltotal  FROM tb_cartsproducts a 
            INNER JOIN tb_products b ON a.idproduct= b.idproduct 
            WHERE a.idcart=:idcart AND a.dtremoved IS NULL 
            GROUP BY b.idproduct, b.desproduct, b.vlprice, b.desurl 
            ORDER BY b.desproduct", array(
			":idcart"=>$this->getidcart()
		)));


	}

    public function getProductsTotals(){

		$sql= new Sql();
		$results= $sql->select("SELECT SUM(vlprice) AS vlprice, COUNT(*) AS nrqtd  FROM tb_products a 
            INNER JOIN tb_cartsproducts b ON a.idproduct= b.idproduct 
            WHERE b.idcart=:idcart AND dtremoved IS NULL;", array(
			":idcart"=>$this->getidcart()
		));

        if(count($results)>0){
            return $results[0];
        }else{
            return [];
        }
	}

    public static function setMsgError($msg){
        $_SESSION[Cart::SESSSION_ERROR]=$msg;
    }

    public static function getMsgError(){
        $msg=(isset($_SESSION[Cart::SESSSION_ERROR])) ? $_SESSION[Cart::SESSSION_ERROR] : "";
        Cart::clearMsgError();
        return $msg;
    }

    public static function clearMsgError(){
        $_SESSION[Cart::SESSSION_ERROR]= NULL;
    }

    public function getValues()
    {
        $this->getCalculateTotal();

        return parent::getValues();
    }

    public function getCalculateTotal(){
        $total=$this->getProductsTotals();

        $this->setvltotal($total['vlprice']);
    }

    public static function removeToSession(){
        $_SESSION[Cart::SESSION]=null;
    }
}
	 
?>