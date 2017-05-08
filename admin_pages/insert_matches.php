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


		$game = $_POST["add_game"];
		$team1 = $_POST["add_team1"];
		$team2 = $_POST["add_team2"];
		$score = $_POST["add_score"];
		$date = $_POST["add_date"];
		$video = $_POST["add_video"];
		$logo = $_POST["add_logo"];
		
		$insert_row = $esports_db->exec("INSERT INTO MATCHES (MATCH_ID, GAME, RIT_TEAM_ID, OPPONENT, SCORE, DATE, VIDEO_URL, GAME_LOGO_URL) 
					VALUES (NULL,'$game','$team1','$team2','$score','$date','$video','$logo')");	
		
// 		if($insert_row){
// 			echo "<script>alert('Information entered successfully!')</script>"; 
// 		}
// 		else{
// 			echo "<script>alert('Try again')</script>"; 
// 		}
		
		header('Location: admin_add_matches.php');

?>