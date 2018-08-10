<?php
	session_start();

	$url = "index.php";
	$_SESSION["loged"];

	if($_SESSION["loged"] != 1) {
		header("Location: " .$url);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Perfil</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

	<script type="text/javascript" src="JS/services.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Bitter:400,700" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="CSS/main.css"></head>
<body>
	<div id="perfil">
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
			  			<a class="nav-link" href="javascript:;">Perfil</a>
			  		</li>
			  		<li class="nav-item">
			  			<a class="nav-link" href="All Champions.php">Campeões Com Maestria</a>
			  		</li>
			  		<li class="nav-item">
			  			<a class="nav-link" href="Suas Partidas.php">Suas Partidas</a>
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
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-2">
							<div class="account-icon">
								<?php
									$icon = $_SESSION["iconId"];

					  				echo '<img src="http://ddragon.leagueoflegends.com/cdn/8.15.1/img/profileicon/'.$icon.'.png">';
								?>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="account-name">
								<?php
									$name = $_SESSION["name"];

					  				echo '<h1>'.$name.',</h1>';
								?>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-6">
									<div class="account-ranking">
										
									</div>
								</div>
								<div class="col-lg-6">
									<div class="account-ranking">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="row">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var adicionarRanking = function(response) {
			var data = JSON.parse(response);

			var el = $('.account-ranking');
			for (var i = 0; i < data.length; i++) {
				var elo = data[i].tier.toLowerCase();
				eloC = elo.charAt(0).toUpperCase() + elo.slice(1);
				var eloType = data[i].queueType.split('_')[1];
				if(eloType == "SOLO") {
					$('<h3 class="account-title">'+data[i].leagueName+'</h3>').appendTo('.account-name');
				}
				$('<img src="images/tier-icons/'+elo+'_'+data[i].rank.toLowerCase()+'.png"><span>'+data[i].queueType.split('_')[1]+'</span><span>'+eloC+' '+data[i].rank+' - '+data[i].leaguePoints+' PDL</span>').appendTo(el[i]);
			}
				
		}
		var tresMelhoresMaestrias = function(response) {
			var data = JSON.parse(response);

			data.sort(function(a, b) {
				console.log(a.championLevel);
				console.log(b.championLevel);
				return a.championLevel-b.championLevel;
			});

			console.log(data);
		}

		LeagueOfLegends.getSummonerRanking(adicionarRanking);
		LeagueOfLegends.getAllChampionsMasterysBySummoner(tresMelhoresMaestrias);
	</script>
</body>
</html>