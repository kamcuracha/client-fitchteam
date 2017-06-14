# gulp-modules-version-check

> node modules version check for gulp

## Install

```
npm install gulp-modules-version-check -D
```

## Examples

```
var gulp = require('gulp');
var modulesVersionCheck = require('gulp-modules-version-check');

gulp.task('modules_version_check', function() {
  return gulp.src('./index.js')
    .pipe(modulesVersionCheck({
      update: true,
      match: /gul/
    }));
});

gulp.task('default', ['modules_version_check']);
```

## License

* MIT
