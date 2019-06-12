<div class="container">
	<h1>Introduce los datos del usuario</h1>
	
	<form action="<?=base_url()?>anonymous/registrarPost" method="post">
	
		Nombre de cuenta<input type="text" name="loginname" required="required"><br/>
		Contraseña<input type="password" name="password" required="required"><br/>
		
		Nombre<input type="text" name="nombre" required="required"><br/>
		Apellido 1<input type="text" name="ape1" ><br/>
		Apellido 2<input type="text" name="ape2" ><br/>
		Fecha nacimiento<input type="date" name="fnac" ><br/>
		
		País
		<select name="pais">
		<?php foreach ($body['paises'] as $pais): ?>
			<option value="<?= $pais->id?>"><?= $pais->nombre ?></option>
		<?php endforeach;?>
		</select>
		<br/>
		
		<fieldset>
		<legend>Aficiones</legend>
		<?php foreach ($body['aficiones'] as $aficion): ?>
			<input type="checkbox" name="aficiones[]" id="aficion-<?= $aficion->id?>" value="<?= $aficion->id?>">
			<label for="aficion-<?= $aficion->id?>"><?= $aficion->nombre ?></label>
		<?php endforeach;?>
		</fieldset>
		
		<br/>

		<input type="submit" ><br/>
		
	</form>
</div>