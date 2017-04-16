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
	
	$news_id = $_GET['news_id'];
	$news_list = $esports_db->query("SELECT * FROM NEWS_ITEMS WHERE NEWS_ID=" .$news_id);	
	
	if ($news_list)
	{	
		$headline = $news_list->fetchArray(SQLITE3_ASSOC)['HEADLINE'];
		$author = $news_list->fetchArray(SQLITE3_ASSOC)['AUTHOR'];
		$date_published = $news_list->fetchArray(SQLITE3_ASSOC)['DATE'];		
		$image_url = $news_list->fetchArray(SQLITE3_ASSOC)['IMAGE_URL'];	
		$description = $news_list->fetchArray(SQLITE3_ASSOC)['DESCRIPTION'];
		
		$news = array(  headline => $headline, author => $author, 
						date_published => $date_published,
						image_url => $image_url, descrip => $description);
		
	}
	
	else
	{
		echo "No rows returned!";
	}
	

	header('content-type:application/json');
	
	echo json_encode($news);
	

?>  
