var plan = require('flightplan');

plan.target('production', [
  {
    host: 'pluto.ajskelton.com',
    username: 'anthony',
    // port:2222,
    agent: process.env.SSH_AUTH_SOCK
  }
]);

// run commands on localhost
plan.local(function(local) {

  local.log('Copy files to remote hosts');
  var filesToCopy = local.exec('git ls-files', {silent: true});
  if(plan.runtime.target === 'production') {
    var webRoot = '~/anthonyskelton.com/public/';
  }
  // rsync files to all the destination's hosts
  local.transfer(filesToCopy, webRoot + 'wp-content/themes/ajs-genesis-child');
});