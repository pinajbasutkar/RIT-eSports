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


		$headline = $_POST["add_headline"];
		$author = $_POST["add_author"];
		$date = $_POST["add_date"];
		$image = $_POST["add_image"];
		$content = filter_var($_POST["add_content"], FILTER_SANITIZE_SPECIAL_CHARS);

		$insert_row = $esports_db->exec("INSERT INTO NEWS_ITEMS (NEWS_ID, HEADLINE, DATE, AUTHOR, IMAGE_URL, CONTENT) 
					VALUES (NULL,'$headline','$date','$author','$image','$content')");	
		
// 		if($insert_row){
// 			echo "<script>alert('Information entered successfully!')</script>"; 
// 		}
// 		else{
// 			echo "<script>alert('Try again')</script>"; 
// 		}
		
		header('Location: admin_add_news.php');

?>