<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_Case_Study_Tab_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_case_study_tab';
    }

    public function get_title()
    {
        return esc_html__('EG Case Study Tab', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-product-categories';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        
      
        //Content Section
        $this->start_controls_section(
            'restho_case_study_tab_top_title',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );

    
        $this->add_control(
            'restho_case_study_tab_top_title_control',
            [
                'label' => esc_html__( 'Heading Title', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'restho-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        
        
        $this->end_controls_section();  

        // ----------------------style------------------------------//

        //Top title Style
        $this->start_controls_section(
             'restho_case_study_tab_top_title_style',
             [
                'label' => esc_html__('Heading Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_tab_top_title_style_typ',
                'selector' => '{{WRAPPER}} .section-title2 h2',
        
            ]
        );
        
        $this->add_control(
            'restho_case_study_tab_top_title_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_case_study_tab_top_title_style_margin',
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

        //Button Style
        $this->start_controls_section(
             'restho_case_study_tab_top_btn_style',
             [
                'label' => esc_html__('Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_tab_top_btn_style_typ',
                'selector' => '{{WRAPPER}} .casestudy-gallery .button-group button',
        
            ]
        );
        
        $this->add_control(
            'restho_case_study_tab_top_btn_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-gallery .button-group button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_case_study_tab_top_btn_style_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .casestudy-gallery .button-group button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        
        $this->add_control(
            'restho_case_study_tab_top_btn_style_border_color',
            [
                'label' => esc_html__( 'Border Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-gallery .button-group' => 'border-bottom:2px solid {{VALUE}}',
                ],
            ]
        );
        
        $this->end_controls_section();


        //Category Style
        $this->start_controls_section(
             'restho_case_study_tab_cat_style',
             [
                'label' => esc_html__('Category', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_tab_cat_style_typ',
                'selector' => '{{WRAPPER}} .casestudy-single .text span',
        
            ]
        );
        
        $this->add_control(
            'restho_case_study_tab_cat_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .text span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_case_study_tab_cat_style_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .text span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        
        $this->add_control(
            'restho_case_study_tab_cat_style_border_color',
            [
                'label' => esc_html__( 'Border Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .text span::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        //Title Style
        $this->start_controls_section(
             'restho_case_study_tab_title_style',
             [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_tab_title_style_typ',
                'selector' => '{{WRAPPER}} .text h3 a',
        
            ]
        );
        
        $this->add_control(
            'restho_case_study_tab_title_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_case_study_tab_title_style_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .text h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        //Icon Style
        $this->start_controls_section(
             'restho_case_study_tab_icon_style',
             [
                'label' => esc_html__('Icon', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
     
        $this->add_control(
            'restho_case_study_tab_icon_style_color',
            [
                'label' => esc_html__( 'Icon Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .read-more span.btn-arrow i' => 'color: {{VALUE}}',
                ],
            ]
        );

     
        $this->add_control(
            'restho_case_study_tab_icon_border_color',
            [
                'label' => esc_html__( 'Border Color', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .read-more' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );

        
        $this->add_control(
            'restho_case_study_tab_icon_size',
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
                    '{{WRAPPER}} .casestudy-single .read-more span.btn-arrow i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        //Read more Style
        $this->start_controls_section(
             'restho_case_study_tab_read_more_style',
             [
                'label' => esc_html__('Read More Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_case_study_tab_read_more_style_typ',
                'selector' => '{{WRAPPER}} .casestudy-single .read-more span.btn-text',
        
            ]
        );
        
        $this->add_control(
            'restho_case_study_tab_read_more_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .casestudy-single .read-more span.btn-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
      
        ?>
        <?php if(is_admin()) :  ?>
        <script>
            ( function( $ ) {
                $(document).ready(function(){         
                var $grid = $(".grid").isotope({
                });
                $(".filter-button-group").on("click", "button", function () {
                    var filterValue = $(this).attr("data-filter");
                    $grid.isotope({ filter: filterValue });
                });
                });
            } )( jQuery );


        </script>
        <?php endif ?>
      
        <!-- Content -->
        <div class="casestudy-gallery" id="portfolio">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="section-title2 text-center">
                        <?php if( !empty( $settings['restho_case_study_tab_top_title_control'] ) ) :   ?>
                               <h2><?php echo $settings['restho_case_study_tab_top_title_control']?></h2>          
                        <?php endif ?>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="button-group filter-button-group d-flex flex-wrap flex-row justify-content-md-between justify-content-center gap-3 mb-60">
                            <button data-filter="*"><?php echo esc_html__("all","restho-core")?></button>
                            <?php
                                $portfolio_menus =  get_terms('egens-case-study-category');
                                foreach ($portfolio_menus as $portfolio_menu){
                            ?>
                                <button data-filter=".<?php echo $portfolio_menu->slug;?>"><?php echo $portfolio_menu->name;?> </button>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="grid row d-flex justify-content-center g-4">
                        <?php
                            $args = array(
                                'post_type' => 'egens-case-study',
                                'posts_per_page' => -1
                            );
                            $query = new \WP_Query($args);
                            while( $query -> have_posts() ) {
                                $query -> the_post();
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 
                               <?php
                                    $portfolio_items = get_the_terms(get_the_ID(), 'egens-case-study-category');
                                    foreach ($portfolio_items as $portfolio_item){
                                        echo $portfolio_item->slug.' ';
                                    }
                                ?>
                            ">
                                <div class="casestudy-single wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                    <?php the_post_thumbnail( '', array( 'class' => 'casestudy1' ) );?>
                                    <a href="<?php the_permalink()?>" class="read-more"><span class="btn-text"><?php echo esc_html__('Read more')?></span><span class="btn-arrow"><i class="bi bi-arrow-right"></i></span></a>
                                    <div class="text">
                                        <?php $post_terms = get_the_terms( get_the_ID(), 'egens-case-study-category' ); ?>
                                        <span><?php echo $post_terms[0]->name; ?></span>
                                        <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            wp_reset_postdata();
                        ?>  
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new restho_Case_Study_Tab_Widget());
