	
	<script type="text/javascript">
	  
		$(document).ready(function() {
			
			$("button[name='adicionar_ingrediente']").click(function() {
			  
				var nome_ingrediente = $("input[name='ingrediente']").val();
				$(".status").html("Inserindo...");
				
				$.post("adicionar_ingrediente_bebida.php", {ingrediente: nome_ingrediente}, function(data) {
					
				  $(".ingredientes").html($(".ingredientes").html()+data);
				  $(".status").html("Inserido");
				  
				});
			
			});
			
			$("input[name='indus']").click(function() {
				
				if($(this).val() == '1') {
					$(".natural").fadeOut();
				} else {
					$(".natural").fadeIn();
					
				}
				
			});
		  
			$("button[name='cadastrar_bebida']").click(function() {
			  
				var nome_pizza = $("#nome_pizza").val();
				var preco_pizza = $("#preco").val();
				var industrializado = $("input[name='indus']:checked").val();
				
				var ingredientes = $(".ingredientes input:checked").map(function(){
					
				  return $(this).val();
				  
				}).get();
				
				$(".status").html("Inserindo...");
				
				$.post("adicionar_bebidas.php", {nome: nome_pizza, preco: preco_pizza, ingre: ingredientes, indus: industrializado}, function(data) {
					
				  $(".tabela").html(data);
				  $(".status").html("Inserido");
				  
				  $(".bebida").load("form_bebidas.php");
				  
				});
			
			});
		  
		});

	</script>

	<label for="nome_pizza">Nome Bebida</label>
	<input type="text" name="nome_pizza" id="nome_pizza">

	<label for="preco">Preço</label>
	<input type="number" name="preco" id="preco">

	<label>Industrializado</label>
	<input type="radio" name="indus" value="1" id="sim" checked><label for="sim">Sim</label>
	<input type="radio" name="indus" value="0" id="nao"><label for="nao">Não</label>

	<div class="natural" style="display: none;">
	
		<br/><label>Ingredientes</label>
		
		<ul class="ingredientes">

			<?php
			
				include("conexao.php");
				
				$select = "SELECT * FROM ingrediente_bebida;";
				$resultado = mysqli_query($link, $select);

				while($linha = mysqli_fetch_array($resultado)) {
					
			?>
			
			<li>
				<input type="checkbox" name="ingredientes" value="<?php echo $linha["id_ingrediente_bebida"]; ?>" id="<?php echo $linha["id_ingrediente_bebida"]; ?>"><label for="<?php echo $linha["id_ingrediente_bebida"]; ?>"><?php echo $linha["nome_ingrediente_bebida"]; ?></label>
			</li>	
			
			<?php
			  }
			?>
		  
		</ul>
		
		<div class="cadastrar_ingrediente">

		  <h2>Cadastrar Ingrediente</h2>
		  
		  <input type="text" name="ingrediente" placeholder="Novo ingrediente">
		  <button type="button" name="adicionar_ingrediente">Ok</button>
		  
		</div>
		
	</div>
	
	<br/>
	<button type="button" class="cadastrar_bebida" name="cadastrar_bebida">Cadastrar nova Bebida</button>
