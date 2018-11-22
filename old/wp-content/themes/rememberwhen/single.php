<?php get_header();?>
<div class="main-content">
    <div class="wrapper">
        <?php if(have_posts()) : while(have_posts()) : the_post();?>
            <h1><?php the_title();?></h1>
            <div class="divider"></div>
            <p><?php the_content();?></p>
        <?php endwhile; endif;?>
    </div><!-- END WRAPPER --> -->
</div><!-- END MAIN CONTENT -->
<?php get_footer();?>
