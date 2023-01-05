<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_menu_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_menu';
    }

    public function get_title()
    {
        return esc_html__('EG Menu', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-price-list';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_menu_content_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        $this->add_control(
            'restho_menu_content_style_selection',
            [
                'label'   => esc_html__('Menu Style', 'restho-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Mneu Items 01', 'restho-core'),
                    'style_two' => esc_html__('Menu Items 02', 'restho-core'),
                    'style_three' => esc_html__('Menu News 01', 'restho-core'),
                ],
                'default' => 'style_one',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'restho_menu_content_heading_section',
            [
                'label' => esc_html__('Heading', 'restho-core'),
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one',]
                ],

            ]
        );
        $this->add_control(
            'restho_menu_content_subtitle_icon_switcher',
            [
                'label' => esc_html__('Icon (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'restho_menu_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Welcome to Restho', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_menu_content_main_title',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Indian Menu', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
        // End section
        $this->start_controls_section(
            'restho_menu_content_food_list_section',
            [
                'label' => esc_html__('Food List', 'restho-core'),
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one',]
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_menu_content_food_title',
            [
                'label' => esc_html__('Food Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Indian Menu', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'restho_menu_content_food_description',
            [
                'label' => esc_html__('Food Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('To much delicious food in our restaurant.Visit us & taste it early.', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'restho_menu_content_food_price',
            [
                'label' => esc_html__('Food Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$10', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_menu_content_food_list',
            [
                'label' => esc_html__('Food Items', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_menu_content_food_title' => esc_html__('Veg Biriyani', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_content_food_title' => esc_html__('Fried Rice', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_menu_content_food_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_menu_content_note_section',
            [
                'label' => esc_html__('Note', 'restho-core'),
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one',]
                ],
            ]
        );

        $this->add_control(
            'restho_menu_content_note_title',
            [
                'label' => esc_html__('Note Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('N.B: All food are available in restauarnt & don’t waste your food.', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_menu_content_note_description',
            [
                'label' => esc_html__('Note Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Address: Mirpur DOHS, House No-167/170, Avenue-01.', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_menu_content_food_list_section_two',
            [
                'label' => esc_html__('Food List', 'restho-core'),
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_two',]
                ],
            ]
        );

        $this->add_control(
            'restho_menu_content_food_list_heading_two',
            [
                'label' => esc_html__('Heading Main Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Dinner', 'xoon-core'),
                'label_block' => true,

            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'restho_menu_content_food_title_two',
            [
                'label' => esc_html__('Food Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Frittata Muffins', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'restho_menu_content_food_description_two',
            [
                'label' => esc_html__('Food Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Special Breakfast to make for our customer.', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'restho_menu_content_food_price_two',
            [
                'label' => esc_html__('Food Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$10', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'restho_menu_content_food_image_two',
            [
                'label' => esc_html__('Food Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'restho_menu_content_food_list_two',
            [
                'label' => esc_html__('Food Items', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'restho_menu_content_food_title_two' => esc_html__('Veg Biriyani', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_content_food_title_two' => esc_html__('Fried Rice', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_menu_content_food_title_two }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_menu_content_menu_heading_section',
            [
                'label' => esc_html__('Menu Heading', 'restho-core'),
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_three',]
                ],
            ]
        );

        $this->add_control(
            'restho_menu_content_menu_heading_title',
            [
                'label' => esc_html__('Menu heading Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('RESTHO', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_menu_content_menu_name',
            [
                'label' => esc_html__('Menu Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Italian Menu', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //Subtitle Style
        $this->start_controls_section(
            'restho_menu_style_heading_sub_title_section',
            [
                'label' => esc_html__('Heading Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one',],
                ],

            ]
        );
        $this->add_control(
            'restho_menu_style_heading_sub_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_menu_style_heading_sub_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_heading_sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title span',
            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_heading_sub_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        //Main Title Style
        $this->start_controls_section(
            'restho_menu_style_main_title_style_one_section',
            [
                'label' => esc_html__('Heading Main Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one']
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_main_title_style_one_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_main_title_style_one_typography',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_main_title_style_one_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
        //Main Title Style
        $this->start_controls_section(
            'restho_menu_style_main_title_style_two_section',
            [
                'label' => esc_html__('Heading Main Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_two']
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_main_title_style_two_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap .menu-title h2' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_main_title_style_two_typography',
                'selector' => '{{WRAPPER}} .h3-menu-area .home3-menu-wrap .menu-title h2',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_main_title_style_two_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap .menu-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Food Title Style
        $this->start_controls_section(
            'restho_menu_style_food_title_style_one_section',
            [
                'label' => esc_html__('Food Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one']
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_food_title_style_one_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .menu-title h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .sl span' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_title_style_one_typography',
                'selector' => '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .menu-title h4',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_title_style_one_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .menu-title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .sl span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
        //Food Title Style
        $this->start_controls_section(
            'restho_menu_style_food_title_style_two_section',
            [
                'label' => esc_html__('Food Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_two']
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_food_title_style_two_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .item-name .content h3' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_title_style_two_typography',
                'selector' => '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .item-name .content h3',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_title_style_two_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .item-name .content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

         //Food Description Style
         $this->start_controls_section(
            'restho_menu_style_food_description_style_one_section',
            [
                'label' => esc_html__('Food Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one']
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_food_description_style_one_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .menu-content p' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_description_style_one_typography',
                'selector' => '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .menu-content p',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_description_style_one_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .menu-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

         //Food Description Style
         $this->start_controls_section(
            'restho_menu_style_food_description_style_two_section',
            [
                'label' => esc_html__('Food Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_two']
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_food_description_style_two_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .item-name .content p' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_description_style_two_typography',
                'selector' => '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .item-name .content p',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_description_style_two_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .item-name .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Food Price Style
        $this->start_controls_section(
            'restho_menu_style_food_price_style_one_section',
            [
                'label' => esc_html__('Food Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one']
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_food_price_style_one_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .menu-title .price' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_price_style_one_typography',
                'selector' => '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .menu-title .price',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_price_style_one_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list ul li .menu-title .price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
        //Food Price Style
        $this->start_controls_section(
            'restho_menu_style_food_price_style_two_section',
            [
                'label' => esc_html__('Food Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_two']
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_food_price_style_two_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .price span' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_menu_style_food_price_style_two_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li:hover .price span' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_menu_style_food_price_style_two_hover_background_color',
            [
                'label'     => esc_html__('Hover Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li:hover .price' => 'background: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_menu_style_food_price_style_two_broder_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .price::after' => 'border:1px dashed {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_price_style_two_typography',
                'selector' => '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .price span',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_price_style_two_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-menu-area .home3-menu-wrap ul li .price span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Note title Style
        $this->start_controls_section(
            'restho_menu_style_note_title_section',
            [
                'label' => esc_html__('Note Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one',]
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_note_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list .notice-location h4' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_note_title_typography',
                'selector' => '{{WRAPPER}} .menu-wrapper1 .menu-list .notice-location h4',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_note_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list .notice-location h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Note description Style
        $this->start_controls_section(
            'restho_menu_style_note_description_section',
            [
                'label' => esc_html__('Note Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_one',]
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_note_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list .notice-location p' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_note_description_typography',
                'selector' => '{{WRAPPER}} .menu-wrapper1 .menu-list .notice-location p',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_note_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu-wrapper1 .menu-list .notice-location p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
        //Mneu Name Style
        $this->start_controls_section(
            'restho_menu_style_menu_name_section',
            [
                'label' => esc_html__('Menu Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_menu_content_style_selection' => ['style_three',]
                ],
            ]
        );

        $this->add_control(
            'restho_menu_style_menu_name_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-orgin h2' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_menu_name_typography',
                'selector' => '{{WRAPPER}} .food-orgin h2',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_menu_name_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .food-orgin h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data = $settings['restho_menu_content_food_list'];
        $data2 = $settings['restho_menu_content_food_list_two'];
?>
        <?php if ($settings['restho_menu_content_style_selection'] == 'style_one') : ?>
            <div class="menu-list-area1">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="menu-wrapper1">
                            <img class="menu-top-left" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/menu-top-left.svg" alt="menu-top-left">
                            <img class="menu-top-right" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/menu-top-right.svg" alt="menu-top-right">
                            <img class="menu-btm-right" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/menu-btm-right.svg" alt="menu-btm-right">
                            <img class="menu-btm-left" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/menu-btm-left.svg" alt="menu-btm-left">
                            <div class="section-title text-center pt-40">
                                <?php if (!empty($settings['restho_menu_content_sub_title'])) : ?>
                                    <span>
                                        <?php if ($settings['restho_menu_content_subtitle_icon_switcher'] == 'yes') : ?>
                                            <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                                <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                            </svg>
                                        <?php endif ?>
                                        <?php echo esc_html__($settings['restho_menu_content_sub_title'], 'restho') ?>
                                        <?php if ($settings['restho_menu_content_subtitle_icon_switcher'] == 'yes') : ?>
                                            <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                                <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                            </svg>
                                        <?php endif ?>
                                    </span>
                                <?php endif ?>
                                <?php if (!empty($settings['restho_menu_content_main_title'])) : ?>
                                    <h2><?php echo esc_html__($settings['restho_menu_content_main_title'], 'restho') ?></h2>
                                <?php endif ?>
                            </div>
                            <div class="menu-list">
                                <ul>
                                    <?php foreach ($data as $key => $item) { ?>
                                        <li>
                                            <div class="sl">
                                                <span><?php echo '0' . $key . '.' ?></span>
                                            </div>
                                            <div class="menu-content">
                                                <div class="menu-title">
                                                    <?php if (!empty($item['restho_menu_content_food_title'])) : ?>
                                                        <h4><?php echo esc_html__($item['restho_menu_content_food_title'], 'restho') ?></h4>
                                                    <?php endif ?>
                                                    <?php if (!empty($item['restho_menu_content_food_price'])) : ?>
                                                        <span class="dot"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/dot.svg" alt="<?php echo esc_attr__('dot-icon', 'restho') ?>"></span>
                                                        <span class="price"><?php echo esc_html__($item['restho_menu_content_food_price'], 'restho') ?></span>
                                                    <?php endif ?>
                                                </div>
                                                <?php if (!empty($item['restho_menu_content_food_description'])) : ?>
                                                    <p><?php echo wp_kses($item['restho_menu_content_food_description'], wp_kses_allowed_html('post')) ?></p>
                                                <?php endif ?>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="notice-location">
                                    <?php if (!empty($settings['restho_menu_content_note_title'])) : ?>
                                        <h4><?php echo wp_kses($settings['restho_menu_content_note_title'], wp_kses_allowed_html('post')) ?></h4>
                                    <?php endif ?>
                                    <?php if (!empty($settings['restho_menu_content_note_description'])) : ?>
                                        <p><?php echo wp_kses($settings['restho_menu_content_note_description'], wp_kses_allowed_html('post')) ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endif ?>

        <?php if ($settings['restho_menu_content_style_selection'] == 'style_two') : ?>
            <div class="h3-menu-area">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="home3-menu-wrap">
                            <div class="left-vector"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h3-menu-vec-left.svg" alt="<?php echo esc_attr__('h3-menu-vec-left', 'restho') ?>"></div>
                            <div class="right-vector"><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h3-menu-vec-right.svg" alt="<?php echo esc_attr__('h3-menu-vec-right', 'restho') ?>"></div>
                            <div class="menu-title text-center">
                                <?php if (!empty($settings['restho_menu_content_food_list_heading_two'])) : ?>
                                    <h2><?php echo esc_html__($settings['restho_menu_content_food_list_heading_two'], 'restho') ?></h2>
                                <?php endif ?>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h3-menu-tt-bg.svg" alt="<?php echo esc_attr__('h3-menu-tt-bg', 'restho') ?>">
                            </div>
                            <ul>
                                <?php foreach ($data2 as $item) : ?>
                                    <li>
                                        <div class="item-name">
                                            <div class="item-img">
                                                <?php if (!empty($item['restho_menu_content_food_image_two']['url'])) : ?>
                                                    <img src="<?php echo esc_url($item['restho_menu_content_food_image_two']['url']) ?>" alt="<?php echo esc_attr__('menu-food', 'restho') ?>">
                                                <?php endif ?>
                                            </div>
                                            <div class="content">
                                                <?php if (!empty($item['restho_menu_content_food_title_two'])) : ?>
                                                    <h3><?php echo esc_html__($item['restho_menu_content_food_title_two'], 'restho') ?></h3>
                                                <?php endif ?>
                                                <?php if (!empty($item['restho_menu_content_food_description_two'])) : ?>
                                                    <p><?php echo wp_kses($item['restho_menu_content_food_description_two'], wp_kses_allowed_html('post')) ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="divider">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h3-menu-divider.svg" alt="<?php echo esc_attr__('divider-icon', 'restho') ?>">
                                        </div>
                                        <div class="price">
                                            <?php if (!empty($item['restho_menu_content_food_price_two'])) : ?>
                                                <span><?php echo esc_html__($item['restho_menu_content_food_price_two'], 'restho') ?></span>
                                            <?php endif ?>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['restho_menu_content_style_selection'] == 'style_three') : ?>
            <div class="itlian-menu">
                <div class="row">
                    <div class="col-lg-12 px-0">
                        <div class="food-orgin two">
                            <div class="resturent-name">
                                <?php if (!empty($settings['restho_menu_content_menu_heading_title'])) : ?>
                                    <h2><?php echo esc_html__($settings['restho_menu_content_menu_heading_title'], 'restho') ?></h2>
                                <?php endif ?>
                            </div>
                            <svg width="152" height="108" viewBox="0 0 152 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.8">
                                    <rect y="0.711342" width="74.9128" height="74.9128" transform="matrix(0.702846 0.711342 -0.702846 0.711342 53.8554 0.205334)" stroke="white" stroke-opacity="0.5" />
                                    <rect y="0.711342" width="74.9128" height="74.9128" transform="matrix(0.702846 0.711342 -0.702846 0.711342 99.1445 0.205334)" stroke="white" stroke-opacity="0.5" />
                                </g>
                            </svg>
                            <?php if (!empty($settings['restho_menu_content_menu_name'])) : ?>
                                <h2><?php echo esc_html__($settings['restho_menu_content_menu_name'], 'restho') ?></h2>
                            <?php endif ?>
                            <svg width="152" height="108" viewBox="0 0 152 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.8">
                                    <rect y="0.711342" width="74.9128" height="74.9128" transform="matrix(0.702846 0.711342 -0.702846 0.711342 53.8554 0.205334)" stroke="white" stroke-opacity="0.5" />
                                    <rect y="0.711342" width="74.9128" height="74.9128" transform="matrix(0.702846 0.711342 -0.702846 0.711342 99.1445 0.205334)" stroke="white" stroke-opacity="0.5" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif  ?>


<?php
    }
}

Plugin::instance()->widgets_manager->register(new restho_menu_Widget());
