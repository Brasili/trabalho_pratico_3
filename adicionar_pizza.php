
<?php

	include("funcoes.php");

	if (isset($_POST["nome"])) {
		
		if($_POST["nome"]!="") {
			
			include("conexao.php");

			$nome_pizza = $_POST["nome"];
			$preco_pizza = $_POST["preco"];
			$ingredientes = $_POST["ingre"];

			$insert = "INSERT INTO pizza(nome_pizza, preco_pizza) VALUES('$nome_pizza', $preco_pizza);";
			mysqli_query($link, $insert);

			$select = "SELECT * FROM pizza WHERE nome_pizza = '$nome_pizza' AND preco_pizza = $preco_pizza;";
			$resultado = mysqli_query($link, $select);

			$id = mysqli_fetch_array($resultado)["id_pizza"];

			foreach ($ingredientes as $i=>$v) {
				
			  $insert = "INSERT INTO pizza_ingrediente(cod_pizza, cod_ingrediente) VALUES ($id, $v);";
			  mysqli_query($link, $insert);
			  
			}
		}
	  
	}
	
?>

<?php tabela_pizza(); ?>
