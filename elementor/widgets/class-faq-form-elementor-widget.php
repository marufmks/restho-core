<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Faq_Form_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_faq_form';
    }

    public function get_title()
    {
        return esc_html__('EG Faq Form', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
       
        //title Section
        $this->start_controls_section(
            'corelaw_faq_contact_general',
            [
                'label' => esc_html__('General', 'corelaw-core'),
                
            ]
        );

      
        $this->add_control(
            'corelaw_faq_contact_general_title',
            [
                'label' => esc_html__( 'Title', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Any Question', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
			'corelaw_faq_contact_general_shotecode',
			[
				'label' => esc_html__( 'Contact Form Shortcode', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Add your Form shortcode here', 'corelaw-core' ),
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
                <?php if( !empty( $settings['corelaw_faq_contact_general_title'] ) ) :   ?>
                       <span class="faq-form-title"><?php echo esc_html($settings['corelaw_faq_contact_general_title'])?></span>         
                <?php endif ?>
                <?php if( !empty( $settings['corelaw_faq_contact_general_shotecode'] ) ) :   ?>
                        <?php echo do_shortcode(  $settings['corelaw_faq_contact_general_shotecode'] ) ?>            
                <?php endif ?>
            </div>
        </div>

        <?php 
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Faq_Form_Widget());

