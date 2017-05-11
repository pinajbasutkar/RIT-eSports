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
				var name = $.trim($('#team_name').val());
				var game = $.trim($('#game').val());
				var logo_url = $.trim($('#logo_url').val());
				//var logo_url2 = $.trim($('#fileToUpload').val());
				//console.log(logo_url2);
				//var logo_url = "media/team_player_images/" + logo_url2.replace(/.*[\/\\]/, '');
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

			}; // add_team - onclick
		});
		
	//populate the location of the url image
		
	function uploadOnChange(e) {
    var filename = e.value;var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex +1);
		filename = "../media/team_player_images/" + filename;
    }
	
    document.getElementById('logo_url').value = filename;
} // end function for uploadOnChange

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
				<label for="logo_url">Logo URL</label>
			<input type="text" class="form-control admin_input_text" rows="1" name="logo_url" id="logo_url"/>
			   <label for ="email">File to Upload:</label>
			<input type="file" name="fileToUpload" id="fileToUpload" onChange="uploadOnChange(this)"> 	
			
			<button type="button" id="add_team" class="btn btn-warning admin_page_button">Add Team</button>	

		</form>	
		
	<!--<form action="upload_images_teams.php" enctype="multipart/form-data" class="form-horizontal" method="post">
      <label for ="email">File to Upload:</label>
	  <div class="preview"></div>
     <input type="file" name="fileToUpload" id="fileToUpload" onChange="uploadOnChange(this)"> 
   <button class="btn btn-primary upload-image">Upload</button>
  </form> -->
		
    
</main>

   
    <?php include 'includes/footer.php';?>
    
</body>
</html>				