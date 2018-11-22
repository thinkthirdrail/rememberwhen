<?php /* Template Name: Logo */ ?>

<?php get_header();?>

<?php if(has_post_thumbnail()) :?>

<?php endif;?>

<div class="main-content">

    <div class="text-container">

        <div class="wrapper">

            <?php if(have_posts()) : while(have_posts()) : the_post();?>
                <h1><?php the_title();?></h1>
                <div class="divider"></div>
                <p><?php the_content();?></p>
            <?php endwhile; endif;?>

<div id="owl" class="owl"><?php if( have_rows('logos') ): ?>
<?php while( have_rows('logos') ): the_row(); ?>
<div class="logoes"><img src="<?php the_sub_field('logo');?>" alt="logo"/></div>
<?php endwhile; ?>
<?php endif; ?></div>

        </div><!-- END MAIN CONTENT WRAPPER -->
</div>

    <?php if(has_post_thumbnail()) {?>

    <div class="header-image">
        <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );?>
        <style>
        .header-image {
        background-image: url('<?php echo $background[0]; ?>');
        background-size: cover;
        }

        .text-container {
            width: 50%;
        }
        </style>
    <?php } ?>
    </div>


</div><!-- END MAIN CONTENT -->
<script>
$("#owl").owlCarousel({

navigation : false, // Show next and prev buttons
slideSpeed : 100,
paginationSpeed : 400,
autoPlay: true,
items : 2,
stopOnHover: true,
itemsDesktop : false,
itemsDesktopSmall : false,
itemsTablet: false,
itemsMobile : false,
animateOut: 'fadeOut',

});
</script>

<?php get_footer();?>
