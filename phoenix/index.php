<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Salty Sow is the nation's newest head to tail restaurant serving local & sustainable ingredients in a modern farmhouse atmosphere." />
<title>Salty Sow - Swine + Wine + Beer</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../css/location.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="../scripts/main.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="//use.typekit.net/kei5faj.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script src="../scripts/ie-conditional.js" type="text/javascript"></script>
<script type="text/javascript" src="../scripts/menu.js"></script>

<!-- BEGIN OFF-CANVAS DRAWER INITIATION -->

<link rel="stylesheet" href="../css/responsive-nav-original.css">
<script src="../js/responsive-nav.js"></script>

<!-- INCLUDE FEEDBACK FORM FILES -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">  
/* <![CDATA[ */    
$(document).ready(function() {
	var close_note = $("#note");
	close_note.click(function () {
		jQuery("#note").slideUp(300, function () {
			jQuery(this).hide();
		});
});

$("#ajax-contact-form").submit(function() {
        $('#load').append('<center><img src="images/ajax-loader.gif" alt="Currently Loading" id="loading" /></center>');
        var fem = $(this).serialize(),
			note = $('#note');
        $.ajax({
            type: "POST",
            url: "http://what.it.is/saltysow/beta/form-php/contact.php",
            data: fem,
            success: function(msg) {
				if ( note.height() ) {			
					note.slideUp(300, function() {
						$(this).hide();
					});
				} 
				else note.hide();
				$('#loading').fadeOut(300, function() {
					$(this).remove();
					
					if(msg === 'OK') { $("#ajax-contact-form").find('input, textarea').val(""); }	
					// Message Sent? Show the 'Thank You' message and hide the form
					result = (msg === 'OK') ? '<div class="success">Your message has been sent. Thank you!</div>' : msg;
					var i = setInterval(function() {
						if ( !note.is(':visible') ) {
							note.html(result).slideDown(300);
							clearInterval(i);
						}
					}, 40);    
				}); // end loading image fadeOut
            }
        });

        return false;
    });
});
/* ]]> */
</script> 

</head>
<?php require("../scripts/css_browser_selector.php"); ?>
<body class="<?php echo css_browser_selector() ?> location">
<?php include '../process-form.php'; ?>

<!-- Connect Drawer Markup -->


<div id="nav-container">
<nav class="nav-collapse">
  <div id="drawer-contents" class="container">
    <div class="row">
      <div id="social-block" class="col-sm-12 col-md-3 col-lg-3">&nbsp;
        <a href="https://www.facebook.com/SaltySow" target="_blank"><div id="social-block-facebook"></div></a>
        <a href="https://twitter.com/SaltySow" target="_blank"><div id="social-block-twitter"></div></a>
        <a href="http://instagram.com/saltysow" target="_blank"><div id="social-block-instagram"></div></a>
        <a href="mailto:info@saltysow.com"><div id="social-block-email"></div></a>
      </div>
      <div id="drawer-block" class="col-sm-12 col-md-3 col-lg-3"><a href="#myModal2" data-toggle="modal">Give Us Your Feedback</a></div>
      <div id="drawer-block" class="col-sm-12 col-md-3 col-lg-3"><a href="#myModal" data-toggle="modal">Email Signup</a></div>
      <div id="last-block" class="col-sm-12 col-md-3 col-lg-3"><a href="#myModal3" data-toggle="modal">Purchase a Gift Card</a></div>
    </div>
  </div>
</nav>
	<div id="red-strip"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-12">
      	   <div class="logo"><a href="http://what.it.is/saltysow/beta"><img src="../images/logo2x.png" width="200" height="47"/></a></div>
          <div class="logo-sm"><a href="http://what.it.is/saltysow/beta"><img src="../images/logo2x.png" width="170" height="40"/></a></div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
        <div id="nav-items">
          <div id="nav-item" class="mobile-hide"><a id="link1" href="http://what.it.is/saltysow/beta">Home</a></div>
          <div id="nav-item"><a href="http://what.it.is/saltysow/beta/#locations">Locations & Menus</a></div>
          <div id="nav-item"><a href="http://what.it.is/saltysow/beta/#about">About</a></div>
          <div id="nav-item"><a href="http://what.it.is/saltysow/beta/#rewards">Rewards</a></div>
          <div id="nav-item" class="mobile-hide"><a href="#myModal3" data-toggle="modal">Gift Cards</a></div>
        </div>
        </div>
        <div id="connect-button" class="col-md-1 col-sm-1"><img src="../images/connect2x.png" width="90" height="74" /></div>
      </div>
    </div>
</div>
  
  
  <div class="wrapper">
  
  
  
  
  <!--<div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="top-image">
        <img src="location images/header.jpg" class="img-responsive" alt="Responsive image">
      </div>
    </div>
  </div> -->
  
      <div id="Carousel" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="item active">
            <img src="../images/phoenix1.jpg" class="img-responsive" alt="Responsive image">
                </div>
                
               <div class="item">
            <img src="../images/phoenix2.jpg" class="img-responsive" alt="Responsive image">
                </div>
    
                <div class="item">
            <img src="../images/phoenix3.jpg" class="img-responsive" alt="Responsive image">
                </div>
                
                <div class="item">
            <img src="../images/phoenix4.jpg" class="img-responsive" alt="Responsive image">
                </div>
            </div>
    
            <a class="left carousel-control" href="#Carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#Carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div> 

  
  
 <div class="main"> 
 
 <div class="container">
 

  <div class="row">

      <div class="col-md-12">
          <div class="location-header">
               <img class="arrow-left" img src="../images/chevleft2x.png" width="34" height="58" />
            <h2 class="text-center">SALTY SOW PHOENIX</h2>
               <img class="arrow-right" img src="../images/chevright2x.png" width="34" height="58" />
          </div>
      </div>
   </div>


  <div class="row">
    <div class="col-sm-8 col-md-8">
      <div class="welcome">
        <h3>welcome</h3>
        <p>Built using sustainable materials, including barnwood from across the plains, Salty Sow Phoenix is located in the heart of Paradise Valley just east of Tatum on East Cactus Road. Featuring Live Music on the Patio on Thursdays, Fridays, and Saturdays, as well as All Night Happy Hour on Mondays and Tuesdays.</p>
          <div class="reservations">
          	<span class="reservations-button"><a href="http://www.opentable.com/salty-sow-cactus-reservations-phoenix?restref=103165" target="_blank">Get Reservations</a></span>
           <div id="powered">
          <a href="http://www.opentable.com/"><img src="../location-images/powered2x.png" width="150" height="43" /></a>
          </div>
          </div>
        </div>
      </div>
      
      <div class="col-xs-12 col-sm-4 col-md-4">
          <span class="location-title"><h3>location info</h3> </span>
        
        <div class="map-wrapper">
          <div class="map"> 
            <div id="map"></div> 
              <p class="adress">4801 East Cactus Road<br />
              Phoenix, AZ 85254</p>
              <p class="number">(602)795-9463</p>
                <a href="https://maps.google.com/maps?q=4801+East+Cactus+Road+Phoenix,+AZ+85254&client=safari&oe=UTF-8&hnear=4801+E+Cactus+Rd,+Scottsdale,+Arizona+85254&gl=us&t=m&z=16"><p class="directions">Get Directions</p></a>
              <div id="map-border"></div>
          </div>
        </div><!-- map-wrapper-->
        
      </div>
    </div><!-- row -->
   

  <div class="row">
    <div class="col-sm-6 col-md-4">

      <div class="hours">
        <h3>hours</h3>
        <ul>
          <li>Sunday – Thursday, 4:30pm – 10pm</li>
          <li>Friday & Saturday, 4:30pm – 11pm 
</li>
          <li>Happy Hour Daily 4:30pm – 6:30pm 
</li>
          </ul>
        </div>
      </div>
      
    <div class="col-sm-6 col-md-4">
      <div class="leadership">
        <h3>Menus</h3>
        <ul>
          <li><a href="http://saltysow.com/SaltySowPhoenix_DinnerMenu.pdf">Dinner Menu</a></li>
          <li><a href="http://saltysow.com/SaltySowPhoenix_HappyHourMenu.pdf">Happy Hour & Drinks</a></li>
          </ul>
        </div>
      </div>

</div><!-- row -->

<div class="row">
  <div class="col-md-1 col-lg-2"></div>
    <div class="col-md-10 col-lg-8">
      <div class="connect">
        <div class="row">
          <div class="col-sm-3">
 			  <div class="connect-title">Stay in the loop</div>
           </div>
           <div class="col-sm-1"><img class="social-arrow" img src="../images/chevright2x.png" width="34" height="58" />
           </div>
			<div class="col-sm-4">
            <div class="social-icons">
             <a href="https://www.facebook.com/SaltySow" target="_blank"> <img src="../location-images/facebook2x.png" img class="facebook" /></a>
             <a href="https://twitter.com/SaltySow" target="_blank"><img src="../location-images/twitter2x.png" img class="twitter" /></a>
          	  <a href="http://instagram.com/saltysow"><img src="../location-images/instagram2x.png" img class="instagram" /></a>
             </div>
           </div>
           
           <div class="col-sm-4">
              <a href="#myModal" data-toggle="modal"><p class="email">Sign up for our email list</p>
</a>
            </div>
  		  <div class="col-md-1 col-lg-2"></div>
      </div>
    </div>
  </div>
</div>

    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div id="line">	
          <hr style="color: #DA5030; background: #DA5030; width: auto; height: 2px; margin: 4px 15px 0 15px;" />
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>

</div><!-- container-->   
</div><!-- main --> 

<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">        
        <p>All content © SaltySow 2012-14 &nbsp; &nbsp; Website by <span class="what"><a href="http://what.it.is/">what.it.is creative</a></span></p>
      </div>
   </div>  
 </div>      
</div>

<div class="mobile-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="footer-social-block">&nbsp;
          <a href="https://www.facebook.com/SaltySow" target="_blank">&#62220;</a>&nbsp; &nbsp; &nbsp; &nbsp;
          <a href="https://twitter.com/SaltySow" target="_blank">&#62217;</a>&nbsp; &nbsp; &nbsp; &nbsp;
          <a href="http://instagram.com/saltysow" target="_blank">&#62253;</a>&nbsp; &nbsp; &nbsp; &nbsp;
          <a href="mailto:info@saltysow.com"><span class="entypo">&#128319;</span></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="email-button"><a href="#myModal" data-toggle="modal">Sign up for our email list</a></div>
      </div>
   </div>
    <div class="row">
      <div class="col-md-12">        
        <p>All content © SaltySow 2012-14<br />
			Website by <span class="what"><a href="http://what.it.is/">what.it.is creative</a></span></p>
      </div>
   </div> 
</div>      
</div>

<!-- Gift Cards Form -->
<div id="myModal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content paypal">

<h2>Purchase a Gift Card.</h2>
<a class="close" href="javascript://" data-dismiss="modal">&#215;</a>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="GWDVHD3EJ8HQ2">
<div class="paypal-form">
<input type="hidden" name="on2" value="First & Last Name">
<input type="text" name="os2" maxlength="200" placeholder="First & Last Name"><br/>
<input type="hidden" name="on3" value="Email Address">
<input type="text" name="os3" maxlength="200" placeholder="Email Address"><br/>

<input type="hidden" name="on0" value="Gift Card Amount"><label class="selection">Gift Card Amount</label><select name="os0">
	<option value="Option 1">Option 1 $25.00 USD</option>
	<option value="Option 2">Option 2 $50.00 USD</option>
	<option value="Option 3">Option 3 $75.00 USD</option>
	<option value="Option 4">Option 4 $100.00 USD</option>
</select>
<input type="hidden" name="on1" value="Location"><label class="selection">Location</label><select name="os1">
	<option value="Salty Sow Austin">Salty Sow Austin </option>
	<option value="Salty Sow Pheonix">Salty Sow Pheonix </option>
</select> 
</div>
<input type="hidden" name="currency_code" value="USD">
<input class="paypalsubmit" type="image" src="http://what.it.is/saltysow/beta/images/buy-now@2x.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
</form>


        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<!-- Feedback Form -->
<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content feedback">

<h2>Questions or Comments?</h2>
<a class="close" href="javascript://" data-dismiss="modal">&#215;</a>

<div id="contactform">
	<fieldset>
	<!--begin:notice message block-->
	<div id="note"></div>
	<!--end:notice message block-->
		<form id="ajax-contact-form" method="post" action="http://what.it.is/saltysow/beta/form-php/contact.php">
			<input class="required inpt" type="text" name="name" value="" placeholder="First & Last Name" /><br />
			<input class="required inpt" type="text" name="email" value="" placeholder="Email Address" /><br />
			<label>Message Topic:</label>
				<select name="subject" id="subject" class="select">
					<option value="">Select your topic</option>
					<option value="Guest Feedback Phoenix">Guest Feedback - Austin</option>
                    <option value="Guest Feedback Austin">Guest Feedback - Phoenix</option>
					<option value="Media Inquiry">Media Inquiry</option>
					<option value="General Question">General Question</option>
				</select>
			<!--  <input class="required inpt" type="text" name="subject" value="" /> --><br />
			<label>Comments</label><br />
			<textarea class="textbox" name="message" rows="6" cols="30"></textarea><br />
			<label style="margin-top:10px;">The sum of 3+1 = </label><input class="required inpt answer" type="text" name="answer" value="" /><br />
			<label id="load"></label><button name="submit" type="image" class="btn" src="images/submit-button@2x.png" value="Send"/>Submit</button>

		</form>
	</fieldset>
</div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<!-- Email Singup -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

<form action="http://guylarryrestaurants.createsend.com/t/t/s/vnik/" method="post" id="subForm">
<div>
<h2>Keep me in the loop.</h2>
<a class="close" href="javascript://" data-dismiss="modal">&#215;</a>
<input type="text" name="cm-name" id="name" placeholder="your name" /><br />
<input type="text" name="cm-vnik-vnik" id="vnik-vnik" placeholder="your email address" /><br />
<div class="checkboxes">
<label class="selection" for="Salty Sow Location">Select your Salty Sow location:</label><br /><br/>
<input type="checkbox" name="cm-fo-drhud" id="cm130793" value="130793" /><label for="cm130793">Salty Sow Austin</label>
<input type="checkbox" name="cm-fo-drhud" id="cm130794" value="130794" /><label for="cm130794">Salty Sow Phoenix</label>
</div><br/>
<button type="submit" value="Subscribe" />Sign me up!</button>
<div id="response">THANKS! Expect to hear from us soon.</div>
</div>
</form>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<!-- Twitter Bootstrap Modal: http://twitter.github.io/bootstrap/javascript.html#modals -->
	<script src="../scripts/bootstrap-modals.js"></script>

	<!-- Campaign Monitor AJAX Subscribe: https://gist.github.com/jdennes/1155479 -->
	<script type="text/javascript">
		$(function () {
			$('#subForm').submit(function (e) {
				e.preventDefault();
				$('#email').removeClass();
				$('button').fadeTo(200,0.5);
				$.getJSON(
				this.action + "?callback=?",
				$(this).serialize(),
				function (data) {
					$('button').stop().fadeTo(200,1);
					if (data.Status === 400) { $('#email').addClass('error'); } else { $('#response').show(); }
				});
			});
		});
	</script>


    <script>
      var nav = responsiveNav(".nav-collapse", { // Selector
  animate: true, // Boolean: Use CSS3 transitions, true or false
  transition: 400, // Integer: Speed of the transition, in milliseconds
  label: "Menu", // String: Label for the navigation toggle
  insert: "after", // String: Insert the toggle before or after the navigation
  customToggle: "connect-button", // Selector: Specify the ID of a custom toggle
  openPos: "relative", // String: Position of the opened nav, relative or static
  navClass: "nav-collapse", // String: Default CSS class. If changed, you need to edit the CSS too!
  jsClass: "js", // String: 'JS enabled' class which is added to <html> el
  init: function(){}, // Function: Init callback
  open: function(){}, // Function: Open callback
  close: function(){} // Function: Close callback
});
    </script>
    
    
    <!-- Google maps Javascript API -->

   <script type="text/javascript"> 
     var myStyle = [
       {
         featureType: "administrative",
         elementType: "labels",
         stylers: [
           { visibility: "on" }
         ]
       },{
         featureType: "poi",
         elementType: "labels",
         stylers: [
           { visibility: "on" }
         ]
       },{
         featureType: "water",
         elementType: "labels",
         stylers: [
           { visibility: "off" }
         ]
       },{
         featureType: "road",
         stylers: [
           { "color": "#c2c2c1" }
         ]
       }
     ];

     var map = new google.maps.Map(document.getElementById('map'), {
       mapTypeControlOptions: {
         mapTypeIds: ['mystyle', google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.TERRAIN]
       },
	   
       center: new google.maps.LatLng(33.597840,-111.978111),
       zoom: 18,
       mapTypeId: 'mystyle'
     });


     map.mapTypes.set('mystyle', new google.maps.StyledMapType(myStyle, { name: 'Map' }));
		

   </script> 



  
</body>

<!-- 3 .Import Bootstrap.js & Library 1.10.1 -->
<!-- Load jQuery first -->
<script>window.jquery || document.write('<script src="http://andrsnservices.staging.wpengine.com/wp-content/themes/Anderson%20WIP/bootstrap/js/jquery-1.10.1.min.js"><\/script>')</script>
<script src="http://andrsnservices.staging.wpengine.com/wp-content/themes/Anderson%20WIP/bootstrap/js/bootstrap.min.js"></script>

</html>