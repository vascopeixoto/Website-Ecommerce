<?php
namespace vasco\Model;

use \vasco\DB\Sql;
use \vasco\Model;

class Order extends Model{

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

}

?>