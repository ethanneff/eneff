var plan = require('flightplan');

// configuration
plan.target('production', [
  {
    host: 'eneff.com',
    username: 'enefjzpu',
    port: 21098,
    agent: process.env.SSH_AUTH_SOCK,
    webroot: '/home/enefjzpu/www',
  },
]);

// run commands on localhost
plan.local(function(local) {
  local.log('Copy files to remote hosts');
  var filesToCopy = local.exec('git ls-files', {silent: false});
  local.transfer(filesToCopy, 'www');
});