"use strict";
	
function populate_news(news_id) {

			var url = "get-news-data.php?news_id=" + news_id;
			
			var xhr = new XMLHttpRequest();

			xhr.onload = function() {		
				news_retrieved(xhr);
				
				$('html, body').animate({
            	scrollTop: $("form").offset().top - 80
			}, 1000, 'swing');
			};
				
			xhr.open("GET", url, true);
			xhr.send(null);

		}

function populate_matches(match_id) {
			var url = "get-match-data.php?match_id=" + match_id;
			
			var xhr = new XMLHttpRequest();

			xhr.onload = function() {
				$('html, body').animate({
            	scrollTop: $("form").offset().top - 80
				}, 1000, 'swing');
			
				match_retrieved(xhr);
			};
			xhr.open("GET", url, true);
			xhr.send(null);
		}

function news_retrieved(xhr) 
{
	var news = JSON.parse(xhr.responseText);
	
	console.log(news);
	
	document.getElementById("news_id").value = news.news_id;
	document.getElementById("headline").value = news.headline;
	document.getElementById("date_published").value = news.date_published;
	document.getElementById("author").value = news.author;
	document.getElementById("image_url").value = news.image_url;
	document.getElementById("content").innerHTML = news.content;

}

    						
function match_retrieved(xhr) 
{
	var matches = JSON.parse(xhr.responseText);
	
	console.log(matches);
	
	document.getElementById("match_id").value = matches.match_id;
	document.getElementById("game").value = matches.game;
	document.getElementById("team1").value = matches.team1;
	document.getElementById("team2").value = matches.team2;
	document.getElementById("score").value = matches.score;
	document.getElementById("date").value = matches.date;
	document.getElementById("video").value = matches.video;
	document.getElementById("game_logo").value = matches.game_logo;
}
		