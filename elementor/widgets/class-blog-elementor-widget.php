<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class corelaw_Blog_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_blog';
    }

    public function get_title()
    {
        return esc_html__('EG Blog', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {

        //grneral section
        $this->start_controls_section(
            'corelaw_blog_general_section',
            [
                'label' => esc_html__('General', 'corelaw-core')
            ]
        );


        
        $this->add_control(
            'corelaw_blog_general_section_select',
            [
                'label'     => esc_html__( 'Style', 'corelaw-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'        => esc_html__( 'Style One', 'corelaw-core' ),
                    'style_two'        => esc_html__( 'Style Two', 'corelaw-core' ),
                    'style_three'      => esc_html__( 'Style Three', 'corelaw-core' ),
					'style_four'      => esc_html__( 'Blog Grid', 'corelaw-core' ),
					'style_five'      => esc_html__( 'Blog Standard', 'corelaw-core' ),
                ],
            ]
        );
        $this->add_control(
            'corelaw_blog_heading_content_sub_title',
            [
                'label' => esc_html__('Heading Subtitle', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is Heading Subtitle', 'corelaw-core'),
                'label_block' => true,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_two',
                ],
            ]
        );
        $this->add_control(
            'corelaw_blog_heading_content_title',
            [
                'label' => esc_html__('Heading Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is Heading Title', 'corelaw-core'),
                'label_block' => true,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_two',
                ],
                
            ]
        );
        $this->add_control(
			'corelaw_blog_pagination_icon',
			[
				'label' => esc_html__( 'Pagination Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'corelaw-core' ),
				'label_off' => esc_html__( 'Disable', 'corelaw-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_two',
                ],
			]
		);

        $this->add_control(
			'corelaw_blog_design_three_box_shadow_choose_content',
			[
				'label' => esc_html__( 'Card Shadow ON/OFF', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'shadow_on' => esc_html__( 'Show', 'corelaw-core' ),
				'shadow_off' => esc_html__( 'Hide', 'corelaw-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_three',
                ],
			]
		);


        $this->add_control(
			'corelaw_blog_posts_per_page',
			[
				'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 5,
				'label_block' => false,
			]
		);
		$this->add_control(
			'corelaw_blog_template_order_by',
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
			'corelaw_blog_template_order',
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


        //btn Section
        $this->start_controls_section(
            'corelaw_blogg_btn',
            [
                'label' => esc_html__('Button', 'corelaw-core'),
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_two',
                ],
            ]
        );

       
        $this->add_control(
            'corelaw_blogg_btn_title',
            [
                'label' => esc_html__( 'Title', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
            ]
        );

       
        $this->add_control(
            'corelaw_blogg_btn_link',
            [
                'label' => esc_html__( 'Link', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'corelaw-core' ),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        
        
        $this->end_controls_section();  

        // --------------style one start----------------------//

        //category Style
        $this->start_controls_section(
             'corelaw_blog_one_category_section',
             [
                'label' => esc_html__('Category', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_one'
                ]
             ]
        );

       
        $this->add_control(
            'corelaw_blog_one_category_colorr',
            [
                'label' => esc_html__( 'Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .l-news-single .news-badge' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_one_category_section_typ',
                'selector' => '{{WRAPPER}} .l-news-single .news-badge',
        
            ]
        );
        
        $this->add_control(
            'corelaw_blog_one_category_section_color',
            [
                'label'     => esc_html__('Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .l-news-single .news-badge' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_blog_one_category_section_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .l-news-single .news-badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'corelaw_blog_one_category_section_border_radius',
			[
			'corelaw_blog_one_category_border_radius',
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .l-news-single .news-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
          
			]

		);

        //Hover start
        $this->add_control(
            'corelaw_blog_one_category_section_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .l-news-single .news-badge:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_blog_one_category_section_hover_background',
            [
                'label'     => esc_html__('Hover Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .l-news-single .news-badge:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        //date Style
        $this->start_controls_section(
            'corelaw_blog_one_date_section',
            [
               'label' => esc_html__('Date', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'corelaw_blog_general_section_select' => 'style_one'
               ]
            ]
       );


       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'corelaw-core'),
               'name'     => 'corelaw_blog_one_date_section_typ',
               'selector' => '{{WRAPPER}} .l-news-single .text .date',
       
           ]
       );
       
       $this->add_control(
           'corelaw_blog_one_date_section_color',
           [
               'label'     => esc_html__('Color', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .l-news-single .text .date' => 'color: {{VALUE}};',
               ],
           ]
       );
       $this->add_control(
           'corelaw_blog_one_date_section_margin',
           [
               'label' => esc_html__( 'Margin', 'corelaw-core' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .l-news-single .text .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
       );
       
       $this->end_controls_section();

        //title Style
        $this->start_controls_section(
             'corelaw_blog_one_title_section',
             [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_one'
                ]
             ]
        );

        $this->add_control(
            'corelaw_blog_one_title_section_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .l-news-single .text h4' => 'color: {{VALUE}};',
                ],
            ]
        );   
        $this->add_control(
            'corelaw_blog_one_title_section_content_background',
            [
                'label'     => esc_html__('Title Bar', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .l-news-single .text h4::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_one_title_section_typ',
                'selector' => '{{WRAPPER}} .l-news-single .text h4',
        
            ]
        );
        $this->add_control(
            'corelaw_blog_one_title_section_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .l-news-single .text h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // --------------style one end----------------------//

        // --------------style two start---------------//
        //Heading Title Style
        $this->start_controls_section(
            'corelaw_blog_style_heading_title_section',
            [
                'label' => esc_html__('Heading Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'corelaw_blog_style_heading_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_style_heading_title_typography',
                'selector' => '{{WRAPPER}} .section-title2 h2',

            ]
        );
        
        $this->add_responsive_control(
            'corelaw_blog_style_heading_title_padding',
            [
                'label'      => __('Padding', 'corelaw-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ]
            ]
        );
        $this->end_controls_section();
        //Heading Subtitle Style
        $this->start_controls_section(
            'corelaw_blog_style_heading_sub_title_section',
            [
                'label' => esc_html__('Heading Subtitle', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'corelaw_blog_style_heading_sub_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_style_heading_sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title2 span',

            ]
        );
        
        $this->add_responsive_control(
            'corelaw_blog_style_heading_sub_title_padding',
            [
                'label'      => __('Padding', 'corelaw-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ]
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'corelaw_blog_style_heading_sub_title_bar_color',
				'label' => esc_html__( 'Bar Color', 'corelaw-core' ),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .section-title2.sibling3 span::after',
			]
		);
        $this->end_controls_section();

        //categort Style
        $this->start_controls_section(
            'corelaw_blog_two_section_category',
            [
               'label' => esc_html__('Category', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'corelaw_blog_general_section_select' => 'style_two'
               ]
            ]
        );
        $this->add_control(
            'corelaw_blog_two_section_category_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single1 .image .blog-badge' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'corelaw-core'),
               'name'     => 'corelaw_blog_two_section_category_typ',
               'selector' => '{{WRAPPER}} .blog-single1 .image .blog-badge',
       
           ]
        );
         
        $this->add_control(
           'corelaw_blog_two_section_category_background',
           [
               'label'     => esc_html__('Background', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .image .blog-badge' => 'background: {{VALUE}};',
               ],
           ]
        );
        $this->add_control(
           'corelaw_blog_two_section_category_margin',
           [
               'label' => esc_html__( 'Margin', 'corelaw-core' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .image .blog-badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
        );

        //Hover start
        $this->add_control(
           'corelaw_blog_two_section_category_hover_color',
           [
               'label'     => esc_html__('Hover Color', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .image .blog-badge:hover' => 'color: {{VALUE}};',
               ],
           ]
        );
        $this->add_control(
           'corelaw_blog_two_section_category_hover_background',
           [
               'label'     => esc_html__('Hover Background', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .image .blog-badge:hover' => 'background: {{VALUE}};',
               ],
           ]
        );

        $this->end_controls_section();

        //date Style
        $this->start_controls_section(
           'corelaw_blog_two_date_section',
           [
              'label' => esc_html__('Date', 'corelaw-core'),
              'tab'   => Controls_Manager::TAB_STYLE,
              'condition' => [
                  'corelaw_blog_general_section_select' => 'style_two'
              ]
           ]
        );
      
        $this->add_control(
            'corelaw_blog_two_date_section_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single1 .post-meta .date' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_two_date_section_typ',
                'selector' => '{{WRAPPER}} .blog-single1 .post-meta .date',

        
            ]
        );
        $this->add_control(
            'corelaw_blog_two_date_section_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single1 .post-meta .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );    
        $this->end_controls_section();

        //comments Style
        $this->start_controls_section(
            'corelaw_blog_two_comments_section',
            [
            'label' => esc_html__('Comments', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_blog_general_section_select' => 'style_two'
            ]
            ]
        );
  
        $this->add_control(
            'corelaw_blog_two_comments_section_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single1 .post-meta a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_two_comments_section_typ',
                'selector' => '{{WRAPPER}} .blog-single1 .post-meta a',
        
            ]
        );
        $this->add_control(
            'corelaw_blog_two_comments_section_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single1 .post-meta a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );    
        $this->end_controls_section();

        //title Style
        $this->start_controls_section(
                'corelaw_blog_two_section_title',
                [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_two'
                ]
                ]
        );
        $this->add_control(
            'corelaw_blog_two_section_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single1 .text h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_two_section_title_typ',
                'selector' => '{{WRAPPER}} .blog-single1 .text h4 a',
        
            ]
        );
        $this->add_control(
            'corelaw_blog_two_section_title_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single1 .text h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //Hover start

        $this->add_control(
            'corelaw_blog_two_section_title_hover_color',
            [
                'label' => esc_html__( 'Title Hover Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-blog-2 .content h4:hover a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

       //description Style
       $this->start_controls_section(
            'corelaw_blog_two_section_description',
            [
               'label' => esc_html__('Description', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'corelaw_blog_general_section_select' => 'style_two'
               ]
            ]
        );
        $this->add_control(
            'corelaw_blog_two_section_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .para' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_two_section_description_typ',
                'selector' => '{{WRAPPER}} .para',
        
            ]
        );
       
       
        $this->add_control(
            'corelaw_blog_two_section_description_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .para' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
            
        $this->end_controls_section();

        //Btn Style
        $this->start_controls_section(
             'corelaw_blog_two_section_btn_section',
             [
                'label' => esc_html__('Button', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_two'
                ]
             ]
        );
        
        
       
        $this->add_control(
            'corelaw_blog_two_section_btn_section_color',
            [
                'label' => esc_html__( 'Button Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--outline.sibling3' => 'color: {{VALUE}}',
                ],
            ]
        );

     
        $this->add_control(
            'corelaw_blog_two_section_btn_section_color_border',
            [
                'label' => esc_html__( 'Button Border Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--outline.sibling3' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );

       
        $this->add_control(
            'corelaw_blog_two_section_btn_section_background_color',
            [
                'label' => esc_html__( 'Background Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--outline' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'corelaw_blog_two_section_btn_section_background_color_hover',
            [
                'label' => esc_html__( 'Hover Background Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--outline.sibling3:hover::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->end_controls_section();

       // ---------------style two end----------------------//

        // --------------style three start----------------------//

        //author Style
        $this->start_controls_section(
             'corelaw_blog_three_author_section',
             [
                'label' => esc_html__('Author', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_three'
                ]
             ]
        );

        $this->add_control(
            'corelaw_blog_three_author_section_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .image .blog-badge' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_three_author_section_typ',
                'selector' => '{{WRAPPER}} .blog-single2 .image .blog-badge',
        
            ]
        );

        $this->add_control(
            'corelaw_blog_three_author_section_background',
            [
                'label'     => esc_html__('Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .image .blog-badge' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_blog_three_author_section_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .image .blog-badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'corelaw_blog_three_author_section_border_radius',
			[
			'corelaw_blog_three_author_border_radius',
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .blog-single2 .image .blog-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

			]

		);

        $this->end_controls_section();

        //category Style
        $this->start_controls_section(
            'corelaw_blog_three_category_section',
            [
               'label' => esc_html__('Categoryc& Date', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'corelaw_blog_general_section_select' => 'style_three'
               ]
            ]
        );
        $this->add_control(
            'corelaw_blog_three_category_section_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .content .post-meta-list li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_three_category_section_typ',
                'selector' => '{{WRAPPER}} .blog-single2 .content .post-meta-list li',
        
            ]
        );
        $this->add_control(
            'corelaw_blog_three_category_section_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .content .post-meta-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        //Category Bar

        $this->add_control(
            'corelaw_blog_three_category_section_content_background',
            [
                'label'     => esc_html__('Category Bar', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .content .post-meta-list li::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

            //Title 
        $this->start_controls_section(
            'corelaw_blog_three_title_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_three'
                ]
            ]
        );
    
        $this->add_control(
            'corelaw_blog_three_title_section_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_three_title_section_typ',
                'selector' => '{{WRAPPER}} .blog-single2 .content h5 a',
        
            ]
        );
        $this->add_control(
            'corelaw_blog_three_title_section_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //Hover start

        $this->add_control(
            'corelaw_blog_three_title_section_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .content h5:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //description Style

            $this->start_controls_section(
                'corelaw_blog_three_section_description',
                [
                'label' => esc_html__('Description', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_three'
                ]
                ]
            );
        
        $this->add_control(
            'corelaw_blog_three_section_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_three_section_description_typ',
                'selector' => '{{WRAPPER}} .blog-single2 .content p',
        
            ]
        );
        $this->add_control(
            'corelaw_blog_three_section_description_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single2 .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    
        $this->end_controls_section();

        // --------------style three end----------------------//

        //Latest Article Area Style
        $this->start_controls_section(
            'corelaw_blog_two_latest_article',
            [
               'label' => esc_html__('Latest Article', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'corelaw_blog_general_section_select' => 'style_two'
               ]
            ]
       );
       $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_two_latest_article_title_typ',
                'selector' => '{{WRAPPER}} .recent-news li .text h6 a',
        
            ]
        );
        
        $this->add_control(
            'corelaw_blog_two_latest_article_title_color',
            [
                'label'     => esc_html__('Title Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recent-news li .text h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_blog_two_latest_article_title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .recent-news li .text h6 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //Hover start

        $this->add_control(
            'corelaw_blog_two_latest_article_title_hover_color',
            [
                'label' => esc_html__( 'Title Hover Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .recent-news li .text h6 a:hover' => 'color: {{VALUE}}',

                
                ],
            ]
        );
        //Hover end
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Date Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_two_latest_article_date_section_typ',
                'selector' => '{{WRAPPER}} .recent-news li .text .post-meta .date',
  
        
            ]
        );
        
        $this->add_control(
            'corelaw_blog_two_latest_article_date_section_color',
            [
                'label'     => esc_html__('Date Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recent-news li .text .post-meta .date' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_blog_two_latest_article_date_section_margin',
            [
                'label' => esc_html__( 'Date Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .recent-news li .text .post-meta .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Comments Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_two_latest_article_comments_section_typ',
                'selector' => '{{WRAPPER}} .recent-news li .text .post-meta a',
        
            ]
        );
   
        $this->add_control(
            'corelaw_blog_two_latest_article_comments_section_color',
            [
                'label'     => esc_html__('Comments Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recent-news li .text .post-meta a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_blog_two_latest_article_comments_section_margin',
            [
                'label' => esc_html__( 'Comments Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .recent-news li .text .post-meta a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );    
       $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_two_latest_article_btn_typ',
                'selector' => '{{WRAPPER}} .btn--outline.sibling3',
        
            ]
        );

       $this->add_control(
            'corelaw_blog_two_latest_article_btn_color',
            [
                'label'     => esc_html__('Button Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--outline.sibling3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Button Border', 'corelaw-core' ),
				'selector' => '{{WRAPPER}} .btn--outline.sibling3',
			]
		);
        $this->add_control(
            'corelaw_blog_two_latest_article_btn_hover_color',
            [
                'label'     => esc_html__('Hover Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .btn--outline.sibling3::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'corelaw_blog_two_latest_article_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'corelaw-core' ),
				'selector' => '{{WRAPPER}} .latest-articel-area',
			]
		);
        
        $this->end_controls_section();


        //card content style one
        $this->start_controls_section(
             'corelaw_blog_three_card_content_section',
             [
                'label' => esc_html__('Card Content', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_one'
                ]
             ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'corelaw_blog_three_card_content_background',
				'label' => esc_html__( 'Background', 'corelaw-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .l-news-single',
			]
		);
        $this->add_responsive_control(
			'corelaw_blog_one_card_content_section_border_radius',
			[
			'corelaw_blog_one_card_content_border_radius',
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .l-news-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
          

			]

		);

        $this->end_controls_section();

        //card content style two
        $this->start_controls_section(
             'corelaw_blog_two_card_content_image_section',
             [
                'label' => esc_html__('Card content', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_two'
                ]
             ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'corelaw_blog_two_card_content_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'corelaw-core' ),
				'selector' => '{{WRAPPER}} .blog-single1',
			]
		);
        $this->add_responsive_control(
			'corelaw_blog_style_two_card_content_border_radius',
			[
			'corelaw_blog_two_image_border_radius',
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .blog-single1 .image img, .blog-single1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
          

			]

		);
        
        $this->end_controls_section();

        //card content style three
        $this->start_controls_section(
            'corelaw_blog_three_card_content_image_section',
            [
               'label' => esc_html__('Card content', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'corelaw_blog_general_section_select' => 'style_three'
               ]
            ]
       );

       $this->add_responsive_control(
           'corelaw_blog_style_three_card_content_border_radius',
           [
           'corelaw_blog_two_image_border_radius',
               'label'      		=> __('Border Radius', 'corelaw-core'),
               'type'       		=> Controls_Manager::DIMENSIONS,
               'size_units' 		=> ['px', '%'],
               'selectors'  		=> [
                   '{{WRAPPER}} .blog-single2, .blog-single1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
         

           ]

       );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'corelaw_blog_style_three_card_content_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'corelaw-core' ),
                'selector' => '{{WRAPPER}} .blog-single2.sibling2',
            ]
        );

       
       $this->add_control(
           'corelaw_blog_three_reading_card_content_three_section_background',
           [
               'label' => esc_html__( 'Background', 'corelaw-core' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-single2 .content' => 'background: {{VALUE}}',
               ],
           ]
       );

       $this->end_controls_section();

       //Navigation icon Style
       $this->start_controls_section(
            'style_blog_navigation_icon_section',
            [
                'label' => esc_html__('Navigation Icon', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_one'
                ]
            ]
        );
        $this->add_control(
            'corelaw_blog_style_navigation_icon_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet-active::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'corelaw_blog_style_navigation_icon_border',
                'selector' => '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet-active',
            ]
        );
        $this->end_controls_section();
		
		  // --------------style four start----------------------//

        //category Style
        $this->start_controls_section(
            'corelaw_blog_four_category_section',
            [
               'label' => esc_html__('Category', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'corelaw_blog_general_section_select' => 'style_four'
               ]
            ]
       );
       
       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'corelaw-core'),
               'name'     => 'corelaw_blog_four_category_section_typ',
               'selector' => '{{WRAPPER}} .blog-single1 .image .blog-badge',
       
           ]
       );

       $this->add_control(
        'corelaw_blog_four_category_section_text_color',
        [
            'label'     => esc_html__('Text Color', 'corelaw-core'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog-single1 .image .blog-badge' => 'color: {{VALUE}};',
            ],
        ]
    );
       
       $this->add_control(
           'corelaw_blog_four_category_section_color',
           [
               'label'     => esc_html__('Background', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .image .blog-badge' => 'background: {{VALUE}};',
               ],
           ]
       );
       $this->add_control(
           'corelaw_blog_four_category_section_margin',
           [
               'label' => esc_html__( 'Margin', 'corelaw-core' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .image .blog-badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
       );
       $this->add_responsive_control(
           'corelaw_blog_four_category_section_border_radius',
           [
           'corelaw_blog_four_category_border_radius',
               'label'      		=> __('Border Radius', 'corelaw-core'),
               'type'       		=> Controls_Manager::DIMENSIONS,
               'size_units' 		=> ['px', '%'],
               'selectors'  		=> [
                   '{{WRAPPER}} .blog-single1 .image .blog-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]

       );

       //Hover start
       $this->add_control(
           'corelaw_blog_four_category_section_hover_color',
           [
               'label'     => esc_html__('Hover Color', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .image .blog-badge:hover' => 'color: {{VALUE}};',
               ],
           ]
       );
       $this->add_control(
           'corelaw_blog_four_category_section_hover_background',
           [
               'label'     => esc_html__('Hover Background', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .image .blog-badge:hover' => 'background: {{VALUE}};',
               ],
           ]
       );
       
       $this->end_controls_section();

       //date Style
       $this->start_controls_section(
           'corelaw_blog_four_date_section',
           [
              'label' => esc_html__('Date', 'corelaw-core'),
              'tab'   => Controls_Manager::TAB_STYLE,
              'condition' => [
                  'corelaw_blog_general_section_select' => 'style_four'
              ]
           ]
      );


      $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
              'label'    => esc_html__('Typography', 'corelaw-core'),
              'name'     => 'corelaw_blog_four_date_section_typ',
              'selector' => '{{WRAPPER}}  a.dateee',
      
          ]
      );
      
      $this->add_control(
          'corelaw_blog_four_date_section_color',
          [
              'label'     => esc_html__('Color', 'corelaw-core'),
              'type'      => Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}}  a.dateee' => 'color: {{VALUE}};',
              ],
          ]
      );
      $this->add_control(
          'corelaw_blog_four_date_section_margin',
          [
              'label' => esc_html__( 'Margin', 'corelaw-core' ),
              'type' => \Elementor\Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%', 'em' ],
              'selectors' => [
                  '{{WRAPPER}}  a.dateee' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
              ],
          ]
      );
      
      $this->end_controls_section();

       //Comments Style
       $this->start_controls_section(
            'corelaw_blog_four_comments_section',
            [
                'label' => esc_html__('Comments', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'corelaw_blog_four_comments_section_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmentt' => 'color: {{VALUE}};',
                ],
            ]
        );   
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_four_comments_section_typ',
                'selector' => '{{WRAPPER}} .cmentt',
        
            ]
        );
        $this->add_control(
            'corelaw_blog_four_comments_section_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .cmentt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //title Style
        $this->start_controls_section(
            'corelaw_blog_four_title_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_four'
                ]
            ]
        );

       $this->add_control(
           'corelaw_blog_four_title_section_color',
           [
               'label'     => esc_html__('Color', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .text h4 a' => 'color: {{VALUE}};',
               ],
           ]
       );   
       $this->add_control(
           'corelaw_blog_four_title_section_hover_color',
           [
               'label'     => esc_html__('Hover Color', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .text h4 a' => 'color: {{VALUE}};',
               ],
           ]
       );   
       
       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'corelaw-core'),
               'name'     => 'corelaw_blog_four_title_section_typ',
               'selector' => '{{WRAPPER}} .blog-single1 .text h4 a',
       
           ]
       );

       $this->add_control(
           'corelaw_blog_four_title_section_margin',
           [
               'label' => esc_html__( 'Margin', 'corelaw-core' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .blog-single1 .text h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
       );

       $this->end_controls_section();

       //card Content style

       $this->start_controls_section(
        'corelaw_blog_four_card_style_section',
            [
                'label' => esc_html__('Card Content', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_four'
                ]
            ]
        );

        $this->add_control(
            'corelaw_blog_four_card_section_normal_color',
            [
                'label'     => esc_html__('Card Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-single1' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'corelaw_blog_four_category_card_border_radius',
            [
            'corelaw_blog_four_category_border_radius',
                'label'      		=> __('Card Radius', 'corelaw-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .blog-single1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
 
            ]
 
        );


        $this->end_controls_section();
         // --------------style five start----------------------//

        //category Style
        $this->start_controls_section(
            'corelaw_blog_five_category_section',
            [
               'label' => esc_html__('Category', 'corelaw-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'corelaw_blog_general_section_select' => 'style_five'
               ]
            ]
       );
       
       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'corelaw-core'),
               'name'     => 'corelaw_blog_five_category_section_typ',
               'selector' => '{{WRAPPER}} .blog-standard-single .image .blog-badge',
       
           ]
       );

       $this->add_control(
        'corelaw_blog_five_category_section_text_color',
        [
            'label'     => esc_html__('Text Color', 'corelaw-core'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog-standard-single .image .blog-badge' => 'color: {{VALUE}};',
            ],
        ]
    );
       
       $this->add_control(
           'corelaw_blog_five_category_section_color',
           [
               'label'     => esc_html__('Background', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-standard-single .image .blog-badge' => 'background: {{VALUE}};',
               ],
           ]
       );
       $this->add_control(
           'corelaw_blog_five_category_section_margin',
           [
               'label' => esc_html__( 'Margin', 'corelaw-core' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .blog-standard-single .image .blog-badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
       );
       $this->add_responsive_control(
           'corelaw_blog_five_category_section_border_radius',
           [
           'corelaw_blog_five_category_border_radius',
               'label'      		=> __('Border Radius', 'corelaw-core'),
               'type'       		=> Controls_Manager::DIMENSIONS,
               'size_units' 		=> ['px', '%'],
               'selectors'  		=> [
                   '{{WRAPPER}} .blog-standard-single .image .blog-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]

       );

       //Hover start
       $this->add_control(
           'corelaw_blog_five_category_section_hover_color',
           [
               'label'     => esc_html__('Hover Color', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-standard-single .image .blog-badge:hover' => 'color: {{VALUE}};',
               ],
           ]
       );
       $this->add_control(
           'corelaw_blog_five_category_section_hover_background',
           [
               'label'     => esc_html__('Hover Background', 'corelaw-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .blog-standard-single .image .blog-badge:hover' => 'background: {{VALUE}};',
               ],
           ]
       );
       
       $this->end_controls_section();

        //title Style
        $this->start_controls_section(
            'corelaw_blog_five_title_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_blog_general_section_select' => 'style_five'
                ]
            ]
        );

        $this->add_control(
            'corelaw_blog_five_title_section_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-standard-single .text h2 a' => 'color: {{VALUE}};',
                ],
            ]
        );   
           

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_blog_five_title_section_typ',
                'selector' => '{{WRAPPER}} .blog-standard-single .text h2 a',

            ]
        );

        $this->add_control(
            'corelaw_blog_five_title_section_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-standard-single .text h2 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

       //Post Meta Style
       $this->start_controls_section(
           'corelaw_blog_five_post_meta_section',
           [
              'label' => esc_html__('Post Meta List', 'corelaw-core'),
              'tab'   => Controls_Manager::TAB_STYLE,
              'condition' => [
                  'corelaw_blog_general_section_select' => 'style_five'
              ]
           ]
      );


      $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
              'label'    => esc_html__('Typography', 'corelaw-core'),
              'name'     => 'corelaw_blog_five_post_meta_section_typ',
              'selector' => '{{WRAPPER}}  .blog-standard-single .text .post-meta-list li',
      
          ]
      );
      
      $this->add_control(
          'corelaw_blog_five_post_meta_section_color',
          [
              'label'     => esc_html__('Color', 'corelaw-core'),
              'type'      => Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}}  .blog-standard-single .text .post-meta-list li' => 'color: {{VALUE}};',
              ],
          ]
      );
      $this->add_control(
          'corelaw_blog_five_post_meta_section_margin',
          [
              'label' => esc_html__( 'Margin', 'corelaw-core' ),
              'type' => \Elementor\Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%', 'em' ],
              'selectors' => [
                  '{{WRAPPER}}  .blog-standard-single .text .post-meta-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
              ],
          ]
      );
      
      $this->end_controls_section();

    //Description Style
    $this->start_controls_section(
            'corelaw_blog_five_description_section',
            [
            'label' => esc_html__('Description', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_blog_general_section_select' => 'style_five'
            ]
            ]
    );

    $this->add_control(
        'corelaw_blog_five_description_section_color',
        [
            'label'     => esc_html__('Color', 'corelaw-core'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .para, .faq-wrap .faq-body' => 'color: {{VALUE}};',
            ],
        ]
    );   
   
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'label'    => esc_html__('Typography', 'corelaw-core'),
            'name'     => 'corelaw_blog_five_description_section_typ',
            'selector' => '{{WRAPPER}} .para, .faq-wrap .faq-body',
    
        ]
    );

    $this->add_control(
        'corelaw_blog_five_description_section_margin',
        [
            'label' => esc_html__( 'Margin', 'corelaw-core' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .para, .faq-wrap .faq-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();
    //Read More Button Style
    $this->start_controls_section(
            'corelaw_blog_five_read_more_button_section',
            [
            'label' => esc_html__('Read More Button', 'corelaw-core'),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'corelaw_blog_general_section_select' => 'style_five'
            ]
            ]
    );

    $this->add_control(
        'corelaw_blog_five_read_more_button_section_color',
        [
            'label'     => esc_html__('Color', 'corelaw-core'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog-standard-single .text .read-more-btn' => 'color: {{VALUE}};',
            ],
        ]
    );   
    $this->add_control(
        'corelaw_blog_five_read_more_button_hover_section_color',
        [
            'label'     => esc_html__('Hover Color', 'corelaw-core'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog-standard-single .text .read-more-btn:hover' => 'color: {{VALUE}};',
            ],
        ]
    );   
   
    
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'label'    => esc_html__('Typography', 'corelaw-core'),
            'name'     => 'corelaw_blog_five_read_more_button_section_typ',
            'selector' => '{{WRAPPER}} .blog-standard-single .text .read-more-btn',
    
        ]
    );

    $this->add_control(
        'corelaw_blog_five_read_more_button_section_margin',
        [
            'label' => esc_html__( 'Margin', 'corelaw-core' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .blog-standard-single .text .read-more-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();


    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        

        $query = new \WP_Query(
			array(
				'post_type'      => 'post',
				'posts_per_page' => $settings['corelaw_blog_posts_per_page'],
				'orderby'        => $settings['corelaw_blog_template_order_by'],
				'order'          => $settings['corelaw_blog_template_order'],
				'offset'         => 0,
				'post_status'    => 'publish'
			)
		);


        ?>

        <script>
        
            <?php if(is_admin()) :  ?>
            var swiper = new Swiper(".blog-slider1", {
                slidesPerView: 1,
                speed: 1200,
                spaceBetween: 15,
                loop: true,
                roundLengths: true,
                pagination: {
                el: ".swiper-pagination",
                clickable: 'true',
                },
                navigation: {
                nextEl: '.service-prev1',
                prevEl: '.service-next1',
                },
                breakpoints: {
                    280:{
                        slidesPerView: 1,
                    navigation: false,
                    },
                576:{
                    slidesPerView: 2,
                    navigation: false,
                },
                768:{
                    slidesPerView: 2,
                    navigation: false,
                },
                992:{ 
                    slidesPerView: 3
                },
                1200:{
                    slidesPerView: 3
                },
                }
            });
            // blog-slider2
            var swiper = new Swiper(".blog-slider2", {
                slidesPerView: 1,
                speed: 1200,
                spaceBetween: 15,
                loop: true,
                roundLengths: true,
                pagination: {
                el: ".swiper-pagination",
                clickable: 'true',
                },
                navigation: {
                nextEl: '.blog2-next',
                prevEl: '.blog2-prev',
                },
                breakpoints: {
                    280:{
                        slidesPerView: 1,
                    navigation: false,
                    },
                576:{
                    slidesPerView: 1,
                    navigation: false,
                },
                768:{
                    slidesPerView: 2,
                    navigation: false,
                },
                992:{ 
                    slidesPerView: 2
                },
                1200:{
                    slidesPerView: 2
                },
                }
            });
        
            <?php endif ?>
        </script>


        <?php if ( $settings['corelaw_blog_general_section_select'] == 'style_one' ) : ?>
            <div class="l-news-section">
                <div class="row justify-content-center">
                    <div class="swiper blog-slider1 pb-65">
                        <div class="swiper-wrapper mb-50">
                            <?php
                            if ( $query ->have_posts() ) {
                            while( $query -> have_posts() ) {
                                $query -> the_post();
                            ?>
                                <div class="swiper-slide wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                    <div class="l-news-single">
                                        <?php the_post_thumbnail('',['class' => 'casestudy1']); ?>
                                        <?php 
                                            $getCategoryName = get_the_category( get_the_ID() );
                                        ?>
                                        <a href="<?php echo esc_url(get_category_link($getCategoryName[0]->term_id))?>" class="news-badge"><?php echo esc_html($getCategoryName[0]->name) ?? '' ?></a>
                                        <div class="text">
                                            <div class="date">
                                                <a href="<?php echo esc_url( home_url( get_the_date('Y/m/d') ) ) ?>">
                                                   <?php echo get_the_date( 'F j, Y' );?>
                                                </a>
                                            </div>
                                            <h4><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
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
        <?php endif;?>


        <?php if ( $settings['corelaw_blog_general_section_select'] == 'style_two' ) : ?>
            <div class="l-news-section">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-8 col-md-9">
                        <div class="section-title2 sibling3 text-md-start text-center">
                            <?php if( !empty( $settings['corelaw_blog_heading_content_sub_title'] ) ) : ?>
                                <span><?php echo esc_html($settings['corelaw_blog_heading_content_sub_title']) ?></span>
                            <?php endif ?>
                            <?php if( !empty( $settings['corelaw_blog_heading_content_title'] ) ) : ?>
                                <h2><?php echo esc_html($settings['corelaw_blog_heading_content_title']) ?></h2>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php if ( 'yes' === $settings['corelaw_blog_pagination_icon'] ) :?>    
                        <div class="col-xl-6 col-lg-4 col-md-3 d-md-flex d-none justify-content-end">
                            <div class="slider-arrows banner2-arrows text-center d-sm-flex d-none flex-row justify-content-center align-items-center gap-4">
                                <div class="blog2-prev swiper-prev-arrow" tabindex="0" role="button" aria-label="Previous slide"> 
                                    <img class="prevarrow" src="<?php echo get_template_directory_uri()?>/assets/images/icons/arr-prev.svg" alt="image">
                                </div>
                                <div class="blog2-next swiper-next-arrow" tabindex="0" role="button" aria-label="Next slide"> 
                                    <img class="nextarrow" src="<?php echo get_template_directory_uri()?>/assets/images/icons/arr-next.svg" alt="image">
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <div class="row justify-content-center mt-60 g-4">
                    <div class="col-lg-4 col-md-8 order-lg-1 order-2">
                        <div class="latest-articel-area">
                            <ul class="recent-news">
                                <?php
                                    $query_two = new \WP_Query(
                                        array(
                                            'post_type'      => 'post',
                                            'posts_per_page' => 3,
                                            'orderby'        => $settings['corelaw_blog_template_order_by'],
                                            'order'          => $settings['corelaw_blog_template_order'],
                                            'offset'         => 0,
                                            'post_status'    => 'publish'
                                        )
                                    );

                                if ( $query_two->have_posts() ) {
                                while( $query_two->have_posts()) {
                                    $query_two->the_post();
                
                                ?>
                                <li>
                                    <?php if(has_post_thumbnail()) : ?>
                                        <div class="image">
                                            <a href="<?php the_permalink()?>"><?php the_post_thumbnail( array(90, 75) ); ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="text">
                                        <h6><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h6>
                                        <div class="post-meta flex-xl-nowrap flex-wrap gap-1">
                                            <div class="date">
                                                <a href="<?php echo esc_url( home_url( get_the_date('Y/m/d') ) ) ?>">
                                                   <?php echo get_the_date( 'F j, Y' );?>
                                                </a>
                                            </div>
                                            <a href="<?php the_permalink()?>" class="comment"> <?php echo esc_html('Comments') ?> <?php echo "(".get_comments_number().")" ?> </a>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                    }
                                }
                                    wp_reset_postdata();
                                ?>
                            </ul>


                             <div class="blog-details-btn d-block text-center">
                                <?php if( !empty( $settings['corelaw_blogg_btn_title'] ) ) :   ?>
                                    <a href="<?php echo esc_url($settings['corelaw_blogg_btn_link']['url'] )?>" class="eg-btn capsule btn--outline sibling3 btn--md"><?php echo esc_html($settings['corelaw_blogg_btn_title'] )?></a>            
                                <?php endif ?>
                                
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-8 order-lg-2 order-1">
                        <div class="swiper blog-slider2">
                            <div class="swiper-wrapper">
                                <?php
                                $query_three = new \WP_Query(
                                    array(
                                        'post_type'      => 'post',
                                        'posts_per_page' => $settings['corelaw_blog_posts_per_page'],
                                        'orderby'        => $settings['corelaw_blog_template_order_by'],
                                        'order'          => $settings['corelaw_blog_template_order'],
                                        'offset'         => 3,
                                        'post_status'    => 'publish'
                                    )
                                );

                                if ( $query_three->have_posts() ) {
                                while( $query_three->have_posts() ) {
                                    $query_three->the_post();
                                ?>
                                        <div class="swiper-slide">
                                            <div class="blog-single1">
                                                <?php if(has_post_thumbnail()) : ?>
                                                    <div class="image">
                                                    <?php 
                                                        $getCategoryName = get_the_category( get_the_ID() );
                                                    ?>
                                                        <a href="<?php echo esc_url(get_category_link($getCategoryName[0]->term_id))?>" class="blog-badge"><?php echo esc_html($getCategoryName[0]->name) ?? '' ?>  </a>
                                                        <a href="<?php the_permalink()?>"> <?php the_post_thumbnail('',['class' => 'casestudy1']); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="text">
                                                    <div class="post-meta">
                                                        <div class="date">
                                                            <a href="<?php echo esc_url( home_url( get_the_date('Y/m/d') ) ) ?>">
                                                            <?php echo get_the_date( 'F j, Y' );?>
                                                            </a>
                                                        </div>
                                                        <a href="<?php the_permalink()?>" class="comment"><?php echo esc_html('Comments') ?>  <?php echo "(".get_comments_number().")" ?></a>
                                                    </div>
                                                    <h4><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h4>
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    }
                                }
                                    wp_reset_postdata();
                                ?>

                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        <?php endif;?>


        <?php if ( $settings['corelaw_blog_general_section_select'] == 'style_three' ) : ?>

            <div class="blog-section">
                <div class="row justify-content-center g-4">
                    <?php
                    if ( $query ->have_posts() ) {
                    while( $query -> have_posts() ) {
                        $query -> the_post();
                    ?>

                        <div class="col-lg-4 col-md-6 col-sm-10 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="200ms">
                            <div class="blog-single2 <?php echo $settings['corelaw_blog_design_three_box_shadow_choose_content'] == 'yes' ? 'sibling2' : '' ?>">
                                <div class="image">
                                    <span class="blog-badge"><?php the_author(); ?></span>
                                    <a href="<?php the_permalink()?>"><?php the_post_thumbnail('',['class' => 'img-fluid']); ?></a>
                                </div>
                                <div class="content">
                                    <ul class="post-meta-list">
                                        <?php 
                                            $getCategoryName = get_the_category( get_the_ID() );
                                        ?>
                                         <a href="<?php echo esc_url(get_category_link($getCategoryName[0]->term_id))?>" >
                                            <li><?php echo esc_html($getCategoryName[0]->name) ?? '' ?></li>
                                        </a>
                                        <a href="<?php echo esc_url( home_url( get_the_date('Y/m/d') ) ) ?>">
                                            <li><?php echo get_the_date( 'F j, Y' );?></li>
                                        </a>
                                    </ul>
                                    <h5><a href="<?php the_permalink()?>"><?php the_title();?></a></h5>
                                    <p><?php echo wp_trim_words( get_the_content(), 15 );?></p>
                                </div>
                            </div>
                        </div>

                    <?php
                        }
                    }
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        
        <?php endif;?>
		 <?php if ( $settings['corelaw_blog_general_section_select'] == 'style_four' ) : ?>
            <div class="blog-grid-section">
                <div class="row justify-content-center">
                    <?php
                        if ( $query ->have_posts() ) {
                        while( $query -> have_posts() ) {
                        $query -> the_post();
                    ?>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="blog-single1 style-2">
                                <div class="image">
                                    <?php 
                                        $getCategoryName = get_the_category( get_the_ID() );
                                    ?>
                                    <a href="<?php echo esc_url(get_category_link($getCategoryName[0]->term_id))?>" class="news-badge">
                                        <span class="blog-badge"><?php echo esc_html($getCategoryName[0]->name) ?? '' ?></span>
                                    </a>
                                    <a href="<?php the_permalink()?>"><?php the_post_thumbnail('',['class' => 'img-fluid']); ?></a>                            
                                </div>
                                <div class="text">
                                    <div class="post-meta">
                                        <div class="date">
                                             <a class="dateee" href="<?php echo esc_url( home_url( get_the_date('Y/m/d') ) ) ?>">
                                                <?php echo get_the_date( 'F j, Y' );?>
                                            </a>
                                        </div>
                                        <a  href="<?php the_permalink()?>" class="comment cmentt"><?php echo esc_html('Comments') ?>  <?php echo "(".get_comments_number().")" ?></a>
                                    </div>
                                    <h4><a href="<?php the_permalink()?>"><?php the_title();?></a></h4>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    }
                        wp_reset_postdata();
                    ?>
                </div>
                <div class="row mt-40">
                    <nav class="pagination-wrap">
                        <?php egens_core()->egns_blog_pagination() ?>
                    </nav>
                </div>
            </div>
        <?php endif;?>

		 <?php if ( $settings['corelaw_blog_general_section_select'] == 'style_five' ) : ?>
            <div class="blog-standard-section">
                <div class="row gy-5">
                    <div class="blog-standard-area">
                        <?php
                        if ( $query ->have_posts() ) {
                        while( $query -> have_posts() ) {
                            $query -> the_post();
                        ?>
                        <div class="blog-standard-single">
                            <div class="image">
                                <?php 
                                    $getCategoryName = get_the_category( get_the_ID() );
                                ?>
                                <span class="blog-badge"><?php echo esc_html($getCategoryName[0]->name) ?? '' ?></span>
                                <a href="<?php the_permalink()?>"><?php the_post_thumbnail('',['class' => 'img-fluid']); ?></a>
                            </div>
                            <div class="text">
                                <h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
                                <ul class="post-meta-list">
                                    <li><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icons/user.svg' ) ?>" alt="image"><span><?php the_author(); ?></span></li>
                                    <li><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icons/calendr.svg' ) ?>" alt="image"><span><?php echo get_the_date( 'F j, Y' );?></span></li>
                                    <li><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icons/bubble.svg' ) ?>" alt="image"><span><?php echo esc_html('Comments') ?>  <?php echo "(".get_comments_number().")" ?></span></li>
                                </ul>
                                <p class="para"><?php echo wp_trim_words( get_the_content(), 15 );?></p>
                                <a href="<?php the_permalink()?>" class="read-more-btn"><?php echo esc_attr('Continue Reading','corelaw-core') ?><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                            <?php
                            }
                        }
                            wp_reset_postdata();
                        ?>
                    </div>
                    <div class="row">
                        <nav class="pagination-wrap">
                            <?php egens_core()->egns_blog_pagination() ?>
                        </nav>
                    </div>
                </div>
            </div>
        <?php endif;?>


        <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new corelaw_Blog_Widget());