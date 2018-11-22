<?php get_header();?>
<div class="main-content">

    <div class="project-head">
        <h1><?php the_title();?></h1>
        <div id="owl-project" class="owl-carousel">
        <?php if( have_rows('header_images') ): ?>
            <?php while( have_rows('header_images') ): the_row(); ?>
                    <?php the_sub_field("large_image");?>
                        <img src="<?php the_sub_field("head_images");?>" class="wide"/>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
        <!-- <?php the_post_thumbnail();?> -->
    </div><!-- project head -->

    <div class="wrapper">
        <?php if(have_posts()) : while(have_posts()) : the_post();?>
            <div class="divider"></div>
            <p><?php the_content();?></p>
        <?php endwhile; endif;?>
    </div><!-- END WRAPPER -->
</div><!-- END MAIN CONTENT -->

<script>
$(".owl-carousel").owlCarousel({

    animateOut: 'fadeOut',
  loop:true,
  autoplay: true,
  items: 1

});
</script>
<?php get_footer();?>
