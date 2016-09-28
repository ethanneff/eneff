#!/bin/bash

# https://www.digitalocean.com/community/tutorials/how-to-launch-your-site-on-a-new-ubuntu-14-04-server-with-lamp-sftp-and-dns?utm_source=Customerio&utm_medium=Email_Internal&utm_campaign=Email_LAMPWelcome&mkt_tok=eyJpIjoiWmpCaE5UTmpOVGd3TURFMiIsInQiOiJcLzFRODRUUlZ3ZFd2djh6a1VHN3pEM0d2UmhwaklBR3Z5XC9rdnBXMmxKeURwRmZ6dmZNODdoaUw4dW5lOWpDTnIydXB1eG1QZno4elRiUXlcL0d2REJtTXZ0czM0MUNoYk9BelpyTzJNXC9yVDg9In0%3D
# https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-14-04

ssh root@104.131.89.254
adduser eneff
sudo usermod -aG sudo eneff
gpasswd -a eneff sudo
ssh-copy-id eneff@104.131.89.254
nano /etc/ssh/sshd_config # PermitRootLogin no (have not gotten to work)
service ssh restart