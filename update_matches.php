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

		$esports_db->exec("ATTACH DATABASE 'ESports.db' AS 'esports'");	   
		
		$match_id = $_POST["match_id"];
		$game = $_POST["game"];
		$team1 = $_POST["team1"];
		$team2 = $_POST["team2"];
		$score = $_POST["score"];
		$date = $_POST["date"];
		$video = $_POST["video"];
		$game_logo = $_POST["game_logo"];

		$insert_row = $esports_db->exec("UPDATE MATCHES SET GAME='$game', RIT_TEAM_ID='$team1', 
		OPPONENT='$team2', SCORE='$score', DATE='$date', VIDEO_URL='$video', GAME_LOGO_URL='$game_logo' WHERE MATCH_ID='$match_id'");
				
		header('Location: admin_edit_matches.php');

?>