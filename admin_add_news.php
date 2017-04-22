<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="js/js_admin.js"></script>

	<script>
		$(document).ready(function(){

			document.getElementById("addnews").className += " active";
		  
		});
	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

        <div id="AddNews" class="tabcontent">
            <form>	  
                <div class="form-group">
                    <label for="news_heading">Headline</label>
                    <text class="form-control" rows="1"></text>
                </div>

                <div class="form-group">
                    <label for="published_on">Date (mm/dd/yy)</label>
                    <text class="form-control" rows="1"></text>
                </div>
				
				<div class="form-group">
                    <label for="author">Author</label>
                    <text class="form-control" rows="1"></text>
                </div>
                
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <text class="form-control" rows="1"></text>
                </div>
                
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea class="form-control" rows="8"></textarea>
                </div>

                <button type="button" class="btn btn-warning main_action_button">Publish</button>

            </form>
        </div>   
    
</main>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				