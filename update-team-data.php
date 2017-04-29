<?php
// update-team-data.php?id=<id>&name=<name>&game=<game>&logo_url=<logo_url>

	class ESportsDB extends SQLite3
	{
		function __construct()
		{
			$this->open('db/sqlite/sqlite-tools-win32-x86-3180000/ESports.db');
		}
	}
	
	$esports_db = new ESportsDB();
	
	if(!$esports_db)
	{
		echo $esports_db->lastErrorMsg();
	}
	else
	{
		if (array_key_exists('team_id', $_GET)){
			// get id of team to edit
			$team_id = $_GET['team_id'];
			
			$name = $_GET['name'];
			$game = $_GET['game'];
			$logoURL = $_GET['logo_url'];

			$queryString =  ("UPDATE TEAMS SET TEAM_NAME=:name, GAME=:game, LOGO_URL=:logo_url WHERE TEAM_ID=:team_id");
			$statement = $esports_db->prepare($queryString);
			$statement->bindValue(':team_id', $team_id);
			$statement->bindValue(':name', $name);
			$statement->bindValue(':game', $game);
			$statement->bindValue(':logo_url', $logoURL);

			if ($statement && $statement->execute()){
				$array = array("status"=>"success","name"=>"$name","game"=>"$game","logoURL"=>"$logoURL");
				echo_response($array);
			} else {
				$array = array("status"=>"error","description"=>"update failed - problem with \$statement");
				echo_response($array);
			}
		}
		// if player_id is passed
		elseif(array_key_exists('player_id', $_GET)){
			// get id of player to edit
			$player_id = $_GET['player_id'];

			$user_name = $_GET['user_name'];
			$player_name = $_GET['player_name'];
			$image_url = $_GET['image_url'];
			$player_rank = $_GET['player_rank'];
			$player_bio = $_GET['player_bio'];

			$queryString =  ("UPDATE PLAYERS SET USER_NAME=:user_name, REAL_NAME=:player_name, IMAGE_URL=:image_url, RANK=:player_rank, BIO=:player_bio WHERE PLAYER_ID=:player_id");
			$statement = $esports_db->prepare($queryString);

			$statement->bindValue(':user_name', $user_name);
			$statement->bindValue(':player_name', $player_name);
			$statement->bindValue(':image_url', $image_url);
			$statement->bindValue(':player_rank', $player_rank);
			$statement->bindValue(':player_bio', $player_bio);	
			$statement->bindValue(':player_id', $player_id);
			
			if ($statement && $statement->execute()){
				$array = array("status"=>"success","user_name"=>"$user_name");
				echo_response($array);
			} else {
				$array = array("status"=>"error","description"=>"update failed - problem with \$statement");
				echo_response($array);
			}			
		}
		else // no parameters, so add team
		{
			$name = $_GET['name'];
			$game = $_GET['game'];
			$logoURL = $_GET['logo_url'];
			
			$queryString =  ("INSERT INTO TEAMS (TEAM_ID, TEAM_NAME, GAME, LOGO_URL) VALUES (NULL, :name, :game, :logo_url)");
			$statement = $esports_db->prepare($queryString);
			$statement->bindValue(':name', $name);
			$statement->bindValue(':game', $game);
			$statement->bindValue(':logo_url', $logoURL);
			if($statement && $statement->execute()){
				$lastID = $esports_db->lastInsertRowID();
				if ($lastID){
					$array = array("status"=>"success","description"=>"lastInsertId=" . $lastID);
					echo_response($array);
				} else {
					$array = array("status"=>"error","description"=>"insert failed");
					echo_response($array);
				}
			} else {
				$array = array("status"=>"error","description"=>"insert failed - problem with \$statement");
				echo_response($array);
			}
		}	
	}

	function echo_response($array){
		$json = json_encode($array);
		header("content-type: application/json");
		echo $json;
		die;
	
	}
?>