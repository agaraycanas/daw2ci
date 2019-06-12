<nav class="container navbar navbar-expand-sm bg-dark navbar-dark rounded">

	<a class="navbar-brand" href="<?=base_url()?>">
		<img src="<?=base_url()?>assets/img/icons/home-alt.png" alt="INICIO" style="width:40px;">
	</a>

	<ul class="navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
				Usuario
			</a>

			<div class="dropdown-menu">
				<a class="dropdown-item" href="<?=base_url()?>anonymous/login">LOGIN</a>
			</div>
		</li>
   </ul>

	<ul class="navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
				Admin
			</a>

			<div class="dropdown-menu">
				<a class="dropdown-item" href="<?=base_url()?>admin/user/list">Usuarios</a>
				<a class="dropdown-item" href="<?=base_url()?>admin/pais/list">Países</a>
				<a class="dropdown-item" href="<?=base_url()?>admin/aficion/list">Aficiones</a>
			</div>
		</li>
   </ul>

</nav>