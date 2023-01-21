<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_foods_intro_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_foods_intro';
    }

    public function get_title()
    {
        return esc_html__('EG Foods Intro', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_foods_intro_content_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_foods_intro_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Meat Masala', 'restho-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'restho_foods_intro_content_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet consectet.', 'restho-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'restho_foods_intro_content_food_image',
            [
                'label' => esc_html__('Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'restho_foods_intro_content_list',
            [
                'label' => esc_html__('Food Items', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_foods_intro_content_sub_title' => esc_html__('Meat Masala', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_foods_intro_content_sub_title' => esc_html__('Thai Soup', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_foods_intro_content_sub_title }}}',
            ]
        );


        $this->end_controls_section();
        // End section

        //Subtitle Style
        $this->start_controls_section(
            'restho_foods_intro_style_sub_title_section',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_foods_intro_style_sub_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-product-area .product-wrap .product-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_foods_intro_style_sub_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-product-area .product-wrap .product-content h4:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_foods_intro_style_sub_title_typography',
                'selector' => '{{WRAPPER}} .h2-product-area .product-wrap .product-content h4',
            ]
        );
        $this->add_responsive_control(
            'restho_foods_intro_style_sub_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-product-area .product-wrap .product-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        //Description Style
        $this->start_controls_section(
            'restho_foods_intro_style_description_section',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_foods_intro_style_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-product-area .product-wrap .product-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_foods_intro_style_description_typography',
                'selector' => '{{WRAPPER}} .h2-product-area .product-wrap .product-content p',

            ]
        );
        $this->add_responsive_control(
            'restho_foods_intro_style_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-product-area .product-wrap .product-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data = $settings['restho_foods_intro_content_list'];
?>
        <?php if (is_admin()) : ?>
            <script>
                // Gallery Slider
                var swiper = new Swiper(".h2-product-slider", {
                    slidesPerView: 4,
                    spaceBetween: 25,
                    loop: true,
                    speed: 1500,
                    autoplay: {
                        delay: 2000,
                    },

                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },
                        480: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1600: {
                            slidesPerView: 4
                        },
                    }
                });
            </script>
        <?php endif ?>

        <div class="h2-product-area">
            <div class="swiper h2-product-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($data as $item) : ?>
                        <div class="swiper-slide">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <?php if (!empty($item['restho_foods_intro_content_food_image']['url'])) : ?>
                                        <img class="img-fluid" src="<?php echo esc_url($item['restho_foods_intro_content_food_image']['url']) ?>" alt="<?php echo esc_attr__('h2-product-1', 'restho') ?>">
                                    <?php endif ?>
                                </div>
                                <div class="product-content">
                                    <?php if (!empty($item['restho_foods_intro_content_sub_title'])) : ?>
                                        <h4><?php echo esc_html__($item['restho_foods_intro_content_sub_title'], 'restho') ?></h4>
                                    <?php endif ?>
                                    <?php if (!empty($item['restho_foods_intro_content_description'])) : ?>
                                        <p><?php echo wp_kses($item['restho_foods_intro_content_description'], wp_kses_allowed_html('post')) ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new restho_foods_intro_Widget());
