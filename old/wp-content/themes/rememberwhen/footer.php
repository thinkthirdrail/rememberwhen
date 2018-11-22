<div id="contact"></div>

<div class="fixed">

<section class="contact">

    <div class="wrapper">
        <div class="contact-wrapper">

            <div class="left-contact-wrapper">
                <h2>Contact Us</h2>
                <div class="divider"></div>
                <?php echo do_shortcode('[contact-form-7 id="30" title="Contact form 1"]');?>
            </div><!-- END LEFT CONTACT WRAPPER -->

            <div class="right-contact-wrapper">
                <h2>Newsletter Signup</h2>
                <div class="divider"></div>

                <!-- Begin MailChimp Signup Form -->

                    <div id="mc_embed_signup">
                    <form action="//rememberwhenuk.us14.list-manage.com/subscribe/post?u=60de260931fdb92c114f411c2&amp;id=edb58eae87" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                    <div class="mc-field-group">
                    	<input type="text" value="" name="NAME" class="required form-name" placeholder="Name *" id="mce-NAME">
                    </div>
                    <div class="mc-field-group">
                    	<input type="email" value="" name="EMAIL" class="required email form-email" placeholder="Email *" id="mce-EMAIL">
                    </div>
                    	<div id="mce-responses" class="clear">
                    		<div class="response" id="mce-error-response" style="display:none"></div>
                    		<div class="response" id="mce-success-response" style="display:none"></div>
                    	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_60de260931fdb92c114f411c2_edb58eae87" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button outline-on-light"></div>
                        </div>
                    </form>
                    </div>
                    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='NAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                    <!--End mc_embed_signup-->

                <div class="social">
                    <a href="https://www.facebook.com/REMEMBER-WHEN-UK-120036348012467/"<i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/rememberwhenuk"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                </div><!-- END SOCIAL -->

                <div class="details"><p>Telephone: +44 (0)1553 770197 | Please call before visiting</p></div>

            </div><!-- END RIGHT CONTACT WRAPPER -->
        </div><!-- END CONTACT WRAPPER -->
    </div><!-- END WRAPPER -->

</section>

<footer>

    <div class="wrapper">
        <p>&copy; Remember When UK | <a href="<?php bloginfo("url");?>/kiosk-information">Kiosk Info</a> | <a href="<?php bloginfo("url");?>/privacy-policy">Privacy Policy</a> | <a href="<?php bloginfo("url");?>/shipping">Shipping</a></p>
        <p class="tag"><a href="http://www.websmartstudio.co.uk">Designed by Websmart</a></p>
    </div>

</footer>

</div><!-- END FIXED -->

<?php wp_footer();?>

</body>
</html>
