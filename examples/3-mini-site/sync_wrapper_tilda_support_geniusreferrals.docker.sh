#!/bin/bash
echo "----------> Starting running sync.php at $(date)";
#/usr/local/bin/php -d memory_limit=1024m /var/www/tilda-en-geniusreferrals/examples/3-mini-site/sync.php
/usr/local/bin/php -d memory_limit=1024m /var/www/tilda-support-geniusreferrals/examples/3-mini-site/sync.php > /proc/1/fd/1 2>/proc/1/fd/2
echo "----------> Ending running sync.php at $(date)";

