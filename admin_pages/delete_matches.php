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
	else
	{
		if (array_key_exists('match_id', $_GET)){
			
            // get id of match to delete
			$match_id = intval($_GET['match_id']);

			if ($match_id != null) {
				$queryString =  ("DELETE FROM MATCHES WHERE MATCH_ID=:match_id");
				$statement = $esports_db->prepare($queryString);
				$statement->bindValue(':match_id', $match_id);

				$statement->execute();
			}
			else {
				$array = array("status"=>"error","description"=>"match_id parameter value is null");
				echo_response($array);	
			}
		}
		else {
			$array = array("status"=>"error","description"=>"match_id parameter is missing");
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