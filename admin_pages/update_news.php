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
		
		$news_id = filter_var($_POST["news_id"], FILTER_SANITIZE_SPECIAL_CHARS);
		$headline = filter_var($_POST["headline"], FILTER_SANITIZE_SPECIAL_CHARS);
		$author = filter_var($_POST["author"], FILTER_SANITIZE_SPECIAL_CHARS);
		$date = filter_var($_POST["date_published"], FILTER_SANITIZE_SPECIAL_CHARS);
		$image = filter_var($_POST["image_url"], FILTER_SANITIZE_SPECIAL_CHARS);
		$content = filter_var($_POST["content"], FILTER_SANITIZE_SPECIAL_CHARS);
		
		
		//$target_dir = "uploads/";
$target_dir = "../media/news_events/";
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


		$insert_row = $esports_db->exec("UPDATE NEWS_ITEMS SET HEADLINE='$headline', DATE='$date', 
		AUTHOR='$author', IMAGE_URL='$image', CONTENT='$content' WHERE NEWS_ID='$news_id'");
			
		header('Location: admin_edit_news.php');

?>