module.exports = function (casper, scenario, vp) {
  // This script runs before your app loads. Edit here to log-in, load cookies or set other states required for your test.
  console.log('onBefore.js has run for ' + vp.name + '.');
};

module.exports = function(casper, scenario, vp) {
  casper.thenOpen(scenario.url+'/user/logout', function(){  });
};
