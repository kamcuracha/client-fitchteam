sass-font-awesome
======

Sass-only package for the iconic [Font Awesome](http://fontawesome.io) project with additional features

Currently using [Font Awesome](http://fontawesome.io) v4.7.0


## Additional features

### Silent classes
All icon classes have their silent equivalents e.g. `.fa-check` => `%fa-check`

### Allowed icons
You can specify icon classes to be compiled into the final css style by defining a list of icon names into variable `$fa-allowed-icons`.

#### Example
```sass
$fa-allowed-icons: check times;
```
Will result in generating only `.fa-check` and `.fa-times` classes along with all feature classes (e.g. `.fa-fw`, `.fa-3x` etc.). Silent classes will be available for all the rest of icons.
