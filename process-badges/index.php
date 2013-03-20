<?php 

//Badge-It Gadget Lite v0.5.0 - Simple scripted system to award and issue badges into Mozilla Open Badges Infrastructure
//Copyright (c) 2012 Kerri Lemoie, Codery - gocodery.com
//Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php

/*The form to award the badge to your earner. Award a badge one by one. When you submit the form, the request is processed by gadget.php which will return a link for your earner to retrieve the badge.*/

session_start(); 

include 'gadget-settings.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Badge-It Gadget Lite Badger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Badge-It Gadget Lite Badger">

		<link rel="stylesheet" href="../css/style.css">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js type="text/javascript"></script>


  </head>

  <body>
	
		<div class="light-bg-container">
			
		<header>
			<H1>Gadget Badger</H1>
		</header>
	
		<?php 
			//Get session info retruned from gadget.php
		
			if(isset($_SESSION['bf_returndata'])) { 
				$bf = $_SESSION['bf_returndata'];
			}
		
			if ($bf['success']) {
				print $bf['success'];
			}
		
			if ($bf['errors']) {
				print $bf['errors']; 
			}
		?>
	
		<!-- Gadget Badger Form -->
		
		<form id="badgerForm" method="post" action="gadget.php">
		
		<?php
		//Set up the badge select drop down
		$badge_select = '<label for="badge_info">Select a badge to issue:<span class="required">*</span></label> <select id="badge_info" name="badge_info">';
		
		for ($i = 1; $i <= count($badges_array); ++$i) {
			if ($i == $bf['posted_form_data']['badgeId']) {
				$badge_select .= '<option value="' . $i . '" selected>' . $badges_array[$i]['name'] . '</option>';	
			}
			else {
				$badge_select .= '<option value="' . $i . '">' . $badges_array[$i]['name'] . '</option>';
			}	
		}

		$badge_select .= '</select>';

		?>
			<div class="formRow"><?php print $badge_select; ?></div>
			<div class="formRow"><label>Recipient Name:<span class="required">*</span></label> <input type="text" id="name" name="badge_recipient_name" value="<?php print $bf['posted_form_data']['badgeRecipient']?>" required></div>
			<div class="formRow"><label>Recipient Email:<span class="required">*</span></label> <input type="text" id="email" name="badge_recipient_email" value="<?php print $bf['posted_form_data']['badgeRecipientEmail']?>" required></div>
			<div class="formRow"><label>Badge Evidence URL: </label> <input type="text" name="badge_evidence_url" value="<?php print $bf['posted_form_data']['badgeEvidenceUrl']?>" ></div>
			<div class="formRow"><input class="submit" id="submit-button" type="submit" value="Award Badge"/></div>
		</form>
		
		<?php unset($_SESSION['bf_returndata']); ?>
		
		</div>
	
	</body>
	
</head>
