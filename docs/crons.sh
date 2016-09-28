#!/bin/bash

# ROOT
# /etc/crontab

# crontab -l
# crontab -e

MAILTO="ethan.neff@eneff.com"
SHELL="/bin/bash"

# letsencrypt 3am and 3pm everyday
0 6,15 * * * letsencrypt renew

# update google analytics script
# 0 0 * * * php /home/enefjzpu/www/apps/portfolio/assets/cron/updateGoogleAnalytics.php