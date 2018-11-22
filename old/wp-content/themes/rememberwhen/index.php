<?php get_header();?>

<div class="main-content">
    <div class="post-excerpt">
        <div class="wrapper">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                        <h1><?php the_title();?></h1>
                        <div class="divider"></div>
                        <p><?php the_excerpt();?></p>
                        <a href="<?php the_permalink();?>"><button class="outline-on-light">See More</button></a>
                    <?php endwhile;?>

                    <?php else :
                        echo "<p>Posts Coming Soon!</p>";
                    endif;?>
        </div><!-- END WRAPPER -->
    </div><!-- END POST EXCERPT -->
</div><!-- END MAIN CONTENT -->

<?php get_footer();?>
