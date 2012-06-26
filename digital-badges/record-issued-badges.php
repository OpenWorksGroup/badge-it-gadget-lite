<?php

//Badge-It Gadget Lite v0.5.0 - Simple scripted system to award and issue badges into Mozilla Open Badges Infrastructure
//Copyright (c) 2012 Kerri Lemoie, Codery - gocodery.com
//Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php

/*This script is called by the OpenBadges.issue callback to record issued badges*/

	include '../process-badges/gadget-settings.php';

	$date = date('Y-m-d');

	//Write badge to badge_records.txt file
	$badgeRecordsFile = $root_path . $badge_records_file;
	
	$badgeHandle = fopen($badgeRecordsFile, 'a'); 
	$badge_data = "BADGE ISSUED: ".$date.", ".$_POST['data']."\n";
	
	if (fwrite($badgeHandle, $badge_data) === FALSE) {
		$err .= '<div class="badge-error">Cannot write to file (".$badgeRecordsFile."). Please check your $root and $badge_records_file in gadget_settings.php</div>';
	}
	
	fclose($badgeHandle);
	
?>	