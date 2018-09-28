	<script type="text/javascript">
	  
		$(document).ready(function() {
			
			$("button[name='adicionar_ingrediente']").click(function() {
			  
				var nome_ingrediente = $("input[name='ingrediente']").val();
				$(".status").html("Inserindo...");
				
				$.post("adicionar_ingrediente.php", {ingrediente: nome_ingrediente}, function(data) {
					
				  $(".ingredientes").html($(".ingredientes").html()+data);
				  $(".status").html("Inserido");
				  
				});
			
			});
		  
			$("button[name='cadastrar_pizza']").click(function() {
			  
				var nome_pizza = $("#nome_pizza").val();
				var preco_pizza = $("#preco").val();
				
				var ingredientes = $(".ingredientes input:checked").map(function(){
					
				  return $(this).val();
				  
				}).get();
				
				$(".status").html("Inserindo...");
				
				$.post("adicionar_pizza.php", {nome: nome_pizza, preco: preco_pizza, ingre: ingredientes}, function(data) {
					
				  $(".tabela").html(data);
				  $(".status").html("Inserido");
				  
				  $(".pizza").load("form_pizza.php");
				  
				});
			
			});
		  
		});

	</script>

	<label for="nome_pizza">Nome Pizza</label>
	<input type="text" name="nome_pizza" id="nome_pizza">

	<label for="preco">Preço</label>
	<input type="number" name="preco" id="preco">

	<label>Ingredientes</label>
	
	<ul class="ingredientes">

		<?php
		
			include("conexao.php");
			$select = "SELECT * FROM ingredientes;";
			$resultado = mysqli_query($link, $select);

			while($linha = mysqli_fetch_array($resultado)) {
				
		?>
		
		<li>
			<input type="checkbox" name="ingredientes" value="<?php echo $linha["id_ingrediente"]; ?>" id="<?php echo $linha["id_ingrediente"]; ?>"><label for="<?php echo $linha["id_ingrediente"]; ?>"><?php echo $linha["nome_ingrediente"]; ?></label>
		</li>
		
		<?php
		  }
		?>
  
	</ul>

	<button type="button" class="cadastrar_pizza" name="cadastrar_pizza">Cadastrar nova Pizza</button>

	<div class="cadastrar_ingrediente">

	  <h2>Cadastrar Ingrediente</h2>
	  
	  <input type="text" name="ingrediente" placeholder="Novo ingrediente">
	  <button type="button" name="adicionar_ingrediente">Ok</button>
	  
	</div>
	