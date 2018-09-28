
<?php

	if(isset($_POST["id"])) {
		
		include("conexao.php");
		
		$select = "SELECT * FROM bebida WHERE id_bebida = ". $_POST["id"];
		$resultado = mysqli_query($link, $select);

		$linha = mysqli_fetch_array($resultado);

		$select1 = "SELECT * FROM bebida_ingrediente WHERE cod_bebida = ".$_POST["id"];
		$resultado1 = mysqli_query($link, $select1);

		while($linha_ingredientes = mysqli_fetch_array($resultado1)) {
			$ingredientes_atuais[$linha_ingredientes["cod_ingrediente_bebida"]] = 1;
		}
	
?>

		<label for="nome_pizza">Nome Bebida</label>
		<input type="text" name="nome_pizza" id="nome_bebida" value="<?= $linha["nome_bebida"]; ?>">

		<label for="preco">Preço</label>
		<input type="number" name="preco" id="preco" value="<?= $linha["preco_bebida"]; ?>">

		<label>Industrializado</label>
		
		<?php
		if($linha["industrializado"]==1) {
		?>
		
			<input type="radio" name="indus" value="1" id="sim" checked><label for="sim">Sim</label>
			<input type="radio" name="indus" value="0" id="nao"><label for="nao">Não</label>
			<div class="natural" style="display: none;">
	
		<?php
		} else {
		?>
		
			<input type="radio" name="indus" value="1" id="sim"><label for="sim">Sim</label>
			<input type="radio" name="indus" value="0" id="nao" checked><label for="nao">Não</label>
			<div class="natural" style="display: block;">
		
		<?php
		}
		?>
				
				<label>Ingredientes</label>
				
				<ul class="ingredientes">

					<?php
					  
					  include("conexao.php");
					  $select = "SELECT * FROM ingrediente_bebida;";
					  $resultado = mysqli_query($link, $select);

					  while($linha = mysqli_fetch_array($resultado)) {
				 
					?>
					
							<li><input type="checkbox" name="ingredientes" value="<?php echo $linha["id_ingrediente_bebida"]; ?>" id="<?php echo $linha["id_ingrediente_bebida"]; ?>" <?php if(isset($ingredientes_atuais[$linha["id_ingrediente_bebida"]])) {echo "checked";} ?>><label for="<?php echo $linha["id_ingrediente_bebida"]; ?>"><?php echo $linha["nome_ingrediente_bebida"]; ?></label></li>
				  
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

			<input type="hidden" name="bebida" value="<?= $_POST["id"];?>" id="id_bebida">
			<button type="button" class="editar_bebida" name="editar_bebida">Editar Bebida</button>


			<script type="text/javascript">
			
				$(document).ready(function(){
				  
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
					
					$("button[name='editar_bebida']").click(function() {
						
						var nome_bebida = $("#nome_bebida").val();
						var preco_bebida = $("#preco").val();
						var bebida = $("#id_bebida").val();
						var industrializado = $("input[name='indus']:checked").val();
					  
						var ingredientes = $(".ingredientes input:checked").map(function(){
							
							return $(this).val();
							
						}).get();
					  
						$(".status").html("Editando...");
					  
						$.post("editar_bebida_ajax.php", {nome: nome_bebida, preco: preco_bebida, ingre: ingredientes, id_bebida: bebida, indus: industrializado}, function(data) {
						
							$(".tabela").html(data);
							$(".status").html("Editado");
							
							$(".bebida").load("form_bebidas.php");
					  
						});
					  
					});
			  
				});
			  
			</script>

<?php 
	}
?>
