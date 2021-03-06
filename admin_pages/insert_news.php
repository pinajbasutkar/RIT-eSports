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


		$headline = filter_var($_POST["add_headline"], FILTER_SANITIZE_SPECIAL_CHARS);
		$author = filter_var($_POST["add_author"], FILTER_SANITIZE_SPECIAL_CHARS);
		$date = filter_var($_POST["add_date"], FILTER_SANITIZE_SPECIAL_CHARS);
		$image = filter_var($_POST["add_image"], FILTER_SANITIZE_SPECIAL_CHARS);
		$content = filter_var($_POST["add_content"], FILTER_SANITIZE_SPECIAL_CHARS);

		$insert_row = $esports_db->exec("INSERT INTO NEWS_ITEMS (NEWS_ID, HEADLINE, DATE, AUTHOR, IMAGE_URL, CONTENT) 
					VALUES (NULL,'$headline','$date','$author','$image','$content')");	
		
		
//$target_dir = "uploads/";
$target_dir = "../media/news_events/";

$filename = basename($_FILES["fileToUpload"]["name"]);
//if (empty($_FILES['cover_image']['name']))

print_r($filename);
if(empty($filename)){
	
$filename = "gaming_background.jpg";
	
} 

//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $filename;
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

		header('Location: admin_add_news.php');

?>