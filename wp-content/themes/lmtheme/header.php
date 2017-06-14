<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head <?php hybrid_attr( 'head' ); ?>>
  <?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<header class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img class="img-responsive my3" src="<?php echo get_template_directory_uri(); ?>/assets/images/img-logo-main.png" alt=""></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <div class="navbar-holder navbar-right py3">
                <?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>
            </div>
        </div>
    </div>
</header>