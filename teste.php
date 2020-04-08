<?php 

class teste{


	function __construct(){

		echo 'Objeto Teste criado com sucesso!!!';
		echo '<br>';
		echo '****************************';
		echo '<br>';

	}	

	function soma($n1 = 0, $n2 = 0 , $n3 ){

		//return json_encode($this);

		return $n1 + $n2 + array_sum($n3);

		}


}

$teste = new Teste();

echo $teste->soma(0, 20, array(10, 20, 30));


 ?>