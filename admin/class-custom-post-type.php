<?php

/**
 * Custom Post Type
 * Author EgensLab
 * @since 1.0.0
 * */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); //exit if access directly
}
if ( ! class_exists( 'Egens_Custom_Post_Type' ) ) {
	class Egens_Custom_Post_Type {

		//$instance variable
		private static $instance;

		public function __construct() {
			//register post type
			add_action( 'init', array( $this, 'register_custom_post_type' ) );
		}

		/**
		 * get Instance
		 * @since  2.0.0
		 * */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register Custom Post Type
		 * @since  2.0.0
		 * */
		public function register_custom_post_type() {
			if (!defined('ELEMENTOR_VERSION')){
				return;
			}
			$all_post_type = array(
				[
					'post_type' => 'egens-case-study',
					'args'      => array(
						'label'              => esc_html__( 'Case Study', 'egens-core' ),
						'description'        => esc_html__( 'Case Study', 'egens-core' ),
						'menu_icon'           => 'dashicons-book',
						'labels'             => array(
							'name'               => esc_html_x( 'Case Study', 'Post Type General Name', 'egens-core' ),
							'singular_name'      => esc_html_x( 'Case Study', 'Post Type Singular Name', 'egens-core' ),
							'menu_name'          => esc_html__( 'Case Study', 'egens-core' ),
							'all_items'          => esc_html__( 'All Case Study', 'egens-core' ),
							'view_item'          => esc_html__( 'View Case Study', 'egens-core' ),
							'add_new_item'       => esc_html__( 'Add New Case Study', 'egens-core' ),
							'add_new'            => esc_html__( 'Add New Case Study', 'egens-core' ),
							'edit_item'          => esc_html__( 'Edit Case Study', 'egens-core' ),
							'update_item'        => esc_html__( 'Update Case Study', 'egens-core' ),
							'search_items'       => esc_html__( 'Search Case Study', 'egens-core' ),
							'not_found'          => esc_html__( 'Not Found', 'egens-core' ),
							'not_found_in_trash' => esc_html__( 'Not found in Trash', 'egens-core' ),
						),
						'supports'           => array( 'title','editor', 'excerpt','thumbnail'),
						'hierarchical'       => true,
						'public'             => true,
						'has_archive' 		=> false,
						"publicly_queryable" => true,
						'show_ui'            => true,
						"rewrite" => array( 'slug' => 'case-study', 'with_front' => true),
						'exclude_from_search'   => false,
						'can_export'         => true,
						'capability_type'    => 'post',
						'query_var'          => true,
						"show_in_rest"		 => false,
					)
				],
				[
					'post_type' => 'egens-attorneys',
					'args'      => array(
						'label'              => esc_html__( 'Attorneys', 'egens-core' ),
						'description'        => esc_html__( 'Attorneys', 'egens-core' ),
						'menu_icon'           => 'dashicons-businessman',
						'labels'             => array(
							'name'               => esc_html_x( 'Attorneys', 'Post Type General Name', 'egens-core' ),
							'singular_name'      => esc_html_x( 'Attorneys', 'Post Type Singular Name', 'egens-core' ),
							'menu_name'          => esc_html__( 'Attorneys', 'egens-core' ),
							'all_items'          => esc_html__( 'All Attorneys', 'egens-core' ),
							'view_item'          => esc_html__( 'View Attorneys', 'egens-core' ),
							'add_new_item'       => esc_html__( 'Add New Attorneys', 'egens-core' ),
							'add_new'            => esc_html__( 'Add New Attorneys', 'egens-core' ),
							'edit_item'          => esc_html__( 'Edit Attorneys', 'egens-core' ),
							'update_item'        => esc_html__( 'Update Attorneys', 'egens-core' ),
							'search_items'       => esc_html__( 'Search Attorneys', 'egens-core' ),
							'not_found'          => esc_html__( 'Not Found', 'egens-core' ),
							'not_found_in_trash' => esc_html__( 'Not found in Trash', 'egens-core' ),
						),
						'supports'           => array( 'title','editor', 'thumbnail'),
						'hierarchical'       => true,
						'public'             => true,
						'has_archive' 		=> false,
						"publicly_queryable" => true,
						'show_ui'            => true,
						"rewrite" => array( 'slug' => 'attorneys', 'with_front' => true),
						'exclude_from_search'   => false,
						'can_export'         => true,
						'capability_type'    => 'post',
						'query_var'          => true,
						"show_in_rest"		 => false,
					)
				],
				[
					'post_type' => 'egens-practice-area',
					'args'      => array(
						'label'              => esc_html__( 'Practice Area', 'egens-core' ),
						'description'        => esc_html__( 'Practice Area', 'egens-core' ),
						'menu_icon'           => 'dashicons-businessman',
						'labels'             => array(
							'name'               => esc_html_x( 'Practice Area', 'Post Type General Name', 'egens-core' ),
							'singular_name'      => esc_html_x( 'Practice Area', 'Post Type Singular Name', 'egens-core' ),
							'menu_name'          => esc_html__( 'Practice Area', 'egens-core' ),
							'all_items'          => esc_html__( 'All Practice Area', 'egens-core' ),
							'view_item'          => esc_html__( 'View Practice Area', 'egens-core' ),
							'add_new_item'       => esc_html__( 'Add New Practice Area', 'egens-core' ),
							'add_new'            => esc_html__( 'Add New Practice Area', 'egens-core' ),
							'edit_item'          => esc_html__( 'Edit Practice Area', 'egens-core' ),
							'update_item'        => esc_html__( 'Update Practice Area', 'egens-core' ),
							'search_items'       => esc_html__( 'Search Practice Area', 'egens-core' ),
							'not_found'          => esc_html__( 'Not Found', 'egens-core' ),
							'not_found_in_trash' => esc_html__( 'Not found in Trash', 'egens-core' ),
						),
						'supports'           => array( 'title','editor', 'thumbnail'),
						'hierarchical'       => true,
						'public'             => true,
						'has_archive' 		=> false,
						"publicly_queryable" => true,
						'show_ui'            => true,
						"rewrite" => array( 'slug' => 'practice-area', 'with_front' => true),
						'exclude_from_search'   => false,
						'can_export'         => true,
						'capability_type'    => 'post',
						'query_var'          => true,
						"show_in_rest"		 => false,
					)
				],
			);
			
			if ( ! empty( $all_post_type ) && is_array( $all_post_type ) ) {
				foreach ( $all_post_type as $post_type ) {
					call_user_func_array( 'register_post_type', $post_type );
				}
			}

			/**
			 * Custom Taxonomy Register
			 */
			$all_custom_taxonmy = array(
				array(
					'taxonomy' => 'egens-case-study-category',
					'object_type' => 'egens-case-study',
					'args' => array(
						"labels" => array(
							"name" => esc_html__( "Case Study Categories", 'egens-core' ),
							"singular_name" => esc_html__( "Case Study Categories", 'egens-core' ),
							"menu_name" => esc_html__( "Case Study Categories", 'egens-core' ),
							"all_items" => esc_html__( "All Case Study Category", 'egens-core' ),
							"add_new_item" => esc_html__( "Add New Case Study Category", 'egens-core' )
						),
						"public" => true,
						"hierarchical" => true,
						'has_archive' => true,
						"show_ui" => true,
						"show_in_menu" => true,
						"show_in_nav_menus" => true,
						"rewrite" => array( 'slug' => 'case-study-category', 'with_front' => true),
						"query_var" => true,
						"show_admin_column" => true,
						"show_in_rest" => false,
						"show_in_quick_edit" => true,
					)
				),
				array(
					'taxonomy' => 'egens-practice-area-category',
					'object_type' => 'egens-practice-area',
					'args' => array(
						"labels" => array(
							"name" => esc_html__( "Practice Area Categories", 'egens-core' ),
							"singular_name" => esc_html__( "Practice Area Categories", 'egens-core' ),
							"menu_name" => esc_html__( "Practice Area Categories", 'egens-core' ),
							"all_items" => esc_html__( "All Practice Area Category", 'egens-core' ),
							"add_new_item" => esc_html__( "Add New Practice Area Category", 'egens-core' )
						),
						"public" => true,
						"hierarchical" => true,
						'has_archive' => true,
						"show_ui" => true,
						"show_in_menu" => true,
						"show_in_nav_menus" => true,
						"rewrite" => array( 'slug' => 'practice-area-category', 'with_front' => true),
						"query_var" => true,
						"show_admin_column" => true,
						"show_in_rest" => false,
						"show_in_quick_edit" => true,
					)
				),
				
			);
			
		
			if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)){
				foreach ($all_custom_taxonmy as $taxonomy){
					call_user_func_array('register_taxonomy',$taxonomy);
				}
			}
			flush_rewrite_rules();
		}

	}//end class

	if ( class_exists( 'Egens_Custom_Post_Type' ) ) {
		Egens_Custom_Post_Type::getInstance();
	}
}