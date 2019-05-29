<div class="container">
	<form action="<?=base_url()?>admin/aficion/create"><input type="submit" value="Nueva afición"></form>
	<h1>Lista de aficiones</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
			</tr>
		</thead>

		<tbody>

		<?php foreach ($body['aficiones'] as $aficion): ?>
			<tr>
				<td><?= $aficion->nombre ?></td>
			</tr>
		<?php endforeach;?>

		</tbody>
	</table>
</div>