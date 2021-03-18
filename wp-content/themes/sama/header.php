<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!--menu-->
  <section>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse text-center" id="navbarText"> <a class="navbar-brand logo-pos d-lg-none" href="#"><span id=""><img src="<?php echo get_template_directory_uri() ?>/assets/imgs/Logo.svg" alt=""/></span></a>
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item "> <?php echo do_shortcode('[3d-flip-book mode="link-lightbox" id="187" template="short-white-book-view" classes="nav-link"]Đọc thử[/3d-flip-book]') ?></li>
                    <li class="nav-item"> <a class="nav-link" href="#comic">Dự án</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#donate">Hùn phước/ Nhận sách</a> </li>
                </ul>
                <a class="navbar-brand logo-pos d-none d-lg-inline-block" href="#"><span id="logo"><img src="<?php echo get_template_directory_uri() ?>/assets/imgs/Logo.svg" alt=""/></span></a>
                <ul class="navbar-nav mr-lg-auto">
                    <li class="nav-item"> <a class="nav-link" href="#teams">Đơn vị thực hiện</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#public">Đã xuất bản</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#footer">Liên hệ</a> </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
  <!--endmenu-->
  <!--banner-->
