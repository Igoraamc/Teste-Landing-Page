<?php
	session_start();

	$_SESSION["loged"] = false;

	if(isset($_POST["summonerName"])) {
		$sumName = $_POST["summonerName"];
		$sumName = str_replace(' ', '',$sumName);
		$apiKey = "<api_key>";

		$url = "https://br1.api.riotgames.com/lol/summoner/v3/summoners/by-name/" .$sumName. "?api_key=" .$apiKey;
		$json = file_get_contents($url);

		$new_json = json_decode($json);
		$id = $new_json->id;
		$name = $new_json->name;
		$icon = $new_json->profileIconId;
		$accId = $new_json->accountId;

		$_SESSION["id"] = $id;
		$_SESSION["name"] = $name;
		$_SESSION["iconId"] = $icon;
		$_SESSION["accId"] = $accId;
		$_SESSION["loged"] = true;

		echo $json;
	}else {
		echo '{
				"errorMessage": "Nome não inserido.",
			 	"returnCode" : 700}';
	}
?>