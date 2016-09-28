# eneff.com

```
ssh-keygen -t rsa
cat .ssh/id_rsa.pub | ssh -p 21098 -t enefjzpu@eneff.com 'cat >> .ssh/authorized_keys'
```

```
git commit -am "";
npm install flightplan --save-dev;
fly prod;
```