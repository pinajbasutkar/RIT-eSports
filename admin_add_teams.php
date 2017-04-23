<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="js/js_admin.js"></script>

	<script>
		"use strict"
		
		var URL = "update-team-data.php";
		
		$(document).ready(function(){

			document.getElementById("addteam").className += " active";
		  
				var name = $.trim($('#team_name').val());
				var game = $.trim($('#game').val());
				var logo_url = $.trim($('#logo_url').val());
				
				var urlString =  URL + "?name=" + name + "&game=" + game + "&logo_url=" + logo_url;

				console.log("url loaded = " + urlString);
					
				$.ajax({
					url: urlString,
					success: function(data){
						window.location.href ="admin_edit_teams.php";
					},
					error: function(jqxhr,status,error){
						console.warn(jqxhr.responseText);
						console.log("status=" + status + "; error=" + error);
					}
				});

		});

	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

		<form>
			<div class="form-group">
				<label for="team_name">Team Name</label>
				<input class="form-control" id="team_name" tabindex="1" name="team_name" type="text" />
			</div>
			
			<div class="form-group">
				<label for="game">Game</label>
				<input class="form-control" id="game" tabindex="1" name="team_name" type="text" />
			</div>

			<div class="form-group">
				<label for="logo_url">Logo URL</label>
				<input class="form-control" id="logo_url" tabindex="1" name="team_name" type="text" />
			</div>
			
		</form>
    
</main>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				