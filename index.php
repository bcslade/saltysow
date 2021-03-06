<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Salty Sow is the nation's newest head to tail restaurant serving local & sustainable ingredients in a modern farmhouse atmosphere." />
<title>Salty Sow - Swine + Wine + Beer</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/bootstrap.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="//use.typekit.net/kei5faj.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script src="scripts/nivo-slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/menu.js"></script>

<!-- BEGIN OFF-CANVAS DRAWER INITIATION -->

<link rel="stylesheet" href="css/responsive-nav-original.css">
<script src="js/responsive-nav.js"></script>

<!-- INCLUDE FANCYSCROLL MENU -->
<link rel="stylesheet" type="text/css" href="css/fancyscroll.css" media="screen"> 
<script src="js/fancyscroll.js"></script>

<!-- INCLUDE FEEDBACK FORM FILES -->
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
<?php require("scripts/css_browser_selector.php"); ?>
<body class="<?php echo css_browser_selector() ?>">
<?php include 'process-form.php'; ?>

<!-- FANCYSCROLL SCRIPT -->
<script type="text/javascript">  
    window.onload = function(){  
            var fs=new fancyScroll({easingFunction:'easeOutCubic',easingTime:600});  
            //next assing page scroll to menu links  
            fs.addScroll(['link1','link2','link3','link4','link5','link6','link7'],['home','locations','about','rewards','top','down','mobiletop']);  
    };  
</script> 

<?php include 'header.php'; ?>
  
<!-- SECTION 1 -->

<div id="welcome" class="page">
<div id="home" class="fancyscroll-section"> 
<div id="top" class="fancyscroll-section"> 
<div id="mobiletop" class="fancyscroll-section"> 
  
    <!-- Landing page image slides --> 
<!-- spans are elements that will contain the background slide images -->

      <ul class="main-slide">
        <li>
            <span>Image 01</span>
        </li>
        <li>
            <span>Image 02</span>
        </li>
        <li>
            <span>Image 03</span>
        </li>
        <li>
            <span>Image 04</span>
        </li>
        <li>
            <span>Image 05</span>
        </li>
        <li>
            <span>Image 6</span>
        </li>
    </ul>

  
  
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-2 col-sm-2"></div>
      <div class="col-lg-6 col-md-8 col-sm-8">
        <div class="opening mobile-hide"><img src="images/welcome-image2x.png" class="img-responsive" /></div>
      </div>
      <div class="col-lg-3 col-md-2 col-sm-2"></div>
    </div>
    <div class="res-container">
    <div class="row">
      <div id="res-block">
      <div class="col-lg-4 col-md-4 col-sm-3"></div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="res-img"><img src="images/reservations2x.png" class="img-responsive" /></div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-3"></div>
      </div>
    </div>
    <div class="row">
      <div id="res-block">
      <div class="col-lg-4 col-md-3 col-sm-3"></div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="res-btns">
          <div class="res-btn-lft"><a href="http://www.opentable.com/the-salty-sow-reservations-austin?rid=86803&restref=86803" target="_blank">Salty Sow Austin</a></div>
          <div class="res-btn-rgt"><a href="http://www.opentable.com/salty-sow-cactus-reservations-phoenix?restref=103165" target="_blank">Salty Sow Phoenix</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-3 col-sm-3"></div>
      </div>
    </div>
    </div>
    <div id="down-arrow" class="mobile-hide"><a id="link6" href="#"><img src="images/down-arrow2x.png" width="135" height="48" /></a></div>
  </div>
  </div><!--/#mobiletop>-->
  </div><!--/#top>-->
</div>
</div>

<!-- SECTION 2 -->
  
<div id="concept" class="page">
<div id="locations" class="fancyscroll-section"><a id="locations"></a>
<div id="down" class="fancyscroll-section"> 
  <div class="container">
    <div class="row">
      <div id="page-title" class="col-md-12"><img src="images/chevleft2x.png" width="32" height="58" class="mobile-hide" /><span>Locations & Menus</span><img src="images/chevright2x.png" width="32" height="58" class="mobile-hide" /></div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="location-block">
          <div class="loca-img"><img src="images/austin.jpg" class="img-responsive" /></div>
          <div class="loca-title">Salty Sow Austin</div>
          <div class="contact-info"><span class="icon">&#128222;</span> (512) 391-2337 &nbsp; <span class="icon">&#59172;</span> 1917 Manor Road</div>
          <div class="menus"><a href="http://saltysow.com/SaltySowAustin_DinnerMenu.pdf" target="_blank"><span class="icon">&#128214;</span> Dinner Menu</a> &nbsp; <a href="http://saltysow.com/SaltySowAustin_HappyHourMenu.pdf" target="_blank"><span class="icon">&#128214;</span> Happy Hour & Drinks</a></div>
          <div class="loca-button"><a href="http://what.it.is/saltysow/beta/austin">Location Details</a></div>
          <div id="bottom-border"></div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="location-block">
          <div class="loca-img"><img src="images/arizona.jpg" class="img-responsive" /></div>
          <div class="loca-title">Salty Sow Phoenix</div>
          <div class="contact-info"><span class="icon">&#128222;</span> (602) 795-9463 &nbsp; <span class="icon">&#59172;</span> 4801 E Cactus Road</div>
          <div class="menus"><a href="http://saltysow.com/SaltySowPhoenix_DinnerMenu.pdf"><span class="icon">&#128214;</span> Dinner Menu</a> &nbsp; <a href="http://saltysow.com/SaltySowPhoenix_HappyHourMenu.pdf"><span class="icon">&#128214;</span> Happy Hour & Drinks</a></div>
          <div class="loca-button"><a href="http://what.it.is/saltysow/beta/phoenix">Location Details</a></div>
          <div id="bottom-border"></div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="gray-pig"><img src="images/black-pig2x.png" width="44" height="26" /></div>
      </div>
    </div>
  </div>
  </div><!--/#down-->
</div>
</div>

<!-- SECTION 3 -->
  
<div id="about" class="page">
<div id="about" class="fancyscroll-section"><a id="about"></a>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="page-title-white"><img src="images/chevleft-white2x.png" width="34" height="58" class="mobile-hide" /><span>About Salty Sow</span><img src="images/chevright-white2x.png" width="34" height="58" class="mobile-hide" /></div>
      </div>
      <div class="col-lg-1 col-md-1"></div>
      <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div id="about-text">Salty Sow is an American Gastropub that serves contemporary farmhouse fare. Hand-crafted meats, cocktails and entrees are served fresh daily, mindfully sourced from local farms and purveyors.</div>
      </div>
      <div class="col-lg-1 col-md-1"></div>
      <div class="col-lg-2 col-md-2"></div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="pig-divider">
          <div class="border-l"></div>
          <div class="border-r"></div>
        </div>
        <div id="tan-pig"><img src="images/white-pig2x.png" width="44" height="26" /></div>
      </div>
      <div class="col-lg-2 col-md-2"></div>
      <div class="col-lg-3 col-md-3"></div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="about-subtext">Modern and unpretentious, Salty Sow’s chef-driven menu delivers clean, farm-to-table eats in a casual setting, making it a trusted neighborhood eatery.</div>
      </div>
      <div class="col-lg-3 col-md-3"></div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div id="abt-block">
          <div style="height: 16px;"></div>
          <div class="abt-lines"></div>
          <div class="abt-header one">Culinary Chops</div>
          <div class="abt-img"><img src="images/harold-new.jpg" class="img-responsive" /></div>
          <div class="abt-title">Harold Marmulstein</div>
          <div class="abt-subhead">Executive Chef / Partner</div>
          <div class="abt-block-text">Chef Partner Harold Marmulstein was led to pursue a culinary career after working with his dad and grandfather as a kid at a bakery in upstate New York. After graduating from the Culinary Institute of America, he moved to Atlanta where he became the founder and former owner of the award-winning dick and harry’s Restaurant. Marmulstein has been working as an executive chef for more than 25 years in fine-dining restaurants, receiving awards from Zagat, Condé Nast, and Gourmet Magazine, to name a few.</div>
          <div id="bottom-border"></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div id="abt-block">
          <div style="height: 16px;"></div>
          <div class="abt-lines"></div>
          <div class="abt-header  two">JAMES BEARD HOUSE</div>
          <div class="abt-img"><img src="images/beard-house.jpg" class="img-responsive" /></div>
          <div class="abt-title">'Austin Farmhouse' Dinner</div>
          <div class="abt-subhead">
The James Beard House | New York City</div>
          <div class="abt-block-text">Thursday, February 27, 2014 | 7:00 PM<br />
<br />
From the James Beard Foundation: "Carnivores in Austin and Phoenix are getting their nose-to-tail fix thanks to chef Harold Marmulstein and his two acclaimed Salty Sow locations, where impeccably sourced meats are paired with an outstanding wine and beer program in a modern farmhouse setting."</div>
          <div class="abt-button"><a href="http://www.jamesbeard.org/events/austin-farmhouse" target="_blank">Reserve your seat!</a></div>
          <div id="bottom-border"></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div id="abt-block">
          <div style="height: 16px;"></div>
          <div class="abt-lines"></div>
          <div class="abt-header three">Don't Miss Out</div>
          <div class="abt-img"><img src="images/swordfish.jpg" class="img-responsive" /></div>
          <div class="abt-title">James Beard Dinners</div>
          <div class="abt-subhead">Special Previews Starting January 15</div>
          <div class="abt-block-text">Don't miss this opportunity to savor Chef Marmulstein's special JBH menu as he is preparing for the big night in New York City! Starting in January, Chef will be hosting Preview Dinners for a limited number of guests to dine on the 5 course menu with optional wine pairings. Please call us for date, time, and reservation details.</div>
          <div class="abt-subtext">(512) 391-2337</div>
          <div id="bottom-border"></div>
        </div>
      </div>
    </div>
    
    <div class="row mobile-hide">
      <div class="col-lg-2 col-md-1 col-sm-1"></div>
      <div class="col-lg-8 col-md-10 col-sm-10">
        <div class="careers">
          <div class="row">
            <div class="col-md-4">
              <div class="careers-title">Careers at Salty Sow</div><img src="images/white-chevron.png" width="38" height="67" style="margin-top: -90px; margin-left: 140px;"/>
            </div>
            
            <div class="col-md-5">
              <div class="careers-blurb">We’re always looking for talented folks to join our team.</div>
            </div>
            <div class="col-md-3">
              <a href="http://saltysow.com/SaltySow_EmploymentApp2013.pdf">Apply today.</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-1 col-sm-1"></div>
    </div>
    
    <div class="row mobile-hide">
      <div class="col-lg-2 col-md-1 col-sm-1"></div>
      <div class="col-lg-8 col-md-10 col-sm-10">
        <div id="line">	
          <hr style="color: #DA5030; background: #DA5030; width: auto; height: 2px; margin: 4px 15px 80px 15px;" />
        </div>
      </div>
      <div class="col-lg-2 col-md-1 col-sm-1"></div>
    </div>
    
  </div>
</div>
</div>

<!-- SECTION 4 -->
<div id="findus" class="page"><a id="rewards"></a>
<div id="rewards" class="fancyscroll-section">
  <div class="rewards-banner mobile-hide"><img src="images/rewards-banner.jpg" class="img-responsive"/></div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6">
        <div class="rewards-title">Join the Club</div>
        <div class="rewards-text">Salty Sow Rewards are simple. Sign up today and recieve a <strong>$5 credit for every $50 spent</strong> at your neighborhood Salty Sow. You’ll also recieve <strong>Members-Only Exclusives</strong>, such as Birthday Bonuses and First-to-know specials...</div>
        <div class="rewards-button"><a href="http://guyandlarryrestaurants.alohaenterprise.com:8080/efMemberLinkLogin.do" target="_blank">Register Now!</a></div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="rewards-img"><img src="images/rewards.png" class="img-responsive" /></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-sm-8" class="zigzag">
        <div class="fine-title">The Fine Print</div>
        <div class="fine-print push-left">Salty Sow rewards dollars are not redeemable for cash and cannot be used for tax, gratuity, or the purchase of gift cards. Credit accrues every time you dine at a Salty Sow location and present your rewards card at the time of payment. Salty Sow rewards may be redeemed after 5pm daily.</div>
      </div>
      <div class="col-md-4 col-sm-4" class="zigzag">
        <div class="fine-title">Questions?</div>
        <div class="fine-print">We’re here to help. Contact us at <a href="mailto:info@saltysow.com">info@saltysow.com</a> for enrollment and existing account information.</div>
      </div>
    </div>
  </div>
</div>
</div>

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
	<script src="scripts/bootstrap-modals.js"></script>

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


    <script type="text/javascript">
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


</body>
</html>