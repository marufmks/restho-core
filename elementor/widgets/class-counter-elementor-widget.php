<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Counter_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_counter';
    }

    public function get_title()
    {
        return esc_html__('EG Counter', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-counter';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'restho_counter_content_general_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        
        $this->add_control(
            'restho_counter_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'restho-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'restho-core'),
                    'style_two' => esc_html__('Style Two', 'restho-core'),
                ],
                'default' => 'style_one',
            ]
        );
        
        $this->add_control(
			'restho_counter_column_selection',
			[
				'label'   => esc_html__('Column', 'restho-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'column_two'  => esc_html__('2', 'restho-core'),
					'column_three' => esc_html__('3', 'restho-core'),
					'column_four' => esc_html__('4', 'restho-core'),
                    'column_six' => esc_html__('6', 'restho-core'),
				],
				'default' => 'column_four',
			]
		);
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'restho_counter_odometer_title',
            [
                'label' => esc_html__( 'Title', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Professional Chef', 'restho-core' ),
                'placeholder' => esc_html__( 'Your couner title here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_counter_odometer_number',
            [
                'label' => esc_html__( 'Number', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '300', 'restho-core' ),
            ]
        );
        $repeater->add_control(
			'restho_counter_icon',
			[
				'label' => esc_html__( 'Icon', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
			]
		);
        
        $this->add_control(
			'counter_list',
			[
				'label' => esc_html__( 'Counter List', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
                    [
						'restho_counter_odometer_title' => esc_html__( 'Professional Chef', 'restho-core' ),
						'restho_counter_odometer_number' => esc_html__( "300 ", 'restho-core' ),
					],
					[
						'restho_counter_odometer_title' => esc_html__( 'Food Category', 'restho-core' ),
						'restho_counter_odometer_number' => esc_html__( "300", 'restho-core' ),
					],
                    [
						'restho_counter_odometer_title' => esc_html__( "Customer Satisfy", 'restho-core' ),
						'restho_counter_odometer_number' => esc_html__( "300", 'restho-core' ),
					],
                    [
						'restho_counter_odometer_title' => esc_html__( "Award Wining", 'restho-core' ),
						'restho_counter_odometer_number' => esc_html__( "300", 'restho-core' ),
					],

				],
				'title_field' => '{{{ restho_counter_odometer_title }}}',
			]
		);
        $this->end_controls_section();
        //Background Color
        $this->start_controls_section(
            'restho_counter_style_bg_color_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_counter_content_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_counter_style_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-food-area-counter .counter-area' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        // Title style
        $this->start_controls_section(
            'restho_counter_style_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_counter_style_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .coundown P' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-counter .counter-single .coundown P' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_counter_style_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-counter .counter-single:hover .coundown P' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'restho_counter_content_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_counter_style_one_title_typography',
                'selector' => '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .coundown P',
                'condition' => [
                    'restho_counter_content_style_selection' => 'style_one'
                ],

            ],
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_counter_style_two_title_typography',
                'selector' => '{{WRAPPER}} .about-counter .counter-single .coundown P',
                'condition' => [
                    'restho_counter_content_style_selection' => 'style_two'
                ],

            ],
        );
        $this->add_responsive_control(
            'restho_counter_style_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .coundown P' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-counter .counter-single .coundown P' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                   
                    
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_counter_style_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .coundown P' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-counter .counter-single .coundown P' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        // Number style
        $this->start_controls_section(
            'restho_counter_style_number',
            [
                'label' => esc_html__('Number', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_counter_style_number_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .coundown div span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-counter .counter-single .coundown div span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_counter_style_num_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-counter .counter-single:hover .coundown div span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'restho_counter_content_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_counter_style_one_number_typography',
                'selector' => '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .coundown div span',
                'condition' => [
                    'restho_counter_content_style_selection' => 'style_one'
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_counter_style_two_number_typography',
                'selector' => '{{WRAPPER}} .about-counter .counter-single .coundown div span',
                'condition' => [
                    'restho_counter_content_style_selection' => 'style_two'
                ],

            ]
        );
    
        $this->add_responsive_control(
            'restho_counter_style_number_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .coundown div span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                    '{{WRAPPER}} .about-counter .counter-single .coundown div span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->end_controls_section();
        // Icon style
        $this->start_controls_section(
            'restho_counter_style_icon',
            [
                'label' => esc_html__('Icon', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_counter_style_svg_color',
            [
                'label' => esc_html__( 'SVG Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .counter-icon svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .about-counter .counter-single .counter-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'restho_counter_style_svg_size',
            [
                'label' => esc_html__( 'SVG Size', 'restho-core' ),
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
                    '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .counter-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .about-counter .counter-single .counter-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_control(
            'restho_counter_style_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .counter-icon i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .about-counter .counter-single .counter-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'restho_counter_style_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    
                ],
                'selectors' => [
                    '{{WRAPPER}} .popular-food-area-counter .counter-area .counter-single .counter-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .about-counter .counter-single .counter-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->end_controls_section();
        // Card style
        $this->start_controls_section(
            'restho_counter_style_card',
            [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_counter_content_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_counter_style_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-counter .counter-single' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_counter_style_card_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-counter .counter-single:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_counter_style_card_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .about-counter .counter-single',
            ]
        );
        $this->add_responsive_control(
            'restho_counter_style_card_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .about-counter .counter-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->end_controls_section();
        
        
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $Items=$settings['counter_list'];
        ?>
        <?php if( is_admin() ) : ?>
            <script>
                jQuery(".counter-single").each(function () {
                    jQuery(this).isInViewport(function (status) {
                    if (status === "entered") {
                        for (
                        var i = 0;
                        i < document.querySelectorAll(".odometer").length;
                        i++
                        ) {
                        var el = document.querySelectorAll(".odometer")[i];
                        el.innerHTML = el.getAttribute("data-odometer-final");
                        }
                    }
                    });
                });
            </script>
        <?php endif; ?>

            <?php if( !empty( $settings['restho_counter_content_style_selection'] ) && ($settings['restho_counter_content_style_selection'] == 'style_one') )  : ?>
                <div class="popular-food-area-counter">
                    <div class="counter-area">
                        <div class="row justify-content-center g-md-4 gy-5">
                            <?php foreach($Items as $Item):?>
                                <?php if( $settings['restho_counter_column_selection'] == 'column_two' ) : ?>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <?php elseif ($settings['restho_counter_column_selection'] == 'column_three') : ?>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                <?php elseif ($settings['restho_counter_column_selection'] == 'column_four') : ?>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <?php elseif ($settings['restho_counter_column_selection'] == 'column_six') : ?>
                                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6">
                                <?php endif ?>
                                    <div class="counter-single" >
                                        <?php if( !empty( $Item['restho_counter_icon'] ) ) : ?>
                                            <div class="counter-icon">                                              
                                                <?php \Elementor\Icons_Manager::render_icon( $Item['restho_counter_icon'], [ 'aria-hidden' => 'true' ] ); ?>                                       
                                            </div>
                                        <?php endif ?>
                                        <div class="coundown">
                                                <div class="d-flex align-items-center gap-2">
                                                    <h3 class="odometer" data-odometer-final="<?php echo esc_html($Item['restho_counter_odometer_number']) ?>">&nbsp;</h3>
                                                </div>
                                            <?php if( !empty( $Item['restho_counter_odometer_title'] ) ) : ?>
                                                <p><?php echo esc_html($Item['restho_counter_odometer_title']) ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if( !empty( $settings['restho_counter_content_style_selection'] ) && ($settings['restho_counter_content_style_selection'] == 'style_two') )  : ?> 
                <div class="about-counter">
                    <div class="row justify-content-center g-md-4 gy-5">
                        <?php foreach($Items as $Item):?>
                            <?php if( $settings['restho_counter_column_selection'] == 'column_two' ) : ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <?php elseif ($settings['restho_counter_column_selection'] == 'column_three') : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                            <?php elseif ($settings['restho_counter_column_selection'] == 'column_four') : ?>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                            <?php elseif ($settings['restho_counter_column_selection'] == 'column_six') : ?>
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6">
                            <?php endif ?>
                                <div class="counter-single">
                                    <?php if( !empty( $Item['restho_counter_icon'] ) ) : ?>
                                        <div class="counter-icon">                                              
                                            <?php \Elementor\Icons_Manager::render_icon( $Item['restho_counter_icon'], [ 'aria-hidden' => 'true' ] ); ?>                                       
                                        </div>
                                    <?php endif ?>
                                    <div class="coundown">
                                        <?php if( !empty( $Item['restho_counter_odometer_number'] ) ) : ?>
                                            <div class="d-flex align-items-center gap-2">
                                                <h3 class="odometer" data-odometer-final="<?php echo esc_html($Item['restho_counter_odometer_number']) ?>">&nbsp;</h3>
                                            </div>
                                        <?php endif ?>
                                        <?php if( !empty( $Item['restho_counter_odometer_title'] ) ) : ?>
                                            <p><?php echo esc_html($Item['restho_counter_odometer_title']) ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
            <?php endif ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Restho_Counter_Widget());
