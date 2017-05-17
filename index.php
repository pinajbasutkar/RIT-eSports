<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Home Page</title>
  <?php include 'includes/head.php';?>
</head>
<body>
	
    <div id="main_home_image">
		<img class="img-responsive center-all" id="bg-gif" src="media/home-bg.gif"/>
		<img class="img-responsive center-all" id="bg-overlay" src="media/home-bg-overlay.png"/>
    </div>

	<?php
	    include 'includes/navmenu.php';
	    
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
		
		echo "<main class='center-div'>";
		echo "<h2 class='page_title'>ABOUT</h2>";
		
		$about_text_array = $esports_db->query("SELECT CONTENT FROM ABOUT");
		
		while($about_text = $about_text_array->fetchArray(SQLITE3_ASSOC))
		{
			$about_text_content = $about_text['CONTENT'];
            echo "<p>" . $about_text_content . "</p>";			
		}
		
        echo "</main>";
        
		$news_item_list = $esports_db->query("SELECT * FROM news_items ORDER BY date DESC LIMIT 4");  
        $news_item_list_extra = $esports_db->query("SELECT * FROM news_items ORDER BY date DESC");
    
        $rows_extra[] = array();            
        while($news_item_more = $news_item_list_extra->fetchArray(SQLITE3_ASSOC))
		{
            $rows_extra[]=$news_item_more;
        }
			
		echo "<section id='news_and_events' class='row container'>";
		echo "<div class='container center-all'>";
		echo "<h2 class='page_title' id='title_page_id'>NEWS AND EVENTS</h2>";          

                $rowCounter = 0;
                $newsItemCounter = 0;
                $i=0;
                
                while($news_item = $news_item_list->fetchArray(SQLITE3_ASSOC))
				{
                    $i++;
                    $newsItemCounter++;
                
                    $image_url = $news_item['IMAGE_URL'];
 
                    if($rowCounter === 0){
                        echo '<div class="row center-div">';
                    }
                        
                    //thumbnail content
                    echo '<div class="col-md-6 col-lg-6 container">';			
                    echo '<div class="news-item">';
                    echo '<a data-fancybox data-src="#news-item-'.$newsItemCounter.'" href="javascript:;">';
                    echo "<img src='$image_url' alt='News Item Picture' title='News Item Picture' class='img-responsive center-div news-item-pic'>";
                    $headline = $news_item['HEADLINE'];
                    echo "<h3 class='news-item-title'>$headline</h3>";
                    $author = $news_item['AUTHOR'];
                    $date = $news_item['DATE'];
                    echo "<p class='news-item-info'>By&nbsp$author | $date</p>";
                    echo '<p class="news-item-text">';
                    $content = trim(substr($news_item['CONTENT'], 0, 200));
                    echo "$content...</p></a></div></div>";
                    
                    //full content
                    echo '<div class="news-item-full-container" style="display: none;" id="news-item-'.$newsItemCounter.'">';
                    echo '<div class="news-item-full">';
                    echo "<img src='$image_url' alt='News Item Picture' title='News Item Picture' class='img-responsive center-div full-news-item-pic'>";
                    $headline = $news_item['HEADLINE'];
                    echo "<h3 class='news-item-title'>$headline</h3>";
                    $author = $news_item['AUTHOR'];
                    $date = $news_item['DATE'];
                    echo "<p class='news-item-info'>by $author | $date</p>";
                    echo '<p class="">';
                    $content = $news_item['CONTENT'];
                    echo "$content</p></div></div>";
                    
                    
                if($rowCounter === 1){
                        echo '</div>';
                        $rowCounter = 0; //reset counter
                    }else{
                        $rowCounter += 1; //increment counter
                    }
                    
				}
    
        
          echo "<div id='more-news-loaded'></div>";
    			
		echo '<div class="center-all col-md-12 col-lg-12 container">';

		echo '<button type="button" onclick="loadmore()" class="btn btn-lg" id="load_more_button">Load More</button></a></div></div></section>';
       
    ?>
    

    
 <!--Footer----------------------------------------------------------------------->   
    
	
    	
	
	<?php
	    include 'includes/footer.php';
	?>
    
    <script type="text/javascript">
 
   var json_obj = <?php echo json_encode($rows_extra) ?>;
   var i=<?php echo $i?>;
   
   var newsItemCounter = 4;
   
   //Loads 4 more elements
   function loadmore(){
           
    var count=4; 
       
    var rowCounter = 0;
       
    
    
    while(count!=0){
        
    i++;
    newsItemCounter++;
                        
    try {
            var headline = json_obj[i].HEADLINE; 
            var img_url = json_obj[i].IMAGE_URL;
            var author = json_obj[i].AUTHOR; 
            var date = json_obj[i].DATE;
            var content = json_obj[i].CONTENT;

            var length = 200;
            var trimmedContent = content.substring(0, length);  
        
        //Thumbnail content

            var h3=document.createElement("h3");
            h3.innerHTML=""+headline;
            h3.setAttribute('class','news-item-title');

            var img=document.createElement("img");
            img.setAttribute('src',img_url);
            img.setAttribute('alt','News Item Picture');
            img.setAttribute('title','News Item Picture');
            img.setAttribute('class','img-responsive center-div news-item-pic');

            var a=document.createElement("a");
            a.setAttribute('data-fancybox','');
            a.setAttribute('data-src','#news-item-'+newsItemCounter);
            a.setAttribute('href','javascript:;');

            var innerDivNewsItem=document.createElement("div");
            innerDivNewsItem.setAttribute('class','news-item');
        
            var outerDivNewsItem=document.createElement("div");
            outerDivNewsItem.setAttribute('class','col-md-6 col-lg-6 container');

            var pNewsItemInfo=document.createElement("p");
            pNewsItemInfo.innerHTML = "By " + author + " | " + date;
            pNewsItemInfo.setAttribute('class','news-item-info');

            var pNewsItemText=document.createElement("p");
            pNewsItemText.innerHTML = trimmedContent+"...";
            pNewsItemText.setAttribute('class','news-item-text');

            a.appendChild(img);
            a.appendChild(h3);

            innerDivNewsItem.appendChild(a);
            innerDivNewsItem.appendChild(pNewsItemInfo);
            innerDivNewsItem.appendChild(pNewsItemText);

            outerDivNewsItem.appendChild(innerDivNewsItem);
        
        
        //Full content
        
    
         var imgF=document.createElement("img");
            imgF.setAttribute('src',img_url);
            imgF.setAttribute('alt','News Item Picture');
            imgF.setAttribute('title','News Item Picture');
            imgF.setAttribute('class','img-responsive center-div full-news-item-pic');
        
        var h3F=document.createElement("h3");
            h3F.innerHTML=""+headline;
            h3F.setAttribute('class','news-item-title');
        
        
        var pNewsItemInfoF=document.createElement("p");
            pNewsItemInfoF.innerHTML = "By " + author + " | " + date;
            pNewsItemInfoF.setAttribute('class','news-item-info');
        
        var pNewsItemTextF=document.createElement("p");
            pNewsItemTextF.innerHTML = trimmedContent+"...";
            pNewsItemTextF.setAttribute('class','');
        
        var innerDivNewsItemF=document.createElement("div");
            innerDivNewsItemF.setAttribute('class','news-item-full');
        
            var outerDivNewsItemF=document.createElement("div");
            outerDivNewsItemF.setAttribute('class','news-item-full-container');
            outerDivNewsItemF.setAttribute('style','display:none;');
            outerDivNewsItemF.setAttribute('id','news-item-'+newsItemCounter);
        
        
            innerDivNewsItemF.appendChild(imgF);
            innerDivNewsItemF.appendChild(h3F);
            innerDivNewsItemF.appendChild(pNewsItemInfoF);
            innerDivNewsItemF.appendChild(pNewsItemTextF);

            outerDivNewsItemF.appendChild(innerDivNewsItemF);
        
            document.getElementById("more-news-loaded").appendChild(outerDivNewsItemF); 
        


            if(rowCounter==0){
                 var outerDivNewsItemRow=document.createElement("div");
                 outerDivNewsItemRow.setAttribute('class','row center-div');
                 outerDivNewsItemRow.appendChild(outerDivNewsItem); 
                 document.getElementById("more-news-loaded").appendChild(outerDivNewsItemRow); 
                 rowCounter++;
                
            }
        
            else{
                 outerDivNewsItemRow.appendChild(outerDivNewsItem);
                 rowCounter=0;
            }
        
        
        
        
        
		}
		catch(err){     
			$('#load_more_button').addClass('disabled');
		}

		count--;
    }
       
    
}
   
   


   </script>
</body>
</html>
