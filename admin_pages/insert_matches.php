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

		$esports_db->exec("ATTACH DATABASE 'ESports.db' AS 'esports'");	   


		$game = filter_var($_POST["add_game"], FILTER_SANITIZE_SPECIAL_CHARS);
		$team1 = filter_var($_POST["add_team1"], FILTER_SANITIZE_SPECIAL_CHARS);
		$team2 = filter_var($_POST["add_team2"], FILTER_SANITIZE_SPECIAL_CHARS);
		$score = filter_var($_POST["add_score"], FILTER_SANITIZE_SPECIAL_CHARS);
		$date = filter_var($_POST["add_date"], FILTER_SANITIZE_SPECIAL_CHARS);
		$video = filter_var($_POST["add_video"], FILTER_SANITIZE_SPECIAL_CHARS);
		$logo = filter_var($_POST["add_logo"], FILTER_SANITIZE_SPECIAL_CHARS);
		
				//$target_dir = "uploads/";
$target_dir = "../media/match_logo/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		chmod($target_file, 0755);
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
        echo "Sorry, there was an error uploading your file.";
    }
}

		$insert_row = $esports_db->exec("INSERT INTO MATCHES (MATCH_ID, GAME, RIT_TEAM_ID, OPPONENT, SCORE, DATE, VIDEO_URL, GAME_LOGO_URL) 
					VALUES (NULL,'$game','$team1','$team2','$score','$date','$video','$logo')");	
				
		header('Location: admin_add_matches.php');

?>