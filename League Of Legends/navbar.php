<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<a class="navbar-brand" href="#">League</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAll" aria-controls="navbarAll" aria-expanded="false" aria-label="Toggle navigation">
  		<span class="navbar-toggler-icon"></span>
	</button>
  	<div class="collapse navbar-collapse" id="navbarAll">
  		<ul class="navbar-nav mr-auto">
	  		<li class="nav-item">
	  			<a class="nav-link" href="index.php">Home</a>
	  		</li>
	  		<li class="nav-item active">
	  			<a class="nav-link" href="javascript:;">Campeões Com Maestria</a>
	  		</li>
	  		<li class="nav-item">
	  			<a class="nav-link" href="">Sua Página</a>
	  		</li>
	  	</ul>
	  	<ul class="navbar-nav">
	  		<li class="nav-item mr-sm-2">
	  			<?php
	  				$icon = $_SESSION["iconId"];

	  				echo '<img src="http://ddragon.leagueoflegends.com/cdn/8.15.1/img/profileicon/'.$icon.'.png" class="navbar-profile-icon">';
	  			?>
	  		</li>
	  		<li class="nav-item">
	  			<?php
	  				$name = $_SESSION["name"];

	  				echo '<span class="navbar-text nav-name">'.$name.'</span>';
	  			?>
	  		</li>
	  	</ul>
  	</div>
</nav>