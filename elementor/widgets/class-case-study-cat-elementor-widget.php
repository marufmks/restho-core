<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Case_Study_Cat_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_case_study_cat';
    }

    public function get_title()
    {
        return esc_html__('EG  Category', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-library-upload';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
        
        //general Section
        $this->start_controls_section(
            'corelaw_selection_choose',
            [
                'label' => esc_html__('Genetal', 'corelaw-core')
            ]
        );

    
        $this->add_control(
            'corelaw_selection_choose_selection',
            [
                'label'     => esc_html__( 'Choose Category', 'corelaw-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'      => esc_html__( 'Case Study Category', 'corelaw-core' ),
                    'style_two'      => esc_html__( 'Practice Area Category', 'corelaw-core' ),
                ],
            ]
        );
        
        
        
        
        $this->end_controls_section();
        
        
      
        //title Section
        $this->start_controls_section(
            'corelaw_titlee_selection',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'condition' => [
                    'corelaw_selection_choose_selection' => 'style_one'
                ]
            ]
        );

     
        $this->add_control(
            'corelaw_case_cat_title_text',
            [
                'label' => esc_html__( 'Title', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Case Study', 'corelaw-core' ),
                'label_block' => true,
            ]
        );
        
        
        $this->end_controls_section();  

        //--------------- Style ---------------------//

        // Title

        $this->start_controls_section(
             'corelaw_case_title_style',
             [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_selection_choose_selection' => 'style_one'
                ]
             ]
        );

        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_case_title_style_typ',
                'selector' => '{{WRAPPER}} .casestudy-card .header h4',
        
            ]
        );
        
        $this->add_control(
            'corelaw_case_title_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-card .header h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_case_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .casestudy-card .header h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

      
        $this->add_control(
            'corelaw_case_title_style_bac_color',
            [
                'label' => esc_html__( 'Background', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-card .header' => 'Background: {{VALUE}}',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        // Category

        $this->start_controls_section(
             'corelaw_case_cat_list_style',
             [
                'label' => esc_html__('Categoty List', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_selection_choose_selection' => 'style_one'
                ]
             ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_case_cat_list_style_typ',
                'selector' => '{{WRAPPER}} .casestudy-card .casestudy-list li span',
        
            ]
        );
        
        $this->add_control(
            'corelaw_case_cat_list_style_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-list li span a' => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'corelaw_case_cat_list_style_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .casestudy-card .casestudy-list li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        
        
        $this->end_controls_section();

        // svg

        $this->start_controls_section(
             'corelaw_case_svg_list_style',
             [
                'label' => esc_html__('SVG', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_selection_choose_selection' => 'style_one'
                ]
             ]
        );

        
        $this->add_control(
            'corelaw_case_cat_svg_color',
            [
                'label' => esc_html__( 'SVG Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.casestudy-list li span svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'corelaw_case_cat_svg_size',
            [
                'label' => esc_html__( 'SVG Size', 'corelaw-core' ),
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
                    '{{WRAPPER}} ul.casestudy-list li span svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();


        // --------------------style two-----------------------------//

         // Category

        $this->start_controls_section(
             'corelaw_case_cat_list_stylee',
             [
                'label' => esc_html__('Categoty List', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_selection_choose_selection' => 'style_two'
                ]
             ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_case_cat_list_stylee_typ',
                'selector' => '{{WRAPPER}} .service-list li a',
        
            ]
        );
        
        $this->add_control(
            'corelaw_case_cat_list_stylee_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-list li a' => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'corelaw_case_cat_list_stylee_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-list li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

      
        $this->add_control(
            'corelaw_case_cat_list_stylee_background',
            [
                'label' => esc_html__( 'Background Hover', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-list li:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        
        
        
        $this->end_controls_section();

        // svg

        $this->start_controls_section(
             'corelaw_case_svg_list_stylee',
             [
                'label' => esc_html__('SVG', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'corelaw_selection_choose_selection' => 'style_two'
                ]
             ]
        );

        
        $this->add_control(
            'corelaw_casee_cat_svg_color',
            [
                'label' => esc_html__( 'SVG Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.service-list li span svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'corelaw_casee_cat_svg_size',
            [
                'label' => esc_html__( 'SVG Size', 'corelaw-core' ),
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
                    '{{WRAPPER}} ul.service-list li span svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();




    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
         $currentID = get_the_ID();
        $query = new \WP_Query(
			array(
				'post_type'      => 'egens-case-study',
				'posts_per_page' => 8,
				'post_status'    => 'publish',
                'post__not_in' => array(
         $currentID)
			)
		);
        $currentID = get_the_ID();
        $queryy = new \WP_Query(
			array(
				'post_type'      => 'egens-practice-area',
				'posts_per_page' => 8,
				'post_status'    => 'publish',
                'post__not_in' => array(
         $currentID)
                
			)
		);
      
        
        ?>
      
        <!-- Content one -->
        <?php if($settings['corelaw_selection_choose_selection'] == 'style_one'):?>
        <div class="casestudy-card">
            <div class="header">
                <?php if( !empty( $settings['corelaw_case_cat_title_text'] ) ) :   ?>
                       <h4><?php echo esc_html($settings['corelaw_case_cat_title_text'])?></h4>         
                <?php endif ?>
            </div>
            <ul class="casestudy-list">



                    <?php

                        while( $query -> have_posts() ) {
                            $query -> the_post();
                        ?>
                        <!-- Content -->
                        <li><span><a href="<?php the_permalink()?>"><?php the_title() ?></a></span>
                            <span><svg width="18" height="15" viewBox="0 0 22 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.9805 6.64708C21.955 6.74302 20.6834 7.78829 18.0766 9.85862C13.9311 13.156 14.0201 13.0954 13.5751 12.949C13.1809 12.8177 13.0219 12.5097 13.1809 12.1814C13.2127 12.1057 14.6369 10.9342 16.3408 9.5809L19.4309 7.11669V5.90479L16.3091 3.41534C14.23 1.75907 13.1682 0.885493 13.1427 0.789551C13.041 0.466377 13.2635 0.143203 13.6577 0.0472607C13.7595 0.0270623 13.8485 0.00181433 13.8612 0.00181433C14.0201 -0.0385824 14.8467 0.582518 18.1148 3.18306C20.6898 5.23824 21.955 6.27846 21.9805 6.36935C22.0059 6.45015 22.0059 6.57134 21.9805 6.64708Z" fill="white"></path>
                            <path d="M17.4313 5.90479V7.11669L2.71236 7.10659C2.27365 7.10608 1.84766 7.10558 1.43438 7.10507C1.19278 7.10507 0.954985 7.10457 0.721643 7.10457C0.320448 7.09396 0 6.83189 0 6.51074C0 6.34662 0.0839268 6.19817 0.218718 6.09061C0.349695 5.98659 0.528993 5.92044 0.728001 5.9169L1.23283 5.9164L2.706 5.91488L17.4313 5.90479Z" fill="white"></path>
                            </svg>
                            </span>
                        </li>
                        <?php
                        }
                        wp_reset_postdata();
                        
                    ?>
                    
            </ul>
        </div>
        <?php endif;?>


        <!-- content two -->

        <?php if($settings['corelaw_selection_choose_selection'] == 'style_two'):?>
            <ul class="service-list">
                

                    <?php

                        while( $queryy -> have_posts() ) {
                            $queryy -> the_post();
                        ?>
                        <!-- Content -->
                        <li>
                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            <span><svg width="18" height="15" viewBox="0 0 22 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.9805 6.64708C21.955 6.74302 20.6834 7.78829 18.0766 9.85862C13.9311 13.156 14.0201 13.0954 13.5751 12.949C13.1809 12.8177 13.0219 12.5097 13.1809 12.1814C13.2127 12.1057 14.6369 10.9342 16.3408 9.5809L19.4309 7.11669V5.90479L16.3091 3.41534C14.23 1.75907 13.1682 0.885493 13.1427 0.789551C13.041 0.466377 13.2635 0.143203 13.6577 0.0472607C13.7595 0.0270623 13.8485 0.00181433 13.8612 0.00181433C14.0201 -0.0385824 14.8467 0.582518 18.1148 3.18306C20.6898 5.23824 21.955 6.27846 21.9805 6.36935C22.0059 6.45015 22.0059 6.57134 21.9805 6.64708Z" fill="white"></path>
                            <path d="M17.4313 5.90479V7.11669L2.71236 7.10659C2.27365 7.10608 1.84766 7.10558 1.43438 7.10507C1.19278 7.10507 0.954985 7.10457 0.721643 7.10457C0.320448 7.09396 0 6.83189 0 6.51074C0 6.34662 0.0839268 6.19817 0.218718 6.09061C0.349695 5.98659 0.528993 5.92044 0.728001 5.9169L1.23283 5.9164L2.706 5.91488L17.4313 5.90479Z" fill="white"></path>
                            </svg>
                            </span>
                        </li>
                        <?php
                        }
                        wp_reset_postdata();
                        
                    ?>
            </ul>
        <?php endif;?>    


        <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Case_Study_Cat_Widget());



