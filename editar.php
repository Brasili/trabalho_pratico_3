
<?php

	if(isset($_POST["id"])) {
		
		include("conexao.php");
		
		$select = "SELECT * FROM pizza WHERE id_pizza = ". $_POST["id"];
		$resultado = mysqli_query($link, $select);

		$linha = mysqli_fetch_array($resultado);

		$select1 = "SELECT * FROM pizza_ingrediente WHERE cod_pizza = ".$_POST["id"];
		$resultado1 = mysqli_query($link, $select1);

		while($linha_ingredientes = mysqli_fetch_array($resultado1)) {
			$ingredientes_atuais[$linha_ingredientes["cod_ingrediente"]] = 1;
		}
	
?>

		<label for="nome_pizza">Nome Pizza</label>
		<input type="text" name="nome_pizza" id="nome_pizza" value="<?= $linha["nome_pizza"]; ?>">

		<label for="preco">Preço</label>
		<input type="number" name="preco" id="preco" value="<?= $linha["preco_pizza"]; ?>">

		<label>Ingredientes</label>
		
		<ul class="ingredientes">
		
			<?php
		  
			  include("conexao.php");
			  $select = "SELECT * FROM ingredientes;";
			  $resultado = mysqli_query($link, $select);

			  while($linha = mysqli_fetch_array($resultado)) {
		 
			?>
			
			<li><input type="checkbox" name="ingredientes" value="<?php echo $linha["id_ingrediente"]; ?>" id="<?php echo $linha["id_ingrediente"]; ?>" <?php if(isset($ingredientes_atuais[$linha["id_ingrediente"]])) {echo "checked";} ?>><label for="<?php echo $linha["id_ingrediente"]; ?>"><?php echo $linha["nome_ingrediente"]; ?></label></li>
		  
			<?php
				}
			?>
		
		</ul>

		<input type="hidden" name="pizza" value="<?= $_POST["id"];?>" id="id_pizza">

		<button type="button" class="editar_pizza" name="editar_pizza">Editar pizza</button>

		<div class="cadastrar_ingrediente">
		
		  <h2>Cadastrar Ingrediente</h2>
		  
		  <input type="text" name="ingrediente" placeholder="Novo ingrediente">
		  <button type="button" name="adicionar_ingrediente">Ok</button>
		  
		</div>

		<script type="text/javascript">
		
			$(document).ready(function(){
			  
				$("button[name='adicionar_ingrediente']").click(function() {
					
				  var nome_ingrediente = $("input[name='ingrediente']").val();
				  $(".status").html("Inserindo...");
				  
				  $.post("adicionar_ingrediente.php", {ingrediente: nome_ingrediente}, function(data) {
					$(".ingredientes").html($(".ingredientes").html()+data);
					$(".status").html("Inserido");
				  });
				  
				});
				
				$("button[name='editar_pizza']").click(function() {
					
					var nome_pizza = $("#nome_pizza").val();
					var preco_pizza = $("#preco").val();
					var pizza = $("#id_pizza").val();
				  
					var ingredientes = $(".ingredientes input:checked").map(function(){
						return $(this).val();
					}).get();
				  
					//console.log(ingredientes);
				  
					$(".status").html("Editando...");
				  
					$.post("editar_pizza.php", {nome: nome_pizza, preco: preco_pizza, ingre: ingredientes, id_pizza: pizza}, function(data) {
					
						$(".tabela").html(data);
						$(".status").html("Editado");
						
						$(".pizza").load("form_pizza.php");
				  
					});
				  
				});
		  
			});
		  
		</script>

<?php 
	}
?>
