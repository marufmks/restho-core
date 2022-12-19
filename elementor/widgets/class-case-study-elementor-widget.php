<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_case_study_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_case_study';
    }

    public function get_title()
    {
        return esc_html__('EG Case Study', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {

        //grneral section
        $this->start_controls_section(
            'restho_case_study_general_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );


        
        $this->add_control(
            'restho_case_study_general_section_select',
            [
                'label'     => esc_html__( 'Design', 'restho-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'        => esc_html__( 'Style One', 'restho-core' ),
                    'style_two'        => esc_html__( 'Style Two', 'restho-core' ),
                    'style_three'      => esc_html__( 'Style Three', 'restho-core' ),
                ],
            ]
        );


        $this->end_controls_section();

        
        //Design two content controls

         //Heading section
        $this->start_controls_section(
            'restho_case_study_design_two_heading_section',
            [
                'label' => esc_html__('Heading', 'restho-core'),
                'condition' => [
                    'restho_case_study_general_section_select' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'restho_case_study_design_two_content_main_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Wellcome to restho', 'restho-core'),
                'label_block' => true,
                
            ]
        );
       

        $this->add_control(
            'restho_case_study_design_two_content_sub_title',
            [
                'label' => esc_html__('Sub Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We Are Specialise In All', 'restho-core'),
                'label_block' => true,
                
            ]
        );

  
        $this->end_controls_section(); 

       
        //template section starts here

        $this->start_controls_section(
            'restho_case_study_template_section',
            [
                'label' => esc_html__('Template', 'restho-core')
            ]
        );

        $this->add_control(
			'restho_case_study_posts_per_page',
			[
				'label'       => esc_html__('Posts Per Page', 'restho-core'),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 9,
				'label_block' => false,
			]
		);
		$this->add_control(
			'restho_case_study_template_order_by',
			[
				'label'   => esc_html__('Order By', 'restho-core'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'ID'         => esc_html__('Post Id', 'restho-core'),
					'author'     => esc_html__('Post Author', 'restho-core'),
					'title'      => esc_html__('Title', 'restho-core'),
					'post_date'  => esc_html__('Date', 'restho-core'),
					'rand'       => esc_html__('Random', 'restho-core'),
					'menu_order' => esc_html__('Menu Order', 'restho-core'),
				],
			]
		);
		$this->add_control(
			'restho_case_study_template_order',
			[
				'label'   => esc_html__('Order', 'restho-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'asc'  => esc_html__('Ascending', 'restho-core'),
					'desc' => esc_html__('Descending', 'restho-core')
				],
				'default' => 'desc',
			]
		);
        
        
        $this->end_controls_section();  


        // --------------style one start----------------------//

        //category Style
        $this->start_controls_section(
             'restho_case_study_one_category_section',
             [
                'label' => esc_html__('Category', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_case_study_general_section_select' => 'style_one'
                ]
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_one_category_section_typ',
                'selector' => '{{WRAPPER}} .casestudy-single .text span',
        
            ]
        );
        
        $this->add_control(
            'restho_case_study_one_category_section_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .text span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'restho_case_study_one_category_bar_background',
            [
                'label'     => esc_html__('Bar Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .text span::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_case_study_one_category_section_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .text span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
       
        //title Style
        $this->start_controls_section(
             'restho_case_study_one_title_section',
             [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_case_study_general_section_select' => 'style_one'
                ]
             ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_one_title_section_typ',
                'selector' => '{{WRAPPER}} .casestudy-single .text h3',
        
            ]
        );
        
        $this->add_control(
            'restho_case_study_one_title_section_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .text h3' => 'color: {{VALUE}};',
                ],
            ]
        );
      
        $this->add_control(
            'restho_case_study_one_title_section_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .text h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // --------------style one end----------------------//

        // --------------style two start---------------//

            //Heading Title Style
            $this->start_controls_section(
                'restho_case_study_two_heading_title_style_section',
                [
                'label' => esc_html__('Heading Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_case_study_general_section_select' => 'style_two'
                ]
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_two_heading_title_style_typography',
                'selector' => '{{WRAPPER}} .section-title2 span',
                

            ]
        );

        $this->add_control(
            'restho_case_study_two_heading_title_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'restho_case_study_two_heading_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .section-title2 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

            //Heading Sub Title Style
            $this->start_controls_section(
                'restho_case_study_two_heading_sub_title_style_section',
                [
                'label' => esc_html__('Heading Sub Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_case_study_general_section_select' => 'style_two'
                ]
                ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_two_heading_sub_title_style_typography',
                'selector' => '{{WRAPPER}} .section-title2 h2',
                

            ]
        );

        $this->add_control(
            'restho_case_study_two_heading_sub_title_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.sibling3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'restho_case_study_two_heading_sub_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
        

        //category Style
        $this->start_controls_section(
            'restho_case_study_two_section_category',
            [
               'label' => esc_html__('Category', 'restho-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'restho_case_study_general_section_select' => 'style_two'
               ]
            ]
       );
       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'restho-core'),
               'name'     => 'restho_case_study_two_section_category_typ',
               'selector' => '{{WRAPPER}} .casestudy-single2 .text span',
       
           ]
       );
       
       $this->add_control(
           'restho_case_study_two_section_category_color',
           [
               'label'     => esc_html__('Color', 'restho-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single2 .text span' => 'color: {{VALUE}};',
               ],
           ]
       );

       $this->add_control(
        'restho_case_study_two_category_bar_background',
        [
            'label'     => esc_html__('Bar Color', 'restho-core'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .casestudy-single2 .text span::after' => 'background: {{VALUE}};',
            ],
        ]
    );
       
       $this->add_control(
           'restho_case_study_two_section_category_margin',
           [
               'label' => esc_html__( 'Margin', 'restho-core' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single2 .text span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
       );

      
       $this->end_controls_section();

       //title Style
       $this->start_controls_section(
            'restho_case_study_two_section_title',
            [
               'label' => esc_html__('Title', 'restho-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'restho_case_study_general_section_select' => 'style_two'
               ]
            ]
       );

       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'restho-core'),
               'name'     => 'restho_case_study_two_section_title_typ',
               'selector' => '{{WRAPPER}} .casestudy-single2 .text h3',
       
           ]
       );
       
       $this->add_control(
           'restho_case_study_two_section_title_color',
           [
               'label'     => esc_html__('Color', 'restho-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single2 .text h3' => 'color: {{VALUE}};',
               ],
           ]
       );
       $this->add_control(
           'restho_case_study_two_section_title_margin',
           [
               'label' => esc_html__( 'Margin', 'restho-core' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single2 .text h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
       );

       $this->end_controls_section();

       //Hover start
       $this->start_controls_section(
            'restho_case_study_two_hover_section',
            [
                'label' => esc_html__('Hover', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_case_study_general_section_select' => 'style_two'
                ]
            ]
        );

       $this->add_control(
           'restho_case_study_two_section_title_hover_color',
           [
               'label' => esc_html__( 'Title Color', 'restho-core' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single2 .content h3' => 'color: {{VALUE}}',
               ],
           ]
       );
       $this->add_control(
           'restho_case_study_two_section_description_text_hover_color',
           [
               'label' => esc_html__( 'Description  Color', 'restho-core' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single2 .content p' => 'color: {{VALUE}}',
               ],
           ]
       );
       $this->add_control(
           'restho_case_study_two_section_content_background_hover_color',
           [
               'label' => esc_html__( 'Background Color', 'restho-core' ),
               'type' => \Elementor\Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single2 .content' => 'background: {{VALUE}}',
               ],
           ]
       );

       $this->end_controls_section();

        //Button Text Style
        $this->start_controls_section(
            'restho_case_study_two_button_text_section',
            [
               'label' => esc_html__('Hover Button Title', 'restho-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'restho_case_study_general_section_select' => 'style_two'
               ]
            ]
       );

       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'restho-core'),
               'name'     => 'restho_case_study_two_section_button_text_typ',
               'selector' => '{{WRAPPER}} .casestudy-single2 .content .details-btn',
       
           ]
       );
       
       $this->add_control(
           'restho_case_study_two_section_button_text_color',
           [
               'label'     => esc_html__('Color', 'restho-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single2 .content .details-btn' => 'color: {{VALUE}};',
               ],
           ]
       );
       $this->add_control(
           'restho_case_study_two_section_button_text_margin',
           [
               'label' => esc_html__( 'Margin', 'restho-core' ),
               'type' => \Elementor\Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single2 .content .details-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
       );

       $this->end_controls_section();


       // ---------------style two end----------------------//

        // --------------style three start----------------------//


        

        //category Style
        $this->start_controls_section(
            'restho_case_study_three_category_section',
            [
               'label' => esc_html__('Category', 'restho-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'restho_case_study_general_section_select' => 'style_three'
               ]
            ]
       );
       $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_three_category_section_typ',
                'selector' => '{{WRAPPER}} .casestudy-single3 .content span',
        
            ]
        );
    
        $this->add_control(
            'restho_case_study_three_category_section_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single3 .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

      
        $this->add_control(
            'restho_case_study_three_category_section_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single3 .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        //Title 
        $this->start_controls_section(
            'restho_case_study_three_title_section',
            [
               'label' => esc_html__('Title', 'restho-core'),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                   'restho_case_study_general_section_select' => 'style_three'
               ]
            ]
       );
  
       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'label'    => esc_html__('Typography', 'restho-core'),
               'name'     => 'restho_case_study_three_title_section_typ',
               'selector' => '{{WRAPPER}} .casestudy-single3 .content h4 a',
       
           ]
       );
       
       $this->add_control(
           'restho_case_study_three_title_section_color',
           [
               'label'     => esc_html__('Color', 'restho-core'),
               'type'      => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .casestudy-single3 .content h4 a' => 'color: {{VALUE}};',
               ],
           ]
       );
      

        //Hover start

        $this->add_control(
            'restho_case_study_three_title_hover_color',
            [
                'label'     => esc_html__('Title Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single3 .content h4:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //card Style
        $this->start_controls_section(
             'restho_case_study_three_card',
             [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_case_study_general_section_select' => ['style_two','style_three']
                ]
             ]
        );
        
    
      
        $this->add_control(
            'restho_case_study_three_card_background',
            [
                'label' => esc_html__( 'Background', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single3 .content' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        

        // --------------style three end----------------------//

     


    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        

        $query = new \WP_Query(
			array(
				'post_type'      => 'egens-case-study',
				'posts_per_page' => $settings['restho_case_study_posts_per_page'],
				'orderby'        => $settings['restho_case_study_template_order_by'],
				'order'          => $settings['restho_case_study_template_order'],
				'offset'         => 0,
				'post_status'    => 'publish'
			)
		);


        ?>


        <script>
        
            <?php if(is_admin()) :  ?>
            var swiper = new Swiper(".casestudy2-slider", {
                slidesPerView: 1,
                speed: 1200,
                spaceBetween: 2,
                autoplay: true,
                loop: true,
                roundLengths: true,
                pagination: {
                el: ".swiper-pagination",
                clickable: "true",
                },
                navigation: {
                nextEl: ".case2-prev",
                prevEl: ".case2-next",
                },
                breakpoints: {
                280: {
                    slidesPerView: 1,
                    navigation: false,
                },
                576: {
                    slidesPerView: 1,
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
                    slidesPerView: 4,
                },
                },
            });
        
            <?php endif ?>
        </script>


        <?php if ( $settings['restho_case_study_general_section_select'] == 'style_one' ) : ?>
            
            <div class="casestudy-section">
                <?php if( !empty( $settings['restho_case_study_one_background_image_one']['url'] ) ) : ?>
                    <img src="<?php echo esc_url( $settings['restho_case_study_one_background_image_one']['url'])?>" class="section-bg1 img-fluid" alt="<?php echo esc_attr__('image','restho-core')?>">
                <?php endif ?>
                <?php if( !empty( $settings['restho_case_study_one_background_image_two']['url'] ) ) : ?>
                    <img src="<?php echo esc_url( $settings['restho_case_study_one_background_image_two']['url'])?>" class="section-bg2 img-fluid" alt="<?php echo esc_attr__('image','restho-core')?>">
                <?php endif ?>                
                <div class="row justify-content-center g-4">
                    <?php
                    if ( $query ->have_posts() ) {
                    while( $query -> have_posts() ) {
                        $query -> the_post();
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-10 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <div class="casestudy-single">
                            <?php the_post_thumbnail('',['class' => 'casestudy1']); ?>
                            <a href="<?php the_permalink()?>" class="read-more"><span class="btn-text"><?php echo esc_html__('Read More','restho-core')?></span><span class="btn-arrow"><i class="bi bi-arrow-right"></i></span></a>
                            <div class="text">
                            <?php 
                                $category = get_the_terms(get_the_ID( ), 'egens-case-study-category');
                            ?>
                                <span><?php echo esc_html($category[0]->name) ?> </span> 
                                <h3><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
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

        <?php if ( $settings['restho_case_study_general_section_select'] == 'style_two' ) : ?>

            <div class="casestudy-section2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-8 col-md-9">
                            <div class="section-title2 sibling3 text-lg-start text-center">
                                 <?php if( !empty( $settings['restho_case_study_design_two_content_main_title'] ) ) : ?>
                                    <span><?php echo esc_html($settings['restho_case_study_design_two_content_main_title']) ?></span>
                                 <?php endif ?>
                                 <?php if( !empty( $settings['restho_case_study_design_two_content_sub_title'] ) ) : ?>
                                    <h2><?php echo esc_html($settings['restho_case_study_design_two_content_sub_title']) ?></h2>
                                 <?php endif ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-3 d-md-flex d-none justify-content-end">
                            <div class="slider-arrows banner2-arrows text-center d-sm-flex d-none flex-row justify-content-center align-items-center gap-4">
                                <div class="case2-prev swiper-prev-arrow" tabindex="0" role="button" aria-label="Previous slide"> 
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/arr-prev.svg" alt="image">
                                </div>
                                <div class="case2-next swiper-next-arrow" tabindex="0" role="button" aria-label="Next slide"> 
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/arr-next.svg" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row mt-60">
                        <div class="swiper casestudy2-slider">
                            <div class="swiper-wrapper">
                                <?php
                                if ( $query ->have_posts() ) {
                                while( $query -> have_posts() ) {
                                    $query -> the_post();
                                ?>
                                <div class="swiper-slide wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                    <div class="casestudy-single2">
                                    <?php the_post_thumbnail('',['class' => 'casestudy1']); ?>                                        
                                    <div class="text">
                                        <?php 
                                       $category = get_the_terms(get_the_ID( ), 'egens-case-study-category');
                                         ?>
                                       
                                            <span><?php echo esc_html($category[0]->name) ?> </span>
                                       
                                            <h3><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
                                        </div>
                                        <div class="content-wrapper">
                                            <div class="content">
                                            <?php 
                                                $category = get_the_terms(get_the_ID( ), 'egens-case-study-category');
                                            ?>
                                            <span><?php echo esc_html($category[0]->name) ?> </span> 
                                                <h3><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
                                                <?php echo the_excerpt();?>                                            <a href="<?php the_permalink()?>" class="details-btn"><?php echo esc_html__('Read More','restho-core')?></a>
                                            </div>
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

        <?php if ( $settings['restho_case_study_general_section_select'] == 'style_three' ) : ?>

        <div class="case-study-section ">
            <div class="row justify-content-center g-4">
                <?php
                    if ( $query ->have_posts() ) {
                    while( $query -> have_posts() ) {
                        $query -> the_post();
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-10 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="200ms">
                        <div class="casestudy-single3">
                        <div class="image">
                        <?php the_post_thumbnail('',); ?>                                 
                            <a href="<?php the_permalink()?>" class="case-details-arrow">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/read-more-arro.svg" alt="image">
                            </a>
                        </div>
                        <div class="content">
                        <?php 
                            $category = get_the_terms(get_the_ID( ), 'egens-case-study-category');
                        ?>
                            <span><?php echo esc_html($category[0]->name) ?> </span>
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
        
        <?php endif;?>

        <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new restho_case_study_Widget());