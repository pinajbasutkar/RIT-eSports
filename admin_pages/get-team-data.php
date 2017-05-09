<?php
	class ESportsDB extends SQLite3
	{
		function __construct()
		{
			$this->open('../db/sqlite/sqlite-tools-win32-x86-3180000/ESports.db');
		}
	}
	
	$esports_db = new ESportsDB();
	
	if(!$esports_db)
	{
		echo $esports_db->lastErrorMsg();
	}
	
	$team_id = intval($_GET['team_id']);	
	$team_result = $esports_db->query("SELECT * FROM TEAMS WHERE TEAM_ID = " . $team_id);	
	
	if ($team_result)
	{
		$team = new stdClass();
		$team->id = $team_id;
		$team->name = $team_result->fetchArray(SQLITE3_ASSOC)['TEAM_NAME'];	
		$team->logo_url = $team_result->fetchArray(SQLITE3_ASSOC)['LOGO_URL'];	
		
		$players = $esports_db->query("SELECT * FROM PLAYERS WHERE TEAM_ID = " . $team_id);
		while($player_row = $players->fetchArray(SQLITE3_ASSOC))
		{
			$name = $player_row['USER_NAME'];
			$image_url = $player_row['IMAGE_URL'];
			$rank = $player_row['RANK'];
			$bio = $player_row['BIO'];

			$team->players[] = (object) array ('name' => $name,
											  'image_url' => $image_url,
											  'rank' => $rank,
											  'bio' => $bio
											  );
		}
		$encoded_team = json_encode($team);
	}
	else
	{
		echo "No rows returned!";
	}
	
	// Sends the correct HTTP header
	header('content-type:application/json');
	echo $encoded_team;
?>