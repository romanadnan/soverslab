<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */
?>

<!doctype html>
<html lan="<?php language_attributes(); ?>" class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	

	<title>Landing Free HTML Template by Untree.co</title>
	<?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="100" <?php body_class(); ?>>
	
	<?php wp_body_open(); ?>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
		<div class="site-mobile-menu-close">
			<span class="icofont-close js-menu-toggle"></span>
		</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<?php get_template_part( 'template-parts/content', 'header' ); ?>
	
	<div id="content" class="site-content">