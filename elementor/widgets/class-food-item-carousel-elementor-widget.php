<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Food_Item_Carousel_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_food_item_carousel';
    }

    public function get_title()
    {
        return esc_html__('EG Food Item Carousel', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-carousel';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //-------------Content-------------------//
        $this->start_controls_section(
            'restho_food_it_caro_general_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        
        $this->add_control(
            'restho_food_it_caro_style_selection',
            [
                'label'   => esc_html__('Select Style', 'restho-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'restho-core'),
                    'style_two' => esc_html__('Style Two', 'restho-core'),
                    'style_three' => esc_html__('Style Three', 'restho-core'),
                    'style_four' => esc_html__('Style Four', 'restho-core'),
                ],
                'default' => 'style_one',
            ]
        );
        $this->add_control(
            'restho_food_it_bullet_pt_switcher',
            [
                'label' => esc_html__('Pagination Bullet (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'restho-core'),
                'label_off' => esc_html__('Disable', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_prev_next_pagi_sty_two_switcher',
            [
                'label' => esc_html__('Pagination (prev/next)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_prev_next_pagi_sty_three_switcher',
            [
                'label' => esc_html__('Pagination (prev/next)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_three'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_section_content_food_it_caro',
            [
                'label' => esc_html__('Food Item', 'restho-core'),
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_one'
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_section_content_food_it_caro_price_tag',
            [
                'label' => esc_html__('Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$55', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
			'restho_section_content_food_it_caro_image',
			[
				'label' => esc_html__( 'Food Image', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
            'restho_section_content_food_it_caro_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Beaf Machala', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_section_content_food_it_caro_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html__("It is a long established fact that a reader will be distracted.", 'restho-core'),
                'placeholder' => esc_html__('Type your description here', 'restho-core'),
            ]
        );

        $this->add_control(
            'restho_food_it_caro_section_list',
            [
                'label' => esc_html__('Food Item Lists', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_section_content_food_it_caro_title' => esc_html__('Beaf Machal', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_section_content_food_it_caro_title }}}',
            ]
        );
        $this->end_controls_section();
        // Repeater Two
        $this->start_controls_section(
            'restho_section_content_food_it_caro_st_two',
            [
                'label' => esc_html__('Food Item', 'restho-core'),
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_two'
                ],
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'restho_section_content_food_it_caro_st_two_price_tag',
            [
                'label' => esc_html__('Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$55', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater2->add_control(
			'restho_section_content_food_it_caro_st_two_image',
			[
				'label' => esc_html__( 'Food Image', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater2->add_control(
            'restho_section_content_food_it_caro_st_two_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Beaf Machala', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater2->add_control(
            'restho_section_content_food_it_caro_st_two_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html__("It is a long established fact that a reader will be distracted.", 'restho-core'),
                'placeholder' => esc_html__('Type your description here', 'restho-core'),
            ]
        );

        $this->add_control(
            'restho_food_it_caro_st_two_section_list',
            [
                'label' => esc_html__('Food Item Lists', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'restho_section_content_food_it_caro_st_two_title' => esc_html__('Beaf Machal', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_section_content_food_it_caro_st_two_title }}}',
            ]
        );
        $this->end_controls_section();
        // Repeater Three
        $this->start_controls_section(
            'restho_section_content_food_it_caro_st_three',
            [
                'label' => esc_html__('Food Item', 'restho-core'),
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_three'
                ],
            ]
        );

        $repeater3 = new \Elementor\Repeater();

        $repeater3->add_control(
            'restho_section_content_food_it_caro_st_three_price_tag',
            [
                'label' => esc_html__('Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$55', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater3->add_control(
			'restho_section_content_food_it_caro_st_three_image',
			[
				'label' => esc_html__( 'Food Image', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater3->add_control(
            'restho_section_content_food_it_caro_st_three_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Beaf Machala', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater3->add_control(
            'restho_section_content_food_it_caro_st_three_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html__("It is a long established fact that a reader will be distracted.", 'restho-core'),
                'placeholder' => esc_html__('Type your description here', 'restho-core'),
            ]
        );

        $this->add_control(
            'restho_food_it_caro_st_three_section_list',
            [
                'label' => esc_html__('Food Item Lists', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
                'default' => [
                    [
                        'restho_section_content_food_it_caro_st_three_title' => esc_html__('Beaf Machal', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_section_content_food_it_caro_st_three_title }}}',
            ]
        );
        $this->end_controls_section();
        // Repeater Four
        $this->start_controls_section(
            'restho_section_content_food_it_caro_st_four',
            [
                'label' => esc_html__('Food Item', 'restho-core'),
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_four'
                ],
            ]
        );

        $repeater4 = new \Elementor\Repeater();

        $repeater4->add_control(
            'restho_section_content_food_it_caro_st_four_new_price_tag',
            [
                'label' => esc_html__('New Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$55', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater4->add_control(
            'restho_section_content_food_it_caro_st_four_old_price_tag',
            [
                'label' => esc_html__('Old Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$65', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater4->add_control(
			'restho_section_content_food_it_caro_st_four_image',
			[
				'label' => esc_html__( 'Food Image', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater4->add_control(
			'restho_section_content_food_it_caro_st_four_sml_image',
			[
				'label' => esc_html__( 'Food Image (Small)', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater4->add_control(
            'restho_section_content_food_it_caro_st_four_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Chicken with Drinks.', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater4->add_control(
            'restho_section_content_food_it_caro_st_four_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html__("It is a long established fact that a reader will be distracted.", 'restho-core'),
                'placeholder' => esc_html__('Type your description here', 'restho-core'),
            ]
        );

        $this->add_control(
            'restho_food_it_caro_st_four_section_list',
            [
                'label' => esc_html__('Food Item Lists', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater4->get_controls(),
                'default' => [
                    [
                        'restho_section_content_food_it_caro_st_four_title' => esc_html__('Chicken with Drinks.', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_section_content_food_it_caro_st_four_title }}}',
            ]
        );
        $this->end_controls_section();
        // Style Section Start
        //General
        $this->start_controls_section(
            'restho_food_itm_sty_one_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_thumb_border_radius',
            [
                'label'      		=> __('Thumbnail Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->add_control(
            'restho_food_itm_sty_one_bullet_pagi_color',
            [
                'label'     => esc_html__('Pagination Bullet Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .slider-pagination .swiper-pagination-xyz .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .popular-items1 .slider-pagination .swiper-pagination-xyz .swiper-pagination-bullet::after' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Price
        $this->start_controls_section(
            'restho_food_itm_sty_one_price',
            [
                'label' => esc_html__('Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_price_color',
            [
                'label'     => esc_html__('Number Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-img .price-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_price_hvr_color',
            [
                'label'     => esc_html__('Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-img:hover .price-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_price_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-img .price-tag svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_price_bg_hvr_color',
            [
                'label'     => esc_html__('Background Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-img:hover .price-tag svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_price_typography',
                'selector' => '{{WRAPPER}} .popular-items1 .popular-item-warp .item-img .price-tag span',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_price_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-img .price-tag' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Title
        $this->start_controls_section(
            'restho_food_itm_sty_one_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_title_hvr_color',
            [
                'label'     => esc_html__('Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content h3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_title_typography',
                'selector' => '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content h3',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Description
        $this->start_controls_section(
            'restho_food_itm_sty_one_desc',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_desc_typography',
                'selector' => '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Food Card
        $this->start_controls_section(
            'restho_food_itm_sty_one_card',
            [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_food_itm_sty_one_card_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content',
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_card_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .popular-items1 .popular-item-warp .item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Style Two
        //Price
        $this->start_controls_section(
            'restho_food_itm_sty_two_price',
            [
                'label' => esc_html__('Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_price_color',
            [
                'label'     => esc_html__('Number Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .item-img .price h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_price_hvr_color',
            [
                'label'     => esc_html__('Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .item-img .price h5:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_price_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .item-img .price h5::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_price_bg_hvr_color',
            [
                'label'     => esc_html__('Background Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .item-img .price h5:hover::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_two_price_typography',
                'selector' => '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .item-img .price h5',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_two_price_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .item-img .price h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_two_price_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .item-img .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Title
        $this->start_controls_section(
            'restho_food_itm_sty_two_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .reguler-items-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_title_hvr_color',
            [
                'label'     => esc_html__('Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .reguler-items-content h3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_two_title_typography',
                'selector' => '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .reguler-items-content h3',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_two_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .reguler-items-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_two_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .reguler-items-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Description
        $this->start_controls_section(
            'restho_food_itm_sty_two_desc',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .reguler-items-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_two_desc_typography',
                'selector' => '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .reguler-items-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_two_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .reguler-items-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_two_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .reguler-items-wrap .reguler-items-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Pagination
        $this->start_controls_section(
            'restho_food_itm_sty_two_pagination',
            [
                'label' => esc_html__('Pagination (prev/next)', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_pagination_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .prev-btn-3 i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .next-btn-3 i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_pagination_icon_hvr_color',
            [
                'label'     => esc_html__('Icon Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .prev-btn-3:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .next-btn-3:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .prev-btn-3' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .next-btn-3' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_two_pagination_bg_hvr_color',
            [
                'label'     => esc_html__('Background Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .prev-btn-3:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .next-btn-3:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_two_pagination_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .prev-btn-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .h2-reguler-item .slider-btn .next-btn-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->end_controls_section();
        //Style Three
        //Price
        $this->start_controls_section(
            'restho_food_itm_sty_three_price',
            [
                'label' => esc_html__('Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_price_color',
            [
                'label'     => esc_html__('Number Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-img .food-price span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_three_price_typography',
                'selector' => '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-img .food-price span',
            ],
        );
        $this->end_controls_section();
        //Title
        $this->start_controls_section(
            'restho_food_itm_sty_three_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_title_hvr_color',
            [
                'label'     => esc_html__('Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-content h3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_three_title_typography',
                'selector' => '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-content h3',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Description
        $this->start_controls_section(
            'restho_food_itm_sty_three_desc',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_three_desc_typography',
                'selector' => '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .h3-popular-food-card .food-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Pagination
        $this->start_controls_section(
            'restho_food_itm_sty_three_pagination',
            [
                'label' => esc_html__('Pagination (prev/next)', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_pagination_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3 i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3 i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_pagination_icon_hvr_color',
            [
                'label'     => esc_html__('Icon Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_pagination_bg_hvr_color',
            [
                'label'     => esc_html__('Background Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_pagination_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->add_control(
            'restho_food_itm_sty_three_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3' => 'border:1px solid {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Style Four
        //General
        $this->start_controls_section(
            'restho_food_itm_sty_four_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_four'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_img_brdr_color',
            [
                'label'     => esc_html__('Food Image Border', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-img::after' => 'border:2x dashed {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_sl_num_color',
            [
                'label'     => esc_html__('Sl. Number', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .sl-no span' => '-webkit-text-stroke:1px {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        //New Price
        $this->start_controls_section(
            'restho_food_itm_sty_four_new_price',
            [
                'label' => esc_html__('New Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_four'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_new_price_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .price-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_four_new_price_typography',
                'selector' => '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .price-tag span',
            ],
        );
        $this->end_controls_section();
        //Old Price
        $this->start_controls_section(
            'restho_food_itm_sty_four_old_price',
            [
                'label' => esc_html__('Old Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_four'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_old_price_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .price-tag span del' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_four_old_price_typography',
                'selector' => '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .price-tag span del',
            ],
        );
        $this->end_controls_section();
        //Title
        $this->start_controls_section(
            'restho_food_itm_sty_four_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_four'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_title_hvr_color',
            [
                'label'     => esc_html__('Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_four_title_typography',
                'selector' => '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_four_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_four_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Description
        $this->start_controls_section(
            'restho_food_itm_sty_four_desc',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_four'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_four_desc_typography',
                'selector' => '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_four_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_four_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Pagination
        $this->start_controls_section(
            'restho_food_itm_sty_four_pagination',
            [
                'label' => esc_html__('Pagination (prev/next)', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_caro_style_selection' => 'style_four'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_pagination_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3 i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3 i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_pagination_icon_hvr_color',
            [
                'label'     => esc_html__('Icon Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_four_pagination_bg_hvr_color',
            [
                'label'     => esc_html__('Background Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_four_pagination_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->add_control(
            'restho_food_itm_sty_four_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3' => 'border:1px solid {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
 
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $fooditems1 = $settings['restho_food_it_caro_section_list'];
        $fooditems2 = $settings['restho_food_it_caro_st_two_section_list'];
        $fooditems3 = $settings['restho_food_it_caro_st_three_section_list'];
        $fooditems4 = $settings['restho_food_it_caro_st_four_section_list'];
        
?>
        <?php if( is_admin() ) : ?>
            <script>
                // Popular Items slider
                var swiper = new Swiper(".popular-item-slider", {
                slidesPerView: 3,
                spaceBetween: 30,
                // centeredSlides: true,
                loop: true,
                speed:1500,
                autoplay: {
                    delay: 2000,
                },
                pagination: {
                    el: ".swiper-pagination-xyz",
                    clickable: true,
                },
                breakpoints: {
                    280:{
                    slidesPerView: 1,
                    spaceBetween: 15
                    },
                    480:{
                    slidesPerView: 1
                    },
                    768:{
                    slidesPerView: 2
                    },
                    992:{
                    slidesPerView: 3
                    },
                    1200:{
                    slidesPerView: 3
                    },
                    1400:{
                    slidesPerView:3
                    },
                    1600:{
                    slidesPerView: 3
                    },
                }
                });
                // h2-reguler-items-slider
                var swiper = new Swiper(".h2-reguler-items-slider", {
                slidesPerView: 4,
                spaceBetween: 25,
                loop: true,
                speed:1500,
                autoplay: {
                    delay: 2000,
                },
                navigation: {
                    nextEl: ".next-btn-3",
                    prevEl: ".prev-btn-3",
                },

                breakpoints: {
                    280:{
                    slidesPerView: 1,
                    spaceBetween: 15,
                    },
                    480:{
                    slidesPerView: 2,
                    spaceBetween: 15,
                    },
                    768:{
                    slidesPerView: 2,
                    spaceBetween: 20,
                    },
                    992:{
                    slidesPerView: 3,
                    spaceBetween: 20,
                    },
                    1200:{
                    slidesPerView: 3,
                    spaceBetween: 20,
                    },
                    1400:{
                    slidesPerView:3,
                    spaceBetween: 15,
                    },
                    1600:{
                    slidesPerView: 3
                    },
                }
                });
                var swiper = new Swiper(".h3-popular-food-slider", {
                slidesPerView: 4,
                spaceBetween: 55,
                loop: true,
                speed:1500,
                autoplay: {
                    delay: 2000,
                },
                navigation: {
                    nextEl: ".next-btn-3",
                    prevEl: ".prev-btn-3",
                },

                breakpoints: {
                    280:{
                    slidesPerView: 1,
                    spaceBetween: 15,
                    },
                    480:{
                    slidesPerView: 2,
                    spaceBetween: 15,
                    },
                    768:{
                    slidesPerView: 2,
                    spaceBetween: 20,
                    },
                    992:{
                    slidesPerView: 3,
                    spaceBetween: 20,
                    },
                    1200:{
                    slidesPerView: 3,
                    spaceBetween: 20,
                    },
                    1400:{
                    slidesPerView:3,
                    spaceBetween: 15,
                    },
                    1600:{
                    slidesPerView: 3
                    },
                }
                });
                // double row  slider
                jQuery('#slick1').slick({
                    rows: 2,
                    dots: false,
                    arrows: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 2,
                    slidesToScroll: 2
                });

            </script>
        <?php endif ?>
        <?php if( !empty( $settings['restho_food_it_caro_style_selection'] ) && ($settings['restho_food_it_caro_style_selection'] == 'style_one') )  : ?>
            <div class="popular-items1">
                    <div class="row mb-70">
                        <div class="swiper popular-item-slider">
                            <div class="swiper-wrapper">
                                <?php foreach($fooditems1 as $item):?>
                                <div class="swiper-slide">
                                    <div class="popular-item-warp">
                                        <div class="item-img">
                                            <?php if (!empty($item['restho_section_content_food_it_caro_image']['url'])) : ?>
                                                <img class="img-fluid" src="<?php echo esc_url($item['restho_section_content_food_it_caro_image']['url']) ?>" alt="<?php echo esc_attr__('food-img', 'restho') ?>">
                                            <?php endif ?>
                                            <?php if (!empty($item['restho_section_content_food_it_caro_price_tag'])) : ?>
                                                <div class="price-tag">
                                                    <svg width="70" height="71" viewBox="0 0 70 71" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M69.5379 34.0184C69.2812 33.6483 69.1038 33.2214 69.0113 32.7669C68.7841 31.6455 68.5514 30.5259 68.3112 29.408C68.1986 28.8839 68.1745 28.303 67.9176 27.8559C67.7312 27.5279 67.5667 27.1907 67.4116 26.848C67.4522 26.8095 67.4615 26.7747 67.3672 26.7434C66.9182 25.7263 66.558 24.6727 65.9724 23.7179C65.3239 22.6605 64.8123 21.5263 64.1268 20.4855C64.2451 20.3957 64.4004 20.3187 64.5904 20.2473C64.6311 20.2325 64.6514 20.1667 64.6773 20.1264C64.4408 20.0897 64.2063 20.0494 63.9698 20.02C63.8996 20.0127 63.8348 19.9963 63.7739 19.9761C63.5098 19.6132 63.2381 19.2577 62.9629 18.906C62.9519 18.8711 62.9408 18.8382 62.9297 18.807C62.8318 18.5102 63.5319 18.5339 63.8533 18.3709C63.9826 18.3031 64.1822 18.3306 64.2264 18.0411C63.5078 17.8524 62.5472 18.402 62.0724 17.6654C61.6659 17.0314 61.0138 16.5514 60.8218 15.7817C61.3316 15.4134 61.9911 15.4537 62.6025 15.2025C62.3531 15.023 61.9837 15.089 61.9984 14.7682C62.0151 14.3467 62.5859 14.4329 62.717 14.1306C61.834 13.8227 60.9527 13.8704 60.0698 14.0793C59.8425 14.1344 59.7114 14.2405 59.39 14.0574C58.1911 13.3756 57.5666 12.2744 56.9385 11.1547C56.7593 10.8359 56.9755 10.6967 57.247 10.6783C58.0006 10.6306 58.7064 10.2715 59.4749 10.3375C59.824 10.3669 60.0807 10.244 60.3246 9.9912C60.0714 9.82999 59.8443 9.85932 59.6631 9.95827C58.8779 10.387 58.0449 10.2679 57.2154 10.2075C57.0177 10.1929 56.7092 10.2809 56.7038 9.98202C56.6963 9.74201 56.9938 9.69973 57.1933 9.63388C57.5775 9.5074 58.0394 9.67238 58.3904 9.34259C58.0929 9.17401 57.7347 9.4196 57.3761 9.08981C59.1368 8.46315 60.9083 8.21756 62.6854 7.75211C62.3843 7.57795 62.1386 7.6366 61.9115 7.67511C60.3228 7.94822 58.7377 8.23214 57.1509 8.5236C56.8035 8.58783 56.2993 8.73069 56.2273 8.37157C56.1515 8.01048 56.6873 8.08028 56.9827 7.9923C57.8566 7.73574 58.7192 7.44247 59.5875 7.16216C59.5708 7.09991 59.5543 7.03568 59.5358 6.97163C58.6472 7.12186 57.755 7.25572 56.8701 7.4297C56.3824 7.52685 55.8429 7.51948 55.4865 7.97575C55.1762 8.37517 54.8713 8.29637 54.5555 7.9556C53.6448 6.96965 52.5123 6.37412 51.2026 6.07005C50.8257 5.98387 50.7279 5.70356 51.0622 5.4416C51.5998 5.01645 52.1651 4.62801 52.7174 4.22481C52.3277 4.22121 52.0173 4.50692 51.6404 4.4722C50.9292 4.40617 50.4304 4.61703 50.2716 5.37557C50.2382 5.53497 49.9556 5.68341 49.9298 5.54415C49.806 4.86604 49.2611 5.34984 48.9489 5.16848C48.633 4.98532 47.9866 5.10803 48.0105 4.63898C48.029 4.25791 48.6109 4.17713 49.0117 4.18451C49.4976 4.19368 49.6841 4.00495 49.6269 3.41301C48.7697 4.04525 47.8295 4.1442 46.9224 4.08195C46.3313 4.04165 45.5775 4.09293 45.2265 3.32521C45.0898 3.02655 44.9291 3.15105 44.8329 3.44252C44.7499 3.69171 44.4727 3.75036 44.227 3.73939C44.0089 3.73021 43.911 3.54885 43.8519 3.36372C43.6246 2.62695 43.4935 2.57207 42.6604 2.86336C42.6622 2.99722 42.8044 3.0082 42.8545 3.07963C43.0355 3.33619 43.5675 3.38567 43.4623 3.74299C43.3458 4.13521 42.9118 3.79804 42.6236 3.87864C42.3778 3.94827 42.0988 3.8934 41.8514 3.8934C41.7923 3.27034 42.2042 2.88369 42.4592 2.42184C42.6551 2.06812 42.9802 1.85186 43.3144 1.80238C43.695 1.74553 43.8058 2.15053 43.8575 2.50784C44.301 2.2 43.8999 1.93246 43.9369 1.65755C44.0238 1.01992 43.6986 0.787102 43.1131 1.03449C42.91 1.12067 42.9856 0.994189 42.945 0.933736C42.5995 0.426185 40.8593 0.176998 40.4639 0.688147C40.0649 1.20307 39.5643 1.1921 39.0599 1.2691C38.6516 1.33136 38.3044 1.40296 38.3227 1.91051C38.3302 2.13595 38.3338 2.37057 38.0641 2.42904C37.8203 2.48212 37.5301 2.43084 37.4378 2.18903C37.2383 1.66133 36.9833 1.93804 36.684 2.06075C36.3441 2.2018 36.2295 2.49687 36.0227 2.83224C35.7954 1.97097 35.1673 2.46574 34.7019 2.40889C34.2124 2.34844 34.4394 2.87794 34.2401 3.10517C33.6933 2.1651 32.7697 2.29158 31.942 2.26405C31.6391 2.25488 31.2641 2.39234 30.9797 2.49129C30.2258 2.75523 30.9575 3.18218 31.0036 3.5816C30.5897 3.5852 30.2794 3.02997 29.8232 3.35994C29.245 3.77591 28.761 3.5359 28.3767 3.08682C28.107 2.7716 28.0016 2.77538 27.828 3.14727C27.4568 3.94252 26.8065 3.88944 26.1193 3.63845C25.9789 3.58718 25.82 3.39106 25.7277 3.42399C24.8317 3.74838 23.9117 4.01592 23.0748 4.48317C22.8828 4.5895 22.8625 4.78363 22.8494 4.97237C22.8365 5.21616 22.8532 5.44879 22.5169 5.51842C22.1935 5.58445 22.0384 5.4891 21.9037 5.18683C21.8317 5.02742 21.5507 4.60048 21.4252 5.21058C21.3828 5.41209 21.2275 5.34246 21.1038 5.35164C20.3464 5.40669 19.7164 5.71453 19.0827 6.14328C18.1183 6.79387 16.9822 7.18051 16.0918 7.97035C15.9033 8.13714 15.6004 8.17384 15.3565 8.28377C15.0868 8.40468 14.7783 8.48906 14.5677 8.67959C13.0806 10.0338 11.4862 11.2927 10.4573 13.0721C10.328 13.2994 10.2005 13.5613 9.99731 13.7044C9.43395 14.102 8.94804 14.6279 8.8501 15.2473C8.77446 15.7256 8.65058 15.8758 8.2258 15.8758C8.27386 16.1342 8.68758 16.0206 8.60451 16.3285C8.58783 16.3889 8.46775 16.4879 8.44744 16.4769C7.84889 16.1324 8.08904 16.6547 8.0816 16.847C8.07416 17.0908 8.04097 17.3051 7.93759 17.5379C7.43136 18.6813 6.91226 19.8266 6.92513 21.1148C6.92894 21.4319 6.4911 21.6645 6.69243 21.9596C7.06552 22.5112 6.76806 22.7915 6.39134 23.1562C6.00899 23.5263 5.54702 23.6125 4.92635 23.6767C5.59328 24.034 5.5619 24.5984 5.31994 24.9009C4.80265 25.5459 5.35313 26.649 4.33524 27.032C4.31311 27.0412 4.29642 27.1585 4.31855 27.1749C4.83022 27.5781 4.25761 27.6459 4.10054 27.754C3.74395 27.9996 3.64618 28.3111 3.6645 28.7107C3.683 29.0753 3.77895 29.4492 3.67738 29.7002C3.10296 29.9366 3.04002 29.0167 2.46179 29.31C2.03138 29.528 1.53821 29.7002 1.31094 30.1547C1.04486 30.6862 1.02654 31.1919 1.7136 31.3274C1.75242 31.8607 1.28682 31.1917 1.21663 31.6426C1.06137 32.6395 0.867474 33.6107 0.509071 34.5873C0.176424 35.4963 0.0989759 36.5646 0.0675975 37.6017C-0.00259577 39.8996 0.5497 42.0876 0.994983 44.3013C1.20556 45.3495 2.00363 46.1869 2.03881 47.2937C2.04262 47.4531 2.18664 47.5942 2.37509 47.4164C2.47666 47.3211 2.61342 47.1818 2.67255 47.3907C2.82218 47.9038 3.53536 48.241 3.04945 48.9796C3.29141 48.8605 3.44286 48.7194 3.53899 48.7505C3.75519 48.8202 3.70531 49.0474 3.70531 49.2325C3.70531 49.3865 3.42454 49.5001 3.58343 49.6449C4.22623 50.2404 4.38149 51.2942 5.31813 51.5799C5.75035 51.71 5.23868 52.2469 5.65059 52.1956C6.26383 52.1224 6.28614 52.6373 6.29158 52.9011C6.31552 53.9345 7.11377 54.5009 7.5625 55.2778C7.87283 55.8129 8.54901 55.9521 8.72458 56.5898C8.91304 57.2715 9.17712 57.8744 9.82011 58.3636C10.6606 59.0012 11.274 59.9267 12.2605 60.4085C14.5143 61.5098 16.6388 62.798 18.4546 64.5481C18.5544 64.6435 18.6782 64.8468 18.8573 64.7404C19.3856 64.4252 19.491 64.7331 19.5501 65.1638C19.5723 65.3178 19.6147 65.4754 19.7885 65.554C21.0519 66.124 22.1937 67.0072 23.6402 67.108C24.0927 67.1391 24.5398 67.0384 24.9019 67.4378C24.9887 67.5331 25.2253 67.6614 25.4135 67.4799C25.746 67.1573 26.0342 67.3791 26.3612 67.5238C27.1611 67.8737 27.9962 68.1377 28.8477 67.7253C29.1396 67.586 29.4131 67.6593 29.4684 67.837C29.6476 68.3996 30.1335 68.3665 30.538 68.5754C31.9863 69.3231 33.1852 68.9327 34.3694 67.9559C34.4286 68.1521 34.4951 68.3206 34.362 68.491C34.0018 68.9509 34 68.9509 34.5967 69.224C34.7371 69.2881 34.798 69.4 34.8073 69.5374C34.8294 69.8526 35.0345 69.8399 35.2858 69.9241C35.9231 70.133 36.59 69.5283 37.194 70.034C37.2254 70.0597 37.3455 70.0029 37.4102 69.9626C38.0975 69.5247 38.5261 68.7422 39.4183 68.5644C39.8431 68.48 39.3943 68.1191 39.5476 67.8021C39.8099 68.568 40.4508 67.6335 40.7742 68.176C41.1381 67.7636 41.6369 67.4723 41.8458 66.8437C42.267 68.11 42.6439 68.4214 43.477 68.2071C46.1316 67.5272 48.6384 66.5376 50.8313 64.8426C51.8289 64.0729 52.8818 63.3749 53.9385 62.6876C54.5777 62.2716 55.0119 62.4861 55.1523 63.2025C55.2798 63.8549 55.9356 64.192 56.5044 63.8475C56.8665 63.6276 57.2064 63.3417 57.4835 63.0247C57.6738 62.8067 58.0728 62.5611 57.8345 62.2129C57.5758 61.8337 57.1509 61.9729 56.8073 62.1323C56.1553 62.4366 55.5364 62.1928 54.7327 62.1507C55.2758 61.8117 55.6933 61.6138 56.0352 61.3261C57.5316 60.0708 59.1277 58.8999 60.3137 57.3386C61.182 56.197 62.2073 55.8433 63.5466 56.1751C63.9086 56.263 64.0305 56.1585 64.1377 55.7792C64.3447 55.0516 63.977 54.4379 63.8495 53.7836C63.7922 53.4903 63.6721 53.3035 63.8976 52.9993C64.6401 51.9988 65.3348 50.9651 65.913 49.8585C66.2049 49.3032 66.5558 48.8414 67.197 48.607C67.5554 48.4769 67.9249 48.0114 67.766 47.709C67.5037 47.2124 67.5942 46.822 67.7143 46.3493C67.7549 46.1917 67.7513 46.0231 67.7421 45.8546C68.226 44.9676 68.4828 44.0165 68.7415 43.0637C68.941 42.3271 69.2919 41.5775 69.0924 40.7895C68.9705 40.3057 69.1182 39.9099 69.2513 39.4737C69.4434 38.8453 69.8 38.2258 69.6115 37.5387C69.4379 36.8973 69.5727 36.2908 69.739 35.6879C69.9019 35.096 69.9112 34.5591 69.5379 34.0184ZM10.7147 27.5644C10.4856 27.7972 10.3673 27.4563 10.2714 27.2841C10.1901 27.1412 10.1217 26.9561 9.92766 27.0844C9.75227 27.1999 9.90372 27.3152 10.0053 27.3978C10.2104 27.5646 10.2066 27.788 10.1161 27.9823C9.9536 28.3251 9.76878 27.8962 9.5767 27.9696C9.42162 28.03 9.26273 28.019 9.10185 27.9879C9.31243 27.2603 9.5397 26.5385 9.79653 25.8237C9.80578 25.8311 9.81322 25.8383 9.82428 25.8474C9.88522 25.7704 9.89266 25.6715 9.88885 25.5689C9.95161 25.4003 10.0182 25.2317 10.0847 25.0632C10.1254 25.0558 10.1716 25.0504 10.2288 25.0522C10.4966 25.0578 10.5908 25.2557 10.5872 25.4975C10.5743 26.1956 11.4112 26.8607 10.7147 27.5644ZM10.5208 16.3661C10.5393 16.1021 10.6483 15.9172 10.953 15.908C11.3132 15.897 11.2412 16.1334 11.2042 16.335C11.1489 16.63 11.2836 16.8792 11.3649 17.1705C10.9363 17.0167 10.4763 16.9233 10.5208 16.3661ZM11.8858 25.7411C11.8488 25.8309 11.8138 25.9207 11.7786 26.0104C11.6825 25.8033 11.6863 25.5486 11.8064 25.2389C11.921 24.9439 11.8693 24.8248 11.7066 24.6305C11.5514 24.4453 11.52 24.1375 11.7195 24.0607C12.4307 23.7857 11.8969 23.3827 11.8414 22.9173C12.244 23.282 12.6302 23.1884 12.9423 22.9759C13.2434 22.7688 13.7034 22.5967 13.5095 22.0578C13.4892 22.0027 13.5355 21.8727 13.5833 21.8525C14.8247 21.3412 13.6278 21.0938 13.4283 20.6651C14.06 20.61 14.1191 20.1759 14.0507 19.6939C13.9621 19.0764 14.4719 19.0397 14.8174 19.0139C15.2293 18.9828 15.0964 19.384 15.0761 19.6242C15.0483 19.9724 15.1038 20.3095 15.1684 20.6467C13.8146 22.1641 12.6563 23.8188 11.8858 25.7411ZM13.105 53.8203C13.0274 53.7506 12.959 53.6774 12.8888 53.6022C12.9683 53.6774 13.0439 53.7542 13.1197 53.8331C13.1143 53.8277 13.1089 53.8241 13.105 53.8203ZM15.3663 22.4023C15.0855 22.8788 14.7124 23.359 14.3206 23.8023C14.559 23.3295 14.8138 22.864 15.0891 22.4077C15.176 22.2649 15.2629 22.1201 15.346 21.9752C15.3699 22.0632 15.4198 22.1328 15.5234 22.1512C15.4697 22.2338 15.4162 22.3144 15.3663 22.4023ZM16.6871 10.0808C16.8367 10.002 16.9403 10.09 17.0103 10.2145C17.2098 10.57 17.6163 10.4894 18.0614 10.7037C17.6346 10.8814 17.5682 11.4532 17.0324 11.2645C16.6537 11.1326 16.6998 10.7679 16.5928 10.4838C16.5282 10.3098 16.5117 10.1742 16.6871 10.0808ZM16.4803 30.6504C16.3214 29.8441 16.1571 29.0433 16.4841 28.2114C16.5986 27.9219 16.7796 27.6781 16.9497 27.4289C17.068 27.5809 17.1973 27.7404 17.356 27.8614C17.2027 28.3287 17.0605 28.7997 16.8942 29.2596C16.7279 29.7159 16.5966 30.1813 16.4803 30.6504ZM17.6237 58.0937C17.5276 58.0075 17.4409 57.9159 17.3558 57.8206C17.7178 58.0881 18.0855 58.3521 18.4588 58.6066C18.1613 58.4748 17.8731 58.3209 17.6237 58.0937ZM20.9268 9.63352C20.7255 9.7197 20.5241 9.80948 20.3264 9.90286C20.186 9.83503 20.1418 9.71592 20.1768 9.54554C20.2192 9.3219 20.1768 9.01964 20.5205 8.99769C20.8586 8.97754 20.9047 9.26163 20.9288 9.49246C20.9324 9.54194 20.9324 9.58782 20.9268 9.63352ZM25.7337 62.4825C25.9165 62.5467 26.0884 62.6253 26.2343 62.7426C26.3803 62.8599 26.5317 62.9553 26.6868 63.0377C26.6092 63.1019 26.5335 63.1935 26.4633 63.3218C26.4595 63.3272 26.4577 63.3292 26.4541 63.3346C26.2713 63.2502 26.0903 63.1642 25.9072 63.0798C25.8574 63.0377 25.8093 62.9974 25.7649 62.9661C25.6486 62.7885 25.6615 62.6365 25.7337 62.4825ZM25.7576 63.0102C25.5452 62.913 25.3346 62.814 25.1259 62.7151C25.3364 62.7811 25.5434 62.8837 25.754 62.9661C25.754 62.9826 25.7558 62.9956 25.7576 63.0102ZM25.68 60.223C25.4491 60.333 25.1997 60.4082 24.9521 60.4832C24.9187 60.4228 24.8578 60.3751 24.8025 60.3348C24.5346 60.146 24.289 59.9334 24.0525 59.7099C24.5957 59.8749 25.1387 60.0471 25.68 60.223ZM23.3395 60.4613C23.14 60.2761 22.9461 60.0453 22.7261 59.8693C23.2009 60.1424 23.683 60.4044 24.1707 60.6574C24.2095 60.6775 24.2465 60.6941 24.2854 60.7086C24.2817 60.7104 24.2761 60.7122 24.2707 60.7142C24.1506 60.7673 24.0416 60.7856 23.938 60.7803C23.7367 60.6775 23.5372 60.573 23.3395 60.4613ZM26.7829 64.7419C26.8143 65.1084 26.5299 65.2165 26.334 65.0535C25.7188 64.5477 24.8728 64.5972 24.2409 64.0969C24.5106 64.1739 24.7785 64.2527 25.0537 64.3004C25.8278 64.434 26.6092 64.5312 27.3905 64.6319C27.3684 64.8245 27.2465 64.9306 26.7829 64.7419ZM27.0287 63.5857C27.1007 63.5215 27.1856 63.485 27.2984 63.5235C27.4167 63.5656 27.4627 63.65 27.4684 63.7433C27.3205 63.6957 27.1727 63.6424 27.0287 63.5857ZM26.4189 9.57307C26.3765 9.55472 26.3357 9.42643 26.3562 9.40269C26.6407 9.08387 27.012 9.18462 27.5291 9.1517C27.1247 9.54014 26.831 9.7636 26.4189 9.57307ZM27.0711 7.30447C27.0213 6.87375 27.1007 6.51643 27.5126 6.38455C27.7029 6.3241 27.6401 6.54756 27.6789 6.65209C27.8988 7.2532 27.2964 7.10656 27.0711 7.30447ZM32.1439 4.19836C32.1956 4.15626 32.3563 4.19098 32.4321 4.24226C32.5319 4.30649 32.5337 4.45474 32.4285 4.508C31.8263 4.80666 32.1089 5.12746 32.5653 5.5195C31.843 5.54703 31.6065 5.27391 31.5456 4.82861C31.4862 4.39447 31.9223 4.38529 32.1439 4.19836ZM33.3374 8.82551C32.9846 9.28916 32.6003 9.38991 32.2419 9.47052C31.3718 9.66843 30.5627 10.0698 29.6741 10.2035C29.5669 10.2183 29.4561 10.3025 29.4247 10.1393C29.4118 10.0714 29.4653 9.93399 29.5098 9.92301C30.7547 9.62435 31.8778 8.89693 33.3374 8.82551ZM28.185 6.87753C28.0852 6.74007 28.1757 6.61916 28.294 6.54396C28.6894 6.29297 28.3217 5.66254 28.8889 5.44807C28.9277 5.9648 29.0164 6.445 29.6832 6.04001C29.6832 6.03443 29.687 6.02903 29.687 6.02165C29.6926 6.02345 29.698 6.02723 29.7055 6.02903L29.6833 6.04181C30.0492 6.48531 30.4961 5.77427 30.8989 6.12619C30.9895 6.20499 31.2296 6.14634 31.2018 6.37537C31.1779 6.55853 31.0041 6.54036 30.8841 6.51643C30.0546 6.35342 29.336 6.84262 28.5436 6.8975C28.4179 6.90685 28.2829 7.01678 28.185 6.87753ZM29.9438 59.0833C29.8662 59.0356 29.7867 58.9899 29.7111 58.9366C29.2825 58.638 28.8372 58.3704 28.3885 58.1121C29.061 58.44 29.7095 58.8103 30.3466 59.197C30.2135 59.1583 30.0786 59.1198 29.9438 59.0833ZM35.8293 62.2736C35.9106 62.2736 35.9919 62.2736 36.0749 62.2718C36.3187 62.3707 36.5313 62.5064 36.7252 62.6694C36.3891 62.6768 36.0807 62.598 35.8293 62.2736ZM36.5646 10.9054C34.4864 10.9181 32.4339 11.2683 30.376 11.6164C30.9044 11.3562 31.4235 11.1107 31.9961 10.9586C32.7368 10.7625 33.4925 10.7992 34.2314 10.7039C35.155 10.5866 36.0713 10.5133 36.9894 10.5115C36.838 10.6213 36.6976 10.7569 36.5646 10.9054ZM38.2587 62.5118C38.3788 62.3781 38.5876 62.4092 38.776 62.4623C38.6041 62.4769 38.4323 62.4952 38.2587 62.5118ZM41.4415 5.03588C41.1774 4.93513 41.0554 4.80127 41.0407 4.59796C41.0111 4.19656 40.8245 4.0537 40.4681 4.27734C40.0413 4.54308 39.8474 4.14726 39.5646 4.00063C39.3466 3.88692 39.3412 3.68001 39.4502 3.5242C39.6183 3.28239 39.8086 3.49128 39.8991 3.60859C40.1688 3.95673 40.3776 4.06666 40.5272 3.54256C40.5936 3.30434 40.7581 3.27322 40.9594 3.30075C41.1718 3.33187 41.2643 3.47671 41.3235 3.67282C41.4546 4.10498 41.449 4.5447 41.4415 5.03588ZM42.247 7.70209C42.1935 7.64704 42.1103 7.60314 42.0918 7.53909C42.0475 7.39066 42.1471 7.29728 42.2673 7.22387C42.5721 7.03873 42.9176 7.05889 43.252 7.02038C43.2631 7.7388 42.5057 7.36673 42.247 7.70209ZM44.3106 8.43148C44.5471 8.64775 44.4473 9.01424 43.991 8.84008C43.7804 8.75948 43.5753 8.64217 43.2724 8.57254C43.6382 8.28665 44.063 8.20605 44.3106 8.43148ZM44.4566 61.5663C44.1074 61.6397 43.7565 61.6964 43.4369 61.6158C43.7048 61.5992 43.9689 61.5627 44.2257 61.4674C44.283 61.4454 44.4602 61.4253 44.5877 61.537C44.5453 61.5462 44.5008 61.5571 44.4566 61.5663ZM45.1086 7.24042C45.674 6.85378 45.5704 6.60459 44.8242 6.41208C45.2657 6.34245 45.5835 5.9612 45.7202 6.56789C45.8327 7.07724 45.6591 7.30088 45.1086 7.24042ZM48.3821 60.6683C48.2436 60.6903 48.105 60.7178 47.9664 60.7435C48.3803 60.1187 49.5625 59.7338 50.2092 60.082C49.6531 60.3531 49.0491 60.5566 48.3821 60.6683ZM50.9185 59.6824C51.1106 59.4551 51.3433 59.2866 51.6132 59.182C51.3896 59.36 51.1587 59.5268 50.9185 59.6824ZM57.907 16.2067C57.8867 16.1809 57.8664 16.1572 57.8461 16.1315C57.8682 16.1442 57.8885 16.159 57.9126 16.17C57.9107 16.1829 57.9088 16.1939 57.907 16.2067ZM61.1658 48.3943C61.116 48.4511 61.0661 48.506 61.0144 48.5629C61.2342 48.2367 61.4448 47.9069 61.6499 47.5733C61.4947 47.85 61.334 48.1232 61.1658 48.3943ZM63.8629 20.8558C64.1345 21.2626 64.3746 21.6933 64.5409 22.1733C64.8088 22.9502 65.2835 23.6191 65.6845 24.3394C65.0508 23.5679 64.4597 22.7451 64.0532 21.8307C63.8611 21.4018 63.7982 21.094 63.8629 20.8558ZM62.4054 22.9759C62.5938 22.9466 62.7877 22.8642 62.9798 22.7469C63.2256 22.5929 63.5969 22.5691 63.5488 22.8109C63.3529 23.7949 64.4337 24.0094 64.6664 24.7661C64.7865 25.1528 64.8161 25.2058 64.5132 25.3525C64.0588 25.5741 63.946 25.8179 64.4412 26.1331C64.5206 26.1826 64.5926 26.3017 64.5982 26.3933C64.6314 26.8202 64.7571 27.2821 64.8255 27.6943C64.2748 26.005 63.5212 24.4108 62.4054 22.9759ZM65.0968 40.4505C65.3406 39.4408 65.5273 38.4165 65.701 37.3885C65.7694 38.4586 65.4387 39.4646 65.0968 40.4505ZM65.7121 31.5465C65.7028 31.5044 65.6954 31.4603 65.6918 31.4147C65.7563 31.4621 65.7509 31.5042 65.7121 31.5465ZM67.7571 35.981C67.7091 34.7953 67.6057 33.6134 67.5206 32.4296C67.4762 31.8193 67.3378 31.2256 67.4375 30.5971C67.4522 30.5091 67.4671 30.4211 67.4838 30.3332C67.8643 32.2007 67.8901 34.099 67.7571 35.981Z" />
                                                    </svg>
                                                    <span><?php echo wp_kses($item['restho_section_content_food_it_caro_price_tag'], wp_kses_allowed_html('post')) ?></span>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="item-content text-center">
                                            <?php if (!empty($item['restho_section_content_food_it_caro_title'])) : ?>
                                                <h3><?php echo wp_kses($item['restho_section_content_food_it_caro_title'], wp_kses_allowed_html('post')) ?></h3>
                                            <?php endif ?>
                                            <?php if (!empty($item['restho_section_content_food_it_caro_description'])) : ?>
                                                <p><?php echo wp_kses($item['restho_section_content_food_it_caro_description'], wp_kses_allowed_html('post')) ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>

                            </div>
                        </div>
                        
                    </div>
                    <?php if ($settings['restho_food_it_bullet_pt_switcher'] == 'yes') : ?>
                        <div class="row">
                            <div class="slider-pagination">
                                <div class="swiper-pagination-xyz"></div>
                            </div>
                        </div>
                    <?php endif ?>
            </div>
        <?php endif ?>
        <?php if( !empty( $settings['restho_food_it_caro_style_selection'] ) && ($settings['restho_food_it_caro_style_selection'] == 'style_two') )  : ?>
            <div class="h2-reguler-item">
                <div class="row position-relative">
                    <div class="swiper h2-reguler-items-slider">
                        <div class="swiper-wrapper">
                        <?php foreach($fooditems2 as $item2):?>
                            <div class="swiper-slide">
                                <div class="reguler-items-wrap">
                                    <div class="item-img">
                                        <?php if (!empty($item2['restho_section_content_food_it_caro_st_two_image']['url'])) : ?>
                                            <img class="img-fluid" src="<?php echo esc_url($item2['restho_section_content_food_it_caro_st_two_image']['url']) ?>" alt="<?php echo esc_attr__('food-img', 'restho') ?>">
                                        <?php endif ?>
                                        <?php if (!empty($item2['restho_section_content_food_it_caro_st_two_price_tag'])) : ?>
                                            <div class="price">
                                                <h5><?php echo wp_kses($item2['restho_section_content_food_it_caro_st_two_price_tag'], wp_kses_allowed_html('post')) ?></h5>
                                            </div>
                                        <?php endif ?>
            
                                    </div>
                                    <div class="reguler-items-content">
                                    <?php if (!empty($item2['restho_section_content_food_it_caro_st_two_title'])) : ?>
                                        <h3><?php echo wp_kses($item2['restho_section_content_food_it_caro_st_two_title'], wp_kses_allowed_html('post')) ?></h3>
                                    <?php endif ?>
                                    <?php if (!empty($item2['restho_section_content_food_it_caro_st_two_description'])) : ?>
                                        <p><?php echo wp_kses($item2['restho_section_content_food_it_caro_st_two_description'], wp_kses_allowed_html('post')) ?></p>
                                    <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                    <?php if ($settings['restho_food_itm_prev_next_pagi_sty_two_switcher'] == 'yes') : ?>
                        <div class="slider-btn">
                            <div class="prev-btn-3">
                                <i class="bi bi-arrow-left-short"></i>
                            </div>
                            <div class="next-btn-3">
                                <i class="bi bi-arrow-right-short"></i>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>
        <?php if( !empty( $settings['restho_food_it_caro_style_selection'] ) && ($settings['restho_food_it_caro_style_selection'] == 'style_three') )  : ?>
            <div class="populer-food-area mb-120">
                <div class="container">
                    <div class="row justify-content-center position-relative">
                        <div class="swiper h3-popular-food-slider">
                            <div class="swiper-wrapper">
                                <?php foreach($fooditems3 as $item3):?>
                                    <div class="swiper-slide">
                                        <div class="h3-popular-food-card">
                                            <div class="food-img">
                                            <?php if (!empty($item3['restho_section_content_food_it_caro_st_three_image']['url'])) : ?>
                                                <img class="img-fluid" src="<?php echo esc_url($item3['restho_section_content_food_it_caro_st_three_image']['url']) ?>" alt="<?php echo esc_attr__('food-img', 'restho') ?>">
                                            <?php endif ?>
                                            <?php if (!empty($item3['restho_section_content_food_it_caro_st_three_price_tag'])) : ?>
                                                <div class="food-price">
                                                    <span><?php echo wp_kses($item3['restho_section_content_food_it_caro_st_three_price_tag'], wp_kses_allowed_html('post')) ?></span>
                                                </div>
                                            <?php endif ?>
                                            </div>
                                            <div class="food-content">
                                            <?php if (!empty($item3['restho_section_content_food_it_caro_st_three_title'])) : ?>
                                                <h3><?php echo wp_kses($item3['restho_section_content_food_it_caro_st_three_title'], wp_kses_allowed_html('post')) ?></h3>
                                            <?php endif ?>
                                            <?php if (!empty($item3['restho_section_content_food_it_caro_st_three_description'])) : ?>
                                                <p><?php echo wp_kses($item3['restho_section_content_food_it_caro_st_three_description'], wp_kses_allowed_html('post')) ?></p>
                                            <?php endif ?>
                                            </div>
                                        </div>
                                    </div> 
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php if ($settings['restho_food_itm_prev_next_pagi_sty_three_switcher'] == 'yes') : ?>
                            <div class="slider-btn">
                                <div class="prev-btn-3">
                                    <i class="bi bi-arrow-left-short"></i>
                                </div>
                                <div class="next-btn-3">
                                    <i class="bi bi-arrow-right-short"></i>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php if( !empty( $settings['restho_food_it_caro_style_selection'] ) && ($settings['restho_food_it_caro_style_selection'] == 'style_four') )  : ?>
            <div class="h3-spacial-offer-area mb-120 ">
                <div id="slick1">
                    <?php foreach($fooditems4 as $key=> $item4): ?>
                        <div class="slide-item">
                            <div class="single-offer-card">
                                <div class="offer-img">
                                    <?php if (!empty($item4['restho_section_content_food_it_caro_st_four_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($item4['restho_section_content_food_it_caro_st_four_image']['url']) ?>" alt="<?php echo esc_attr__('food-img', 'restho') ?>">
                                    <?php endif ?>
                                    <?php if (!empty($item4['restho_section_content_food_it_caro_st_four_sml_image']['url'])) : ?>
                                        <div class="sm-img">
                                            <img src="<?php echo esc_url($item4['restho_section_content_food_it_caro_st_four_sml_image']['url']) ?>" alt="<?php echo esc_attr__('food-img', 'restho') ?>">
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="offer-content">
                                    <div class="price-sl">
                                        <div class="price-tag">
                                            <span>
                                                <?php if (!empty($item4['restho_section_content_food_it_caro_st_four_new_price_tag'])) : ?>
                                                    <?php echo wp_kses($item4['restho_section_content_food_it_caro_st_four_new_price_tag'], wp_kses_allowed_html('post')) ?> 
                                                <?php endif ?>
                                                <?php if (!empty($item4['restho_section_content_food_it_caro_st_four_old_price_tag'])) : ?>
                                                    <del><?php echo wp_kses($item4['restho_section_content_food_it_caro_st_four_old_price_tag'], wp_kses_allowed_html('post')) ?></del>
                                                <?php endif ?>
                                            </span>
                                        </div>
                                        <div class="sl-no">
                                            <span><?php echo "0".$key+1 ;?></span>
                                        </div>
                                    </div>
                                    <?php if (!empty($item4['restho_section_content_food_it_caro_st_four_title'])) : ?>
                                        <h3><?php echo wp_kses($item4['restho_section_content_food_it_caro_st_four_title'], wp_kses_allowed_html('post')) ?></h3>
                                    <?php endif ?>
                                    <?php if (!empty($item4['restho_section_content_food_it_caro_st_four_description'])) : ?>
                                        <p><?php echo wp_kses($item4['restho_section_content_food_it_caro_st_four_description'], wp_kses_allowed_html('post')) ?></p>
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

Plugin::instance()->widgets_manager->register(new Restho_Food_Item_Carousel_Widget());