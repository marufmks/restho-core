<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Practice_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_practice_area';
    }

    public function get_title()
    {
        return esc_html__('EG Practice Area', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-editor-list-ul';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
        //Content Section


        $this->start_controls_section(
            'corelaw_projects_general_section',
            [
                'label' => esc_html__('General', 'corelaw-core')
            ]
        );
        $this->add_control(
            'corelaw_practice_general_section_selection',
            [
                'label'     => esc_html__( 'Style', 'corelaw-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'        => esc_html__( 'Style One', 'corelaw-core' ),
                    'style_two'        => esc_html__( 'Style Two', 'corelaw-core' ),
                    'style_three'      => esc_html__( 'Style Three', 'corelaw-core' ),
                ],
            ]
        );
		$this->add_control(
			'corelaw_practice_design_three_card_design_choose_content',
			[
				'label' => esc_html__( 'Card Background Light ON/OFF', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'shadow_on' => esc_html__( 'Black', 'corelaw-core' ),
				'shadow_off' => esc_html__( 'White', 'corelaw-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition' => [
                    'corelaw_practice_general_section_selection' => 'style_three',
                ],
			]
		);
        $this->add_control(
			'corelaw_pracrice_template_posts_per_page',
			[
				'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 3,
				'label_block' => false,
			]
		);
		$this->add_control(
			'corelaw_practice_template_orderby',
			[
				'label'   => esc_html__('Order By', 'corelaw-core'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'ID'         => esc_html__('Post Id', 'corelaw-core'),
					'author'     => esc_html__('Post Author', 'corelaw-core'),
					'title'      => esc_html__('Title', 'corelaw-core'),
					'post_date'  => esc_html__('Date', 'corelaw-core'),
					'rand'       => esc_html__('Random', 'corelaw-core'),
					'menu_order' => esc_html__('Menu Order', 'corelaw-core'),
				],
			]
		);
		$this->add_control(
			'corelaw_practice_template_order',
			[
				'label'   => esc_html__('Order', 'corelaw-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'asc'  => esc_html__('Ascending', 'corelaw-core'),
					'desc' => esc_html__('Descending', 'corelaw-core')
				],
				'default' => 'desc',
			]
		);
        
        
        $this->end_controls_section();  


        //Content Section
        $this->start_controls_section(
            'corelaw_practice_area_title_subtitle',
            [
                'label' => esc_html__('Content', 'corelaw-core'),
                'condition' => [
                    'corelaw_practice_general_section_selection' => 'style_two'
                ]
            ]
        );

        
      
        $this->add_control(
            'corelaw_practice_area_title_subtitle_section',
            [
                'label' => esc_html__( 'Subtitle', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'corelaw_practice_area_title_title_section',
            [
                'label' => esc_html__( 'Title', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );


      
        $this->add_control(
            'corelaw_practice_area_right_image',
            [
                'label' => esc_html__( 'Choose Image', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        
        $this->end_controls_section();  

        // ------------style one start-------------//
        //Icon Style
        $this->start_controls_section(
            'corelaw_practice_style_icon',
            [
            'label' => esc_html__('Icon', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_practice_general_section_selection' => 'style_one'
            ]
            ]
        );
        $this->add_control(
            'corelaw_practice_style_icon_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single .header .icon-area svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_icon_hover_color',
            [
                'label'     => esc_html__('Hover', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single.sibling1:hover .header svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .practice-single.sibling0:hover .header svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        //Button Style
        $this->start_controls_section(
            'corelaw_practice_style_button_section',
            [
                'label' => esc_html__('Button', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_practice_general_section_selection' => 'style_one'
                ]
            ]
        );
        $this->add_control(
            'corelaw_practice_style_button_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--outline' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_button_background',
            [
                'label'     => esc_html__('Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--outline' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'corelaw_practice_style_button_border',
                'selector' => '{{WRAPPER}} .btn--outline',
            ]
        );
        $this->add_responsive_control(
			'corelaw_practice_style_button_border_radius',
			[
			'corelaw_practice_style_button_border_radius',
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .capsule' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

			]

		);
        //Hover start

        $this->add_control(
            'corelaw_practice_style_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .practice-single.sibling1:hover .header a.eg-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_button_hover_background',
            [
                'label'     => esc_html__('Hover Primary Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btn--outline::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_button_hover_background_secondary',
            [
                'label'     => esc_html__('Hover Secondary Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btnn1:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btnn1::after' => 'background: {{VALUE}};',
                ],
            ]
        );

        

        $this->end_controls_section();

        //title Style
        $this->start_controls_section(
            'corelaw_practice_style_title',
            [
            'label' => esc_html__('Title', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_practice_general_section_selection' => 'style_one'
            ]
            ]
        );
        $this->add_control(
            'corelaw_practice_style_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single .header h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_title_typ',
                'selector' => '{{WRAPPER}} .practice-single .header h4',
        
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_title_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single .header h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //Hover start

        $this->add_control(
            'corelaw_practice_style_title_hover_color',
            [
                'label' => esc_html__( 'Title Hover', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single.sibling1:hover .header h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
        

        //Description Style
        $this->start_controls_section(
            'corelaw_practice_area_style_description',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_practice_general_section_selection' => 'style_one'
                ]
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single .body p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_description_typ',
                'selector' => '{{WRAPPER}} .practice-single .body p',
        
            ]
        );
        $this->add_control(
            'corelaw_practice_style_description_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single .body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        //Hover start

        $this->add_control(
            'corelaw_practice_style_description_hover_color',
            [
                'label' => esc_html__( 'Description Hover', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single:hover .body p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        //Learn more Button Style
        $this->start_controls_section(
             'corelaw_practice_area_style_one_learn_more_btn',
             [
                'label' => esc_html__('Learn More Button', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_practice_general_section_selection' => 'style_one'
                ]
             ]
        );
        $this->add_control(
            'corelaw_practice_style_one_learn_more_btn_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single .body .details-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_one_learn_more_btn_typ',
                'selector' => '{{WRAPPER}} .practice-single .body .details-btn',
        
            ]
        );
        $this->add_control(
            'corelaw_practice_style_one_learn_more_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single .body .details-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        //Hover start
        $this->add_control(
            'corelaw_practice_style_one_learn_more_btn_short_bar_color',
            [
                'label'     => esc_html__('Short Bar', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single .body .details-btn::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_one_larn_more_btn_long_bar_color',
            [
                'label'     => esc_html__('Short Bar', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single .body .details-btn::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        //Card content start
        $this->start_controls_section(
            'corelaw_practice_area_style_card_content',
            [
               'label' => esc_html__('Card', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                'corelaw_practice_general_section_selection' => 'style_one'
            ]
            ]
        );
        $this->add_control(
            'corelaw_practice_area_style_card_content_header_background',
            [
                'label'     => esc_html__('Header Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single.sibling0 .header' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .practice-single.sibling1 .body' => 'background: {{VALUE}};',       
                ],
            ]
        );
        //Hover start
        $this->add_control(
            'corelaw_practice_area_style_card_content_header_hover',
            [
                'label' => esc_html__( 'Header Hover', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single.sibling0:hover .header' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .practice-single.sibling1:hover .body' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_area_style_card_content_body_background',
            [
                'label'     => esc_html__('Body Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single.sibling0 .body' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .practice-single.sibling1 .header' => 'background: {{VALUE}};',

                    
                ],
            ]
        );

        //Hover start

        $this->add_control(
            'corelaw_practice_area_style_card_content_body_hover',
            [
                'label' => esc_html__( 'Body Hover', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single.sibling0:hover .body' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .practice-single.sibling1:hover .header' => 'background: {{VALUE}}',
                ],
            ]
        );
    
        $this->end_controls_section();
        // ------------style one end-------------//

        // ------------style two start-------------//

        //subtitle Section
        $this->start_controls_section(
            'corelaw_practice_top_title',
            [
                'label' => esc_html__('Subtitle', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_practice_general_section_selection' => 'style_two'
            ]
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_top_title_typ',
                'selector' => '{{WRAPPER}} .section-title2.sibling3 span',
        
            ]
        );
        
        $this->add_control(
            'corelaw_practice_top_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_top_title_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

     
        $this->add_control(
            'corelaw_practice_subtitle_border_color',
            [
                'label' => esc_html__( 'Border Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 span::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        $this->end_controls_section();  

        //title Section
        $this->start_controls_section(
            'corelaw_practice_top_subtitle',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_practice_general_section_selection' => 'style_two'
            ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_top_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title2.sibling3 h2',
        
            ]
        );
        
        $this->add_control(
            'corelaw_practice_top_subtitle_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_top_subtitle_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();  
        //Icon Style
        $this->start_controls_section(
            'corelaw_practice_style_two_icon',
            [
            'label' => esc_html__('Icon', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_practice_general_section_selection' => 'style_two'
            ]
            ]
        );
        $this->add_control(
            'corelaw_practice_style_two_icon_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //SL Style
        $this->start_controls_section(
            'corelaw_practice_style_sl_no',
            [
            'label' => esc_html__('Sl No', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_practice_general_section_selection' => 'style_two'
            ]
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_sl_no_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .sl-number' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_sl_no_typ',
                'selector' => '{{WRAPPER}} .practice-single2 .sl-number',
        
            ]
        );
        $this->add_control(
            'corelaw_practice_style_sl_no_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .sl-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //title style two
        $this->start_controls_section(
            'corelaw_practice_style_two_title',
            [
            'label' => esc_html__('Title', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_practice_general_section_selection' => 'style_two'
            ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_two_title_typ',
                'selector' => '{{WRAPPER}} .practice-single2 .content .text h5',
        
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_two_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .content .text h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_two_title_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .content .text h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Description style two
        $this->start_controls_section(
            'corelaw_practice_style_two_description',
            [
            'label' => esc_html__('Description', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_practice_general_section_selection' => 'style_two'
            ]
            ]
        );
        $this->add_control(
            'corelaw_practice_style_two_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .content .text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_two_description_typ',
                'selector' => '{{WRAPPER}} .practice-single2 .content .text p',
        
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_two_description_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .content .text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Learn more button style two
        $this->start_controls_section(
            'corelaw_practice_style_two_learn_more_btn',
            [
            'label' => esc_html__('Learn More Button', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_practice_general_section_selection' => 'style_two'
            ]
            ]
        );
        $this->add_control(
            'corelaw_practice_style_two_learn_more_btn_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .content .text .details-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_two_learn_more_btn_typ',
                'selector' => '{{WRAPPER}} .practice-single2 .content .text .details-btn',
        
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_two_learn_more_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .content .text .details-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_two_learn_more_btn_short_bar_color',
            [
                'label'     => esc_html__('Short Bar', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .content .text .details-btn::before' => 'background: {{VALUE}};',
                ],
            ]
        );
    
        $this->add_control(
            'corelaw_practice_style_two_learn_more_btn_long_bar_color',
            [
                'label'     => esc_html__('Long Bar', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single2 .content .text .details-btn::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ------------style two end-------------//

        // ------------style three start-------------//

        //Icon Style three
        $this->start_controls_section(
            'corelaw_practice_style_three_icon',
            [
                'label' => esc_html__('Icon', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_practice_general_section_selection' => 'style_three'
                ]
            ]
        );
        $this->add_control(
            'corelaw_practice_style_three_icon_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_three_icon_background',
            [
                'label'     => esc_html__('Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single3 .practice-image .practice-icon' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //title style three
        $this->start_controls_section(
            'corelaw_practice_style_three_title',
            [
            'label' => esc_html__('Title', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_practice_general_section_selection' => 'style_three'
            ]
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_three_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single3 .practice-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_three_title_typ',
                'selector' => '{{WRAPPER}} .practice-single3 .practice-content h4',
        
            ]
        );
        $this->add_control(
            'corelaw_practice_style_three_title_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single3 .practice-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Description style three
        $this->start_controls_section(
            'corelaw_practice_style_three_description',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_practice_general_section_selection' => 'style_three'
                ]
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_three_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single3 .practice-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_three_description_typ',
                'selector' => '{{WRAPPER}} .practice-single3 .practice-content p',
        
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_three_description_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single3 .practice-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Learn more button style three
        $this->start_controls_section(
            'corelaw_practice_style_three_learn_more_btn',
            [
            'label' => esc_html__('Learn More Button', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_practice_general_section_selection' => 'style_three'
            ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_three_learn_more_btn_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single3 .practice-content .details-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_practice_style_three_learn_more_btn_typ',
                'selector' => '{{WRAPPER}} .practice-single3 .practice-content .details-btn',
        
            ]
        );
        
        $this->add_control(
            'corelaw_practice_style_three_learn_more_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single3 .practice-content .details-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_practice_style_three_learn_more_btn_short_bar_color',
            [
                'label'     => esc_html__('Short Bar', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single3 .practice-content .details-btn::before' => 'background: {{VALUE}};',
                ],
            ]
        );
    
        $this->add_control(
            'corelaw_practice_style_three_learn_more_btn_long_bar_color',
            [
                'label'     => esc_html__('Long Bar', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single3 .practice-content .details-btn::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Card content start
        $this->start_controls_section(
            'corelaw_practice_area_style_three_card_content',
            [
               'label' => esc_html__('Card', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                'corelaw_practice_general_section_selection' => 'style_three'
            ],
            ]
        );
        $this->add_control(
            'corelaw_practice_area_style_three_card_background',
            [
                'label'     => esc_html__('Card Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single3' => 'background: {{VALUE}};',      
                ],
            ]
        );
        //Hover start
        $this->add_control(
            'corelaw_practice_area_style_three_card_hover',
            [
                'label' => esc_html__( 'Hover Background', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .practice-single3:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'corelaw_practice_area_style_three_card_border_radius',
			[
			'corelaw_practice_area_style_three_card_border_radius',
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .practice-single3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

			]

		);
        $this->add_control(
            'corelaw_practice_area_style_three_card_border_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .practice-single3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();



        // ------------style three end-------------//

    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $query = new \WP_Query(
			array(
				'post_type'      => 'egens-practice-area',
				'posts_per_page' => $settings['corelaw_pracrice_template_posts_per_page'],
				'orderby'        => $settings['corelaw_practice_template_orderby'],
				'order'          => $settings['corelaw_practice_template_order'],
		
				'post_status'    => 'publish'
			)
		);
        ?>
        <script>
        
            <?php if(is_admin()) :  ?>
                var slickopts = {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    autoplay: 1000,
                    spaceBetween: 20,
                    rows: 2, // Removes the linear order. Would expect card 5 to be on next row, not stacked in groups.
                    responsive: [
                        {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        },
                        },
                        {
                        breakpoint: 776,
                        settings: {
                            slidesToShow: 2,
                            rows: 2, // This doesn't appear to work in responsive (Mac/Chrome)
                        },
                        },
                        {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            rows: 2, // This doesn't appear to work in responsive (Mac/Chrome)
                        },
                        },
                    ],
                    };
                
                    jQuery(".slick-wrapper").slick(slickopts);


            // service-slider1
            var swiper = new Swiper(".practice3-slider", {
            slidesPerView: 1,
            speed: 1200,
            spaceBetween: 25,
            autoplay: true,
            loop: true,
            roundLengths: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: "true",
            },
            navigation: {
                nextEl: ".service-prev1",
                prevEl: ".service-next1",
            },
            breakpoints: {
                280: {
                slidesPerView: 1,
                navigation: false,
                },
                576: {
                slidesPerView: 2,
                navigation: false,
                },
                768: {
                slidesPerView: 2,
                navigation: false,
                },
                992: {
                slidesPerView: 3,
                },
                1200: {
                slidesPerView: 3,
                },
            },
            });
        
            <?php endif ?>
        </script>

        <!-- content one-->
            <?php if ( $settings['corelaw_practice_general_section_selection'] == 'style_one' ) : ?>

            <!-- Content -->

                <div class="practice-area-section">
                        <div class="row justify-content-center g-4">
                            <?php
                                $count = 0;
                                if ( $query ->have_posts() ) {
                                while( $query -> have_posts() ) {
                                    $query -> the_post();
                                    $count++;
                                    $practice_info = get_post_meta( get_the_ID(), 'egens_practice_info_options', true); 
                                ?>
                                <!-- Content  -->

                                <div class="col-lg-4 col-md-6 col-sm-10">
                                    <div class="practice-single <?php echo ( ($count%2) == 0) ? 'sibling1' : 'sibling0' ?>  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                        <div class="header">
                                            <div class="icon-area">
                                                <?php if( !empty( $practice_info['project_icon']['url'] ) ) : ?>
                                                    <?php echo file_get_contents($practice_info['project_icon']['url']) ?>
                                                <?php endif ?>
                                                <a href="<?php the_permalink()?>" class="eg-btn btn--primary btn--outline btn--sm capsule <?php echo ( ($count%2) == 0) ? 'btnn1' : 'btnn0' ?>"><?php echo esc_html__('Completed Case','corelaw-core')?> <?php echo esc_html( $practice_info['project_complete_number']) ?></a>
                                            </div>
                                            <h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
                                        </div>
                                        <div class="body">
                                            <p><?php echo wp_trim_words( get_the_content(), 15 ); ?></p>
                                            <a href="<?php the_permalink()?>" class="details-btn"><?php echo esc_html__('Learn More','corelaw-core')?></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Content End -->
                                <?php
                                }
                                }
                                wp_reset_postdata();
                            ?>
                        </div>
                </div>

            <?php endif ?>

        <!-- content two-->
            <?php if ( $settings['corelaw_practice_general_section_selection'] == 'style_two' ) : ?>

                <div class="practice-area-section2">
					<div class="container-fluid">
                        <div class="row align-items-end">
                            <div class="col-xl-6 overflow-hidden position-relative">
                                <div class="section-title2 sibling3 text-xl-start text-center">
                                    <?php if( !empty( $settings['corelaw_practice_area_title_subtitle_section'] ) ) :   ?>
                                        <span><?php echo esc_html($settings['corelaw_practice_area_title_subtitle_section'] )?></span>         
                                    <?php endif ?>
                                    <?php if( !empty( $settings['corelaw_practice_area_title_title_section'] ) ) :   ?>
                                          <h2><?php echo esc_html($settings['corelaw_practice_area_title_title_section'] )?></h2>          
                                    <?php endif ?>
                                </div>
                                <div class="slick-wrapper mt-40">
                                <?php
                                $count = 0;
                                if ( $query ->have_posts() ) {
                                while( $query -> have_posts() ) {
                                    $query -> the_post();
                                    $count++;
                                    $practice_info = get_post_meta( get_the_ID(), 'egens_practice_info_options', true); 
                                ?>
                                <!-- Content -->
                                    
                                    <div class="practice-single2">
                                        <span class="sl-number"><?php echo esc_html(sprintf( '%02d',$count )) ?></span>
                                        <div class="content">
                                            <div class="icon">
                                                <?php if( !empty( $practice_info['project_icon']['url'] ) ) : ?>
                                                    <?php echo file_get_contents($practice_info['project_icon']['url']) ?>
                                                <?php endif ?>
                                            </div>
                                            <div class="text">
                                                <h5><a href="<?php the_permalink()?>"><?php the_title()?></a></h5>
                                                <p><?php echo wp_trim_words( get_the_content(), 7 ); ?></p>
                                                <a href="<?php the_permalink()?>" class="details-btn"><?php echo esc_html__('Learn More','corelaw-core')?></a>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Content End -->
                                <?php
                                    }
                                    }
                                    wp_reset_postdata();
                                ?>

                                </div>
                            </div>
                            <div class="col-xl-6 d-xl-flex d-none">
                                <?php if( !empty( $settings['corelaw_practice_area_right_image']['url'] ) ) :   ?>
                                       <img src="<?php echo esc_url($settings['corelaw_practice_area_right_image']['url'])?>" class="img-fluid" alt="image">         
                                <?php endif ?>
                            </div>
                        </div>
					</div>
                </div>

            <?php endif;?>

        <!-- content three-->
            <?php if ( $settings['corelaw_practice_general_section_selection'] == 'style_three' ) : ?>

            <!-- Content -->

                <div class="practice-area-section">
                        <div class="row justify-content-center g-4">
                            <div class="col-12">
                                <div class="swiper practice3-slider pb-65">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $count = 0;
                                        if ( $query ->have_posts() ) {
                                        while( $query -> have_posts() ) {
                                            $query -> the_post();
                                            $count++;
                                            $practice_info = get_post_meta( get_the_ID(), 'egens_practice_info_options', true); 
                                        ?>
                                        <!-- Content -->

                                            <div class="swiper-slide wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                                <div class="practice-single3 <?php echo $settings['corelaw_practice_design_three_card_design_choose_content'] == 'yes' ? 'sibling2' : '' ?>">
                                                    <div class="practice-image">
                                                        <?php the_post_thumbnail('',['class' => 'img-fluid']); ?>
                                                        <div class="practice-icon">
                                                        <?php if( !empty( $practice_info['project_icon']['url'] ) ) : ?>
                                                            <?php echo file_get_contents($practice_info['project_icon']['url']) ?>
                                                        <?php endif ?>
                                                        </div>
                                                    </div>
                                                    <div class="practice-content">
                                                        <h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
                                                        <p class="para"><?php echo wp_trim_words( get_the_content(), 9 ); ?></p>
                                                        <a href="<?php the_permalink()?>" class="details-btn"><?php echo esc_html__('Learn More','corelaw-core')?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Content End -->
                                        <?php
                                            }
                                            }
                                            wp_reset_postdata();
                                        ?>

                                    </div>
                                    <div class="swiper-pagination d-flex align-items-center justify-content-center"></div>
                                </div>
                            </div>
                        </div>
                </div>

            <?php endif;?>
        <?php 
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Practice_Widget());

