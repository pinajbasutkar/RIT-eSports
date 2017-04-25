<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Home Page</title>
  <?php include 'includes/head.php';?>
</head>
<body>
	
    <div id="main_home_image">
		<img class="img-responsive center-all" id="bg-gif" src="media/home-bg.gif"/>
		<img class="img-responsive center-all" id="bg-overlay" src="media/home-bg-overlay.png"/>
    </div>
	
    <main class="center-div">
        
        <h2 class="page_title">ABOUT</h2>	
        <p>
           RIT eSports is a student-run organization within the Rochester Institute of Technology, with the goal of facilitating the development and growth of gaming talent on campus. 
		   We are one of the fastest growing organizations at RIT, with over 70 players currently active in games such as League of Legends, Overwatch, Heroes of the Storm, 
		   Counter Strike, Starcraft, Rocket League, and Dota, with even more on the way soon. Win or lose, we are constantly striving for self-improvement, 
		   be it as players, students, or local citizens. We pride ourselves on teamwork, leadership, and determination, modeling ourselves after both professional eSport teams 
		   and traditional collegiate athletics. Due to our traditional inspiration and unique campus composition, we believe that in the next few years, RIT can become the #1 college 
		   in the world for competitive gaming.
        </p>  
            
	</main>

	<?php
	    include 'includes/navmenu.php';
	    
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
		$news_item_list = $esports_db->query("SELECT * FROM NEWS_ITEMS ORDER BY DATE DESC");
			
		echo "<section id='news_and_events' class='row container'>";
		echo "<div class='container center-all'>";
		echo "<h2 class='page_title'>NEWS AND EVENTS</h2>";          

				
                $rowCounter = 0;
                $newsItemCounter = 0;
                
                while($news_item = $news_item_list->fetchArray(SQLITE3_ASSOC))
				{
                    
                    $newsItemCounter++;
                
                    $image_url = $news_item['IMAGE_URL'];

                    if($rowCounter === 1){
                        echo '<div class="row center-div">';
                    }
                        
                    //thumbnail content
                    echo '<div class="col-md-6 col-lg-6 container">';			
                    echo '<div class="news-item">';
                    echo '<a data-fancybox data-src="#news-item-'.$newsItemCounter.'" href="javascript:;">';
                    echo "<img src='$image_url' alt='News Item Picture' title='News Item Picture' class='img-responsive center-div'>";
                    
                    $headline = $news_item['HEADLINE'];
                    
                        if(strlen($headline) > 75){
                            $headline  = trim(substr($headline, 0, 75)); 
                            $headline .= "...";
                        }
                    
                    echo "<h3 class='news-item-title'>$headline</h3></a>";
                    $author = $news_item['AUTHOR'];
                    $date = $news_item['DATE'];
                    echo "<p class='news-item-info'>by $author | $date</p>";
                    echo '<p class="news-item-text">';
                    $content = trim(substr($news_item['CONTENT'], 0, 200));
                    echo "$content...</p></div></div>";
                    
                    //full content
                    echo '<div class="news-item-full-container" style="display: none;" id="news-item-'.$newsItemCounter.'">';
                    echo '<div class="news-item-full">';
                    echo "<img src='$image_url' alt='News Item Picture' title='News Item Picture' class='img-responsive center-div'>";
                    $headline = $news_item['HEADLINE'];
                    echo "<h3 class='news-item-title'>$headline</h3>";
                    $author = $news_item['AUTHOR'];
                    $date = $news_item['DATE'];
                    echo "<p class='news-item-info'>by $author | $date</p>";
                    echo '<p class="">';
                    $content = $news_item['CONTENT'];
                    echo "$content</p></div></div>";
                    
                    
                    if($rowCounter === 1){
                        echo '</div>';
                        $rowCounter = 0; //reset counter
                    }else{
                        $rowCounter += 1; //increment counter
                    }
                    
				}
			
		echo '<div class="row center-all">';
		echo '<a href="[TO BE DETERMINED]" class="center-all">';
		echo '<button type="button" class="btn btn-warning btn-lg" id="load_more_button">Load More</button></a></div></div></section>';
    ?>
	
    <hr id="footer_line">	
	
	<?php
	    include 'includes/footer.php';
	?>
</body>
</html>
