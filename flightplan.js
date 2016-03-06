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
  // uncomment these if you need to run a build on your machine first
  // local.log('Run build');
  // local.exec('gulp build');

  local.log('Copy files to remote hosts');
  var filesToCopy = local.exec('git ls-files', {silent: false});
  // rsync files to all the destination's hosts
  local.transfer(filesToCopy, 'bob.txt');  // ~/
});