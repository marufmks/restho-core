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
					'post_type' => 'egens-chef',
					'args'      => array(
						'label'              => esc_html__( 'Chef', 'restho-core' ),
						'description'        => esc_html__( 'Chef', 'restho-core' ),
						'menu_icon'           => 'dashicons-groups',
						'labels'             => array(
							'name'               => esc_html_x( 'Chef', 'Post Type General Name', 'restho-core' ),
							'singular_name'      => esc_html_x( 'Chef', 'Post Type Singular Name', 'restho-core' ),
							'menu_name'          => esc_html__( 'Chef', 'restho-core' ),
							'all_items'          => esc_html__( 'All Chef', 'restho-core' ),
							'view_item'          => esc_html__( 'View Chef', 'restho-core' ),
							'add_new_item'       => esc_html__( 'Add New Chef', 'restho-core' ),
							'add_new'            => esc_html__( 'Add New Chef', 'restho-core' ),
							'edit_item'          => esc_html__( 'Edit Chef', 'restho-core' ),
							'update_item'        => esc_html__( 'Update Chef', 'restho-core' ),
							'search_items'       => esc_html__( 'Search Chef', 'restho-core' ),
							'not_found'          => esc_html__( 'Not Found', 'restho-core' ),
							'not_found_in_trash' => esc_html__( 'Not found in Trash', 'restho-core' ),
						),
						'supports'           => array( 'title','editor', 'excerpt','thumbnail'),
						'hierarchical'       => true,
						'public'             => true,
						'has_archive' 		=> true,
						"publicly_queryable" => true,
						'show_ui'            => true,
						"rewrite" => array( 'slug' => 'chef', 'with_front' => true),
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
					'taxonomy' => 'egens-chef-category',
					'object_type' => 'egens-chef',
					'args' => array(
						"labels" => array(
							"name" => esc_html__( "Chef Categories", 'restho-core' ),
							"singular_name" => esc_html__( "Chef Categories", 'restho-core' ),
							"menu_name" => esc_html__( "Chef Categories", 'restho-core' ),
							"all_items" => esc_html__( "All Chef Category", 'restho-core' ),
							"add_new_item" => esc_html__( "Add New Chef Category", 'restho-core' )
						),
						"public" => true,
						"hierarchical" => true,
						'has_archive' => true,
						"show_ui" => true,
						"show_in_menu" => true,
						"show_in_nav_menus" => true,
						"rewrite" => array( 'slug' => 'chef-category', 'with_front' => true),
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