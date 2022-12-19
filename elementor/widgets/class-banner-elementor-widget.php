<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_banner';
    }

    public function get_title()
    {
        return esc_html__('EG banner', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-slider-full-screen';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'corelaw_section_title_content',
            [
                'label' => esc_html__('General', 'corelaw-core')
            ]
        );

       

        $this->add_control(
			'corelaw_banner_style',
			[
				'label' => esc_html__( 'Banner Design', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style_one',
				'options' => [
					'style_one'  => esc_html__( 'Style 1', 'corelaw-core' ),
					'style_two' => esc_html__( 'Style 2', 'corelaw-core' ),
					'style_three' => esc_html__( 'Style 3', 'corelaw-core' ),
					'style_four' => esc_html__( 'Style 4', 'corelaw-core' ),
					
					
				],
			]
		);

        $this->end_controls_section();

        //style 1 controls starts here

        //background Section
        $this->start_controls_section(
            'corelaw_slider_section_background',
            [
                'label' => esc_html__('Background', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => 'style_one'
                ]
            ]
        );

       
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_slider_image',
                'label' => esc_html__( 'Background', 'corelaw-core' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .banner-section::before',
                
            ]
        );

        
        
        $this->end_controls_section();  

        $this->start_controls_section(
            'corelaw_banner_one_heading_section',
            [
                'label' => esc_html__('Heading', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
                
            ]
        ); 
       
       
        
        $this->add_control(
            'corelaw_banner_one_content_main_title',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Wellcome to Corelaw', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );
       

        $this->add_control(
            'corelaw_banner_one_content_sub_title',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We Are Specialise In All', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
            'corelaw_banner_one_content_secondary_sub_title',
            [
                'label' => esc_html__('Secondary Sub Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Criminal Law..', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->end_controls_section();

        

        $this->start_controls_section(
            'corelaw_banner_one_contact_section',
            [
                'label' => esc_html__('Contact', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
                
            ]
        ); 

        $this->add_control(
            'corelaw_banner_one_content_contact_title',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Call Us Now', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
            'corelaw_banner_one_content_contact_number',
            [
                'label' => esc_html__('Number', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('+880 170 1111 000', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $this->add_control(
			'corelaw_banner_one_content_contact_number_icon',
			[
				'label' => esc_html__( 'Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);

        $this->end_controls_section();


        $this->start_controls_section(
            'corelaw_banner_one_button_section',
            [
                'label' => esc_html__('Button', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
                
            ]
        ); 
        $this->add_control(
            'corelaw_banner_one_content_button_text',
            [
                'label' => esc_html__('Text', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Practice Area', 'corelaw-core'),
                'label_block' => true,
          
            ]
        );
        $this->add_control(
            'corelaw_banner_one_content_button_url',
            [
                'label' => __('URL', 'corelaw-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'corelaw-core'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'corelaw_banner_one_right_sidebar_section',
            [
                'label' => esc_html__('Scroll Down', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
                
            ]
        ); 
        $this->add_control(
            'corelaw_banner_one_content_sidebar_text',
            [
                'label' => esc_html__('Text', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Scrool Down', 'corelaw-core'),
                'label_block' => true,
          
            ]
        );

        $this->add_control(
            'corelaw_banner_one_content_sidebar_text_url',
            [
                'label' => __('URL', 'corelaw-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'corelaw-core'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],

            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'corelaw_banner_one_left_sidebar_section',
            [
                'label' => esc_html__('Social Icons', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
                
            ]
        ); 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'corelaw_banner_one_content_social_icon_link',
			[
				'label' => esc_html__( 'Link', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'corelaw-core' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'corelaw_banner_one_content_social_icon',
			[
				'label' => esc_html__( 'Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);


        $this->add_control(
			'corelaw_banner_one_content_list',
			[
				'label' => esc_html__( 'Social Icon List', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'corelaw_banner_one_content_social_icon_link' => esc_html__( 'Icon #1', 'corelaw-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'corelaw-core' ),
					],
					
				],
				'title_field' => '{{{ corelaw_banner_one_content_social_icon_link }}}',
			]
		);
        
        
        $this->end_controls_section();
        // End Style one controls  section

         //style 2 controls start here

         $this->start_controls_section(
            'corelaw_banner_two_content_section',
            [
                'label' => esc_html__('Banners List', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => 'style_two',
                ],
                
            ]
        ); 

        $repeater2= new \Elementor\Repeater();
       
       
        $repeater2->add_control(
            'corelaw_banner_two_content_main_title',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Wellcome to Corelaw', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

       
       

        $repeater2->add_control(
            'corelaw_banner_two_content_sub_title',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We Are Specialise In All', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $repeater2->add_control(
			'corelaw_banner_two_content_image',
			[
				'label' => esc_html__( 'Banner Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater2->add_control(
            'corelaw_banner_two_content_button_text',
            [
                'label' => esc_html__('Button Text', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Free Consultasion', 'corelaw-core'),
                'label_block' => true,
          
            ]
        );
        $repeater2->add_control(
            'corelaw_banner_two_content_button_url',
            [
                'label' => __('Button URL', 'corelaw-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'corelaw-core'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],

            ]
        );

        $this->add_control(
			'corelaw_banner_two_content_list',
			[
				'label' => esc_html__( 'Banners List', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'corelaw_banner_two_content_main_title' => esc_html__( 'Welcome to Corelaw', 'corelaw-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'corelaw-core' ),
					],
					
				],
				'title_field' => '{{{ corelaw_banner_two_content_main_title }}}',
			]
		);
      

        $this->end_controls_section();

        $this->start_controls_section(
            'corelaw_banner_two_small_image_section',
            [
                'label' => esc_html__('Sidebar Images', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => 'style_two',
                ],
                
            ]
        ); 

        $this->add_control(
			'corelaw_banner_two_content_small_image_one',
			[
				'label' => esc_html__( 'Image One', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'corelaw_banner_two_content_small_image_two',
			[
				'label' => esc_html__( 'Image Two', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'corelaw_banner_two_content_small_image_three',
			[
				'label' => esc_html__( 'Image Three', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'corelaw_banner_two_next_prev_icon_section',
            [
                'label' => esc_html__('Next/Prev Icon', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => 'style_two',
                ],
                
            ]
        ); 

        
        $this->add_control(
			'corelaw_banner_two_content_prev_icon',
			[
				'label' => esc_html__( 'Prev', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);

        
        $this->add_control(
			'corelaw_banner_two_content_next_icon',
			[
				'label' => esc_html__( 'Next', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);


        $this->end_controls_section();

        //style 2 controls end here

        //style 3 controls starts here

        $this->start_controls_section(
            'corelaw_banner_style_three_content_section',
            [
                'label' => esc_html__('Content', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => ['style_three','style_four'],
                ],
                
            ]
        ); 

       
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'corelaw_banner_section_three_background',
                'label' => esc_html__( 'Background', 'corelaw-core' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .banner3-bg',
                'condition' => [
                    'corelaw_banner_style' => 'style_three'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'corelaw_banner_section_four_background',
                'label' => esc_html__( 'Background', 'corelaw-core' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .banner3-bg',
                'condition' => [
                    'corelaw_banner_style' => 'style_four'
                ]
            ]
        );

        $this->add_control(
			'corelaw_banner_three_content_image_background',
			[
				'label' => esc_html__( 'Right Banner', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'corelaw_banner_style_three_heading_section',
            [
                'label' => esc_html__('Banners List', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => ['style_three','style_four'],
                ],
                
            ]
        ); 

        $repeater4 = new \Elementor\Repeater();

        $repeater4->add_control(
            'corelaw_banner_three_content_main_title',
            [
                'label' => esc_html__('Main Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Welcome to Corelaw', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );
       

        $repeater4->add_control(
            'corelaw_banner_three_content_sub_title',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Incredible Solutions All', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

        $repeater4->add_control(
            'corelaw_banner_three_content_secondary_sub_title',
            [
                'label' => esc_html__('Secondary Sub Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Criminal Law..', 'corelaw-core'),
                'label_block' => true,
                
            ]
        );

       
       
        $repeater4->add_control(
            'corelaw_banner_three_content_button_text',
            [
                'label' => esc_html__('Button Text', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contact Now', 'corelaw-core'),
                'label_block' => true,
          
            ]
        );
        $repeater4->add_control(
            'corelaw_banner_three_content_button_url',
            [
                'label' => __('Button URL', 'corelaw-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'corelaw-core'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],

            ]
        );

        

        $repeater4->add_control(
            'corelaw_banner_three_content_video_button_text',
            [
                'label' => esc_html__('Video Btn Text', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Play Video', 'corelaw-core'),
                'label_block' => true,
          
            ]
        );

        $repeater4->add_control(
            'corelaw_banner_three_content_video_button_url',
            [
                'label' => __('Video Btn URL', 'corelaw-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'corelaw-core'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],

            ]
        );

        

        $repeater4->add_control(
			'corelaw_banner_three_content_image_three',
			[
				'label' => esc_html__( 'Lawyer Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'corelaw_banner_three_content_two_list',
			[
				'label' => esc_html__( 'Lawyer Section', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater4->get_controls(),
				'default' => [
					[
						'corelaw_banner_three_content_main_title' => esc_html__( 'Incredible Solutions All', 'corelaw-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'corelaw-core' ),
					],
					
				],
				'title_field' => '{{{ corelaw_banner_three_content_main_title }}}',
			]
		);
        
        
        $this->end_controls_section();

              

        $this->start_controls_section(
            'corelaw_banner_three_sidebar_social_icon_section',
            [
                'label' => esc_html__('Social Icons', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => ['style_three','style_four'],
                ],
                
            ]
        ); 

        $repeater3 = new \Elementor\Repeater();

        $repeater3->add_control(
			'corelaw_banner_three_content_social_icon_link',
			[
				'label' => esc_html__( 'Link', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'corelaw-core' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

        $repeater3->add_control(
			'corelaw_banner_three_content_social_icon',
			[
				'label' => esc_html__( 'Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);


        $this->add_control(
			'corelaw_banner_three_content_list',
			[
				'label' => esc_html__( 'Social Icon List', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater3->get_controls(),
				'default' => [
					[
						'corelaw_banner_three_content_social_icon_link' => esc_html__( 'Icons', 'corelaw-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'corelaw-core' ),
					],
					
				],
				'title_field' => '{{{ corelaw_banner_three_content_social_icon_link }}}',
			]
		);
        
        
        $this->end_controls_section();

        $this->start_controls_section(
            'corelaw_banner_three_next_prev_icon_section',
            [
                'label' => esc_html__('Next/Prev Icon', 'corelaw-core'),
                'condition' => [
                    'corelaw_banner_style' => ['style_three','style_four'],
                ],
                
            ]
        ); 

        
        $this->add_control(
			'corelaw_banner_three_content_prev_icon',
			[
				'label' => esc_html__( 'Prev', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);

        
        $this->add_control(
			'corelaw_banner_three_content_next_icon',
			[
				'label' => esc_html__( 'Next', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);


        $this->end_controls_section();


        //styling section starts

        //Banner One Style Section Starts here

        //Title style start

        $this->start_controls_section(
            'corelaw_banner_one_main_title_style_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_one_title_style_typography',
                'selector' => '{{WRAPPER}} .banner-section .banner-content > span',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_one_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section .banner-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_one_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .banner-section .banner-content > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Sub Title style start

        $this->start_controls_section(
            'corelaw_banner_one_sub_title_style_section',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_one_sub_title_style_typography',
                'selector' => '{{WRAPPER}} .banner-section .banner-content h1',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_one_sub_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_one_sub_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .banner-section .banner-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Secondary Sub Title style start

        $this->start_controls_section(
            'corelaw_banner_one_secondary_sub_title_style_section',
            [
                'label' => esc_html__('Second Sub Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_one_secondary_sub_title_style_typography',
                'selector' => '{{WRAPPER}} .banner-section .banner-content h1 span',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_one_secondary_sub_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section .banner-content h1 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_one_secondary_sub_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .banner-section .banner-content h1 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //contact Title style start

        $this->start_controls_section(
            'corelaw_banner_one_contact_title_style_section',
            [
                'label' => esc_html__('Contact Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_one_contact_title_style_typography',
                'selector' => '{{WRAPPER}} .phone-call .number span',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_one_contact_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .phone-call .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_one_contact_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .phone-call .number span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //contact Number style start

        $this->start_controls_section(
            'corelaw_banner_one_contact_number_style_section',
            [
                'label' => esc_html__('Contact Number', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_one_contact_number_style_typography',
                'selector' => '{{WRAPPER}} .phone-call .number h5',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_one_contact_number_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .phone-call .number h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_one_contact_number_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .phone-call .number h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Right Social Icons style start

        $this->start_controls_section(
            'corelaw_banner_one_left_sidebar__social_icons_style_section',
            [
                'label' => esc_html__('Social Icons', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_one_left_sidebar_social_icons_style_icon_colorr',
            [
                'label' => esc_html__( 'SVG Normal Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.banner-social.gap-4 li a i svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'corelaw_banner_one_left_sidebar_social_icons_style_icon_hover_color',
            [
                'label' => esc_html__( 'SVG Hover Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.banner-social.gap-4 li a i svg path:hover' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'corelaw_banner_one_left_sidebar__social_icons_style_svg_size',
            [
                'label' => esc_html__( 'SVG Size', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px','rem' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'rem' => [
						'min' => 0,
						
					],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} ul.banner-social.gap-4 li a i svg ' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //Right sidebar text style start

        $this->start_controls_section(
            'corelaw_banner_one_sidebar_text_style_section',
            [
                'label' => esc_html__('Scroll Down Text', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => 'style_one',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_one_sidebar_text_style_typography',
                'selector' => '{{WRAPPER}} .banner-scroll-area a',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_one_sidebar_text_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-scroll-area a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_one_sidebar_text_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .banner-scroll-area a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        //Button Style
        $this->start_controls_section(
            'corelaw_banner_one_button_style_section',
            [
                'label' => esc_html__('Button', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_one_button_style_typography',
                'selector' => '{{WRAPPER}} .btn--lg',
            ]
        );
        $this->add_control(
            'corelaw_banner_one_button_style_text_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btn--primary2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_banner_one_button_style_text_background',
            [
                'label'     => esc_html__('Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .btn--primary2' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .btn--primary2.sibling2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'corelaw-core' ),
            ]
        );
        $this->add_control(
			'corelaw_banner_one_button_style_hover_color',
			[
				'label' => esc_html__( 'Color', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn--primary:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .btn--primary2:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .btn--primary2.sibling2:hover' => 'color: {{VALUE}}',
				],
          
			]
		);
        $this->add_control(
			'corelaw_banner_one_button_style_hover_background',
			[
				'label' => esc_html__( 'Background', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn--primary::after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .btn--primary2::after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .btn--primary2.sibling2::after' => 'background: {{VALUE}}',
				],
          
			]
		);
       
        $this->add_responsive_control(
			'corelaw_banner_one_button_style_border_radius',
			[
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .btn--primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .btn--primary::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .btn--primary2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .btn--primary2::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .btn--primary2.sibling2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .btn--primary2.sibling2::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
          

			]

		);
        $this->add_control(
			'corelaw_banner_one_button_style_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn--primary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .btn--primary2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .btn--primary2.sibling2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_section();

        //banner Two styling section starts here

         //Title style start

         $this->start_controls_section(
            'corelaw_banner_two_main_title_style_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => 'style_two',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_two_title_style_typography',
                'selector' => '{{WRAPPER}} .banner2-section .swiper-slide .banner-content p',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_two_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-section .swiper-slide .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_two_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .banner2-section .swiper-slide .banner-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_more_options',
            [
                'label' => esc_html__( 'Border', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

      
        $this->add_control(
            'corelaw_title_borderr_color',
            [
                'label' => esc_html__( 'Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-section .swiper-slide .banner-content span' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .banner2-section .swiper-slide .banner-content span::before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .banner2-section .swiper-slide .banner-content span::after' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        //Sub Title style start

        $this->start_controls_section(
            'corelaw_banner_two_sub_title_style_section',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => 'style_two',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_two_sub_title_style_typography',
                'selector' => '{{WRAPPER}} .banner2-section .swiper-slide .banner-content h2',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_two_sub_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner2-section .swiper-slide .banner-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_two_sub_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .banner2-section .swiper-slide .banner-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Banner three styling starts here

        //Title style start

        $this->start_controls_section(
            'corelaw_banner_three_main_title_style_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => ['style_three','style_four'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_three_title_style_typography',
                'selector' => '{{WRAPPER}} .banner-section3 .bann31-single .content > span',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_three_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section3 .bann31-single .content > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_three_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .banner-section3 .bann31-single .content > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Sub Title style start

        $this->start_controls_section(
            'corelaw_banner_three_sub_title_style_section',
            [
                'label' => esc_html__('Sub Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => ['style_three','style_four'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_three_sub_title_style_typography',
                'selector' => '{{WRAPPER}} .banner-section3 .bann31-single .content h2',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_three_sub_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section3 .bann31-single .content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_three_sub_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .banner-section3 .bann31-single .content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Secondary Sub Title style start

        $this->start_controls_section(
            'corelaw_banner_three_secondary_sub_title_style_section',
            [
                'label' => esc_html__('Secondary Sub Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => ['style_three','style_four'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_banner_three_secondary_sub_title_style_typography',
                'selector' => '{{WRAPPER}} .banner-section3 .bann31-single .content h2 span',
                

            ]
        );

        $this->add_control(
            'corelaw_banner_three_secondary_sub_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section3 .bann31-single .content h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_three_secondary_sub_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .banner-section3 .bann31-single .content h2 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

         //Video Button Text style start

        $this->start_controls_section(
            'corelaw_banner_three_video_button_text_style_section',
            [
                'label' => esc_html__('Video Button Text', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => ['style_three'],
                ],
            ]
        );

        $this->add_control(
            'corelaw_banner_three_video_button_text_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section3 .bann31-single .video-btn' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section(); 

        //Right Social Icons style start

        $this->start_controls_section(
            'corelaw_banner_three_left_sidebar__social_icons_style_section',
            [
                'label' => esc_html__('Social Icons', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => ['style_three'],
                ],
            ]
        );
        
        $this->add_control(
            'corelaw_banner_three_left_sidebar_social_icons_style_icon_colorr',
            [
                'label' => esc_html__( 'SVG Normal Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-social-area-dark ul.banner-social li a i path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'corelaw_banner_three_left_sidebar_social_icons_style_icon_hover_color',
            [
                'label' => esc_html__( 'SVG Hover Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-social-area-dark ul.banner-social li a:hover i path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'corelaw_banner_three_left_sidebar__social_icons_style_svg_size',
            [
                'label' => esc_html__( 'SVG Size', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px','rem' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} ul li i svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Right Social Icons style 4 control

        $this->start_controls_section(
            'corelaw_banner_four_left_sidebar__social_icons_style_section',
            [
                'label' => esc_html__('Social Icons', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_banner_style' => ['style_four'],
                ],
            ]
        );
        
        $this->add_control(
            'corelaw_banner_four_left_sidebar_social_icons_style_icon_colorr',
            [
                'label' => esc_html__( 'SVG Normal Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-social-area-light ul.banner-social li a i path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'corelaw_banner_four_left_sidebar_social_icons_style_icon_hover_color',
            [
                'label' => esc_html__( 'SVG Hover Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-social-area-light ul.banner-social li a:hover i path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'corelaw_banner_four_left_sidebar__social_icons_style_svg_size',
            [
                'label' => esc_html__( 'SVG Size', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px','rem' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} ul li i svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();




    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data=$settings['corelaw_banner_one_content_list'];
        $data2=$settings['corelaw_banner_two_content_list'];
        $data3=$settings['corelaw_banner_three_content_list'];
        $data4=$settings['corelaw_banner_three_content_two_list'];
        ?>

        <?php if( is_admin() ) : ?>
            <script>
                // banner2
                var swiper = new Swiper(".mySwiper", {
                    spaceBetween: 10,
                    slidesPerView: 4,
                    freeMode: true,
                    autoplay: true,
                    watchSlidesProgress: true,
                });

                var swiper2 = new Swiper(".mySwiper2", {
                    spaceBetween: 10,
                    autoplay: true,
                    effect: "fade",
                    navigation: {
                    nextEl: ".banner2-next",
                    prevEl: ".banner2-prev",
                    },
                    thumbs: {
                    swiper: swiper,
                    },
                });

                var swiper = new Swiper(".banner3-slider", {
                    slidesPerView: 1,
                    speed: 1200,
                    spaceBetween: 15,
                    effect: "fade",
                    fadeEffect: {
                    crossFade: true,
                    },
                    autoplay: true,
                    loop: true,
                    roundLengths: true,
                    pagination: {
                    el: ".swiper-pagination",
                    clickable: "true",
                    },
                    navigation: {
                    nextEl: ".banner3-prev",
                    prevEl: ".banner3-next",
                    },
                });
            </script>
        <?php endif ?>


        <?php if ( $settings['corelaw_banner_style'] == 'style_one' ) : ?>  
            <div class="banner-section"> 
                <div class="banner-social-area">
                    <ul class="banner-social gap-4">
                        <?php foreach($data as $item): ?>
                            <?php if( !empty( $item['corelaw_banner_one_content_social_icon'] ) ) : ?>
                                <li>
                                    <a href="<?php echo esc_url($item['corelaw_banner_one_content_social_icon_link']['url']) ?>">
                                   
                                <i><?php \Elementor\Icons_Manager::render_icon( $item['corelaw_banner_one_content_social_icon'], [ 'aria-hidden' => 'true' ] ); ?></i>
                               
                            </a>
                        </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="banner-scroll-area">
                <?php if( !empty( $settings['corelaw_banner_one_content_sidebar_text'] ) ) : ?>
                    <a href="<?php echo esc_url($settings['corelaw_banner_one_content_sidebar_text_url']['url']) ?>"><?php echo esc_html($settings['corelaw_banner_one_content_sidebar_text']) ?><i class="bi bi-arrow-right"></i></a>
                    <?php endif ?>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="banner-content">
                                <?php if( !empty( $settings['corelaw_banner_one_content_main_title'] ) ) : ?>
                                    <span><?php echo esc_html($settings['corelaw_banner_one_content_main_title']) ?></span>
                                <?php endif ?>
                                <h1>
                                    <?php if( !empty( $settings['corelaw_banner_one_content_secondary_sub_title'] ) ) : ?>
                                        <?php echo esc_html($settings['corelaw_banner_one_content_sub_title']) ?>
                                    <?php endif ?>
                                    <?php if( !empty( $settings['corelaw_banner_one_content_secondary_sub_title'] ) ) : ?>
                                        <span><?php echo esc_html($settings['corelaw_banner_one_content_secondary_sub_title']) ?></span>
                                    <?php endif ?>
                                </h1>
                                <div class="button-area">
                                <?php if( !empty( $settings['corelaw_banner_one_content_button_text']) ) : ?>   
                                <a href="<?php echo esc_url($settings['corelaw_banner_one_content_button_url']['url']) ?>" class="eg-btn btn--primary btn--lg"><i class="bi bi-dash-lg"></i>
                                <?php echo esc_html($settings['corelaw_banner_one_content_button_text']) ?></a>
                                <?php endif ?>
                                    <div class="phone-call d-flex justify-content-center align-items-center flex-row">
                                        <div class="icon">
                                            <?php if( !empty( $settings['corelaw_banner_one_content_contact_number_icon'] ) ) : ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_banner_one_content_contact_number_icon'], [ 'aria-hidden' => 'true' ] ); ?>                               
                                            <?php endif ?>
                                        </div>
                                        <div class="number">
                                            <?php if( !empty( $settings['corelaw_banner_one_content_contact_title'] ) ) : ?>
                                                <span><?php echo esc_html($settings['corelaw_banner_one_content_contact_title']) ?></span>
                                            <?php endif ?>
                                            <?php if( !empty( $settings['corelaw_banner_one_content_contact_number'] ) ) : ?>
                                            <h5><a href="<?php echo esc_attr__('tel:+8801701111000','corelaw-core')?>"><?php echo esc_html($settings['corelaw_banner_one_content_contact_number']) ?></a></h5>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ( $settings['corelaw_banner_style'] == 'style_two' ) : ?>

            <div class="banner2-section">
                <div class="container-fluid px-0">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <?php foreach($data2 as $item2): ?>
                                <div class="swiper-slide">
                                    <?php if( !empty( $item2['corelaw_banner_two_content_image']['url'] ) ) : ?>
                                        <img src="<?php echo esc_url($item2['corelaw_banner_two_content_image']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image','corelaw-core') ?>">
                                    <?php endif ?>
                                        <div class="banner-content">
                                            <?php if( !empty( $item2['corelaw_banner_two_content_main_title'] ) ) : ?>
                                                <p><?php echo esc_html($item2['corelaw_banner_two_content_main_title']) ?></p>
                                            <?php endif ?>
                                            <span></span>
                                            <?php if( !empty( $item2['corelaw_banner_two_content_sub_title'] ) ) : ?>
                                                <h2><?php echo esc_html($item2['corelaw_banner_two_content_sub_title']) ?></h2>
                                            <?php endif ?>
                                            <?php if( !empty( $item2['corelaw_banner_two_content_button_text'] ) ) :   ?>
                                                <div class="eg-btn btn--primary2 capsule btn--lg d-inline-block">
                                                    <a href="<?php echo esc_url($item2['corelaw_banner_two_content_button_url']['url']) ?>"><?php echo esc_html($item2['corelaw_banner_two_content_button_text']) ?> &nbsp;<svg width="18" height="15" viewBox="0 0 22 13" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M21.9805 6.64708C21.955 6.74302 20.6834 7.78829 18.0766 9.85862C13.9311 13.156 14.0201 13.0954 13.5751 12.949C13.1809 12.8177 13.0219 12.5097 13.1809 12.1814C13.2127 12.1057 14.6369 10.9342 16.3408 9.5809L19.4309 7.11669V5.90479L16.3091 3.41534C14.23 1.75907 13.1682 0.885493 13.1427 0.789551C13.041 0.466377 13.2635 0.143203 13.6577 0.0472607C13.7595 0.0270623 13.8485 0.00181433 13.8612 0.00181433C14.0201 -0.0385824 14.8467 0.582518 18.1148 3.18306C20.6898 5.23824 21.955 6.27846 21.9805 6.36935C22.0059 6.45015 22.0059 6.57134 21.9805 6.64708Z" fill="white"/>
                                                        <path d="M17.4313 5.90479V7.11669L2.71236 7.10659C2.27365 7.10608 1.84766 7.10558 1.43438 7.10507C1.19278 7.10507 0.954985 7.10457 0.721643 7.10457C0.320448 7.09396 0 6.83189 0 6.51074C0 6.34662 0.0839268 6.19817 0.218718 6.09061C0.349695 5.98659 0.528993 5.92044 0.728001 5.9169L1.23283 5.9164L2.706 5.91488L17.4313 5.90479Z" fill="white"/>
                                                        </svg>
                                                    </a>
                                                </div>            
                                            <?php endif ?>
                                        </div>
                                </div>
                            <?php endforeach ?>   
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="swiper mySwiper smalll-image">
                        <div class="swiper-wrapper d-flex flex-column justify-content-center">
                            <div class="swiper-slide">
                                <?php if( !empty( $settings['corelaw_banner_two_content_small_image_one']['url'] ) ) : ?>
                                    <img src="<?php echo esc_url($settings['corelaw_banner_two_content_small_image_one']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image','corelaw-core') ?>">
                                <?php endif ?>
                            </div>
                            <div class="swiper-slide">
                                <?php if( !empty( $settings['corelaw_banner_two_content_small_image_two']['url'] ) ) : ?>
                                    <img src="<?php echo esc_url($settings['corelaw_banner_two_content_small_image_two']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image','corelaw-core') ?>">
                                <?php endif ?>
                            </div>
                            <div class="swiper-slide">
                                <?php if( !empty( $settings['corelaw_banner_two_content_small_image_three']['url'] ) ) : ?>
                                    <img src="<?php echo esc_url($settings['corelaw_banner_two_content_small_image_three']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image','corelaw-core') ?>">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="slider-arrows banner2-arrows text-center d-sm-flex d-none flex-column justify-content-center align-items-center gap-4">
                        <div class="banner2-prev swiper-prev-arrow style-2" tabindex="0" role="button" aria-label="Previous slide"> 
                            <?php if( !empty( $settings['corelaw_banner_two_content_prev_icon'] ) ) : ?>
                                <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_banner_two_content_prev_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php endif ?>
                        </div>
                        <div class="banner2-next swiper-next-arrow style-2" tabindex="0" role="button" aria-label="Next slide"> 
                            <?php if( !empty( $settings['corelaw_banner_two_content_next_icon'] ) ) : ?>
                                <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_banner_two_content_next_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ( $settings['corelaw_banner_style'] == 'style_three' ) : ?>

             <div class="banner-section3">
                <?php if( !empty( $settings['corelaw_banner_three_content_image_background']['url'] ) ) : ?>
                    <img src="<?php echo esc_url($settings['corelaw_banner_three_content_image_background']['url']) ?>" alt="<?php echo esc_attr__('BG image','corelaw-core') ?>" class="banner3-vector">
                    <?php endif ?>
                <div class="banner-social-area-dark">
                    <ul class="banner-social gap-4">
                        <?php foreach($data3 as $item3): ?>
                            <?php if( !empty( $item3['corelaw_banner_three_content_social_icon'] ) ) : ?>
                                <li><a href="<?php echo esc_url($item3['corelaw_banner_three_content_social_icon_link']['url']) ?>">
                                <i><?php \Elementor\Icons_Manager::render_icon( $item3['corelaw_banner_three_content_social_icon'], [ 'aria-hidden' => 'true' ] ); ?></i></a></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="banner3-bg"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="swiper banner3-slider">
                            <div class="swiper-wrapper">
                                <?php foreach($data4 as $item4): ?>
                                    <div class="swiper-slide">
                                        <div class="bann31-single d-flex align-items-center">
                                            <div class="content">
                                            <?php if( !empty( $item4['corelaw_banner_three_content_main_title'] ) ) : ?>
                                                <span><?php echo esc_html($item4['corelaw_banner_three_content_main_title']) ?></span>
                                            <?php endif ?>
                                            <h2>
                                                <?php if( !empty( $item4['corelaw_banner_three_content_secondary_sub_title'] ) ) : ?>
                                                    <?php echo esc_html($item4['corelaw_banner_three_content_sub_title']) ?>
                                                <?php endif ?>
                                                <?php if( !empty( $item4['corelaw_banner_three_content_secondary_sub_title'] ) ) : ?>
                                                    <span><?php echo esc_html($item4['corelaw_banner_three_content_secondary_sub_title']) ?></span>
                                                <?php endif ?>
                                            </h2>
                                                <div class="button-group gap-5 d-flex justify-content-xl-start justify-content-center flex-md-nowrap flex-wrap">
                                                    <a href="<?php echo esc_url($item4['corelaw_banner_three_content_button_url']['url']) ?>" class="eg-btn btn--primary2 sibling2  btn--lg2"><i class="bi bi-dash-lg"></i> <?php echo esc_html($item4['corelaw_banner_three_content_button_text']) ?><i class="bi bi-chevron-right"></i></a>
                                                    <div class="btn-with-vdo d-flex align-items-center gap-4">
                                                        <?php if( !empty( $item4['corelaw_banner_three_content_video_button_url']['url'] ) ) :   ?>
                                                            <div class="video-play">
                                                                <a href="<?php echo esc_url($item4['corelaw_banner_three_content_video_button_url']['url']) ?>" class="popup-youtube video-icon"><i class="bx bx-play"></i></a>
                                                            </div>          
                                                        <?php endif ?>
                                                        
                                                        <?php if( !empty( $item4['corelaw_banner_three_content_video_button_url'] ['url']) ) : ?>
                                                            <a href="<?php echo esc_url($item4['corelaw_banner_three_content_video_button_url']['url']) ?>" class="video-btn popup-youtube"><?php echo esc_html($item4['corelaw_banner_three_content_video_button_text']) ?></a>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php if( !empty( $item4['corelaw_banner_three_content_image_three']['url'] ) ) : ?>
                                                     <div class="banner3-lawyer-img">
                                                        <img src="<?php echo esc_url($item4['corelaw_banner_three_content_image_three']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image','corelaw-core') ?>"> 
                                                     </div>                         
                                                <?php endif ?>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-arrows banner3-arrows text-center d-md-flex d-none flex-row justify-content-center align-items-center gap-5">
                    <div class="banner3-prev swiper-prev-arrow style-3" tabindex="0" role="button" aria-label="Previous slide"> 
                    <?php if( !empty( $settings['corelaw_banner_three_content_prev_icon'] ) ) : ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_banner_three_content_prev_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php endif ?>
                    </div>
                    <div class="banner3-next swiper-next-arrow style-3" tabindex="0" role="button" aria-label="Next slide"> 
                    <?php if( !empty( $settings['corelaw_banner_three_content_next_icon'] ) ) : ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_banner_three_content_next_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php endif ?>
                    </div>
                </div>
            </div>
            
        <?php endif ?>

        <?php if ( $settings['corelaw_banner_style'] == 'style_four' ) : ?>

             <div class="banner-section3 sibling2">
                <?php if( !empty( $settings['corelaw_banner_three_content_image_background']['url'] ) ) : ?>
                    <img src="<?php echo esc_url($settings['corelaw_banner_three_content_image_background']['url']) ?>" alt="<?php echo esc_attr__('BG image','corelaw-core') ?>" class="banner3-vector">
                    <?php endif ?>
                <div class="banner-social-area-light">
                    <ul class="banner-social gap-4">
                        <?php foreach($data3 as $item3): ?>
                            <?php if( !empty( $item3['corelaw_banner_three_content_social_icon'] ) ) : ?>
                                <li><a href="<?php echo esc_url($item3['corelaw_banner_three_content_social_icon_link']['url']) ?>">
                                <i><?php \Elementor\Icons_Manager::render_icon( $item3['corelaw_banner_three_content_social_icon'], [ 'aria-hidden' => 'true' ] ); ?></i></a></li>
                            <?php endif ?>
                            
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="banner3-bg"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="swiper banner3-slider">
                            <div class="swiper-wrapper">
                                <?php foreach($data4 as $item4): ?>
                                    <div class="swiper-slide">
                                        <div class="bann31-single d-flex align-items-center">
                                            <div class="content">
                                            <?php if( !empty( $item4['corelaw_banner_three_content_main_title'] ) ) : ?>
                                                <span><?php echo esc_html($item4['corelaw_banner_three_content_main_title']) ?></span>
                                            <?php endif ?>
                                            <h2>
                                                <?php if( !empty( $item4['corelaw_banner_three_content_secondary_sub_title'] ) ) : ?>
                                                    <?php echo esc_html($item4['corelaw_banner_three_content_sub_title']) ?>
                                                <?php endif ?>
                                                <?php if( !empty( $item4['corelaw_banner_three_content_secondary_sub_title'] ) ) : ?>
                                                    <span><?php echo esc_html($item4['corelaw_banner_three_content_secondary_sub_title']) ?></span>
                                                <?php endif ?>
                                            </h2>
                                                <div class="button-group gap-5 d-flex justify-content-xl-start justify-content-center flex-md-nowrap flex-wrap">
                                                    <a href="<?php echo esc_url($item4['corelaw_banner_three_content_button_url']['url']) ?>" class="eg-btn btn--primary2 sibling2  btn--lg2"><i class="bi bi-dash-lg"></i> <?php echo esc_html($item4['corelaw_banner_three_content_button_text']) ?><i class="bi bi-chevron-right"></i></a>
                                                    <div class="btn-with-vdo d-flex align-items-center gap-4">
                                                        <div class="video-play">
                                                            <a href="<?php echo esc_url($item4['corelaw_banner_three_content_video_button_url']['url']) ?>" class="popup-youtube video-icon"><i class="bx bx-play"></i></a>
                                                        </div>
                                                        <?php if( !empty( $item4['corelaw_banner_three_content_video_button_url'] ['url']) ) : ?>
                                                            <a href="<?php echo esc_url($item4['corelaw_banner_three_content_video_button_url']['url']) ?>" class="video-btn popup-youtube"><?php echo esc_html($item4['corelaw_banner_three_content_video_button_text']) ?></a>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner3-lawyer-img">
                                                <?php if( !empty( $item4['corelaw_banner_three_content_image_three']['url'] ) ) : ?>
                                                    <img src="<?php echo esc_url($item4['corelaw_banner_three_content_image_three']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image','corelaw-core') ?>">                          
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="slider-arrows banner3-arrows text-center d-md-flex d-none flex-row justify-content-center align-items-center gap-5">
                    <div class="banner3-prev swiper-prev-arrow style-3" tabindex="0" role="button" aria-label="Previous slide"> 
                    <?php if( !empty( $settings['corelaw_banner_three_content_prev_icon'] ) ) : ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_banner_three_content_prev_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php endif ?>
                    </div>
                    <div class="banner3-next swiper-next-arrow style-3" tabindex="0" role="button" aria-label="Next slide"> 
                    <?php if( !empty( $settings['corelaw_banner_three_content_next_icon'] ) ) : ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_banner_three_content_next_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php endif ?>
                    </div>
                </div>
            </div>   
        <?php endif ?>
    <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Banner_Widget());