<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_Offer_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_offer';
    }

    public function get_title()
    {
        return esc_html__('EG Offer', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-meetup';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_offer_content_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );

        $this->add_control(
            'restho_offer_title',
            [
                'label' => esc_html__('Offer Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Buy One Get One Free', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_offer_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('write your text here', 'restho-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'restho_offer_tag',
            [
                'label' => esc_html__('Offer tag', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Limited Offer', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
			'restho_offer_list',
			[
				'label' => esc_html__( 'Offer Item List', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'item_list',
						'label' => esc_html__( 'Offer Menu', 'restho-core' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'restho-core' ),
						'label_block' => true,
					],
				],
				'default' => [
					[
						'list_title' => esc_html__( 'OFFER ITEM', 'restho-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

        $this->add_control(
            'restho_offer_price_tag',
            [
                'label' => esc_html__('Offer Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$55', 'restho-core'),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
			'restho_offer_thumb',
			[
				'label' => esc_html__( 'Product thumbnail', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();
        // End section

        //Subtitle Style
        $this->start_controls_section(
            'restho_offer_style_sub_title_section',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'restho_offer_style_sub_title_color',
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
            'restho_offer_style_sub_title_padding',
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
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        // My data 
        $restho_offer_title = $settings['restho_offer_title'];
        $restho_offer_description = $settings['restho_offer_description'];
        $restho_offer_tag = $settings['restho_offer_tag'];
        $restho_offer_list = $settings['restho_offer_list'];
        $restho_offer_price_tag = $settings['restho_offer_price_tag'];
        $restho_offer_thumb = $settings['restho_offer_thumb']['url'];
?>

        <div class="best-offer-wrap clearfix">
            <div class="best-offer-img">
                <img class="img-fluid" src="<?php echo $restho_offer_thumb; ?>" alt="<?php  ?>">
                <div class="price-tag">
                    <span>$55</span>
                </div>
            </div>
            <div class="best-offer-content">
                <h3>Buy One Get One Free</h3>
                <p>If you are going to use a passage of Lorem Ipsum need. </p>
                <a class="primary-btn3 btn-sm">Limited Offer</a>
                <ol class="features">
                    <li>Prawn with Noodls.</li>
                    <li>Special Drinks.</li>
                </ol>
            </div>

        </div>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new restho_Offer_Widget());
