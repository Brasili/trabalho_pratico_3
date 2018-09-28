
	<?php

		if(isset($_POST["id"])){
			
			include("conexao.php");
			
			$delete = "DELETE FROM pizza WHERE id_pizza = ".$_POST["id"];
			mysqli_query($link, $delete);

			$delete = "DELETE FROM pizza_ingrediente WHERE cod_pizza = ".$_POST["id"];
			mysqli_query($link, $delete);
			
		}

	?>
