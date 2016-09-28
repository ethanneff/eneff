#!/bin/bash

git commit -am "";
npm install flightplan --save-dev;
fly prod;