<header class="container">
	
	<?php if ($header['usuario'] ['nombre'] != 'desconocido'): ?>
    	<div class="row">
        	
        	<?= strtoupper($header['usuario'] ['nombre']) ?>
    
        	<form action="<?=base_url()?>anonymous/logout">
    			<input type="submit" value="Salir" />
    		</form>
    	
    	</div>
	<?php else: ?>
		<div class="row">
        	<form action="<?=base_url()?>anonymous/login">
    			<input type="submit" value="Entrar" class="btn-info"/>
    		</form>

        	<form action="<?=base_url()?>anonymous/registrar">
    			<input type="submit" value="Registrar" class="btn-default"/>
    		</form>
		</div>
	<?php endif;?>
</header>
