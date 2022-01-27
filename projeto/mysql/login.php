<?php
class UUID {
  public static function v3($namespace, $name) {
    if(!self::is_valid($namespace)) return false;

    // Get hexadecimal components of namespace
    $nhex = str_replace(array('-','{','}'), '', $namespace);

    // Binary Value
    $nstr = '';

    // Convert Namespace UUID to bits
    for($i = 0; $i < strlen($nhex); $i+=2) {
      $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
    }

    // Calculate hash value
    $hash = md5($nstr . $name);

    return sprintf('%08s-%04s-%04x-%04x-%12s',

      // 32 bits for "time_low"
      substr($hash, 0, 8),

      // 16 bits for "time_mid"
      substr($hash, 8, 4),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 3
      (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x3000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,

      // 48 bits for "node"
      substr($hash, 20, 12)
    );
  }

  public static function v4() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

      // 32 bits for "time_low"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),

      // 16 bits for "time_mid"
      mt_rand(0, 0xffff),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 4
      mt_rand(0, 0x0fff) | 0x4000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      mt_rand(0, 0x3fff) | 0x8000,

      // 48 bits for "node"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
  }

  public static function v5($namespace, $name) {
    if(!self::is_valid($namespace)) return false;

    // Get hexadecimal components of namespace
    $nhex = str_replace(array('-','{','}'), '', $namespace);

    // Binary Value
    $nstr = '';

    // Convert Namespace UUID to bits
    for($i = 0; $i < strlen($nhex); $i+=2) {
      $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
    }

    // Calculate hash value
    $hash = sha1($nstr . $name);

    return sprintf('%08s-%04s-%04x-%04x-%12s',

      // 32 bits for "time_low"
      substr($hash, 0, 8),

      // 16 bits for "time_mid"
      substr($hash, 8, 4),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 5
      (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,

      // 48 bits for "node"
      substr($hash, 20, 12)
    );
  }

  public static function is_valid($uuid) {
    return preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?'.
                      '[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $uuid) === 1;
  }
}

// Usage
// Named-based UUID.

$v3uuid = UUID::v3('1546058f-5a25-4334-85ae-e68f2a44bbaf', 'SomeRandomString');
$v5uuid = UUID::v5('1546058f-5a25-4334-85ae-e68f2a44bbaf', 'SomeRandomString');

// Pseudo-random UUID

$uuid = UUID::v4();


$conn = new PDO("mysql:dbname=projetoTW;host=127.0.0.1", "root", "Vasco55968016!");

// Inserir DADOS
/*
$stmt = $conn->prepare("INSERT INTO utilizador (idutilizador, nome, Apelido, password, email, telemovel, nivel) VALUES(:idutilizador,:nome, :Apelido, :password, :email, :telemovel, :nivel)");

$nome ="Carlos";
$apelido="Fernandes";
$password="013410042";
$email="carlitois@gmail.com";
$telemovel="987654321"; 
$nivel="2";

$stmt->bindParam(":idutilizador", $uuid);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":Apelido", $apelido);
$stmt->bindParam(":password", $password);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":telemovel", $telemovel);
$stmt->bindParam(":nivel", $nivel);
*/

// Atualizar dados
//
$telemovel = "vascomfpeixoto@gmail.com";
$password = "55968016";


$stmt = $conn->prepare("UPDATE utilizador SET email = ". $telemovel . ", password = ". $password. " WHERE idutilizador = '5450470a-5c38-11ec-86b2-4a0b599c0545';");



//


//Apagar dados
/*
$stmt = $conn->prepare("DELETE FROM utilizador WHERE idutilizador = :ID");

$id = "c62a927c-5abc-43ef-868d-4210e52c58c2";

$stmt->bindParam(":ID", $id);
*/

//
if($stmt->execute()){
  echo "sucesso";
}else{
  echo "erro";
}

//

//Ler dados
/*
$stmt = $conn->prepare("SELECT * FROM utilizador ORDER BY nivel");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
*/





?>