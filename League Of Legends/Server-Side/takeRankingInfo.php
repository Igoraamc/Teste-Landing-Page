<?php
	session_start();

	$id = $_SESSION["id"];
	$apiKey = "<api_key>";

	$url = "https://br1.api.riotgames.com/lol/league/v3/positions/by-summoner/".$id."?api_key=" .$apiKey;

	$json = file_get_contents($url);

	echo $json;
?>