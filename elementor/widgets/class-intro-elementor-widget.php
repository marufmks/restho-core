<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_intro_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_intro';
    }

    public function get_title()
    {
        return esc_html__('EG Intro', 'restho-core');
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
            'restho_section_title_content',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );

       

        $this->add_control(
			'restho_intro_style',
			[
				'label' => esc_html__( 'Intro Design', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style_one',
				'options' => [
					'style_one'  => esc_html__( 'Style 1', 'restho-core' ),
					'style_two' => esc_html__( 'Style 2', 'restho-core' ),
					'style_three' => esc_html__( 'Style 3', 'restho-core' ),
					
					
				],
			]
		);

        $this->end_controls_section();

        //style 1 controls

        $this->start_controls_section(
            'restho_intro_style_one_all_controls',
            [
                'label' => esc_html__('Items List', 'restho-core'),
                'condition' => [
                    'restho_intro_style' => 'style_one',
                ],
                
            ]
        ); 
       
        $repeater = new \Elementor\Repeater();
        

        $repeater->add_control(
			'restho_section_main_title',
			[
				'label' => esc_html__( 'Number', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 300,
			]
		);

        
       

        $repeater->add_control(
            'restho_section_intro_sub_title',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Expert Attorneys', 'restho-core'),
                'label_block' => true,
                
            ]
        );
       


     
        $repeater->add_control(
            'restho_section_intro_img',
            [
                'label' => esc_html__( 'Image', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Client List', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'restho_section_main_title' => esc_html__( 'Title #1', 'restho-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'restho-core' ),
					],
					
				],
				'title_field' => '{{{ restho_section_main_title }}}',
			]
		);
        
        
        $this->end_controls_section();
        // End section

         //style 2 controls

         $this->start_controls_section(
            'restho_intro_style_two_all_controls',
            [
                'label' => esc_html__('Items List', 'restho-core'),
                'condition' => [
                    'restho_intro_style' => 'style_two',
                ],
                
            ]
        ); 
       
        $repeater2 = new \Elementor\Repeater();
        
        $repeater2->add_control(
            'restho_section_main_title_two',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Top Experienced.', 'restho-core'),
                'label_block' => true,
            ]
        );

        
       

        $repeater2->add_control(
            'restho_section_intro_sub_title2',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('In consequat tincidunt turpis sit amet imperdiet. 
                Praesent nonat mauris laoreet, iaculis libero quis.', 'restho-core'),
                'label_block' => true,
                
            ]
        );
       

        $repeater2->add_control(
			'restho_section_intro_icon2',
			[
				'label' => esc_html__( 'Icon', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);

        $this->add_control(
			'list2',
			[
				'label' => esc_html__( 'Client List', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'restho_section_main_title_two' => esc_html__( 'Title #1', 'restho-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'restho-core' ),
					],
					
				],
				'title_field' => '{{{ restho_section_main_title_two }}}',
			]
		);
        
        
        $this->end_controls_section();
        // End section

        //style 3 controls

        //style 3 card 1
        $this->start_controls_section(
            'restho_intro_style_three_card_one',
            [
                'label' => esc_html__('Card One', 'restho-core'),
                'condition' => [
                    'restho_intro_style' => 'style_three',
                ],
                
            ]
        ); 

        $this->add_control(
			'restho_intro_style_three_card_one_title',
			[
				'label' => esc_html__( 'Number', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 300,
			]
		);

       
        
       

        $this->add_control(
            'restho_intro_style_three_card_one_sub_title',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Expert Attorneys', 'restho-core'),
                'label_block' => true,
                
            ]
        );
       


        $this->add_control(
            'restho_intro_style_three_card_one_image',
            [
                'label' => esc_html__( 'Image', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );


        $this->end_controls_section();

        //style 3 card 2
        $this->start_controls_section(
            'restho_intro_style_three_card_two',
            [
                'label' => esc_html__('Card Two', 'restho-core'),
                'condition' => [
                    'restho_intro_style' => 'style_three',
                ],
            ]
        ); 

       

        $this->add_control(
			'restho_intro_style_three_card_two_title',
			[
				'label' => esc_html__( 'Number', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 300,
			]
		);

        
       

        $this->add_control(
            'restho_intro_style_three_card_two_sub_title',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Expert Attorneys', 'restho-core'),
                'label_block' => true,
                
            ]
        );
       



      
        $this->add_control(
            'restho_intro_style_three_card_two_image',
            [
                'label' => esc_html__( 'Image', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );



        $this->end_controls_section();

        //style 3 card 3
        $this->start_controls_section(
            'restho_intro_style_three_card_three',
            [
                'label' => esc_html__('Card Three', 'restho-core'),
                'condition' => [
                    'restho_intro_style' => 'style_three',
                ],
                
            ]
        ); 

        

        
        $this->add_control(
			'restho_intro_style_three_card_three_title',
			[
				'label' => esc_html__( 'Number', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 120,
			]
		);
        
       

        $this->add_control(
            'restho_intro_style_three_card_three_sub_title',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Expert Attorneys', 'restho-core'),
                'label_block' => true,
                
            ]
        );
       



        $this->add_control(
            'restho_intro_style_three_card_three_image',
            [
                'label' => esc_html__( 'Image', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );



        $this->end_controls_section();

        //style 3 card 4
        $this->start_controls_section(
            'restho_intro_style_three_card_four',
            [
                'label' => esc_html__('Card Four', 'restho-core'),
                'condition' => [
                    'restho_intro_style' => 'style_three',
                ],
            ]
        ); 

        

       

        $this->add_control(
			'restho_intro_style_three_card_four_title',
			[
				'label' => esc_html__( 'Number', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 400,
			]
		);

        
       

        $this->add_control(
            'restho_intro_style_three_card_four_sub_title',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Expert Attorneys', 'restho-core'),
                'label_block' => true,
                
            ]
        );
       


     
        $this->add_control(
            'restho_intro_style_three_card_four_image',
            [
                'label' => esc_html__( 'Image', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );



        $this->end_controls_section();



        //baCKGROUND Style

        //icon & svg Style
        $this->start_controls_section(
             'corrlaw_intro_section_svg_icon',
             [
                'label' => esc_html__('Icon & SVG', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'corrlaw_intro_section_svg_color',
            [
                'label' => esc_html__( 'SVG Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro-wrap .img-fluid svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'corrlaw_intro_section_svg_size',
            [
                'label' => esc_html__( 'SVG Size', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    
                ],
                'selectors' => [
                    '{{WRAPPER}} .intro-wrap .img-fluid svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_control(
            'corrlaw_intro_section_icon_colorr',
            [
                'label' => esc_html__( 'Icon Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .img-fluid i' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'corrlaw_intro_section_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    
                ],
                'selectors' => [
                    '{{WRAPPER}} .img-fluid i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
            'restho_background_style_section',
            [
                'label' => esc_html__('Intro Card Background', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        ); 

        $this->add_control(
            'restho_section_background_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro-single' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .intro-singe2' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .intro-single.sibling2' => 'background: {{VALUE}};',
                    
                ],
            ]
        );
        $this->add_control(
            'restho_section_background_hover_style_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                   
                    '{{WRAPPER}} .intro-single::after' => 'background-color: {{VALUE}};',
                    
                    '{{WRAPPER}} .intro-single.sibling2::after' => 'background-color: {{VALUE}};',
                    
                ],
                'condition' => [
                    'restho_intro_style' => ['style_one','style_three'],
                ],

            ]
        );

       


        $this->end_controls_section();

        $this->start_controls_section(
            'restho_section_title_style_section',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

    

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_intro_section_title_typography',
                'selectors' => [
                    '{{WRAPPER}} .intro-single .intro-wrap h3',
                    '{{WRAPPER}} .intro-singe2 .text h4',
                    '{{WRAPPER}} .intro-single.sibling2 .intro-wrap h3',
                 ]

            ]
        );

        $this->add_control(
            'restho_section_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro-singe2 .text h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .intro-single.sibling2 .intro-wrap h3' => 'color: {{VALUE}};',
                    
                ],
                'condition' => [
                    'restho_intro_style' => ['style_two','style_three'],
                ],
            ]
        );
        $this->add_control(
            'restho_section_title_hover_color',
            [
                'label'     => esc_html__('Title Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro-single:hover .intro-wrap h3' => 'color: {{VALUE}};',
                    
                ],
                'condition' => [
                    'restho_intro_style' => 'style_one',
                ],
            ]
        );
        $this->add_control(
			'frestho_section_title_margin',
			[
				'label' => esc_html__( 'Margin', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .intro-single .intro-wrap h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .intro-singe2 .text h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .intro-single.sibling2 .intro-wrap h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        //Sub title Style
        $this->start_controls_section(
            'restho_section_number_style_section',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_section_number_typography',
                'selectors' => [
                 '{{WRAPPER}} .intro-single .intro-wrap h5',
                 '{{WRAPPER}} .intro-singe2 .text p',
                 '{{WRAPPER}} .intro-single.sibling2 .intro-wrap h5',
                 ]

            ]
        );

        $this->add_control(
            'restho_section_number_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro-single .intro-wrap h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .intro-singe2 .text p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .intro-single.sibling2 .intro-wrap h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
			'restho_section_number_margin',
			[
				'label' => esc_html__( 'Margin', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .intro-single .intro-wrap h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .intro-singe2 .text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .intro-single.sibling2 .intro-wrap h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        //Icon Style
        $this->start_controls_section(
            'restho_intro_section_icon_style_section',
            [
                'label' => esc_html__('Icon', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_intro_style' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'restho_intro_section_icon_color_style',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'restho_intro_section_icon_size_style',
            [
                'label' => esc_html__( 'Icon Size', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px','rem' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
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
                    '{{WRAPPER}} .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }
    protected function render()
    {
        
        $settings = $this->get_settings_for_display();
        $data=$settings['list'];
        $data2=$settings['list2'];
        ?>
        <?php if( is_admin() ) : ?>
            <script>
                  jQuery(".intro-single").each(function () {
                    jQuery(this).isInViewport(function (status) {
                    if (status === "entered") {
                        for (
                        var i = 0;
                        i < document.querySelectorAll(".odometer").length;
                        i++
                        ) {
                        var el = document.querySelectorAll(".odometer")[i];
                        el.innerHTML = el.getAttribute("data-odometer-final");
                        }
                    }
                    });
                });
                  // niceSelect
                jQuery("select").niceSelect();
            </script>
        <?php endif; ?>
    <?php if ( $settings['restho_intro_style'] == 'style_one' ) : ?>  
        <div class="intro-section">
            <div class="container-lg container-fluid">
                <div class="row justify-content-center gx-0">
                    <?php foreach($data as $key=> $item): ?>
                        <div class="col-lg-3 col-md-3 col-sm-6  wow animate fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <div class="intro-single">
                                <span class="s-number"> <?php echo "0".$key+1 ;?> </span>
                                <div class="intro-wrap d-flex flex-column">
                                    <?php if( !empty( $item['restho_section_intro_img']['url'] ) ) : ?>
                                        <div class="img-fluid">
                                            <?php \Elementor\Icons_Manager::render_icon( $item['restho_section_intro_img'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if( !empty( $item['restho_section_main_title'] ) ) : ?>
                                        <h3 class="odometer" data-odometer-final="150"><?php echo esc_html($item['restho_section_main_title']) ?></h3>                          
                                    <?php endif ?>
                                    <?php if( !empty( $item['restho_section_intro_sub_title'] ) ) : ?>
                                        <h5><?php echo esc_html($item['restho_section_intro_sub_title']) ?></h5>                          
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    <?php endif ?>

    <?php if ( $settings['restho_intro_style'] == 'style_two' ) : ?>

        <div class="intro-section2">
            <div class="container-fluid px-0">
                <div class="row g-lg-0 g-3 justify-content-center">
                    <?php $num=1; foreach($data2 as $item): ?>
                        <div class="col-lg-4 col-md-10 col-sm-10">
                            <div class="intro-singe2 <?php if($num == 2){echo 'sibling2';} ?>">
                                <span class="s-number"> <?php echo '0'.$num;?> </span>
                                    <?php if( !empty( $item['restho_section_intro_icon2'] ) ) : ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon( $item['restho_section_intro_icon2'], [ 'aria-hidden' => 'true' ] ); ?>                          
                                        </div>
                                    <?php endif ?>
                                <div class="text">
                                    <?php if( !empty( $item['restho_section_main_title_two'] ) ) : ?>
                                        <h4><?php echo esc_html($item['restho_section_main_title_two']) ?></h4>                          
                                    <?php endif ?>
                                    <?php if( !empty( $item['restho_section_intro_sub_title2'] ) ) : ?>
                                        <p><?php echo esc_html($item['restho_section_intro_sub_title2']) ?></p>                          
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php $num++; endforeach ?>
                </div>
            </div>
        </div>


    <?php endif ?>

    <?php if ( $settings['restho_intro_style'] == 'style_three' ) : ?>
        <div class="counter-section2">
                <div class="row justify-content-center gx-lg-0 g-4">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="intro-single sibling2 border-top-left-bottom wow animate fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <div class="intro-wrap d-flex flex-column">
                                <?php if( !empty( $settings['restho_intro_style_three_card_one_image'] ['url']) ) : ?>
                                    <div class="img-fluid">
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['restho_intro_style_three_card_one_image'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>
                                <?php endif ?>
                                <?php if( !empty( $settings['restho_intro_style_three_card_one_title'] ) ) : ?>
                                    <h3 class="odometer" data-odometer-final="<?php echo esc_html($settings['restho_intro_style_three_card_one_title']) ?>">&nbsp;</h3>                          
                                <?php endif ?>
                                <?php if( !empty( $settings['restho_intro_style_three_card_one_sub_title'] ) ) : ?>
                                    <h5><?php echo esc_html($settings['restho_intro_style_three_card_one_sub_title']) ?></h5>                          
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="intro-single sibling2  wow animate fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                            <div class="intro-wrap d-flex flex-column">
                                    <?php if( !empty( $settings['restho_intro_style_three_card_two_image']['url'] ) ) : ?>
                                        <div class="img-fluid">
                                            <?php \Elementor\Icons_Manager::render_icon( $settings['restho_intro_style_three_card_two_image'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </div>                          
                                    <?php endif ?>
                                    <?php if( !empty( $settings['restho_intro_style_three_card_two_title'] ) ) : ?>
                                        <h3 class="odometer" data-odometer-final="<?php echo esc_html($settings['restho_intro_style_three_card_two_title']) ?>">&nbsp;</h3>                          
                                    <?php endif ?>
                                    <?php if( !empty( $settings['restho_intro_style_three_card_two_sub_title'] ) ) : ?>
                                        <h5><?php echo esc_html($settings['restho_intro_style_three_card_two_sub_title']) ?></h5>                          
                                    <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="intro-single sibling2 wow animate fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">
                            <div class="intro-wrap d-flex flex-column">
                                <?php if( !empty( $settings['restho_intro_style_three_card_three_image']['url'] ) ) : ?>
                                    <div class="img-fluid">
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['restho_intro_style_three_card_three_image'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>                         
                                <?php endif ?>
                                <?php if( !empty( $settings['restho_intro_style_three_card_three_title'] ) ) : ?>
                                    <h3 class="odometer" data-odometer-final="<?php echo esc_html($settings['restho_intro_style_three_card_three_title']) ?>">&nbsp;</h3>                          
                                <?php endif ?>
                                <?php if( !empty( $settings['restho_intro_style_three_card_three_sub_title'] ) ) : ?>
                                    <h5><?php echo esc_html($settings['restho_intro_style_three_card_three_sub_title']) ?></h5>                          
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="border-unset intro-single border-top-right-bottom sibling2 wow animate fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                            <div class="intro-wrap d-flex flex-column">
                                <?php if( !empty( $settings['restho_intro_style_three_card_four_image']['url'] ) ) : ?>
                                     <div class="img-fluid">
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['restho_intro_style_three_card_four_image'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>                              
                                <?php endif ?>
                                <?php if( !empty( $settings['restho_intro_style_three_card_four_title'] ) ) : ?>
                                    <h3 class="odometer" data-odometer-final="<?php echo esc_html($settings['restho_intro_style_three_card_four_title']) ?>">&nbsp;</h3>                          
                                <?php endif ?>
                                <?php if( !empty( $settings['restho_intro_style_three_card_four_sub_title'] ) ) : ?>
                                    <h5><?php echo esc_html($settings['restho_intro_style_three_card_four_sub_title']) ?></h5>                          
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

Plugin::instance()->widgets_manager->register(new restho_intro_Widget());
