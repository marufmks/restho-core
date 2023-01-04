<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Contact_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_contact';
    }

    public function get_title()
    {
        return esc_html__('EG contact', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-info-circle-o';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Contact General Section
        $this->start_controls_section(
            'restho_contact_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
            ]
        );
        $this->add_control(
            'restho_contact_image',
            [
                'label' => esc_html__('Contact Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'restho_contact_content_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('NewYork Branch', 'restho-core'),
                'placeholder' => esc_html__('Type your title here', 'restho-core'),
                'label_block' => true,
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'restho_contact_icon',
			[
				'label' => esc_html__( 'Icon', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
			]
		);
        $repeater->add_control(
            'restho_contact_description_text',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('168/170, Ave 01,Old York Drive Rich Mirpur, Dhaka', 'restho-core'),
                'label_block' => true,
          
            ]
        );
        $repeater->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'restho-core' ),
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
        $this->add_control(
			'restho_contact_repeater_list',
			[
				'label' => esc_html__( 'Contact List', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'restho_contact_description_text' => esc_html__( '168/170, Ave 01,Old York Drive Rich Mirpur, Dhaka', 'restho-core' ),
					],

				],
				'title_field' => '{{{ restho_contact_description_text }}}',
			]
		);
        $this->end_controls_section();

        //General Style
        $this->start_controls_section(
            'restho_contact_general_style_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]

        );
        $this->add_responsive_control(
            'restho_contact_img_border_radius',
            [
                'label'      		=> __('Image Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]

        );
        $this->add_control(
            'restho_contact_card_border_color',
            [
                'label'     => esc_html__('Card Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Title
        $this->start_controls_section(
            'restho_contact_style_title',
             [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        $this->add_control(
            'restho_contact_style_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_contact_style_title_typ',
                'selector' => '{{WRAPPER}} .contact-page .contact-wrap .contact-content h3',
        
            ]
        );
        $this->add_responsive_control(
            'restho_contact_style_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'restho_contact_style_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //Icon Style
        $this->start_controls_section(
            'restho_contact_style_contact_list_section',
            [
                'label' => esc_html__('Icon', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'restho_contact_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content ul li .icon i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_contact_icon_size',
            [
                'label' => esc_html__('Icon Size', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content ul li .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'restho_contact_svg_color',
            [
                'label' => esc_html__('SVG Color', 'restho-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content ul li .icon svg circle' => 'stroke: {{VALUE}};',
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content ul li .icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_contact_svg_size',
            [
                'label' => esc_html__('SVG Size', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
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
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content ul li .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Description
        $this->start_controls_section(
            'restho_contact_style_description',
             [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        $this->add_control(
            'restho_contact_style_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-wrap .contact-content ul li .content a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_contact_style_description_typ',
                'selector' => '{{WRAPPER}} .contact-page .contact-wrap .contact-content ul li .content a',
        
            ]
        );
        $this->end_controls_section();


        
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $Items = $settings['restho_contact_repeater_list'];
        ?>
            <div class="contact-page">
                <div class="contact-wrap">
                    <?php if (!empty($settings['restho_contact_image']['url'])): ?>
                        <div class="contact-img">
                            <img  src="<?php echo esc_url($settings['restho_contact_image']['url']) ?>" alt="<?php echo esc_attr('contact-img', 'restho-core') ?>">
                        </div>
                    <?php endif ?>
                    <div class="contact-content">
                        <?php if (!empty($settings['restho_contact_content_title'])): ?>
                            <h3><?php echo wp_kses($settings['restho_contact_content_title'], wp_kses_allowed_html('post')) ?></h3>
                        <?php endif ?>
                        <ul>
                            <?php foreach($Items as $Item): ?>
                                <li>
                                    <?php if (!empty($Item['restho_contact_icon'])): ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon( $Item['restho_contact_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($Item['restho_contact_description_text'])): ?>
                                        <div class="content">
                                            <a href="<?php echo esc_url($Item['website_link']['url']) ?>"><?php echo wp_kses($Item['restho_contact_description_text'], wp_kses_allowed_html('post')) ?></a>
                                        </div>
                                    <?php endif ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Restho_Contact_Widget());
