<?php
	$id = 1;  
	$nome = "Thayná";
	$snome = "Alvarenga";
	$instru = "Violino";
	$instruicon = "icons8-violino.png"; //Icone do instrumento
?>

<tr>
	<!-- NOME -->
	<td><?php echo $nome." ".$snome; ?></td>
	<!-- ICONE INSTRU -->
	<td>
		<div class="btn-instru" data-toggle="tooltip" data-placement="top" title="<?php echo $instru; ?>">
			<span style="display: none;"><?php echo $instru; ?></span>
			<img src="../img/instruments/<?php echo $instruicon; ?>">
		</div>
	</td>
	<!-- BOTÃO SELECIONAR -->
	<td><button nameid="<?php echo $id; ?>" class="btn btn-sm btn-success bordersquared greenShadow" data-toggle="tooltip" data-placement="top" title="Ir para cadastro"><i class="fas fa-chevron-circle-right"></i></button></td>
</tr>