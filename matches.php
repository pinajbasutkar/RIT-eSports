<?php

    //check if url param provided, default to current if not
    if(array_key_exists('type',$_GET)){
    
        $matchType = $_GET['type'];
        
    }else{
        
        $matchType = 'current';
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Matches Page</title>
  <?php include 'includes/head.php';?>
</head>
<body>

    <?php include 'includes/navmenu.php';?>
    
	<main>
    
		<h2 class="page_title">MATCHES</h2>

        <div class="tab_matches">
        
            <a href="matches.php?type=past">
                <button class="tablinks <?php if($matchType === 'past'){ echo 'active'; } ?>">Past</button>
            </a>
            
            <a href="matches.php?type=current">
                <button class="tablinks <?php if($matchType === 'current'){ echo 'active'; } ?>">Current</button>
            </a>
            
            <a href="matches.php?type=future">
                <button class="tablinks <?php if($matchType === 'future'){ echo 'active'; } ?>">Future</button>
            </a>
            
        </div>
        
        
        <?php if($matchType === 'past'): ?>
        
        
            <div id="Past" class="tabcontent">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Game</th>
                            <th>Match</th>
                            <th>Results</th>
                            <th>Time</th>
                            <th>Watch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                            </td>
                            <td>RIT vs. Hobart</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>							
                        </tr>
                        <tr>
                            <td>
                                <img src="media/news_events/tournament_mini.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. Carnegie Mellon</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. Columbia</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                        <tr>
                        <td>
                                <img src="media/news_events/tournament_mini.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. UCal Irvine</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>					
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                            </td>
                            <td>RIT vs. Robert Morris</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>							
                        </tr>
                        <tr>
                            <td>
                                <img src="media/news_events/tournament_mini.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. RPI</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. Pikeville</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                    </tbody>
                </table>
            </div> <!-- end #past -->
    

        <?php elseif($matchType === 'future'): ?>
            
            
            <div id="Future" class="tabcontent">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Game</th>
                            <th>Match</th>
                            <th>Results</th>
                            <th>Time</th>
                            <th>Watch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                            </td>
                            <td>RIT vs. Hobart</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>							
                        </tr>
                        <tr>
                            <td>
                                <img src="media/news_events/tournament_mini.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. Carnegie Mellon</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. Columbia</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                        <tr>
                        <td>
                                <img src="media/news_events/tournament_mini.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. UCal Irvine</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>					
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                            </td>
                            <td>RIT vs. Robert Morris</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>							
                        </tr>
                        <tr>
                            <td>
                                <img src="media/news_events/tournament_mini.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. RPI</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. Pikeville</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                    </tbody>
                </table>
            </div> <!-- end #future -->
            
            
        <?php else: ?>
            
        
            <div id="Current" class="tabcontent">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Game</th>
                            <th>Match</th>
                            <th>Results</th>
                            <th>Time</th>
                            <th>Watch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                            </td>
                            <td>RIT vs. Hobart</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>							
                        </tr>
                        <tr>
                            <td>
                                <img src="media/news_events/tournament_mini.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. Carnegie Mellon</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. Columbia</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                        <tr>
                        <td>
                                <img src="media/news_events/tournament_mini.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. UCal Irvine</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>					
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                            </td>
                            <td>RIT vs. Robert Morris</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>							
                        </tr>
                        <tr>
                            <td>
                                <img src="media/news_events/tournament_mini.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. RPI</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                        <tr class="light_table_row">
                            <td>
                                <img src="media/news_events/gaming_background_crop.jpg" alt="RIT eSports Game Logo" title="RIT eSports Game Logo">
                             </td>
                            <td>RIT vs. Pikeville</td>
                            <td>0-0</td>
                            <td>Live</td>
                            <td>
                                <button type="button" class="btn btn-default btn-lg watch_video_button">Video</button>	
                            </td>						 
                        </tr>
                    </tbody>
                </table>
            </div> <!-- end #current -->


        <?php endif; ?>


    </main>
    
    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				