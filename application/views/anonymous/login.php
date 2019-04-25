<div class="container">
	<h1>Introduce tus credenciales</h1>
	
	<form action="<?=base_url()?>anonymous/loginPost" method="post">
		Nombre de usuario<input type="text" name="loginname" required="required"><br/>
		Contraseña<input type="password" name="password" required="required"><br/>
		<input type="submit" ><br/>
		
	</form>
</div>