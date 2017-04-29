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
			// get id of team to edit
			$team_id = $_GET['team_id'];

			if ($team_id != null) {
				$queryString =  ("DELETE FROM TEAMS WHERE TEAM_ID=:team_id");
				$statement = $esports_db->prepare($queryString);
				$statement->bindValue(':team_id', $team_id);

				$statement->execute();
			}
			else {
				$array = array("status"=>"error","description"=>"id parameter value is null");
				echo_response($array);	
			}
		}
		else {
			$array = array("status"=>"error","description"=>"id parameter is missing");
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