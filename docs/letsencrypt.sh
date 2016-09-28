#!/bin/bash

# https://certbot.eff.org/#ubuntuxenial-apache

# install
sudo apt-get install python-letsencrypt-apache
letsencrypt --apache -d eneff.io -d test.eneff.io -d organize.eneff.io -d portfolio.eneff.io -d branch.eneff.io
letsencrypt renew # cronjob