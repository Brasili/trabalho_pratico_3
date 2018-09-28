
	<?php

		if(isset($_POST["id"])){
			
			include("conexao.php");
			
			$delete = "DELETE FROM bebida WHERE id_bebida = ".$_POST["id"];
			mysqli_query($link, $delete);

			$delete = "DELETE FROM bebida_ingrediente WHERE cod_bebida = ".$_POST["id"];
			mysqli_query($link, $delete);
			
		}

	?>
