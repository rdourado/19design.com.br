<?php

/* Functions */

$t_url = get_stylesheet_directory_uri();
$admin_email = antispambot( get_option( 'admin_email' ) );

function t_url() {
	global $t_url;
	echo $t_url;
}

function admin_email() {
	global $admin_email;
	echo $admin_email;
}

function my_logo() {
	global $t_url;
	if ( is_home() )
		echo '<h1 id="logo"><img src="' . $t_url . '/img/19-design.png" alt="19 Design" width="90" height="28"></h1>';
	else
		echo '<div id="logo"><a href="' . home_url( '/' ) . '"><img src="' . $t_url . '/img/19-design.png" alt="19 Design" width="90" height="28"></a></div>';
}

/* Actions */

add_action( 'after_setup_theme', 'my_setup' );
add_action( 'wp_enqueue_scripts', 'my_scripts' );
add_action( 'init', 'my_unregister_taxonomy' );

function my_setup() {
	register_nav_menu( 'primary', 'Menu' );

	add_theme_support( 'post-thumbnails', array( 'post' ) );
	set_post_thumbnail_size( 210, 210, true );
}

function my_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.8.3.min.js', false, false, true );
	wp_enqueue_script( 'jquery' );

	global $t_url;
	wp_enqueue_script( 'tinyscrollbar', "{$t_url}/js/jquery.tinyscrollbar.min.js", array( 'jquery' ), null, true );
	// wp_enqueue_script( 'tinyscrollbar', "{$t_url}/js/jquery.tinyscrollbar.js", array( 'jquery' ), null, true );
	wp_enqueue_script( 'columnizer', "{$t_url}/js/jquery.columnizer.js", array( 'jquery' ), null, true );
	wp_enqueue_script( 'slick', "{$t_url}/js/slick.min.js", array( 'jquery' ), null, true );
	wp_enqueue_script( 'interface', "{$t_url}/js/interface.js", array( 'jquery' ), filemtime( TEMPLATEPATH . '/js/interface.js' ), true );
}

function my_unregister_taxonomy() {
    global $wp_taxonomies;
    $taxonomy = 'post_tag';
    if ( taxonomy_exists( $taxonomy ) )
      unset( $wp_taxonomies[$taxonomy] );
}

/* Admin */

add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
add_action( 'wp_dashboard_setup', 'example_remove_dashboard_widgets' );
add_filter( 'show_admin_bar', '__return_false' );
remove_action( 'personal_options', '_admin_bar_preferences' );

function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Trabalhos';
	$submenu['edit.php'][5][0] = 'Todos os Trabalhos';
	echo '';
}

function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Trabalhos';
	$labels->singular_name = 'Trabalho';
	$labels->add_new = 'Adicionar Novo';
	$labels->add_new_item = 'Adicionar novo trabalho';
	$labels->edit_item = 'Editar Trabalhos';
	$labels->new_item = 'Trabalho';
	$labels->view_item = 'Ver Trabalhos';
	$labels->search_items = 'Procurar trabalhos';
	$labels->not_found = 'Nenhum trabalho encontrado';
	$labels->not_found_in_trash = 'Nenhum trabalho encontrado no lixo';
}

function example_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
}

/* Taxonomy */

add_action( 'init', 'register_taxonomy_clientes' );

function register_taxonomy_clientes() {

	$labels = array(
		'name' => 'Clientes',
		'singular_name' => 'Cliente',
		'search_items' => 'Search Clientes',
		'popular_items' => 'Popular Clientes',
		'all_items' => 'All Clientes',
		'parent_item' => 'Parent Cliente',
		'parent_item_colon' => 'Parent Cliente:',
		'edit_item' => 'Edit Cliente',
		'update_item' => 'Update Cliente',
		'add_new_item' => 'Add New Cliente',
		'new_item_name' => 'New Cliente',
		'separate_items_with_commas' => 'Separate clientes with commas',
		'add_or_remove_items' => 'Add or remove Clientes',
		'choose_from_most_used' => 'Choose from most used Clientes',
		'menu_name' => 'Clientes',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => false,
		'show_ui' => true,
		'show_tagcloud' => false,
		'show_admin_column' => true,
		'hierarchical' => true,

		'rewrite' => true,
		'query_var' => true
	);

	register_taxonomy( 'clientes', array('post'), $args );
}
