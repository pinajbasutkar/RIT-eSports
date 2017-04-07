<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Admin Login Page</title>
  <?php include 'includes/head.php';?>
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main>
    
		<h2 class="page_title">LOG IN</h2>
		
		<div class="row">
        
            <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
		
                <form>	  
                    <div class="form-group">
                        <label for="username">Username</label>
                        <text class="form-control" rows="1" id="username"></text>
                    </div>


                    <div class="form-group">
                        <label for="pw">Password</label>
                        <input type="password" placeholder="Enter Password" class="form-control" id="pw" name="pw" required>
                    </div>


                    <a href="admin.php">
                        <button type="button" class="btn btn-warning main_action_button">Log In</button>
                    </a>

                </form>
                
            </div>
		
		</div>
		
    </main>	
    
    <hr id="footer_line">	
	<?php include 'includes/footer.php';?>
    
</body>
</html>				