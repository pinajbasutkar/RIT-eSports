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
		if (array_key_exists('id', $_GET)){
			// get id of team to edit
			$id = $_GET['id'];
			
			$name = $_GET['name'];
			$game = $_GET['game'];
			$logoURL = $_GET['logo_url'];

			// ?? TODO: Not working yet!
			$queryString =  ("UPDATE TEAMS SET TEAM_NAME=:name, GAME=:game, LOGO_URL=:logoUrl WHERE TEAM_ID=:id");
			$statement = $esports_db->prepare($queryString);
			$statement->bindValue(':id', $id);
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
		else // no team_id passed, so add team
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