<?php
namespace vasco\Model;

use \vasco\DB\Sql;
use \vasco\Model;

class OrderStatus extends Model{
    const EM_ABERTO = 1;
    const AGUARDANDO_PAGAMENTO = 2;
    const PAGO = 3;
    const SERVICO_PRESTADO = 4;
   

    public static function  listAll(){
        $sql= new Sql();

		return  $sql->select("SELECT * FROM tb_ordersstatus ORDER BY desstatus");
    }

}

?>