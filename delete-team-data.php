<?php
// delete-team-data.php?id=<id>

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
			// get id of team to delete
			$team_id = $_GET['team_id'];

			if ($team_id != null) {
				$queryString =  ("DELETE FROM TEAMS WHERE TEAM_ID=:team_id");
				$statement = $esports_db->prepare($queryString);
				$statement->bindValue(':team_id', $team_id);

				$statement->execute();
				
				// also delete any players on the team
				$queryString =  ("DELETE FROM PLAYERS WHERE TEAM_ID=:team_id");
				$statement = $esports_db->prepare($queryString);
				$statement->bindValue(':team_id', $team_id);

				$statement->execute();				
			}
			else {
				$array = array("status"=>"error","description"=>"id parameter value is null");
				echo_response($array);	
			}
		}
		else if (array_key_exists('player_id', $_GET)){
			// get id of player to delete
			$player_id = $_GET['player_id'];

			if ($player_id != null) {
				$queryString =  ("DELETE FROM PLAYERS WHERE PLAYER_ID=:player_id");
				$statement = $esports_db->prepare($queryString);
				$statement->bindValue(':player_id', $player_id);

				$statement->execute();
			}
			else {
				$array = array("status"=>"error","description"=>"id parameter value is null");
				echo_response($array);	
			}
		}
		else {
			$array = array("status"=>"error","description"=>"both team_id and player_id parameters are missing");
			echo_response($array);			
		}
	}

	function echo_response($array){
		$json = json_encode($array);
		header("content-type: application/json");
		echo $json;
		die;
	
	}
?>