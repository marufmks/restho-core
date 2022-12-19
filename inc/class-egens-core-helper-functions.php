<?php
/**
 * @package Egens
 * @author Egens Lab
 */
if ( ! defined( "ABSPATH" ) ) {
	exit(); //exit if access directly
}

if ( ! class_exists( 'Egens_Core_Helper_Functions' ) ) {

	class Egens_Core_Helper_Functions {
		/*
		* $instance
		* @since 1.0.0
		* */
		protected static $instance;

		public function __construct() {
		}

		/**
		 * getInstance()
		 * */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
		
		/**
		 * get post list by post type
		 * @sicne 2.0.0
		 * */
		public function get_post_list_by_post_type( $post_type ) {
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'post_per_pages' => -1,
				'post_status' 	 => 'publish',
			);
			$all_post   = new \WP_Query( $args );

			while ( $all_post->have_posts() ) {
				$all_post->the_post();
				$return_val[ get_the_ID() ] = get_the_title();
			}

			return $return_val;
		}

		/**
		 * get post list by post type
		 * @sicne 2.0.0
		 * */
		public function get_all_post_list_by_post_type( $post_type ) {
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'posts_per_page' => 6,
				'post_status' 	 => 'publish',
			);
			$all_post   = new \WP_Query( $args );

			while ( $all_post->have_posts() ) {
				$all_post->the_post();
				$return_val[ get_the_ID() ] = get_the_title();
			}

			return $return_val;
		}



		/**
		 * get post list by post type
		 * @sicne 2.0.0
		 * */
		public function get_post_all_list() {
			$return_val = [];
			$args       = array(
				'post_type'      => 'post',
				'posts_per_page' => -1,
				'post_status' 	 => 'publish',
			);
			$all_post   = new \WP_Query( $args );

			while ( $all_post->have_posts() ) {
				$all_post->the_post();
				$return_val[ get_the_ID() ] = get_the_title();
			}
			wp_reset_query();
			return $return_val;
		}
		
		function egns_blog_pagination( $post_per_page = 3 ) {
			add_filter( 'number_format_i18n', array($this,'give_numbers_leading_zero') );
			$links = paginate_links( array(
				'current'  => max( 1, get_query_var( 'paged' ) ),
				'total'    => $post_per_page,
				'type'     => 'list',
				'mid_size' => apply_filters( "egns_pagination_mid_size", 3 ),
				'prev_text'    => '<i class="bi bi-chevron-double-left"></i>',
				'next_text'    => '<i class="bi bi-chevron-double-right"></i>',
			) );
			$links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination d-flex justify-content-center gap-md-3 gap-2'>", $links );
			$links = str_replace( "<li>", "<li class='page-item'>", $links );
			$links = str_replace( "page-numbers", "", $links );
			$links = str_replace( "&laquo; Previous</a>", '&laquo;</a>', $links );
			$links = str_replace( "Next &raquo;</a>", "&raquo;</a>", $links );
			$links = str_replace( "next aria-label='Next'", "page-link", $links );
			$links = str_replace( "prev aria-hidden='true'", "sr-only page-link", $links );
			$links = str_replace( "<li><span", " <li class='active'><a", $links );
			$links = str_replace( 'span', 'a', $links );
			
			echo wp_kses_post( $links );

		}
		function give_numbers_leading_zero( $number ) {
			return sprintf("%02s", $number);
		}	

	}//end class
	if ( class_exists( 'Egens_Core_Helper_Functions' ) ) {
		Egens_Core_Helper_Functions::getInstance();
	}
}