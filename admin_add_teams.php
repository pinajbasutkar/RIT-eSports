<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Page</title>
  <?php include 'includes/head.php';?>
  
	<script src="js/js_admin.js"></script>

	<script>
		$(document).ready(function(){

			document.getElementById("addteam").className += " active";
		  
		});
	</script>
	
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
    
		<?php include 'includes/adminmenu.php';?>

        <div id="AddTeam" class="tabcontent">
			<form>	  
				<div class="form-group">
					<label for="team_name">Team Name</label>
					<text class="form-control" rows="1" id="team_name"></text>
				</div>

				<div class="form-group">
					<label for="game">Game</label>
					<text class="form-control" rows="1" id="game"></text>
				</div>
				
				<button type="button" class="btn btn-warning main_action_button">Publish</button>	
			</form>
        </div>		
    
</main>

    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				