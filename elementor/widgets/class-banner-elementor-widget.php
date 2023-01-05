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
                    'restho_banner_content_style_selection' => ['style_one', 'style_two'],
                ],
            ]
        );




        $this->end_controls_section();

        

         //Banner Contents
         $this->start_controls_section(
            'restho_banner_style_one_section',
            [
                'label' => esc_html__('Banner Contents', 'restho-core'),
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

        //Banner Contents
        $this->start_controls_section(
            'restho_banner_style_social_section',
            [
                'label' => esc_html__('Social Links', 'restho-core'),
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_one','style_three'],
                ],

            ]
        );
          //facebook Link
          $this->add_control(
            'restho_banner_social_link_facebook',
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
        $this->add_control(
            'restho_banner_social_link_twitter',
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
        $this->add_control(
            'restho_banner_social_link_instagram',
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
        $this->add_control(
            'restho_banner_social_link_skype',
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
        $this->add_control(
            'restho_banner_social_link_linkedin',
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
        $this->add_control(
            'restho_banner_social_link_pinterest',
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
        $this->add_control(
            'restho_banner_social_link_youtube',
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

        $this->end_controls_section();

        //Banner Items
        $this->start_controls_section(
            'restho_banner_style_two_section',
            [
                'label' => esc_html__('Banner Contents', 'restho-core'),
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_two',],
                ],

            ]
        );



        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'restho_banner_two_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Welcome To Restho', 'restho-core'),
                'label_block' => true,

            ]
        );
        $repeater2->add_control(
            'restho_banner_two_subtitle_icon_switcher',
            [
                'label' => esc_html__('Subtitle Icon (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $repeater2->add_control(
            'restho_banner_two_content_main_title',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Find Your Best Healthy & Tasty Food.', 'restho-core'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'restho_banner_two_content_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('It is a long established fact that a reader will be distracted by the readable content of a page.', 'restho-core'),
                'label_block' => true,

            ]
        );

        $repeater2->add_control(
            'restho_banner_two_content_image_one',
            [
                'label' => esc_html__('Image One', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater2->add_control(
            'restho_banner_two_content_image_two',
            [
                'label' => esc_html__('Image Two', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater2->add_control(
            'restho_banner_two_content_image_three',
            [
                'label' => esc_html__('Image Three', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater2->add_control(
            'restho_banner_two_content_image_four',
            [
                'label' => esc_html__('Image Four', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater2->add_control(
            'restho_banner_two_content_button_text',
            [
                'label' => esc_html__('Button Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Discover More', 'restho-core'),
                'label_block' => true,

            ]
        );
        $repeater2->add_control(
            'restho_banner_two_content_button_url',
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

        $this->add_control(
            'restho_banner_two_content_list',
            [
                'label' => esc_html__('Slider Items List', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'restho_banner_two_content_sub_title' => esc_html__('Welcome To Restho', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_banner_two_content_sub_title' => esc_html__('Welcome To Restho', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_banner_two_content_sub_title }}}',
            ]
        );


        $this->end_controls_section();

        //banner 3 general section
        //Banner Items
        $this->start_controls_section(
            'restho_banner_style_three_section',
            [
                'label' => esc_html__('Banner Contents', 'restho-core'),
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_three',],
                ],

            ]
        );
        $this->add_control(
            'restho_banner_three_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Welcome To Restho', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_banner_three_subtitle_icon_switcher',
            [
                'label' => esc_html__('Subtitle Icon (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'restho_banner_three_content_main_title',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Find Your Best Healthy & Tasty Food.', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_banner_three_content_duration_title',
            [
                'label' => esc_html__('Availability Time', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Restho Restaurant is Opening Hour 9:30 AM to 9.00 PM', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_banner_three_duration_icon_switcher',
            [
                'label' => esc_html__('Availability Time Icon (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'restho_banner_three_video_controller',
            [
                'label' => esc_html__('Video', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => array('video'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $this->add_control(
            'restho_banner_three_content_button_text',
            [
                'label' => esc_html__('Button Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Discover More', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_banner_three_content_button_url',
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


        $this->end_controls_section();

        //styling starts here
        //Subtitle Style
        $this->start_controls_section(
            'restho_banner_style_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_one','style_two'],
                ],
            ]
        );

        $this->add_responsive_control(
            'restho_banner_style_slider_padding',
            [
                'label'      => __('Banner Slider Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-section1 .banner-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .banner-section2 .banner-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

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
                    '{{WRAPPER}} .banner-section2 .banner-wrapper .banner-content span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-banner .banner-content span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_banner_style_sub_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-content span svg rect' => 'stroke: {{VALUE}};',
                    '{{WRAPPER}} .banner-content span svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_sub_title_style_one_typography',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content span',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_one',],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_sub_title_style_two_typography',
                'selector' => '{{WRAPPER}} .banner-section2 .banner-wrapper .banner-content span',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_two',],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_sub_title_style_three_typography',
                'selector' => '{{WRAPPER}} .home3-banner .banner-content span',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_three',],
                ],
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
                    '{{WRAPPER}} .banner-section2 .banner-wrapper .banner-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .home3-banner .banner-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .banner-section2 .banner-wrapper .banner-content h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-banner .banner-content h1' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_main_title_one_typography',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content h1',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_one',],
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_main_title_two_typography',
                'selector' => '{{WRAPPER}} .banner-section2 .banner-wrapper .banner-content h1',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_two',],
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_main_title_three_typography',
                'selector' => '{{WRAPPER}} .home3-banner .banner-content h1',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_three',],
                ],

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
                    '{{WRAPPER}} .banner-section2 .banner-wrapper .banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .home3-banner .banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Description Style
        $this->start_controls_section(
            'restho_banner_style_description_style_one_section',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_one', ],
                ],

            ]
        );
        $this->add_control(
            'restho_banner_style_description_style_one_color',
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
                'name'     => 'restho_banner_style_description_style_one_typography',
                'selector' => '{{WRAPPER}} .banner-section1 .banner-wrapper .banner-content p',

            ]
        );
        $this->add_responsive_control(
            'restho_banner_style_description_style_one_padding',
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
        //Description Style
        $this->start_controls_section(
            'restho_banner_style_description_style_two_section',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_banner_content_style_selection' => [ 'style_two'],
                ],

            ]
        );
        $this->add_control(
            'restho_banner_style_description_style_two_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section2 .banner-wrapper .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_description_style_two_typography',
                'selector' => '{{WRAPPER}} .banner-section2 .banner-wrapper .banner-content p',

            ]
        );
        $this->add_responsive_control(
            'restho_banner_style_description_style_two_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-section2 .banner-wrapper .banner-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();
        //availability Style
        $this->start_controls_section(
            'restho_banner_style_availability_section',
            [
                'label' => esc_html__('Availability', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_three'],
                ],

            ]
        );
        $this->add_control(
            'restho_banner_style_availability_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner .open-time p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_style_availability_typography',
                'selector' => '{{WRAPPER}} .home3-banner .open-time p',

            ]
        );
        $this->add_responsive_control(
            'restho_banner_style_availability_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-banner .open-time p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_one'],
                ],

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
        //banner social icon
        $this->start_controls_section(
            'restho_banner_three_social_icon_section',
            [
                'label' => esc_html__('Social Icon', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_three'],
                ],

            ]
        );

        $this->add_control(
            'restho_banner_three_social_icons_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner .social-area ul li a i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_banner_three_social_icons_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner .social-area ul li a i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_banner_three_social_icons_hover_background_color',
            [
                'label'     => esc_html__('Hover Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner .social-area ul li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_banner_three_social_icons_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner .social-area ul li a' => 'border:1px solid {{VALUE}};',
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
                    '{{WRAPPER}} .primary-btn5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn7' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .primary-btn5' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn7' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_button_style_one_typography',
                'selector' => '{{WRAPPER}} .primary-btn2',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_one'],
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_button_style_two_typography',
                'selector' => '{{WRAPPER}} .primary-btn5',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_two'],
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_banner_button_style_three_typography',
                'selector' => '{{WRAPPER}} .primary-btn7',
                'condition' => [
                    'restho_banner_content_style_selection' => ['style_three'],
                ],

            ]
        );
        $this->add_control(
            'restho_banner_button_style_text_background',
            [
                'label'     => esc_html__('Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn5' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn7' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .primary-btn5' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .primary-btn7' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .primary-btn5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .primary-btn7' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .primary-btn7:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .primary-btn5:before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .primary-btn7:before' => 'background: {{VALUE}}',
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
        $data2 = $settings['restho_banner_two_content_list'];

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

                // Home 2 Banner
                var swiper = new Swiper(".banner2-slider", {
                    slidesPerView: 1,
                    speed: 1200,
                    // spaceBetween: 15,
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    autoplay: true,
                    loop: true,
                    pagination: {
                        el: ".swiper-pagination-g",
                    },
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
                <div class="social-area">
                    <ul class="m-0 p-0 d-flex align-items-center">
                        <?php if (!empty($settings['restho_banner_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_facebook']['url']) ?>"><?php echo esc_html('Facebook', 'restho') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_twitter']['url']) ?>"><?php echo esc_html__('Twitter', 'restho') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_instagram']['url']) ?>"><?php echo esc_html__('Instagram', 'restho') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_skype']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_skype']['url']) ?>"><?php echo esc_html__('Skype', 'restho') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_linkedin']['url']) ?>"><?php echo esc_html__('Linked In', 'restho') ?></a></li>
                        <?php endif ?>

                        <?php if (!empty($settings['restho_banner_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_pinterest']['url']) ?>"><?php echo esc_html__('Pinterest', 'restho') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_youtube']['url']) ?>"><?php echo esc_html__('Youtube', 'restho') ?></a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <div class="swiper banner1-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($data as $items) : ?>
                            <div class="swiper-slide">
                                <div class="banner-wrapper d-flex align-items-center justify-content-between">

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
                                                    <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                                        <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                                    </svg>
                                                <?php endif; ?>
                                                <?php echo esc_html__($items['restho_banner_content_sub_title'], 'restho') ?>
                                                <?php if ($items['restho_banner_subtitle_icon_switcher'] == 'yes') : ?>
                                                    <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                                        <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                                    </svg>
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

        <?php if ($settings['restho_banner_content_style_selection'] == 'style_two') : ?>
            <div class="banner-section2">
                <div class="banner-vector">
                    <?php if ($settings['restho_banner_vector_icon_display'] == 'yes') : ?>
                        <img class="pagination-bg" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h2-slider-paginatin-bg.svg" alt="<?php echo esc_attr__('pagination-bg', 'restho') ?>">
                        <img class="rect-shape1" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h2-banner-rect-shape.svg" alt="<?php echo esc_attr__('rect-shape1', 'restho') ?>">
                        <img class="rect-shape2" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h2-banner-rect-shape.svg" alt="<?php echo esc_attr__('rect-shape2', 'restho') ?>">
                        <img class="circle" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h2-banner-circle.svg" alt="<?php echo esc_attr__('circle', 'restho') ?>">
                    <?php endif; ?>
                </div>
                <div class="swiper banner2-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($data2 as $items) : ?>
                            <div class="swiper-slide">
                                <div class="banner-wrapper d-flex align-items-center justify-content-between">
                                    <div class="banner-content">
                                        <?php if (!empty($items['restho_banner_two_content_sub_title'])) : ?>
                                            <span>
                                                <?php if ($items['restho_banner_two_subtitle_icon_switcher'] == 'yes') : ?>
                                                    <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                                        <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                                    </svg>
                                                <?php endif ?>
                                                <?php echo esc_html__($items['restho_banner_two_content_sub_title'], 'restho') ?>
                                                <?php if ($items['restho_banner_two_subtitle_icon_switcher'] == 'yes') : ?>
                                                    <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                                        <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                                    </svg>
                                                <?php endif ?>
                                            </span>
                                        <?php endif ?>
                                        <?php if (!empty($items['restho_banner_two_content_main_title'])) : ?>
                                            <h1><?php echo esc_html__($items['restho_banner_two_content_main_title'], 'restho') ?></h1>
                                        <?php endif; ?>
                                        <?php if (!empty($items['restho_banner_two_content_description'])) : ?>
                                            <p><?php echo wp_kses($items['restho_banner_two_content_description'], wp_kses_allowed_html('post')) ?></p>
                                        <?php endif ?>
                                        <?php if (!empty($items['restho_banner_two_content_button_text'])) : ?>
                                            <a class="primary-btn5 btn-md2" href="<?php echo esc_url($items['restho_banner_two_content_button_url']['url']) ?>"><i class="bi bi-arrow-up-right-circle"></i><?php echo esc_html__($items['restho_banner_two_content_button_text'], 'restho') ?></a>
                                        <?php endif ?>
                                    </div>
                                    <div class="banner-right">
                                        <?php if (!empty($items['restho_banner_two_content_image_one']['url'])) : ?>
                                            <img class="img-fluid h2-banner-img1" src="<?php echo esc_url($items['restho_banner_two_content_image_one']['url']) ?>" alt="<?php echo esc_attr__('h2-banner-img1', 'restho') ?>">
                                        <?php endif ?>
                                        <?php if (!empty($items['restho_banner_two_content_image_three']['url'])) : ?>
                                            <img class="img-fluid h2-banner-img3" src="<?php echo esc_url($items['restho_banner_two_content_image_three']['url']) ?>" alt="<?php echo esc_attr__('h2-banner-img3', 'restho') ?>">
                                        <?php endif ?>
                                        <?php if (!empty($items['restho_banner_two_content_image_two']['url'])) : ?>
                                            <img class="img-fluid h2-banner-img2" src="<?php echo esc_url($items['restho_banner_two_content_image_two']['url']) ?>" alt="<?php echo esc_attr__('h2-banner-img2', 'restho') ?>">
                                        <?php endif ?>
                                        <?php if (!empty($items['restho_banner_two_content_image_four']['url'])) : ?>
                                            <img class="img-fluid h2-banner-img4" src="<?php echo esc_url($items['restho_banner_two_content_image_four']['url']) ?>" alt="<?php echo esc_attr__('h2-banner-img4', 'restho') ?>">
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination-g"></div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['restho_banner_content_style_selection'] == 'style_three') : ?>
            <div class="home3-banner">
                <div class="social-area">
                    <ul>
                        <?php if (!empty($settings['restho_banner_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_facebook']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_instagram']['url']) ?>"><i class='bx bxl-instagram-alt'></i></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_linkedin']['url']) ?>"><i class='bx bxl-linkedin'></i></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_twitter']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_skype']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_skype']['url']) ?>"><i class="bx bxl-skype"></i></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_pinterest']['url']) ?>"><i class="bx bxl-pinterest"></i></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_banner_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['restho_banner_social_link_youtube']['url']) ?>"><i class="bx bxl-youtube"></i></a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <div class="open-time">
                    <div class="left-vect">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/open-vec-left.svg" alt="<?php echo esc_attr__('left-vect', 'restho') ?>">
                    </div>
                    <div class="right-vect">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/open-vec-right.svg" alt="<?php echo esc_attr__('right-vect', 'restho') ?>">
                    </div>
                    <?php if (!empty($settings['restho_banner_three_content_sub_title'])) : ?>
                        <p>
                            <?php if ($settings['restho_banner_three_duration_icon_switcher'] == 'yes') : ?>
                                <svg width="56" height="18" viewBox="0 0 56 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4311 12.8569C14.4311 12.8569 14.3762 12.9026 14.2693 12.9906C14.1624 13.0786 14.0088 13.2134 13.7856 13.3675C13.3459 13.6804 12.6758 14.1234 11.715 14.5018C11.2341 14.6853 10.6859 14.8619 10.0673 14.9879C9.44863 15.1124 8.75987 15.173 8.01969 15.1493C7.28449 15.1258 6.47606 15.0013 5.69069 14.7569C4.85265 14.4948 4.07444 14.0771 3.31463 13.5291C2.56416 12.9778 1.87167 12.2764 1.29978 11.4392C1.01119 11.0216 0.772769 10.5604 0.561155 10.0766C0.469217 9.82913 0.365124 9.58285 0.295625 9.32226L0.23828 9.12804L0.223944 9.07933L0.216776 9.05498C0.222386 9.08816 0.201193 8.98313 0.201505 8.98526L0.183429 8.89728L0.110502 8.54354C-0.103294 7.42447 -0.00294089 6.24757 0.37759 5.13307C0.555545 4.56988 0.8351 4.03744 1.15392 3.52448C1.33344 3.28185 1.49176 3.01914 1.70088 2.79477L2.00318 2.44682L2.33697 2.12413C3.23266 1.26199 4.39358 0.637617 5.6508 0.299096L5.76829 0.265305L5.79759 0.256781L5.87612 0.240646L5.92723 0.2306L6.13137 0.190416L6.54088 0.109743C6.86095 0.0695591 7.22123 0.0245042 7.54597 0.00745636C8.18487 -0.013549 8.82968 0.00715193 9.45517 0.103959C10.7115 0.281439 11.9157 0.646749 13.0314 1.13109C14.1518 1.61026 15.2061 2.17862 16.219 2.77164C16.7236 3.07363 17.2123 3.37349 17.7069 3.68826C18.1871 3.99238 18.6683 4.29864 19.1539 4.61889C20.1238 5.24753 21.0556 5.89382 21.9843 6.53342C22.9128 7.17211 23.8228 7.8117 24.7197 8.44369C25.6185 9.06685 26.5061 9.6824 27.3794 10.2876C29.129 11.4843 30.8372 12.5997 32.5049 13.5714C32.9194 13.8192 33.3326 14.0542 33.744 14.278C34.1495 14.5066 34.5687 14.727 34.9638 14.9392C35.7592 15.3621 36.5212 15.7185 37.2757 15.9389C37.6525 16.0501 38.0265 16.1283 38.3961 16.1721C38.4887 16.181 38.5809 16.1901 38.6725 16.1989C38.7654 16.2017 38.858 16.2044 38.9499 16.2071C39.0506 16.2102 39.1506 16.2132 39.2504 16.2163C39.347 16.2184 39.4271 16.2105 39.5156 16.2084C40.2112 16.1898 40.9218 16.0635 41.5354 15.8598C42.155 15.6513 42.6957 15.359 43.1679 15.0452C43.6437 14.7304 44.0053 14.3498 44.3185 13.9924C44.9003 13.2442 45.1945 12.5221 45.3139 12.0164C45.3924 11.7662 45.4062 11.5644 45.4383 11.4316C45.4632 11.2971 45.476 11.2277 45.476 11.2277C45.476 11.2277 45.476 11.298 45.4763 11.4341C45.4679 11.5695 45.4953 11.7768 45.456 12.0408C45.4392 12.1738 45.4202 12.3227 45.3996 12.4862C45.3681 12.6481 45.3192 12.8225 45.2731 13.0143C45.2295 13.2073 45.1381 13.3997 45.0615 13.6153C44.9758 13.8265 44.8495 14.0357 44.7305 14.2658C44.4491 14.6972 44.1062 15.1721 43.6275 15.5934C43.1563 16.0202 42.5732 16.4075 41.8985 16.7259C41.2144 17.037 40.4639 17.2672 39.5957 17.3874C39.4888 17.4014 39.3725 17.4215 39.2706 17.4303C39.1712 17.4364 39.0711 17.4428 38.9708 17.4489C38.8614 17.4547 38.7514 17.4608 38.6404 17.4666C38.5286 17.4656 38.4157 17.4644 38.3026 17.4635C37.8495 17.4495 37.3876 17.3941 36.9282 17.3012C36.0073 17.1171 35.1072 16.7825 34.2333 16.4117C33.7926 16.2269 33.3679 16.0324 32.9247 15.8239C32.4815 15.6211 32.0362 15.4074 31.5905 15.1812C29.8007 14.2856 27.9775 13.2363 26.1471 12.0913C24.3133 10.9494 22.4646 9.72289 20.6015 8.48296C19.6706 7.86437 18.7235 7.24852 17.7857 6.64119C17.321 6.33889 16.8392 6.03599 16.3543 5.73339C15.8856 5.4384 15.3978 5.14585 14.9222 4.86213C13.0218 3.73545 11.0618 2.75672 9.09303 2.4456C8.60248 2.35701 8.11599 2.34027 7.63542 2.33966C7.40074 2.34605 7.20471 2.36462 6.97066 2.37862L6.55865 2.44621L6.35327 2.48L6.30185 2.48852C6.31712 2.48517 6.23172 2.50192 6.32958 2.48183L6.30901 2.4873L6.22642 2.50922C5.34288 2.7211 4.50733 3.12629 3.83665 3.71353C2.46599 4.85573 1.77256 6.65945 1.96236 8.24429L2.00973 8.60199L2.02157 8.69088C2.02438 8.70885 2.00661 8.61691 2.01627 8.6647L2.02064 8.68358L2.02905 8.72163L2.06302 8.87415C2.0998 9.07811 2.16992 9.27386 2.22508 9.47204C2.36408 9.86049 2.52676 10.238 2.72529 10.5941C3.12265 11.305 3.63875 11.9354 4.22217 12.4481C4.80122 12.958 5.4638 13.3708 6.09646 13.6506C6.78117 13.9492 7.44468 14.1255 8.10321 14.2217C9.41559 14.4092 10.6114 14.2734 11.5613 14.0418C12.5106 13.7988 13.2362 13.492 13.7086 13.2497C13.9477 13.1331 14.1275 13.0292 14.2478 12.9604C14.3687 12.8923 14.4311 12.8569 14.4311 12.8569Z" fill="#BF9444" />
                                    <path d="M41.5683 5.14336C41.5683 5.14336 41.6231 5.0977 41.7297 5.00972C41.8369 4.92174 41.9903 4.78688 42.2134 4.63284C42.6532 4.31989 43.3232 3.87695 44.2841 3.49855C44.7649 3.31498 45.3131 3.13872 45.9318 3.01238C46.5504 2.88787 47.2392 2.82729 47.9797 2.85104C48.7149 2.87448 49.5233 2.99899 50.3087 3.24344C51.1467 3.50555 51.9249 3.92322 52.6847 4.47119C53.4352 5.0225 54.1277 5.7239 54.6996 6.56107C54.9882 6.97874 55.2269 7.43994 55.4385 7.92368C55.5305 8.17117 55.6345 8.41745 55.704 8.67804L55.7617 8.87227L55.776 8.92097L55.7832 8.94533C55.7776 8.91215 55.7988 9.01717 55.7985 9.01504L55.8166 9.10302L55.8895 9.45676C56.1033 10.5758 56.0029 11.7527 55.6224 12.8672C55.4444 13.4304 55.1649 13.9629 54.8461 14.4758C54.6662 14.7184 54.5079 14.9812 54.2988 15.2055L53.9965 15.5535L53.6627 15.8762C52.767 16.7383 51.6058 17.3627 50.3489 17.7012L50.2314 17.735L50.2021 17.7435L50.1235 17.7594L50.0724 17.7694L49.8683 17.8096L49.4588 17.8903C49.1387 17.9304 48.7784 17.9755 48.4537 17.9925C47.8148 18.0135 47.17 17.9928 46.5445 17.8963C45.2882 17.7189 44.084 17.3532 42.9683 16.8692C41.8479 16.39 40.7935 15.8217 39.7806 15.2287C39.2761 14.9264 38.7874 14.6268 38.2928 14.312C37.8125 14.0079 37.3313 13.7014 36.8458 13.3814C35.8759 12.7528 34.9441 12.1065 34.0153 11.4669C33.0869 10.8282 32.1769 10.1886 31.2796 9.55661C30.3808 8.93346 29.4932 8.31791 28.62 7.71271C26.8703 6.51601 25.1621 5.4006 23.4945 4.42918C23.08 4.18138 22.6667 3.94636 22.2553 3.72261C21.8499 3.49398 21.4307 3.27358 21.0355 3.0614C20.2402 2.63855 19.4782 2.28207 18.7237 2.06166C18.3469 1.95055 17.9729 1.87231 17.6033 1.82847C17.5107 1.81965 17.4184 1.81051 17.3268 1.80168C17.2339 1.79894 17.1414 1.7962 17.0494 1.79347C16.9488 1.79042 16.8484 1.78738 16.749 1.78433C16.6524 1.7822 16.5723 1.79012 16.4838 1.79225C15.7882 1.81082 15.0776 1.93715 14.4639 2.14081C13.8444 2.34935 13.3037 2.64159 12.8312 2.95546C12.3553 3.27023 11.9938 3.65076 11.6806 4.00816C11.0984 4.75644 10.8045 5.47853 10.6851 5.98388C10.6066 6.23412 10.5929 6.43595 10.5608 6.56898C10.5358 6.70354 10.5231 6.77295 10.5231 6.77295C10.5231 6.77295 10.5231 6.70263 10.5231 6.56655C10.5315 6.43108 10.5041 6.22377 10.5433 5.95983C10.5602 5.8268 10.5792 5.67793 10.5997 5.51446C10.6312 5.3525 10.6801 5.17807 10.7263 4.98628C10.7699 4.79327 10.8612 4.60087 10.9379 4.38534C11.0239 4.17407 11.1498 3.96493 11.2689 3.73478C11.5503 3.30341 11.8931 2.82882 12.3718 2.40719C12.843 1.98038 13.4261 1.59315 14.1009 1.27472C14.785 0.963602 15.5354 0.733456 16.4037 0.613208C16.5106 0.599205 16.6268 0.579113 16.7287 0.570284C16.8282 0.564196 16.9282 0.557803 17.0286 0.551714C17.1379 0.54593 17.248 0.539842 17.3589 0.534058C17.4708 0.534971 17.5836 0.536189 17.6967 0.537102C18.1499 0.551105 18.6118 0.606511 19.0711 0.699361C19.9921 0.883233 20.8922 1.2178 21.766 1.58828C22.2064 1.77307 22.6312 1.9679 23.0747 2.17613C23.5178 2.37887 23.9632 2.59258 24.4089 2.81877C26.1987 3.71439 28.0219 4.76374 29.8522 5.90869C31.686 7.05059 33.5348 8.27711 35.3978 9.51704C36.3287 10.1356 37.2759 10.7515 38.2136 11.3588C38.6786 11.6614 39.1601 11.9637 39.6451 12.2666C40.1138 12.5616 40.6015 12.8541 41.0771 13.1379C42.9776 14.2645 44.9376 15.2433 46.9063 15.5544C47.3969 15.643 47.8834 15.6597 48.3639 15.6603C48.5986 15.6539 48.7946 15.6354 49.0287 15.6214L49.4407 15.5538L49.6461 15.52L49.6975 15.5115C49.6822 15.5148 49.7676 15.4981 49.6698 15.5179L49.6903 15.5124L49.7729 15.4905C50.6565 15.2786 51.492 14.8734 52.1627 14.2862C53.5334 13.144 54.2268 11.3402 54.037 9.7554L53.9896 9.3977L53.9778 9.30881C53.975 9.29085 53.9927 9.38279 53.9831 9.33499L53.9787 9.31612L53.9703 9.27806L53.9366 9.12646C53.8999 8.9225 53.8298 8.72675 53.7746 8.52857C53.6356 8.14043 53.4726 7.76294 53.2744 7.40646C52.877 6.69563 52.3609 6.06516 51.7775 5.55251C51.1984 5.0426 50.5359 4.6298 49.9032 4.35003C49.2185 4.05139 48.555 3.87513 47.8965 3.77893C46.5841 3.5914 45.3883 3.72717 44.4383 3.95884C43.489 4.20177 42.7635 4.50863 42.291 4.75096C42.052 4.86786 41.8722 4.97136 41.7519 5.04016C41.6306 5.10805 41.5683 5.14336 41.5683 5.14336Z" fill="#BF9444" />
                                </svg>
                            <?php endif ?>
                            <?php echo esc_html__($settings['restho_banner_three_content_duration_title'], 'restho') ?>
                            <?php if ($settings['restho_banner_three_duration_icon_switcher'] == 'yes') : ?>
                                <svg width="56" height="18" viewBox="0 0 56 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4311 12.8569C14.4311 12.8569 14.3762 12.9026 14.2693 12.9906C14.1624 13.0786 14.0088 13.2134 13.7856 13.3675C13.3459 13.6804 12.6758 14.1234 11.715 14.5018C11.2341 14.6853 10.6859 14.8619 10.0673 14.9879C9.44863 15.1124 8.75987 15.173 8.01969 15.1493C7.28449 15.1258 6.47606 15.0013 5.69069 14.7569C4.85265 14.4948 4.07444 14.0771 3.31463 13.5291C2.56416 12.9778 1.87167 12.2764 1.29978 11.4392C1.01119 11.0216 0.772769 10.5604 0.561155 10.0766C0.469217 9.82913 0.365124 9.58285 0.295625 9.32226L0.23828 9.12804L0.223944 9.07933L0.216776 9.05498C0.222386 9.08816 0.201193 8.98313 0.201505 8.98526L0.183429 8.89728L0.110502 8.54354C-0.103294 7.42447 -0.00294089 6.24757 0.37759 5.13307C0.555545 4.56988 0.8351 4.03744 1.15392 3.52448C1.33344 3.28185 1.49176 3.01914 1.70088 2.79477L2.00318 2.44682L2.33697 2.12413C3.23266 1.26199 4.39358 0.637617 5.6508 0.299096L5.76829 0.265305L5.79759 0.256781L5.87612 0.240646L5.92723 0.2306L6.13137 0.190416L6.54088 0.109743C6.86095 0.0695591 7.22123 0.0245042 7.54597 0.00745636C8.18487 -0.013549 8.82968 0.00715193 9.45517 0.103959C10.7115 0.281439 11.9157 0.646749 13.0314 1.13109C14.1518 1.61026 15.2061 2.17862 16.219 2.77164C16.7236 3.07363 17.2123 3.37349 17.7069 3.68826C18.1871 3.99238 18.6683 4.29864 19.1539 4.61889C20.1238 5.24753 21.0556 5.89382 21.9843 6.53342C22.9128 7.17211 23.8228 7.8117 24.7197 8.44369C25.6185 9.06685 26.5061 9.6824 27.3794 10.2876C29.129 11.4843 30.8372 12.5997 32.5049 13.5714C32.9194 13.8192 33.3326 14.0542 33.744 14.278C34.1495 14.5066 34.5687 14.727 34.9638 14.9392C35.7592 15.3621 36.5212 15.7185 37.2757 15.9389C37.6525 16.0501 38.0265 16.1283 38.3961 16.1721C38.4887 16.181 38.5809 16.1901 38.6725 16.1989C38.7654 16.2017 38.858 16.2044 38.9499 16.2071C39.0506 16.2102 39.1506 16.2132 39.2504 16.2163C39.347 16.2184 39.4271 16.2105 39.5156 16.2084C40.2112 16.1898 40.9218 16.0635 41.5354 15.8598C42.155 15.6513 42.6957 15.359 43.1679 15.0452C43.6437 14.7304 44.0053 14.3498 44.3185 13.9924C44.9003 13.2442 45.1945 12.5221 45.3139 12.0164C45.3924 11.7662 45.4062 11.5644 45.4383 11.4316C45.4632 11.2971 45.476 11.2277 45.476 11.2277C45.476 11.2277 45.476 11.298 45.4763 11.4341C45.4679 11.5695 45.4953 11.7768 45.456 12.0408C45.4392 12.1738 45.4202 12.3227 45.3996 12.4862C45.3681 12.6481 45.3192 12.8225 45.2731 13.0143C45.2295 13.2073 45.1381 13.3997 45.0615 13.6153C44.9758 13.8265 44.8495 14.0357 44.7305 14.2658C44.4491 14.6972 44.1062 15.1721 43.6275 15.5934C43.1563 16.0202 42.5732 16.4075 41.8985 16.7259C41.2144 17.037 40.4639 17.2672 39.5957 17.3874C39.4888 17.4014 39.3725 17.4215 39.2706 17.4303C39.1712 17.4364 39.0711 17.4428 38.9708 17.4489C38.8614 17.4547 38.7514 17.4608 38.6404 17.4666C38.5286 17.4656 38.4157 17.4644 38.3026 17.4635C37.8495 17.4495 37.3876 17.3941 36.9282 17.3012C36.0073 17.1171 35.1072 16.7825 34.2333 16.4117C33.7926 16.2269 33.3679 16.0324 32.9247 15.8239C32.4815 15.6211 32.0362 15.4074 31.5905 15.1812C29.8007 14.2856 27.9775 13.2363 26.1471 12.0913C24.3133 10.9494 22.4646 9.72289 20.6015 8.48296C19.6706 7.86437 18.7235 7.24852 17.7857 6.64119C17.321 6.33889 16.8392 6.03599 16.3543 5.73339C15.8856 5.4384 15.3978 5.14585 14.9222 4.86213C13.0218 3.73545 11.0618 2.75672 9.09303 2.4456C8.60248 2.35701 8.11599 2.34027 7.63542 2.33966C7.40074 2.34605 7.20471 2.36462 6.97066 2.37862L6.55865 2.44621L6.35327 2.48L6.30185 2.48852C6.31712 2.48517 6.23172 2.50192 6.32958 2.48183L6.30901 2.4873L6.22642 2.50922C5.34288 2.7211 4.50733 3.12629 3.83665 3.71353C2.46599 4.85573 1.77256 6.65945 1.96236 8.24429L2.00973 8.60199L2.02157 8.69088C2.02438 8.70885 2.00661 8.61691 2.01627 8.6647L2.02064 8.68358L2.02905 8.72163L2.06302 8.87415C2.0998 9.07811 2.16992 9.27386 2.22508 9.47204C2.36408 9.86049 2.52676 10.238 2.72529 10.5941C3.12265 11.305 3.63875 11.9354 4.22217 12.4481C4.80122 12.958 5.4638 13.3708 6.09646 13.6506C6.78117 13.9492 7.44468 14.1255 8.10321 14.2217C9.41559 14.4092 10.6114 14.2734 11.5613 14.0418C12.5106 13.7988 13.2362 13.492 13.7086 13.2497C13.9477 13.1331 14.1275 13.0292 14.2478 12.9604C14.3687 12.8923 14.4311 12.8569 14.4311 12.8569Z" fill="#BF9444" />
                                    <path d="M41.5683 5.14336C41.5683 5.14336 41.6231 5.0977 41.7297 5.00972C41.8369 4.92174 41.9903 4.78688 42.2134 4.63284C42.6532 4.31989 43.3232 3.87695 44.2841 3.49855C44.7649 3.31498 45.3131 3.13872 45.9318 3.01238C46.5504 2.88787 47.2392 2.82729 47.9797 2.85104C48.7149 2.87448 49.5233 2.99899 50.3087 3.24344C51.1467 3.50555 51.9249 3.92322 52.6847 4.47119C53.4352 5.0225 54.1277 5.7239 54.6996 6.56107C54.9882 6.97874 55.2269 7.43994 55.4385 7.92368C55.5305 8.17117 55.6345 8.41745 55.704 8.67804L55.7617 8.87227L55.776 8.92097L55.7832 8.94533C55.7776 8.91215 55.7988 9.01717 55.7985 9.01504L55.8166 9.10302L55.8895 9.45676C56.1033 10.5758 56.0029 11.7527 55.6224 12.8672C55.4444 13.4304 55.1649 13.9629 54.8461 14.4758C54.6662 14.7184 54.5079 14.9812 54.2988 15.2055L53.9965 15.5535L53.6627 15.8762C52.767 16.7383 51.6058 17.3627 50.3489 17.7012L50.2314 17.735L50.2021 17.7435L50.1235 17.7594L50.0724 17.7694L49.8683 17.8096L49.4588 17.8903C49.1387 17.9304 48.7784 17.9755 48.4537 17.9925C47.8148 18.0135 47.17 17.9928 46.5445 17.8963C45.2882 17.7189 44.084 17.3532 42.9683 16.8692C41.8479 16.39 40.7935 15.8217 39.7806 15.2287C39.2761 14.9264 38.7874 14.6268 38.2928 14.312C37.8125 14.0079 37.3313 13.7014 36.8458 13.3814C35.8759 12.7528 34.9441 12.1065 34.0153 11.4669C33.0869 10.8282 32.1769 10.1886 31.2796 9.55661C30.3808 8.93346 29.4932 8.31791 28.62 7.71271C26.8703 6.51601 25.1621 5.4006 23.4945 4.42918C23.08 4.18138 22.6667 3.94636 22.2553 3.72261C21.8499 3.49398 21.4307 3.27358 21.0355 3.0614C20.2402 2.63855 19.4782 2.28207 18.7237 2.06166C18.3469 1.95055 17.9729 1.87231 17.6033 1.82847C17.5107 1.81965 17.4184 1.81051 17.3268 1.80168C17.2339 1.79894 17.1414 1.7962 17.0494 1.79347C16.9488 1.79042 16.8484 1.78738 16.749 1.78433C16.6524 1.7822 16.5723 1.79012 16.4838 1.79225C15.7882 1.81082 15.0776 1.93715 14.4639 2.14081C13.8444 2.34935 13.3037 2.64159 12.8312 2.95546C12.3553 3.27023 11.9938 3.65076 11.6806 4.00816C11.0984 4.75644 10.8045 5.47853 10.6851 5.98388C10.6066 6.23412 10.5929 6.43595 10.5608 6.56898C10.5358 6.70354 10.5231 6.77295 10.5231 6.77295C10.5231 6.77295 10.5231 6.70263 10.5231 6.56655C10.5315 6.43108 10.5041 6.22377 10.5433 5.95983C10.5602 5.8268 10.5792 5.67793 10.5997 5.51446C10.6312 5.3525 10.6801 5.17807 10.7263 4.98628C10.7699 4.79327 10.8612 4.60087 10.9379 4.38534C11.0239 4.17407 11.1498 3.96493 11.2689 3.73478C11.5503 3.30341 11.8931 2.82882 12.3718 2.40719C12.843 1.98038 13.4261 1.59315 14.1009 1.27472C14.785 0.963602 15.5354 0.733456 16.4037 0.613208C16.5106 0.599205 16.6268 0.579113 16.7287 0.570284C16.8282 0.564196 16.9282 0.557803 17.0286 0.551714C17.1379 0.54593 17.248 0.539842 17.3589 0.534058C17.4708 0.534971 17.5836 0.536189 17.6967 0.537102C18.1499 0.551105 18.6118 0.606511 19.0711 0.699361C19.9921 0.883233 20.8922 1.2178 21.766 1.58828C22.2064 1.77307 22.6312 1.9679 23.0747 2.17613C23.5178 2.37887 23.9632 2.59258 24.4089 2.81877C26.1987 3.71439 28.0219 4.76374 29.8522 5.90869C31.686 7.05059 33.5348 8.27711 35.3978 9.51704C36.3287 10.1356 37.2759 10.7515 38.2136 11.3588C38.6786 11.6614 39.1601 11.9637 39.6451 12.2666C40.1138 12.5616 40.6015 12.8541 41.0771 13.1379C42.9776 14.2645 44.9376 15.2433 46.9063 15.5544C47.3969 15.643 47.8834 15.6597 48.3639 15.6603C48.5986 15.6539 48.7946 15.6354 49.0287 15.6214L49.4407 15.5538L49.6461 15.52L49.6975 15.5115C49.6822 15.5148 49.7676 15.4981 49.6698 15.5179L49.6903 15.5124L49.7729 15.4905C50.6565 15.2786 51.492 14.8734 52.1627 14.2862C53.5334 13.144 54.2268 11.3402 54.037 9.7554L53.9896 9.3977L53.9778 9.30881C53.975 9.29085 53.9927 9.38279 53.9831 9.33499L53.9787 9.31612L53.9703 9.27806L53.9366 9.12646C53.8999 8.9225 53.8298 8.72675 53.7746 8.52857C53.6356 8.14043 53.4726 7.76294 53.2744 7.40646C52.877 6.69563 52.3609 6.06516 51.7775 5.55251C51.1984 5.0426 50.5359 4.6298 49.9032 4.35003C49.2185 4.05139 48.555 3.87513 47.8965 3.77893C46.5841 3.5914 45.3883 3.72717 44.4383 3.95884C43.489 4.20177 42.7635 4.50863 42.291 4.75096C42.052 4.86786 41.8722 4.97136 41.7519 5.04016C41.6306 5.10805 41.5683 5.14336 41.5683 5.14336Z" fill="#BF9444" />
                                </svg>
                            <?php endif ?>
                        </p>
                    <?php endif ?>
                </div>
                <div class="video-wrap d-flex align-items-center justify-content-center">
                    <?php if (!empty($settings['restho_banner_three_video_controller']['url'])) : ?>
                        <video autoplay="" loop="loop" muted="" preload="auto">
                            <source src="<?php echo esc_url($settings['restho_banner_three_video_controller']['url']) ?>" type="video/mp4">
                        </video>
                    <?php endif ?>
                    <div class="banner-content text-center">
                        <?php if (!empty($settings['restho_banner_three_content_sub_title'])) : ?>
                            <span>
                                <?php if ($settings['restho_banner_three_subtitle_icon_switcher'] == 'yes') : ?>
                                    <svg width="28" height="9" viewBox="0 0 28 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.21551 6.42846C7.21551 6.42846 7.18808 6.45129 7.13463 6.49528C7.08118 6.53927 7.00436 6.6067 6.89279 6.68372C6.67292 6.84019 6.33789 7.06166 5.85747 7.25086C5.61703 7.34264 5.34293 7.43093 5.03362 7.49394C4.7243 7.5562 4.37992 7.58649 4.00983 7.57462C3.64223 7.56289 3.23802 7.50064 2.84534 7.37841C2.42632 7.24736 2.03722 7.03852 1.65731 6.76454C1.28208 6.48889 0.93583 6.13819 0.649887 5.7196C0.505591 5.51077 0.386383 5.28017 0.280577 5.0383C0.234608 4.91455 0.182561 4.79141 0.147812 4.66112L0.11914 4.56401L0.111972 4.53965L0.108388 4.52748C0.111193 4.54407 0.100596 4.49156 0.100752 4.49262L0.0917141 4.44863L0.0552506 4.27176C-0.0516468 3.71223 -0.00147044 3.12378 0.188794 2.56653C0.277772 2.28493 0.417549 2.01871 0.57696 1.76224C0.666716 1.64092 0.745876 1.50956 0.850436 1.39738L1.00159 1.22341L1.16848 1.06206C1.61633 0.630995 2.19678 0.318808 2.82539 0.149548L2.88414 0.132652L2.89878 0.12839L2.93805 0.120323L2.96361 0.1153L3.06567 0.0952078L3.27043 0.0548715C3.43047 0.0347795 3.6106 0.0122521 3.77297 0.00372817C4.09242 -0.00677448 4.41483 0.00357596 4.72757 0.0519795C5.35571 0.140719 5.95783 0.323374 6.51569 0.565544C7.07589 0.805126 7.60305 1.08931 8.10949 1.38582C8.36177 1.53681 8.60611 1.68674 8.8534 1.84413C9.09353 1.99619 9.33413 2.14931 9.57691 2.30944C10.0618 2.62376 10.5278 2.94691 10.9921 3.2667C11.4563 3.58604 11.9114 3.90584 12.3598 4.22184C12.8092 4.53341 13.253 4.84119 13.6897 5.14378C14.5645 5.74213 15.4186 6.29984 16.2524 6.7857C16.4596 6.9096 16.6663 7.02711 16.872 7.13898C17.0747 7.2533 17.2843 7.3635 17.4819 7.46959C17.8795 7.68101 18.2605 7.85925 18.6378 7.96945C18.8262 8.02501 19.0132 8.06413 19.198 8.08605C19.2443 8.09046 19.2904 8.09503 19.3362 8.09944C19.3826 8.10081 19.4289 8.10218 19.4749 8.10355C19.5252 8.10507 19.5752 8.1066 19.6251 8.10812C19.6734 8.10919 19.7135 8.10523 19.7577 8.10416C20.1055 8.09488 20.4608 8.03171 20.7676 7.92988C21.0774 7.82561 21.3478 7.67949 21.5839 7.52256C21.8218 7.36517 22.0026 7.17491 22.1592 6.99621C22.4501 6.62207 22.5972 6.26102 22.6569 6.0082C22.6961 5.88308 22.703 5.78216 22.7191 5.7158C22.7315 5.64852 22.7379 5.61382 22.7379 5.61382C22.7379 5.61382 22.7379 5.64898 22.7381 5.71702C22.7339 5.78475 22.7476 5.88841 22.7279 6.02038C22.7195 6.08689 22.71 6.16132 22.6997 6.24306C22.684 6.32404 22.6595 6.41126 22.6365 6.50715C22.6147 6.60365 22.569 6.69985 22.5307 6.80762C22.4878 6.91325 22.4247 7.01782 22.3652 7.13289C22.2245 7.34858 22.0531 7.58603 21.8137 7.79669C21.5781 8.01009 21.2865 8.20371 20.9492 8.36292C20.6071 8.51848 20.2319 8.63356 19.7978 8.69368C19.7443 8.70068 19.6862 8.71073 19.6352 8.71514C19.5855 8.71819 19.5355 8.72138 19.4853 8.72443C19.4306 8.72732 19.3756 8.73036 19.3202 8.73326C19.2642 8.7328 19.2078 8.73219 19.1512 8.73173C18.9247 8.72473 18.6937 8.69703 18.464 8.6506C18.0036 8.55852 17.5535 8.39123 17.1166 8.20584C16.8963 8.11345 16.6839 8.01618 16.4623 7.91192C16.2407 7.81054 16.018 7.70369 15.7952 7.5906C14.9003 7.14279 13.9887 6.61811 13.0735 6.04564C12.1566 5.47469 11.2323 4.86143 10.3007 4.24147C9.83527 3.93218 9.36171 3.62425 8.89283 3.32059C8.66049 3.16944 8.41958 3.01799 8.17712 2.86669C7.94275 2.7192 7.69888 2.57292 7.46109 2.43106C6.51086 1.86772 5.53086 1.37836 4.5465 1.2228C4.30123 1.1785 4.05798 1.17013 3.8177 1.16983C3.70036 1.17302 3.60234 1.18231 3.48532 1.18931L3.27931 1.2231L3.17662 1.24L3.15091 1.24426C3.15855 1.24258 3.11585 1.25096 3.16478 1.24091L3.1545 1.24365L3.1132 1.25461C2.67143 1.36055 2.25366 1.56314 1.91832 1.85676C1.23299 2.42786 0.886277 3.32972 0.981175 4.12214L1.00486 4.30099L1.01078 4.34543C1.01218 4.35441 1.0033 4.30844 1.00813 4.33234L1.01031 4.34178L1.01452 4.36081L1.03151 4.43706C1.0499 4.53905 1.08496 4.63692 1.11254 4.73601C1.18204 4.93023 1.26338 5.11897 1.36264 5.29706C1.56132 5.65248 1.81937 5.96771 2.11108 6.22404C2.4006 6.47899 2.73189 6.68539 3.04822 6.82527C3.39057 6.97459 3.72233 7.06273 4.05159 7.11082C4.70778 7.20459 5.30569 7.1367 5.78065 7.02087C6.2553 6.8994 6.61807 6.74597 6.8543 6.62481C6.97382 6.56651 7.06373 6.51461 7.12388 6.48021C7.18434 6.44611 7.21551 6.42846 7.21551 6.42846Z" fill="#BF9444" />
                                        <path d="M20.7841 2.57169C20.7841 2.57169 20.8115 2.54886 20.8648 2.50487C20.9184 2.46088 20.9951 2.39345 21.1067 2.31643C21.3265 2.15996 21.6616 1.93849 22.142 1.74929C22.3824 1.6575 22.6565 1.56937 22.9658 1.5062C23.2751 1.44395 23.6195 1.41366 23.9898 1.42553C24.3574 1.43725 24.7616 1.49951 25.1543 1.62173C25.5733 1.75279 25.9624 1.96162 26.3423 2.23561C26.7175 2.51126 27.0638 2.86196 27.3497 3.28054C27.494 3.48938 27.6134 3.71998 27.7192 3.96184C27.7652 4.08559 27.8172 4.20873 27.8519 4.33903L27.8808 4.43614L27.8879 4.46049L27.8915 4.47267C27.8887 4.45608 27.8993 4.50859 27.8992 4.50753L27.9082 4.55152L27.9447 4.72839C28.0516 5.28792 28.0014 5.87637 27.8111 6.43362C27.7221 6.71521 27.5824 6.98143 27.423 7.23791C27.333 7.35922 27.2539 7.49058 27.1493 7.60276L26.9982 7.77674L26.8313 7.93809C26.3834 8.36915 25.8028 8.68134 25.1744 8.8506L25.1156 8.86749L25.101 8.87176L25.0617 8.87967L25.0362 8.88469L24.9341 8.90479L24.7293 8.94512C24.5693 8.96521 24.3892 8.98774 24.2268 8.99627C23.9073 9.00677 23.5849 8.99642 23.2722 8.94817C22.644 8.85943 22.0419 8.67662 21.4841 8.4346C20.9239 8.19502 20.3967 7.91084 19.8903 7.61433C19.638 7.46318 19.3937 7.31341 19.1464 7.15602C18.9062 7.00396 18.6656 6.85068 18.4228 6.69071C17.9379 6.37639 17.472 6.05324 17.0076 5.73344C16.5434 5.4141 16.0884 5.0943 15.6398 4.77831C15.1904 4.46673 14.7466 4.15896 14.3099 3.85636C13.4351 3.25802 12.581 2.70031 11.7472 2.2146C11.54 2.0907 11.3333 1.97319 11.1276 1.86132C10.9249 1.747 10.7153 1.6368 10.5177 1.53071C10.1201 1.31929 9.73907 1.14105 9.36181 1.03085C9.17342 0.975288 8.98642 0.936169 8.80161 0.914251C8.75533 0.909836 8.70921 0.90527 8.66339 0.900856C8.61696 0.899486 8.57068 0.898116 8.52471 0.896746C8.47438 0.895224 8.4242 0.893702 8.37449 0.89218C8.32618 0.891114 8.28614 0.895072 8.24188 0.896137C7.89408 0.905422 7.53879 0.96859 7.23197 1.07042C6.92218 1.17469 6.65182 1.32081 6.41559 1.47774C6.17764 1.63513 5.99688 1.82539 5.84027 2.00409C5.54919 2.37823 5.40224 2.73928 5.34256 2.99195C5.30329 3.11707 5.29644 3.21798 5.28039 3.2845C5.26792 3.35178 5.26153 3.38648 5.26153 3.38648C5.26153 3.38648 5.26153 3.35132 5.26153 3.28328C5.26574 3.21555 5.25203 3.11189 5.27166 2.97992C5.28008 2.91341 5.28958 2.83897 5.29987 2.75724C5.31561 2.67626 5.34007 2.58904 5.36313 2.49315C5.38495 2.39665 5.43061 2.30045 5.46894 2.19268C5.51195 2.08705 5.5749 1.98248 5.63443 1.8674C5.77514 1.65172 5.94655 1.41442 6.1859 1.20361C6.42151 0.990205 6.71306 0.796591 7.05043 0.637377C7.39247 0.481816 7.7677 0.366743 8.20183 0.306619C8.25528 0.299617 8.31341 0.289571 8.36436 0.285157C8.41407 0.282113 8.46409 0.278917 8.51427 0.275872C8.56896 0.27298 8.62397 0.269936 8.67945 0.267044C8.73539 0.267501 8.7918 0.26811 8.84836 0.268566C9.07493 0.275568 9.30587 0.303271 9.53556 0.349695C9.99603 0.441632 10.4461 0.608913 10.883 0.794155C11.1032 0.886548 11.3156 0.983964 11.5373 1.08808C11.7589 1.18945 11.9816 1.2963 12.2044 1.4094C13.0993 1.85721 14.0109 2.38188 14.9261 2.95435C15.843 3.5253 16.7673 4.13856 17.6989 4.75852C18.1643 5.06782 18.6379 5.37574 19.1068 5.67941C19.3393 5.83071 19.58 5.98185 19.8225 6.1333C20.0569 6.2808 20.3007 6.42707 20.5385 6.56894C21.4887 7.13227 22.4687 7.62164 23.4531 7.7772C23.6984 7.82149 23.9416 7.82986 24.1819 7.83017C24.2992 7.82697 24.3973 7.81769 24.5143 7.81068L24.7203 7.77689L24.823 7.76L24.8487 7.75574C24.8411 7.75741 24.8838 7.74904 24.8348 7.75893L24.8451 7.75619L24.8864 7.74523C25.3282 7.63929 25.7459 7.4367 26.0813 7.14308C26.7666 6.57198 27.1133 5.67012 27.0184 4.87771L26.9947 4.69886L26.9888 4.65441C26.9874 4.64543 26.9963 4.6914 26.9915 4.6675L26.9893 4.65806L26.9851 4.63904L26.9683 4.56324C26.9499 4.46125 26.9148 4.36338 26.8872 4.26429C26.8177 4.07022 26.7362 3.88148 26.6371 3.70324C26.4384 3.34782 26.1804 3.03259 25.8887 2.77626C25.5992 2.52131 25.2679 2.31491 24.9515 2.17502C24.6092 2.0257 24.2774 1.93757 23.9482 1.88947C23.292 1.79571 22.6941 1.8636 22.2191 1.97943C21.7445 2.1009 21.3817 2.25433 21.1455 2.37549C21.0259 2.43394 20.936 2.48569 20.8759 2.52009C20.8153 2.55403 20.7841 2.57169 20.7841 2.57169Z" fill="#BF9444" />
                                    </svg>
                                <?php endif; ?>
                                <?php echo esc_html__($settings['restho_banner_three_content_sub_title'], 'restho') ?>
                                <?php if ($settings['restho_banner_three_subtitle_icon_switcher'] == 'yes') : ?>
                                    <svg width="28" height="9" viewBox="0 0 28 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.21551 6.42846C7.21551 6.42846 7.18808 6.45129 7.13463 6.49528C7.08118 6.53927 7.00436 6.6067 6.89279 6.68372C6.67292 6.84019 6.33789 7.06166 5.85747 7.25086C5.61703 7.34264 5.34293 7.43093 5.03362 7.49394C4.7243 7.5562 4.37992 7.58649 4.00983 7.57462C3.64223 7.56289 3.23802 7.50064 2.84534 7.37841C2.42632 7.24736 2.03722 7.03852 1.65731 6.76454C1.28208 6.48889 0.93583 6.13819 0.649887 5.7196C0.505591 5.51077 0.386383 5.28017 0.280577 5.0383C0.234608 4.91455 0.182561 4.79141 0.147812 4.66112L0.11914 4.56401L0.111972 4.53965L0.108388 4.52748C0.111193 4.54407 0.100596 4.49156 0.100752 4.49262L0.0917141 4.44863L0.0552506 4.27176C-0.0516468 3.71223 -0.00147044 3.12378 0.188794 2.56653C0.277772 2.28493 0.417549 2.01871 0.57696 1.76224C0.666716 1.64092 0.745876 1.50956 0.850436 1.39738L1.00159 1.22341L1.16848 1.06206C1.61633 0.630995 2.19678 0.318808 2.82539 0.149548L2.88414 0.132652L2.89878 0.12839L2.93805 0.120323L2.96361 0.1153L3.06567 0.0952078L3.27043 0.0548715C3.43047 0.0347795 3.6106 0.0122521 3.77297 0.00372817C4.09242 -0.00677448 4.41483 0.00357596 4.72757 0.0519795C5.35571 0.140719 5.95783 0.323374 6.51569 0.565544C7.07589 0.805126 7.60305 1.08931 8.10949 1.38582C8.36177 1.53681 8.60611 1.68674 8.8534 1.84413C9.09353 1.99619 9.33413 2.14931 9.57691 2.30944C10.0618 2.62376 10.5278 2.94691 10.9921 3.2667C11.4563 3.58604 11.9114 3.90584 12.3598 4.22184C12.8092 4.53341 13.253 4.84119 13.6897 5.14378C14.5645 5.74213 15.4186 6.29984 16.2524 6.7857C16.4596 6.9096 16.6663 7.02711 16.872 7.13898C17.0747 7.2533 17.2843 7.3635 17.4819 7.46959C17.8795 7.68101 18.2605 7.85925 18.6378 7.96945C18.8262 8.02501 19.0132 8.06413 19.198 8.08605C19.2443 8.09046 19.2904 8.09503 19.3362 8.09944C19.3826 8.10081 19.4289 8.10218 19.4749 8.10355C19.5252 8.10507 19.5752 8.1066 19.6251 8.10812C19.6734 8.10919 19.7135 8.10523 19.7577 8.10416C20.1055 8.09488 20.4608 8.03171 20.7676 7.92988C21.0774 7.82561 21.3478 7.67949 21.5839 7.52256C21.8218 7.36517 22.0026 7.17491 22.1592 6.99621C22.4501 6.62207 22.5972 6.26102 22.6569 6.0082C22.6961 5.88308 22.703 5.78216 22.7191 5.7158C22.7315 5.64852 22.7379 5.61382 22.7379 5.61382C22.7379 5.61382 22.7379 5.64898 22.7381 5.71702C22.7339 5.78475 22.7476 5.88841 22.7279 6.02038C22.7195 6.08689 22.71 6.16132 22.6997 6.24306C22.684 6.32404 22.6595 6.41126 22.6365 6.50715C22.6147 6.60365 22.569 6.69985 22.5307 6.80762C22.4878 6.91325 22.4247 7.01782 22.3652 7.13289C22.2245 7.34858 22.0531 7.58603 21.8137 7.79669C21.5781 8.01009 21.2865 8.20371 20.9492 8.36292C20.6071 8.51848 20.2319 8.63356 19.7978 8.69368C19.7443 8.70068 19.6862 8.71073 19.6352 8.71514C19.5855 8.71819 19.5355 8.72138 19.4853 8.72443C19.4306 8.72732 19.3756 8.73036 19.3202 8.73326C19.2642 8.7328 19.2078 8.73219 19.1512 8.73173C18.9247 8.72473 18.6937 8.69703 18.464 8.6506C18.0036 8.55852 17.5535 8.39123 17.1166 8.20584C16.8963 8.11345 16.6839 8.01618 16.4623 7.91192C16.2407 7.81054 16.018 7.70369 15.7952 7.5906C14.9003 7.14279 13.9887 6.61811 13.0735 6.04564C12.1566 5.47469 11.2323 4.86143 10.3007 4.24147C9.83527 3.93218 9.36171 3.62425 8.89283 3.32059C8.66049 3.16944 8.41958 3.01799 8.17712 2.86669C7.94275 2.7192 7.69888 2.57292 7.46109 2.43106C6.51086 1.86772 5.53086 1.37836 4.5465 1.2228C4.30123 1.1785 4.05798 1.17013 3.8177 1.16983C3.70036 1.17302 3.60234 1.18231 3.48532 1.18931L3.27931 1.2231L3.17662 1.24L3.15091 1.24426C3.15855 1.24258 3.11585 1.25096 3.16478 1.24091L3.1545 1.24365L3.1132 1.25461C2.67143 1.36055 2.25366 1.56314 1.91832 1.85676C1.23299 2.42786 0.886277 3.32972 0.981175 4.12214L1.00486 4.30099L1.01078 4.34543C1.01218 4.35441 1.0033 4.30844 1.00813 4.33234L1.01031 4.34178L1.01452 4.36081L1.03151 4.43706C1.0499 4.53905 1.08496 4.63692 1.11254 4.73601C1.18204 4.93023 1.26338 5.11897 1.36264 5.29706C1.56132 5.65248 1.81937 5.96771 2.11108 6.22404C2.4006 6.47899 2.73189 6.68539 3.04822 6.82527C3.39057 6.97459 3.72233 7.06273 4.05159 7.11082C4.70778 7.20459 5.30569 7.1367 5.78065 7.02087C6.2553 6.8994 6.61807 6.74597 6.8543 6.62481C6.97382 6.56651 7.06373 6.51461 7.12388 6.48021C7.18434 6.44611 7.21551 6.42846 7.21551 6.42846Z" fill="#BF9444" />
                                        <path d="M20.7841 2.57169C20.7841 2.57169 20.8115 2.54886 20.8648 2.50487C20.9184 2.46088 20.9951 2.39345 21.1067 2.31643C21.3265 2.15996 21.6616 1.93849 22.142 1.74929C22.3824 1.6575 22.6565 1.56937 22.9658 1.5062C23.2751 1.44395 23.6195 1.41366 23.9898 1.42553C24.3574 1.43725 24.7616 1.49951 25.1543 1.62173C25.5733 1.75279 25.9624 1.96162 26.3423 2.23561C26.7175 2.51126 27.0638 2.86196 27.3497 3.28054C27.494 3.48938 27.6134 3.71998 27.7192 3.96184C27.7652 4.08559 27.8172 4.20873 27.8519 4.33903L27.8808 4.43614L27.8879 4.46049L27.8915 4.47267C27.8887 4.45608 27.8993 4.50859 27.8992 4.50753L27.9082 4.55152L27.9447 4.72839C28.0516 5.28792 28.0014 5.87637 27.8111 6.43362C27.7221 6.71521 27.5824 6.98143 27.423 7.23791C27.333 7.35922 27.2539 7.49058 27.1493 7.60276L26.9982 7.77674L26.8313 7.93809C26.3834 8.36915 25.8028 8.68134 25.1744 8.8506L25.1156 8.86749L25.101 8.87176L25.0617 8.87967L25.0362 8.88469L24.9341 8.90479L24.7293 8.94512C24.5693 8.96521 24.3892 8.98774 24.2268 8.99627C23.9073 9.00677 23.5849 8.99642 23.2722 8.94817C22.644 8.85943 22.0419 8.67662 21.4841 8.4346C20.9239 8.19502 20.3967 7.91084 19.8903 7.61433C19.638 7.46318 19.3937 7.31341 19.1464 7.15602C18.9062 7.00396 18.6656 6.85068 18.4228 6.69071C17.9379 6.37639 17.472 6.05324 17.0076 5.73344C16.5434 5.4141 16.0884 5.0943 15.6398 4.77831C15.1904 4.46673 14.7466 4.15896 14.3099 3.85636C13.4351 3.25802 12.581 2.70031 11.7472 2.2146C11.54 2.0907 11.3333 1.97319 11.1276 1.86132C10.9249 1.747 10.7153 1.6368 10.5177 1.53071C10.1201 1.31929 9.73907 1.14105 9.36181 1.03085C9.17342 0.975288 8.98642 0.936169 8.80161 0.914251C8.75533 0.909836 8.70921 0.90527 8.66339 0.900856C8.61696 0.899486 8.57068 0.898116 8.52471 0.896746C8.47438 0.895224 8.4242 0.893702 8.37449 0.89218C8.32618 0.891114 8.28614 0.895072 8.24188 0.896137C7.89408 0.905422 7.53879 0.96859 7.23197 1.07042C6.92218 1.17469 6.65182 1.32081 6.41559 1.47774C6.17764 1.63513 5.99688 1.82539 5.84027 2.00409C5.54919 2.37823 5.40224 2.73928 5.34256 2.99195C5.30329 3.11707 5.29644 3.21798 5.28039 3.2845C5.26792 3.35178 5.26153 3.38648 5.26153 3.38648C5.26153 3.38648 5.26153 3.35132 5.26153 3.28328C5.26574 3.21555 5.25203 3.11189 5.27166 2.97992C5.28008 2.91341 5.28958 2.83897 5.29987 2.75724C5.31561 2.67626 5.34007 2.58904 5.36313 2.49315C5.38495 2.39665 5.43061 2.30045 5.46894 2.19268C5.51195 2.08705 5.5749 1.98248 5.63443 1.8674C5.77514 1.65172 5.94655 1.41442 6.1859 1.20361C6.42151 0.990205 6.71306 0.796591 7.05043 0.637377C7.39247 0.481816 7.7677 0.366743 8.20183 0.306619C8.25528 0.299617 8.31341 0.289571 8.36436 0.285157C8.41407 0.282113 8.46409 0.278917 8.51427 0.275872C8.56896 0.27298 8.62397 0.269936 8.67945 0.267044C8.73539 0.267501 8.7918 0.26811 8.84836 0.268566C9.07493 0.275568 9.30587 0.303271 9.53556 0.349695C9.99603 0.441632 10.4461 0.608913 10.883 0.794155C11.1032 0.886548 11.3156 0.983964 11.5373 1.08808C11.7589 1.18945 11.9816 1.2963 12.2044 1.4094C13.0993 1.85721 14.0109 2.38188 14.9261 2.95435C15.843 3.5253 16.7673 4.13856 17.6989 4.75852C18.1643 5.06782 18.6379 5.37574 19.1068 5.67941C19.3393 5.83071 19.58 5.98185 19.8225 6.1333C20.0569 6.2808 20.3007 6.42707 20.5385 6.56894C21.4887 7.13227 22.4687 7.62164 23.4531 7.7772C23.6984 7.82149 23.9416 7.82986 24.1819 7.83017C24.2992 7.82697 24.3973 7.81769 24.5143 7.81068L24.7203 7.77689L24.823 7.76L24.8487 7.75574C24.8411 7.75741 24.8838 7.74904 24.8348 7.75893L24.8451 7.75619L24.8864 7.74523C25.3282 7.63929 25.7459 7.4367 26.0813 7.14308C26.7666 6.57198 27.1133 5.67012 27.0184 4.87771L26.9947 4.69886L26.9888 4.65441C26.9874 4.64543 26.9963 4.6914 26.9915 4.6675L26.9893 4.65806L26.9851 4.63904L26.9683 4.56324C26.9499 4.46125 26.9148 4.36338 26.8872 4.26429C26.8177 4.07022 26.7362 3.88148 26.6371 3.70324C26.4384 3.34782 26.1804 3.03259 25.8887 2.77626C25.5992 2.52131 25.2679 2.31491 24.9515 2.17502C24.6092 2.0257 24.2774 1.93757 23.9482 1.88947C23.292 1.79571 22.6941 1.8636 22.2191 1.97943C21.7445 2.1009 21.3817 2.25433 21.1455 2.37549C21.0259 2.43394 20.936 2.48569 20.8759 2.52009C20.8153 2.55403 20.7841 2.57169 20.7841 2.57169Z" fill="#BF9444" />
                                    </svg>
                                <?php endif ?>
                            </span>
                        <?php endif; ?>
                        <?php if (!empty($settings['restho_banner_three_content_main_title'])) : ?>
                            <h1><?php echo esc_html__($settings['restho_banner_three_content_main_title'], 'restho') ?></h1>
                        <?php endif; ?>
                        <?php if (!empty($settings['restho_banner_three_content_button_text'])) : ?>
                            <a class="primary-btn7 btn-md2" href="<?php echo esc_url($settings['restho_banner_three_content_button_url']['url']) ?>"><i class="bi bi-arrow-up-right-circle"></i><?php echo esc_html__($settings['restho_banner_three_content_button_text'], 'restho') ?></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Restho_Banner_Widget());
