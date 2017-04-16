"use strict";

$(document).ready(function(){

	document.getElementById("defaultOpen").click();
  
});

function change(evt, tab) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tab).style.display = "block";
    evt.currentTarget.className += " active";
}

function edit_news_click(news_id) {
    populate_news(news_id);
}
		
function populate_news(news_id) {
			var url = "get-news-data.php?news_id=" + news_id;
			
			var xhr = new XMLHttpRequest();

			xhr.onload = function() {
				news_retrieved(xhr);
			};
			xhr.open("GET", url, true);
			xhr.send(null);
		}


function news_retrieved(xhr) 
{
	var news = JSON.parse(xhr.responseText);
	
	console.log(news);

	document.getElementById("headline").value = news.headline;
	document.getElementById("date").value = news.date_published;
	document.getElementById("author").value = news.author;
	document.getElementById("image_url").value = news.image_url;
	document.getElementById("intro").innerHTML = news.intro;
	document.getElementById("description").innerHTML = news.descrip;

}
						
