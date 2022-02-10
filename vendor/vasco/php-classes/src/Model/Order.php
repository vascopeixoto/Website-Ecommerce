<?php
namespace vasco\Model;

use \vasco\DB\Sql;
use \vasco\Model;
use \vasco\Model\Cart;

class Order extends Model{
	const SUCCESS = "Order-Success";
    const ERROR ='Order-Error';

    public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_orders_save(:idorder, :idcart, :iduser, :idstatus, :vltotal)", [
			':idorder'=>$this->getidorder(),
			':idcart'=>$this->getidcart(),
			':iduser'=>$this->getiduser(),
			':idstatus'=>$this->getidstatus(),
			':vltotal'=>$this->getvltotal()
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}

    public function get($idorder){
        $sql= new Sql();

		$results = $sql->select("SELECT * FROM tb_orders a INNER JOIN tb_ordersstatus b USING(idstatus) INNER JOIN tb_carts c USING(idcart) INNER JOIN tb_users d ON d.iduser=a.iduser INNER JOIN tb_persons e ON e.idperson=d.idperson WHERE a.idorder = :idorder", array(
			":idorder"=>$idorder
		));
        if(count($results)>0){
            $this->setData($results[0]);
        }
    }

	public static function  ListAll(){
        $sql= new Sql();

		return  $sql->select("SELECT * FROM tb_orders a INNER JOIN tb_ordersstatus b USING(idstatus) INNER JOIN tb_carts c USING(idcart) INNER JOIN tb_users d ON d.iduser=a.iduser INNER JOIN tb_persons e ON e.idperson=d.idperson ORDER BY a.dtregister DESC");
    }
	public static function total(){
        $sql= new Sql();

		$results=$sql->select("SELECT * FROM tb_orders a INNER JOIN tb_ordersstatus b USING(idstatus) INNER JOIN tb_carts c USING(idcart) INNER JOIN tb_users d ON d.iduser=a.iduser INNER JOIN tb_persons e ON e.idperson=d.idperson ORDER BY a.dtregister DESC");
		return count($results);
	}

	public function  delete(){
        $sql= new Sql();

		$sql->query("DELETE FROM tb_orders WHERE idorder=:idorder",[
			':idorder'=>$this->getidorder()
		]);
    }

	public function  getCart():Cart
	{
        $cart= new Cart();
		$cart->get((int)$this->getidcart());
		return $cart;
    }


    public static function setSuccess($msg){
        $_SESSION[Order::SUCCESS]=$msg;
    }
    
    public static function getSuccess(){
        $msg=(isset($_SESSION[Order::SUCCESS]) && $_SESSION[Order::SUCCESS]) ? $_SESSION[Order::SUCCESS] : '';
        Order::clearSuccess();
        return $msg;
    }
    
    public static function clearSuccess(){
        $_SESSION[Order::SUCCESS]= NULL;
    }

    public static function setError($msg){
        $_SESSION[Order::ERROR]=$msg;
    }
    
    public static function getError(){
        $msg=(isset($_SESSION[Order::ERROR]) && $_SESSION[Order::ERROR]) ? $_SESSION[Order::ERROR] : '';
        Order::clearError();
        return $msg;
    }
    
    public static function clearError(){
        $_SESSION[Order::ERROR]= NULL;
    }

    public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_orders a 
			INNER JOIN tb_ordersstatus b USING(idstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_users d ON d.iduser = a.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			ORDER BY a.dtregister DESC
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_orders a 
			INNER JOIN tb_ordersstatus b USING(idstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_users d ON d.iduser = a.iduser
			INNER JOIN tb_persons e ON e.idperson = d.idperson
			WHERE a.idorder = :id OR e.desperson LIKE :search OR b.idstatus = :id OR c.idcart = :id OR d.iduser = :id
			ORDER BY a.dtregister DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%',
			':id'=>$search
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}
}

?>