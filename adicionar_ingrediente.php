
<?php

	if (isset($_POST["ingrediente"])) {
		
		if($_POST["ingrediente"]!="") {
			
			include("conexao.php");
			
			$insert = "INSERT INTO ingredientes(nome_ingrediente) VALUES('".$_POST["ingrediente"]."');";
			mysqli_query($link, $insert);

			$select = "SELECT * FROM ingredientes WHERE nome_ingrediente = '".$_POST["ingrediente"]."';";
			$resultado = mysqli_query($link, $select);

			$id = mysqli_fetch_array($resultado)["id_ingrediente"];
			echo '<li><input type="checkbox" name="ingredientes" value="'.$id.'" id="'.$id.'"><label for="'.$id.'">'.$_POST["ingrediente"].'</label></li>';
		
		}
	  
	}
	
?>
