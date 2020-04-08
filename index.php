<?php 

// essa é o arquivo inicial, conectamos no config e acessamos as classes via config.php
require_once('config.php');

$sql = new Sql();

$usuarios = $sql->select('SELECT * FROM tb_usuarios');

echo json_encode($usuarios);


 ?>