<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="js/js_admin.js"></script>

	<script>
		$(document).ready(function(){

			document.getElementById("editnews").className += " active";
		  
		});
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
						$this->open('db/sqlite/sqlite-tools-win32-x86-3180000/ESports.db');
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
			
			<form action='update_news.php' method='POST'>	
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
                    <label for="news_heading">Image URL</label>
                    <input type="text" class="form-control" rows="1" id="image_url" name="image_url">
                </div>
               
                <div class="form-group">
                    <label for="content">Description*</label>
                    <textarea class="form-control" rows="8" id="content" name="content"> </textarea>
                </div>
			  
				<input type="submit" name='submit' class="btn btn-warning main_action_button" value='Publish'>		
			</form>
			
			  <script>
  var ImageValue = document.getElementById("fileToUpload").value;
  	var logo_url = "media/news_events/" + ImageValue.replace(/.*[\/\\]/, '');
	document.getElementById("image_url").value = logo_url;
  //alert(logo_url);
  
  </script>
			
		</div>
 
</main>

   
    <?php include 'includes/footer.php';?>
    
</body>
</html>				