<!DOCTYPE html>
<html lang="en">
<head>
    <title>RIT eSports Team Page</title>
    <?php include 'includes/head.php';?>
</head>
<body>
    <main>
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
			
			$team_id = intval($_GET['team_id']);	
			$team_result = $esports_db->query("SELECT * FROM TEAMS WHERE TEAM_ID = " . $team_id);	
            $team_name = $team_result->fetchArray(SQLITE3_ASSOC)['TEAM_NAME'];	
            $captains = $esports_db->query("SELECT * FROM PLAYERS WHERE TEAM_ID = " . $team_id . " AND RANK = 1");	
            $managers = $esports_db->query("SELECT * FROM PLAYERS WHERE TEAM_ID = " . $team_id . " AND RANK = 2");			
			$regular_players = $esports_db->query("SELECT * FROM PLAYERS WHERE TEAM_ID = " . $team_id . " AND RANK = 0");
			
			echo "<figure>";
			echo "<img id='team_logo' class='img-circle img-responsive center-all' src='media/esports_assets/tigerhead_small.png' alt='Link to " . $team_name . " Team_page'>";
            echo "<h2>";
			echo "<figcaption id='single_team_name' class='figure-caption team_name center-all'>" . $team_name . "</figcaption>";
             echo "</h2>";
			echo "</figure>";	
        
        //<p class="subtitle fancy"><span>A fancy subtitle</span></p>

			echo '<h3 class="subtitle category_header"><span>Captain</span></h3>';		
		    echo '<div class="container-fluid">';
			
			while($captain = $captains->fetchArray(SQLITE3_ASSOC))
			{
				echo '<div class="row">';
				echo '<div class="col-sm-4 col-md-4">';
				echo '<figure>';
				$name = $captain['USER_NAME'];
				$image_url = $captain['IMAGE_URL'];
				echo "<img class='img-circle img-responsive player_image' src='$image_url' alt='Picture of $name' title='Picture of $name'>";
				echo '</figure>';
				echo '</div>';
				echo '<div class="col-sm-8 col-md-8">';
                echo '<h4>';
                echo $captain['USER_NAME'].' ('.$captain['REAL_NAME'].') ';
                echo '</h4>';
				echo '<p class="player_bio">';
				echo $captain['BIO'];
				echo '</p></div></div>';
			}
			
			echo '<h3 class="category_header">Manager</h3>';
			
			while($manager = $managers->fetchArray(SQLITE3_ASSOC))
			{
				echo '<div class="row">';
				echo '<div class="col-sm-4 col-md-4">';
				echo '<figure>';
				$name = $manager['USER_NAME'];
                $real_name = $manager['REAL_NAME'];
				$image_url = $manager['IMAGE_URL'];
				echo "<img class='img-circle img-responsive player_image' src='$image_url' alt='Picture of $name' title='Picture of $name'>";
				echo '</figure>';
				echo '</div>';
				echo '<div class="col-sm-8 col-md-8">';
                echo '<h4>';
                echo $manager['USER_NAME'].' ('.$manager['REAL_NAME'].') ';
                echo '</h4>';
				echo '<p class="player_bio">';
				echo $manager['BIO'];
				echo '</p></div></div>';
			}

			echo '<h3 class="category_header">Roster</h3>';
			
			while($player = $regular_players->fetchArray(SQLITE3_ASSOC))
			{
				echo '<div class="row">';
				echo '<div class="col-sm-4 col-md-4">';
				echo '<figure>';
				$name = $player['USER_NAME'];
				$image_url = $player['IMAGE_URL'];
				echo "<img class='img-circle img-responsive player_image' src='$image_url' alt='Picture of $name' title='Picture of $name'>";				
				echo '</figure>';
				echo '</div>';
				echo '<div class="col-sm-8 col-md-8">';
                echo '<h4>';
                echo $player['USER_NAME'].' ('.$player['REAL_NAME'].') ';
                echo '</h4>';
				echo '<p class="player_bio">';
				echo $player['BIO'];
				echo '</p></div></div>';
			}
			
			echo "</div>";
		?>	
	</main>
    
	

    <?php include 'includes/footer.php'; ?>	
</body>
</html>