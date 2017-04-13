<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Teams Page</title>
  <?php include 'includes/head.php';?>
</head>
<body>
    <?php include 'includes/navmenu.php'; ?>
	
	<main>
		<div class="container-fluid">
			<h2 class="page_title">TEAMS</h2>
			
            <div class="team-list">			
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
					$team_list_result = $esports_db->query("SELECT * FROM TEAMS");	
					
					$index = 0;
					
					while($team = $team_list_result->fetchArray(SQLITE3_ASSOC))
					{
						if($index % 3 === 0)
						{
							echo '<div class="row">';
						}
						
						echo '<div class="col-sm-4 col-md-4">';
						echo "<figure>";
						$team_id = $team['TEAM_ID'];
						echo "<a href='team.php?team_id=$team_id'>";
						$team_name = $team['TEAM_NAME'];
						$link = "'Link to $team_name team page'";
						echo "<img class='img-circle img-responsive center-all' src='media/esports_assets/tigerhead_small.png' alt=$link title=$link>";
                        echo "<figcaption id='single_team_name' class='figure-caption text-center team_name'>$team_name</figcaption>";
                        echo "</a>";						
                        echo "</figure>";
						echo "</div>";

                        if($index > 0 && $index % 3 === 0)
						{
							echo "</div>";							
                        }							
						
						$index++;
					}			
				?>	
			</div>				
		</div>
	</main>
	
    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>