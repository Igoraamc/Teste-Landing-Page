var LeagueOfLegends = {
	settings: {
		"async": true,
	    "method": "GET",
	    "timeout" :3000
	},
	settingsPost: {
		"async": true,
	    "method": "POST",
	    "timeout" :3000
	},
	getSummonerId: function(obj, callback) {
		LeagueOfLegends.settingsPost.url = "Server-Side/takeSummonerId.php";
		LeagueOfLegends.settingsPost.data = obj;

		$.ajax(LeagueOfLegends.settingsPost).done(function(response) {
			callback(response);
		});
	},
	getAllChampions: function(callback) {
		LeagueOfLegends.settings.url = "Server-Side/takeAllChampions.php";

		$.ajax(LeagueOfLegends.settings).done(function(response) {
			callback(response);
		});
	},
	getAllChampionsMasterysBySummoner: function(callback) {
		LeagueOfLegends.settings.url = "Server-Side/takeAllSummonerMasterys.php";
		LeagueOfLegends.settings.async = false;

		$.ajax(LeagueOfLegends.settings).done(function(response) {

			console.log(response);

			callback(response);
		});

		LeagueOfLegends.settings.async = true;
	},
	getLastGamesBySummoner: function(callback) {
		LeagueOfLegends.settings.url = "Server-Side/takeLastGames.php";

		$.ajax(LeagueOfLegends.settings).done(function(response) {
			callback(response);
		});
	},
	getSummonerRanking: function(callback) {
		LeagueOfLegends.settings.url = "Server-Side/takeRankingInfo.php";

		$.ajax(LeagueOfLegends.settings).done(function(response) {
			callback(response);
		});
	}
};