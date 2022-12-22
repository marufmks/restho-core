<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Offer_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_offer';
    }

    public function get_title()
    {
        return esc_html__('EG Offer', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-meetup';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_offer_content_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );

        $this->add_control(
            'restho_offer_title',
            [
                'label' => esc_html__('Offer Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Buy One Get One Free', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_offer_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('write your text here', 'restho-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'restho_offer_tag',
            [
                'label' => esc_html__('Offer tag', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Limited Offer', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_offer_price_tag',
            [
                'label' => esc_html__('Offer Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$55', 'restho-core'),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
			'restho_offer_thumb',
			[
				'label' => esc_html__( 'Product thumbnail', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();
        //Repeater List
        $this->start_controls_section(
            'restho_offer_list_section',
            [
                'label' => esc_html__('Offer List', 'restho-core')
            ]
        );
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'restho_offer_list_title',
            [
                'label' => esc_html__( 'Offer List', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Prawn with Noodls.', 'restho-core' ),
                'placeholder' => esc_html__( 'Your offer list here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
			'offer_list',
			[
				'label' => esc_html__( 'Offer List', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'restho_offer_list_title' => esc_html__( 'Prawn with Noodls.', 'restho-core' ),
					],

				],
				'title_field' => '{{{ restho_offer_list_title }}}',
			]
		);
        $this->end_controls_section();
        // End Content Section

        // Start Style Section
        $this->start_controls_section(
            'restho_offer_style_title',
            [
                'label' => esc_html__('Offer Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_offer_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_title_typography',
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content h3',
            ],
        );
        $this->add_responsive_control(
            'restho_offer_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_offer_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Description
        $this->start_controls_section(
            'restho_offer_style_description',
            [
                'label' => esc_html__('Offer Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_offer_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_description_typography',
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_offer_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_offer_description_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        
        // Offer Tag
        $this->start_controls_section(
            'restho_offer_style_tag',
            [
                'label' => esc_html__('Offer Tag', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_offer_tag_color',
            [
                'label'     => esc_html__(' Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_tag_typography',
                'selector' => '{{WRAPPER}} .primary-btn3',
            ],
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_offer_tag_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .primary-btn3',
            ]
        );
        $this->add_responsive_control(
            'restho_offer_tag_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .primary-btn3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_offer_tag_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_offer_tag_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'restho_offer_tag_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover' => 'color: {{VALUE}}',
                ],
        
            ]
        );
        $this->add_control(
            'restho_offer_tag_hover_background',
            [
                'label' => esc_html__( 'Hover Background', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        // Offer Price
        $this->start_controls_section(
            'restho_offer_style_price',
            [
                'label' => esc_html__('Offer Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_offer_price_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_price_typography',
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag span',
            ],
        );
        $this->add_control(
            'restho_offer_price_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_offer_price_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag',
            ]
        );
        $this->add_responsive_control(
            'restho_offer_price_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->end_controls_section();

        // Offer List
        $this->start_controls_section(
            'restho_offer_style_list',
            [
                'label' => esc_html__('Offer list', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_offer_list_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content .features li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_list_typography',
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content .features li',
            ],
        );
        $this->add_responsive_control(
            'restho_offer_list_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content .features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_offer_list_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content .features' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Card style
        $this->start_controls_section(
            'restho_offer_style_card',
            [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_offer_content_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_offer_style_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-offer .offer-single' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_offer_style_card_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-offer .offer-single:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_offer_style_card_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .about-offer .offer-single',
            ]
        );
        $this->add_responsive_control(
            'restho_offer_style_card_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .about-offer .offer-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->end_controls_section();

        
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $Items=$settings['offer_list'];
?>
        <div class="best-offer-area1">
            <div class="best-offer-wrap clearfix">
                <div class="best-offer-img">
                    <?php if (!empty($settings['restho_offer_thumb']['url'])) : ?>
                        <img class="img-fluid" src="<?php echo esc_url($settings['restho_offer_thumb']['url']) ?>" alt="<?php echo esc_attr__('offer-img', 'restho') ?>">
                    <?php endif ?>
                    <?php if (!empty($settings['restho_offer_price_tag'])) : ?>
                        <div class="price-tag">
                            <span><?php echo wp_kses($settings['restho_offer_price_tag'], wp_kses_allowed_html('post')) ?></span>
                        </div>
                    <?php endif ?>
                </div>
                <div class="best-offer-content">
                    <?php if (!empty($settings['restho_offer_price_tag'])) : ?>
                        <h3><?php echo wp_kses($settings['restho_offer_title'], wp_kses_allowed_html('post')) ?></h3>
                    <?php endif ?>
                    <?php if (!empty($settings['restho_offer_price_tag'])) : ?>
                        <p><?php echo wp_kses($settings['restho_offer_description'], wp_kses_allowed_html('post')) ?></p>
                    <?php endif ?>
                    <?php if (!empty($settings['restho_offer_price_tag'])) : ?>
                        <a class="primary-btn3 btn-sm"><?php echo wp_kses($settings['restho_offer_tag'], wp_kses_allowed_html('post')) ?></a>
                    <?php endif ?>
                    
                    <ol class="features">
                        <?php foreach($Items as $Item):?>
                            <li><?php echo wp_kses($Item['restho_offer_list_title'], wp_kses_allowed_html('post')) ?>.</li>
                        <?php endforeach ?>
                    </ol>
                </div>
            </div>
        </div>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new Restho_Offer_Widget());
