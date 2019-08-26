<?php
   header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0"); // Dont cache
   header("Pragma: no-cache"); // Dont cache
   header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); // Make sure it expired in the past (this can be overkill)
?>
<!DOCTYPE html>
   <!--[if IE 7]>
      <html class="ie ie7" <?php language_attributes(); ?>>
   <![endif]-->
   <!--[if IE 8]>
      <html class="ie ie8" <?php language_attributes(); ?>>
   <![endif]-->
   <!--[if !(IE 7) & !(IE 8)]><!-->
   <html <?php language_attributes(); body_class(); ?> style="margin-top: 0!important;">
   <!--<![endif]-->

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title>
            The Motley Fool Test <?php wp_title(); ?>
        </title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    </head>

    <body <?php body_class(); ?>>
        <header id="header">
            <div class="container">
                <div id="tagline" class="c-half">
                    <div class="c-inner">
                      <a href="/">
                        <h1>Motley Fool Test</h1>
                      </a>
                    </div>
                </div>
            </div>
        </header>
