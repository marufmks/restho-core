<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Button_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_button';
    }

    public function get_title()
    {
        return esc_html__('EG Button', 'corelaw-core');
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
            'corelaw_button_content_section',
            [
                'label' => esc_html__('General', 'corelaw-core')
            ]
        );
        $this->add_control(
			'corelaw_button_left_icon',
			[
				'label' => esc_html__( 'Left Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'corelaw-core' ),
				'label_off' => esc_html__( 'Hide', 'corelaw-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'corelaw_button_right_icon',
			[
				'label' => esc_html__( 'Right Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'corelaw-core' ),
				'label_off' => esc_html__( 'Hide', 'corelaw-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
            'corelaw_button_content_button_text',
            [
                'label' => esc_html__('Button Text', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Know More', 'corelaw-core'),
                'label_block' => true,
          
            ]
        );
        $this->add_control(
            'corelaw_button_content_button_url',
            [
                'label' => __('Button URL', 'corelaw-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'corelaw-core'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],

            ]
        );
        $this->add_responsive_control(
			'corelaw_button_content_align',
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
					'{{WRAPPER}} .alignment ' 	                        => 'text-align: {{VALUE}};',     
				],
			]
		); 
        $this->end_controls_section();
        //Button Style
        $this->start_controls_section(
            'corelaw_button_style_section',
            [
                'label' => esc_html__('Button', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'corelaw-core' ),
			]
		);
        $this->add_control(
            'corelaw_button_style_text_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_button_style_typography',
                'selector' => '{{WRAPPER}} .btn--primary2.sibling2',

            ]
        );
        $this->add_control(
            'corelaw_button_style_text_background',
            [
                'label'     => esc_html__('Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'corelaw_button_style_border_radius',
			[
			'corelaw_button_style_border_radius',
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .btn--primary2.sibling2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .btn--primary2::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
          

			]

		);
        $this->add_control(
			'corelaw_button_style_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn--primary2.sibling2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'corelaw_button_style_padding',
			[
				'label' => esc_html__( 'Padding', 'corelaw-core' ),
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
                'label' => esc_html__( 'Hover', 'corelaw-core' ),
            ]
        );
        $this->add_control(
			'corelaw_button_style_hover_color',
			[
				'label' => esc_html__( 'Color', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn--primary2.sibling2:hover' => 'color: {{VALUE}}',
				],
          
			]
		);
        $this->add_control(
			'corelaw_button_style_hover_background',
			[
				'label' => esc_html__( 'Background', 'corelaw-core' ),
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
                <?php if( !empty( $settings['corelaw_button_content_button_url']['url']) ) : ?>
                    <a href="<?php echo esc_url( $settings['corelaw_button_content_button_url']['url'] ) ?>" class="eg-btn btn--primary2 sibling2  btn--lg2 d-inline-flex">
                        <?php if ( 'yes' === $settings['corelaw_button_left_icon'] ) :?>
                            <i class="bi bi-dash-lg"></i>
                        <?php endif ?>
                        <?php if( !empty( $settings['corelaw_button_content_button_text'] ) ) : ?>
                            <?php echo esc_html($settings['corelaw_button_content_button_text'],'corelaw-core'); ?> 
                        <?php endif ?>
                        <?php if ( 'yes' === $settings['corelaw_button_right_icon'] ) :?>
                            <i class="bi bi-chevron-right"></i>
                        <?php endif ?>
                    </a>
                <?php endif ?>
            </div>
        <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Button_Widget());


