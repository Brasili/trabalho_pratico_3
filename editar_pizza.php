
	<?php
	
		include("funcoes.php");
		
		if (isset($_POST["nome"])) {
			
			if($_POST["nome"]!="") {
				
				include("conexao.php");

				$nome_pizza = $_POST["nome"];
				$preco_pizza = $_POST["preco"];
				$ingredientes = $_POST["ingre"];
				$id = $_POST["id_pizza"];

				$update = "UPDATE pizza SET nome_pizza = '$nome_pizza', preco_pizza = $preco_pizza WHERE id_pizza = ". $id;
				mysqli_query($link, $update);

				$delete = "DELETE FROM pizza_ingrediente WHERE cod_pizza = ".$id;
				mysqli_query($link, $delete);

				foreach ($ingredientes as $i=>$v) {
					
					$insert = "INSERT INTO pizza_ingrediente(cod_pizza, cod_ingrediente) VALUES ($id, $v);";
					mysqli_query($link, $insert);
					
				}
				
			}
		  
		}
		
	?>

	<?php tabela_pizza(); ?>
