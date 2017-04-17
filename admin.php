<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="js/js_admin.js"></script>
	
	<script>
		"use strict";
		
		function addPlayerTableRow(team, i) {
			console.log("addPlayerTableRow called with team = " + team.id + "; player_id = " + i);

			var playerNum = "player" + i;
			
			var rank = "Player";
			if (team.players[i].rank == 1) rank = "Captain";
			else if (team.players[i].rank == 2) rank = "Manager";
				
			$(".player_table_body")
			.append(
				$("<tr class='clickable-row admin_table_row' id = '" + i + "' onclick='editPlayer(" + team + ",this.id)'>")	<!-- TODO: ?? cannot pass an object -->
				.append(
					$("<td>")
					.append(
						$("<img class='img-responsive admin_logo' src='" + team.players[i].image_url + "' alt='player image' title='player image'>")
					)
				)
				.append(
					$("</td>")
				)
				.append(
					$("<td>" + team.players[i].name + "</td>")
				)
				.append(
					$("<td>Rank: " + rank + "</td>")
				)
//	??				.append(
//	??					$("<td>" + team.players[i].bio + "</td>")
//	??				)
				.append(
					$("</tr>")
				)
			)
		}

		function editPlayer(team, player_id) {
			console.log("editPlayer called with team = " + team.id + "; player_id = " + player_id);

			$("edit_player_form").show();
			$("edit_player_name").value = team.players[player_id].name;
			$("edit_player_imagee").value = team.players[player_id].image_url;
			$("edit_player_rank").value = team.players[player_id].rank;
			$("edit_player_bio").value = team.players[player_id].bio;
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

			$(".player_list_content").remove();	// remove data appended by previous team click, if any
			
			$(".player_list")
			.append(
				$("<div class='player_list_content'>")
				.append(
					$("<h3 class='admin_input_text'>Players</h3>")
				)
				.append(
					$("<table class='table player_table'>")
					.append(
						$("<tbody class='player_table_body'>")
					)
				)
			);
		
			for (var i = 0; i < team.players.length; i++)
			{
				addPlayerTableRow(team,i);
			}

			$(".player_table")
			.append(
				$("<tr>")
				.append(
					$("<td>")
					.append(
						$("<button type='button' class='btn btn-warning add_player_button' id='add_player' onclick='addPlayerTableRow(" + team + "," + team.players.length + ")'>Add Player</button>") <!-- TODO: ?? cannot pass an object -->
					)
				)
				.append(
					$("</td>")
				)
				.append(
					$("</tr>")
				)
			)
			$(".player_table").append("</tbody>");
			$(".player_table").append("</table>");			
			$(".player_list").append("</div>");	
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
    
	<main class="content">
    
        <h2 class="page_title">ADMIN FORMS</h2>

        <div class="tab_admin">
          <button class="tablinks" onclick="change(event, 'AddNews')" id="defaultOpen">Add News</button>
          <button class="tablinks" onclick="change(event, 'EditNews')">Edit News</button>
          <button class="tablinks" onclick="change(event, 'AddTeam')">Add Team</button>
          <button class="tablinks" onclick="change(event, 'EditTeam')">Edit Team</button>
          <button class="tablinks" onclick="change(event, 'AddMatch')">Add Match</button>
          <button class="tablinks" onclick="change(event, 'EditMatch')">Edit Match</button>
        </div>

        <div id="AddNews" class="tabcontent">
            <form>	  
                <div class="form-group">
                    <label for="news_heading">Headline</label>
                    <text class="form-control" rows="1"></text>
                </div>

                <div class="form-group">
                    <label for="published_on">Date</label>
                    <text class="form-control" rows="1"></text>
                </div>
				
				<div class="form-group">
                    <label for="news_heading">Author</label>
                    <text class="form-control" rows="1"></text>
                </div>
                
                <div class="form-group">
                    <label for="news_heading">Image URL</label>
                    <text class="form-control" rows="1"></text>
                </div>
                
                <div class="form-group">
                    <label for="intro">Introduction</label>
                    <textarea class="form-control" rows="5"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea class="form-control" rows="8"></textarea>
                </div>

                <button type="button" class="btn btn-warning main_action_button">Publish</button>

            </form>
        </div>   
    

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
			
			<form>	  
				<div class="form-group">
                    <label for="news_heading">Headline</label>
                    <input type="text" class="form-control" rows="1" id="headline">
                </div>

                <div class="form-group">
                    <label for="published_on">Published On</label>
                    <input type="text" class="form-control" rows="1" id="date">
                </div>
				
				<div class="form-group">
                    <label for="news_heading">Author</label>
                    <input type="text" class="form-control" rows="1" id="author">
                </div>
                
                <div class="form-group">
                    <label for="news_heading">Image URL</label>
                    <input type="text" class="form-control" rows="1" id="image_url">
                </div>
                
                <div class="form-group">
                    <label for="intro">Introduction</label>
                    <textarea class="form-control" rows="5" id="intro"> </textarea>
                </div>
                
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea class="form-control" rows="8" id="content"> </textarea>
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

				<div class="form-group">
				</div>
				
				<button type="button" class="btn btn-warning main_action_button">Publish</button>	
			</form>
        </div>		
    
			
        <div id="EditTeam" class="tabcontent">
			<div id ="TeamList">
				<?php			   
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
					<!-- dynamically generated -->
				</div>
				
				<button type="button" class="btn btn-warning admin_page_button" id="update_team">Update Team</button> <!-- write function to store data in DB -->
			</form>

			<form class="edit_player_form">
				<div class="form-group">
					<label for="edit_player_name">Player Name</label>
					<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_name" />
				</div>
				
				<div class="form-group">
					<label for="edit_player_image">Player Image</label>
					<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_image" />
				</div>
				
				<div class="form-group">
					<label for="edit_player_rank">Player Rank</label>
					<input type="text" class="form-control admin_input_text" rows="1" id="edit_player_rank" />
				</div>

				<div class="form-group">
					<label for="edit_player_bio">Player Bio</label>
					<input type="text" class="form-control admin_input_text" rows="10" id="edit_player_bio" />
				</div>

				<button type="button" class="btn btn-warning main_action_button" onclick='addPlayerTableRow()'>Save Player</button>	 <!-- TODO: pass team and player ID -->		
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

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				