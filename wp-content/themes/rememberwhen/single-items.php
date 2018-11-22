<?php get_header();
if(have_posts()) : while(have_posts()) : the_post();?>

<div class="product">

    <div id="product-image">

        <div id="owl-demo" class="owl-carousel">
        <?php if( have_rows('images') ): ?>
            <?php while( have_rows('images') ): the_row(); ?>
                <div class="easyzoom easyzoom--overlay">
                    <a href="<?php the_sub_field("large_image");?>">
                        <img src="<?php the_sub_field("small_image");?>" class="wide"/>
                    </a>
                </div><!-- END EASY ZOOM -->
            <?php endwhile; ?>
        <?php endif; ?>
        </div>

    </div><!-- END PRODUCT IMAGE -->

    <div class="product-description">
        <div class="product-content">
            <div class="product-name">
                <h1><?php the_title();?></h1>
            </div><!-- END PRODUCT NAME -->

        <div class="divider"></div>

        <div class="product-summary">
            <h2>Product Description</h2>
            <p><?php the_field("product_description");?></p>
        </div><!-- END PRODUCT SUMMARY -->

        <?php if(get_field('what_we_know')) :?>
            <div class="product-wwk">
                <h2>What We Know</h2>
                <p><?php the_field("what_we_know");?></p>
            </div><!-- END PRODUCT SUMMARY -->
        <?php endif; ?>

        <?php if(get_field('price')) :?>
            <div class="product-price">
                <h2>£<?php the_field("price");?></h2>
            </div><!-- END PRODUCT PRICE -->
        <?php endif; ?>

        <div class="buttons">
            <a href="#contact"><button class="fill-on-dark fill">Enquire</button></a>
            <!-- <button class="outline-on-dark">Share</button> -->

            <!-- AddToAny BEGIN -->
            <a class="a2a_dd" href="https://www.addtoany.com/share"><button class="outline-on-dark">Share</button></a>
            <script async src="https://static.addtoany.com/menu/page.js"></script>
            <!-- AddToAny END -->

        </div><!-- END BUTTONS -->

        </div><!-- END PRODUCT CONTENT -->

    </div><!-- END PRODUCT DESCRIPTION -->

</div><!-- END PRODUCT -->

<script>
jQuery(document).ready(function($){
$("button.fill").click(function() {
    var formFill = $(".product-name h1").html();
    $(".form-message").html("Re:" + " " + formFill);
});

if($(window).width() < 900) {
        $(".product-description").css({'height':($("#product-image").height()+'px')});
    }
if($(window).width() > 1200) {
    // Instantiate EasyZoom instances
		var $easyzoom = $('.easyzoom').easyZoom();
		$('.easyzoom--overlay.is-ready').easyZoom();
}		



$(".owl-carousel").owlCarousel({

dots: true, // Show next and prev buttons
autoplay: true,
items: 1,
loop:true,
autoplayHoverPause: true,
touchDrag: false,
mouseDrag: false
});

$('.owl-carousel .owl-item').on('mouseenter',function(e){
  $(this).closest('.owl-carousel').trigger('stop.owl.autoplay');
})
$('.owl-carousel .owl-item').on('mouseleave',function(e){
  $(this).closest('.owl-carousel').trigger('play.owl.autoplay',[500]);
})
})
</script>

<?php endwhile; endif;
get_footer();
?>
