
	<?php
		function tabela_pizza() {
	?>
	
	<table border="1">

		<thead>
		
			<tr>
			  <th>PIZZA</th>
			  <th>INGREDIENTES</th>
			  <th>PREÇO</th>
			  <th>AÇÃO</th>
			</tr>
		 
		</thead>

		<tbody>
		
			<?php
			
				include("conexao.php");
				
				$select = "SELECT * FROM pizza ORDER BY nome_pizza;";
				$resultado = mysqli_query($link, $select);

				while($linha = mysqli_fetch_array($resultado)) {
					
					$select2 = "SELECT i.nome_ingrediente AS 'nome' FROM pizza_ingrediente as pi INNER JOIN ingredientes as i ON i.id_ingrediente=pi.cod_ingrediente WHERE pi.cod_pizza = ".$linha["id_pizza"];
				  
					$resultado2 = mysqli_query($link, $select2);
				  
			?>
			
					<tr for="<?= $linha["id_pizza"];?>">
					
						<td><?= $linha["nome_pizza"];?></td>
						
						<td>
						
							<?php
							
							  $c = 0;
							  
								while($linha2 = mysqli_fetch_array($resultado2)) {
								  
									if($c != 0) {
									  echo ", ";
									}
									echo $linha2["nome"];
									$c++;
									
								}
								
							?>.
						
						</td>
						
						<td>R$ <?= $linha["preco_pizza"];?></td>
						
						<td><button type="button" name="excluir" value="<?= $linha["id_pizza"];?>"></button><button type="button" name="editar" value="<?= $linha["id_pizza"];?>"></button></td>
					
					</tr>
			
				<?php
				}
				?>
		
		</tbody>

	</table>
	
	<script>
	
		$(document).ready(function() {
			
			$("button[name='excluir']").click(function() {
			  
				var id_pizza = $(this).val();
				
				$(".status").html("Excluindo...");
				
				$.post("excluir.php", {id: id_pizza}, function(data) {
					
				  $(".status").html("Excluido");
				  var tr = "tr[for='"+id_pizza+"']";
				  tr = $(tr);
				  tr.hide(400, function() {tr.remove();});
				  
				});
			
			});
		  
			$("button[name='editar']").click(function() {
				
				var id_pizza = $(this).val();
				
				$.post("editar.php", {id: id_pizza}, function(data) {
					
				  $(".pizza").html(data);
				  
				});
				
			});
			
		});
		
	</script>

	
	<?php
	
	}

	function tabela_bebida() {
		
	?>
	
	<table border="1">
	
		<thead>
		
			<tr>
			  <th>BEBIDA</th>
			  <th>INGREDIENTES</th>
			  <th>PREÇO</th>
			  <th>AÇÃO</th>
			</tr>
		 
		</thead>

		<tbody>
		
			<?php
			
				include("conexao.php");
				
				$select = "SELECT * FROM bebida ORDER BY nome_bebida;";
				$resultado = mysqli_query($link, $select);

				while($linha = mysqli_fetch_array($resultado)) {
					
				  $select2 = "SELECT i.nome_ingrediente_bebida AS 'nome' FROM bebida_ingrediente as bi INNER JOIN ingrediente_bebida as i ON i.id_ingrediente_bebida=bi.cod_ingrediente_bebida WHERE bi.cod_bebida = ".$linha["id_bebida"];
				  
				  $resultado2 = mysqli_query($link, $select2);
				  
			?>
			
					<tr for="<?= $linha["id_bebida"];?>">
					
						<td><?= $linha["nome_bebida"];?></td>
						
						<td>
						
							<?php
							
								$c = 0;
							  
								if(mysqli_num_rows($resultado2)!=0) {
									
									while($linha2 = mysqli_fetch_array($resultado2)) {
									  
										if($c != 0) {
										  echo ", ";
										}
										echo $linha2["nome"];
										$c++;
										
									}
									
								} else {
									
									echo "N/A";
									
								}
							?>.
						
						</td>
						
						<td>R$ <?= $linha["preco_bebida"];?></td>
						
						<td><button type="button" name="excluir" value="<?= $linha["id_bebida"];?>"></button><button type="button" name="editar" value="<?= $linha["id_bebida"];?>"></button></td>
					
					</tr>
			
				<?php
				}
				?>
		
		</tbody>

	</table>
	
	<script>
	
		$(document).ready(function() {
			
			$("button[name='excluir']").click(function() {
			  
				var id_bebida = $(this).val();
				
				$(".status").html("Excluindo...");
				
				$.post("excluir_bebida.php", {id: id_bebida}, function(data) {
					
				  $(".status").html("Excluido");
				  var tr = "tr[for='"+id_bebida+"']";
				  tr = $(tr);
				  tr.hide(400, function() {tr.remove();});
				  
				});
			
			});
		  
			$("button[name='editar']").click(function() {
				
				var id_bebida = $(this).val();
				
				$.post("editar_bebida.php", {id: id_bebida}, function(data) {
					
				  $(".bebida").html(data);
				  
				});
				
			});
			
		});
		
	</script>
	
	<?php
	}
	?>
