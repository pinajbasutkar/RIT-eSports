<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>

	<script>
		"use strict";

		function addPlayerTableRow(i) {
			console.log("addPlayerTableRow called with value " + i);
			document.getElementById("player_table");
			// TODO: add a row
		}
		
		function populateTeamData(team_id) {
			var url = "get-team-data.php?team_id=" + team_id;
			
			var xhr = new XMLHttpRequest();
			xhr.onload = function() {
				teamDataRetrieved(xhr);
			};
			xhr.open("GET", url, true);
			xhr.send(null);
		}


		function teamDataRetrieved(xhr) {
			var team = JSON.parse(xhr.responseText);

			document.getElementById("edit_team_name").value = team.name;
			document.getElementById("edit_logo_url").value = team.logo_url;
			for (var i = 0; i < team.players.length; i++)
			{
				addPlayerTableRow(i);
				
				var player_number = "edit_player_" + i;
				
				document.getElementById(player_number + "_name").value = team.players[i].name;
				document.getElementById(player_number + "_image_url").value = team.players[i].image_url;
/* TODO: use checkboxes for captain and manager
 				if (team.players[i].rank == 1)
					document.getElementById(player_number + "_captain").value = "checked";
				if (team.players[i].rank == 2)
					document.getElementById(player_number + "_manager").value = "checked";
*/
				document.getElementById(player_number + "_rank").value = team.players[i].rank;
				document.getElementById(player_number + "_bio").value = team.players[i].bio;
			}
		}
						
		// make rows clickable
		jQuery(document).ready(function($) {
			var team_id = 1;							// TODO: get team ID from PHP < ?php echo json_encode($team_id); ? >;
			$(".clickable-row").click(function() {
				populateTeamData(team_id);
//				window.location = $(this).data("href"); // TODO: (moves too far down)
			});
		});
	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main>
    
        <h2 class="page_title">ADMIN FORMS</h2>

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

            </form>
        </div>   
    

		<div id="EditNews" class="tabcontent">
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
			</form>
		</div>
        
		
        <div id="AddTeam" class="tabcontent">
			<form>	  
				<div class="form-group">
					<label for="team_name">Team Name</label>
					<text class="form-control" rows="1" id="team_name"></text>
				</div>
				
				<button type="button" class="btn btn-warning main_action_button">Publish</button>	
			</form>
        </div>		
    
			
        <div id="EditTeam" class="tabcontent">
			<div id ="TeamList">
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
					$team_list_result = $esports_db->query("SELECT * FROM TEAMS");	
				
					$index = 0;

					echo "<h3>Select a team to edit:</h3>";
					echo "<table class='table'>";
						echo "<tbody>";
						while($team = $team_list_result->fetchArray(SQLITE3_ASSOC))
						{
							echo "<tr class='clickable-row admin_table_row' data-href='#team_form'>";
								$team_id = $team['TEAM_ID'];
								$team_name = $team['TEAM_NAME'];

								$team_captain_result = $esports_db->query("SELECT USER_NAME FROM PLAYERS WHERE TEAM_ID=$team_id AND RANK=1");
								
								echo "<td>";
									echo "<img class='img-responsive admin_team_logo' src='media/esports_assets/tigerhead_nobg_mini.png' alt='team logo' title='team logo'>";
								echo "</td>";
								
								echo "<td class='admin_team_text'>";							
									echo "$team_name";
								echo "</td>";

								echo "<td class='admin_team_text'>";
									$row = $team_captain_result->fetchArray(SQLITE3_ASSOC);
									echo "Captain: {$row['USER_NAME']}";
								echo "</td>";								
							echo "</tr>";							
							
							$index++;
						}
						echo "</tbody>";
					echo "</table>";
				?>
			</div>
			
			<form id="edit_team_form">	  
				<div class="form-group">
					<label for="edit_team_name">Team Name</label>
					<input type="text" class="form-control admin_input_text" rows="1" id="edit_team_name" />
				</div>
				
				<div class="form-group">
					<label for="edit_logo_url">Team Logo URL</label>
					<input type="text" class="form-control admin_input_text" rows="1" id="edit_logo_url" />
				</div>

				<div class="player_list">
					<h3 class="admin_input_text">Players</h3>
					<div class="form-group">
						<table class='table'>
							<thead>
								<tr>
									<th>Name</th>
									<th>Image URL</th>
									<th>Rank</th>
									<th>Bio</th>
								</tr>
							</thead>
							<tbody id="player_table">
								<!-- ?? build existing rows dynamically -->
								<tr>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_0_name" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_0_image_url" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_0_rank" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_0_bio" />
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_1_name" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_1_image_url" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_1_rank" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_1_bio" />
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_2_name" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_2_image_url" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_2_rank" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_2_bio" />
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_3_name" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_3_image_url" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_3_rank" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_3_bio" />
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_4_name" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_4_image_url" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_4_rank" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_4_bio" />
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_5_name" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_5_image_url" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_5_rank" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_5_bio" />
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_6_name" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_6_image_url" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_6_rank" />
									</td>
									<td>
										<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_6_bio" />
									</td>
								</tr>
								<tr>
									<td>
										<button type="button" class="btn btn-warning add_player_button" id="add_player" onclick="addPlayerTableRow()">Add Player</button> <!-- TODO: pass current highest row number + 1 -->
									</td>
								</tr>
							</tbody>
						</table>
					</div>	
				</div>
				
				<button type="button" class="btn btn-warning admin_page_button" id="update_team">Update Team</button> <!-- write function to store data in DB -->
			</form>
        </div>	

        <div id="AddMatch" class="tabcontent">
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
			</form>
        </div>		
    

        <div id="EditMatch" class="tabcontent">
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
            </form>
        </div>	
</main>

<br><br><br>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				