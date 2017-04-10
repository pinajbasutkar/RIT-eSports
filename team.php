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
			
			$team_id = $_GET['team_id'];	
			$team_result = $esports_db->query("SELECT * FROM TEAMS WHERE TEAM_ID = " . $team_id);	
            $team_name = $team_result->fetchArray(SQLITE3_ASSOC)['TEAM_NAME'];	
            $captains = $esports_db->query("SELECT * FROM PLAYERS WHERE TEAM_ID = " . $team_id . " AND IS_CAPTAIN = 1");			
			$non_captains = $esports_db->query("SELECT * FROM PLAYERS WHERE TEAM_ID = " . $team_id . " AND IS_CAPTAIN != 1");
			
			/*
			echo "<figure>";
			echo "<img class=\"img-circle img-responsive center-all\" src=\"media/esports_assets/tigerhead_small.png\" alt=\"Link to " . $team_name . " Team_page\">";
			echo "<figcaption id=\"single_team_name\" class=\"figure-caption team_name\">" . $team_name . "</figcaption>";
			echo "</figure>";
			*/

			while($captain = $captains->fetchArray(SQLITE3_ASSOC))
			{
				echo "<br>CAPTAIN PLAYER_ID: " . $captain['PLAYER_ID'];
				echo "<br>REAL_NAME: " . $captain['REAL_NAME'];
				echo "<br>USER_NAME: " . $captain['USER_NAME'];
				echo "<br>TEAM_ID: " . $captain['TEAM_ID'];
				echo "<br>IS_CAPTAIN: " . $captain['IS_CAPTAIN'];
				echo "<br>BIO: " . $captain['BIO'] . "<br>";
			}
			
			while($player = $non_captains->fetchArray(SQLITE3_ASSOC))
			{
				echo "<br>PLAYER_ID: " . $player['PLAYER_ID'];
				echo "<br>REAL_NAME: " . $player['REAL_NAME'];
				echo "<br>USER_NAME: " . $player['USER_NAME'];
				echo "<br>TEAM_ID: " . $player['TEAM_ID'];
				echo "<br>IS_CAPTAIN: " . $player['IS_CAPTAIN'];
				echo "<br>BIO: " . $player['BIO'] . "<br>";
			}
		?>
			
		<p class="category_header">Captain</p>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive" src="media/rogue6_members/pinaj_mini.jpg" alt="Picture of Pinaj" title="Picture of Pinaj">
					</figure>
				</div>
				<div class="col-sm-8 col-md-8">
					<p class="player_bio">
						Pinaj Basutkar<br>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus orci vel consequat consequat. 
						Phasellus sodales interdum auctor. Proin lacinia lacus fringilla odio viverra dictum a et lacus. Duis at 
						orci a dolor tincidunt facilisis non et eros.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
						accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi 
						architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit 
						aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive" src="media/rogue6_members/andy_mini.png" alt="Picture of Andy" title="Picture of Andy">
					</figure>
				</div>
				<div class="col-sm-8 col-md-8">
					<p class="player_bio">
						Andy Fagan<br>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus orci vel consequat consequat. 
						Phasellus sodales interdum auctor. Proin lacinia lacus fringilla odio viverra dictum a et lacus. Duis at 
						orci a dolor tincidunt facilisis non et eros.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
						accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi 
						architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit 
						aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
			</div>			
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive" src="media/rogue6_members/nikita_mini.jpg" alt="Picture of Nikita" title="Picture of Nikita">
					</figure>
				</div>
				<div class="col-sm-8 col-md-8">
					<p class="player_bio">
						Nikita Tribhuvan<br>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus orci vel consequat consequat. 
						Phasellus sodales interdum auctor. Proin lacinia lacus fringilla odio viverra dictum a et lacus. Duis at 
						orci a dolor tincidunt facilisis non et eros.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
						accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi 
						architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit 
						aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive" src="media/rogue6_members/margaret_mini.png" alt="Picture of Margaret" title="Picture of Margaret">
					</figure>
				</div>
				<div class="col-sm-8 col-md-8">
					<p class="player_bio">
						Margaret Ricotta<br>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus orci vel consequat consequat. 
						Phasellus sodales interdum auctor. Proin lacinia lacus fringilla odio viverra dictum a et lacus. Duis at 
						orci a dolor tincidunt facilisis non et eros.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
						accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi 
						architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit 
						aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive" src="media/rogue6_members/chris_mini.png" alt="Picture of Chris" title="Picture of Chris">
					</figure>
				</div>
				<div class="col-sm-8 col-md-8">
					<p class="player_bio">
						Chris Branch<br>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus orci vel consequat consequat. 
						Phasellus sodales interdum auctor. Proin lacinia lacus fringilla odio viverra dictum a et lacus. Duis at 
						orci a dolor tincidunt facilisis non et eros.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
						accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi 
						architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit 
						aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive" src="media/rogue6_members/bruce_mini.jpg" alt="Picture of Bruce" title="Picture of Bruce">
					</figure>
				</div>
				<div class="col-sm-8 col-md-8">
					<p class="player_bio">
						Bruce Morton<br>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus orci vel consequat consequat. 
						Phasellus sodales interdum auctor. Proin lacinia lacus fringilla odio viverra dictum a et lacus. Duis at 
						orci a dolor tincidunt facilisis non et eros.  Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
						accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi 
						architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit 
						aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
					</p>
				</div>
			</div>            			
		</div>	
	</main>
    
	<hr id="footer_line">

    <?php include 'includes/footer.php'; ?>	
</body>
</html>