<!DOCTYPE html>
<html lang="en">
<head>
  <title>RIT eSports Contact Page</title>
  <?php include 'includes/head.php';?>
</head>
<body>
	
    <?php include 'includes/navmenu.php';?>
    
	<main>
       
        <div class="row">
        
            <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
        
                <h2 class="page_title">CONTACT</h2>
				<form method="post" action="formmail.php" name="esportscontactform">
					<input type="hidden" name="env_report" value="REMOTE_HOST,REMOTE_ADDR,HTTP_USER_AGENT,AUTH_TYPE,REMOTE_USER" />
					<input type="hidden" name="recipients" value="exh7928@g.rit.edu" />
					<input type="hidden" name="required" value="EmailAddr:Your email address,FullName:Your name" />
					<input type="hidden" name="subject" value="RIT E-Sports Contact" />
					<input type="hidden" name="derive_fields" value="email=EmailAddr,realname=FullName" />
					<input type="hidden" name="mail_options" value="Exclude=email;realname" />
					<input type="hidden" name="good_url" value="confirmation.php" />
  
                    <div class="form-group">
                        <label for="full_name">Full Name *</label>
						<input type="text" class="form-control" id="FullName" name="FullName" placeholder="Your name" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Your E-mail *</label>
						<input type="email" class="form-control" id="EmailAddr" name="EmailAddr" placeholder="Your E-mail address" required />
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="Subject" placeholder="Message subject">
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" rows="8" id="message" name="Message"></textarea>
                    </div>

					<p>
						<input type="submit" class="btn btn-warning contact_page_button" value="Submit" />
						<input type="reset" class="btn btn-warning contact_page_button" value="Clear form" />
					</p>

                </form>
                
            </div>
            
        </div> 
        
    </main>			
    
    <hr id="footer_line">
    <?php include 'includes/footer.php';?>
    
</body>
</html>				
