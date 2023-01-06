<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_food_category_tab_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_food_category_tab';
    }

    public function get_title()
    {
        return esc_html__('EG Food Category Tab', 'restho-core');
    }

    public function get_icon()
    {
        return ' eicon-product-categories';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_food_category_tab_content_category_section',
            [
                'label' => esc_html__('Category Contents', 'restho-core')
            ]
        );

        $this->add_control(
            'restho_food_category_tab_content_food_category_tab_heading_title',
            [
                'label' => esc_html__('Heading Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Category: ', 'xoon-core'),
                'label_block' => true,

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_food_category_tab_content_food_category_tab_title',
            [
                'label' => esc_html__('Category Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Dinner', 'restho-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'restho_food_category_tab_content_category_list_three',
            [
                'label' => esc_html__('Category Items', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_food_category_tab_content_food_category_tab_title' => esc_html__('SEA FOOD', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title' => esc_html__('VEGETARIAN', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title' => esc_html__('CHINESE', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title' => esc_html__('MEAT', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title' => esc_html__('ITALIAN FOOD', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title' => esc_html__('FAST FOOD', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_food_category_tab_content_food_category_tab_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_food_category_tab_content_items_section',
            [
                'label' => esc_html__('Menu Food Items', 'restho-core')
            ]
        );


        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'restho_food_category_tab_content_food_category_tab_title_two',
            [
                'label' => esc_html__('Category Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Dinner', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'restho_food_category_tab_content_menu_food_title',
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

        $repeater2->add_control(
            'restho_menu_content_food_image',
            [
                'label' => esc_html__('Food Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'restho_food_category_tab_content_food_items_list',
            [
                'label' => esc_html__('Food Items', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'restho_food_category_tab_content_food_category_tab_title_two' => esc_html__('SEA FOOD', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title_two' => esc_html__('VEGETARIAN', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title_two' => esc_html__('CHINESE', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title_two' => esc_html__('MEAT', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title_two' => esc_html__('ITALIAN FOOD', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_food_category_tab_content_food_category_tab_title_two' => esc_html__('FAST FOOD', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_food_category_tab_content_food_category_tab_title_two }}}',
            ]
        );

        $this->end_controls_section();

        //Food Title Style
        $this->start_controls_section(
            'restho_menu_style_category_heading_title_section',
            [
                'label' => esc_html__('Heading Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'restho_menu_style_category_heading_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-category-area .food-category-list .title' => 'color: {{VALUE}};',

                ],

            ]
        );
        $this->add_control(
            'restho_menu_style_category_heading_title_background_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-category-area .food-category-list .title' => 'background-color: {{VALUE}};border:1px solid {{VALUE}};',

                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_category_heading_title_typography',
                'selector' => '{{WRAPPER}} .food-category-area .food-category-list .title',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_category_heading_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .food-category-area .food-category-list .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Category Tab Button Style
        $this->start_controls_section(
            'restho_food_category_tab_style_category_button_section',
            [
                'label' => esc_html__('Category Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'restho_food_category_tab_style_category_button_text_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link i' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_food_category_tab_style_category_button_text_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link:hover i' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_food_category_tab_style_category_button_background_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link' => 'background-color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_food_category_tab_style_category_button_background_hover_color',
            [
                'label'     => esc_html__('Background Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link:hover' => 'background-color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_food_category_tab_style_category_button_active_text_color',
            [
                'label'     => esc_html__('Active Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link.active' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link.active i' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_food_category_tab_style_category_button_active_bg_color',
            [
                'label'     => esc_html__('Active Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link.active::after' => 'background-color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_category_tab_style_category_button_typography',
                'selector' => '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link span',

            ]
        );
        $this->add_responsive_control(
            'restho_food_category_tab_style_category_button_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .food-category-area .food-category-list .nav .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content h4' => 'color: {{VALUE}};',

                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_title_typography',
                'selector' => '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content h4',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content p' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_description_typography',
                'selector' => '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content p',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content .price h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content .price h5 span' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_menu_style_food_price_typography',
                'selector' => '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content .price h5,
                .food-category-area .food-category-wrap .category-item .category-content .price h5 span',

            ]
        );
        $this->add_responsive_control(
            'restho_menu_style_food_price_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content .price h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .food-category-area .food-category-wrap .category-item .category-content .price h5 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

       
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data = $settings['restho_food_category_tab_content_category_list_three'];
        $data2 = $settings['restho_food_category_tab_content_food_items_list'];
?>

        <div class="food-category-area">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="food-category-list">
                            <?php if (!empty($settings['restho_food_category_tab_content_food_category_tab_heading_title'])) : ?>
                                <h4 class="title"><?php echo esc_html__($settings['restho_food_category_tab_content_food_category_tab_heading_title'], 'restho') ?></h4>
                            <?php endif ?>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php foreach ($data as $key => $item) {
                                    if (!empty($item['restho_food_category_tab_content_food_category_tab_title'])) {
                                        $str = $item['restho_food_category_tab_content_food_category_tab_title'];
                                        $new_str = str_replace(' ', '', $str);
                                ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo ($key == 0) ? 'active' : '' ?>" id="<?php echo esc_attr($new_str) ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr($new_str) ?>" type="button" role="tab" aria-controls="<?php echo esc_attr($new_str) ?>" aria-selected="true"><span><?php echo esc_html__($item['restho_food_category_tab_content_food_category_tab_title'], 'restho') ?></span><span><i class="bi bi-arrow-right"></i></span></button>
                                        </li>
                                <?php }
                                } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <?php foreach ($data as $key => $item) {
                                if (!empty($item['restho_food_category_tab_content_food_category_tab_title'])) {
                                    $str = $item['restho_food_category_tab_content_food_category_tab_title'];
                                    $new_str = str_replace(' ', '', $str);
                            ?>
                                    <div class="tab-pane <?php echo ($key == 0) ? 'active' : '' ?>" id="<?php echo esc_attr($new_str) ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($new_str) ?>-tab">
                                        <div class="food-category-wrap">
                                            <div class="row g-4">
                                                <div class="divider"></div>
                                                <?php foreach ($data2 as $key2 => $item2) {
                                                    $str2 = $item2['restho_food_category_tab_content_food_category_tab_title_two'];
                                                    $new_str2 = str_replace(' ', '', $str2);
                                                    if (strtolower($new_str) === strtolower($new_str2)) { ?>
                                                        <div class="col-lg-6 col-md-6 d-flex <?php echo ($key2 == 0 | $key2 % 2 == 0) ? 'justify-content-md-start justify-content-center' : 'justify-content-xl-end justify-content-md-center justify-content-center' ?>">
                                                            <div class="category-item">
                                                                <?php if (!empty($item2['restho_menu_content_food_image']['url'])) : ?>
                                                                    <div class="icon">
                                                                        <img class="img-fluid" src="<?php echo esc_url($item2['restho_menu_content_food_image']['url']) ?>" alt="<?php echo esc_attr__('food-image', 'restho') ?>">
                                                                    </div>
                                                                <?php endif ?>
                                                                <div class="category-content">
                                                                    <?php if (!empty($item2['restho_food_category_tab_content_menu_food_title'])) : ?>
                                                                        <h4><?php echo esc_html__($item2['restho_food_category_tab_content_menu_food_title'], 'restho') ?></h4>
                                                                    <?php endif ?>
                                                                    <?php if (!empty($item2['restho_menu_content_food_description'])) : ?>
                                                                        <p><?php echo wp_kses($item2['restho_menu_content_food_description'], wp_kses_allowed_html('post')) ?></p>
                                                                    <?php endif ?>
                                                                    <div class="price">
                                                                        <?php if (!empty($item2['restho_menu_content_food_price'])) : ?>
                                                                            <h5><?php echo wp_kses($item2['restho_menu_content_food_price'], wp_kses_allowed_html('post')) ?></h5>
                                                                        <?php endif ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>
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

Plugin::instance()->widgets_manager->register(new restho_food_category_tab_Widget());
