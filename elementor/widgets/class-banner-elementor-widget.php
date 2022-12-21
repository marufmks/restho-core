<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Banner', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_banner_content_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        $this->add_control(
            'restho_banner_content_style_selection',
            [
                'label'   => esc_html__('Banner Style', 'restho-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'restho-core'),
                    'style_two' => esc_html__('Style Two', 'restho-core'),
                    'style_three' => esc_html__('Style Three', 'restho-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'restho_banner_vector_icon_display',
            [
                'label' => esc_html__('Vector Icon(Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_one',],
                ],
            ]
        );




        $this->end_controls_section();

        //social icon
        $this->start_controls_section(
            'restho_banner_style_one_section',
            [
                'label' => esc_html__('Banner Items', 'restho-core'),
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_one',],
                ],

            ]
        );



        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_banner_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Welcome To Restho', 'restho-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'restho_banner_subtitle_icon_switcher',
            [
                'label' => esc_html__('Subtitle Icon (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $repeater->add_control(
            'restho_banner_content_main_title',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Find Your Best Healthy & Tasty Food.', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'restho_banner_content_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('It is a long established fact that a reader will be distracted by the readable content of a page.', 'restho-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'restho_banner_content_left_image',
            [
                'label' => esc_html__('Left Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'restho_banner_content_right_image',
            [
                'label' => esc_html__('Right Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'restho_banner_content_button_text',
            [
                'label' => esc_html__('Button Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Discover More', 'restho-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'restho_banner_content_button_url',
            [
                'label' => esc_html__('Button URL', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'restho-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //facebook Link
        $repeater->add_control(
            'restho_banner_one_social_link_facebook',
            [
                'label' => esc_html__('Facebook Link', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'restho-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //twitter Link
        $repeater->add_control(
            'restho_banner_one_social_link_twitter',
            [
                'label' => esc_html__('Twitter Link', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'restho-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //instagram Link
        $repeater->add_control(
            'restho_banner_one_social_link_instagram',
            [
                'label' => esc_html__('Instagram Link', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'restho-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //skype link
        $repeater->add_control(
            'restho_banner_one_social_link_skype',
            [
                'label' => esc_html__('Skype Link', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'restho-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //linkedin Link
        $repeater->add_control(
            'restho_banner_one_social_link_linkedin',
            [
                'label' => esc_html__('Linkedin Link', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'restho-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );


        //pinterest Link
        $repeater->add_control(
            'restho_banner_one_social_link_pinterest',
            [
                'label' => esc_html__('Pinterest Link', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'restho-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //Youtube Link
        $repeater->add_control(
            'restho_banner_one_social_link_youtube',
            [
                'label' => esc_html__('Youtube Link', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'restho-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_banner_one_content_list',
            [
                'label' => esc_html__('Slider Items List', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_banner_content_sub_title' => esc_html__('Welcome To Restho', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_banner_content_sub_title' => esc_html__('Welcome To Restho', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_banner_content_sub_title }}}',
            ]
        );


        $this->end_controls_section();

        //styling starts here
        //Subtitle Style
        $this->start_controls_section(
            'restho_banner_style_sub_title_section',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'restho_banner_style_sub_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_sub_title_typography',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content span',
            ]
        );
        $this->add_responsive_control(
            'restho_banner_style_sub_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        //Main Title Style
        $this->start_controls_section(
            'restho_banner_style_main_title_section',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'restho_banner_style_main_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content h1' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_main_title_typography',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content h1',

            ]
        );
        $this->add_responsive_control(
            'restho_banner_style_main_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Description Style
        $this->start_controls_section(
            'restho_banner_style_description_section',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_banner_style_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_description_typography',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content p',

            ]
        );
        $this->add_responsive_control(
            'restho_banner_style_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
        //banner social icon
        $this->start_controls_section(
            'restho_banner_social_icon_section',
            [
                'label' => esc_html__('Social Icon', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'restho_banner_social_icons_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .social-area ul li a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-section1 .social-area ul li::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_banner_social_icons_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section1 .social-area ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        //banner Button Style
        $this->start_controls_section(
            'restho_banner_button_style_section',
            [
                'label' => esc_html__('Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'restho-core'),
            ]
        );
        $this->add_control(
            'restho_banner_button_style_text_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn2 i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_banner_button_style_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_button_style_typography',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );
        $this->add_control(
            'restho_banner_button_style_text_background',
            [
                'label'     => esc_html__('Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_banner_button_style_border_radius',
            [
                'restho_banner_button_style_border_radius',
                'label'              => __('Border Radius', 'restho-core'),
                'type'               => Controls_Manager::DIMENSIONS,
                'size_units'         => ['px', '%'],
                'selectors'          => [
                    '{{WRAPPER}} .primary-btn2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );

        $this->add_control(
            'restho_banner_button_style_padding',
            [
                'label' => esc_html__('Padding', 'restho-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        //Hover start

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'restho-core'),
            ]
        );
        $this->add_control(
            'restho_banner_button_style_hover_color',
            [
                'label' => esc_html__('Color', 'restho-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:hover' => 'color: {{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            'restho_banner_button_style_hover_background',
            [
                'label' => esc_html__('Background', 'restho-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:before' => 'background: {{VALUE}}',
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
        $data = $settings['restho_banner_one_content_list'];

?>
        <?php if (is_admin()) : ?>
            <script>
                // Home 1 Banner
                var swiper = new Swiper(".banner1-slider", {
                    slidesPerView: 1,
                    speed: 1200,
                    // spaceBetween: 15,
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    autoplay: true,
                    loop: true,
                    navigation: {
                        nextEl: ".next-btn-1",
                        prevEl: ".prev-btn-1",
                    },
                    pagination: false,
                });
            </script>
        <?php endif; ?>
        <?php if ($settings['restho_banner_content_style_selection'] == 'style_one') : ?>
            <div class="banner-section1">
                <div class="banner-vector">
                    <?php if ($settings['restho_banner_vector_icon_display'] == 'yes') : ?>
                        <img class="vector-top" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/shape2.svg" alt="<?php echo esc_attr__('vector-img', 'restho') ?>">
                        <img class="vector-btm" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/shape1.svg" alt="<?php echo esc_attr__('vector-img', 'restho') ?>">
                    <?php endif ?>
                </div>
                <div class="swiper banner1-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($data as $items) : ?>
                            <div class="swiper-slide">
                                <div class="banner-wrapper d-flex align-items-center justify-content-between">
                                    <div class="social-area">
                                        <ul class="m-0 p-0 d-flex align-items-center">
                                            <?php if (!empty($items['restho_banner_one_social_link_facebook']['url'])) : ?>
                                                <li><a href="<?php echo esc_url($items['restho_banner_one_social_link_facebook']['url']) ?>"><?php echo esc_html('Facebook', 'restho') ?></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($items['restho_banner_one_social_link_twitter']['url'])) : ?>
                                                <li><a href="<?php echo esc_url($items['restho_banner_one_social_link_twitter']['url']) ?>"><?php echo esc_html__('Twitter', 'restho') ?></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($items['restho_banner_one_social_link_instagram']['url'])) : ?>
                                                <li><a href="<?php echo esc_url($items['restho_banner_one_social_link_instagram']['url']) ?>"><?php echo esc_html__('Instagram', 'restho') ?></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($items['restho_banner_one_social_link_skype']['url'])) : ?>
                                                <li><a href="<?php echo esc_url($items['restho_banner_one_social_link_skype']['url']) ?>"><?php echo esc_html__('Skype', 'restho') ?></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($items['restho_banner_one_social_link_linkedin']['url'])) : ?>
                                                <li><a href="<?php echo esc_url($items['restho_banner_one_social_link_linkedin']['url']) ?>"><?php echo esc_html__('Linked In', 'restho') ?></a></li>
                                            <?php endif ?>

                                            <?php if (!empty($items['restho_banner_one_social_link_pinterest']['url'])) : ?>
                                                <li><a href="<?php echo esc_url($items['restho_banner_one_social_link_pinterest']['url']) ?>"><?php echo esc_html__('Pinterest', 'restho') ?></a></li>
                                            <?php endif ?>
                                            <?php if (!empty($items['restho_banner_one_social_link_youtube']['url'])) : ?>
                                                <li><a href="<?php echo esc_url($items['restho_banner_one_social_link_youtube']['url']) ?>"><?php echo esc_html__('Youtube', 'restho') ?></a></li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                    <div class="banner-left-img">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/union-left.svg" alt="<?php echo esc_attr__('union-left', 'restho') ?>">
                                        <div class="food-img">
                                            <?php if (!empty($items['restho_banner_content_left_image']['url'])) : ?>
                                                <img class="img-fluid" src="<?php echo esc_url($items['restho_banner_content_left_image']['url']) ?>" alt="<?php echo esc_attr__('banner-img-1', 'restho') ?>">
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="banner-content">
                                        <?php if (!empty($items['restho_banner_content_sub_title'])) : ?>
                                            <span>
                                                <?php if ($items['restho_banner_subtitle_icon_switcher'] == 'yes') : ?>
                                                    <img class="left-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
                                                <?php endif; ?>
                                                <?php echo esc_html__($items['restho_banner_content_sub_title'], 'restho') ?>
                                                <?php if ($items['restho_banner_subtitle_icon_switcher'] == 'yes') : ?>
                                                    <img class="right-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
                                                <?php endif ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if (!empty($items['restho_banner_content_main_title'])) : ?>
                                            <h1><?php echo esc_html__($items['restho_banner_content_main_title'], 'restho') ?></h1>
                                        <?php endif; ?>
                                        <?php if (!empty($items['restho_banner_content_description'])) : ?>
                                            <p><?php echo wp_kses($items['restho_banner_content_description'], wp_kses_allowed_html('post')) ?></p>
                                        <?php endif ?>
                                        <?php if (!empty($items['restho_banner_content_button_text'])) : ?>
                                            <a class="primary-btn2" href="<?php echo esc_url($items['restho_banner_content_button_url']['url']) ?>"><i class="bi bi-arrow-up-right-circle"></i><?php echo esc_html__($items['restho_banner_content_button_text'], 'restho') ?></a>
                                        <?php endif ?>
                                    </div>
                                    <div class="banner-right-img">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/union-right.svg" alt="<?php echo esc_attr__('union-right', 'restho') ?>">
                                        <div class="food-img">
                                            <?php if (!empty($items['restho_banner_content_right_image']['url'])) : ?>
                                                <img class="img-fluid" src="<?php echo esc_url($items['restho_banner_content_right_image']['url']) ?>" alt="<?php echo esc_attr__('banner-img-2', 'restho') ?>">
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="swiper-btn d-flex justify-content-between align-items-center">
                        <div class="prev-btn-1"><i class="bi bi-chevron-left"></i></div>
                        <div class="next-btn-1"><i class="bi bi-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Restho_Banner_Widget());
