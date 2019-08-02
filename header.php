<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- DO3 -->
<?php wp_head(); ?>
	<style>
		html {
			margin-top: 0!important;
		}
	</style>
</head>

<body <?php body_class(); ?>>
<div class="top-bar"></div>
<div id="page" class="site">
	<div id="content" class="site-content wrapper">
