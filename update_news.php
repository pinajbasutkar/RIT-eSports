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
		
		$news_id = $_POST["news_id"];
		$headline = $_POST["headline"];
		$author = $_POST["author"];
		$date = $_POST["date_published"];
		$image = $_POST["image_url"];
		$content = filter_var($_POST["content"], FILTER_SANITIZE_SPECIAL_CHARS);

		$insert_row = $esports_db->exec("UPDATE NEWS_ITEMS SET HEADLINE='$headline', DATE='$date', 
		AUTHOR='$author', IMAGE_URL='$image', CONTENT='$content' WHERE NEWS_ID='$news_id'");
				
		header('Location: admin_edit_news.php');

?>