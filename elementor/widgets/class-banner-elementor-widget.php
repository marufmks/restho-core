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
                    'Style_1' => esc_html__('Style One', 'restho-core'),
                    'Style_2' => esc_html__('Style Two', 'restho-core'),
                    'Style_3' => esc_html__('Style Three', 'restho-core'),
                ],
                'default' => 'Style_1',
            ]
        );
        $this->add_control(
            'restho_banner_left_icon',
            [
                'label' => esc_html__('Left Icon', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'restho_banner_right_icon',
            [
                'label' => esc_html__('Right Icon', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'restho_banner_content_banner_text',
            [
                'label' => esc_html__('banner Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Know More', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_banner_content_banner_url',
            [
                'label' => __('banner URL', 'restho-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'restho-core'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],

            ]
        );
        $this->add_responsive_control(
            'restho_banner_content_align',
            [
                'label'         => esc_html__('Alignment', 'restho-core'),
                'type'             => \Elementor\Controls_Manager::CHOOSE,
                'options'         => [
                    'left'         => [
                        'title' => esc_html__('Left', 'restho-core'),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'restho-core'),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title' => esc_html__('Right', 'restho-core'),
                        'icon'     => 'eicon-text-align-right',
                    ],
                    'justify'     => [
                        'title' => esc_html__('Justified', 'restho-core'),
                        'icon'     => 'eicon-text-align-justify',
                    ],
                ],
                'default'         => 'center',
                'selectors'     => [
                    '{{WRAPPER}} .alignment '                             => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //banner Style
        $this->start_controls_section(
            'restho_banner_style_section',
            [
                'label' => esc_html__('banner', 'restho-core'),
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
            'restho_banner_style_text_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_typography',
                'selector' => '{{WRAPPER}} .btn--primary2.sibling2',

            ]
        );
        $this->add_control(
            'restho_banner_style_text_background',
            [
                'label'     => esc_html__('Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_banner_style_border_radius',
            [
                'restho_banner_style_border_radius',
                'label'              => __('Border Radius', 'restho-core'),
                'type'               => Controls_Manager::DIMENSIONS,
                'size_units'         => ['px', '%'],
                'selectors'          => [
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .btn--primary2::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],


            ]

        );
        $this->add_control(
            'restho_banner_style_margin',
            [
                'label' => esc_html__('Margin', 'restho-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'restho_banner_style_padding',
            [
                'label' => esc_html__('Padding', 'restho-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'restho_banner_style_hover_color',
            [
                'label' => esc_html__('Color', 'restho-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2.sibling2:hover' => 'color: {{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            'restho_banner_style_hover_background',
            [
                'label' => esc_html__('Background', 'restho-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary2::after' => 'background: {{VALUE}}',
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
?>
        <div class="banner-section1">
            <div class="banner-vector">
                <img class="vector-top" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/shape2.svg" alt="<?php echo esc_attr__('vector-img','restho') ?>">
                <img class="vector-btm" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/shape1.svg" alt="<?php echo esc_attr__('vector-img','restho') ?>">
            </div>
            <div class="swiper banner1-slider">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="banner-wrapper d-flex align-items-center justify-content-between">

                            <div class="social-area">
                                <ul class="m-0 p-0 d-flex align-items-center">
                                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                                    <li><a href="https://twitter.com/">Twitter</a></li>
                                    <li><a href="https://www.instagram.com/">Instagram</a></li>
                                    <li><a href="https://www.skype.com/">Skype</a></li>
                                </ul>
                            </div>
                            <div class="banner-left-img">
                                <img src="assets/images/icon/union-left.svg" alt="union-left">
                                <div class="food-img">
                                    <img class="img-fluid" src="assets/images/bg/banner-img-1.png" alt="banner-img-1">
                                </div>
                            </div>
                            <div class="banner-content">
                                <span><img class="left-vec" src="assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">Welcome To Restho<img class="right-vec" src="assets/images/icon/sub-title-vec.svg" alt="sub-title-vec"></span>
                                <h1>Find Your Best
                                    Healthy & Tasty Food.</h1>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                                <a class="primary-btn2" href="about.html"><i class="bi bi-arrow-up-right-circle"></i>Discover More</a>
                            </div>
                            <div class="banner-right-img">
                                <img src="assets/images/icon/union-right.svg" alt="union-right">
                                <div class="food-img">
                                    <img class="img-fluid" src="assets/images/bg/banner-img-2.png" alt="banner-img-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="swiper-btn d-flex justify-content-between align-items-center">
                    <div class="prev-btn-1"><i class="bi bi-chevron-left"></i></div>
                    <div class="next-btn-1"><i class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </div>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Restho_Banner_Widget());
