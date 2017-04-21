<?php
        
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
	
	$match_id = $_GET['match_id'];
	$match_list = $esports_db->query("SELECT * FROM MATCHES WHERE MATCH_ID=" .$match_id);	
	
	if ($match_list)
	{	
		while($match = $match_list->fetchArray(SQLITE3_ASSOC))
		{
			$team1 = $match['RIT_TEAM_ID'];
			$team2 = $match['OPPONENT'];
			$score = $match['SCORE'];
			$date = $match['DATE'];
			$video = $match['VIDEO_URL'];
		
		$matches = array(  'team1' => $team1, 'team2' => $team2, 
						'score' => $score, 'date' => $date, 
						'video' => $video);
		}
	}
	
	else
	{
		echo "No rows returned!";
	}
	

	header('content-type:application/json');
	
	echo json_encode($matches);
	

?>  
