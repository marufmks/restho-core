<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Case_Study_Info_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_case_study_info';
    }

    public function get_title()
    {
        return esc_html__('EG Case Study Info', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-site-title';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
        
      
        //Content Section
        $this->start_controls_section(
            'corelaw_case_study_info_add',
            [
                'label' => esc_html__('Add Case Study Info', 'corelaw-core')
            ]
        );

        
        $repeater = new \Elementor\Repeater();
        
       

       
         $repeater->add_control(
            'corelaw_case_study_info_add_icon',
            [
                'label' => esc_html__( 'Icon', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

    
         $repeater->add_control(
            'corelaw_case_study_info_add_title',
            [
                'label' => esc_html__( 'Title', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'corelaw-core' ),
                'label_block' => true,
                
            ]
        );
         $repeater->add_control(
            'corelaw_case_study_info_add_content',
            [
                'label' => esc_html__( 'Content', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'corelaw-core' ),
                'label_block' => true,
            ]
        );
        
        
        $this->add_control(
            'corelaw_case_study_info_list',
            [
                'label' => esc_html__( 'Add Case Study Info', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'corelaw_case_study_info_add_title' => esc_html__( 'Title #1', 'corelaw-core' ),
                    ],

                ],
                'title_field' => '{{{ corelaw_case_study_info_add_title }}}',
            ]
        );
        
        
        
        $this->end_controls_section();  


        // -----------------style ------------------------------//

        //icon Style
        $this->start_controls_section(
             'corelaw_casestudy_info_style_icon',
             [
                'label' => esc_html__('Icon & SVG', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'corelaw_casestudy_info_style_svg_color',
            [
                'label' => esc_html__( 'SVG Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.case-info-list li span svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'corelaw_casestudy_info_style_svg_size',
            [
                'label' => esc_html__( 'SVG Size', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    
                ],
                'selectors' => [
                    '{{WRAPPER}} ul.case-info-list li span svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_control(
            'corelaw_casestudy_info_style_icon_colorr',
            [
                'label' => esc_html__( 'Icon Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.case-info-list li span i' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'corelaw_casestudy_info_style_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    
                ],
                'selectors' => [
                    '{{WRAPPER}} ul.case-info-list li span i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        //title Style
        $this->start_controls_section(
             'corelaw_casestudy_info_style_title',
             [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_casestudy_info_style_title_typ',
                'selector' => '{{WRAPPER}} .case-info-list li span',
        
            ]
        );
        
        $this->add_control(
            'corelaw_casestudy_info_style_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-info-list li span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_casestudy_info_style_title_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .case-info-list li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        //content Style
        $this->start_controls_section(
             'corelaw_casestudy_info_style_content',
             [
                'label' => esc_html__('Content', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_casestudy_info_style_content_typ',
                'selector' => '{{WRAPPER}} .case-info-list li h5',
        
            ]
        );
        
        $this->add_control(
            'corelaw_casestudy_info_style_content_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-info-list li h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_casestudy_info_style_content_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .case-info-list li h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();




    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $caseinfo = $settings['corelaw_case_study_info_list'];
        
        ?>
      
        <!-- Content -->

        <ul class="case-info-list">
            <?php foreach ($caseinfo as $item): ?>
                <li>
                    <?php if( !empty(  $item['corelaw_case_study_info_add_title'] ) ) :   ?>
                           <span><?php \Elementor\Icons_Manager::render_icon( $item['corelaw_case_study_info_add_icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo esc_html( $item['corelaw_case_study_info_add_title'])?></span>         
                    <?php endif ?>
                    <?php if( !empty( $item['corelaw_case_study_info_add_content'] ) ) :   ?>
                           <h5><?php echo esc_html($item['corelaw_case_study_info_add_content'])?></h5>         
                    <?php endif ?>
                   
                </li>
            <?php endforeach; ?>
        </ul>
       
        
        

        <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Case_Study_Info_Widget());
