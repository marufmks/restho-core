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

        //Subtitle Style
        $this->start_controls_section(
            'restho_about_style_sub_title_section',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
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
                'label' => esc_html__('Main Title', 'restho-core'),
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
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_about_style_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_about_style_description_typography',
                'selector' => '{{WRAPPER}} .section-title p, .section-title3 p',

            ]
        );
        $this->add_responsive_control(
            'restho_about_style_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .section-title3 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ]
            ]
        );

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
                                        <img class="left-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
                                    <?php endif ?>
                                    <?php echo esc_html__($settings['restho_about_two_content_sub_title'], 'restho') ?>
                                    <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                        <img class="right-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
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
                                                echo ($key == 3) ? '</ul><ul> <li><i class="bi bi-check-circle"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>' :
                                                    '<li><i class="bi bi-check-circle"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>';
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
                                <img class="left-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
                            <?php endif ?>
                            <?php echo esc_html__($settings['restho_about_two_content_sub_title'], 'restho') ?>
                            <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                <img class="right-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
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
                                        <img class="right-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h3-sub-title-vec.svg" alt="<?php echo esc_attr__('h3-sub-title-vec', 'restho') ?>">
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
                                            echo ($key == 3) ? '</ul><ul> <li><i class="bi bi-chevron-double-right"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>' :
                                                '<li><i class="bi bi-chevron-double-right"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>';
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
                                <img class="img-fluid" src="<?php echo esc_url($settings['restho_about_content_left_image']['url']) ?>" alt="<?php echo esc_attr__('h1-intro-left-img','restho') ?>">
                                <?php endif ?>
                                <div class="intro-sm-img magnetic-wrap">
                                <?php if (!empty($settings['restho_about_content_right_image']['url'])) : ?>
                                    <img class="img-fluid magnetic-item" src="<?php echo esc_url($settings['restho_about_content_right_image']['url']) ?>" alt="<?php echo esc_attr__('h1-intro-right-img','restho') ?>">
                                <?php endif ?>
                                </div>
                            </div>
                            <div class="about-left">
                                <div class="section-title mb-40">
                                    <span>
                                        <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                            <img class="left-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
                                        <?php endif ?>
                                        <?php echo esc_html__($settings['restho_about_two_content_sub_title'], 'restho') ?>
                                        <?php if ($settings['restho_about_content_subtitle_icon_switcher'] == 'yes') : ?>
                                            <img class="right-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
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
                                                    echo ($key == 3 | $key == 6) ? '</ul><ul> <li><i class="bi bi-check-circle"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>' :
                                                        '<li><i class="bi bi-check-circle"></i>' . esc_html($item['restho_about_content_feature_title'], 'restho') . '</li>';
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
