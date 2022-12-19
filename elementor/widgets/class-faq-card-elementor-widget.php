<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_Faq_Card_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_faq_card';
    }

    public function get_title()
    {
        return esc_html__('EG Faq Card', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-menu-card';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        
        //Name Section
        $this->start_controls_section(
            'restho_faq_card_card_section',
            [
                'label' => esc_html__('Card List', 'restho-core')
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'restho_faq_card_name_section_title',
            [
                'label' => esc_html__( 'Name', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'restho-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'restho-core' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'restho_faq_card_url_section_link',
            [
                'label' => esc_html__( 'URL', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'restho-core' ),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'restho_add_list',
            [
                'label' => esc_html__( 'Repeater List', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_faq_card_name_section_title' => esc_html__( 'Title #1', 'restho-core' ),
                    ],
                ],
                'title_field' => '{{{ restho_faq_card_name_section_title }}}',
            ]
        );
        
        $this->end_controls_section(); 
        
        //------------------Style------------------//


        //Name Style
        $this->start_controls_section(
             'restho_faq_card_style_name',
             [
                'label' => esc_html__('Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_faq_card_style_name_typ',
                'selector' => '{{WRAPPER}} .faq-section .nav-pills button.nav-link',
        
            ]
        );
        
        $this->add_control(
            'restho_faq_card_style_name_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-section .nav-pills button.nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_faq_card_style_name_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .faq-section .nav-pills button.nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
      
        $this->add_control(
            'restho_faq_card_style_name_hovr_background',
            [
                'label' => esc_html__( 'Hover Background', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-section .nav-pills button.nav-link:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        //card Style
        $this->start_controls_section(
             'restho_faq_card_stylee',
             [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
      
        $this->add_control(
            'restho_faq_card_stylee_background',
            [
                'label' => esc_html__( 'Card Background', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-section .nav-pills' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $items = $settings['restho_add_list'];
        ?>

        <div class="faq-section">
            <div class="nav flex-column nav-pills gap-4 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s;">
                <?php foreach ($items as $item): ?>
                    <?php if( !empty( $item['restho_faq_card_name_section_title'] ) ) :   ?>
                          <a href="<?php echo esc_url($item['restho_faq_card_url_section_link']['url'])?>"><button class="nav-link nav-btn-style mx-auto mb-20" id="v-pills-dashboard-tab"><?php echo esc_html($item['restho_faq_card_name_section_title'])?></button></a>           
                    <?php endif ?>
                   

                <?php endforeach; ?>
            </div>
        </div>

           
        <?php 
    }
}

Plugin::instance()->widgets_manager->register(new restho_Faq_Card_Widget());

