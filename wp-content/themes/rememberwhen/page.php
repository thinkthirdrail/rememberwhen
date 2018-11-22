<?php get_header();?>

<?php if(has_post_thumbnail()) :?>

<?php endif;?>

<div class="main-content">

    <div class="text-container <?php if( !have_rows('slide_image') ){ echo "noheaderimage"; }?>">

        <div class="wrapper">

            <?php if(have_posts()) : while(have_posts()) : the_post();?>
                <h1><?php the_title();?></h1>
                <div class="divider"></div>
                <p><?php the_content();?></p>
            <?php endwhile; endif;?>

        </div><!-- END MAIN CONTENT WRAPPER -->
</div>

        <?php

    if( have_rows('slide_image') ) { ?>

    <style>
        .text-container {
            width: 50%;
        }
    </style>

        <div class="header-image">

            <div id="owl" class="owl-carousel">

            <?php while ( have_rows('slide_image') ) : the_row();?>

            <div class="item"><img src="<?php the_sub_field('fading_image');?>" /></div>

            <?php endwhile;?>

            </div>
        </div>

    <?php } else { ?>
  	    <style>.main-content .text-container {width: 100% !important;}</style>
  	<?php } ?>

<script>
jQuery(document).ready(function($){
  $(".owl-carousel").owlCarousel({
      animateOut: 'fadeOut',
    loop:true,
    autoplay: true,
    items: 1
  })
  resizeSections();
  $(window).resize(function(){
  	resizeSections();
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
				var leftSectionPaddingTop = leftSection.css("padding-left");
				var leftSectionPaddingBottom = leftSection.css("padding-left");
				leftSectionPaddingTop = leftSectionPaddingTop.replace("px","");
				leftSectionPaddingBottom = leftSectionPaddingTop.replace("px","");
				var totalPadding = parseInt(leftSectionPaddingTop) + parseInt(leftSectionPaddingBottom);
				//$(".header-image").css("top",$(".menu-bar").outerHeight() + $("header").outerHeight()+"px");
				var menuHeight = $(".menu-bar").outerHeight();
				if($(".menu-bar").css("display") == "none"){
					menuHeight = 0;
				}
				if ( $(window).width() == 1024 ) {
					var newSectionHeight = jQuery(window).height() - menuHeight - $("header").outerHeight();
					console.log(newSectionHeight);
				} else if ( $(window).width() > 830 ) {
					var newSectionHeight = jQuery(window).height() - menuHeight - $("header").outerHeight();
				} else {
					var newSectionHeight = jQuery(window).height() - menuHeight - $("header").outerHeight() + 98;
				}
				$(".main-content .text-container").height(newSectionHeight - totalPadding);
				$(".header-image").height(newSectionHeight);
				$(".header-image .owl-item .item img").height(newSectionHeight);
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
			//$(".header-image").css("top",$(".menu-bar").outerHeight() + $("header").outerHeight()+"px");
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
