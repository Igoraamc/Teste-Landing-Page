<?php
	session_start();

	if(sizeof($_SESSION) != 0) {
		session_destroy();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

	<script type="text/javascript" src="JS/services.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Bitter:400,700" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="CSS/main.css">

	<style type="text/css">
		
	</style>
</head>
<body>
	<div id="inicio">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  	<a class="navbar-brand" href="#">League</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAll" aria-controls="navbarAll" aria-expanded="false" aria-label="Toggle navigation">
		  		<span class="navbar-toggler-icon"></span>
			</button>
		  	<div class="collapse navbar-collapse" id="navbarAll">
		  		<ul class="navbar-nav mr-auto">
			  		<li class="nav-item active">
			  			<a class="nav-link" href="javascript:;">Home</a>
			  		</li>
			  	</ul>
		  	</div>
		</nav>
		<div class="container">
			<div class="row">
				<form id="getUserId">
					<div class="col-lg-12" style="margin-bottom: 15px;">
						<input type="text" name="summonerName" id="summonerName">
					</div>
					<div class="col-lg-12">
						<input type="submit" id="getId" class="white-btn" value="Pegue seu ID">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var redirectIfSuccess = function(response) {
			console.log(response);
			window.location.href = "Perfil.php";
		}

		
		$('#getUserId').on('submit', function (e) {
  			e.preventDefault();
            var form = $('#getUserId').serialize();

            LeagueOfLegends.getSummonerId(form, redirectIfSuccess);
        });
		
	</script>
</body>
</html>