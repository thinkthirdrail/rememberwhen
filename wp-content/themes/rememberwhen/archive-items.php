<?php get_header();?>
<div class="categories-bar"><p>Categories</p></div>
<div class="item-categories">
    <div class="wrapper">

        <?php if ( is_active_sidebar( 'project-cat' ) ) : ?>
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'project-cat' ); ?>
    </div><!-- #primary-sidebar -->
<?php endif; ?>
 </div>
</div><!-- END ITEM CATEGORIES -->
<script>
$(".categories-bar").click(function() {
    $(".item-categories").slideToggle("1000");
});
</script>
<div class="main-content">

<div id="product-list">

<?php if(have_posts()) : while(have_posts()) : the_post();?>

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

<?php endwhile; endif;?>

<?php $total_pages = $wp_query->max_num_pages;
if ($total_pages > 1){ ?>
    <div class="navigation">
        <div class="wrapper">
            <p><?php pagination_bar(); ?></p>
        </div>
    </div>
<?php } ?>

<script>
$(".item-list").hover(function(){
    $(".item-list").not(this).css("opacity" , "0.5");
    }, function(){
    $(".item-list").not(this).css("opacity" , "1");
});
</script>

</div><!-- END PRODUCT LIST -->
</div>

<?php get_footer();?>
