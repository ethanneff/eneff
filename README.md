# eneff.com

## website setup

### droplet config

- [add ssh](https://www.digitalocean.com/docs/droplets/how-to/add-ssh-keys/create-with-openssh/)
- create droplet with ssh key access
- [clone eneff.com](https://ethanneff@bitbucket.org/ethanneff/eneff.com.git)
- rsync code
  ```sh
  rsync -a /Users/ethanneff/Desktop/eneff.com/ root@64.227.60.125:/var/www/html/
  ```
- remove access and previous site
  ```sh
  ssh root@64.227.60.125
  rm -rf .htaccess
  rm -rf index.html
  ```

### domain config

- records
  ```
  AAAA www.eneff.com2604:a880:2:d1::1e3 3600
  AAAA eneff.com2604:a880:2:d1::1e3 3600
  A www.eneff.com64.227.60 3600
  A eneff.com64.227.60 3600
  MX eneff.comalt3.aspmx.l.google.com 1800
  MX eneff.comalt4.aspmx.l.google.com 1800
  MX eneff.comaspmx.l.google.com 1800
  MX eneff.comalt1.aspmx.l.google.com 1800
  MX eneff.comalt2.aspmx.l.google.com 1800
  NS eneff.comns2.digitalocean.com 1800
  NS eneff.comns3.digitalocean.com 1800
  NS eneff.com.ns1.digitalocean.com 1800
  ```

### ssl config

- read the [docs](https://www.digitalocean.com/community/tutorials/how-to-secure-apache-with-let-s-encrypt-on-ubuntu-18-04)
- install lets encrypt
  ```sh
  ssh root@64.227.60.125
  sudo add-apt-repository ppa:certbot/certbot
  sudo apt install python-certbot-apache
  ```
- update server name

  ```sh
  sudo nano /etc/apache2/sites-available/eneff.com.conf
  ServerName eneff.com;
  ```

  ```sh
  sudo apache2ctl configtest
  sudo systemctl reload apache2
  ```

- open ports

  ```sh
  sudo ufw allow 'Apache Full'
  sudo ufw delete allow 'Apache'
  sudo ufw status
  ```

- run certbot

  ```sh
  sudo certbot --apache -d eneff.com -d www.eneff.com
  ```

- verify auto renew

  ```sh
  sudo certbot renew --dry-run
  ```

## additonal

```sh
ssh-keygen -t rsa
cat .ssh/id_rsa.pub | ssh -p 21098 -t enefjzpu@eneff.com 'cat >> .ssh/authorized_keys'
```

```sh
git commit -am "";
npm install flightplan --save-dev;
fly prod;
```

```sh
MAILTO="ethan.neff@eneff.com"
SHELL="/bin/bash"
# 0 0 * * * php /home/enefjzpu/www/apps/portfolio/assets/cron/updateGoogleAnalytics.php
```
