<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Food_Item_Grid_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_food_item_grid';
    }

    public function get_title()
    {
        return esc_html__('EG Food Item Grid', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-product-price';
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
            'restho_food_item_grid_column_selection',
            [
                'label'   => esc_html__('Column', 'restho-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'column_two'  => esc_html__('2', 'restho-core'),
                    'column_three' => esc_html__('3', 'restho-core'),
                ],
                'default' => 'column_three',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_content_food_it_grid_price_tag',
            [
                'label' => esc_html__('Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$55', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_content_food_it_grid_image',
            [
                'label' => esc_html__('Food Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'restho_content_food_it_grid_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Beaf Machala', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_section_content_food_it_category_title',
            [
                'label' => esc_html__('Category Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Lunch', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_content_food_it_grid_description',
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
                        'restho_content_food_it_grid_title' => esc_html__('Beaf Machal', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_content_food_it_grid_title }}}',
            ]
        );
        $this->end_controls_section();

        // Style Section Start

        //Category title
        $this->start_controls_section(
            'restho_food_itm_sty_category_title',
            [
                'label' => esc_html__('Category Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_food_itm_sty_category_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-img .batch a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_category_title_background_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-img .batch a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_category_title_typography',
                'selector' => '{{WRAPPER}} .food-items2-wrap .food-img .batch a',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_category_title_padding',
            [
                'label' => esc_html__('Padding', 'restho-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-img .batch a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_price_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-img .pric-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_price_background_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-img .pric-tag span' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_price_typography',
                'selector' => '{{WRAPPER}} .food-items2-wrap .food-img .pric-tag span',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_price_padding',
            [
                'label' => esc_html__('Padding', 'restho-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-img .pric-tag span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_title_hvr_color',
            [
                'label'     => esc_html__('Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-content h3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_title_typography',
                'selector' => '{{WRAPPER}} .food-items2-wrap .food-content h3',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .food-items2-wrap .food-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_title_margin',
            [
                'label' => esc_html__('Margin', 'restho-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
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

            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_desc_typography',
                'selector' => '{{WRAPPER}} .food-items2-wrap .food-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .food-items2-wrap .food-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_desc_margin',
            [
                'label' => esc_html__('Margin', 'restho-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .food-items2-wrap .food-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_food_itm_sty_one_card_border',
                'label' => esc_html__('Border', 'restho-core'),
                'selector' => '{{WRAPPER}} .food-items2-wrap .food-content',
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_card_border_radius',
            [
                'label'              => __('Border Radius', 'restho-core'),
                'type'               => Controls_Manager::DIMENSIONS,
                'size_units'         => ['px', '%'],
                'selectors'          => [
                    '{{WRAPPER}} .food-items2-wrap .food-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $fooditems1 = $settings['restho_food_it_caro_section_list'];


?>
        <div class="3-columns-menu-area">
            <div class="row justify-content-center g-4">
                <?php foreach ($fooditems1 as $item) : ?>
                    <?php if ($settings['restho_food_item_grid_column_selection'] == 'column_two') : ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        <?php elseif ($settings['restho_food_item_grid_column_selection'] == 'column_three') : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                            <?php endif ?>
                            <div class="food-items2-wrap">
                                <div class="food-img">
                                    <img class="img-fluid" src="<?php echo esc_url($item['restho_content_food_it_grid_image']['url']) ?>" alt="<?php echo esc_attr__('h2-food-item-1', 'restho') ?>">
                                    <div class="batch">
                                        <?php if (!empty($item['restho_section_content_food_it_category_title'])) : ?>
                                            <a><?php echo esc_html__($item['restho_section_content_food_it_category_title'], 'restho') ?></a>
                                        <?php endif ?>
                                    </div>
                                    <div class="pric-tag">
                                        <?php if (!empty($item['restho_content_food_it_grid_price_tag'])) : ?>
                                            <span><?php echo esc_html__($item['restho_content_food_it_grid_price_tag'], 'restho') ?></span>
                                        <?php endif  ?>
                                    </div>
                                </div>
                                <div class="food-content">
                                    <?php if (!empty($item['restho_content_food_it_grid_title'])) : ?>
                                        <h3><?php echo wp_kses($item['restho_content_food_it_grid_title'], wp_kses_allowed_html('post')) ?></h3>
                                    <?php endif ?>
                                    <?php if (!empty($item['restho_content_food_it_grid_description'])) : ?>
                                        <p><?php echo wp_kses($item['restho_content_food_it_grid_description'], wp_kses_allowed_html('post')) ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>


    <?php

    }
}

Plugin::instance()->widgets_manager->register(new Restho_Food_Item_Grid_Widget());
