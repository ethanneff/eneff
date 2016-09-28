#!/bin/bash

# https://certbot.eff.org/#ubuntuxenial-apache

# install
sudo apt-get install python-letsencrypt-apache
# 000-default-le-ssl.conf
letsencrypt --apache -d eneff.io -d www.eneff.io -d test.eneff.io -d www.test.eneff.io -d organize.eneff.io -d www.organize.eneff.io -d portfolio.eneff.io -d www.portfolio.eneff.io -d branch.eneff.io -d www.branch.eneff.io
# cronjob
letsencrypt renew