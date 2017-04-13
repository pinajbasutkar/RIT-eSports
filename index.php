<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Home Page</title>
  <?php include 'includes/head.php';?>
</head>
<body>
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
	?>
	
    <div id="main_home_image">
    <img class="img-responsive center-all" id="bg-gif" src="media/home-bg.gif"/>
    <img class="img-responsive center-all" id="bg-overlay" src="media/home-bg-overlay.png"/>
</div>
	
    <main class="center-div">
        
        <h2 class="page_title">ABOUT</h2>	
        <p>
           RIT eSports is a student run organization within the Rochester Institute of Technology, with the goal of facilitating the development and growth of gaming talent on campus. 
		   We are one of the fastest growing organizations at RIT, with over 70 players currently active. Teams include games such as League of Legends, Overwatch, Heroes of the Storm, 
		   Counter Strike, Starcraft, Rocket League, and Dota, with even more on the way soon. Whether a team wins or loses, we are constantly striving for self-improvement, 
		   whether it be as players, students, or local citizens. We pride ourselves on teamwork, leadership, and determination, modeling ourselves after both professional eSport teams 
		   and traditional collegiate athletics programs. Due to our traditional inspiration, as well as our unique campus composition, we believe that RIT can become the #1 college 
		   in the world for competitive gaming within the next few years.
        </p>  
            
	</main>
		
	<section id="news_and_events"  class="row container">
		<div class="container center-all">
			<h2 class="page_title">NEWS AND EVENTS</h2>
            
            
            
            <div class="col-md-6 col-lg-6 container">
				<div class="news-item">
					<a href="media/news_events/gaming_background.jpg">
						<img src="media/news_events/gaming_background.jpg" alt="News Item Picture" title="News Item Picture" class="img-responsive center-div">	
                        <h3 class="news-item-title">Welcome to RIT eSports</h3>
					</a>
                    <p class="news-item-info">by John Cena | Feb 27, 2015</p>
                    <p class="news-item-text">
                        Welcome to esportsrit.com! This is the official website for RIT eSports, one of the fastest growing collegiate eSports...
                    </p>
				</div>
			</div>
            
			<div class="col-md-6 col-lg-6 container">
				<div class="news-item">
					<a href="media/news_events/gaming_background.jpg">
						<img src="media/news_events/gaming_background.jpg" alt="News Item Picture" title="News Item Picture" class="img-responsive center-div">	
                        <h3 class="news-item-title">Welcome to RIT eSports</h3>
					</a>
                    <p class="news-item-info">by John Cena | Feb 27, 2015</p>
                    <p class="news-item-text">
                        Welcome to esportsrit.com! This is the official website for RIT eSports, one of the fastest growing collegiate eSports...
                    </p>
				</div>
			</div>
            
			<div class="col-md-6 col-lg-6 container">
				<div class="news-item">
					<a href="media/news_events/gaming_background.jpg">
						<img src="media/news_events/gaming_background.jpg" alt="News Item Picture" title="News Item Picture" class="img-responsive center-div">	
                        <h3 class="news-item-title">Welcome to RIT eSports</h3>
					</a>
                    <p class="news-item-info">by John Cena | Feb 27, 2015</p>
                    <p class="news-item-text">
                        Welcome to esportsrit.com! This is the official website for RIT eSports, one of the fastest growing collegiate eSports...
                    </p>
				</div>
			</div>
            
			<div class="col-md-6 col-lg-6 container">
				<div class="news-item">
					<a href="media/news_events/gaming_background.jpg">
						<img src="media/news_events/gaming_background.jpg" alt="News Item Picture" title="News Item Picture" class="img-responsive center-div">	
                        <h3 class="news-item-title">Welcome to RIT eSports</h3>
					</a>
                    <p class="news-item-info">by John Cena | Feb 27, 2015</p>
                    <p class="news-item-text">
                        Welcome to esportsrit.com! This is the official website for RIT eSports, one of the fastest growing collegiate eSports...
                    </p>
				</div>
			</div>

		
            <div class="center-all">

                <a href="[TO BE DETERMINED]" class="center-all">
                    <button type="button" class="btn btn-warning btn-lg" id="load_more_button">Load More</button>
                </a> 

            </div>

        </div>
		
    </section> 

    <hr id="footer_line">	
	
	<?php
	    include 'includes/footer.php';
	?>
</body>
</html>
