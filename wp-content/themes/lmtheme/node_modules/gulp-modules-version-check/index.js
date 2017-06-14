'use strict';

var modulesVersionCheck = require('modules-version-check');
var through2 = require('through2');
var gutil = require('gulp-util');

module.exports = function(options) {
  return through2.obj(function(file, enc, cb) {
    modulesVersionCheck(options, function() {
      cb();
    });
  });
};
