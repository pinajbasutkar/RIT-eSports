<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="../js/js_admin.js"></script>
	<script src="../js/jquery.form.js"></script> 
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>
		
		var DELETE_URL = "delete_matches.php";
		
		$(document).ready(function(){
			
			document.getElementById("editmatch").className += " active";
					  
		});
		
			//function below puts the location of the image in the text field	
		
			function uploadOnChange(e) {
    var filename = e.value;var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex +1);

		filename = "media/match_logo/" + filename;
    }
	
    document.getElementById('game_logo').value = filename;
}

		function onDeleteMatch(event) {
			var match_id = $.trim($('#match_id').val());
			var team1 = $.trim($('#team1').val());
			var team2 = $.trim($('#team2').val());
			
			var urlString =  DELETE_URL + "?match_id=" + match_id;

			console.log("url loaded = " + urlString);
			
			var confirmation = confirm("Are you sure you want to delete the '" + team1 + " vs. " + team2 + "' match?  This cannot be undone!");
			
			if (confirmation) {
				$.ajax({
					url: urlString,
					success: function(data){
						window.location.href ="admin_edit_matches.php";
					},
					error: function(jqxhr,status,error){
						console.warn(jqxhr.responseText);
						console.log("status=" + status + "; error=" + error);
					}
				});
			};
		}; // delete_match - onclick
		
		
		//Function below to pull up date picker
		
		 $( function() {
    $( "#date" ).datepicker();
  } );
		
		
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
						$this->open('../db/sqlite/sqlite-tools-win32-x86-3180000/ESports.db');
					}
				}
						
				$esports_db = new ESportsDB();
						
				if(!$esports_db)
				{
					echo $esports_db->lastErrorMsg();
				}			

				$esports_db->exec("ATTACH DATABASE 'ESports.db' AS 'esports'");	   
			
				
				$match_list = $esports_db->query("SELECT * FROM MATCHES ORDER BY DATE DESC");	
				
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
					echo "<img class='img-responsive admin_logo' src='../$game_logo' alt='news image' title='news image'>";
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
		
            <form action='update_matches.php' method='POST' enctype="multipart/form-data">		 
            	<div class="form-group">
                    <input type="hidden" class="form-control" rows="1" id="match_id" name="match_id">
                </div>
                
            	<div class="form-group">
                    <label for="game">Game*</label>
                    <input type="text" class="form-control" rows="1" id="game" name="game">
                </div>
                 
                <div class="form-group">
                    <label for="team1">RIT Team*</label>
                    <input type="text" class="form-control" rows="1" id="team1" name="team1">
                </div>

                <div class="form-group">
                    <label for="team2">Opponent*</label>
                    <input type="text" class="form-control" rows="1" id="team2" name="team2">
                </div>

                <div class="form-group">
                    <label for="score">Score</label>
                    <input type="text" class="form-control" rows="1" id="score" name="score">
                </div>

                <div class="form-group">
                    <label for="date">Date (mm/dd/yyyy)</label>
                    <input type="text" class="form-control" rows="1" id="date" name="date">
                </div>

                <div class="form-group">
                    <label for="video">Video Link</label>
                    <input type="text" class="form-control" rows="1" id="video" name="video">
                </div>
                
                <div class="form-group">
                    <label for ="upload">Upload Game Logo</label>
     				<input type="file" name="fileToUpload" id="fileToUpload" onChange="uploadOnChange(this)"> 
     			</div>
     				
                <div class="form-group">
                    <input type="hidden" class="form-control" rows="1" id="game_logo" name="game_logo" hidden>
                </div>
 
				<button type="button" class="btn btn-warning admin_page_button" id="delete_match">Delete Match</button>
				<script>document.querySelector('#delete_match').onclick = onDeleteMatch;</script>
				
                <input type="submit" name='submit' class="btn btn-warning admin_page_button" value='Update Match'>		
            </form>
			
	  </form>
		</div>	
</main>

  
    <?php include 'includes/footer.php';?>
    
</body>
</html>				