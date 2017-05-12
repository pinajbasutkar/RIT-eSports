<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="../js/js_admin.js"></script>
    <script src="../js/jquery.form.js"></script> 

	<script>
		"use strict"
		
		var URL = "update-team-data.php";
		
		$(document).ready(function(){
			
			document.getElementById("addteam").className += " active";
		  
			document.querySelector('#add_team').onclick = function(event) {
				var myFormData = new FormData();
				myFormData.append('fileToUpload', fileToUpload.files[0]);
				
				var name = encodeURIComponent($.trim($('#team_name').val()));
				var game = encodeURIComponent($.trim($('#game').val()));
				var logo_url = encodeURIComponent($.trim($('#logo_url').val()));

				var urlString =  URL + "?name=" + name + "&game=" + game + "&logo_url=" + logo_url;

				console.log("url loaded = " + urlString);
					
				$.ajax({
					url: urlString,
					type: 'POST',
  					processData: false, // important
  					contentType: false,
  					dataType : 'json',
  					data: myFormData,
					success: function(data){
						window.location.href ="admin_edit_teams.php";
					},
					error: function(jqxhr,status,error){
						console.warn(jqxhr.responseText);
						console.log("status=" + status + "; error=" + error);
					}
				});

			}; // add_team - onclick
		});

		function uploadOnChange(e) {
			var filename = e.value;var lastIndex = filename.lastIndexOf("\\");
			if (lastIndex >= 0) {
				filename = filename.substring(lastIndex +1);
				filename = "media/team_player_images/" + filename;
			}
			
			document.getElementById('logo_url').value = filename;
		} 

	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

		<form enctype="multipart/form-data">
			<div class="form-group">
				<label for="team_name">Team Name</label>
				<input type="text" class="form-control admin_input_text" rows="1" id="team_name" name="team_name" />
			</div>
							
			<div class="form-group">
				<label for="game">Game</label>
				<input type="text" class="form-control admin_input_text" rows="1" id="game" name="game" />
			</div>
			
			<div class="form-group">
				<input type="hidden" class="form-control admin_input_text" rows="1" name="logo_url" id="logo_url"/>
				<label for ="fileToUpload">Team Logo Image File</label>
				<input type="file" name="fileToUpload" id="fileToUpload" onChange="uploadOnChange(this)"> 	
			</div>
			
			<button type="button" id="add_team" class="btn btn-warning admin_page_button">Add Team</button>	

		</form>	
		
</main>

   
    <?php include 'includes/footer.php';?>
    
</body>
</html>				