<?php
/**
 * @package Restho Core
 * @author Egens Lab
 */
if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('EgensCoreInit')) {

    class EgensCoreInit
    {
        /*
        * $instance
        * @since 1.0.0
        * */
        protected static $instance;

        public function __construct()
        {

        	//load plugin text domain
	        add_action('init',array($this,'load_textdomain'));

	        //load plugin dependency files()
            add_action('plugins_loaded',[$this, 'load_plugin_dependency_files']);

			//after setup theme
			add_action('after_setup_theme', [$this, 'custom_image_size']);
        }

        /**
         * getInstance()
         * */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

		/**
		 * Load Plugin Text domain
		 * @since 1.0.0
		 * */
		public function load_textdomain(){
			load_plugin_textdomain('restho-core',false,EGNS_CORE_ROOT_PATH .'/languages');
		}

		/**
		 * load plugin dependency files()
		 * @since 1.0.0
		 * */
		public function load_plugin_dependency_files(){
			
			$includes_files = array(

				//Codestar Framework
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => EGNS_CORE_LIB .'/codestar-framework'
				),
				
				//Custom Post Type
				array(
					'file-name' => 'class-custom-post-type',
					'folder-name' => EGNS_CORE_ADMIN
				),

				//Elementor widget
				array(
					'file-name' => 'class-elementor-widget-init',
					'folder-name' => EGNS_CORE_ELEMENTOR
				),

				//Social Link widget
				array(
					'file-name' => 'class-social-link-widget',
					'folder-name' => EGNS_CORE_WP_WIDGETS
				),

				//Recent Post widget
				array(
					'file-name' => 'class-recent-post-widget',
					'folder-name' => EGNS_CORE_WP_WIDGETS
				),

				//Post Tags widget
				array(
					'file-name' => 'class-contacts-widget',
					'folder-name' => EGNS_CORE_WP_WIDGETS
				),
				//footer address widget
				array(
					'file-name' => 'class-address-widget',
					'folder-name' => EGNS_CORE_WP_WIDGETS
				),
				//Footer logo widget
				array(
					'file-name' => 'class-footer-logo-widget',
					'folder-name' => EGNS_CORE_WP_WIDGETS
				),
			);
		
			if (is_array($includes_files) && !empty($includes_files)){
				foreach ($includes_files as $file){
					if (file_exists($file['folder-name'].'/'.$file['file-name'].'.php')){
						require_once $file['folder-name'].'/'.$file['file-name'].'.php';
					}
				}
			}
		}


		/**
		 * custom image size.
		 * @since 1.0.0
		 * */
		public function custom_image_size(){
			add_image_size( 'egens_project_archive_thumbnail', 370, 323, false );
		}

    }//end class
    if (class_exists('EgensCoreInit')){
	    EgensCoreInit::getInstance();
    }
}
