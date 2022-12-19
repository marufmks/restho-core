<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Feature_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_feature';
    }

    public function get_title()
    {
        return esc_html__('EG Feature', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-featured-image';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
        //title Section

        $this->start_controls_section(
            'corelaw_feature_title',
            [
                'label' => esc_html__('Title', 'corelaw-core')
            ]
        );

     
        $this->add_control(
            'corelaw_feature_title_section',
            [
                'label' => esc_html__( 'Title', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );
        
        
        $this->end_controls_section();  

        //add feature Section
        $this->start_controls_section(
            'corelaw_add_feature_list',
            [
                'label' => esc_html__('Feature', 'corelaw-core')
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();
        

     
       $repeater->add_control(
            'corelaw_feature_icon',
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
            'corelaw_featuree_title',
            [
                'label' => esc_html__( 'Title', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );

      
       $repeater->add_control(
            'corelaw_feature_description',
            [
                'label' => esc_html__( 'Description', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Default description', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your description here', 'corelaw-core' ),
            ]
        );
        
        
        $this->add_control(
            'corelaw_feature_add',
            [
                'label' => esc_html__( 'Add Feature', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'corelaw_featuree_title' => esc_html__( 'Title #1', 'corelaw-core' ),
                    ],

                ],
                'title_field' => '{{{ corelaw_featuree_title }}}',
            ]
        );

        $this->end_controls_section();  


        //---------------- style---------------------//

        //title Style
        $this->start_controls_section(
             'corelaw_feature_title_top_style',
             [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_feature_title_top_style_typ',
                'selector' => '{{WRAPPER}} .feature-title',
        
            ]
        );
        
        $this->add_control(
            'corelaw_feature_title_top_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_feature_title_top_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .feature-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

     
        $this->add_control(
            'corelaw_feature_title_top_style_border_color',
            [
                'label' => esc_html__( 'Border Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-title' => 'border-bottom:2px solid {{VALUE}}',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        //icon Style
        $this->start_controls_section(
             'corelaw_feature_icon_feature_style',
             [
                'label' => esc_html__('Feature Icon', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );

        $this->add_control(
            'corelaw_feature_icon_feature_style_icon_color',
            [
                'label' => esc_html__( 'SVG Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'corelaw_feature_icon_feature_style_svg_size',
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
                    '{{WRAPPER}} .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_control(
            'scorelaw_feature_icon_feature_style_icon_colorr',
            [
                'label' => esc_html__( 'Icon Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'scorelaw_feature_icon_feature_style_icon_size',
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
                    '{{WRAPPER}} .icon i ' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        
        
        
        
        $this->end_controls_section();


        //title Style
        $this->start_controls_section(
             'corelaw_feature_title_feature_style',
             [
                'label' => esc_html__('Feature Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_feature_title_feature_style_typ',
                'selector' => '{{WRAPPER}} .feature-list li .text h4',
        
            ]
        );
        
        $this->add_control(
            'corelaw_feature_title_feature_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-list li .text h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_feature_title_feature_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .feature-list li .text h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        //descrtiption Style
        $this->start_controls_section(
             'corelaw_feature_description_feature_style',
             [
                'label' => esc_html__('Feature Description', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_feature_description_feature_style_typ',
                'selector' => '{{WRAPPER}} .feature-list li .text p',
        
            ]
        );
        
        $this->add_control(
            'corelaw_feature_description_feature_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-list li .text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_feature_description_feature_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .feature-list li .text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();
       


    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $features = $settings['corelaw_feature_add'];
        ?>    
        <div class="feature-wrapper">
            <h3 class="feature-title"><?php echo esc_html($settings['corelaw_feature_title_section'])?></h3>
            <ul class="feature-list">
                <?php foreach ($features as $feature): ?>
                    <li>
                        <?php if( !empty( $feature['corelaw_feature_icon'] ) ) :   ?>
                            <div class="icon">
                                <?php \Elementor\Icons_Manager::render_icon( $feature['corelaw_feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>          
                        <?php endif ?>
                       
                        <div class="text">
                            <?php if( !empty( $feature['corelaw_featuree_title'] ) ) :   ?>
                                  <h4><?php echo esc_html($feature['corelaw_featuree_title'])?></h4>          
                            <?php endif ?>
                            <?php if( !empty( $feature['corelaw_feature_description'] ) ) :   ?>
                                  <p class="para"><?php echo esc_html($feature['corelaw_feature_description'])?></p>          
                            <?php endif ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php 
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Feature_Widget());

