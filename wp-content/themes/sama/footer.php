<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>
<?php
global $smartpay_options;
?>
<section class="bottom">
	<div class="container">
		<div class="dotbottom"></div>
	</div>
</section>
<!--footer-->
<!--footer-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4 ftlogo"><img src="<?php echo get_template_directory_uri() ?>/assets/imgs/Jatakawhite.svg" alt="" /></div>
			<div class="col-12 col-md-4 text-center ftcopy">© 2020 <img src="<?php echo get_template_directory_uri() ?>/assets/imgs/Frame.png" alt="" class="w-25" /></div>
			<div class="col-12 col-md-4 ftlink"><a href="https://www.facebook.com/NXBDUBUT"><img src="<?php echo get_template_directory_uri() ?>/assets/imgs/facebook.svg" alt="" /></a> <a href="http://hoamuoigio.xyz/instagram.com/dubut.books"><img src="<?php echo get_template_directory_uri() ?>/assets/imgs/Instagram.svg" alt="" /></a></div>
		</div>
	</div>
	<div class="footend"><a href="https://www.behance.net/moonbeamst" target="_blank">A Website by Moonbeam</a></div>
</footer>
<?php wp_footer(); ?>
</body>

</html>