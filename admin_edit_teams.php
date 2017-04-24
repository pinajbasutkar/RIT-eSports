<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
	
	<script src="js/js_admin.js"></script>

	<script>
		"use strict"
		
		var UPDATE_URL = "update-team-data.php";
		var DELETE_URL = "delete-team-data.php";
		
		$(document).ready(function(){

			document.getElementById("editteam").className += " active";
		
		});

		$(function () {

			$(".table").on("click", "tr[data-url]", function () {
				window.location = $(this).data("url");
			});

		});
		
		function onUpdateTeam(event) {
			var name = $.trim($('#edit_team_name').val());
			var game = $.trim($('#edit_game').val());
			var logo_url = $.trim($('#edit_logo_url').val());
			var team_id = $.trim($('#team_id_hidden').val());
			
			var urlString =  UPDATE_URL + "?id=" + team_id + "&name=" + name + "&game=" + game + "&logo_url=" + logo_url;

			console.log("url loaded = " + urlString);
				
			$.ajax({
				url: urlString,
				success: function(data){
					console.log(data);
					window.location.href ="admin_edit_teams.php";
				},
				error: function(jqxhr,status,error){
					console.warn(jqxhr.responseText);
					console.log("status=" + status + "; error=" + error);
				}
			});

		}; // update_team - onclick		
		
		function onDeleteTeam(event) {
			var team_id = $.trim($('#team_id_hidden').val());
			var team_name = $.trim($('#edit_team_name').val());
			
			var urlString =  DELETE_URL + "?id=" + team_id;

			console.log("url loaded = " + urlString);
			
			var confirmation = confirm("Are you sure you want to delete '" + team_name + "'?  This cannot be undone!");
			
			if (confirmation) {
				$.ajax({
					url: urlString,
					success: function(data){
						window.location.href ="admin_edit_teams.php";
					},
					error: function(jqxhr,status,error){
						console.warn(jqxhr.responseText);
						console.log("status=" + status + "; error=" + error);
					}
				});
			};

		}; // delete_team - onclick
	</script>
	
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main class="content">
    
		<?php include 'includes/adminmenu.php';?>

        <div id="EditTeam" class="tabcontent">
		
			<?php
				// open database
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
					
				//if user is viewing specific player (i.e. admin_edit_teams.php?player_id=#)
				if(array_key_exists('player_id', $_GET)){
				
					// player ID has been passed in so load only this player's data from the database, based on the ID
					$player_id = intval($_GET['player_id']);					
					$player_result = $esports_db->query("SELECT * FROM PLAYERS WHERE PLAYER_ID=$player_id");
					$player = $player_result->fetchArray(SQLITE3_ASSOC);
					
					// display player's data in editable form on page
					
					echo "<form id='edit_player_form'>";
						echo "<div class='form-group'>";
							echo "<label for='edit_user_name'>User Name</label>";
							echo "<input type='text' class='form-control admin_input_text' rows='1' id='edit_user_name' value='$player[USER_NAME]' />";
						echo "</div>";
						
						echo "<div class='form-group'>";
							echo "<label for='edit_player_name'>Player Name</label>";
							echo "<input type='text' class='form-control admin_input_text' rows='1' id='edit_player_name' value='$player[REAL_NAME]' />";
						echo "</div>";
						
						echo "<div class='form-group'>";
							echo "<label for='edit_player_image'>Image URL</label>";
							echo "<input type='text' class='form-control admin_input_text' rows='1' id='edit_player_image' value='$player[IMAGE_URL]' />";
						echo "</div>";

						echo "<div class='form-group'>";
							echo "<label for='edit_player_rank'>Rank (1=Captain, 2=Manager, 0=Player</label>";
							echo "<input type='text' class='form-control admin_input_text' rows='1' id='edit_player_rank' value='$player[RANK]' />";
						echo "</div>";

						echo "<div class='form-group'>";
							echo "<label for='edit_player_bio'>Bio</label>";
							echo "<textarea class='form-control admin_input_text' rows='8' id='edit_player_bio'>$player[BIO]</textarea>";
						echo "</div>";

						echo "<button type='button' class='btn btn-warning main_action_button' onclick='addPlayerTableRow()'>Save Player</button>"; // TODO: pass team and player ID		
					echo "</form>";	
							
					// TODO: maybe display link back to team? back to all teams? breadcrumbs? etc.
				
				}
				
				//if user is viewing specific team (i.e. admin_edit_teams.php?team_id=#)
				elseif(array_key_exists('team_id', $_GET)){
				
					// team ID has been passed in, so load only this team's data from the database, based on the ID
					$team_id = intval($_GET['team_id']);					
					$team_result = $esports_db->query("SELECT * FROM TEAMS WHERE TEAM_ID=$team_id");
					$team = $team_result->fetchArray(SQLITE3_ASSOC);
					
					// display the team data in editable form on page, with clickable links to edit players
					// URLs to edit players are "admin_edit_teams.php?player_id=#"

					echo "<input type='hidden' id='team_id_hidden' value=$team_id />";
					echo "<form id='edit_team_form'>";	  
						echo "<div class='form-group'>";
							echo "<label for='edit_team_name'>Team Name</label>";
							echo "<input type='text' class='form-control admin_input_text' rows='1' id='edit_team_name' value='$team[TEAM_NAME]' />";
						echo "</div>";

						echo "<div class='form-group'>";
							echo "<label for='edit_game'>Game</label>";
							echo "<input type='text' class='form-control admin_input_text' rows='1' id='edit_game' value='$team[GAME]' />";
						echo "</div>";

						echo "<div class='form-group'>";
							echo "<label for='edit_logo_url'>Team Logo URL</label>";
							echo "<input type='text' class='form-control admin_input_text' rows='1' id='edit_logo_url' value='$team[LOGO_URL]' />";
						echo "</div>";

						// get all players for this team
						$team_players_result = $esports_db->query("SELECT * FROM PLAYERS WHERE TEAM_ID=$team_id");
					
						echo "<div class='player_list'>";
							echo "<div class='player_list_content'>";
								echo "<h3 class='admin_input_text'>Players</h3>";
								echo "<table class='table player_table'>";
									echo "<tbody class='player_table_body'>";
						
										while($team_players = $team_players_result->fetchArray(SQLITE3_ASSOC))
										{
//											var rank = "Player";
//											if (team.players[i].rank == 1) rank = "Captain";
//											else if (team.players[i].rank == 2) rank = "Manager";
												
											echo "<tr class='clickable-row admin_table_row' data-url='admin_edit_teams.php?player_id=$team_players[PLAYER_ID]'>";
												echo "<td>";
													echo "<img class='img-responsive admin_logo' src='$team_players[IMAGE_URL]' alt='player image' title='player image'>";
												echo "</td>";
												echo "<td> $team_players[USER_NAME] </td>";
												echo "<td>Rank: $team_players[RANK] </td>";
												echo "<td>";
													echo "<button type='button' class='btn btn-warning delete_player_button' id='delete_player' onclick='??'>Delete Player</button>"; // TODO: ??
												echo "</td>";												
											echo "</tr>";
										}
										echo "<tr>";
											echo "<td>";
												echo "<button type='button' class='btn btn-warning add_player_button' id='add_player' onclick='??'>Add Player</button>"; // TODO: ??
											echo "</td>";
										echo "</tr>";
									echo "</tbody>";
								echo "</table>";			
							echo "</div>";	
						echo "</div>";

						echo "<button type='button' class='btn btn-warning admin_page_button' id='delete_team'>Delete Team</button>";
						echo "<script>document.querySelector('#delete_team').onclick = onDeleteTeam;</script>";

						echo "<button type='button' class='btn btn-warning admin_page_button' id='update_team'>Update Team</button>"; 
						echo "<script>document.querySelector('#update_team').onclick = onUpdateTeam;</script>";
						
					echo "</form>";			
				}
				
				// if user is on the page with no parameters (i.e. admin_edit_teams.php)
				else {
				
					// load all team names and IDs from database
					$team_list_result = $esports_db->query("SELECT * FROM TEAMS");	
				
					$index = 0;

					echo "<h4>Select a team to edit:</h4>";
					
					// display table of teams with each linked to "admin_edit_teams.php?team_id=#"
					echo "<table class='table'>";
						echo "<tbody>";
						while($team = $team_list_result->fetchArray(SQLITE3_ASSOC))
						{
							$team_id = $team['TEAM_ID'];
							$team_name = $team['TEAM_NAME'];

							$team_captain_result = $esports_db->query("SELECT USER_NAME FROM PLAYERS WHERE TEAM_ID=$team_id AND RANK=1");
							
							echo "<tr class='clickable-row admin_table_row' data-url='admin_edit_teams.php?team_id=$team_id' data-href='#team_form'>";
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
				}

			?>
			
        </div>	
	
</main>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				