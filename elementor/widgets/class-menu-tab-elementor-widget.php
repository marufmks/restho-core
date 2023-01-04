<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_menu_tab_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_menu_tab';
    }

    public function get_title()
    {
        return esc_html__('EG Menu Tab', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-price-table';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_menu_tab_content_category_section',
            [
                'label' => esc_html__('Category Contents', 'restho-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_menu_tab_content_menu_tab_title',
            [
                'label' => esc_html__('Category Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Dinner', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_menu_tab_content_menu_tab_offer_name',
            [
                'label' => esc_html__('Offer Name', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Friday Offer', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_menu_tab_content_menu_tab_offer_discount',
            [
                'label' => esc_html__('Offer Discount', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('20% Discount', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'restho_menu_tab_content_menu_tab_offer_menu_image',
            [
                'label' => esc_html__('Offer Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'restho_menu_tab_content_category_list_three',
            [
                'label' => esc_html__('Category Items', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_menu_tab_content_menu_tab_title' => esc_html__('Breakfast', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_tab_content_menu_tab_title' => esc_html__('Lunch', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_tab_content_menu_tab_title' => esc_html__('Dinner', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_tab_content_menu_tab_title' => esc_html__('Starter', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_tab_content_menu_tab_title' => esc_html__('Berverage', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_menu_tab_content_menu_tab_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_menu_tab_content_items_section',
            [
                'label' => esc_html__('Menu Food Items', 'restho-core')
            ]
        );

        
        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'restho_menu_tab_content_menu_tab_title_two',
            [
                'label' => esc_html__('Category Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Dinner', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'restho_menu_tab_content_menu_food_title',
            [
                'label' => esc_html__('Food Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('French Fries', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'restho_menu_content_food_description',
            [
                'label' => esc_html__('Food Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Special Breakfast to make for our customer.', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'restho_menu_content_food_price',
            [
                'label' => esc_html__('Food Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$10', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_menu_tab_content_food_items_list',
            [
                'label' => esc_html__('Food Items', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'restho_menu_tab_content_menu_tab_title_two' => esc_html__('Breakfast', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_tab_content_menu_tab_title_two' => esc_html__('Lunch', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_tab_content_menu_tab_title_two' => esc_html__('Dinner', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_tab_content_menu_tab_title_two' => esc_html__('Starter', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_menu_tab_content_menu_tab_title_two' => esc_html__('Berverage', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_menu_tab_content_menu_tab_title_two }}}',
            ]
        );

        $this->end_controls_section();

        //Category Tab Button Style
        $this->start_controls_section(
            'restho_menu_tab_style_category_button_section',
            [
                'label' => esc_html__('Category Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'restho_menu_tab_style_category_button_text_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-tab .nav .nav-item .nav-link' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_menu_tab_style_category_button_text_hover_color',
            [
                'label'     => esc_html__('Text Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-tab .nav .nav-item .nav-link:hover' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_menu_tab_style_category_button_background_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-tab .nav .nav-item .nav-link' => 'background-color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_menu_tab_style_category_button_background_hover_color',
            [
                'label'     => esc_html__('Background Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-tab .nav .nav-item .nav-link:hover' => 'background-color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_menu_tab_style_category_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-tab .nav .nav-item .nav-link' => 'border:1px solid {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_tab_style_category_button_typography',
                'selector' => '{{WRAPPER}} .menu2-area .menu2-tab .nav .nav-item .nav-link',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_tab_style_category_button_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu2-area .menu2-tab .nav .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
        //Menu Name Style
        $this->start_controls_section(
            'restho_menu_tab_style_menu_name_section',
            [
                'label' => esc_html__('Menu Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'restho_menu_tab_style_menu_name_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-wrap .menu-title h2' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_tab_style_menu_name_typography',
                'selector' => '{{WRAPPER}} .menu2-area .menu2-wrap .menu-title h2',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_tab_style_menu_name_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu2-area .menu2-wrap .menu-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

         //Food Title Style
         $this->start_controls_section(
            'restho_menu_style_food_title_section',
            [
                'label' => esc_html__('Food Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'restho_menu_style_food_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-wrap ul li .single-menu .menu-name h4' => 'color: {{VALUE}};',
                    
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_title_typography',
                'selector' => '{{WRAPPER}} .menu2-area .menu2-wrap ul li .single-menu .menu-name h4',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu2-area .menu2-wrap ul li .single-menu .menu-name h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

         //Food Description Style
         $this->start_controls_section(
            'restho_menu_style_food_description_section',
            [
                'label' => esc_html__('Food Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'restho_menu_style_food_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-wrap ul li .single-menu .menu-name p' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_description_typography',
                'selector' => '{{WRAPPER}} .menu2-area .menu2-wrap ul li .single-menu .menu-name p',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu2-area .menu2-wrap ul li .single-menu .menu-name p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Food Price Style
        $this->start_controls_section(
            'restho_menu_style_food_price_section',
            [
                'label' => esc_html__('Food Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'restho_menu_style_food_price_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-wrap ul li .single-menu .price span' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_price_typography',
                'selector' => '{{WRAPPER}} .menu2-area .menu2-wrap ul li .single-menu .price span',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_price_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu2-area .menu2-wrap ul li .single-menu .price span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //offer Name Style
        $this->start_controls_section(
            'restho_menu_style_offer_name_section',
            [
                'label' => esc_html__('Offer Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'restho_menu_style_offer_name_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-left-img .overlay > span' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_offer_name_typography',
                'selector' => '{{WRAPPER}} .menu2-area .menu2-left-img .overlay > span',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_offer_name_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu2-area .menu2-left-img .overlay > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
        //offer Discount Style
        $this->start_controls_section(
            'restho_menu_style_offer_discount_section',
            [
                'label' => esc_html__('Offer Discount', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'restho_menu_style_offer_discount_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-left-img .overlay h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .menu2-area .menu2-left-img .overlay h2 span' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_offer_discount_typography',
                'selector' => '{{WRAPPER}} .menu2-area .menu2-left-img .overlay h2,.menu2-area .menu2-left-img .overlay h2 span',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_offer_discount_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu2-area .menu2-left-img .overlay h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .menu2-area .menu2-left-img .overlay h2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Mneu Name Style
        $this->start_controls_section(
            'restho_menu_style_offer_menu_name_section',
            [
                'label' => esc_html__('Offer Menu Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'restho_menu_style_offer_menu_name_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu2-area .menu2-left-img .overlay h3' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_offer_menu_name_typography',
                'selector' => '{{WRAPPER}} .menu2-area .menu2-left-img .overlay h3',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_offer_menu_name_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .menu2-area .menu2-left-img .overlay h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data = $settings['restho_menu_tab_content_category_list_three'];
        $data2 = $settings['restho_menu_tab_content_food_items_list'];
?>


        <div class="menu2-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu2-tab mb-70">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php foreach ($data as $key => $item) {
                                    if (!empty($item['restho_menu_tab_content_menu_tab_title'])) {
                                        $str = $item['restho_menu_tab_content_menu_tab_title'];
                                        $new_str = str_replace(' ', '', $str);
                                ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo ($key == 0) ? 'active' : '' ?>" id="<?php echo esc_attr($new_str) ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr($new_str) ?>" type="button" role="tab" aria-controls="<?php echo esc_attr($new_str) ?>" aria-selected="true"><?php echo esc_html__($item['restho_menu_tab_content_menu_tab_title'], 'restho') ?></button>
                                        </li>
                                <?php }
                                } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="tab-content" id="myTabContent">
                            <?php foreach ($data as $key => $item) {
                                if (!empty($item['restho_menu_tab_content_menu_tab_title'])) {
                                    $str = $item['restho_menu_tab_content_menu_tab_title'];
                                    $new_str = str_replace(' ', '', $str);
                            ?>
                                    <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : '' ?>" id="<?php echo esc_attr($new_str) ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($new_str) ?>-tab">
                                        <div class="row">
                                            <div class="col-lg-6 p-0">
                                                <div class="menu2-left-img">
                                                    <?php if (!empty($item['restho_menu_tab_content_menu_tab_offer_menu_image']['url'])) : ?>
                                                        <img src="<?php echo esc_url($item['restho_menu_tab_content_menu_tab_offer_menu_image']['url']) ?>" alt="<?php echo esc_attr__('offer-menu-image', 'restho') ?>">
                                                    <?php endif ?>
                                                    <div class="overlay">
                                                        <div class="vec-left">
                                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/menu1-left-vec.svg" alt="<?php echo esc_attr__('left-vec-icon', 'restho') ?>">
                                                        </div>
                                                        <div class="vec-right">
                                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/menu1-right-vec.svg" alt="<?php echo esc_attr__('right-vec-icon', 'restho') ?>">
                                                        </div>
                                                        <?php if (!empty($item['restho_menu_tab_content_menu_tab_offer_name'])) : ?>
                                                            <span><?php echo esc_html__($item['restho_menu_tab_content_menu_tab_offer_name'], 'restho') ?></span>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['restho_menu_tab_content_menu_tab_offer_discount'])) : ?>
                                                            <h2><?php echo wp_kses($item['restho_menu_tab_content_menu_tab_offer_discount'], wp_kses_allowed_html('post')) ?></h2>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['restho_menu_tab_content_menu_tab_title'])) : ?>
                                                            <h3><?php echo esc_html__('Our '.$item['restho_menu_tab_content_menu_tab_title'].' Menu', 'reshto') ?></h3>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 p-0">
                                                <div class="menu2-wrap">
                                                    <div class="menu-title">
                                                        <?php if (!empty($item['restho_menu_tab_content_menu_tab_title'])) : ?>
                                                            <h2><?php echo esc_html__($item['restho_menu_tab_content_menu_tab_title'], 'restho') ?></h2>
                                                        <?php endif ?>
                                                    </div>
                                                    <ul>
                                                        <?php foreach ($data2 as $item2) { 
                                                            $str2 = $item2['restho_menu_tab_content_menu_tab_title_two'];
                                                            $new_str2 = str_replace(' ', '', $str2);
                                                             if (strtolower($new_str) === strtolower($new_str2) ) { ?>
                                                                <li>
                                                                    <div class="single-menu">
                                                                        <div class="menu-name">
                                                                            <?php if (!empty($item2['restho_menu_tab_content_menu_food_title'])) : ?>
                                                                                <h4><?php echo esc_html__($item2['restho_menu_tab_content_menu_food_title'], 'restho') ?></h4>
                                                                            <?php endif ?>
                                                                            <?php if (!empty($item2['restho_menu_content_food_description'])) : ?>
                                                                                <p><?php echo wp_kses($item2['restho_menu_content_food_description'], wp_kses_allowed_html('post')) ?></p>
                                                                            <?php endif ?>
                                                                        </div>
                                                                        <div class="price">
                                                                            <?php if (!empty($item2['restho_menu_content_food_price'])) : ?>
                                                                                <span><?php echo esc_html__($item2['restho_menu_content_food_price'], 'restho') ?></span>
                                                                            <?php endif ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php } ?>
                                                            <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new restho_menu_tab_Widget());
