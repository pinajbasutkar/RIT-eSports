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
        
            <form action='insert_news.php' method='POST'>	  
                <div class="form-group">
                    <label for="news_heading">Headline*</label>
                    <input type="text" class="form-control" rows="1" name='add_headline' required>
                </div>

                <div class="form-group">
                    <label for="published_on">Date (mm/dd/yy)</label>
                    <input type="text" class="form-control" rows="1" name='add_date'>
                </div>
				
				<div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" rows="1" name='add_author'>
                </div>
                
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" class="form-control" rows="1" name='add_image' id = "textimage"'>
                </div>
                
                <div class="form-group">
                    <label for="content1">Description*</label>
                    <textarea class="form-control" rows="8" name='add_content' required></textarea>
                </div>

                <input type="submit" name='submit' class="btn btn-warning main_action_button" value='Publish'>

            </form>
			
			<script>
			
			 var ImageValue = document.getElementById("fileToUpload").value;
  	var logo_url = "media/news_events/" + ImageValue.replace(/.*[\/\\]/, '');
	document.getElementById("textimage").value = logo_url;
  //alert(logo_url);
			</script>
			 

  
  
            
        </div>   
    
</main>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				