<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

if(is_category()):
	get_template_part( 'pages/page', 'news' );
elseif(is_tax('project_type')):
	get_template_part('pages/page','portfolio');
endif;