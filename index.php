<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/rogue6_project1_styles.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery.smooth-scroll.min.js"></script>
  <script src="js/main.js"></script>
</head>
<body>
	<?php
	    include 'includes/navmenu.html';
	    
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
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. 
            Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis 
            sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. 
            Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per 
            conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim 
            lacinia nunc. 
        </p>
        <p>
            Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. 
            Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, 
            iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. 
            Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque 
            volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, 
            per inceptos himenaeos. 
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
		
	</section> 

    <hr id="footer_line">	
	
	<?php
	    include 'includes/footer.html';
	?>
</body>
</html>
