<div class="container">
	<h1>Introduce los datos del usuario</h1>
	
	<form action="<?=base_url()?>anonymous/registrarPost" method="post">
	
		Nombre de cuenta<input type="text" name="loginname" required="required"><br/>
		Contraseña<input type="password" name="password" required="required"><br/>
		
		Nombre<input type="text" name="nombre" required="required"><br/>
		Apellido 1<input type="text" name="ape1" ><br/>
		Apellido 2<input type="text" name="ape2" ><br/>
		
		<input type="submit" ><br/>
		
	</form>
</div>