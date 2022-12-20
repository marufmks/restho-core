<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_Heading_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_heading';
    }

    public function get_title()
    {
        return esc_html__('EG Heading', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-site-title';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_heading_content_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        $this->add_control(
            'restho_heading_content_title_style_selection',
            [
                'label'   => esc_html__('Heading Style', 'restho-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'Style_1' => esc_html__('Style One', 'restho-core'),
                    'Style_2' => esc_html__('Style Two', 'restho-core'),
                ],
                'default' => 'Style_1',
            ]
        );
        $this->add_control(
            'restho_heading_content_icon_switcher',
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
            'restho_heading_content_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is Subtitle', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_heading_content_main_title',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is Main Title', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_heading_content_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('', 'restho-core'),
                'label_block' => true,

            ]
        );


        $this->add_responsive_control(
            'restho_heading_content_align',
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
                    '{{WRAPPER}} .section-title'                          => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .section-title3'                         => 'text-align: {{VALUE}};',

                ],
            ]
        );
        $this->end_controls_section();
        // End section

        //Subtitle Style
        $this->start_controls_section(
            'restho_heading_style_sub_title_section',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_heading_style_sub_title_color',
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
                'name'     => 'restho_heading_style_sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title span, .section-title3 span',
            ]
        );
        $this->add_responsive_control(
            'restho_heading_style_sub_title_padding',
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
            'restho_heading_style_main_title_section',
            [
                'label' => esc_html__('Main Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'restho_heading_style_main_title_color',
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
                'name'     => 'restho_heading_style_main_title_typography',
                'selector' => '{{WRAPPER}} .section-title h2, .section-title3 h2',

            ]
        );
        $this->add_responsive_control(
            'restho_heading_style_main_title_padding',
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
            'restho_heading_style_description_section',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_heading_style_description_color',
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
                'name'     => 'restho_heading_style_description_typography',
                'selector' => '{{WRAPPER}} .section-title p, .section-title3 p',

            ]
        );
        $this->add_responsive_control(
            'restho_heading_style_description_padding',
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
?>
        <?php if (!empty($settings['restho_heading_content_title_style_selection']) && ($settings['restho_heading_content_title_style_selection'] == 'Style_1')) : ?>

            <div class="section-title">
                <?php if (!empty($settings['restho_heading_content_sub_title'])) : ?>
                    <span>
                        <?php if ($settings['restho_heading_content_icon_switcher'] == 'yes') : ?>
                            <img class="left-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
                        <?php endif ?>
                        <?php echo esc_html__($settings['restho_heading_content_sub_title'], 'restho') ?>
                        <?php if ($settings['restho_heading_content_icon_switcher'] == 'yes') : ?>
                            <img class="right-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/sub-title-vec.svg" alt="sub-title-vec">
                        <?php endif ?>
                    </span>
                <?php endif ?>
                <?php if (!empty($settings['restho_heading_content_main_title'])) : ?>
                    <h2><?php echo esc_html__($settings['restho_heading_content_main_title'], 'restho') ?></h2>
                <?php endif ?>
                <?php if (!empty($settings['restho_heading_content_description'])) : ?>
                    <p><?php echo wp_kses($settings['restho_heading_content_description'], wp_kses_allowed_html('post')) ?></p>
                <?php endif ?>
            </div>

        <?php endif ?>
        <?php if (!empty($settings['restho_heading_content_title_style_selection']) && ($settings['restho_heading_content_title_style_selection'] == 'Style_2')) : ?>

            <div class="section-title3">
                <?php if (!empty($settings['restho_heading_content_sub_title'])) : ?>
                    <span>
                        <?php if ($settings['restho_heading_content_icon_switcher'] == 'yes') : ?>
                            <img class="left-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h3-sub-title-vec.svg" alt="">
                        <?php endif ?>
                        <?php echo esc_html__($settings['restho_heading_content_sub_title'], 'restho') ?>
                        <?php if ($settings['restho_heading_content_icon_switcher'] == 'yes') : ?>
                            <img class="right-vec" src="<?php echo get_template_directory_uri() ?>/assets/images/icon/h3-sub-title-vec.svg" alt="">
                        <?php endif ?>
                    </span>
                <?php endif ?>
                <?php if (!empty($settings['restho_heading_content_main_title'])) : ?>
                    <h2><?php echo esc_html__($settings['restho_heading_content_main_title'], 'restho') ?></h2>
                <?php endif ?>
                <?php if (!empty($settings['restho_heading_content_description'])) : ?>
                    <p><?php echo wp_kses($settings['restho_heading_content_description'], wp_kses_allowed_html('post')) ?></p>
                <?php endif ?>
            </div>

        <?php endif ?>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new restho_Heading_Widget());
