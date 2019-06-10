<?php
//$sidebar    = metropoly_option('blog_archive_sidebar');
$layout     = metropoly_option('layout');
$blog_pagination_type = metropoly_option('blog_pagination_type');

$infinite_scroll = '';
if( $blog_pagination_type == 'infinite_scroll' )
$infinite_scroll = 'metropoly-infinite-scroll';

 global $metropoly_blog_style ,$metropoly_css_class ;
 $metropoly_css_class = '';
 switch( $metropoly_blog_style ){
	 
	 case 2:
	 $metropoly_css_class  = 'blog-list-wrap blog-grid row';
	 get_template_part('archive','blog');
	 break;
	 case 3:
	 $metropoly_css_class  = 'blog-list-wrap blog-aside-image';
	 get_template_part('archive','blog');
	 break;
	 case 4:
	 $metropoly_css_class  = '';
	 get_template_part('archive','blog4');
	 break;
	 case 1:
	 default:
	 $metropoly_css_class  = 'blog-list-wrap';
	 get_template_part('archive','blog');
	 break;
	 
	 }