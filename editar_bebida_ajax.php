
	<?php
	
		include("funcoes.php");
		
		if(isset($_POST["preco"])) {
			
			if($_POST["preco"]!="") {
				
				include("conexao.php");

				$nome_bebida = $_POST["nome"];
				$preco_bebida = $_POST["preco"];
				$industrializado = $_POST["indus"];
				
				$id = $_POST["id_bebida"];

				$update = "UPDATE bebida SET nome_bebida = '$nome_bebida', preco_bebida = $preco_bebida, industrializado = $industrializado WHERE id_bebida = ". $id;
				mysqli_query($link, $update);

				$delete = "DELETE FROM bebida_ingrediente WHERE cod_bebida = ".$id;
				mysqli_query($link, $delete);
				
				if($industrializado=='0') {
					
					$ingredientes = $_POST["ingre"];
					
					foreach ($ingredientes as $i=>$v) {
						
					  $insert = "INSERT INTO bebida_ingrediente(cod_bebida, cod_ingrediente_bebida) VALUES ($id, $v);";
					  mysqli_query($link, $insert);
					  
					}
					
				}
				
			}
		  
		}
		
	?>
	
	<?php tabela_bebida(); ?>
