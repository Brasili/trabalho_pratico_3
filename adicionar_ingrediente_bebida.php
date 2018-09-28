
<?php

	if (isset($_POST["ingrediente"])) {
		
		if($_POST["ingrediente"]!="") {
			
			include("conexao.php");
			
			$insert = "INSERT INTO ingrediente_bebida(nome_ingrediente_bebida) VALUES('".$_POST["ingrediente"]."');";
			mysqli_query($link, $insert);

			$select = "SELECT * FROM ingrediente_bebida WHERE nome_ingrediente_bebida = '".$_POST["ingrediente"]."';";
			$resultado = mysqli_query($link, $select);

			$id = mysqli_fetch_array($resultado)["id_ingrediente_bebida"];
			echo '<li><input type="checkbox" name="ingredientes" value="'.$id.'" id="'.$id.'"><label for="'.$id.'">'.$_POST["ingrediente"].'</label></li>';
		
		}
	  
	}
	
?>
