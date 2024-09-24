<?php 

add_action( 'wp_enqueue_scripts', 'kraftkallan_enqueue_styles' );

function kraftkallan_enqueue_styles() {
	wp_enqueue_style( 
		'kraftkallan-main',
		get_parent_theme_file_uri( 'dist/kraftkallan.css' )
	);
}