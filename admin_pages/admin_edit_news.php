<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="../js/js_admin.js"></script>
	<script src="../js/jquery.form.js"></script> 

	<script>
	
		var DELETE_URL = "delete_news.php";
		
		$(document).ready(function(){
			

			document.getElementById("editnews").className += " active";
		  
		});
		
	function uploadOnChange(e) {
    var filename = e.value;var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex +1);
		filename = "../media/news_events/" + filename;
    }
	
    document.getElementById('image_url').value = filename;
}
	
		function onDeleteNewsItem(event) {
			var news_id = $.trim($('#news_id').val());
			var headline = $.trim($('#headline').val());
			
			var urlString =  DELETE_URL + "?news_id=" + news_id;

			console.log("url loaded = " + urlString);
			
			var confirmation = confirm("Are you sure you want to delete the news item '" + headline + "'?  This cannot be undone!");
			
			if (confirmation) {
				$.ajax({
					url: urlString,
					success: function(data){
						window.location.href ="admin_edit_news.php";
					},
					error: function(jqxhr,status,error){
						console.warn(jqxhr.responseText);
						console.log("status=" + status + "; error=" + error);
					}
				});
			};
		}; // delete_news_item - onclick
		
	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

		<div id="EditNews" class="tabcontent">
		<div id ="NewsList">
			
			Select a news item to edit:
			
		<?php			   
			class ESportsDB extends SQLite3
				{
					function __construct()
					{
						$this->open('../db/sqlite/sqlite-tools-win32-x86-3180000/ESports.db');
					}
				}
					
				$esports_db = new ESportsDB();
					
				if(!$esports_db)
				{
					echo $esports_db->lastErrorMsg();
				}
					
				$esports_db->exec("ATTACH DATABASE 'ESports.db' AS 'esports'");
				
				$news_list = $esports_db->query("SELECT * FROM NEWS_ITEMS");	
				
				$index = 0;

				echo "<table class='table'>";
				echo "<tbody>";
				while($news = $news_list->fetchArray(SQLITE3_ASSOC))
				{
					$news_id = $news['NEWS_ID'];
					$headline = $news['HEADLINE'];
					$date = $news['DATE'];
					$image = $news['IMAGE_URL'];
					
					echo "<tr class='clickable-row admin_table_row' id = '$news_id' onclick='populate_news(this.id)'>";
					
					echo "<td>";
					echo "<img class='img-responsive admin_logo' src='$image' alt='news image' title='news image'>";
					echo "</td>";
								
					echo "<td class='admin_team_text'>";							
					echo "$date";
					echo "</td>";
							
					echo "<td class='admin_team_text'>";							
					echo "$headline";
					echo "</td>";
	
					echo "</tr>";							
							
					$index++;
				}
				echo "</tbody>";
				echo "</table>";
		?>
		</div>	
			
			<form action='update_news.php' method='POST' enctype="multipart/form-data">	
				<div class="form-group">
                    <input type="hidden" class="form-control" rows="1" id="news_id" name="news_id">
                </div>
                  
				<div class="form-group">
                    <label for="news_heading">Headline*</label>
                    <input type="text" class="form-control" rows="1" id="headline" name="headline">
                </div>

                <div class="form-group">
                    <label for="published_on">Published On (mm/dd/yy)</label>
                    <input type="text" class="form-control" rows="1" id="date_published" name="date_published">
                </div>
				
				<div class="form-group">
                    <label for="news_heading">Author</label>
                    <input type="text" class="form-control" rows="1" id="author" name="author">
                </div>
                
                   <div class="form-group">
                    <label for ="upload">File to Upload:</label>
     				<input type="file" name="fileToUpload" id="fileToUpload" onChange="uploadOnChange(this)"> 
     				</div>
     			
                <div class="form-group">
                    <label for="news_heading">Image URL</label>
                    <input type="text" class="form-control" rows="1" id="image_url" name="image_url" hidden>
                </div>
               
                <div class="form-group">
                    <label for="content">Description*</label>
                    <textarea class="form-control" rows="8" id="content" name="content"> </textarea>
                </div>

				<button type="button" class="btn btn-warning admin_page_button" id="delete_news_item">Delete News Item</button>
				<script>document.querySelector('#delete_news_item').onclick = onDeleteNewsItem;</script>
				
				<input type="submit" name='submit' class="btn btn-warning admin_page_button" value='Update News Item'>
			</form>
				
          </form>
			
		</div>
 
</main>

    <?php include 'includes/footer.php';?>
    
</body>
</html>				