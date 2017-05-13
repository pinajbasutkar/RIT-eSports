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
		$(document).ready(function(){

			document.getElementById("addmatch").className += " active";
			
		});
		
	//function below puts the location of the image in the text field	
		
	function uploadOnChange(e) {
    var filename = e.value;var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex +1);

		filename = "../media/match_logo/" + filename;
    }
	
    document.getElementById('textimage').value = filename;
}

//Function below to pull up the Date picker

 $( function() {
    $( "#datepicker" ).datepicker();
  } );
		
		console.log(datepicker);
		
	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

        <div id="AddMatch" class="tabcontent">
			<form action='insert_matches.php' method='POST' enctype="multipart/form-data">	  
				<div class="form-group">
					<label for="game">Game*</label>
					<input type="text" class="form-control" rows="1" name="add_game">
				</div>
				
				<div class="form-group">
					<label for="team1">RIT Team*</label>
					<input type="text" class="form-control" rows="1" name="add_team1" required>
				</div>
				
				<div class="form-group">
					<label for="team2">Opponent*</label>
					<input type="text" class="form-control" rows="1" name="add_team2" required>
				</div>

				<div class="form-group">
					<label for="score">Score</label>
					<input type="text" class="form-control" rows="1" name="add_score">
				</div>
				
				<div class="form-group">
					<label for="date">Date* (mm/dd/yyyy)</label>
					<input type="text" class="form-control" rows="1" name="add_date" id = "datepicker" required>
				</div>
				
				<div class="form-group">
					<label for="video">Video Link</label>
					<input type="text" class="form-control" rows="1" name="add_video">
				</div>
			    
			    <div class="form-group">
                    <label for ="upload">Upload Game Logo</label>
     				<input type="file" name="fileToUpload" id="fileToUpload" onChange="uploadOnChange(this)"> 
     				</div>
     				
     			<div class="form-group">
					<input type="hidden" class="form-control" rows="1" name="add_logo" id = "textimage" hidden>
				</div>
				
				<input type="submit" class="btn btn-warning main_action_button" value="Add Match">		
			</form>
			
			    </form>
        </div>		

</main>

  
    <?php include 'includes/footer.php';?>
    
</body>
</html>				