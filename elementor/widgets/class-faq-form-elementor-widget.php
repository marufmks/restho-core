<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_Faq_Form_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_faq_form';
    }

    public function get_title()
    {
        return esc_html__('EG Faq Form', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
       
        //title Section
        $this->start_controls_section(
            'restho_faq_contact_general',
            [
                'label' => esc_html__('General', 'restho-core'),
                
            ]
        );

      
        $this->add_control(
            'restho_faq_contact_general_title',
            [
                'label' => esc_html__( 'Title', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Any Question', 'restho-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
			'restho_faq_contact_general_shotecode',
			[
				'label' => esc_html__( 'Contact Form Shortcode', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Add your Form shortcode here', 'restho-core' ),
			]
		);
        
        $this->end_controls_section();  


    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        ?>
           
        <div class="faq-sidebar">
            <div class="faq-form">
                <?php if( !empty( $settings['restho_faq_contact_general_title'] ) ) :   ?>
                       <span class="faq-form-title"><?php echo esc_html($settings['restho_faq_contact_general_title'])?></span>         
                <?php endif ?>
                <?php if( !empty( $settings['restho_faq_contact_general_shotecode'] ) ) :   ?>
                        <?php echo do_shortcode(  $settings['restho_faq_contact_general_shotecode'] ) ?>            
                <?php endif ?>
            </div>
        </div>

        <?php 
    }
}

Plugin::instance()->widgets_manager->register(new restho_Faq_Form_Widget());

