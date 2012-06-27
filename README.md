Badge-It-Gadget-Lite
====================

Badge-It Gadget Lite v0.5.0 - Simple scripted system to award and issue badges into Mozilla Open Badges Infrastructure

Copyright (c) 2012 Kerri Lemoie, Codery - [gocodery.com](http://gocodery.com/)

Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php

About
=====
This is a very simple implementation of awarding and issuing badges. It uses Mozilla's issuer api javascript. Because it writes records to a text file, it really is not meant to be used for issuing many badges on a heavy production site. But because it is so simple, it requires very little set-up. Almost a plug and play. This is a starting point and can easily be modified and scaled. Have fun with badges!!


References
==========
https://github.com/mozilla/openbadges/wiki/

https://groups.google.com/d/forum/openbadges


Requirements
============
These scripts have been tested on a CentOS server running Apache 2.0 and PHP 5.3.2. Version PHP 5 and up should work fine.


Files
============
There are three directories: css, digital-badges and process-badges

######css/
style.css - some styles to get started


######digital-badges/
badge-it-gadget-lite-badge-criteria.html - This is an example of a criteria url. Make it your own.

get-my-badge.php - This php script/ html page used to retrieve/issue a badge. 

images/ - this is the directory where you can save your pre-made badges. Remember they need to be PNG files. We made one for you to start. Don't have any badge images yet? Check this site out: http://www.onlineiconmaker.com 

issued/json/ - this is the directory where the badge json files will be stored

record-issued-badges.php - This script is called by the OpenBadges.issue callback in get-my-badge.php to record issued badges in badge_records.txt



######process-badges/
.htaccess - ***You want to password protect this directory*** If you don't, anyone can award badges in your site's name. This file is included as a reminder.

badge_records.txt - empty text file to which will be written badges that have been awarded and badges that have been issued to the OBI. This is helpful when tracking who got badges and who issued them to their backpacks.

gadget-settings.php - This is where you put in your site and badges settings. Information is provided for each setting.

gadget.php - the script that creates the JSON file, writes to the badge_records.txt file. It's the processing script that awards the badges.  

index.php: The badger form to award the badge to your earner. Award a badge one by one. When you submit the form, the request is processed by gadget.php which will return a link for your earner to retrieve the badge.


Instructions
============

1. Place the badge-it-gadget-lite directory in a public directory in your host files
2. In process-badges/gadget-settings.php make your settings changes and add your badges.
3. In a browser window navigate to badge-it-gadget-lite/process-badges/index.php
4. Give yourself a badge!! (Really - there's a badge in there for you)


Other Notes
===========

Badge-It Gadget Lite is entirely reliant on javascript for badges to be issued. It works best in Firefox and Chrome. Testing in Safari seems unreliable so far in our experience but we'll keep working on it. It doesn't work at all in IE browsers.

Your feedback and questions are welcomed and needed to make this better. Drop an email to hello@gocodery.com or submit to the repo issues.

The next version of Badge-It Gadget will be hardier using a db and forms for badge settings and recording of badges awarded and issued. ETA TBD (but it won't be too long).
