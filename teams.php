<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Teams Page</title>
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
			else
			{
				echo "Database opened successfully\n\n";			
			}
			
			$esports_db->exec("ATTACH DATABASE 'ESports.db' AS 'esports'");
			$team_list_result = $esports_db->query("SELECT * FROM TEAMS");	
			
			while($team = $team_list_result->fetchArray(SQLITE3_ASSOC))
			{
				echo "<br>TEAM_ID: " . $team['TEAM_ID'];
				echo "<br>TEAM_NAME: " . $team['TEAM_NAME'];
				echo "<br>GAME: " . $team['GAME'] . "<br>";
			}			
        ?>	
		<div class="container-fluid">
			<h2 class="page_title">TEAMS</h2>
			
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<figure>
                        <a href="team.php?team_id=1">
							<img class="img-circle img-responsive center-all" src="media/esports_assets/tigerhead_small.png" alt="Link to TBD Team Page" title="Link to TBD Team Page">
							<!--<figcaption id="single_team_name" class="figure-caption team_name">League of Legends One</figcaption> -->
							<figcaption id="single_team_name" class="figure-caption text-center team_name">Counter Strike</figcaption>
						</a>
					</figure>
				</div>
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive center-all" src="media/esports_assets/tigerhead_small.png" alt="Link to TBD Team Page" title="Link to TBD Team Page">
						<figcaption class="figure-caption text-center team_name">Team Name</figcaption>
					</figure>
				</div>
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive center-all" src="media/esports_assets/tigerhead_small.png" alt="Link to TBD Team Page" title="Link to TBD Team Page">
						<figcaption class="figure-caption text-center team_name">Team Name</figcaption>
					</figure>
				</div>			
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive center-all" src="media/esports_assets/tigerhead_small.png" alt="Link to TBD Team Page" title="Link to TBD Team Page">
						<figcaption class="figure-caption text-center team_name">Team Name</figcaption>					
					</figure>
				</div>
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive center-all" src="media/esports_assets/tigerhead_small.png" alt="Link to TBD Team Page" title="Link to TBD Team Page">
						<figcaption class="figure-caption text-center team_name">Team Name</figcaption>					
					</figure>
				</div>
				<div class="col-sm-4 col-md-4">
					<figure>
						<img class="img-circle img-responsive center-all" src="media/esports_assets/tigerhead_small.png" alt="Link to TBD Team Page" title="Link to TBD Team Page">
						<figcaption class="figure-caption text-center team_name">Team Name</figcaption>
					</figure>
				</div>			
			</div>		
		</div>
	</main>
	
    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>