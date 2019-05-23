<div class="container">
	<form action="<?=base_url()?>admin/pais/create"><input type="submit" value="Nuevo país"></form>
	<h1>Lista de países</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
			</tr>
		</thead>

		<tbody>

		<?php foreach ($body['paises'] as $pais): ?>
			<tr>
				<td><?= $pais->nombre ?></td>
			</tr>
		<?php endforeach;?>

		</tbody>
	</table>
</div>