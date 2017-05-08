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
	
	$match_id = intval($_GET['match_id']);
	$match_list = $esports_db->query("SELECT * FROM MATCHES WHERE MATCH_ID=" .$match_id);	
	
	if ($match_list)
	{	
		while($match = $match_list->fetchArray(SQLITE3_ASSOC))
		{
			$match_id = $match['MATCH_ID'];
			$game = $match['GAME'];
			$team1 = $match['RIT_TEAM_ID'];
			$team2 = $match['OPPONENT'];
			$score = $match['SCORE'];
			$date = $match['DATE'];
			$video = $match['VIDEO_URL'];
			$game_logo = $match['GAME_LOGO_URL'];
		
		$matches = array('match_id' => $match_id, 'game' => $game, 'team1' => $team1, 
						'team2' => $team2, 'score' => $score, 
						'date' => $date, 'game_logo' => $game_logo,
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
