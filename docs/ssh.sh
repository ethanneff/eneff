#!/bin/bash

ssh-keygen -t rsa
cat .ssh/id_rsa.pub | ssh -p 21098 -t enefjzpu@eneff.com 'cat >> .ssh/authorized_keys'

ssh root@104.131.89.254
ssh root@eneff.io
ssh eneff@eneff.io
sftp eneff@eneff.io