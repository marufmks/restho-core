<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Testimonial_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_testimonial';
    }

    public function get_title()
    {
        return esc_html__('EG Testimonial', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'restho_testimonial_content_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
            ]
        );
        
        $this->add_control(
            'restho_testimonial_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'restho-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'restho-core'),
                    'style_two' => esc_html__('Style Two', 'restho-core'),
                ],
                'default' => 'style_one',
            ]
        );
        $this->add_control(
            'restho_testimonial_one_quote_switcher',
            [
                'label' => esc_html__('Quote Icon (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_one' ,
                ],
            ]
        );
        $this->add_control(
            'restho_testimonial_one_rating_switcher',
            [
                'label' => esc_html__('Rating (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_one' ,
                ],
            ]
        );
        $this->add_control(
            'restho_testimonial_two_quote_switcher',
            [
                'label' => esc_html__('Quote Icon (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_two' ,
                ],
            ]
        );
        $this->add_control(
            'restho_testimonial_two_rating_switcher',
            [
                'label' => esc_html__('Rating (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_two' ,
                ],
            ]
        );
        $this->add_control(
            'restho_testimonial_two_pagination_switcher',
            [
                'label' => esc_html__('Pagination (prev/next)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_two' ,
                ],
            ]
        );
        
        $this->end_controls_section();
        $this->start_controls_section(
            'restho_testimonial_one_content_repeater',
            [
                'label' => esc_html__('Testimonial List', 'restho-core'),
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_one' ,
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'restho_testimonial_one_author_img',
            [
                'label' => esc_html__('Author Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'restho_testimonial_one_name',
            [
                'label' => esc_html__('Author Name', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Cristrofar Henry', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_testimonial_one_designation',
            [
                'label' => esc_html__('Author Designation', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Guest', 'restho-core'),
                'label_block' => true,
            ]
        );  
        $repeater->add_control(
            'restho_testimonial_one_description',
            [
                'label' => esc_html__('Testimonial Text', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__("If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything  hidden in the middle of text. All the Lorem Ipsum generators,
                to use a passage of Lorem Ipsum.'", 'restho-core'),
                'label_block' => true,
            ]
        ); 
        $repeater->add_control(
			'restho_testimonial_one_rating',
			[
				'label' 		=> esc_html__( 'Rating', 'restho-core' ),
				'type' 			=> Controls_Manager::NUMBER,
				'min' 			=> 0,
				'max' 			=> 5,
				'step' 			=> 1,
				'default' 		=> 5,
				'dynamic' 		=> [
					'active' 	=> true,
				],
			]
		);
        $this->add_control(
            'restho_testimonial_one_list',
            [
                'label' => esc_html__('Testimonial Lists', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_testimonial_one_name' => esc_html__('Cristrofar Henry', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_testimonial_one_name }}}',
            ]
        );
        $this->end_controls_section();
        //Style Two
        $this->start_controls_section(
            'restho_testimonial_two_content_repeater',
            [
                'label' => esc_html__('Testimonial List', 'restho-core'),
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_two' ,
                ],
            ]
        );
        $repeater2 = new \Elementor\Repeater();
        $repeater2->add_control(
            'restho_testimonial_two_description',
            [
                'label' => esc_html__('Testimonial Text', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__("If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything passage need to be sure embarrass.", 'restho-core'),
                'label_block' => true,
            ]
        ); 
        $repeater2->add_control(
            'restho_testimonial_two_author_img',
            [
                'label' => esc_html__('Author Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater2->add_control(
            'restho_testimonial_two_name',
            [
                'label' => esc_html__('Author Name', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Mrs. Angelina Juli', 'restho-core'),
                'label_block' => true,
            ]
        ); 
        $repeater2->add_control(
			'restho_testimonial_two_rating',
			[
				'label' 		=> esc_html__( 'Rating', 'restho-core' ),
				'type' 			=> Controls_Manager::NUMBER,
				'min' 			=> 0,
				'max' 			=> 5,
				'step' 			=> 1,
				'default' 		=> 5,
				'dynamic' 		=> [
					'active' 	=> true,
				],
			]
		);
        $this->add_control(
            'restho_testimonial_two_list',
            [
                'label' => esc_html__('Testimonial Lists', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'restho_testimonial_two_name' => esc_html__('Mrs. Angelina Juli', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_testimonial_two_name }}}',
            ]
        );
        $this->end_controls_section();
        //General Style One
        $this->start_controls_section(
            'restho_testi_one_style_section_name_general',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_one' ,
                ],
            ]

        );
        $this->add_control(
            'restho_testi_one_rating_icon_color',
            [
                'label'     => esc_html__('Rating Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .review ul li i' => 'color : {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_testi_one_desig_line_color',
            [
                'label'     => esc_html__('Designation Line Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .author-name span::after' => 'background-color : {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_testi_one_author_img_border_color',
            [
                'label'     => esc_html__('Author Image Border', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-img-slider .swiper-slide-thumb-active::after' => 'border :1px dashed {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Author Name
        $this->start_controls_section(
            'restho_testi_one_style_section_name',
            [
                'label' => esc_html__('Author Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_one' ,
                ],
            ]
        );
        $this->add_control(
            'restho_testi_one_name_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .author-name h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_testi_one_name_typography',
                'selector' => '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .author-name h4',
            ],
        );
        $this->add_responsive_control(
            'restho_testi_one_name_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .author-name h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_testi_one_name_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .author-name h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Designation
        $this->start_controls_section(
            'restho_testi_one_style_section_designation',
            [
                'label' => esc_html__('Author Designation', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_one' ,
                ],
            ]
        );
        $this->add_control(
            'restho_testi_one_desig_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .author-name span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_testi_one_desig_typography',
                'selector' => '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .author-name span',
            ],
        );
        $this->add_responsive_control(
            'restho_testi_one_desig_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .author-name span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_testi_one_desig_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content .author-name-review .author-name span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Description
        $this->start_controls_section(
            'restho_testi_one_style_section_description',
            [
                'label' => esc_html__('Testimonial Text', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_one' ,
                ],
            ]
        );
        $this->add_control(
            'restho_testi_one_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_testi_one_desc_typography',
                'selector' => '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_testi_one_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_testi_one_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Card
        $this->start_controls_section(
            'restho_testi_one_style_section_card',
            [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_one' ,
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_testi_one_card_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content',
            ]
        );
        $this->add_responsive_control(
            'restho_testi_one_card_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .testimonial-area1 .testimonial-content-slider .testimonial-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->end_controls_section();  

        //Style Two
        //General Style Two
        $this->start_controls_section(
            'restho_testi_two_style_section_name_general',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_two' ,
                ],
            ]

        );
        $this->add_control(
            'restho_testi_two_author_img_border_color',
            [
                'label'     => esc_html__('Author Image Border', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testi-author-area .author-img::after' => 'border :1px dashed {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_testi_two_rating_icon_color',
            [
                'label'     => esc_html__('Rating Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testi-author-area .name-review ul li i' => 'color : {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Description
        $this->start_controls_section(
            'restho_testi_two_style_section_description',
            [
                'label' => esc_html__('Testimonial Text', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_two' ,
                ],
            ]
        );
        $this->add_control(
            'restho_testi_two_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testimonial-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_testi_two_desc_typography',
                'selector' => '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testimonial-content p',
            ],
        );
        $this->add_responsive_control(
            'restho_testi_two_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testimonial-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_testi_two_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Author Name
        $this->start_controls_section(
            'restho_testi_two_style_section_name',
            [
                'label' => esc_html__('Author Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_two' ,
                ],
            ]
        );
        $this->add_control(
            'restho_testi_two_name_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testi-author-area .name-review h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_testi_two_name_typography',
                'selector' => '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testi-author-area .name-review h5',
            ],
        );
        $this->add_responsive_control(
            'restho_testi_two_name_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testi-author-area .name-review h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_testi_two_name_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap .testi-author-area .name-review h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Card
        $this->start_controls_section(
            'restho_testi_two_style_section_card',
            [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_two' ,
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_testi_two_card_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap',
            ]
        );
        $this->add_responsive_control(
            'restho_testi_two_card_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .home3-testimonial .home3-testimonial-slider .testimonial-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Pagination
        $this->start_controls_section(
            'restho_testi_two_style_section_pagi',
            [
                'label' => esc_html__('Pagination (prev/next)', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_testimonial_content_style_selection' => 'style_two' ,
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_testi_two_pagi_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .home3-testimonial .slider-btn .prev-btn-4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .home3-testimonial .slider-btn .next-btn-4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('_tab_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' 		=> __('Normal', 'restho-core'),
            ]
        );
        $this->add_control(
            'restho_testi_two_pagi_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .slider-btn .prev-btn-4 i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-testimonial .slider-btn .next-btn-4 i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_testi_two_pagi_border_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .slider-btn .prev-btn-4' => 'border:1px solid {{VALUE}};',
                    '{{WRAPPER}} .home3-testimonial .slider-btn .next-btn-4' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        //Hover start
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'restho-core' ),
            ]
        );
        $this->add_control(
            'restho_testi_two_pagi_icon_hvr_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .slider-btn .prev-btn-4:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-testimonial .slider-btn .next-btn-4:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_testi_two_pagi_icon_hvr_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .slider-btn .prev-btn-4:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .home3-testimonial .slider-btn .next-btn-4:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_testi_two_pagi_border_hvr_color',
            [
                'label'     => esc_html__('Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial .slider-btn .prev-btn-4:hover' => 'border:1px solid {{VALUE}};',
                    '{{WRAPPER}} .home3-testimonial .slider-btn .next-btn-4:hover' => 'border:1px solid {{VALUE}};',
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
        $items = $settings['restho_testimonial_one_list'];
        $items2 = $settings['restho_testimonial_two_list'];
        ?>
            <?php if( is_admin() ) : ?>
                <script>
                    // Testimonisl  Slider
                    var swiper3 = new Swiper(".testimonial-img-slider", {
                        loop: true,
                        spaceBetween: 22,
                        slidesPerView: 3,
                        freeMode: true,
                        watchSlidesProgress: true,
                        direction: 'vertical',
                        speed:1500,
                        autoplay: {
                            delay: 2000,
                        },
                        navigation: {
                            nextEl: ".next-btn-2",
                            prevEl: ".prev-btn-2",
                        },

                        breakpoints: {
                            280:{
                            slidesPerView: 3,
                            spaceBetween: 15,
                            direction: 'horizontal',
                            },
                            480:{
                            slidesPerView: 3,
                            direction: 'horizontal',
                            },
                            768:{
                            slidesPerView: 3
                            },
                            992:{
                            slidesPerView: 3
                            },
                            1200:{
                            slidesPerView: 3
                            },
                            1400:{
                            slidesPerView:3
                            },
                            1600:{
                            slidesPerView: 3
                            },
                        }
                    });
                    var swiper4 = new Swiper(".testimonial-content-slider", {
                    loop: true,
                    spaceBetween: 30,
                    effect: 'fade',
                    speed:1500,
                    autoplay: {
                        delay: 2000,
                    },
                    fadeEffect: {
                        crossFade: true
                    },
                    thumbs: {
                        swiper: swiper3,
                    },
                    });
                    // H3 testimonial-slider
                    var swiper = new Swiper(".home3-testimonial-slider", {
                    slidesPerView: 4,
                    spaceBetween: 25,
                    loop: true,
                    speed:1500,
                    autoplay: {
                        delay: 2000,
                    },
                    navigation: {
                        nextEl: ".next-btn-4",
                        prevEl: ".prev-btn-4",
                    },

                    breakpoints: {
                        280:{
                        slidesPerView: 1,
                        spaceBetween: 15,
                        },
                        480:{
                        slidesPerView: 2,
                        spaceBetween: 15,
                        },
                        768:{
                        slidesPerView: 2,
                        },
                        992:{
                        slidesPerView: 3,
                        },
                        1200:{
                        slidesPerView: 3,
                        },
                        1400:{
                        slidesPerView:3,
                        },
                        1600:{
                        slidesPerView: 3
                        },
                    }
                    });
                </script>
            <?php endif ?>
            <?php if( !empty( $settings['restho_testimonial_content_style_selection'] ) && ($settings['restho_testimonial_content_style_selection'] == 'style_one') )  : ?>
                <div class="testimonial-area1">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12 position-relative order-lg-1 order-2">
                                <div class="swiper testimonial-img-slider">
                                    <div class="swiper-wrapper">
                                    <?php foreach($items as $item):?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-img">
                                                <img src="<?php echo esc_url($item['restho_testimonial_one_author_img']['url']) ?>" alt="<?php echo esc_attr__('testi-autho-1', 'restho') ?>">
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="swiper testimonial-content-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach($items as $item):?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-content">
                                                    <?php if ($settings['restho_testimonial_one_quote_switcher'] == 'yes') : ?>
                                                        <div class="quoat">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/quate-icon.svg" alt="<?php echo esc_attr__('quate-icon', 'restho') ?>">
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="author-name-review">
                                                        <div class="author-name">
                                                            <h4><?php echo esc_html($item['restho_testimonial_one_name']) ?></h4>
                                                            <span><?php echo esc_html($item['restho_testimonial_one_designation']) ?></span>
                                                        </div>
                                                        <?php if ($settings['restho_testimonial_one_rating_switcher'] == 'yes') : ?>
                                                            <div class="review">
                                                                <ul>
                                                                    <?php
                                                                        for ($i=0; $i <$item['restho_testimonial_one_rating'] ; $i++) {  ?>
                                                                        <li><i class="bi bi-star-fill"></i></li>	
                                                                    <?php	}
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        <?php endif ?>
                                                    </div>
                                                    <p><?php echo wp_kses($item['restho_testimonial_one_description'], wp_kses_allowed_html('post')) ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if( !empty( $settings['restho_testimonial_content_style_selection'] ) && ($settings['restho_testimonial_content_style_selection'] == 'style_two') )  : ?> 
                <div class="home3-testimonial">
                    <div class="row mb-50">
                        <div class="swiper home3-testimonial-slider">
                            <div class="swiper-wrapper">
                            <?php foreach($items2 as $item2):?>
                                <div class="swiper-slide">
                                    <div class="testimonial-wrap">
                                        <div class="testimonial-content">
                                            <?php if ($settings['restho_testimonial_two_quote_switcher'] == 'yes') : ?>
                                                <div class="quoat-icon">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/Comma.svg" alt="<?php echo esc_attr__('quate-icon', 'restho') ?>">
                                                </div>
                                            <?php endif ?>
                                            <p><?php echo wp_kses($item2['restho_testimonial_two_description'], wp_kses_allowed_html('post')) ?></p>
                                        </div>
                                        <div class="testi-author-area">
                                            <div class="author-img">
                                                <img src="<?php echo esc_url($item2['restho_testimonial_two_author_img']['url']) ?>" alt="<?php echo esc_attr__('testi-author-img', 'restho') ?>">
                                            </div>
                                            <div class="name-review">
                                                <h5><?php echo esc_html($item2['restho_testimonial_two_name']) ?></h5>
                                                <?php if ($settings['restho_testimonial_two_rating_switcher'] == 'yes') : ?>
                                                    <ul>
                                                        <?php
                                                            for ($i=0; $i <$item2['restho_testimonial_two_rating'] ; $i++) {  ?>
                                                            <li><i class="bi bi-star-fill"></i></li>	
                                                        <?php	}
                                                        ?>
                                                    </ul>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?> 
                            </div>
                        </div>
                    </div>
                    <?php if ($settings['restho_testimonial_two_pagination_switcher'] == 'yes') : ?>
                        <div class="row">
                            <div class="col-lg-12">                         
                                    <div class="slider-btn">
                                        <div class="prev-btn-4">
                                            <i class="bi bi-arrow-left-short"></i>
                                        </div>
                                        <div class="next-btn-4">
                                            <i class="bi bi-arrow-right-short"></i>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            <?php endif ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Restho_Testimonial_Widget());
