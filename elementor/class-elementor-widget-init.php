<?php
/**
 * All Elementor widget init
 * @package restholab
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly
}

if ( ! class_exists( 'Egens_Elementor_Widget_Init' ) ) {

	class Egens_Elementor_Widget_Init {
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;

		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array( $this, '_widget_categories' ) );
			
			//elementor widget registered
			add_action( 'elementor/widgets/widgets_registered', array( $this, '_widget_registered' ) );
			
			//add custom icons to elementor new controls
			add_filter('elementor/icons_manager/native',array($this,'add_custom_icon_to_elementor_icons'));
		}

		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
		
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories( $elements_manager ) {
			$elements_manager->add_category(
				'restho_widgets',
				[
					'title' => esc_html__( 'restho Widgets', 'restho-core' ),
					'icon'  => 'fa fa-plug',
				]
			);
		}

		
		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered() {

			if ( ! class_exists( 'Elementor\Widget_Base' ) ) {
				return;
			}

			$elementor_widgets = array(
				'heading',
				'button',
				'faq',
				'contact',
				'counter',
				'banner',
				'offer',
				'about',



			);
			
			$elementor_widgets = apply_filters( 'restho_elementor_widget', $elementor_widgets );
			
			if ( is_array( $elementor_widgets ) && ! empty( $elementor_widgets ) ) {
				
				foreach ( $elementor_widgets as $widget ) {
				
					if ( file_exists( EGNS_CORE_ELEMENTOR . '/widgets/class-' . $widget . '-elementor-widget.php' ) ) {
						require_once EGNS_CORE_ELEMENTOR . '/widgets/class-' . $widget . '-elementor-widget.php';
						
					}
				}
			}

		}


		/**
		 * elementor custom icons
		 * @since 2.0.0
		 * */
		public function add_custom_icon_to_elementor_icons($icons){

			$icons['flaticon'] = [
				'name' => 'flaticon',
				'label' => esc_html__( 'Flaticon', 'restho-core' ),
				'url' => EGNS_CORE_FONT .'/flaticon.css', // icon css file
				'enqueue' => [EGNS_CORE_FONT .'/flaticon.css'], // icon css file
				'prefix' => 'flaticon-', //prefix ( like fas-fa  )
				'displayPrefix' => '', //prefix to display icon
				'labelIcon' => 'flaticon-customer-service', //tab icon of elementor icons library
				'ver' => '1.0.0',
				'native' => true,
			];

			$icons['boxicons'] = [
				'name' => 'boxicons',
				'label' => esc_html__( 'Boxicons', 'restho-core' ),
				'url' => EGNS_CORE_CSS .'/boxicons.min.css', // icon css file
				'enqueue' => [EGNS_CORE_CSS .'/boxicons.min.css'], // icon css file
				'prefix' => 'bx-', //prefix ( like fas-fa  )
				'displayPrefix' => '', //prefix to display icon
				'labelIcon' => 'flaticon-customer-service', //tab icon of elementor icons library
				'ver' => '1.0.0',
				'fetchJson' => EGNS_CORE_JS .'/icons/boxicons.js', //json file with icon list example {"icons: ['icon class']}
				'native' => true,
			];

        	return $icons;
        }

	}
	if ( class_exists( 'Egens_Elementor_Widget_Init' ) ) {
		Egens_Elementor_Widget_Init::getInstance();
	}

}//end if