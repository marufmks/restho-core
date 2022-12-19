<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_about_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_about';
    }

    public function get_title()
    {
        return esc_html__('EG About', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-site-title';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'corelaw_section_general_content',
            [
                'label' => esc_html__('General', 'corelaw-core')
            ]
        );


        $this->add_control(
			'corelaw_about_style',
			[
				'label' => esc_html__( 'About Design', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style_one',
				'options' => [
					'style_one'  => esc_html__( 'Style 1', 'corelaw-core' ),
					'style_two' => esc_html__( 'Style 2', 'corelaw-core' ),
					'style_three' => esc_html__( 'Style 3', 'corelaw-core' ),
					
					
				],
			]
		);


        $this->end_controls_section();

         //style 1 controls

        $this->start_controls_section(
            'corelaw_section_heading_content',
            [
                'label' => esc_html__('Content', 'corelaw-core'),
                'condition' => [
                    'corelaw_about_style' => 'style_one',
                ],
            ],
            
        );

        
        $this->add_control(
            'corelaw_about1_section_main_title',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('About Corelaw', 'corelaw-core'),
                'label_block' => true,
            ]
        );
       

        $this->add_control(
            'corelaw_section_about_title_description',
            [
                'label' => esc_html__('Main Description', 'corelaw-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('In consequat tincidunt turpis sit amet imperdiet. 
                Praesent Class officelan nonatoureanor mauris laoreet, iaculis libero quis.
                Curabitur et tempus eri consequat tincidunt turpis sit amet imperdiet.
                 Praesent nonatourean olei aptent taciti sociosqu ad litora torquent per.', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
            'corelaw_section_about_sub_title',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get About our Law Firm and Learn About our Expertise.', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
            'corelaw_section_about_sub_title_description',
            [
                'label' => esc_html__('Lawyer Description', 'corelaw-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('In consequat tincidunt turpis sit amet imperdiet. 
                Praesent Classei consequat tincidunt turpis sit amet imperdiet for mind.', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );
       
         //lawyer statements

        $this->add_control(
			'corelaw_section_about_signature_icon',
			[
				'label' => esc_html__( 'Lawyer Signature', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);

        $this->add_control(
            'corelaw_section_about_sub_title_lawyer',
            [
                'label' => esc_html__('Lawyer Designation', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Simanto Rahman, CEO-Founder', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
			'corelaw_section_about_image',
			[
				'label' => esc_html__( 'About Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

       
        $this->add_control(
            'corelaw_section_about_exp_years_number',
            [
                'label' => esc_html__('Number Of Years', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('05', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );
        $this->add_control(
            'corelaw_section_about_exp_time',
            [
                'label' => esc_html__('Duration', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Years', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );
        $this->add_control(
            'corelaw_section_about_exp_sub_title',
            [
                'label' => esc_html__('Experience Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We Have A Lot Of Real Experience', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->end_controls_section();

        //style 2 controls

         $this->start_controls_section(
            'corelaw_section_about_two_content',
            [
                'label' => esc_html__('Content', 'corelaw-core'),
                'condition' => [
                    'corelaw_about_style' => 'style_two',
                ],
            ],
            
        );

        $this->add_control(
			'corelaw_about_section_about_two_image',
			[
				'label' => esc_html__( 'About Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                
			]
		);

        $this->add_control(
            'corelaw_about_two_section_main_title',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Best Experience', 'corelaw-core'),
                'label_block' => true,
            ]
        );
       
        $this->add_control(
            'corelaw_section_about_two_sub_title',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Find Us What We Actually Do For Giving Complete Solutions.', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
            'corelaw_section_about_two_title_description',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('In consequat tincidunt turpis sit amet imperdiet. Praesent ouiertdion nonatourei mauris laoreet, iaculis libero quis.
                Curabitur et tempusoni eros Class offi aptent taciti sociosqu ad litora torquent per.', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'corelaw_section_about_two_progress_title',
            [
                'label' => esc_html__('Progress Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Case Win', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $repeater2->add_control(
			'corelaw_section_about_two_progress_number',
			[
				'label' => esc_html__( 'Percentage Number', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 90,
			]
		);

       
        

        $this->add_control(
			'corelaw_section_about_two_progress_list',
			[
				'label' => esc_html__( 'Repeater List', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'corelaw_section_about_two_progress_title' => esc_html__( 'Title #1', 'corelaw-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'corelaw-core' ),
					],
					
				],
				'title_field' => '{{{ corelaw_section_about_two_progress_title }}}',
			]
		);
        
        
        $this->end_controls_section();


        //style 3 controls

         $this->start_controls_section(
            'corelaw_section_style_three_content',
            [
                'label' => esc_html__('Content', 'corelaw-core'),
                'condition' => [
                    'corelaw_about_style' => 'style_three',
                ],
            ],
            
        );

        $this->add_control(
            'corelaw_about3_section_main_title',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('GET TO KNOW US', 'corelaw-core'),
                'label_block' => true,
            ]
        );
       
        $this->add_control(
            'corelaw_section_about3_sub_title',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Let you know who we are  learn about our firm.', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
            'corelaw_section_about_three_content_title_description',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('In consequat tincidunt turpis sit amet imperdiet. Praesent ouiertdion nonatourei mauris laoreet, iaculis libero quis.
                Curabitur et tempusoni eros Class offi aptent taciti sociosqu ad litora torquent per.', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
			'corelaw_about_section_about_three_background_image',
			[
				'label' => esc_html__( 'About Background Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                
			]
		);
        $this->add_control(
			'corelaw_about_section_about_three_image',
			[
				'label' => esc_html__( 'About Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                
			]
		);

        $this->add_control(
			'corelaw_about_section_txt_left_image',
			[
				'label' => esc_html__( 'Text Left Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                
			]
		);
        $this->add_control(
			'corelaw_about_section_txt_right_image',
			[
				'label' => esc_html__( 'Text Right Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                
			]
		);

        $this->add_control(
            'corelaw_section_about_experience_years_number',
            [
                'label' => esc_html__('Years Number', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('05', 'corelaw-core'),
                'label_block' => true,
                
                
            ]
        );

        $this->add_control(
			'corelaw_about_section_author_three_image',
			[
				'label' => esc_html__( 'Author Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                
			]
		);

        $this->add_control(
			'corelaw_section_about_signature_style_three_icon',
			[
				'label' => esc_html__( 'Lawyer Signature', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
                
				
			]
		);

        $this->add_control(
            'corelaw_section_about_marquee_text',
            [
                'label' => esc_html__('Marquee Text', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('About Corelaw', 'corelaw-core'),
                'label_block' => true,
                
                
            ]
        );

       

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'corelaw_section_about_three_subtitles',
            [
                'label' => esc_html__('List Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We Have A Lot Of Real Experience', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
			'list_three',
			[
				'label' => esc_html__( 'About List', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'corelaw_section_about_three_subtitles' => esc_html__( 'We Have A Lot Of Real Experience', 'corelaw-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'corelaw-core' ),
					],
					
				],
				'title_field' => '{{{ corelaw_section_about_three_subtitles }}}',
			]
		);


        $this->end_controls_section();
        // End content section

        //style section starts from here

        //design 1 style controls start here

        //Main Title Style
        $this->start_controls_section(
            'corelaw_heading_content_main_title_style_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_one',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_main_title_typography',
                'selector' => '{{WRAPPER}} .section-title1 h2',
                

            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'corelaw_heading_style_main_title_colorr',
				'label' => esc_html__( 'Color', 'corelaw-core' ),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .section-title1 h2 ',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Color(Gradient)', 'corelaw-core'),
                       
                    ],
                   
                ],
 
			]
		);


        $this->add_control(
            'corelaw_section_main_title_background_color',
            [
                'label'     => esc_html__('Background Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_section_main_title_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Subtitle Style
        $this->start_controls_section(
            'corelaw_heading_content_sub_title_style_section',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_one',
                ],
                
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_sub_title_typography',
                'selector' => '{{WRAPPER}} .about-content1 h3',
                

            ]
        );

        $this->add_control(
            'corelaw_section_sub_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-content1 h3' => 'color: {{VALUE}};',

                ],
            ]
        );
        
        $this->add_control(
			'corelaw_section_sub_title_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
                    '{{WRAPPER}} .about-content1 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        //Description Style
        $this->start_controls_section(
            'corelaw_heading_content_description_e_style_section',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_one',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_description_typography',
                'selector' => '{{WRAPPER}} .section-title1 p',
                

            ]
        );

        $this->add_control(
            'corelaw_section_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_section_description_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        //Sub-description Style
        $this->start_controls_section(
            'corelaw_content_sub_description_style_section',
                    [
                        'label' => esc_html__('Sub Description', 'corelaw-core'),
                        'tab'   => Controls_Manager::TAB_STYLE,
                        'condition' => [
                            'corelaw_about_style' => 'style_one'
                        ],
                    ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_sub_description_typography',
                'selector' => '{{WRAPPER}} .lawyer-word p',
                

            ]
        );

        $this->add_control(
            'corelaw_section_sub_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lawyer-word p' => 'color: {{VALUE}};',

                ],
            ]
        );
        
        $this->add_control(
            'corelaw_section_sub_description_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .lawyer-word p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        

        //lawyer name Style
        $this->start_controls_section(
            'corelaw_about_content_lawyer_section',
            [
                'label' => esc_html__('Lawyer Name', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_one',
                ],
                
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_about_section_lawyer_typography',
                'selector' => '{{WRAPPER}} .lawyer-word h6',
                

            ]
        );

        $this->add_control(
            'corelaw_section_lawyer_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lawyer-word h6' => 'color: {{VALUE}};',

                ],
            ]
        );
        
        $this->add_control(
			'corelaw_section_lawyer_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
                    '{{WRAPPER}} .lawyer-word h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        //Background Style
        $this->start_controls_section(
            'corelaw_background_style_section',
            [
                'label' => esc_html__('Experience Background', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_one',
                ],
            ]
        ); 

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background Icon', 'corelaw-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .experience-tag::after',
			]
		);

        $this->add_control(
            'corelaw_section_background_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .experience-tag' => 'background: {{VALUE}};',
                    
                ],
            ]
        );
       


        $this->end_controls_section();



        //Exp Number Style
        $this->start_controls_section(
            'corelaw_about_number_section_style_section',
            [
                'label' => esc_html__('Year Number', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_one',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_about_section_number_typography',
                'selector' => '{{WRAPPER}} .experience-tag h2',
                

            ]
        );

        $this->add_control(
            'corelaw_about_section_number_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .experience-tag h2' => 'color: {{VALUE}};',
                    
                ],
            ]
        );

        $this->add_control(
			'corelaw_about_section_number_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .experience-tag h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        //year name=year

        $this->start_controls_section(
            'corelaw_about_section_year_style_section',
            [
                'label' => esc_html__('Duration', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_one',
                ],
            ]
        );

    

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_about_section_duration_typography',
                'selector' => '{{WRAPPER}} .experience-tag span',

            ]
        );

        $this->add_control(
            'corelaw_about_section_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .experience-tag span' => 'color: {{VALUE}};',
                    
                ],
            ]
        );
        $this->add_control(
			'corelaw_about_section_title_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .experience-tag span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();


        
        //Experience title
        $this->start_controls_section(
            'corelaw_about_exp_title_style_section',
            [
                'label' => esc_html__('Exp Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_one',
                ],
            ]
        );

    

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_exp_title_typography',
                'selector' => '{{WRAPPER}} .experience-tag p',

            ]
        );

        $this->add_control(
            'corelaw_about_exp_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .experience-tag p' => 'color: {{VALUE}};',
                    
                ],
            ]
        );
        $this->add_control(
			'fcorelaw_about_exp_title_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .experience-tag p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();


         //design 2 style controls start here

        //Main Title Style
        $this->start_controls_section(
            'corelaw_heading_content_main_title_about2_style_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_two',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_main_title_about2_typography',
                'selector' => '{{WRAPPER}} .section-title2.sibling3 span',
                

            ]
        );

        $this->add_control(
            'corelaw_section_main_title_about2_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_section_main_title_about2_background_color',
            [
                'label'     => esc_html__('Background Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 span' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_section_main_title_about2_margin',
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
            'corelaw_about_section_heading_border',
            [
                'label' => esc_html__( 'Border Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 span::after' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


          //Subtitle Style
          $this->start_controls_section(
            'corelaw_heading_content_about2_sub_title_style_section',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_two',
                ],
                
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_about2_sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title2.sibling3 h2',
                

            ]
        );

        $this->add_control(
            'corelaw_section_about2_sub_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 h2' => 'color: {{VALUE}};',

                ],
            ]
        );
        
        $this->add_control(
			'corelaw_section_about2_sub_title_margin',
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

        
        //Description Style
        $this->start_controls_section(
            'corelaw_heading_content_about2_description_e_style_section',
                [
                    'label' => esc_html__('Description', 'corelaw-core'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'corelaw_about_style' => 'style_two',
                    ],
                ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_about2_description_typography',
                'selector' => '{{WRAPPER}} .para, .faq-wrap .faq-body',
                

            ]
        );

        $this->add_control(
            'corelaw_section_about2_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .para, .faq-wrap .faq-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_section_about2_description_margin',
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
        



        //Progress Title Style
        $this->start_controls_section(
            'corelaw_heading_content_progress_title_about2_style_section',
            [
                'label' => esc_html__('Progress Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_two',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_progress_title_about2_typography',
                'selector' => '{{WRAPPER}} .progress-item h5',
                

            ]
        );

        $this->add_control(
            'corelaw_section_progress_title_about2_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progress-item h5' => 'color: {{VALUE}};',
                ],
            ]
        );
       
        $this->add_control(
            'corelaw_section_progress_title_about2_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .progress-item h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

         //Progress Icon BG
         $this->start_controls_section(
            'corelaw_heading_content_progress_area_icon_about2_style_section',
            [
                'label' => esc_html__('Progress BG Icon', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_two',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'corelaw_progress_area_icon_about2',
				'label' => esc_html__( 'Background Icon', 'corelaw-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .progress-item:after',
			]
		);

        $this->end_controls_section();

         //Progress bar
         $this->start_controls_section(
            'corelaw_heading_content_progress_bar_icon_about2_style_section',
            [
                'label' => esc_html__('Progress Bar', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_two',
                ],
            ]
        );

     
        $this->add_control(
            'corelaw_progress_bar_active_color',
            [
                'label' => esc_html__( 'Active Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-progress path.blue' => 'stroke: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'corelaw_progress_bar_non_active_color',
            [
                'label' => esc_html__( 'Non Active Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-progress path.grey' => 'stroke: {{VALUE}}',
                ],
            ]
        );

        

        $this->end_controls_section();


        //Main Title Style
        $this->start_controls_section(
            'corelaw_heading_content_main_title_about3_style_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_three',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_main_title_about3_typography',
                'selector' => '{{WRAPPER}} .section-title-area .section-title span',
                

            ]
        );

        $this->add_control(
            'corelaw_section_main_title_about3_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-area .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'corelaw_section_main_title_about3_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .section-title-area .section-title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Subtitle Style
          $this->start_controls_section(
            'corelaw_heading_content_about3_sub_title_style_section',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_three',
                ],
                
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_about3_sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title-area .section-title h2',
                

            ]
        );

        $this->add_control(
            'corelaw_section_about3_sub_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-area .section-title h2' => 'color: {{VALUE}};',

                ],
            ]
        );
        
        $this->add_control(
			'corelaw_section_about3_sub_title_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
                    '{{WRAPPER}} .section-title-area .section-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        //Description Style
        $this->start_controls_section(
            'corelaw_heading_about_three_description_style_section',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_about_style' => 'style_three',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_about_three_description_typography',
                'selector' => '{{WRAPPER}} .para, .faq-wrap .faq-body',
                

            ]
        );

        $this->add_control(
            'corelaw_about_three_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about3-content p.para, .about3-content .faq-wrap p.faq-body, .faq-wrap .about3-content p.faq-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_about_three_description_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about3-content p.para, .about3-content .faq-wrap p.faq-body, .faq-wrap .about3-content p.faq-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Exp Year Number Style
        $this->start_controls_section(
            'corelaw_heading_content_about3_exp_number_style_section',
                [
                    'label' => esc_html__('Experience Year', 'corelaw-core'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'corelaw_about_style' => 'style_three',
                    ],
                ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_about3_exp_number_typography',
                'selector' => '{{WRAPPER}} .about3-image-area span.years',
                

            ]
        );

        $this->add_control(
            'corelaw_section_about3_exp_number_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about3-image-area span.years' => 'color: {{VALUE}};',
                ],
            ]
        );
                      
        $this->end_controls_section();


        //list titles Style
        $this->start_controls_section(
            'corelaw_heading_content_about3_list_titles_style_section',
                [
                    'label' => esc_html__('Sub Titles List', 'corelaw-core'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'corelaw_about_style' => 'style_three',
                    ],
                ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_section_about3_list_titles_typography',
                'selector' => '{{WRAPPER}} .about3-list li',
                

            ]
        );

        $this->add_control(
            'corelaw_section_about3_list_titles_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about3-list li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_section_about3_list_titles_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about3-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $items=$settings['list_three'];
        $data=$settings['corelaw_section_about_two_progress_list'];
        ?>
        <?php if( is_admin() ) : ?>
            <script>
                var countLenght = jQuery(".progress-item").length;
                setTimeout(() => {
                    for (var i = 0; i < countLenght; i++) {
                    var indexNum = i + 2;
                    var percentValue = jQuery("#progress" + indexNum).attr("data-progress");
                    jQuery("#progress" + indexNum)
                        .find("#blue" + indexNum)
                        .animate({ "stroke-dashoffset": 198 * percentValue }, 2000);
                    }
                }, 1600);
                jQuery("select").niceSelect();
            </script>
        <?php endif ?>

        <?php if ( $settings['corelaw_about_style'] == 'style_one' ) : ?>  
            <div class="about-section pt-120 pb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 text-lg-start text-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="200ms">
                                <div class="section-title1">
                                    <?php if( !empty( $settings['corelaw_about1_section_main_title'] ) ) : ?>
                                        <h2><?php echo esc_html($settings['corelaw_about1_section_main_title']) ?></h2>                          
                                    <?php endif ?>    
                                    <?php if( !empty( $settings['corelaw_section_about_title_description'] ) ) : ?>
                                        <p><?php echo esc_html($settings['corelaw_section_about_title_description']) ?></p>                          
                                    <?php endif ?> 
                                </div>
                                <div class="about-content1">
                                    <?php if( !empty( $settings['corelaw_section_about_sub_title'] ) ) : ?>
                                        <h3><?php echo esc_html($settings['corelaw_section_about_sub_title']) ?></h3>                          
                                    <?php endif ?>  
                                    <div class="lawyer-word">
                                        <?php if( !empty( $settings['corelaw_section_about_sub_title_description'] ) ) : ?>
                                            <p><?php echo esc_html($settings['corelaw_section_about_sub_title_description']) ?></p>                          
                                        <?php endif ?> 
                                        <?php if( !empty( $settings['corelaw_section_about_signature_icon'] ) ) : ?>
                                            <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_section_about_signature_icon'], [ 'aria-hidden' => 'true' ] ); ?>                           
                                        <?php endif ?>
                                        <?php if( !empty( $settings['corelaw_section_about_sub_title_lawyer'] ) ) : ?>
                                            <h6><?php echo esc_html($settings['corelaw_section_about_sub_title_lawyer']) ?></h6>                          
                                        <?php endif ?> 
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center">
                            <div class="about1-img wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                <?php if( !empty( $settings['corelaw_section_about_image']['url'] ) ) : ?>
                                    <img src="<?php echo esc_url($settings['corelaw_section_about_image']['url']) ?>" alt="<?php echo esc_attr__('About Image','corelaw-core') ?>" class="img-fluid">
                                <?php endif ?>
                                <div class="experience-tag">
                                    <?php if( !empty( $settings['corelaw_section_about_exp_years_number'] ) ) : ?>
                                        <h2><?php echo esc_html($settings['corelaw_section_about_exp_years_number']) ?>
                                    <?php if( !empty( $settings['corelaw_section_about_exp_time'] ) ) : ?>
                                        <span><?php echo esc_html($settings['corelaw_section_about_exp_time']) ?></span>                           
                                    <?php endif ?>
                                    </h2>                        
                                    <?php endif ?>
                                    
                                    <?php if( !empty( $settings['corelaw_section_about_exp_sub_title'] ) ) : ?>
                                        <p><?php echo esc_html($settings['corelaw_section_about_exp_sub_title']) ?></p>                          
                                    <?php endif ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ( $settings['corelaw_about_style'] == 'style_two' ) : ?>
            <div class="about-section2">
                <div class="row g-4 justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <?php if( !empty( $settings['corelaw_about_section_about_two_image']['url'] ) ) : ?>
                            <div class="about2-img">
                                <img src="<?php echo esc_url($settings['corelaw_about_section_about_two_image']['url']) ?>"
                                alt="<?php echo esc_attr__('About Image','corelaw-core') ?>" class="img-fluid experience-img">
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title2 sibling3 text-lg-start text-center">
                            <?php if( !empty( $settings['corelaw_about_two_section_main_title'] ) ) : ?>
                                <span><?php echo esc_html($settings['corelaw_about_two_section_main_title']) ?></span>                          
                            <?php endif ?>
                            <?php if( !empty( $settings['corelaw_section_about_two_sub_title'] ) ) : ?>
                                <h2><?php echo esc_html($settings['corelaw_section_about_two_sub_title']) ?></h2>                          
                            <?php endif ?>
                        </div>
                        <div class="about2-counter-area text-lg-start text-center">
                            <?php if( !empty( $settings['corelaw_section_about_two_title_description'] ) ) : ?>
                                <p class="para"><?php echo esc_html($settings['corelaw_section_about_two_title_description']) ?></p>
                            <?php endif ?>
                            <div class="progress-area2">
                                <?php foreach($data as $key=> $item): ?>
                                    <?php 
                                        $per=0;
                                        $per+=$item['corelaw_section_about_two_progress_number'];                                        
                                        $num=floatval($per);
                                        $val=0;
                                        $val+=((100-$num)/100);
                                    ?>
                                    <div id="progress<?php echo $key+2 ?>"  data-progress="<?php echo $val ; ?>" class="progress-item single-progress">
                                        <svg viewbox="0 0 110 100">
                                            <linearGradient id="gradient-<?php echo $key+2 ?>" x1="0" y1="0" x2="0" y2="100%">
                                                <stop offset="0%" stop-color="#56c4fb" />
                                                <stop offset="100%" stop-color="#0baeff" />
                                            </linearGradient>
                                            <path class="grey" d="M30,90 A40,40 0 1,1 80,90" fill='none' />
                                            <path id="blue<?php echo $key+2 ?>" fill='none' class="blue" d="M30,90 A40,40 0 1,1 80,90" />
                                            <text x="50%" y="80%" dominant-baseline="middle" text-anchor="middle" style="font-size:18px;">
                                                <?php echo esc_html($item['corelaw_section_about_two_progress_number']) ?>%
                                            </text>
                                        </svg>
                                        <?php if( !empty( $item['corelaw_section_about_two_progress_title'] ) ) : ?>
                                            <h5><?php echo esc_html($item['corelaw_section_about_two_progress_title']) ?></h5>
                                        <?php endif ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif ?>

        <?php if ( $settings['corelaw_about_style'] == 'style_three' ) : ?>
            <div class="about-section">
                <?php if( !empty( $settings['corelaw_about_section_about_three_background_image']['url'] ) ) : ?>
                    <img src="<?php echo esc_url($settings['corelaw_about_section_about_three_background_image']['url']) ?>" 
                    alt="<?php echo esc_attr__('about background img','corelaw-core') ?>" class="section-bg1 img-fluid">                          
                <?php endif ?>
                <div class="row gy-5">
                    <div class="col-xl-6 text-lg-start d-sm-flex d-none justify-content-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="200ms">
                        <div class="about3-image-area">
                            <?php if( !empty( $settings['corelaw_about_section_about_three_image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url($settings['corelaw_about_section_about_three_image']['url']) ?>" class="about3-image" alt="<?php echo esc_attr__('about background img','corelaw-core') ?>">                          
                            <?php endif ?>
                            <?php if( !empty( $settings['corelaw_about_section_txt_left_image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url($settings['corelaw_about_section_txt_left_image']['url']) ?>" class="abt-img-text1" alt="<?php echo esc_attr__('about background img','corelaw-core') ?>">
                            <?php endif ?>
                            <?php if( !empty( $settings['corelaw_about_section_txt_right_image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url($settings['corelaw_about_section_txt_right_image']['url']) ?>" class="abt-img-text2" alt="<?php echo esc_attr__('about background img','corelaw-core') ?>">
                            <?php endif ?>
                            <?php if( !empty( $settings['corelaw_section_about_experience_years_number'] ) ) : ?>
                                <span class="years"><?php echo esc_html($settings['corelaw_section_about_experience_years_number']) ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-xl-6 d-flex justify-content-xl-end flex-column justify-content-center text-xl-start text-center">
                        <div class="section-title-area sibling3">
                            <div class="marquee">
                                <div>
                                    <?php if( !empty( $settings['corelaw_section_about_marquee_text'] ) ) : ?>
                                        <span><?php echo esc_html($settings['corelaw_section_about_marquee_text']) ?></span>
                                    <?php endif ?>
                                    <?php if( !empty( $settings['corelaw_section_about_marquee_text'] ) ) : ?>
                                        <span><?php echo esc_html($settings['corelaw_section_about_marquee_text']) ?></span> 
                                    <?php endif ?>                         
                                </div>
                            </div>
                            <div class="section-title text-xl-start text-center">
                                <?php if( !empty( $settings['corelaw_about3_section_main_title'] ) ) : ?>
                                    <span><?php echo esc_html($settings['corelaw_about3_section_main_title']) ?></span>                          
                                <?php endif ?>
                                <?php if( !empty( $settings['corelaw_section_about3_sub_title'] ) ) : ?>
                                    <h2><?php echo esc_html($settings['corelaw_section_about3_sub_title']) ?></h2>                           
                                <?php endif ?>
                                
                            </div>
                        </div>
                        <div class="about3-content">
                            <?php if( !empty( $settings['corelaw_section_about_three_content_title_description'] ) ) : ?>
                                <p class="para"><?php echo esc_html($settings['corelaw_section_about_three_content_title_description']) ?></p>
                            <?php endif ?>
                            <ul class="about3-list">
                                <?php foreach($items as $item): ?>
                                <li><?php echo esc_html($item['corelaw_section_about_three_subtitles']) ?></li>
                                <?php endforeach ?>
                            </ul>
                            <div class="d-flex justify-content-xl-start justify-content-center align-items-center flex-wrap gap-4">
                                <div class="about3-author">
                                    <?php if( !empty( $settings['corelaw_about_section_author_three_image']['url'] ) ) : ?>
                                        <img src="<?php echo esc_url($settings['corelaw_about_section_author_three_image']['url']) ?>" class="author-image" alt="image">
                                    <?php endif ?>
                                </div>
                                <?php if( !empty( $settings['corelaw_section_about_signature_style_three_icon'] ) ) : ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_section_about_signature_style_three_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php endif ?>

        <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_about_Widget());
