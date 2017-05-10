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
	else
	{
		if (array_key_exists('news_id', $_GET)){
			
            // get id of news item to delete
			$news_id = intval($_GET['news_id']);

			if ($news_id != null) {
				$queryString =  ("DELETE FROM NEWS_ITEMS WHERE NEWS_ID=:news_id");
				$statement = $esports_db->prepare($queryString);
				$statement->bindValue(':news_id', $news_id);

				$statement->execute();
			}
			else {
				$array = array("status"=>"error","description"=>"news_id parameter value is null");
				echo_response($array);	
			}
		}
		else {
			$array = array("status"=>"error","description"=>"news_id parameter is missing");
			echo_response($array);			
		}
	}

	function echo_response($array){
		$json = json_encode($array);
		header("content-type: application/json");
		echo $json;
		die;
	
	}
?>