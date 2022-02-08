<?php
namespace vasco\Model;

use \vasco\DB\Sql;
use \vasco\Model;

class OrderStatus extends Model{
    const EM_ABERTO = 1;
    const AGUARDANDO_PAGAMENTO = 2;
    const PAGO = 3;
    const NOVO_CLIENTE = 4;

    

}

?>