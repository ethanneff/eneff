// 'fly prod'
var plan = require('flightplan');

// configuration
plan.target('prod', [
  {
    host: 'eneff.io',
    username: 'eneff',
    agent: process.env.SSH_AUTH_SOCK,
    webroot: '/var/www/html',
  },
]);

// run commands on localhost
plan.local(function(local) {
  local.log('Copy files to remote hosts');
  var filesToCopy = local.exec('git ls-files', {silent: false});
  local.transfer(filesToCopy, 'www');
});