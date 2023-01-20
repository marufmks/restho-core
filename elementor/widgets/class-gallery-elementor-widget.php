<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_gallery_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_gallery';
    }

    public function get_title()
    {
        return esc_html__('EG Gallery', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-gallery-masonry';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_gallery_content_section',
            [
                'label' => esc_html__('General', 'restho-core'),
            ]
        );
        $this->add_control(
            'restho_gallery_content_style_selection',
            [
                'label'   => esc_html__('Gallery Design', 'restho-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'restho-core'),
                    'style_two' => esc_html__('Style Two', 'restho-core'),
                    'style_three' => esc_html__('Style Three', 'restho-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_gallery_content_section_design_one',
            [
                'label' => esc_html__('Contents', 'restho-core'),
                'condition' => [
                    'restho_gallery_content_style_selection' => ['style_one',],
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_gallery_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Cooking', 'restho-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'restho_gallery_content_main_title',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Spicy Beef', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'restho_gallery_content_image',
            [
                'label' => esc_html__('Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'restho_galllery_content_list',
            [
                'label' => esc_html__('Gallery Items', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_gallery_content_sub_title' => esc_html__('Cooking', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_gallery_content_sub_title' => esc_html__('Cooking', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_gallery_content_sub_title }}}',
            ]
        );

        $this->end_controls_section();
        // End section

        $this->start_controls_section(
            'restho_gallery_content_section_design_two',
            [
                'label' => esc_html__('Contents', 'restho-core'),
                'condition' => [
                    'restho_gallery_content_style_selection' => ['style_two',],
                ],
            ]
        );

        $this->add_control(
            'restho_gallery_content_gallery_images',
            [
                'label' => esc_html__('Add Gallery Images', 'restho-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_gallery_content_section_design_three',
            [
                'label' => esc_html__('Contents', 'restho-core'),
                'condition' => [
                    'restho_gallery_content_style_selection' => ['style_three',],
                ],
            ]
        );

        $this->add_control(
            'restho_gallery_column_selection',
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

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'restho_gallery_content_gallery_images_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Food', 'restho-core'),
                'label_block' => true,

            ]
        );



        $repeater2->add_control(
            'restho_gallery_content_gallery_images_two',
            [
                'label' => esc_html__('Add Gallery Images', 'restho-core'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ]
        );

        $this->add_control(
            'restho_galllery_content_list_two',
            [
                'label' => esc_html__('Gallery Items', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'restho_gallery_content_gallery_images_title' => esc_html__('Food', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_gallery_content_gallery_images_title' => esc_html__('Private Event', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_gallery_content_gallery_images_title }}}',
            ]
        );

        $this->end_controls_section();

        //Subtitle Style
        $this->start_controls_section(
            'restho_gallery_style_sub_title_section',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_gallery_content_style_selection' => ['style_one',],
                ],

            ]
        );
        $this->add_control(
            'restho_gallery_style_sub_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-slider1 .gallery-wrap .overlay .items-content > span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .gallery-slider1 .gallery-wrap .overlay .items-content > span svg rect' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_gallery_style_sub_title_typography',
                'selector' => '{{WRAPPER}} .gallery-slider1 .gallery-wrap .overlay .items-content > span',
            ]
        );
        $this->add_responsive_control(
            'restho_gallery_style_sub_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-slider1 .gallery-wrap .overlay .items-content > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        //Main Title Style
        $this->start_controls_section(
            'restho_gallery_style_main_title_section',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_gallery_content_style_selection' => ['style_one',],
                ],
            ]
        );

        $this->add_control(
            'restho_gallery_style_main_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-slider1 .gallery-wrap .overlay .items-content h3' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_gallery_style_main_title_typography',
                'selector' => '{{WRAPPER}} .gallery-slider1 .gallery-wrap .overlay .items-content h3',

            ]
        );
        $this->add_responsive_control(
            'restho_gallery_style_main_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-slider1 .gallery-wrap .overlay .items-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Category Tab Button Style
        $this->start_controls_section(
            'restho_gallery_style_category_button_section',
            [
                'label' => esc_html__('Category Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_gallery_content_style_selection' => ['style_three',],
                ],
                
            ]
        );

        $this->add_control(
            'restho_gallery_style_category_button_text_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .filter-button-group ul li' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_gallery_style_category_button_text_hover_color',
            [
                'label'     => esc_html__('Text Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .filter-button-group ul li:hover' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_gallery_style_category_button_background_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .filter-button-group ul li' => 'background-color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_gallery_style_category_button_background_hover_color',
            [
                'label'     => esc_html__('Background Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .filter-button-group ul li:hover' => 'background-color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_gallery_style_category_button_active_text_color',
            [
                'label'     => esc_html__('Active Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .filter-button-group ul li.active' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_gallery_style_category_button_active_bg_color',
            [
                'label'     => esc_html__('Active Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .filter-button-group ul li.active' => 'background-color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'restho_gallery_style_category_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .filter-button-group ul li' => 'border:1px solid {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_gallery_style_category_button_typography',
                'selector' => '{{WRAPPER}} .filter-button-group ul li',

            ]
        );
        $this->add_responsive_control(
            'restho_gallery_style_category_button_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .filter-button-group ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data = $settings['restho_galllery_content_list'];
        $data2 = $settings['restho_galllery_content_list_two'];
?>
        <?php if (is_admin()) : ?>
            <script>
                // Gallery Slider
                var swiper = new Swiper(".gallery-slider1", {
                    slidesPerView: 5,
                    spaceBetween: 37,
                    // centeredSlides: true,
                    loop: true,
                    speed: 1500,
                    autoplay: {
                        delay: 2000,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                            centeredSlides: true
                        },
                        480: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                            centeredSlides: true
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 25,
                            centeredSlides: true
                        },
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 25,
                            centeredSlides: true
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 25,
                            centeredSlides: true
                        },
                        1400: {
                            slidesPerView: 5
                        },
                        1600: {
                            slidesPerView: 5
                        },
                    }
                });

                // Gallery2 Slider
                var swiper = new Swiper(".h2-gallery", {
                    slidesPerView: 5,
                    spaceBetween: 37,
                    // centeredSlides: true,
                    loop: true,
                    speed: 1500,
                    autoplay: {
                        delay: 2000,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                            spaceBetween: 35,
                            centeredSlides: true
                        },
                        480: {
                            slidesPerView: 2,
                            spaceBetween: 35,
                            centeredSlides: true
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 35,
                            centeredSlides: true
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 25,
                            centeredSlides: true
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 25,
                            centeredSlides: true
                        },
                        1400: {
                            slidesPerView: 5
                        },
                        1600: {
                            slidesPerView: 5,
                            centeredSlides: true
                        },
                    }
                });
            </script>
        <?php endif ?>

        <?php if ($settings['restho_gallery_content_style_selection'] == 'style_one') : ?>
            <div class="food-gallery-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="swiper gallery-slider1">
                            <div class="swiper-wrapper">
                                <?php foreach ($data as $item) : ?>
                                    <div class="swiper-slide">
                                        <?php if (!empty($item['restho_gallery_content_image']['url'])) : ?>
                                            <a href="<?php echo esc_url($item['restho_gallery_content_image']['url']) ?>" data-fancybox="gallery" class="gallery2-img">
                                            <?php endif ?>
                                            <div class="gallery-wrap">
                                                <?php if (!empty($item['restho_gallery_content_image']['url'])) : ?>
                                                    <img class="img-fluid" src="<?php echo esc_url($item['restho_gallery_content_image']['url']) ?>" alt="<?php echo esc_attr__('gallery-image', 'restho') ?>">
                                                <?php endif ?>
                                                <div class="overlay d-flex align-items-center justify-content-center">
                                                    <div class="items-content text-center">
                                                        <?php if (!empty($item['restho_gallery_content_sub_title'])) : ?>
                                                            <span>
                                                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect y="0.709001" width="7.46261" height="7.46261" transform="matrix(0.705207 0.709001 -0.705207 0.709001 6.46789 0.206318)" stroke="white" />
                                                                    <rect y="0.709001" width="7.46261" height="7.46261" transform="matrix(0.705207 0.709001 -0.705207 0.709001 11.5312 0.206318)" stroke="white" />
                                                                </svg>
                                                                <?php echo esc_html__($item['restho_gallery_content_sub_title'], 'restho') ?>
                                                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect y="0.709001" width="7.46261" height="7.46261" transform="matrix(0.705207 0.709001 -0.705207 0.709001 6.46789 0.206318)" stroke="white" />
                                                                    <rect y="0.709001" width="7.46261" height="7.46261" transform="matrix(0.705207 0.709001 -0.705207 0.709001 11.5312 0.206318)" stroke="white" />
                                                                </svg>
                                                            </span>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['restho_gallery_content_main_title'])) : ?>
                                                            <h3><?php echo esc_html__($item['restho_gallery_content_main_title'], 'restho') ?></h3>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['restho_gallery_content_style_selection'] == 'style_two') : ?>
            <div class="h2-special-gallery">
                <div class="swiper h2-gallery">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['restho_gallery_content_gallery_images'] as $image) { ?>
                            <div class="swiper-slide">
                                <?php if (!empty($image['url'])) : ?>
                                    <a href="<?php echo esc_url($image['url']) ?>" data-fancybox="gallery" class="portfolio-img">
                                    <?php endif ?>
                                    <div class="gallery-img">
                                        <?php if (!empty($image['url'])) : ?>
                                            <img class="img-fluid" src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr__('gallery-image') ?>">
                                        <?php endif ?>
                                        <div class="overlay">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/Zoom.svg" alt="<?php echo esc_attr__('gallery-zoom-icon') ?>">
                                        </div>
                                    </div>
                                    </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['restho_gallery_content_style_selection'] == 'style_three') : ?>
            <div class="columns2-gallery-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb--70">
                            <div class="filters filter-button-group">
                                <ul class="d-flex justify-content-center flex-wrap">
                                    <li class="active" data-filter="*"><?php echo esc_html__('All', 'restho') ?></li>
                                    <?php foreach ($data2 as $item) {
                                        if (!empty($item['restho_gallery_content_gallery_images_title'])) {
                                            $str = $item['restho_gallery_content_gallery_images_title'];
                                            $new_str = str_replace(' ', '', $str);
                                    ?>
                                            <li data-filter=".<?php echo esc_attr($new_str) ?>"><?php echo esc_html__($item['restho_gallery_content_gallery_images_title'], 'restho') ?></li>

                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row grid g-4">
                        <?php foreach ($data2 as $item) {
                            $str = $item['restho_gallery_content_gallery_images_title'];
                            $new_str = str_replace(' ', '', $str); ?>
                            <?php foreach ($item['restho_gallery_content_gallery_images_two'] as $image) { ?>
                                <?php if ($settings['restho_gallery_column_selection'] == 'column_two') : ?>
                                    <div class="col-md-6 col-sm-12 grid-item <?php echo $new_str ?>">
                                    <?php elseif ($settings['restho_gallery_column_selection'] == 'column_three') : ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 grid-item <?php echo $new_str ?>">
                                        <?php endif ?>
                                        <a href="<?php echo esc_url($image['url']) ?>" data-fancybox="gallery" class="gallery2-img">
                                            <div class="gallery-img">
                                                <img class="img-fluid" src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr__('gallery_image', 'restho') ?>">
                                                <div class="overlay">
                                                    <div class="zoom-icon">
                                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/Zoom.svg" alt="<?php echo esc_attr__('zoom-icon', 'restho') ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new restho_gallery_Widget());
