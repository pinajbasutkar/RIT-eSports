<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main>

<div class="tab_admin">
  <button class="tablinks" onclick="change(event, 'AddNews')" id="defaultOpen">Add News</button>
  <button class="tablinks" onclick="change(event, 'EditNews')">Edit News</button>
  <button class="tablinks" onclick="change(event, 'AddTeam')">Add Team</button>
  <button class="tablinks" onclick="change(event, 'EditTeam')">Edit Team</button>
  <button class="tablinks" onclick="change(event, 'AddMatch')">Add Match</button>
  <button class="tablinks" onclick="change(event, 'EditMatch')">Edit Match</button>

</div>

<br>

<div id="AddNews" class="tabcontent">
		    <h2 class="page_title">ADD NEWS</h2>
			<form>	  
				<div class="form-group">
					<label for="news_heading">News Heading</label>
					<text class="form-control" rows="1" id="newsheading"></text>
				</div>
				
				<div class="form-group">
					<label for="published_on">Published On</label>
					<text class="form-control" rows="1" id="published_on"></text>
				</div>

				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" rows="8" id="description"></textarea>
				</div>
			  
				<button type="button" class="btn btn-warning main_action_button">Publish</button>
			</div>			
			</form>
</div>   
    

		<div id="EditNews" class="tabcontent">
		    <h2 class="page_title">EDIT NEWS</h2>
			<form>	  
				<div class="form-group">
					<label for="news_heading">News Heading</label>
					<text class="form-control" rows="1" id="newsheading"></text>
				</div>
				
				<div class="form-group">
					<label for="published_on">Published On</label>
					<text class="form-control" rows="1" id="published_on"></text>
				</div>

				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" rows="8" id="description"></textarea>
				</div>
			  
				<button type="button" class="btn btn-warning main_action_button">Publish</button>
			</div>			
			</form>
		</div>
        
		
        <div id="AddTeam" class="tabcontent">
		    <h2 class="page_title">ADD TEAM</h2>
			<form>	  
				<div class="form-group">
					<label for="team_name">Team Name</label>
					<text class="form-control" rows="1" id="team_name"></text>
				</div>
				
				<div class="form-group">
					<label for="team_captain">Team Captain</label>
					<text class="form-control" rows="1" id="team_captain"></text>
				</div>

				<div class="form-group">
					<label for="player_name">Player Name</label>
					<text class="form-control" rows="1" id="player_name"></text>
				</div>
				
				<div class="form-group">
					<label for="player_image">Player Image</label>
					<text class="form-control" rows="1" id="player_image"></text>
				</div>
			  
				<button type="button" class="btn btn-warning main_action_button">Publish</button>
			</div>			
			</form>
    </div>		
    
			
        <div id="EditTeam" class="tabcontent">
		    <h2 class="page_title">EDIT TEAM</h2>
			<form>	  
				<div class="form-group">
					<label for="team_name">Team Name</label>
					<text class="form-control" rows="1" id="team_name"></text>
				</div>
				
				<div class="form-group">
					<label for="team_captain">Team Captain</label>
					<text class="form-control" rows="1" id="team_captain"></text>
				</div>

				<div class="form-group">
					<label for="player_name">Player Name</label>
					<text class="form-control" rows="1" id="player_name"></text>
				</div>
			  
			   <div class="form-group">
					<label for="player_name">Player Image</label>
					<text class="form-control" rows="1" id="player_name"></text>
				</div>
				
				<button type="button" class="btn btn-warning main_action_button">Publish</button>
			</div>			
			</form>
    </div>	
    
    

        <div id="AddMatch" class="tabcontent">
		    <h2 class="page_title">ADD MATCH</h2>
			<form>	  
				<div class="form-group">
					<label for="team1">Team 1</label>
					<text class="form-control" rows="1" id="team1"></text>
				</div>
				
				<div class="form-group">
					<label for="team2">Team 2</label>
					<text class="form-control" rows="1" id="team2"></text>
				</div>

				<div class="form-group">
					<label for="score">Score</label>
					<text class="form-control" rows="1" id="score"></text>
				</div>
				
				<div class="form-group">
					<label for="time">Time</label>
					<text class="form-control" rows="1" id="time"></text>
				</div>
				
				<div class="form-group">
					<label for="video">Video Link</label>
					<text class="form-control" rows="1" id="video"></text>
				</div>
			  
				<button type="button" class="btn btn-warning main_action_button">Publish</button>
			</div>			
			</form>
    </div>		
    
    
		
		
     <div id="EditMatch" class="tabcontent">
		    <h2 class="page_title">EDIT MATCH</h2>
			<form>	  
				<div class="form-group">
					<label for="team1">Team 1</label>
					<text class="form-control" rows="1" id="team1"></text>
				</div>
				
				<div class="form-group">
					<label for="team2">Team 2</label>
					<text class="form-control" rows="1" id="team2"></text>
				</div>

				<div class="form-group">
					<label for="score">Score</label>
					<text class="form-control" rows="1" id="score"></text>
				</div>
				
				<div class="form-group">
					<label for="time">Time</label>
					<text class="form-control" rows="1" id="time"></text>
				</div>
				
				<div class="form-group">
					<label for="video">Video Link</label>
					<text class="form-control" rows="1" id="video"></text>
				</div>
				<button type="button" class="btn btn-warning main_action_button">Publish</button>
			</div>			
			</form>
    </div>	
</main>

<br><br><br>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				