<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_about_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_about';
    }

    public function get_title()
    {
        return esc_html__('EG About', 'restho-core');
    }

    public function get_icon()
    {
        return ' eicon-lock-user';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_about_content_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        $this->add_control(
            'restho_about_content_style_selection',
            [
                'label'   => esc_html__('About Style', 'restho-core'),
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
        $this->end_controls_section();
        //Content Section
        $this->start_controls_section(
            'restho_about_one_content_image_section',
            [
                'label' => esc_html__('About Images', 'restho-core'),
                'condition' => [
                    'restho_about_content_style_selection' => ['style_one', 'style_four'],
                ],
            ]
        );

        $this->add_control(
            'restho_about_content_left_image',
            [
                'label' => esc_html__('Left Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'restho_about_content_right_image',
            [
                'label' => esc_html__('RIght Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'restho_about_one_content_mission_section',
            [
                'label' => esc_html__('Mission Section', 'restho-core'),
                'condition' => [
                    'restho_about_content_style_selection' => ['style_one', 'style_four'],
                ],
            ]
        );
        $this->add_control(
            'restho_about_content_mission_icon_switcher',
            [
                'label' => esc_html__('Mission Icon (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'restho_about_content_mission_title',
            [
                'label' => esc_html__('Mission Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Mission', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'restho_about_one_content_feature_section',
            [
                'label' => esc_html__('Feature Section', 'restho-core'),
                'condition' => [
                    'restho_about_content_style_selection' => ['style_one', 'style_three', 'style_four'],
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_about_content_feature_title',
            [
                'label' => esc_html__('Feature Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Delicious Food.', 'restho-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'restho_about_one_content_list',
            [
                'label' => esc_html__('Feature List', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_about_content_feature_title' => esc_html__('Cost Effective.', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_about_content_feature_title' => esc_html__('Clean Environment.', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_about_content_feature_title }}}',
            ]
        );


        $this->end_controls_section();
        // End section

        //Author content
        $this->start_controls_section(
            'restho_about_content_auhtor_section',
            [
                'label' => esc_html__('Author', 'restho-core'),
                'condition' => [
                    'restho_about_content_style_selection' => ['style_one', 'style_four'],
                ],

            ]
        );

        $this->add_control(
            'restho_about_content_author_testimony',
            [
                'label' => esc_html__('Testimony', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('“Welcome our restaurant! Our Restaurant is the best as like delicious food, nutrition food etc in world-wide.”', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_about_content_author_name',
            [
                'label' => esc_html__('Author Name', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Mr. Hamilton', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_about_content_author_designation',
            [
                'label' => esc_html__('Author Designation', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CEO &Founder', 'restho-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'restho_about_content_author_avatar',
            [
                'label' => esc_html__('Auhtor Avatar', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        //Content Section
        $this->start_controls_section(
            'restho_about_two_content_image_section',
            [
                'label' => esc_html__('About Images', 'restho-core'),
                'condition' => [
                    'restho_about_content_style_selection' => ['style_two',],
                ],
            ]
        );

        $this->add_control(
            'restho_about_two_content_image_one',
            [
                'label' => esc_html__('Image One', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'restho_about_two_content_image_two',
            [
                'label' => esc_html__('Image Two', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'restho_about_two_content_image_three',
            [
                'label' => esc_html__('Image Three', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'restho_about_two_content_image_four',
            [
                'label' => esc_html__('Image Four', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
        //Content Section
        $this->start_controls_section(
            'restho_about_three_content_image_section',
            [
                'label' => esc_html__('About Images', 'restho-core'),
                'condition' => [
                    'restho_about_content_style_selection' => ['style_three',],
                ],
            ]
        );

        $this->add_control(
            'restho_about_three_content_image_big',
            [
                'label' => esc_html__('Image Big', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'restho_about_three_content_image_small',
            [
                'label' => esc_html__('Image Small', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
        //Content Section
        $this->start_controls_section(
            'restho_about_content_heading_section',
            [
                'label' => esc_html__('Heading Contents', 'restho-core'),
            ]
        );

        $this->add_control(
            'restho_about_content_subtitle_icon_switcher',
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
            'restho_about_two_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('About to Restho', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_about_two_content_main_title',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Come to Our Restaurant, Ready Your Food.', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_about_two_content_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                software like Aldus PageMaker including versions of Lorem Ipsum.', 'restho-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_about_two_content_feature_section',
            [
                'label' => esc_html__('Feature Section', 'restho-core'),
                'condition' => [
                    'restho_about_content_style_selection' => ['style_two',],
                ],
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'restho_about_two_content_feature_title',
            [
                'label' => esc_html__('Feature Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Pure Fresh Food.', 'restho-core'),
                'label_block' => true,

            ]
        );
        $repeater2->add_control(
            'restho_about_two_content_feature_description',
            [
                'label' => esc_html__('Feature Description', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We are serve different type of fresh food.', 'restho-core'),
                'label_block' => true,

            ]
        );

        $repeater2->add_control(
            'restho_about_two_content_feature_icon',
            [
                'label' => esc_html__('Feature Icon', 'restho-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],

            ]
        );

        $this->add_control(
            'restho_about_two_content_list',
            [
                'label' => esc_html__('Feature List', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'restho_about_two_content_feature_title' => esc_html__('Pure Fresh Food.', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_about_two_content_feature_title' => esc_html__('Experties Chef.', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_about_two_content_feature_title }}}',
            ]
        );

        $this->end_controls_section();

        //Content Section
        $this->start_controls_section(
            'restho_about_two_content_button_section',
            [
                'label' => esc_html__('About Button', 'restho-core'),
                'condition' => [
                    'restho_about_content_style_selection' => ['style_two', 'style_three'],
                ],
            ]
        );

        $this->add_control(
            'restho_about_two_button_content_button_text',
            [
                'label' => esc_html__('Button Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__(' Discover More', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_about_two_button_content_button_url',
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
        //Achivement Section
        $this->start_controls_section(
            'restho_about_three_achivement_section',
            [
                'label' => esc_html__('About Achivement', 'restho-core'),
                'condition' => [
                    'restho_about_content_style_selection' => ['style_three'],
                ],
            ]
        );
        $this->add_control(
            'restho_about_three_achivement_heading_title',
            [
                'label' => esc_html__('Heading Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Achievement:', 'restho-core'),
                'label_block' => true,

            ]
        );
        $repeater3 = new \Elementor\Repeater();

        $repeater3->add_control(
            'restho_about_three_achivement_award_title',
            [
                'label' => esc_html__('Award Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Achievement:', 'restho-core'),
                'label_block' => true,

            ]
        );

        $repeater3->add_control(
            'restho_about_three_achivement_award_link',
            [
                'label' => esc_html__('Link', 'restho-core'),
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

        $repeater3->add_control(
            'restho_about_three_achivement_award_icon',
            [
                'label' => esc_html__('Award Icon', 'restho-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],

            ]
        );

        $this->add_control(
            'restho_about_three_content_achivement_list',
            [
                'label' => esc_html__('Feature List', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
                'default' => [
                    [
                        'restho_about_three_achivement_award_title' => esc_html__('National Award', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                    [
                        'restho_about_three_achivement_award_title' => esc_html__('Professional Award.', 'restho-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'restho-core'),
                    ],
                ],
                'title_field' => '{{{ restho_about_three_achivement_award_title }}}',
            ]
        );
        $this->end_controls_section();

        //styling starts here
        
        //Subtitle Style
        $this->start_controls_section(
            'restho_about_style_sub_title_section',
            [
                'label' => esc_html__('Heading Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_about_style_sub_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title3 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_about_style_sub_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title span svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .section-title3 span svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title span, .section-title3 span',
            ]
        );
        $this->add_responsive_control(
            'restho_about_style_sub_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .section-title3 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //Main Title Style
        $this->start_controls_section(
            'restho_about_style_main_title_section',
            [
                'label' => esc_html__('Heading Main Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'restho_about_style_main_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_main_title_typography',
                'selector' => '{{WRAPPER}} .section-title h2, .section-title3 h2',

            ]
        );
        $this->add_responsive_control(
            'restho_about_style_main_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title h2, .section-title3 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //Description Style
        $this->start_controls_section(
            'restho_about_style_description_section',
            [
                'label' => esc_html__('Heading Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_about_style_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-introduction-area .our-mission .description p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .h2-about-area .about-right .section-title p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .introduction-area .introduction-content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-introduction-area .our-mission .description p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_description_typography',
                'selector' => '{{WRAPPER}} .home1-introduction-area .our-mission .description p, 
                .h2-about-area .about-right .section-title p,
                .introduction-area .introduction-content p,
                .about-introduction-area .our-mission .description p',

            ]
        );
        $this->add_responsive_control(
            'restho_about_style_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-introduction-area .our-mission .description p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .h2-about-area .about-right .section-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .introduction-area .introduction-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-introduction-area .our-mission .description p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

        $this->end_controls_section();

        //mission Style
        $this->start_controls_section(
            'restho_about_style_mission_section',
            [
                'label' => esc_html__('Mission', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_about_content_style_selection' => ['style_one', 'style_four'],
                ],

            ]
        );
        $this->add_control(
            'restho_about_style_mission_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-introduction-area .our-mission .icon h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-introduction-area .our-mission .icon h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_about_style_mission_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-introduction-area .our-mission .icon svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .about-introduction-area .our-mission .icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_mission_typography',
                'selector' => '{{WRAPPER}} .home1-introduction-area .our-mission .icon h4, 
                .about-introduction-area .our-mission .icon h4,',
            ]
        );
        $this->add_responsive_control(
            'restho_about_style_mission_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-introduction-area .our-mission .icon h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-introduction-area .our-mission .icon h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        //Feature Title  Style
        $this->start_controls_section(
            'restho_about_style_feature_title_section',
            [
                'label' => esc_html__('Feature Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                

            ]
        );
        $this->add_control(
            'restho_about_style_feature_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .intro-features ul li' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .features-content h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .introduction-area .introduction-content .about-features ul li' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-introduction-area .intro-right .features-author .intro-features ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_about_style_feature_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .intro-features ul li i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .introduction-area .introduction-content .about-features ul li i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-introduction-area .intro-right .features-author .intro-features ul li i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .features-img svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .features-img' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_feature_title_typography',
                'selector' => '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .intro-features ul li, 
                .h2-about-area .about-right .about-featurs ul li .features-content h4,
                .introduction-area .introduction-content .about-features ul li,
                .about-introduction-area .intro-right .features-author .intro-features ul li',
            ]
        );
        $this->add_responsive_control(
            'restho_about_style_feature_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .intro-features ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .features-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .introduction-area .introduction-content .about-features ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-introduction-area .intro-right .features-author .intro-features ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

         //Feature Description Style
         $this->start_controls_section(
            'restho_about_style_feature_description_section',
            [
                'label' => esc_html__('Feature Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_about_content_style_selection' => ['style_two',],
                ],

            ]
        );
        $this->add_control(
            'restho_about_style_feature_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .features-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_feature_description_typography',
                'selector' => '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .features-content p',
            ]
        );
        $this->add_responsive_control(
            'restho_about_style_feature_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .features-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

         //author Description Style
         $this->start_controls_section(
            'restho_about_style_author_description_section',
            [
                'label' => esc_html__('Author Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_about_content_style_selection' => ['style_one','style_four'],
                ],

            ]
        );
        $this->add_control(
            'restho_about_style_author_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .authors-content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-introduction-area .intro-right .features-author .author-area .author-content P' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_author_description_typography',
                'selector' => '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .authors-content p,
                .about-introduction-area .intro-right .features-author .author-area .author-content P',
            ]
        );
        $this->add_responsive_control(
            'restho_about_style_author_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-about-area .about-right .about-featurs ul li .authors-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-introduction-area .intro-right .features-author .author-area .author-content P' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();
         //author name Style
         $this->start_controls_section(
            'restho_about_style_author_name_section',
            [
                'label' => esc_html__('Author Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_about_content_style_selection' => ['style_one','style_four'],
                ],

            ]
        );
        $this->add_control(
            'restho_about_style_author_name_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .author-area .author-img-name .author-name h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-introduction-area .intro-right .features-author .author-area .author-img-name .author-name h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_author_name_typography',
                'selector' => '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .author-area .author-img-name .author-name h4,
                .about-introduction-area .intro-right .features-author .author-area .author-img-name .author-name h4',
            ]
        );
        $this->add_responsive_control(
            'restho_about_style_author_name_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .author-area .author-img-name .author-name h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-introduction-area .intro-right .features-author .author-area .author-img-name .author-name h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();
         //author designation Style
         $this->start_controls_section(
            'restho_about_style_author_designation_section',
            [
                'label' => esc_html__('Author Designation', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_about_content_style_selection' => ['style_one','style_four'],
                ],

            ]
        );
        $this->add_control(
            'restho_about_style_author_designation_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .author-area .author-img-name .author-name span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-introduction-area .intro-right .features-author .author-area .author-img-name .author-name span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_author_designation_typography',
                'selector' => '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .author-area .author-img-name .author-name span,
                        .about-introduction-area .intro-right .features-author .author-area .author-img-name .author-name span',
            ]
        );
        
       
        $this->add_responsive_control(
            'restho_about_style_author_designation_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-introduction-area .intro-right .features-author .author-area .author-img-name .author-name span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-introduction-area .intro-right .features-author .author-area .author-img-name .author-name span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        //about Button Style
        $this->start_controls_section(
            'restho_about_button_style_section',
            [
                'label' => esc_html__('Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_about_content_style_selection' => ['style_two','style_three'],
                ],
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
            'restho_about_button_style_text_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn7' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_about_button_style_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn7' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_button_style_typography',
                'selector' => '{{WRAPPER}} .primary-btn5,.primary-btn7',

            ]
        );
        $this->add_control(
            'restho_about_button_style_text_background',
            [
                'label'     => esc_html__('Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .primary-btn7' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_about_button_style_border_radius',
            [
                'restho_about_button_style_border_radius',
                'label'              => __('Border Radius', 'restho-core'),
                'type'               => Controls_Manager::DIMENSIONS,
                'size_units'         => ['px', '%'],
                'selectors'          => [
                    '{{WRAPPER}} .primary-btn5' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .primary-btn7' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );

        $this->add_control(
            'restho_about_button_style_padding',
            [
                'label' => esc_html__('Padding', 'restho-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
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
            'restho_about_button_style_hover_color',
            [
                'label' => esc_html__('Color', 'restho-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .primary-btn7:hover' => 'color: {{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            'restho_about_button_style_hover_background',
            [
                'label' => esc_html__('Background', 'restho-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
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
        $data = $settings['restho_about_one_content_list'];
        $data2 = $settings['restho_about_two_content_list'];
        $data3 = $settings['restho_about_three_content_achivement_list'];
?>
        <?php if ($settings['restho_about_content_style_selection'] == 'style_one') : ?>
            <div class="home1-introduction-area">
                <div class="container-lg container-fluid">
                    <div class="row mb-40">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <span>
                                    <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                        <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                            <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                        </svg>
                                    <?php endif ?>
                                    <?php echo esc_html__($settings['restho_about_two_content_sub_title'], 'restho') ?>
                                    <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                        <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                            <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                        </svg>
                                    <?php endif ?>
                                </span>
                                <?php if (!empty($settings['restho_about_two_content_main_title'])) : ?>
                                    <h2><?php echo esc_html__($settings['restho_about_two_content_main_title'], 'restho') ?></h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row gy-5">
                        <div class="col-lg-4">
                            <div class="into-left-img magnetic-wrap">
                                <?php if (!empty($settings['restho_about_content_left_image']['url'])) : ?>
                                    <img class="img-fluid magnetic-item" src="<?php echo esc_url($settings['restho_about_content_left_image']['url']) ?>" alt="<?php echo esc_attr__('h1-intro-left-img', 'restho') ?>">
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="our-mission">
                                <div class="icon">
                                    <?php if ($settings['restho_about_content_mission_icon_switcher'] == 'yes') : ?>
                                        <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.6311 6.57086C22.8747 6.57086 23.1095 6.47444 23.2827 6.30155L25.8353 3.75442C26.1764 3.41406 25.9543 2.82993 25.4737 2.79983L24.1153 2.71475L25.0017 1.83029C25.1505 1.68188 25.1505 1.44124 25.0017 1.29288C24.8529 1.14446 24.6118 1.14446 24.4631 1.29288L23.5767 2.17734L23.4914 0.82189C23.4612 0.341479 22.8753 0.121364 22.5348 0.461062L19.9821 3.00819C19.7951 3.19471 19.6975 3.45267 19.714 3.71591L19.8018 5.11078C17.6713 3.29818 14.9255 2.25872 12.0169 2.25872C5.37523 2.25872 0 7.62163 0 14.2495C0 17.2406 1.11007 20.1055 3.12583 22.3163C3.26746 22.4715 3.50831 22.4829 3.66386 22.3416C3.81945 22.2004 3.83083 21.96 3.6893 21.8048C1.80141 19.7343 0.761717 17.0511 0.761717 14.2495C0.761717 8.05684 5.81078 3.01873 12.0169 3.01873C14.9252 3.01873 17.6619 4.13096 19.709 6.03664L17.9711 7.77065C16.3995 6.33114 14.307 5.45022 12.0169 5.45022C7.15445 5.45022 3.19855 9.39754 3.19855 14.2494C3.19855 15.6458 3.53614 17.0367 4.17497 18.2717C4.17502 18.2718 4.17502 18.2719 4.17507 18.2719C5.65529 21.1338 8.63639 23.0487 12.0169 23.0487C16.1825 23.0487 19.8053 20.1128 20.6521 16.0385C20.6948 15.833 20.5624 15.6318 20.3565 15.5892C20.1506 15.5466 19.949 15.6787 19.9062 15.8842C19.135 19.5951 15.8171 22.2886 12.017 22.2886C8.98998 22.2886 6.24445 20.6159 4.85198 17.9233C4.85198 17.9233 4.85193 17.9232 4.85193 17.9232C4.26033 16.7793 3.96032 15.5433 3.96032 14.2494C3.96032 9.81664 7.57451 6.21029 12.0169 6.21029C14.0974 6.21029 15.9996 7.00592 17.4327 8.30791L15.7104 10.0265C14.7219 9.16471 13.4296 8.64179 12.0169 8.64179C8.91818 8.64179 6.39715 11.1573 6.39715 14.2494C6.39715 17.3414 8.91818 19.857 12.0169 19.857C15.1157 19.857 17.6368 17.3414 17.6368 14.2494C17.6368 12.8398 17.1127 11.5502 16.249 10.564L17.9714 8.84528C19.2661 10.2638 20.0616 12.1435 20.0734 14.2026C20.0746 14.4117 20.2449 14.5805 20.4542 14.5805H20.4565C20.6668 14.5793 20.8363 14.4081 20.8351 14.1983C20.8221 11.9315 19.9415 9.86346 18.5101 8.30776L20.248 6.5736C22.1496 8.60241 23.2721 11.317 23.2721 14.2493C23.272 20.4421 18.223 25.4802 12.0169 25.4802C9.4459 25.4802 6.93193 24.5928 4.93811 22.9814C4.77454 22.8494 4.5349 22.8744 4.40242 23.0375C4.27003 23.2006 4.29522 23.4399 4.45863 23.572C6.58768 25.2927 9.27192 26.2403 12.0169 26.2403C18.6586 26.2403 24.0338 20.8774 24.0338 14.2495C24.0338 11.6545 23.2165 9.18472 21.6704 7.10732C21.5104 6.89222 21.3437 6.68371 21.1714 6.48118C22.6644 6.57477 22.5839 6.57086 22.6311 6.57086ZM16.875 14.2495C16.875 16.9224 14.6957 19.097 12.0169 19.097C9.33814 19.097 7.15882 16.9224 7.15882 14.2495C7.15882 11.5765 9.33814 9.40195 12.0169 9.40195C13.2195 9.40195 14.3212 9.84041 15.1705 10.5653L13.4373 12.2947C13.038 12.005 12.5472 11.8334 12.0169 11.8334C10.6818 11.8334 9.5956 12.9173 9.5956 14.2495C9.5956 15.5817 10.6818 16.6655 12.0169 16.6655C13.352 16.6655 14.4382 15.5817 14.4382 14.2495C14.4382 13.7202 14.2663 13.2305 13.976 12.8321L15.7092 11.1027C16.4356 11.9501 16.875 13.0495 16.875 14.2495ZM11.7475 14.5182C11.8963 14.6667 12.1374 14.6667 12.2862 14.5182L13.4278 13.3791C13.5853 13.6322 13.6765 13.9304 13.6765 14.2495C13.6765 15.1627 12.932 15.9055 12.0168 15.9055C11.1017 15.9055 10.3573 15.1626 10.3573 14.2495C10.3573 13.3364 11.1017 12.5936 12.0168 12.5936C12.3367 12.5936 12.6356 12.6846 12.8892 12.8416L11.7475 13.9808C11.5988 14.1292 11.5988 14.3698 11.7475 14.5182ZM20.4743 3.66828C20.4714 3.62263 20.4883 3.57788 20.5207 3.54561L22.7591 1.31218L22.8586 2.89393L20.5692 5.17827L20.4743 3.66828ZM21.1079 5.71569L23.3972 3.43134L24.9824 3.53061L22.744 5.76408C22.7117 5.79641 22.6665 5.81359 22.6211 5.81044L21.1079 5.71569Z" fill="#BF9444" />
                                        </svg>
                                    <?php endif ?>
                                    <h4><?php echo esc_html__($settings['restho_about_content_mission_title'], 'restho') ?></h4>
                                </div>
                                <div class="description">
                                    <?php if (!empty($settings['restho_about_two_content_description'])) : ?>
                                        <p><?php echo wp_kses($settings['restho_about_two_content_description'], wp_kses_allowed_html('post')) ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="intro-right">
                                <div class="features-author">
                                    <div class="intro-features">
                                        <ul>
                                            <?php foreach ($data as $key => $item) {
                                                if (!empty($item['restho_about_content_feature_title'])) {
                                                    echo ($key == 3) ? '</ul><ul> <li><i class="bi bi-check-circle"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>' :
                                                        '<li><i class="bi bi-check-circle"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>';
                                                }
                                                $key++;
                                            } ?>
                                        </ul>
                                    </div>
                                    <div class="author-area">
                                        <div class="author-content">
                                            <?php if (!empty($settings['restho_about_content_author_testimony'])) : ?>
                                                <p><?php echo wp_kses($settings['restho_about_content_author_testimony'], wp_kses_allowed_html('post')) ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="author-img-name">
                                            <div class="author-img">
                                                <?php if (!empty($settings['restho_about_content_author_avatar']['url'])) : ?>
                                                    <img src="<?php echo esc_url($settings['restho_about_content_author_avatar']['url']) ?>" alt="<?php echo esc_attr__('author-img', 'restho') ?>">
                                                <?php endif ?>
                                            </div>
                                            <div class="author-name">
                                                <?php if (!empty($settings['restho_about_content_author_name'])) : ?>
                                                    <h4><?php echo esc_html__($settings['restho_about_content_author_name'], 'restho') ?></h4>
                                                <?php endif ?>
                                                <?php if (!empty($settings['restho_about_content_author_designation'])) : ?>
                                                    <span><?php echo esc_html__($settings['restho_about_content_author_designation'], 'restho') ?></span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="intro-right-img magnetic-wrap">
                                    <?php if (!empty($settings['restho_about_content_right_image']['url'])) : ?>
                                        <img class="img-fluid magnetic-item" src="<?php echo esc_url($settings['restho_about_content_right_image']['url']) ?>" alt="<?php echo esc_attr__('h1-intro-right-img', 'restho') ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['restho_about_content_style_selection'] == 'style_two') : ?>
            <div class="h2-about-area">
                <div class="about-left">
                    <?php if (!empty($settings['restho_about_two_content_image_one']['url'])) : ?>
                        <img class="img-fluid h2-about-img1" src="<?php echo esc_url($settings['restho_about_two_content_image_one']['url']) ?>" alt="<?php echo esc_attr__('h2-about-img1', 'restho') ?>">
                    <?php endif ?>
                    <?php if (!empty($settings['restho_about_two_content_image_three']['url'])) : ?>
                        <img class="img-fluid h2-about-img3" src="<?php echo esc_url($settings['restho_about_two_content_image_three']['url']) ?>" alt="<?php echo esc_attr__('h2-about-img3', 'restho') ?>">
                    <?php endif ?>
                    <?php if (!empty($settings['restho_about_two_content_image_two']['url'])) : ?>
                        <img class="img-fluid h2-about-img2" src="<?php echo esc_url($settings['restho_about_two_content_image_two']['url']) ?>" alt="<?php echo esc_attr__('h2-about-img2', 'restho') ?>">
                    <?php endif ?>
                    <?php if (!empty($settings['restho_about_two_content_image_four']['url'])) : ?>
                        <img class="img-fluid h2-about-img4" src="<?php echo esc_url($settings['restho_about_two_content_image_four']['url']) ?>" alt="<?php echo esc_attr__('h2-about-img4', 'restho') ?>">
                    <?php endif ?>
                </div>
                <div class="about-right">
                    <div class="section-title">
                        <span>
                            <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                    <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                </svg>
                            <?php endif ?>
                            <?php echo esc_html__($settings['restho_about_two_content_sub_title'], 'restho') ?>
                            <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                    <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                </svg>
                            <?php endif ?>
                        </span>
                        <?php if (!empty($settings['restho_about_two_content_main_title'])) : ?>
                            <h2><?php echo esc_html__($settings['restho_about_two_content_main_title'], 'restho') ?></h2>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_about_two_content_description'])) : ?>
                            <p><?php echo wp_kses($settings['restho_about_two_content_description'], wp_kses_allowed_html('post')) ?></p>
                        <?php endif ?>
                    </div>
                    <div class="about-featurs">
                        <ul>
                            <?php foreach ($data2 as $item) : ?>
                                <li>
                                    <div class="features-img">
                                        <?php if (!empty($item['restho_about_two_content_feature_icon'])) : ?>
                                            <?php \Elementor\Icons_Manager::render_icon($item['restho_about_two_content_feature_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="features-content">
                                        <?php if (!empty($item['restho_about_two_content_feature_title'])) : ?>
                                            <h4><?php echo esc_html__($item['restho_about_two_content_feature_title'], 'restho') ?></h4>
                                        <?php endif ?>
                                        <?php if (!empty($item['restho_about_two_content_feature_description'])) : ?>
                                            <p><?php echo wp_kses($item['restho_about_two_content_feature_description'], wp_kses_allowed_html('post')) ?></p>
                                        <?php endif ?>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php if (!empty($settings['restho_about_two_button_content_button_text'])) : ?>
                        <a class="primary-btn5 btn-md2" href="<?php echo esc_url($settings['restho_about_two_button_content_button_url']['url']) ?>"><i class="bi bi-arrow-up-right-circle"></i>
                            <?php echo esc_html__($settings['restho_about_two_button_content_button_text'], 'restho') ?>
                        </a>
                    <?php endif ?>
                </div>
            </div>

        <?php endif ?>

        <?php if ($settings['restho_about_content_style_selection'] == 'style_three') : ?>
            <div class="introduction-area">
                <div class="container">
                    <div class="row align-items-end gy-5">
                        <div class="col-lg-7">
                            <div class="section-title3">
                                <span>
                                    <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                        <img class="left-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h3-sub-title-vec.svg" alt="<?php echo esc_attr__('h3-sub-title-vec', 'restho') ?>">
                                    <?php endif; ?>
                                    <?php echo esc_html__($settings['restho_about_two_content_sub_title'], 'restho') ?>
                                    <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                        <svg width="28" height="9" viewBox="0 0 28 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.21551 6.42846C7.21551 6.42846 7.18808 6.45129 7.13463 6.49528C7.08118 6.53927 7.00436 6.6067 6.89279 6.68372C6.67292 6.84019 6.33789 7.06166 5.85747 7.25086C5.61703 7.34264 5.34293 7.43093 5.03362 7.49394C4.7243 7.5562 4.37992 7.58649 4.00983 7.57462C3.64223 7.56289 3.23802 7.50064 2.84534 7.37841C2.42632 7.24736 2.03722 7.03852 1.65731 6.76454C1.28208 6.48889 0.93583 6.13819 0.649887 5.7196C0.505591 5.51077 0.386383 5.28017 0.280577 5.0383C0.234608 4.91455 0.182561 4.79141 0.147812 4.66112L0.11914 4.56401L0.111972 4.53965L0.108388 4.52748C0.111193 4.54407 0.100596 4.49156 0.100752 4.49262L0.0917141 4.44863L0.0552506 4.27176C-0.0516468 3.71223 -0.00147044 3.12378 0.188794 2.56653C0.277772 2.28493 0.417549 2.01871 0.57696 1.76224C0.666716 1.64092 0.745876 1.50956 0.850436 1.39738L1.00159 1.22341L1.16848 1.06206C1.61633 0.630995 2.19678 0.318808 2.82539 0.149548L2.88414 0.132652L2.89878 0.12839L2.93805 0.120323L2.96361 0.1153L3.06567 0.0952078L3.27043 0.0548715C3.43047 0.0347795 3.6106 0.0122521 3.77297 0.00372817C4.09242 -0.00677448 4.41483 0.00357596 4.72757 0.0519795C5.35571 0.140719 5.95783 0.323374 6.51569 0.565544C7.07589 0.805126 7.60305 1.08931 8.10949 1.38582C8.36177 1.53681 8.60611 1.68674 8.8534 1.84413C9.09353 1.99619 9.33413 2.14931 9.57691 2.30944C10.0618 2.62376 10.5278 2.94691 10.9921 3.2667C11.4563 3.58604 11.9114 3.90584 12.3598 4.22184C12.8092 4.53341 13.253 4.84119 13.6897 5.14378C14.5645 5.74213 15.4186 6.29984 16.2524 6.7857C16.4596 6.9096 16.6663 7.02711 16.872 7.13898C17.0747 7.2533 17.2843 7.3635 17.4819 7.46959C17.8795 7.68101 18.2605 7.85925 18.6378 7.96945C18.8262 8.02501 19.0132 8.06413 19.198 8.08605C19.2443 8.09046 19.2904 8.09503 19.3362 8.09944C19.3826 8.10081 19.4289 8.10218 19.4749 8.10355C19.5252 8.10507 19.5752 8.1066 19.6251 8.10812C19.6734 8.10919 19.7135 8.10523 19.7577 8.10416C20.1055 8.09488 20.4608 8.03171 20.7676 7.92988C21.0774 7.82561 21.3478 7.67949 21.5839 7.52256C21.8218 7.36517 22.0026 7.17491 22.1592 6.99621C22.4501 6.62207 22.5972 6.26102 22.6569 6.0082C22.6961 5.88308 22.703 5.78216 22.7191 5.7158C22.7315 5.64852 22.7379 5.61382 22.7379 5.61382C22.7379 5.61382 22.7379 5.64898 22.7381 5.71702C22.7339 5.78475 22.7476 5.88841 22.7279 6.02038C22.7195 6.08689 22.71 6.16132 22.6997 6.24306C22.684 6.32404 22.6595 6.41126 22.6365 6.50715C22.6147 6.60365 22.569 6.69985 22.5307 6.80762C22.4878 6.91325 22.4247 7.01782 22.3652 7.13289C22.2245 7.34858 22.0531 7.58603 21.8137 7.79669C21.5781 8.01009 21.2865 8.20371 20.9492 8.36292C20.6071 8.51848 20.2319 8.63356 19.7978 8.69368C19.7443 8.70068 19.6862 8.71073 19.6352 8.71514C19.5855 8.71819 19.5355 8.72138 19.4853 8.72443C19.4306 8.72732 19.3756 8.73036 19.3202 8.73326C19.2642 8.7328 19.2078 8.73219 19.1512 8.73173C18.9247 8.72473 18.6937 8.69703 18.464 8.6506C18.0036 8.55852 17.5535 8.39123 17.1166 8.20584C16.8963 8.11345 16.6839 8.01618 16.4623 7.91192C16.2407 7.81054 16.018 7.70369 15.7952 7.5906C14.9003 7.14279 13.9887 6.61811 13.0735 6.04564C12.1566 5.47469 11.2323 4.86143 10.3007 4.24147C9.83527 3.93218 9.36171 3.62425 8.89283 3.32059C8.66049 3.16944 8.41958 3.01799 8.17712 2.86669C7.94275 2.7192 7.69888 2.57292 7.46109 2.43106C6.51086 1.86772 5.53086 1.37836 4.5465 1.2228C4.30123 1.1785 4.05798 1.17013 3.8177 1.16983C3.70036 1.17302 3.60234 1.18231 3.48532 1.18931L3.27931 1.2231L3.17662 1.24L3.15091 1.24426C3.15855 1.24258 3.11585 1.25096 3.16478 1.24091L3.1545 1.24365L3.1132 1.25461C2.67143 1.36055 2.25366 1.56314 1.91832 1.85676C1.23299 2.42786 0.886277 3.32972 0.981175 4.12214L1.00486 4.30099L1.01078 4.34543C1.01218 4.35441 1.0033 4.30844 1.00813 4.33234L1.01031 4.34178L1.01452 4.36081L1.03151 4.43706C1.0499 4.53905 1.08496 4.63692 1.11254 4.73601C1.18204 4.93023 1.26338 5.11897 1.36264 5.29706C1.56132 5.65248 1.81937 5.96771 2.11108 6.22404C2.4006 6.47899 2.73189 6.68539 3.04822 6.82527C3.39057 6.97459 3.72233 7.06273 4.05159 7.11082C4.70778 7.20459 5.30569 7.1367 5.78065 7.02087C6.2553 6.8994 6.61807 6.74597 6.8543 6.62481C6.97382 6.56651 7.06373 6.51461 7.12388 6.48021C7.18434 6.44611 7.21551 6.42846 7.21551 6.42846Z" fill="#BF9444" />
                                            <path d="M20.7841 2.57169C20.7841 2.57169 20.8115 2.54886 20.8648 2.50487C20.9184 2.46088 20.9951 2.39345 21.1067 2.31643C21.3265 2.15996 21.6616 1.93849 22.142 1.74929C22.3824 1.6575 22.6565 1.56937 22.9658 1.5062C23.2751 1.44395 23.6195 1.41366 23.9898 1.42553C24.3574 1.43725 24.7616 1.49951 25.1543 1.62173C25.5733 1.75279 25.9624 1.96162 26.3423 2.23561C26.7175 2.51126 27.0638 2.86196 27.3497 3.28054C27.494 3.48938 27.6134 3.71998 27.7192 3.96184C27.7652 4.08559 27.8172 4.20873 27.8519 4.33903L27.8808 4.43614L27.8879 4.46049L27.8915 4.47267C27.8887 4.45608 27.8993 4.50859 27.8992 4.50753L27.9082 4.55152L27.9447 4.72839C28.0516 5.28792 28.0014 5.87637 27.8111 6.43362C27.7221 6.71521 27.5824 6.98143 27.423 7.23791C27.333 7.35922 27.2539 7.49058 27.1493 7.60276L26.9982 7.77674L26.8313 7.93809C26.3834 8.36915 25.8028 8.68134 25.1744 8.8506L25.1156 8.86749L25.101 8.87176L25.0617 8.87967L25.0362 8.88469L24.9341 8.90479L24.7293 8.94512C24.5693 8.96521 24.3892 8.98774 24.2268 8.99627C23.9073 9.00677 23.5849 8.99642 23.2722 8.94817C22.644 8.85943 22.0419 8.67662 21.4841 8.4346C20.9239 8.19502 20.3967 7.91084 19.8903 7.61433C19.638 7.46318 19.3937 7.31341 19.1464 7.15602C18.9062 7.00396 18.6656 6.85068 18.4228 6.69071C17.9379 6.37639 17.472 6.05324 17.0076 5.73344C16.5434 5.4141 16.0884 5.0943 15.6398 4.77831C15.1904 4.46673 14.7466 4.15896 14.3099 3.85636C13.4351 3.25802 12.581 2.70031 11.7472 2.2146C11.54 2.0907 11.3333 1.97319 11.1276 1.86132C10.9249 1.747 10.7153 1.6368 10.5177 1.53071C10.1201 1.31929 9.73907 1.14105 9.36181 1.03085C9.17342 0.975288 8.98642 0.936169 8.80161 0.914251C8.75533 0.909836 8.70921 0.90527 8.66339 0.900856C8.61696 0.899486 8.57068 0.898116 8.52471 0.896746C8.47438 0.895224 8.4242 0.893702 8.37449 0.89218C8.32618 0.891114 8.28614 0.895072 8.24188 0.896137C7.89408 0.905422 7.53879 0.96859 7.23197 1.07042C6.92218 1.17469 6.65182 1.32081 6.41559 1.47774C6.17764 1.63513 5.99688 1.82539 5.84027 2.00409C5.54919 2.37823 5.40224 2.73928 5.34256 2.99195C5.30329 3.11707 5.29644 3.21798 5.28039 3.2845C5.26792 3.35178 5.26153 3.38648 5.26153 3.38648C5.26153 3.38648 5.26153 3.35132 5.26153 3.28328C5.26574 3.21555 5.25203 3.11189 5.27166 2.97992C5.28008 2.91341 5.28958 2.83897 5.29987 2.75724C5.31561 2.67626 5.34007 2.58904 5.36313 2.49315C5.38495 2.39665 5.43061 2.30045 5.46894 2.19268C5.51195 2.08705 5.5749 1.98248 5.63443 1.8674C5.77514 1.65172 5.94655 1.41442 6.1859 1.20361C6.42151 0.990205 6.71306 0.796591 7.05043 0.637377C7.39247 0.481816 7.7677 0.366743 8.20183 0.306619C8.25528 0.299617 8.31341 0.289571 8.36436 0.285157C8.41407 0.282113 8.46409 0.278917 8.51427 0.275872C8.56896 0.27298 8.62397 0.269936 8.67945 0.267044C8.73539 0.267501 8.7918 0.26811 8.84836 0.268566C9.07493 0.275568 9.30587 0.303271 9.53556 0.349695C9.99603 0.441632 10.4461 0.608913 10.883 0.794155C11.1032 0.886548 11.3156 0.983964 11.5373 1.08808C11.7589 1.18945 11.9816 1.2963 12.2044 1.4094C13.0993 1.85721 14.0109 2.38188 14.9261 2.95435C15.843 3.5253 16.7673 4.13856 17.6989 4.75852C18.1643 5.06782 18.6379 5.37574 19.1068 5.67941C19.3393 5.83071 19.58 5.98185 19.8225 6.1333C20.0569 6.2808 20.3007 6.42707 20.5385 6.56894C21.4887 7.13227 22.4687 7.62164 23.4531 7.7772C23.6984 7.82149 23.9416 7.82986 24.1819 7.83017C24.2992 7.82697 24.3973 7.81769 24.5143 7.81068L24.7203 7.77689L24.823 7.76L24.8487 7.75574C24.8411 7.75741 24.8838 7.74904 24.8348 7.75893L24.8451 7.75619L24.8864 7.74523C25.3282 7.63929 25.7459 7.4367 26.0813 7.14308C26.7666 6.57198 27.1133 5.67012 27.0184 4.87771L26.9947 4.69886L26.9888 4.65441C26.9874 4.64543 26.9963 4.6914 26.9915 4.6675L26.9893 4.65806L26.9851 4.63904L26.9683 4.56324C26.9499 4.46125 26.9148 4.36338 26.8872 4.26429C26.8177 4.07022 26.7362 3.88148 26.6371 3.70324C26.4384 3.34782 26.1804 3.03259 25.8887 2.77626C25.5992 2.52131 25.2679 2.31491 24.9515 2.17502C24.6092 2.0257 24.2774 1.93757 23.9482 1.88947C23.292 1.79571 22.6941 1.8636 22.2191 1.97943C21.7445 2.1009 21.3817 2.25433 21.1455 2.37549C21.0259 2.43394 20.936 2.48569 20.8759 2.52009C20.8153 2.55403 20.7841 2.57169 20.7841 2.57169Z" fill="#BF9444" />
                                        </svg>
                                    <?php endif ?>
                                </span>
                                <?php if (!empty($settings['restho_about_two_content_main_title'])) : ?>
                                    <h2><?php echo esc_html__($settings['restho_about_two_content_main_title'], 'restho') ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="introduction-content">
                                <?php if (!empty($settings['restho_about_two_content_description'])) : ?>
                                    <p><?php echo wp_kses($settings['restho_about_two_content_description'], wp_kses_allowed_html('post')) ?></p>
                                <?php endif ?>
                                <div class="about-features">
                                    <ul>
                                        <?php foreach ($data as $key => $item) {
                                            if (!empty($item['restho_about_content_feature_title'])) {
                                                echo ($key == 3) ? '</ul><ul> <li><i class="bi bi-chevron-double-right"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>' :
                                                    '<li><i class="bi bi-chevron-double-right"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>';
                                            }
                                            $key++;
                                        } ?>

                                    </ul>
                                </div>
                                <div class="achievement">
                                    <?php if (!empty($settings['restho_about_three_achivement_heading_title'])) : ?>
                                        <h5><?php echo esc_html__($settings['restho_about_three_achivement_heading_title'], 'restho') ?></h5>
                                    <?php endif ?>
                                    <ul>
                                        <?php foreach ($data3 as $item) : ?>
                                            <li>
                                                <?php \Elementor\Icons_Manager::render_icon($item['restho_about_three_achivement_award_icon'], ['aria-hidden' => 'true']); ?>
                                                <div class="award-name">
                                                    <?php if (!empty($item['restho_about_three_achivement_award_title'])) : ?>
                                                        <a href="<?php echo esc_url($item['restho_about_three_achivement_award_link']['url']) ?>"><?php echo esc_html__($item['restho_about_three_achivement_award_title'], 'restho') ?></a>
                                                    <?php endif ?>
                                                </div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <div class="discover-btn">
                                    <?php if (!empty($settings['restho_about_two_button_content_button_text'])) : ?>
                                        <a class="primary-btn7 btn-md2" href="<?php echo esc_url($settings['restho_about_two_button_content_button_url']['url']) ?>"><i class="bi bi-arrow-up-right-circle"></i>
                                            <?php echo esc_html__($settings['restho_about_two_button_content_button_text'], 'restho') ?>
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="h3-into-img-big">
                                <?php if (!empty($settings['restho_about_three_content_image_big']['url'])) : ?>
                                    <img class="img-fluid" src="<?php echo esc_url($settings['restho_about_three_content_image_big']['url']) ?>" alt="<?php echo esc_attr__('h3-intro-big', 'restho') ?>">
                                <?php endif ?>
                                <div class="h3-into-img-sm magnetic-wrap">
                                    <?php if (!empty($settings['restho_about_three_content_image_small'])) : ?>
                                        <img class="img-fluid magnetic-item" src="<?php echo esc_url($settings['restho_about_three_content_image_small']['url']) ?>" alt="<?php echo esc_attr__('h3-intro-sm', 'restho') ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['restho_about_content_style_selection'] == 'style_four') : ?>
            <div class="about-introduction-area">
                <div class="container-fluid">
                    <div class="row gy-5 margin-left">
                        <div class="col-lg-12">
                            <div class="intro-right-img1">
                                <?php if (!empty($settings['restho_about_content_left_image']['url'])) : ?>
                                    <img class="img-fluid" src="<?php echo esc_url($settings['restho_about_content_left_image']['url']) ?>" alt="<?php echo esc_attr__('h1-intro-left-img', 'restho') ?>">
                                <?php endif ?>
                                <div class="intro-sm-img magnetic-wrap">
                                    <?php if (!empty($settings['restho_about_content_right_image']['url'])) : ?>
                                        <img class="img-fluid magnetic-item" src="<?php echo esc_url($settings['restho_about_content_right_image']['url']) ?>" alt="<?php echo esc_attr__('h1-intro-right-img', 'restho') ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="about-left">
                                <div class="section-title mb-40">
                                    <span>
                                        <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                            <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                                <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                            </svg>
                                        <?php endif ?>
                                        <?php echo esc_html__($settings['restho_about_two_content_sub_title'], 'restho') ?>
                                        <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                            <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 6.3156 0.199193)" stroke="#BF9444" />
                                                <rect y="0.725405" width="7.45" height="7.45" transform="matrix(0.688322 0.725405 -0.688322 0.725405 11.146 0.199193)" stroke="#BF9444" />
                                            </svg>
                                        <?php endif ?>
                                    </span>
                                    <?php if (!empty($settings['restho_about_two_content_main_title'])) : ?>
                                        <h2><?php echo esc_html__($settings['restho_about_two_content_main_title'], 'restho') ?></h2>
                                    <?php endif ?>
                                </div>
                                <div class="our-mission">
                                    <div class="icon">
                                        <?php if ($settings['restho_about_content_mission_icon_switcher'] == 'yes') : ?>
                                            <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.6311 6.57086C22.8747 6.57086 23.1095 6.47444 23.2827 6.30155L25.8353 3.75442C26.1764 3.41406 25.9543 2.82993 25.4737 2.79983L24.1153 2.71475L25.0017 1.83029C25.1505 1.68188 25.1505 1.44124 25.0017 1.29288C24.8529 1.14446 24.6118 1.14446 24.4631 1.29288L23.5767 2.17734L23.4914 0.82189C23.4612 0.341479 22.8753 0.121364 22.5348 0.461062L19.9821 3.00819C19.7951 3.19471 19.6975 3.45267 19.714 3.71591L19.8018 5.11078C17.6713 3.29818 14.9255 2.25872 12.0169 2.25872C5.37523 2.25872 0 7.62163 0 14.2495C0 17.2406 1.11007 20.1055 3.12583 22.3163C3.26746 22.4715 3.50831 22.4829 3.66386 22.3416C3.81945 22.2004 3.83083 21.96 3.6893 21.8048C1.80141 19.7343 0.761717 17.0511 0.761717 14.2495C0.761717 8.05684 5.81078 3.01873 12.0169 3.01873C14.9252 3.01873 17.6619 4.13096 19.709 6.03664L17.9711 7.77065C16.3995 6.33114 14.307 5.45022 12.0169 5.45022C7.15445 5.45022 3.19855 9.39754 3.19855 14.2494C3.19855 15.6458 3.53614 17.0367 4.17497 18.2717C4.17502 18.2718 4.17502 18.2719 4.17507 18.2719C5.65529 21.1338 8.63639 23.0487 12.0169 23.0487C16.1825 23.0487 19.8053 20.1128 20.6521 16.0385C20.6948 15.833 20.5624 15.6318 20.3565 15.5892C20.1506 15.5466 19.949 15.6787 19.9062 15.8842C19.135 19.5951 15.8171 22.2886 12.017 22.2886C8.98998 22.2886 6.24445 20.6159 4.85198 17.9233C4.85198 17.9233 4.85193 17.9232 4.85193 17.9232C4.26033 16.7793 3.96032 15.5433 3.96032 14.2494C3.96032 9.81664 7.57451 6.21029 12.0169 6.21029C14.0974 6.21029 15.9996 7.00592 17.4327 8.30791L15.7104 10.0265C14.7219 9.16471 13.4296 8.64179 12.0169 8.64179C8.91818 8.64179 6.39715 11.1573 6.39715 14.2494C6.39715 17.3414 8.91818 19.857 12.0169 19.857C15.1157 19.857 17.6368 17.3414 17.6368 14.2494C17.6368 12.8398 17.1127 11.5502 16.249 10.564L17.9714 8.84528C19.2661 10.2638 20.0616 12.1435 20.0734 14.2026C20.0746 14.4117 20.2449 14.5805 20.4542 14.5805H20.4565C20.6668 14.5793 20.8363 14.4081 20.8351 14.1983C20.8221 11.9315 19.9415 9.86346 18.5101 8.30776L20.248 6.5736C22.1496 8.60241 23.2721 11.317 23.2721 14.2493C23.272 20.4421 18.223 25.4802 12.0169 25.4802C9.4459 25.4802 6.93193 24.5928 4.93811 22.9814C4.77454 22.8494 4.5349 22.8744 4.40242 23.0375C4.27003 23.2006 4.29522 23.4399 4.45863 23.572C6.58768 25.2927 9.27192 26.2403 12.0169 26.2403C18.6586 26.2403 24.0338 20.8774 24.0338 14.2495C24.0338 11.6545 23.2165 9.18472 21.6704 7.10732C21.5104 6.89222 21.3437 6.68371 21.1714 6.48118C22.6644 6.57477 22.5839 6.57086 22.6311 6.57086ZM16.875 14.2495C16.875 16.9224 14.6957 19.097 12.0169 19.097C9.33814 19.097 7.15882 16.9224 7.15882 14.2495C7.15882 11.5765 9.33814 9.40195 12.0169 9.40195C13.2195 9.40195 14.3212 9.84041 15.1705 10.5653L13.4373 12.2947C13.038 12.005 12.5472 11.8334 12.0169 11.8334C10.6818 11.8334 9.5956 12.9173 9.5956 14.2495C9.5956 15.5817 10.6818 16.6655 12.0169 16.6655C13.352 16.6655 14.4382 15.5817 14.4382 14.2495C14.4382 13.7202 14.2663 13.2305 13.976 12.8321L15.7092 11.1027C16.4356 11.9501 16.875 13.0495 16.875 14.2495ZM11.7475 14.5182C11.8963 14.6667 12.1374 14.6667 12.2862 14.5182L13.4278 13.3791C13.5853 13.6322 13.6765 13.9304 13.6765 14.2495C13.6765 15.1627 12.932 15.9055 12.0168 15.9055C11.1017 15.9055 10.3573 15.1626 10.3573 14.2495C10.3573 13.3364 11.1017 12.5936 12.0168 12.5936C12.3367 12.5936 12.6356 12.6846 12.8892 12.8416L11.7475 13.9808C11.5988 14.1292 11.5988 14.3698 11.7475 14.5182ZM20.4743 3.66828C20.4714 3.62263 20.4883 3.57788 20.5207 3.54561L22.7591 1.31218L22.8586 2.89393L20.5692 5.17827L20.4743 3.66828ZM21.1079 5.71569L23.3972 3.43134L24.9824 3.53061L22.744 5.76408C22.7117 5.79641 22.6665 5.81359 22.6211 5.81044L21.1079 5.71569Z" fill="#BF9444" />
                                            </svg>
                                        <?php endif ?>
                                        <h4><?php echo esc_html__($settings['restho_about_content_mission_title'], 'restho') ?></h4>
                                    </div>
                                    <div class="description">
                                        <?php if (!empty($settings['restho_about_two_content_description'])) : ?>
                                            <p><?php echo wp_kses($settings['restho_about_two_content_description'], wp_kses_allowed_html('post')) ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="intro-right">
                                    <div class="features-author">
                                        <div class="intro-features">
                                            <ul>
                                                <?php foreach ($data as $key => $item) {
                                                    if (!empty($item['restho_about_content_feature_title'])) {
                                                        echo ($key == 3 | $key == 6) ? '</ul><ul> <li><i class="bi bi-check-circle"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>' :
                                                            '<li><i class="bi bi-check-circle"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>';
                                                    }
                                                    $key++;
                                                } ?>
                                            </ul>
                                        </div>
                                        <div class="author-area">
                                            <?php if (!empty($settings['restho_about_content_author_testimony'])) : ?>
                                                <p><?php echo wp_kses($settings['restho_about_content_author_testimony'], wp_kses_allowed_html('post')) ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="author-img-name">
                                            <div class="author-img">
                                                <?php if (!empty($settings['restho_about_content_author_avatar']['url'])) : ?>
                                                    <img src="<?php echo esc_url($settings['restho_about_content_author_avatar']['url']) ?>" alt="<?php echo esc_attr__('author-img', 'restho') ?>">
                                                <?php endif ?>
                                            </div>
                                            <div class="author-name">
                                                <?php if (!empty($settings['restho_about_content_author_name'])) : ?>
                                                    <h4><?php echo esc_html__($settings['restho_about_content_author_name'], 'restho') ?></h4>
                                                <?php endif ?>
                                                <?php if (!empty($settings['restho_about_content_author_designation'])) : ?>
                                                    <span><?php echo esc_html__($settings['restho_about_content_author_designation'], 'restho') ?></span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        <?php endif ?>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new restho_about_Widget());
