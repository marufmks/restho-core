<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Food_Item_Offer_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_food_item_offer';
    }

    public function get_title()
    {
        return esc_html__('EG Food Item Offer', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-carousel';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //-------------Content-------------------//
        $this->start_controls_section(
            'restho_food_it_offer_general_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        
        $this->add_control(
            'restho_food_it_offer_style_selection',
            [
                'label'   => esc_html__('Select Style', 'restho-core'),
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
        //Style One
        //Content Section 
        $this->start_controls_section(
            'restho_offer_sty_one_content_section',
            [
                'label' => esc_html__('Food Card (Offer)', 'restho-core'),
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_offer_sty_one_ofr_tag',
            [
                'label' => esc_html__('Offer Tag', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Special Offer', 'restho-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'restho_offer_sty_one_ofr_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our New Item has offer', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_offer_sty_one_discount_text',
            [
                'label' => esc_html__('Discount Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('After Discount', 'restho-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'restho_offer_sty_one_discount_percentage',
            [
                'label' => esc_html__('Discount Percentage', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('20%', 'restho-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'restho_offer_sty_one_card_item_section',
            [
                'label' => esc_html__('Food Card (Item)', 'restho-core'),
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_one'
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'restho_offer_sty_one_fd_card_item_image',
			[
				'label' => esc_html__( 'Food Image', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
            'restho_offer_sty_one_fd_card_item_price',
            [
                'label' => esc_html__( 'Price', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Price - $8', 'restho-core' ),
                'placeholder' => esc_html__( 'Your offer price', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_offer_sty_one_fd_card_item_title',
            [
                'label' => esc_html__( 'Title', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Chicken Fried', 'restho-core' ),
                'placeholder' => esc_html__( 'Your offer title', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
			'restho_offer_sty_one_fd_card_item_list',
			[
				'label' => esc_html__( 'Food Items', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'restho_offer_sty_one_fd_card_item_title' => esc_html__( 'Chicken Fried', 'restho-core' ),
					],

				],
				'title_field' => '{{{ restho_offer_sty_one_fd_card_item_title }}}',
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
            'restho_offer_sty_one_fd_card_bkn_content_section',
            [
                'label' => esc_html__('Food Card (Booking)', 'restho-core'),
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
			'restho_offer_sty_one_fd_card_bkn_bg_img',
			[
				'label' => esc_html__( 'Background Image', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
            'restho_offer_sty_one_fd_card_bkn_sub_title',
            [
                'label' => esc_html__('Subtitle', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Reserve', 'restho-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'restho_offer_sty_one_fd_card_bkn_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('For Your Private Event', 'restho-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'restho_offer_sty_one_fd_card_bkn_button_text',
            [
                'label' => esc_html__('Button Text', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Book Table', 'restho-core'),
                'label_block' => true,
          
            ]
        );
        $this->add_control(
			'restho_offer_sty_one_fd_card_bkn_button_url',
			[
				'label' => esc_html__( 'Button URL', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'restho-core' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
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

        //Style Two
        //Content Section
        $this->start_controls_section(
            'restho_offer_sty_two_content_section',
            [
                'label' => esc_html__('Food Card', 'restho-core'),
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_offer_sty_two_title',
            [
                'label' => esc_html__('Offer Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Buy One Get One Free', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_offer_sty_two_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('write your text here', 'restho-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'restho_offer_sty_two_tag',
            [
                'label' => esc_html__('Offer Tag', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Limited Offer', 'restho-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'restho_offer_sty_two_price_tag',
            [
                'label' => esc_html__('Offer Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$55', 'restho-core'),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
			'restho_offer_sty_two_thumb',
			[
				'label' => esc_html__( 'Product Thumbnail', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

        //Repeater List
        $this->start_controls_section(
            'restho_offer_sty_two_list_section',
            [
                'label' => esc_html__('Offer List', 'restho-core'),
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_two'
                ],
            ]
        );
        $repeater2 = new \Elementor\Repeater();
        
        $repeater2->add_control(
            'restho_offer_sty_two_list_title',
            [
                'label' => esc_html__( 'Offer List', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Prawn with Noodls', 'restho-core' ),
                'placeholder' => esc_html__( 'Your offer list here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
			'restho_offer_sty_two_list',
			[
				'label' => esc_html__( 'Offer List', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'restho_offer_sty_two_list_title' => esc_html__( 'Prawn with Noodls', 'restho-core' ),
					],

				],
				'title_field' => '{{{ restho_offer_sty_two_list_title }}}',
			]
		);
        $this->end_controls_section();
        // Repeater three
        $this->start_controls_section(
            'restho_section_content_food_it_offer_st_three',
            [
                'label' => esc_html__('Food Item', 'restho-core'),
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_three'
                ],
            ]
        );

        $repeater3 = new \Elementor\Repeater();

        $repeater3->add_control(
            'restho_section_content_food_it_offer_st_three_new_price_tag',
            [
                'label' => esc_html__('New Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$55', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater3->add_control(
            'restho_section_content_food_it_offer_st_three_old_price_tag',
            [
                'label' => esc_html__('Old Price', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$65', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater3->add_control(
			'restho_section_content_food_it_offer_st_three_image',
			[
				'label' => esc_html__( 'Food Image', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater3->add_control(
			'restho_section_content_food_it_offer_st_three_sml_image',
			[
				'label' => esc_html__( 'Food Image (Small)', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater3->add_control(
            'restho_section_content_food_it_offer_st_three_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Chicken with Drinks.', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater3->add_control(
            'restho_section_content_food_it_offer_st_three_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html__("It is a long established fact that a reader will be distracted.", 'restho-core'),
                'placeholder' => esc_html__('Type your description here', 'restho-core'),
            ]
        );

        $this->add_control(
            'restho_food_it_offer_st_three_section_list',
            [
                'label' => esc_html__('Food Item Lists', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
                'default' => [
                    [
                        'restho_section_content_food_it_offer_st_three_title' => esc_html__('Chicken with Drinks.', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_section_content_food_it_offer_st_three_title }}}',
            ]
        );
        $this->end_controls_section();
        //Style Section Start
        //Style One
        //Food Card General
        $this->start_controls_section(
            'restho_food_itm_sty_one_gen_style_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_ofr_bg_color',
            [
                'label'     => esc_html__('Food Card Offer (Background)', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap1' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_ofr_brd_color',
            [
                'label'     => esc_html__('Food Card Offer (Border)', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap1' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_fd_card_ofr_brd_rad',
            [
                'label'      		=> __('Food Card Offer (Border Radius)', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .new-items1 .new-items-wrap1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_itm_bg_color',
            [
                'label'     => esc_html__('Food Card Item (Background)', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_itm_brdr_color',
            [
                'label'     => esc_html__('Food Card Item (Border)', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap2' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_fd_card_itm_brd_rad',
            [
                'label'      		=> __('Food Card Item (Border Radius)', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .new-items1 .new-items-wrap2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Food Card Offer
        $this->start_controls_section(
            'restho_food_itm_sty_one_fd_card_ofr_style_section',
            [
                'label' => esc_html__('Food Card (Offer)', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_ofr_tag_color',
            [
                'label'     => esc_html__('Offer Tag Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_ofr_tag_bg_color',
            [
                'label'     => esc_html__('Offer Tag Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Offer Tag Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_fd_card_ofr_tag_typography',
                'selector' => '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content > span',
            ],
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_ofr_title_color',
            [
                'label'     => esc_html__('Title Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content h3.ofr-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_fd_card_ofr_title_typography',
                'selector' => '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content h3.ofr-title',
            ],
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_ofr_disc_txt_color',
            [
                'label'     => esc_html__('Discount Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content .descount-area h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Discount Text Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_fd_card_ofr_disc_txt_typography',
                'selector' => '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content .descount-area h3',
            ],
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_ofr_disc_perc_color',
            [
                'label'     => esc_html__('Discount Percentage Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content .descount-area span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Discount Percentage Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_fd_card_ofr_disc_perc_typography',
                'selector' => '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content .descount-area span',
            ],
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_ofr_disc_brd_color',
            [
                'label'     => esc_html__('Discount Border', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap1 .items-content .descount-area' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Food Card Item
        $this->start_controls_section(
            'restho_food_itm_sty_one_fd_card_itm_style_section',
            [
                'label' => esc_html__('Food Card (Item)', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_itm_pri_color',
            [
                'label'     => esc_html__('Price Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap2 .items-img .price span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_itm_pri_bg_color',
            [
                'label'     => esc_html__('Price Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap2 .items-img .price span' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Price Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_fd_card_itm_pri_typography',
                'selector' => '{{WRAPPER}} .new-items1 .new-items-wrap2 .items-img .price span',
            ],
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_itm_pri_border_color',
            [
                'label'     => esc_html__('Price Border', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap2 .items-img .price span' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_itm_title_color',
            [
                'label'     => esc_html__('Title Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap2 .content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_fd_card_itm_title_typography',
                'selector' => '{{WRAPPER}} .new-items1 .new-items-wrap2 .content h3',
            ],
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_itm_title_hvr_color',
            [
                'label'     => esc_html__('Title Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap2 .content h3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Food Card Booking
        $this->start_controls_section(
            'restho_food_itm_sty_one_fd_card_bkg_style_section',
            [
                'label' => esc_html__('Food Card (Booking)', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_bkg_sub_color',
            [
                'label'     => esc_html__('Subtitle Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap3 .overlay .items-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_bkg_sub_icon_color',
            [
                'label'     => esc_html__('Subtitle Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap3 .overlay .items-content > span svg rect' => 'stroke: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Subtitle Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_fd_card_bkg_sub_typography',
                'selector' => '{{WRAPPER}} .new-items1 .new-items-wrap3 .overlay .items-content > span',
            ],
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_bkg_title_color',
            [
                'label'     => esc_html__('Title Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap3 .overlay .items-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_fd_card_bkg_title_typography',
                'selector' => '{{WRAPPER}} .new-items1 .new-items-wrap3 .overlay .items-content h3',
            ],
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_bkg_title_hvr_color',
            [
                'label'     => esc_html__('Title Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .new-items-wrap3 .overlay .items-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_bkg_btn_color',
            [
                'label'     => esc_html__('Button Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_bkg_btn_hvr_color',
            [
                'label'     => esc_html__('Button Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_bkg_btn_bg_color',
            [
                'label'     => esc_html__('Button Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_fd_card_bkg_btn_hvr_bg_color',
            [
                'label'     => esc_html__('Button Hover (Background)', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_one_fd_card_bkg_btn_typography',
                'selector' => '{{WRAPPER}} .primary-btn',
            ],
        );
        $this->end_controls_section();
        //Pagination
        $this->start_controls_section(
            'restho_food_itm_sty_one_pagination',
            [
                'label' => esc_html__('Pagination (prev/next)', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_one'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_pagination_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .swiper-btn .prev-btn-2 i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .new-items1 .swiper-btn .next-btn-2 i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_pagination_icon_hvr_color',
            [
                'label'     => esc_html__('Icon Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .swiper-btn .prev-btn-2:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .new-items1 .swiper-btn .next-btn-2:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .swiper-btn .prev-btn-2' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .new-items1 .swiper-btn .next-btn-2' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_pagination_bg_hvr_color',
            [
                'label'     => esc_html__('Background Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .swiper-btn .prev-btn-2:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .new-items1 .swiper-btn .next-btn-2:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_one_pagination_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .new-items1 .swiper-btn .prev-btn-2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .new-items1 .swiper-btn .next-btn-2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_one_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .new-items1 .swiper-btn .prev-btn-2' => 'border:1px solid {{VALUE}};',
                    '{{WRAPPER}} .new-items1 .swiper-btn .next-btn-2' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Style Two
        $this->start_controls_section(
            'restho_offer_style_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_offer_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_title_typography',
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content h3',
            ],
        );
        $this->add_responsive_control(
            'restho_offer_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_offer_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Description
        $this->start_controls_section(
            'restho_offer_style_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_offer_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_description_typography',
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_offer_description_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_offer_description_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();       
        // Offer Tag
        $this->start_controls_section(
            'restho_offer_style_tag',
            [
                'label' => esc_html__('Offer Tag', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_offer_tag_color',
            [
                'label'     => esc_html__(' Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_tag_typography',
                'selector' => '{{WRAPPER}} .primary-btn3',
            ],
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_offer_tag_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .primary-btn3',
            ]
        );
        $this->add_responsive_control(
            'restho_offer_tag_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .primary-btn3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_offer_tag_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_offer_tag_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'restho_offer_tag_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover' => 'color: {{VALUE}}',
                ],
        
            ]
        );
        $this->add_control(
            'restho_offer_tag_hover_background',
            [
                'label' => esc_html__( 'Hover Background', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        // Offer Price
        $this->start_controls_section(
            'restho_offer_style_price',
            [
                'label' => esc_html__('Offer Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_offer_price_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_price_typography',
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag span',
            ],
        );
        $this->add_control(
            'restho_offer_price_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_offer_price_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag',
            ]
        );
        $this->add_responsive_control(
            'restho_offer_price_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-img .price-tag span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->end_controls_section();

        // Offer List
        $this->start_controls_section(
            'restho_offer_style_list',
            [
                'label' => esc_html__('Offer list', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_offer_list_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content .features li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_offer_list_typography',
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content .features li',
            ],
        );
        $this->add_responsive_control(
            'restho_offer_list_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content .features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_offer_list_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap .best-offer-content .features' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        // Card style
        $this->start_controls_section(
            'restho_offer_style_card',
            [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_two'
                ],
            ]
        );
        $this->add_control(
            'restho_offer_style_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_offer_style_card_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .best-offer-area1 .best-offer-wrap',
            ]
        );
        $this->add_responsive_control(
            'restho_offer_style_card_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .best-offer-area1 .best-offer-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->end_controls_section();
        //Style three
        //General
        $this->start_controls_section(
            'restho_food_itm_sty_three_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_img_brdr_color',
            [
                'label'     => esc_html__('Food Image Border', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-img::after' => 'border:2x dashed {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_sl_num_color',
            [
                'label'     => esc_html__('Sl. Number', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .sl-no span' => '-webkit-text-stroke:1px {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        //New Price
        $this->start_controls_section(
            'restho_food_itm_sty_three_new_price',
            [
                'label' => esc_html__('New Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_new_price_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .price-tag span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_three_new_price_typography',
                'selector' => '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .price-tag span',
            ],
        );
        $this->end_controls_section();
        //Old Price
        $this->start_controls_section(
            'restho_food_itm_sty_three_old_price',
            [
                'label' => esc_html__('Old Price', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_old_price_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .price-tag span del' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_three_old_price_typography',
                'selector' => '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content .price-sl .price-tag span del',
            ],
        );
        $this->end_controls_section();
        //Title
        $this->start_controls_section(
            'restho_food_itm_sty_three_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_title_hvr_color',
            [
                'label'     => esc_html__('Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_three_title_typography',
                'selector' => '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Description
        $this->start_controls_section(
            'restho_food_itm_sty_three_desc',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_food_itm_sty_three_desc_typography',
                'selector' => '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h3-spacial-offer-area .single-offer-card .offer-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Pagination
        $this->start_controls_section(
            'restho_food_itm_sty_three_pagination',
            [
                'label' => esc_html__('Pagination (prev/next)', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_food_it_offer_style_selection' => 'style_three'
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_pagination_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3 i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3 i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_pagination_icon_hvr_color',
            [
                'label'     => esc_html__('Icon Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_food_itm_sty_three_pagination_bg_hvr_color',
            [
                'label'     => esc_html__('Background Hover', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_food_itm_sty_three_pagination_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->add_control(
            'restho_food_itm_sty_three_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .populer-food-area .slider-btn .prev-btn-3' => 'border:1px solid {{VALUE}};',
                    '{{WRAPPER}} .populer-food-area .slider-btn .next-btn-3' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
 
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if ( ! empty( $settings['restho_offer_sty_one_fd_card_bkn_button_url']['url'] ) ) {
			$this->add_link_attributes( 'restho_offer_sty_one_fd_card_bkn_button_url', $settings['restho_offer_sty_one_fd_card_bkn_button_url'] );
		}

        $fooditems1=$settings['restho_offer_sty_one_fd_card_item_list'];
        $fooditems2=$settings['restho_offer_sty_two_list'];
        $fooditems3 = $settings['restho_food_it_offer_st_three_section_list'];
        
?>
        <?php if( is_admin() ) : ?>
            <script>
                var swiper2 = new Swiper(".new-item-big-slider", {
                loop: true,
                spaceBetween: 10,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                thumbs: {
                    swiper: swiper,
                },
                });
                // New Item List Slider
                var swiper = new Swiper(".new-item-sm-slider", {
                loop: true,
                spaceBetween: 22,
                slidesPerView: 6,
                freeMode: true,
                // centeredSlides: true,
                watchSlidesProgress: true,
                navigation: {
                    nextEl: ".next-btn-2",
                    prevEl: ".prev-btn-2",
                },

                breakpoints: {
                    280:{
                    slidesPerView: 3,
                    spaceBetween: 15
                    },
                    480:{
                    slidesPerView: 4
                    },
                    768:{
                    slidesPerView: 5
                    },
                    992:{
                    slidesPerView: 6
                    },
                    1200:{
                    slidesPerView: 6
                    },
                    1400:{
                    slidesPerView:6
                    },
                    1600:{
                    slidesPerView: 6
                    },
                }

                });
                // double row  slider
                jQuery('#slick1').slick({
                    rows: 2,
                    dots: false,
                    arrows: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 2,
                    slidesToScroll: 2
                });

            </script>
        <?php endif ?>
        <?php if( !empty( $settings['restho_food_it_offer_style_selection'] ) && ($settings['restho_food_it_offer_style_selection'] == 'style_one') )  : ?>
            <div class="new-items1 mb-120">
                <div class="container">
                    <div class="row mb-70 g-4 justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="new-items-wrap1 d-flex align-items-center justify-content-center">
                                <div class="items-content text-center">
                                    <span><?php echo wp_kses($settings['restho_offer_sty_one_ofr_tag'], wp_kses_allowed_html('post')) ?></span>
                                    <h3 class="ofr-title" ><?php echo wp_kses($settings['restho_offer_sty_one_ofr_title'], wp_kses_allowed_html('post')) ?></h3>
                                    <div class="descount-area text-center">
                                        <h3><?php echo wp_kses($settings['restho_offer_sty_one_discount_text'], wp_kses_allowed_html('post')) ?></h3>                                       
                                        <span><?php echo wp_kses($settings['restho_offer_sty_one_discount_percentage'], wp_kses_allowed_html('post')) ?></span>                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 order-lg-2 order-3">
                            <div class="swiper new-item-big-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach($fooditems1 as $item1):?>
                                        <div class="swiper-slide">
                                            <div class="new-items-wrap2">
                                                <div class="items-img">
                                                    <img class="img-fluid" src="<?php echo esc_url($item1['restho_offer_sty_one_fd_card_item_image']['url']) ?>" alt="<?php echo esc_attr__('food-itm-img', 'restho') ?>">
                                                    <div class="price">
                                                        <span><?php echo wp_kses($item1['restho_offer_sty_one_fd_card_item_price'], wp_kses_allowed_html('post')) ?></span>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3><?php echo wp_kses($item1['restho_offer_sty_one_fd_card_item_title'], wp_kses_allowed_html('post')) ?></h3>                                                   
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 order-lg-3 order-2">
                            <div class="new-items-wrap3">
                                <div class="items-img">
                                    <img class="img-fluid" src="<?php echo esc_url($settings['restho_offer_sty_one_fd_card_bkn_bg_img']['url']) ?>" alt="<?php echo esc_attr__('reserve-img', 'restho') ?>">
                                </div>
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <div class="items-content text-center">
                                        <span>                                           
                                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect y="0.709001" width="7.46261" height="7.46261" transform="matrix(0.705207 0.709001 -0.705207 0.709001 6.46789 0.206318)" stroke="white"/>
                                            <rect y="0.709001" width="7.46261" height="7.46261" transform="matrix(0.705207 0.709001 -0.705207 0.709001 11.5312 0.206318)" stroke="white"/>
                                            </svg>

                                                <?php echo wp_kses($settings['restho_offer_sty_one_fd_card_bkn_sub_title'], wp_kses_allowed_html('post')) ?>   

                                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect y="0.709001" width="7.46261" height="7.46261" transform="matrix(0.705207 0.709001 -0.705207 0.709001 6.46789 0.206318)" stroke="white"/>
                                            <rect y="0.709001" width="7.46261" height="7.46261" transform="matrix(0.705207 0.709001 -0.705207 0.709001 11.5312 0.206318)" stroke="white"/>
                                            </svg>
                                        </span>
                                        <h3><?php echo wp_kses($settings['restho_offer_sty_one_fd_card_bkn_title'], wp_kses_allowed_html('post')) ?></h3>
                                        
                                        <a class="primary-btn btn-sm" <?php echo $this->get_render_attribute_string( 'restho_offer_sty_one_fd_card_bkn_button_url' ); ?>>
                                            <?php echo esc_html($settings['restho_offer_sty_one_fd_card_bkn_button_text'],'restho-core'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row position-relative">
                        <div class="swiper new-item-sm-slider">
                            <div class="swiper-wrapper">
                                <?php foreach($fooditems1 as $item1):?>
                                    <div class="swiper-slide">
                                        <div class="new-items-sm-img">
                                            <img src="<?php echo esc_url($item1['restho_offer_sty_one_fd_card_item_image']['url']) ?>" alt="<?php echo esc_attr__('food-itm-img', 'restho') ?>">
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="swiper-btn d-flex justify-content-between align-items-center">
                            <div class="prev-btn-2"><i class="bi bi-arrow-left"></i></div>
                            <div class="next-btn-2"><i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php if( !empty( $settings['restho_food_it_offer_style_selection'] ) && ($settings['restho_food_it_offer_style_selection'] == 'style_two') )  : ?>
            <div class="best-offer-area1">
                <div class="best-offer-wrap clearfix">
                    <div class="best-offer-img">
                        <?php if (!empty($settings['restho_offer_sty_two_thumb']['url'])) : ?>
                            <img class="img-fluid" src="<?php echo esc_url($settings['restho_offer_sty_two_thumb']['url']) ?>" alt="<?php echo esc_attr__('offer-img', 'restho') ?>">
                        <?php endif ?>
                        <?php if (!empty($settings['restho_offer_sty_two_price_tag'])) : ?>
                            <div class="price-tag">
                                <span><?php echo wp_kses($settings['restho_offer_sty_two_price_tag'], wp_kses_allowed_html('post')) ?></span>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="best-offer-content">
                        <?php if (!empty($settings['restho_offer_sty_two_title'])) : ?>
                            <h3><?php echo wp_kses($settings['restho_offer_sty_two_title'], wp_kses_allowed_html('post')) ?></h3>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_offer_sty_two_description'])) : ?>
                            <p><?php echo wp_kses($settings['restho_offer_sty_two_description'], wp_kses_allowed_html('post')) ?></p>
                        <?php endif ?>
                        <?php if (!empty($settings['restho_offer_sty_two_tag'])) : ?>
                            <a class="primary-btn3 btn-sm"><?php echo wp_kses($settings['restho_offer_sty_two_tag'], wp_kses_allowed_html('post')) ?></a>
                        <?php endif ?>
                        
                        <ol class="features">
                            <?php foreach($fooditems2 as $item2):?>
                                <?php if (!empty($item2['restho_offer_sty_two_list_title'])) : ?>
                                    <li><?php echo wp_kses($item2['restho_offer_sty_two_list_title'], wp_kses_allowed_html('post')) ?></li>
                                <?php endif ?>
                            <?php endforeach ?>
                        </ol>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php if( !empty( $settings['restho_food_it_offer_style_selection'] ) && ($settings['restho_food_it_offer_style_selection'] == 'style_three') )  : ?>
            <div class="h3-spacial-offer-area mb-120 ">
                <div id="slick1">
                    <?php foreach($fooditems3 as $key=> $item3): ?>
                        <div class="slide-item">
                            <div class="single-offer-card">
                                <div class="offer-img">
                                    <?php if (!empty($item3['restho_section_content_food_it_offer_st_three_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($item3['restho_section_content_food_it_offer_st_three_image']['url']) ?>" alt="<?php echo esc_attr__('food-img', 'restho') ?>">
                                    <?php endif ?>
                                    <?php if (!empty($item3['restho_section_content_food_it_offer_st_three_sml_image']['url'])) : ?>
                                        <div class="sm-img">
                                            <img src="<?php echo esc_url($item3['restho_section_content_food_it_offer_st_three_sml_image']['url']) ?>" alt="<?php echo esc_attr__('food-img', 'restho') ?>">
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="offer-content">
                                    <div class="price-sl">
                                        <div class="price-tag">
                                            <span>
                                                <?php if (!empty($item3['restho_section_content_food_it_offer_st_three_new_price_tag'])) : ?>
                                                    <?php echo wp_kses($item3['restho_section_content_food_it_offer_st_three_new_price_tag'], wp_kses_allowed_html('post')) ?> 
                                                <?php endif ?>
                                                <?php if (!empty($item3['restho_section_content_food_it_offer_st_three_old_price_tag'])) : ?>
                                                    <del><?php echo wp_kses($item3['restho_section_content_food_it_offer_st_three_old_price_tag'], wp_kses_allowed_html('post')) ?></del>
                                                <?php endif ?>
                                            </span>
                                        </div>
                                        <div class="sl-no">
                                            <span><?php echo "0".$key+1 ;?></span>
                                        </div>
                                    </div>
                                    <?php if (!empty($item3['restho_section_content_food_it_offer_st_three_title'])) : ?>
                                        <h3><?php echo wp_kses($item3['restho_section_content_food_it_offer_st_three_title'], wp_kses_allowed_html('post')) ?></h3>
                                    <?php endif ?>
                                    <?php if (!empty($item3['restho_section_content_food_it_offer_st_three_description'])) : ?>
                                        <p><?php echo wp_kses($item3['restho_section_content_food_it_offer_st_three_description'], wp_kses_allowed_html('post')) ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endif ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Restho_Food_Item_Offer_Widget());