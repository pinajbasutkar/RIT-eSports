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

			document.getElementById("addnews").className += " active";
		  

		});
		
		
		function uploadOnChange(e) {
    var filename = e.value;var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex +1);
		filename = "media/news_events/" + filename;
    }
	
	//alert(filename);
    document.getElementById('textimage').value = filename;
}

//Function below to pull up the Date picker

 $( function() {
    $( "#datepicker" ).datepicker();
  } );		
		
		
	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

        <div id="AddNews" class="tabcontent">
		

	    
            <form action='insert_news.php' method='POST' enctype="multipart/form-data">	  
                <div class="form-group">
                    <label for="news_heading">Headline*</label>
                    <input type="text" class="form-control" rows="1" name='add_headline' required>
                </div>

                <div class="form-group">
                    <label for="published_on">Date (mm/dd/yyyy)</label>
                    <input type="text" class="form-control" rows="1" name='add_date' id = "datepicker">
                </div>
				
				<div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" rows="1" name='add_author'>
                </div>
                
                    <div class="form-group">
                    <label for ="upload">Upload News Image</label>
     				<input type="file" name="fileToUpload" id="fileToUpload" onChange="uploadOnChange(this)"> 
     				</div>
     			
     			<div class="form-group">
                    <input type="hidden" class="form-control" rows="1" name='add_image' id = "textimage">     				
                </div>
                
                <div class="form-group">
                    <label for="content1">Description*</label>
                    <textarea class="form-control" rows="8" name='add_content' required></textarea>
                </div>
                <div>
				   <!--  <input type="submit" name='edit_about' id="edit_about_button" class="btn btn-warning" value="Edit About"> -->
                    <input type="submit" name='submit' class="btn btn-warning main_action_button" value='Add News'>
                </div>
            </form>
			
            
        </div>   
    
</main>

    <?php include 'includes/footer.php';?>
    
</body>
</html>				