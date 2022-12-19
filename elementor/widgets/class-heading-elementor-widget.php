<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Heading_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_heading';
    }

    public function get_title()
    {
        return esc_html__('EG Heading', 'corelaw-core');
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
            'corelaw_heading_content_section',
            [
                'label' => esc_html__('General', 'corelaw-core')
            ]
        );
        $this->add_control(
			'corelaw_heading_content_title_style_selection',
			[
				'label'   => esc_html__('Heading Style', 'corelaw-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'Style_1' => esc_html__('Style One', 'corelaw-core'),
					'Style_2' => esc_html__('Style Two', 'corelaw-core'),
                    'Style_3' => esc_html__('Style Three', 'corelaw-core'),
				],
				'default' => 'Style_1',
			]
		);
        $this->add_control(
            'corelaw_heading_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is Subtitle', 'corelaw-core'),
                'label_block' => true,
                'condition' => [
                    'corelaw_heading_content_title_style_selection' => [ 'Style_2', 'Style_3' ],
                ],
            ]
        );
        $this->add_control(
            'corelaw_heading_content_main_title',
            [
                'label' => esc_html__('Main Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is Main Title', 'corelaw-core'),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'corelaw_heading_content_description',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('This is Description', 'corelaw-core'),
                'label_block' => true,
                'condition' => [
                    'corelaw_heading_content_title_style_selection' => 'Style_1',
                ],
            ]
        );
        $this->add_control(
            'corelaw_heading_content_marquee',
            [
                'label' => esc_html__('Marquee Text', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('WELCOME', 'corelaw-core'),
                'label_block' => true,
                'condition' => [
                    'corelaw_heading_content_title_style_selection' => 'Style_3',
                ],
            ]
        );

        $this->add_responsive_control(
			'corelaw_heading_content_align',
			[
				'label' 		=> esc_html__( 'Alignment', 'corelaw-core' ),
				'type' 			=> \Elementor\Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 		=> [
						'title' => esc_html__( 'Left', 'corelaw-core' ),
						'icon' 	=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' => esc_html__( 'Center', 'corelaw-core' ),
						'icon' 	=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' => esc_html__( 'Right', 'corelaw-core' ),
						'icon' 	=> 'eicon-text-align-right',
					],
					'justify' 	=> [
						'title' => esc_html__( 'Justified', 'corelaw-core' ),
						'icon' 	=> 'eicon-text-align-justify',
					],
				],
				'default' 		=> 'center',
				'selectors' 	=> [
					'{{WRAPPER}} .section-title1 ' 	                        => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .section-title1 p'                         => 'text-align: {{VALUE}};',  
                    '{{WRAPPER}} .section-title2' 	                        => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .section-title2 span'                      => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .section-title sibling2'                   => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .section-title-area .section-title'        => 'text-align: {{VALUE}};',
                   

                      
				],
			]
		); 
        $this->end_controls_section();
        // End section
        
        //Subtitle Style
        $this->start_controls_section(
            'corelaw_heading_style_sub_title_section',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_heading_content_title_style_selection' => [ 'Style_2', 'Style_3' ],
                ],
            ]
        );
        $this->add_control(
            'corelaw_heading_style_sub_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title-area .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_heading_style_sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title2 span, .section-title-area .section-title span',
            ]
        );
        $this->add_responsive_control(
            'corelaw_heading_style_sub_title_padding',
            [
                'label'      => __('Padding', 'corelaw-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .section-title-area .section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'corelaw_heading_style_two_three_sub_title_bar_color',
				'label' => esc_html__( 'Bar Color', 'corelaw-core' ),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .section-title2 span::after, .section-title-area .section-title span::before',
			]
		);
        $this->end_controls_section();
        
        //Main Title Style
        $this->start_controls_section(
            'corelaw_heading_style_main_title_section',
            [
                'label' => esc_html__('Main Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'corelaw_heading_style_main_title_color',
				'label' => esc_html__( 'Color', 'corelaw-core' ),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .section-title1 h2 ',
                'condition' => [
                    'corelaw_heading_content_title_style_selection' => 'Style_1',
                ],
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Color(Gradient)', 'corelaw-core'),
                       
                    ],
                   
                ],
			]
		);
        $this->add_control(
            'corelaw_heading_style_main_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title-area .section-title h2' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'corelaw_heading_content_title_style_selection' => [ 'Style_2', 'Style_3' ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_heading_style_main_title_typography',
                'selector' => '{{WRAPPER}} .section-title1 h2, .section-title2 h2, .section-title-area .section-title h2',

            ]
        );
        $this->add_responsive_control(
            'corelaw_heading_style_main_title_padding',
            [
                'label'      => __('Padding', 'corelaw-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title1 h2, .section-title2 h2, .section-title-area .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ]
            ]
        );

        $this->end_controls_section();
        
        //Description Style
        $this->start_controls_section(
            'corelaw_heading_style_description_section',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_heading_content_title_style_selection' => 'Style_1',
                ],
            ]
        );
        $this->add_control(
            'corelaw_heading_style_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_heading_style_description_typography',
                'selector' => '{{WRAPPER}} .section-title1 p',

            ]
        );
        $this->add_responsive_control(
            'corelaw_heading_style_description_padding',
            [
                'label'      => __('Padding', 'corelaw-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title1 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ]
            ]
        );

        $this->end_controls_section();

        // Marquee Style Start
        $this->start_controls_section(
            'corelaw_heading_style_title_content_marquee_style_section',
            [
                'label' => esc_html__('Marquee', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_heading_content_title_style_selection' => 'Style_3',
                ],
            ]
        );
        $this->add_control(
            'corelaw_heading_style_marquee_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .marquee span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_heading_style_marquee_stock_color',
            [
                'label'     => esc_html__('Stock Text Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .marquee span' => '-webkit-text-stroke-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_heading_style_marquee_typography',
                'selector' => '{{WRAPPER}} .marquee span',

            ]
        );
        $this->add_responsive_control(
            'corelaw_heading_style_marquee_padding',
            [
                'label'      => __('Padding', 'corelaw-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .marquee span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ]
            ]
        );



    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        ?>
            <?php if( !empty( $settings['corelaw_heading_content_title_style_selection'] ) && ($settings['corelaw_heading_content_title_style_selection'] == 'Style_1') )  : ?>

                <div class="row justify-content-center">
                    <div class="section-title1">
                        <?php if( !empty( $settings['corelaw_heading_content_main_title'] ) ) : ?>
                            <h2><?php echo esc_html($settings['corelaw_heading_content_main_title']) ?></h2>
                        <?php endif ?>
                        <?php if( !empty( $settings['corelaw_heading_content_description'] ) ) : ?>
                            <p><?php echo $settings['corelaw_heading_content_description'] ?></p>
                        <?php endif ?>
                    </div>
                </div>

            <?php endif ?>
            <?php if( !empty( $settings['corelaw_heading_content_title_style_selection'] ) && ($settings['corelaw_heading_content_title_style_selection'] == 'Style_2') )  : ?>

                <div class="row justify-content-center">
                    <div class="section-title2">
                        <?php if( !empty( $settings['corelaw_heading_content_sub_title'] ) ) : ?>
                            <span><?php echo esc_html($settings['corelaw_heading_content_sub_title']) ?></span>
                        <?php endif ?>
                        <?php if( !empty( $settings['corelaw_heading_content_main_title'] ) ) : ?>
                            <h2><?php echo $settings['corelaw_heading_content_main_title'] ?></h2>
                        <?php endif ?>
                    </div>
                </div>

            <?php endif ?>
            <?php if( !empty( $settings['corelaw_heading_content_title_style_selection'] ) && ($settings['corelaw_heading_content_title_style_selection'] == 'Style_3') )  : ?>
                
                <div class="section-title-area sibling2">
                    <div class="marquee">
                        <div>
                            <?php if( !empty( $settings['corelaw_heading_content_marquee'] ) ) : ?>
                                <span><?php echo esc_html($settings['corelaw_heading_content_marquee']) ?></span>
                            <?php endif ?>
                            <?php if( !empty( $settings['corelaw_heading_content_marquee'] ) ) : ?>
                                <span><?php echo esc_html($settings['corelaw_heading_content_marquee']) ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="section-title sibling2">
                        <?php if( !empty( $settings['corelaw_heading_content_sub_title'] ) ) : ?>
                            <span><?php echo esc_html($settings['corelaw_heading_content_sub_title']) ?></span>
                        <?php endif ?>
                        <?php if( !empty( $settings['corelaw_heading_content_main_title'] ) ) : ?>
                            <h2><?php echo $settings['corelaw_heading_content_main_title'] ?></h2>
                        <?php endif ?>
                    </div>
                </div>

            <?php endif ?>
        <?php 
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Heading_Widget());



