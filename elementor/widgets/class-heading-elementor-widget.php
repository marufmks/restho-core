<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_Heading_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_heading';
    }

    public function get_title()
    {
        return esc_html__('EG Heading', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-site-title';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_heading_content_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        $this->add_control(
			'restho_heading_content_title_style_selection',
			[
				'label'   => esc_html__('Heading Style', 'restho-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'Style_1' => esc_html__('Style One', 'restho-core'),
					'Style_2' => esc_html__('Style Two', 'restho-core'),
                    'Style_3' => esc_html__('Style Three', 'restho-core'),
				],
				'default' => 'Style_1',
			]
		);
        $this->add_control(
            'restho_heading_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is Subtitle', 'restho-core'),
                'label_block' => true,
                'condition' => [
                    'restho_heading_content_title_style_selection' => [ 'Style_2', 'Style_3' ],
                ],
            ]
        );
        $this->add_control(
            'restho_heading_content_main_title',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is Main Title', 'restho-core'),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'restho_heading_content_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('This is Description', 'restho-core'),
                'label_block' => true,
                'condition' => [
                    'restho_heading_content_title_style_selection' => 'Style_1',
                ],
            ]
        );
        $this->add_control(
            'restho_heading_content_marquee',
            [
                'label' => esc_html__('Marquee Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('WELCOME', 'restho-core'),
                'label_block' => true,
                'condition' => [
                    'restho_heading_content_title_style_selection' => 'Style_3',
                ],
            ]
        );

        $this->add_responsive_control(
			'restho_heading_content_align',
			[
				'label' 		=> esc_html__( 'Alignment', 'restho-core' ),
				'type' 			=> \Elementor\Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 		=> [
						'title' => esc_html__( 'Left', 'restho-core' ),
						'icon' 	=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' => esc_html__( 'Center', 'restho-core' ),
						'icon' 	=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' => esc_html__( 'Right', 'restho-core' ),
						'icon' 	=> 'eicon-text-align-right',
					],
					'justify' 	=> [
						'title' => esc_html__( 'Justified', 'restho-core' ),
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
            'restho_heading_style_sub_title_section',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_heading_content_title_style_selection' => [ 'Style_2', 'Style_3' ],
                ],
            ]
        );
        $this->add_control(
            'restho_heading_style_sub_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
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
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_heading_style_sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title2 span, .section-title-area .section-title span',
            ]
        );
        $this->add_responsive_control(
            'restho_heading_style_sub_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
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
				'name' => 'restho_heading_style_two_three_sub_title_bar_color',
				'label' => esc_html__( 'Bar Color', 'restho-core' ),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .section-title2 span::after, .section-title-area .section-title span::before',
			]
		);
        $this->end_controls_section();
        
        //Main Title Style
        $this->start_controls_section(
            'restho_heading_style_main_title_section',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'restho_heading_style_main_title_color',
				'label' => esc_html__( 'Color', 'restho-core' ),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .section-title1 h2 ',
                'condition' => [
                    'restho_heading_content_title_style_selection' => 'Style_1',
                ],
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Color(Gradient)', 'restho-core'),
                       
                    ],
                   
                ],
			]
		);
        $this->add_control(
            'restho_heading_style_main_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title-area .section-title h2' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'restho_heading_content_title_style_selection' => [ 'Style_2', 'Style_3' ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_heading_style_main_title_typography',
                'selector' => '{{WRAPPER}} .section-title1 h2, .section-title2 h2, .section-title-area .section-title h2',

            ]
        );
        $this->add_responsive_control(
            'restho_heading_style_main_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
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
            'restho_heading_style_description_section',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_heading_content_title_style_selection' => 'Style_1',
                ],
            ]
        );
        $this->add_control(
            'restho_heading_style_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_heading_style_description_typography',
                'selector' => '{{WRAPPER}} .section-title1 p',

            ]
        );
        $this->add_responsive_control(
            'restho_heading_style_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
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
            'restho_heading_style_title_content_marquee_style_section',
            [
                'label' => esc_html__('Marquee', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_heading_content_title_style_selection' => 'Style_3',
                ],
            ]
        );
        $this->add_control(
            'restho_heading_style_marquee_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .marquee span' => '-webkit-text-fill-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_heading_style_marquee_stock_color',
            [
                'label'     => esc_html__('Stock Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .marquee span' => '-webkit-text-stroke-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_heading_style_marquee_typography',
                'selector' => '{{WRAPPER}} .marquee span',

            ]
        );
        $this->add_responsive_control(
            'restho_heading_style_marquee_padding',
            [
                'label'      => __('Padding', 'restho-core'),
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
            <?php if( !empty( $settings['restho_heading_content_title_style_selection'] ) && ($settings['restho_heading_content_title_style_selection'] == 'Style_1') )  : ?>

                <div class="row justify-content-center">
                    <div class="section-title1">
                        <?php if( !empty( $settings['restho_heading_content_main_title'] ) ) : ?>
                            <h2><?php echo esc_html($settings['restho_heading_content_main_title']) ?></h2>
                        <?php endif ?>
                        <?php if( !empty( $settings['restho_heading_content_description'] ) ) : ?>
                            <p><?php echo $settings['restho_heading_content_description'] ?></p>
                        <?php endif ?>
                    </div>
                </div>

            <?php endif ?>
            <?php if( !empty( $settings['restho_heading_content_title_style_selection'] ) && ($settings['restho_heading_content_title_style_selection'] == 'Style_2') )  : ?>

                <div class="row justify-content-center">
                    <div class="section-title2">
                        <?php if( !empty( $settings['restho_heading_content_sub_title'] ) ) : ?>
                            <span><?php echo esc_html($settings['restho_heading_content_sub_title']) ?></span>
                        <?php endif ?>
                        <?php if( !empty( $settings['restho_heading_content_main_title'] ) ) : ?>
                            <h2><?php echo $settings['restho_heading_content_main_title'] ?></h2>
                        <?php endif ?>
                    </div>
                </div>

            <?php endif ?>
            <?php if( !empty( $settings['restho_heading_content_title_style_selection'] ) && ($settings['restho_heading_content_title_style_selection'] == 'Style_3') )  : ?>
                
                <div class="section-title-area sibling2">
                    <div class="marquee">
                        <div>
                            <?php if( !empty( $settings['restho_heading_content_marquee'] ) ) : ?>
                                <span><?php echo esc_html($settings['restho_heading_content_marquee']) ?></span>
                            <?php endif ?>
                            <?php if( !empty( $settings['restho_heading_content_marquee'] ) ) : ?>
                                <span><?php echo esc_html($settings['restho_heading_content_marquee']) ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="section-title sibling2">
                        <?php if( !empty( $settings['restho_heading_content_sub_title'] ) ) : ?>
                            <span><?php echo esc_html($settings['restho_heading_content_sub_title']) ?></span>
                        <?php endif ?>
                        <?php if( !empty( $settings['restho_heading_content_main_title'] ) ) : ?>
                            <h2><?php echo $settings['restho_heading_content_main_title'] ?></h2>
                        <?php endif ?>
                    </div>
                </div>

            <?php endif ?>
        <?php 
    }
}

Plugin::instance()->widgets_manager->register(new restho_Heading_Widget());



