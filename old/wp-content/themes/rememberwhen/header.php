<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Based in Norfolk, UK, Carl Burge at Remember When specialises in the sales, restoration, installation, hire & shipping of the iconic British Red Telephone Box. We also offer kiosk spares plus a unique range of other British collectables.">
    <title><?php title_tag();?></title>
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/parallax.min.js" async></script>
    <link href="<?php echo get_stylesheet_directory_uri();?>/css/easyzoom.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri();?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri();?>/css/owl.theme.css" rel="stylesheet">
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/easyzoom.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91604480-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<?php wp_head();?>
<body <?php body_class(); ?>>

<div class="scrollable">


<div class="menu-bar"><p>Menu</p></div>

<header>

    <div class="wrapper">
        <a href="<?php echo home_url();?>/"><img src="<?php echo get_template_directory_uri();?>/images/logosmall.png" alt="logo "width="283" height="103" id="logo-small" /></a>
        <nav class="main">
            <?php wp_nav_menu( array( 'theme_location' => 'main-navigation' ) ); ?>
        </nav>
    </div><!-- END HEADER WRAPPER -->

</header>

<div class="resp-menu">

        <nav id="nav-menu">
            <?php wp_nav_menu( array( 'theme_location' => 'main-navigation' ) ); ?>
        </nav>


</div><!-- END RESP MENU -->

<script>
$(".menu-bar").click(function() {
    $(".resp-menu").slideToggle("1000");
});

$("li.menu-item-has-children").click(function(){
    $(".sub-menu").slideToggle("1000");
})
</script>
