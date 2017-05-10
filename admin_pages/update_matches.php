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
		
		$match_id = $_POST["match_id"];
		$game = $_POST["game"];
		$team1 = $_POST["team1"];
		$team2 = $_POST["team2"];
		$score = $_POST["score"];
		$date = $_POST["date"];
		$video = $_POST["video"];
		$game_logo = $_POST["game_logo"];
		
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

		$insert_row = $esports_db->exec("UPDATE MATCHES SET GAME='$game', RIT_TEAM_ID='$team1', 
		OPPONENT='$team2', SCORE='$score', DATE='$date', VIDEO_URL='$video', GAME_LOGO_URL='$game_logo' WHERE MATCH_ID='$match_id'");
				
		header('Location: admin_edit_matches.php');

?>