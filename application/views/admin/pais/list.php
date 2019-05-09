<div class="container">
	<h1>Lista de países</h1>

	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
		</thead>
		
		<?php foreach ($body['paises'] as $pais): ?>
		<tr>
			<td><?= $pais->nombre ?></td>
		</tr>
		<?php endforeach;?>
	</table>
</div>