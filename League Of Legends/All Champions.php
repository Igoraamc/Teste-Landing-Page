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
	<title>Champions</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

	<script type="text/javascript" src="JS/services.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Bitter:400,700" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
</head>
<body>
	<div id="masteryChampions">
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
			  		<li class="nav-item">
			  			<a class="nav-link" href="Perfil.php">Perfil</a>
			  		</li>
			  		<li class="nav-item active">
			  			<a class="nav-link" href="javascript:;">Campeões Com Maestria</a>
			  		</li>
			  		<li class="nav-item">
			  			<a class="nav-link" href="Suas Partidas">Suas Partidas</a>
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
				<div id="champions" class="col-lg-9">
					<div class="row">
						
					</div>
				</div>
				<div id="content">
					
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var data;
		var maestriasDosCampeoes;
		var callback = function(response){
			maestriasDosCampeoes = JSON.parse(response);
		}
		var addChampions = function(response) {
			var j = 0;
			var cont = 0;
			
			data = JSON.parse(response);

			var arr = Object.keys(data.data).map(function(k) { return data.data[k] });

			arr.sort(function(a, b) {
				return a.id-b.id;
			});

			LeagueOfLegends.getAllChampionsMasterysBySummoner(callback);
			
			maestriasDosCampeoes.sort(function(a, b) {
				return a.championId-b.championId;
			})

			for (var i = 0; i < arr.length; i++) {
				
				if(i == 137) {
					break;
				}
				if(maestriasDosCampeoes[j - cont].championId == arr[i].id) {
					$('<div class="col-xs-12 col-sm-6 col-lg-2"><div id='+ arr[i].name.toLowerCase() +' data-id='+ arr[i].id +' data-champ-id='+maestriasDosCampeoes[j - cont].championId+'><div class="img"><img class="mastery_img" src="images/Champion_Mastery_Level_'+maestriasDosCampeoes[j - cont].championLevel+'_Square.png"><img class="mastery_champ" src="https://ddragon.leagueoflegends.com/cdn/8.15.1/img/champion/' + arr[i].image.full + '"></div><h4 class="text-center">' + arr[i].name + '</h4></div>').appendTo('#champions .row');
				}else {
					$('<div class="col-xs-12 col-sm-6 col-lg-2"><div id='+ arr[i].name.toLowerCase() +' data-id='+ arr[i].id +' data-champ-id='+maestriasDosCampeoes[j - cont].championId+'><div class="img"><img class="mastery_img" src="images/Champion_Mastery_Level_0_Square.png"><img class="mastery_champ" src="https://ddragon.leagueoflegends.com/cdn/8.15.1/img/champion/' + arr[i].image.full + '"></div><h4 class="text-center">' + arr[i].name + '</h4></div>').appendTo('#champions .row');
					cont++;
					j - cont;
				}
				j++;
				
			}
		}
		LeagueOfLegends.getAllChampions(addChampions);

	</script>
</body>
</html>