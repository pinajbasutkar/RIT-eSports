<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="js/js_admin.js"></script>
	<script src="js/jquery.form.js"></script> 

	<script>
		$(document).ready(function(){
			
			document.getElementById("addmatch").className += " active";
			document.getElementById("editmatch").className += " active";
			
			  //function below loads the image but does not refresh the page
		   $(".upload-image").click(function(){
            	$(".form-horizontal").ajaxForm({target: '.preview'}).submit();
				alert("Image Loaded");
				return false;
            });
		  
		});
		
			//function below puts the location of the image in the text field	
		
			function uploadOnChange(e) {
    var filename = e.value;var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex +1);
		filename = "media/news_events/" + filename;
    }
	
    document.getElementById('game_logo').value = filename;
}
		
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
		
            <form action='update_matches.php' method='POST'>		 
            	<div class="form-group">
                    <input type="hidden" class="form-control" rows="1" id="match_id" name="match_id">
                </div>
                
            	<div class="form-group">
                    <label for="game">Game</label>
                    <input type="text" class="form-control" rows="1" id="game" name="game">
                </div>
                 
                <div class="form-group">
                    <label for="team1">RIT Team*</label>
                    <input type="text" class="form-control" rows="1" id="team1" name="team1">
                </div>

                <div class="form-group">
                    <label for="team2">Opponent Team*</label>
                    <input type="text" class="form-control" rows="1" id="team2" name="team2">
                </div>

                <div class="form-group">
                    <label for="score">Score</label>
                    <input type="text" class="form-control" rows="1" id="score" name="score">
                </div>

                <div class="form-group">
                    <label for="date">Date (mm/dd/yy)</label>
                    <input type="text" class="form-control" rows="1" id="date" name="date">
                </div>

                <div class="form-group">
                    <label for="video">Video Link</label>
                    <input type="text" class="form-control" rows="1" id="video" name="video">
                </div>
                
                <div class="form-group">
                    <label for="game_logo">Game Logo</label>
                    <input type="text" class="form-control" rows="1" id="game_logo" name="game_logo">
                </div>
                
                <input type="submit" name='submit' class="btn btn-warning main_action_button" value='Publish'>		
            </form>
			
	  </form>
		<form action="upload_images_news.php" enctype="multipart/form-data" class="form-horizontal" method="post">
      <label for ="email">File to Upload:</label>
	  <div class="preview"></div>
     <input type="file" name="fileToUpload" id="fileToUpload" onChange="uploadOnChange(this)"> 
   <button class="btn btn-primary upload-image">Upload</button>
  </form> 
            
        </div>	
</main>

  
    <?php include 'includes/footer.php';?>
    
</body>
</html>				