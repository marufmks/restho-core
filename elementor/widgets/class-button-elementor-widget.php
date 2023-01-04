<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Button_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_button';
    }

    public function get_title()
    {
        return esc_html__('EG Button', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-button';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'restho_button_content_general_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        
        $this->add_control(
            'restho_button_content_style_selection',
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
            'restho_button_icon_style_two',
            [
                'label' => esc_html__( 'Button Icon', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restho-core' ),
                'label_off' => esc_html__( 'Hide', 'restho-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_button_content_style_selection' => 'style_one'
                ],
                
            ]
        );
        $this->add_responsive_control(
			'restho_button_content_button_align',
			[
				'label' 		=> esc_html__( 'Button Align', 'restho-core' ),
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
					'{{WRAPPER}} .textalign ' => 'text-align: {{VALUE}};',     
				],
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
            'restho_button_content_section',
            [
                'label' => esc_html__('Button', 'restho-core')
            ]
        );
        
        $this->add_control(
            'restho_button_content_button_text',
            [
                'label' => esc_html__('Button Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'restho-core'),
                'label_block' => true,
          
            ]
        );
        $this->add_control(
			'restho_button_content_button_url',
			[
				'label' => esc_html__( 'Button URL', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'restho-core' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
        $this->end_controls_section();
        // End Content section

        //Button Style
        $this->start_controls_section(
            'restho_button_style_section',
            [
                'label' => esc_html__('Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'restho_button_style_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-md2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                    
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_button_style_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .btn-md2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('_tab_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' 		=> __('Normal', 'restho-core'),
            ]
        );
        $this->add_control(
            'restho_button_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'restho_button_content_style_selection' => 'style_one' ,
                ],
            ]
        );
        $this->add_control(
            'restho_button_style_text_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_button_style_one_typography',
                'selector' => '{{WRAPPER}} .primary-btn5 ',
                'condition' => [
                    'restho_button_content_style_selection' => 'style_one' ,
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_button_style_two_typography',
                'selector' => '{{WRAPPER}} .primary-btn3 ',
                'condition' => [
                    'restho_button_content_style_selection' => 'style_two' ,
                ],

            ]
        );
        $this->add_control(
            'restho_button_style_background',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn3' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_button_style_one_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .primary-btn5',
                'condition' => [
                    'restho_button_content_style_selection' => 'style_one' ,
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_button_style_two_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .primary-btn3',
                'condition' => [
                    'restho_button_content_style_selection' => 'style_two' ,
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_button_style_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .primary-btn5' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .primary-btn3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]

        );
        $this->end_controls_tab();

        //Hover start
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'restho-core' ),
            ]
        );
        $this->add_control(
            'restho_button_style_hover_color',
            [
                'label' => esc_html__( 'Text Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 i:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .primary-btn3:hover' => 'color: {{VALUE}}',
                ],
        
            ]
        );
        $this->add_control(
            'restho_button_style_hover_background',
            [
                'label' => esc_html__( 'Background Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .primary-btn3:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tab();
        $this->end_controls_section();
        
        
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if ( ! empty( $settings['restho_button_content_button_url']['url'] ) ) {
			$this->add_link_attributes( 'restho_button_content_button_url', $settings['restho_button_content_button_url'] );
		}
        ?>
            <?php if( !empty( $settings['restho_button_content_style_selection'] ) && ($settings['restho_button_content_style_selection'] == 'style_one') )  : ?>
                <div class="col-lg-12 textalign">
                    <?php if( !empty( $settings['restho_button_content_button_text']) ) : ?>
                        <a class="primary-btn5 btn-md2" <?php echo $this->get_render_attribute_string( 'restho_button_content_button_url' ); ?>>
                            <?php if ( 'yes' === $settings['restho_button_icon_style_two'] ) :?>
                                <i class="bi bi-arrow-up-right-circle"></i>
                            <?php endif ?>
                            <?php echo esc_html($settings['restho_button_content_button_text'],'restho-core'); ?>
                        </a>
                    <?php endif ?>
                </div>
            <?php endif ?>
            <?php if( !empty( $settings['restho_button_content_style_selection'] ) && ($settings['restho_button_content_style_selection'] == 'style_two') )  : ?> 
                <div class="col-lg-12 textalign">
                    <?php if( !empty( $settings['restho_button_content_button_text']) ) : ?>
                        <div class="load-more-btn">
                            <a class="primary-btn3 btn-md2" <?php echo $this->get_render_attribute_string( 'restho_button_content_button_url' ); ?>>
                            <?php echo esc_html($settings['restho_button_content_button_text'],'restho-core'); ?>
                            </a>
                        </div>
                    <?php endif ?>
                </div>
            <?php endif ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Restho_Button_Widget());
