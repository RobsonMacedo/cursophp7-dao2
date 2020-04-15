<?php 

// essa é o arquivo inicial, conectamos no config e acessamos as classes via config.php
require_once('config.php');

// Está funcionando ... traz todos os dados da tabela
/*
$sql = new Sql();

$usuarios = $sql->select('SELECT * FROM tb_usuarios');

echo json_encode($usuarios);
*/


// Está funcionando ... traz os dados por um ID específico
/*
$usuario = new Usuario();

$usuario->loadById(5); 

echo $usuario;
*/

// Funcionou!!!! Aqui uso um método que faz o select dentro dele (Faz a mesma coisa que o primeiro) 
/*
$lista = new Usuario();

$result = $lista->getLista();

echo json_encode($result);
*/

//Caso o método fosse estático seria assim
/*
$static = Usuario::getLista();

echo json_encode($static);
*/

// aqui pegamos um usuario por parte do nome
/*
$lista = Usuario::search('Ze');

echo json_encode($lista);
*/

//Carregamos com o LOGIN e a SENHA
/*
$loginEsenha = new Usuario();

$loginEsenha->login('Robson', '123456789');

echo ($loginEsenha);
*/

// Testando a função do INSERT
/*
$aluno = new Usuario();

$aluno->setDeslogin('Mauricinho');
$aluno->setDessenha('24');

//$aluno->insert();
//$aluno->insert2('BAludao', '22');
$aluno->insert3();
//$resultado = $aluno->getLista();

//echo json_encode($resultado);
echo $aluno;
*/

// Testando o UPDATE
/*
$update = new Usuario();
$update->loadById(4);
$update->update('Novo', '111');
echo ($update);
*/	


$lista = Usuario::getLista();

echo json_encode($lista);




 ?>