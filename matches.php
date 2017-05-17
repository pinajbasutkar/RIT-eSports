<?php

    //check if url param provided, default to current if not
    if(array_key_exists('type',$_GET)){
    
        $matchType = $_GET['type'];
        
    }else{
        
        $matchType = 'current';
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Matches Page</title>
  <?php include 'includes/head.php';?>
</head>
<body>

    <?php include 'includes/navmenu.php';?>
    
	<main>
    
		<h2 class="page_title">MATCHES</h2>
        
        <div class="matches-container">

        <div class="tab_matches">
        
            <a href="matches.php?type=past">
                <button class="tablinks <?php if($matchType === 'past'){ echo 'active'; } ?>">Past</button>
            </a>
            
            <a href="matches.php?type=current">
                <button class="tablinks <?php if($matchType === 'current'){ echo 'active'; } ?>">Current</button>
            </a>
            
            <a href="matches.php?type=future">
                <button class="tablinks <?php if($matchType === 'future'){ echo 'active'; } ?>">Future</button>
            </a>
            
        </div>
        
        
        <?php if($matchType === 'past'): ?>
               
            <div id="Past" class="tabcontent">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Game</th>
                            <th>Match</th>
                            <th>Results</th>
                            <th>Date</th>
                            <th>Watch</th>
                        </tr>
                    </thead>
                    <tbody>
					
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
						$todays_date = date('m/d/y');
						$today = date_create($todays_date);
						
						$match_list = $esports_db->query("SELECT * FROM MATCHES ORDER BY DATE DESC");

                        while($match = $match_list->fetchArray(SQLITE3_ASSOC))	
                        {				
                            $match_date = date_create($match['DATE']);	
							
						    if($match_date < $today)
							{
								$game = $match['GAME'];
								$game_logo_url = $match['GAME_LOGO_URL'];
								$rit_team = $match['RIT_TEAM_ID'];
								$opponent = $match['OPPONENT'];
								$score = $match['SCORE'];
								$video_link = $match['VIDEO_URL'];
								echo "<tr><td>";
								echo "<img src='$game_logo_url' alt='$game Logo' title='$game Logo'></td>";
								echo "<td id='match-cell'>$rit_team vs. $opponent</td>";
								echo "<td>$score</td>";
								$match_date_string = date_format($match_date, 'Y-m-d');
								echo "<td>$match_date_string</td>";
								echo "<td><button type='button' class='btn btn-default btn-lg watch_video_button'>Video</button><button type='button' class='btn btn-default btn-lg watch_video_icon'><i class='fa fa-video-camera'></i></button></td></tr>";
							}
						}

                        echo "</tbody></table></div>";						
					?>
    

        <?php elseif($matchType === 'future'): ?>
            
            <div id="Future" class="tabcontent">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Game</th>
                            <th>Match</th>
                            <th>Results</th>
                            <th>Date</th>
                            <th>Watch</th>
                        </tr>
                    </thead>
                    <tbody>
					
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
						$todays_date = date('m/d/y');
						$today = date_create($todays_date);
						
						$match_list = $esports_db->query("SELECT * FROM MATCHES ORDER BY DATE");

                        while($match = $match_list->fetchArray(SQLITE3_ASSOC))	
                        {				
                            $match_date = date_create($match['DATE']);	
							
						    if($match_date > $today)
							{
								$game = $match['GAME'];
								$game_logo_url = $match['GAME_LOGO_URL'];
								$rit_team = $match['RIT_TEAM_ID'];
								$opponent = $match['OPPONENT'];
								$score = $match['SCORE'];
								echo "<tr><td>";
								echo "<img src='$game_logo_url' alt='$game Logo' title='$game Logo'></td>";
								echo "<td>$rit_team vs. $opponent</td>";
								echo "<td>$score</td>";
								$match_date_string = date_format($match_date, 'Y-m-d');
								echo "<td>$match_date_string</td>";
								echo "<td><button type='button' class='btn btn-default btn-lg watch_video_button' disabled>Video</button><button disabled type='button' class='btn btn-default btn-lg watch_video_icon'><i class='fa fa-video-camera '></i></button></td></tr>";
							}
						}

                        echo "</tbody></table></div>";
                    ?>
            
        <?php else: ?>
            <div id="Current" class="tabcontent">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Game</th>
                            <th>Match</th>
                            <th>Results</th>
                            <th>Date</th>
                            <th>Watch</th>
                        </tr>
                    </thead>
                    <tbody>
					
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
						$todays_date = date('m/d/y');
						$today = date_create($todays_date);
						
						$match_list = $esports_db->query("SELECT * FROM MATCHES");

                        while($match = $match_list->fetchArray(SQLITE3_ASSOC))	
                        {				
                            $match_date = date_create($match['DATE']);	
							
						    if($match_date == $today)
							{
								$game = $match['GAME'];
								$game_logo_url = $match['GAME_LOGO_URL'];
								$rit_team = $match['RIT_TEAM_ID'];
								$opponent = $match['OPPONENT'];
								$score = $match['SCORE'];
								echo "<tr><td>";
								echo "<img src='$game_logo_url' alt='$game Logo' title='$game Logo'></td>";
								echo "<td>$rit_team vs. $opponent</td>";
								echo "<td>$score</td>";
								$match_date_string = date_format($match_date, 'Y-m-d');
								echo "<td>$match_date_string</td>";
								echo "<td><button type='button' class='btn btn-default btn-lg watch_video_button'>Video</button><button type='button' class='btn btn-default btn-lg watch_video_icon'><i class='fa fa-video-camera'></i></button></td></tr>";
							}
						}

                        echo "</tbody></table></div>";
                    ?>


        <?php endif; ?>
                 
</div>
    </main>
                      
    <?php include 'includes/footer.php';?>
    
</body>
</html>				