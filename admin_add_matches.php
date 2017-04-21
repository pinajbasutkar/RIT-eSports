<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="js/js_admin.js"></script>

	<script>
		$(document).ready(function(){

			document.getElementById("addmatch").className += " active";
		  
		});
	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

        <div id="AddMatch" class="tabcontent">
			<form>	  
				<div class="form-group">
					<label for="team1">Team 1</label>
					<text class="form-control" rows="1" id="team1"></text>
				</div>
				
				<div class="form-group">
					<label for="team2">Team 2</label>
					<text class="form-control" rows="1" id="team2"></text>
				</div>

				<div class="form-group">
					<label for="score">Score</label>
					<text class="form-control" rows="1" id="score"></text>
				</div>
				
				<div class="form-group">
					<label for="time">Time</label>
					<text class="form-control" rows="1" id="time"></text>
				</div>
				
				<div class="form-group">
					<label for="video">Video Link</label>
					<text class="form-control" rows="1" id="video"></text>
				</div>
			  
				<button type="button" class="btn btn-warning main_action_button">Publish</button>		
			</form>
        </div>		

</main>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				