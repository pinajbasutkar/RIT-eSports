<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="js/js_admin.js"></script>

	<script>
		$(document).ready(function(){

			document.getElementById("editmatch").className += " active";
		  
		});
	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

        <div id="EditMatch" class="tabcontent">
        
        <div id ="MatchList">
			
			Select a match to edit:
			
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
			
				
				$match_list = $esports_db->query("SELECT * FROM MATCHES");	
				
				$index = 0;

				echo "<table class='table'>";
				echo "<tbody>";
				while($match = $match_list->fetchArray(SQLITE3_ASSOC))
				{
					$match_id = $match['MATCH_ID'];
					$team1 = $match['RIT_TEAM_ID'];
					$team2 = $match['OPPONENT'];
					$date = $match['DATE'];
					$game_logo = $match['GAME_LOGO_URL'];
					
					echo "<tr class='clickable-row admin_table_row' id = '$match_id' onclick='populate_matches(this.id)'>";
					
					echo "<td>";							
					echo "<img class='img-responsive admin_logo' src='$game_logo' alt='news image' title='news image'>";
					echo "</td>";
					
					echo "<td>";							
					echo "$date";
					echo "</td>";
					
					echo "<td>";							
					echo "$team1";
					echo "</td>";
								
					echo "<td>";							
					echo "vs";
					echo "</td>";
					
					echo "<td>";							
					echo "$team2";
					echo "</td>";
						
					echo "</tr>";							
							
					$index++;
				}
				echo "</tbody>";
				echo "</table>";
		?>
		</div>
		
            <form>	 
            	<div class="form-group">
                    <label for="game">Game</label>
                    <input type="text" class="form-control" rows="1" id="game">
                </div>
                 
                <div class="form-group">
                    <label for="team1">RIT Team</label>
                    <input type="text" class="form-control" rows="1" id="team1">
                </div>

                <div class="form-group">
                    <label for="team2">Opponent</label>
                    <input type="text" class="form-control" rows="1" id="team2">
                </div>

                <div class="form-group">
                    <label for="score">Score</label>
                    <input type="text" class="form-control" rows="1" id="score">
                </div>

                <div class="form-group">
                    <label for="date">Date (mm/dd/yy)</label>
                    <input type="text" class="form-control" rows="1" id="date">
                </div>

                <div class="form-group">
                    <label for="video">Video Link</label>
                    <input type="text" class="form-control" rows="1" id="video">
                </div>
                
                <div class="form-group">
                    <label for="game_logo">Game Logo</label>
                    <input type="text" class="form-control" rows="1" id="game_logo">
                </div>
                
                <button type="button" class="btn btn-warning main_action_button">Publish</button>		
            </form>
            
        </div>	
</main>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				