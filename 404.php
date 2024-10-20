<!DOCTYPE html>
<html data-sk-theme="light">

	<head>

		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo 'Sidan kan inte hittas | ' . bloginfo( 'name' ) ?></title>
		
		<?php wp_head(); ?>

	</head>

	<body class="">
		<?php get_header(); ?>		
		<main class="sk-container sk-is-max-desktop sk-main sk-content sk-padding--default">
	
			<h1>Hoppsan! Sidan kan inte hittas...</h1>
	
      <?php get_search_form() ?>


			<?php wp_footer(); ?>
			
		</main>
		
		<?php get_footer(); ?>

	</body>

</html>
