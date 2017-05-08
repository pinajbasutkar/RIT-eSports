<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="../js/js_admin.js"></script>
	<script src="../js/jquery.form.js"></script> 

	<script>
		$(document).ready(function(){

			document.getElementById("addmatch").className += " active";
			
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
	
    document.getElementById('textimage').value = filename;
}
		
		
	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

        <div id="AddMatch" class="tabcontent">
			<form action='insert_matches.php' method='POST'>	  
				<div class="form-group">
					<label for="game">Game</label>
					<input type="text" class="form-control" rows="1" name="add_game">
				</div>
				
				<div class="form-group">
					<label for="team1">RIT Team*</label>
					<input type="text" class="form-control" rows="1" name="add_team1" required>
				</div>
				
				<div class="form-group">
					<label for="team2">Opponent Team*</label>
					<input type="text" class="form-control" rows="1" name="add_team2" required>
				</div>

				<div class="form-group">
					<label for="score">Score</label>
					<input type="text" class="form-control" rows="1" name="add_score">
				</div>
				
				<div class="form-group">
					<label for="date">Date* (mm/dd/yy)</label>
					<input type="text" class="form-control" rows="1" name="add_date" required>
				</div>
				
				<div class="form-group">
					<label for="video">Video Link</label>
					<input type="text" class="form-control" rows="1" name="add_video">
				</div>
			    
			    <div class="form-group">
					<label for="game_logo">Game Logo</label>
					<input type="text" class="form-control" rows="1" name="add_logo" id = "textimage">
				</div>
				
				<input type="submit" class="btn btn-warning main_action_button" value="Publish">		
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