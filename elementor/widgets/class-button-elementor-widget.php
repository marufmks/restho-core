<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_Button_Widget extends Widget_Base
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
            'restho_button_content_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        $this->add_control(
			'restho_button_left_icon',
			[
				'label' => esc_html__( 'Left Icon', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restho-core' ),
				'label_off' => esc_html__( 'Hide', 'restho-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'restho_button_right_icon',
			[
				'label' => esc_html__( 'Right Icon', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restho-core' ),
				'label_off' => esc_html__( 'Hide', 'restho-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
            'restho_button_content_button_text',
            [
                'label' => esc_html__('Button Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Know More', 'restho-core'),
                'label_block' => true,
          
            ]
        );
        $this->add_control(
            'restho_button_content_button_url',
            [
                'label' => __('Button URL', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'restho-core'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],

            ]
        );
        $this->add_responsive_control(
			'restho_button_content_align',
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
					'{{WRAPPER}} .alignment ' 	                        => 'text-align: {{VALUE}};',     
				],
			]
		); 
        $this->end_controls_section();
        //Button Style
        $this->start_controls_section(
            'restho_button_style_section',
            [
                'label' => esc_html__('Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'restho-core' ),
			]
		);
        $this->add_control(
            'restho_button_style_text_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_button_style_typography',
                'selector' => '{{WRAPPER}} .btn--primary2.sibling2',

            ]
        );
        $this->add_control(
            'restho_button_style_text_background',
            [
                'label'     => esc_html__('Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'restho_button_style_border_radius',
			[
			'restho_button_style_border_radius',
				'label'      		=> __('Border Radius', 'restho-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .btn--primary2.sibling2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .btn--primary2::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
          

			]

		);
        $this->add_control(
			'restho_button_style_margin',
			[
				'label' => esc_html__( 'Margin', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn--primary2.sibling2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'restho_button_style_padding',
			[
				'label' => esc_html__( 'Padding', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn--primary2.sibling2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' => esc_html__( 'Color', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn--primary2.sibling2:hover' => 'color: {{VALUE}}',
				],
          
			]
		);
        $this->add_control(
			'restho_button_style_hover_background',
			[
				'label' => esc_html__( 'Background', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn--primary2::after' => 'background: {{VALUE}}',
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
        ?>
            <div class="alignment">
                <?php if( !empty( $settings['restho_button_content_button_url']['url']) ) : ?>
                    <a href="<?php echo esc_url( $settings['restho_button_content_button_url']['url'] ) ?>" class="eg-btn btn--primary2 sibling2  btn--lg2 d-inline-flex">
                        <?php if ( 'yes' === $settings['restho_button_left_icon'] ) :?>
                            <i class="bi bi-dash-lg"></i>
                        <?php endif ?>
                        <?php if( !empty( $settings['restho_button_content_button_text'] ) ) : ?>
                            <?php echo esc_html($settings['restho_button_content_button_text'],'restho-core'); ?> 
                        <?php endif ?>
                        <?php if ( 'yes' === $settings['restho_button_right_icon'] ) :?>
                            <i class="bi bi-chevron-right"></i>
                        <?php endif ?>
                    </a>
                <?php endif ?>
            </div>
        <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new restho_Button_Widget());


