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

<div id="owl" class="owl-carousel"><?php if( have_rows('logos') ): ?>
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
jQuery(document).ready(function($){
  resizeSections();
  $(window).resize(function(){
  	resizeSections();
  });
  $(".owl-carousel").owlCarousel({
	
	navigation : false, // Show next and prev buttons
	slideSpeed : 100,
	paginationSpeed : 400,
	autoplay: true,
	items : 2,
	loop: true,
	pauseOnHover: true,
	itemsDesktop : false,
	itemsDesktopSmall : false,
	itemsTablet: false,
	itemsMobile : false,
	animateOut: 'fadeOut',
	dots: false
	
	});
});
function resizeSections(){
	if($(".header-image .owl-carousel").length > 0){
		$(".main-content .text-container").attr("style","");
		$(".header-image").attr("style","");
		$(".main-content").attr("style","");
		$(".header-image .owl-item .item img").attr("style","");
		setTimeout(function(){
			sectionHeight = $(".header-image .owl-carousel").height();
			if(sectionHeight > 0){
				var leftSection = $(".main-content .text-container");
				var leftSectionPaddingTop = $(".main-content .text-container").css("padding-left");
				var leftSectionPaddingBottom = $(".main-content .text-container").css("padding-left");
				leftSectionPaddingTop = leftSectionPaddingTop.replace("px","");
				leftSectionPaddingBottom = leftSectionPaddingTop.replace("px","");
				var totalPadding = parseInt(leftSectionPaddingTop) + parseInt(leftSectionPaddingBottom);
				
				var menuHeight = $(".menu-bar").outerHeight();
				if($(".menu-bar").css("display") == "none"){
					menuHeight = 0;
				}
				
				var newSectionHeight = jQuery(window).height() - menuHeight - $("header").outerHeight();
				$(".main-content .text-container").height(newSectionHeight - totalPadding);
				$(".header-image").height(newSectionHeight);
				//$(".header-image .owl-item .item img").height(newSectionHeight);
				$(".header-image").css("top",menuHeight + $("header").outerHeight()+"px");
				$(".main-content").css("min-height",0);
			}
		},500);
	  }else if($(".header-image").length > 0){
	  	$(".main-content .text-container").attr("style","");
		$(".header-image").attr("style","");
		$(".main-content").attr("style","");
		setTimeout(function(){
			sectionHeight = $(".header-image").height();
			if(sectionHeight > 0){
				var leftSection = $(".main-content .text-container");
				var leftSectionPaddingTop = $(".main-content .text-container").css("padding-left");
				var leftSectionPaddingBottom = $(".main-content .text-container").css("padding-left");
				leftSectionPaddingTop = leftSectionPaddingTop.replace("px","");
				leftSectionPaddingBottom = leftSectionPaddingTop.replace("px","");
				var totalPadding = parseInt(leftSectionPaddingTop) + parseInt(leftSectionPaddingBottom);
				$(".main-content .text-container").outerHeight(sectionHeight);
				$(".header-image").height(sectionHeight);
				
				var menuHeight = $(".menu-bar").outerHeight();
				if($(".menu-bar").css("display") == "none"){
					menuHeight = 0;
				}
				
				$(".header-image").css("top",menuHeight + $("header").outerHeight()+"px");
				$(".main-content").css("min-height",0);
			}
		},500);
	  }
}
</script>

<?php get_footer();?>
