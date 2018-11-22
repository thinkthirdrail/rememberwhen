<?php get_header();?>

<div class="main-content">
    <div class="post-excerpt">
        <div class="wrapper">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                        <div class="item-list">
                            <div class="item-image_1 item-image">
                                <?php the_post_thumbnail();?>
                            </div>

                            <div class="item-summary">
                                <div class="item-title"><a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
                                <div class="divider"></div>
                                </div>

                                <p><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink();?>"><button class="outline-on-light">See More</button></a>
                            </div>
                        </div>
                    <?php endwhile;?>

                    <?php else :
                        echo "<p>Posts Coming Soon!</p>";
                    endif;?>
        </div><!-- END WRAPPER -->
    </div><!-- END POST EXCERPT -->
</div><!-- END MAIN CONTENT -->

<?php get_footer();?>
