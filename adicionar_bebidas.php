
<?php

	include("funcoes.php");

	if (isset($_POST["nome"])) {
		
		if($_POST["nome"]!="") {
			
			include("conexao.php");

			$nome_bebida = $_POST["nome"];
			$preco_bebida = $_POST["preco"];
			$industrializado = $_POST["indus"];

			$insert = "INSERT INTO bebida(nome_bebida, preco_bebida, industrializado) VALUES('$nome_bebida', $preco_bebida, $industrializado);";
			mysqli_query($link, $insert);

			if($industrializado=='0') {
				
				$ingredientes = $_POST["ingre"];
				$select = "SELECT * FROM bebida WHERE nome_bebida = '$nome_bebida' AND preco_bebida = $preco_bebida;";
				$resultado = mysqli_query($link, $select);

				$id = mysqli_fetch_array($resultado)["id_bebida"];

				foreach ($ingredientes as $i=>$v) {
					
				  $insert = "INSERT INTO bebida_ingrediente(cod_bebida, cod_ingrediente_bebida) VALUES ($id, $v);";
				  mysqli_query($link, $insert);
				  
				}
			}
		}
	  
	}
	
?>

<?php tabela_bebida(); ?>
