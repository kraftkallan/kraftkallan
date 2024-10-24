<!DOCTYPE html>
<html data-sk-theme="light">

	<head>

		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title('|', true, 'right'); bloginfo( 'name' ) ?></title>
		
		<?php wp_head(); ?>

	</head>

	<body class="">
		<?php get_header(); ?>		
		<main class="sk-container sk-is-max-desktop sk-main sk-content sk-padding--default">
	
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	
				if ( has_post_thumbnail() && is_front_page()) {
					the_post_thumbnail('large');
				} ?>

				<h1>
					<?php the_title(); ?>
				</h1>
	
				<?php the_content(); ?>			
	
			<?php endwhile; ?>
	
				<?php
					if ( get_next_posts_link() ) {
						next_posts_link();
					}
				?>
				<?php
					if ( get_previous_posts_link() ) {
						previous_posts_link();
					}
				?>
	
			<?php else: ?>
	
				<p>No posts found.</p>
	
			<?php endif; ?>
	
			<?php wp_footer(); ?>
			
		</main>
		
		<?php get_footer(); ?>

	</body>

</html>
