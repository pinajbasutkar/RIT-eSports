<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="js/js_admin.js"></script>
    <script src="js/jquery.form.js"></script> 
	
	
	<script>
		$(document).ready(function(){

			document.getElementById("addnews").className += " active";
		  
		   $(".upload-image").click(function(){
            	$(".form-horizontal").ajaxForm({target: '.preview'}).submit();
				alert("Image Loaded");
				return false;
            });
		  
		});
		
		
		function uploadOnChange(e) {
    var filename = e.value;var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex +1);
		filename = "media/news_events/" + filename;
    }
	
	alert(filename);
    document.getElementById('textimage').value = filename;
}
		
		
		
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
			<form action="upload_images_news.php" enctype="multipart/form-data" class="form-horizontal" method="post">
      <label for ="email">File to Upload:</label>
	  <div class="preview"></div>
     <input type="file" name="fileToUpload" id="fileToUpload" onChange="uploadOnChange(this)"> 
   <button class="btn btn-primary upload-image">Upload</button>
  </form> 
            
        </div>   
    
</main>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				