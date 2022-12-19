<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Team_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_team';
    }

    public function get_title()
    {
        return esc_html__('EG Attorney', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'corelaw_team_content_section',
            [
                'label' => esc_html__('Attorneys', 'corelaw-core')
            ]
        );
        $this->add_control(
			'corelaw_attorneys_style_selection',
			[
				'label'   => esc_html__('Attorneys Design', 'corelaw-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'style_one' => esc_html__('Style One', 'corelaw-core'),
					'style_two' => esc_html__('Style Two', 'corelaw-core'),
                    'style_three' => esc_html__('Style Three', 'corelaw-core')
				],
				'default' => 'style_one',
			]
		);

        $this->end_controls_section();

        //Style Two Slider/non slider design

      
        // template section starts here //

        $this->start_controls_section(
            'corelaw_attorneys_design_two_slider_choose_section',
            [
                'label' => esc_html__('Slider ON/OFF', 'corelaw-core'),
                'condition' => [
                    'corelaw_attorneys_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
			'corelaw_attorneys_design_two_slider_choose_content',
			[
				'label' => esc_html__( 'Slider', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'slider_on' => esc_html__( 'Show', 'corelaw-core' ),
				'slider_off' => esc_html__( 'Hide', 'corelaw-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'corelaw_team_content_templates_section',
            [
                'label' => esc_html__('Templates', 'corelaw-core')
            ]
        );


        $this->add_control(
			'corelaw_attorneys_posts_per_page',
			[
				'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 4,
				'label_block' => false,
			]
		);
		$this->add_control(
			'corelaw_attorneys_template_order_by',
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
			'corelaw_attorneys_template_order',
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

        //styling section starts here

        //Title Style Start
        $this->start_controls_section(
            'corelaw_team_title_style_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_team_style_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_team_style_title_bar_color',
            [
                'label'     => esc_html__('Title Bar Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content h4::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_team_style_title_typography',
                'selector' => '{{WRAPPER}} .attorney-single .content h4',

            ]
        );
        $this->add_responsive_control(
            'corelaw_team_style_title_padding',
            [
                'label'      => __('Padding', 'corelaw-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .attorney-single .content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ]
            ]
        );
        $this->end_controls_section();

        //Designation Style
        $this->start_controls_section(
            'style_team_designation_section',
            [
                'label' => esc_html__('Designation', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_team_style_designation_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_team_style_designation_typography',
                'selector' => '{{WRAPPER}} .attorney-single .content p',

            ]
        );
        $this->add_responsive_control(
            'corelaw_team_style_designation_padding',
            [
                'label'      => __('Padding', 'corelaw-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .attorney-single .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ]
            ]
        );
        $this->end_controls_section();

         //Social Icon Style Start
        $this->start_controls_section(
            'corelaw_team_style_icon_section',
            [
                'label' => esc_html__('Social Icon', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'corelaw-core' ),
			]
		);
        $this->add_control(
            'corelaw_team_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content .social-list li a .bx' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .attorney-single.sibling2 .social-list2 li a .bx' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .attorney-single.sibling3 .social-list2 li a .bx' => 'color: {{VALUE}};',  
                ],
            ]
        );
        $this->add_control(
            'corelaw_team_style_icon_background',
            [
                'label'     => esc_html__('Icon Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content .social-list li a .bx' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .attorney-single.sibling2 .social-list2 li a .bx' => 'background: {{VALUE}};',
                    
                ],
                'condition' => [
                    'corelaw_attorneys_style_selection' => [ 'style_one', 'style_two' ],
                ],
            ]
        );
        $this->add_control(
            'corelaw_team_style_social_icon_background',
            [
                'label'     => esc_html__('Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content .social-list' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .attorney-single.sibling2 .social-list2' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .attorney-single.sibling3 .social-list2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_team_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'corelaw-core' ),
                'condition' => [
                    'corelaw_attorneys_style_selection' => [ 'style_two', 'style_three' ],
                ],
            ]
        );
        
        $this->add_control(
			'corelaw_team_style_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .attorney-single.sibling3 .social-list2 li:hover a .bx' => 'color: {{VALUE}}',              
				],
                'condition' => [
                    'corelaw_attorneys_style_selection' => 'style_three',
                ],
			]
		);

        $this->add_control(
			'corelaw_team_style_icon_hover_background_color',
			[
				'label' => esc_html__( 'Icon Background', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .attorney-single.sibling2 .social-list2 li:hover a .bx' => 'background: {{VALUE}}',  
				],
                'condition' => [
                    'corelaw_attorneys_style_selection' => 'style_two',
                ],
			]
		);

        $this->add_responsive_control(
            'corelaw_team_style_social_list_background_padding',
            [
                'label'      => __('Padding', 'corelaw-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .attorney-single .content .social-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ]
            ]
        );
        
        $this->end_controls_tab();
        $this->end_controls_tab();
        
        $this->end_controls_section();
        
        //Navigation icon Style
        $this->start_controls_section(
            'style_team_navigation_icon_section',
            [
                'label' => esc_html__('Navigation Icon', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_team_style_navigation_icon_color',
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
				'name' => 'corelaw_team_style_navigation_icon_border',
				'selector' => '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet-active',
			]
		);
        $this->end_controls_section();

        //Background Style
        $this->start_controls_section(
            'style_team_background_section',
            [
                'label' => esc_html__('Card', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'corelaw_team_style_border_radius',
			[
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .attorney-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
				'post_type'      => 'egens-attorneys',
				'posts_per_page' => $settings['corelaw_attorneys_posts_per_page'],
				'orderby'        => $settings['corelaw_attorneys_template_order_by'],
				'order'          => $settings['corelaw_attorneys_template_order'],
				'offset'         => 0,
				'post_status'    => 'publish'
			)
		);

        ?>
           
        <?php if( is_admin() ) : ?>
        <script>
            // service-slider1
            var swiper = new Swiper(".attorney-slider", {
            slidesPerView: 1,
            speed: 1200,
            spaceBetween: 15,
            // autoplay: true,
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
                slidesPerView: 4
                },
            }
            });
        </script>
        <?php endif ?>  
            
           
        <?php if($settings['corelaw_attorneys_style_selection']=='style_one' ) : ?>
            <div class="attorneys-section">
                <div class="swiper attorney-slider pb-65">
                    <div class="swiper-wrapper">
                        <?php
                            if ( $query ->have_posts() ) {
                            while( $query -> have_posts() ) {
                                $query -> the_post();
                                $designationn = get_post_meta( get_the_ID(), 'egens_attorneys_designation', true);
                            ?>
                            <div class="swiper-slide">
                                <div class="attorney-single">
                                    <?php the_post_thumbnail('',['class' => 'casestudy1']); ?>                                                
                                    <div class="content">
                                        <h4><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h4>
                                        <?php if( !empty( $designationn['project_d'] ) ) :   ?>
                                                <p><?php echo esc_html($designationn['project_d'])?></p>         
                                        <?php endif ?>
                                        <ul class="social-list gap-3">
                                            <?php
                                                $socialllist = get_post_meta( get_the_ID(), 'egens_attorneys_short_information', true);
                                                $socilas = $socialllist['egens_attorneys_opt_fieldset_8']['egens_attorneys_short_content_8'];
                                                foreach ($socilas as $socila) {
                                                    ?>
                                                    <?php if( !empty($socila['egens_attorneys_social_icon'] ) ) :   ?>
                                                        <li><a href="<?php echo esc_url($socila['egens_attorneys_social_link'])?>"><i class='<?php echo esc_html($socila['egens_attorneys_social_icon'])?>'></i></a></li>          
                                                    <?php endif ?>
                                                        
                                                    <?php
                                                }
                                                ?>
                                        </ul>
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

            <?php endif ?>

            <?php if($settings['corelaw_attorneys_style_selection']=='style_two' ) : ?>
                <div class="<?php echo $settings['corelaw_attorneys_design_two_slider_choose_content'] == 'yes' ? 'attorneys' : 'team' ?>-section">
                    <div class="<?php echo $settings['corelaw_attorneys_design_two_slider_choose_content'] == 'yes' ? 'swiper attorney-slider pb-65' : '' ?>">
                        <div class="<?php echo $settings['corelaw_attorneys_design_two_slider_choose_content'] == 'yes' ? 'swiper-wrapper' : 'row justify-content-center g-4' ?>">
                            <?php

                                if ( $query ->have_posts() ) {
                                while( $query -> have_posts() ) {
                                    $query -> the_post();
                                    $designationn = get_post_meta( get_the_ID(), 'egens_attorneys_designation', true);
                                ?>
                            
                                <div class="<?php echo $settings['corelaw_attorneys_design_two_slider_choose_content'] == 'yes' ? 'swiper-slide' : 'col-xl-3 col-lg-4 col-md-6 col-sm-10' ?>  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                    <div class="attorney-single sibling2">
                                        <?php the_post_thumbnail('',['class' => 'casestudy1']); ?>                                                
                                        <div class="content">
                                            <h4><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h4>
                                            <?php if( !empty( $designationn['project_d'] ) ) :   ?>
                                                    <p><?php echo esc_html($designationn['project_d'])?></p>         
                                            <?php endif ?>
                                        </div>
                                        
                                            <ul class="social-list2 gap-3">
                                                <?php
                                                    $socialllist = get_post_meta( get_the_ID(), 'egens_attorneys_short_information', true);
                                                    $socilas = $socialllist['egens_attorneys_opt_fieldset_8']['egens_attorneys_short_content_8'];
                                                    foreach ($socilas as $socila) {
                                                        ?>
                                                        <?php if( !empty($socila['egens_attorneys_social_icon'] ) ) :   ?>
                                                            <li><a href="<?php echo esc_url($socila['egens_attorneys_social_link'])?>"><i class='<?php echo esc_html($socila['egens_attorneys_social_icon'])?>'></i></a></li>          
                                                        <?php endif ?>
                                                            
                                                        <?php
                                                    }
                                                    
                                                    
                                                    ?>
                                            </ul>
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

            <?php endif ?>

            <?php if($settings['corelaw_attorneys_style_selection']=='style_three' ) : ?>
            
                <div class="attorneys-section">
                    <div class="swiper attorney-slider pb-65">
                        <div class="swiper-wrapper">
                            <?php
                                if ( $query ->have_posts() ) {
                                while( $query -> have_posts() ) {
                                    $query -> the_post();
                                    $designationn = get_post_meta( get_the_ID(), 'egens_attorneys_designation', true);
                                ?>
            
                                <div class="swiper-slide  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                    <div class="attorney-single sibling3">
                                        <?php the_post_thumbnail('',['class' => 'casestudy1']); ?>                                                
                                        <div class="content">
                                            <h4><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h4>
                                            <?php if( !empty( $designationn['project_d'] ) ) :   ?>
                                                    <p><?php echo esc_html($designationn['project_d'])?></p>         
                                            <?php endif ?>
                                        </div>
                                        <ul class="social-list2 gap-3">
                                                <?php
                                                    $socialllist = get_post_meta( get_the_ID(), 'egens_attorneys_short_information', true);
                                                    $socilas = $socialllist['egens_attorneys_opt_fieldset_8']['egens_attorneys_short_content_8'];
                                                    foreach ($socilas as $socila) {
                                                        ?>
                                                        <?php if( !empty($socila['egens_attorneys_social_icon'] ) ) :   ?>
                                                            <li><a href="<?php echo esc_url($socila['egens_attorneys_social_link'])?>"><i class='<?php echo esc_html($socila['egens_attorneys_social_icon'])?>'></i></a></li>          
                                                        <?php endif ?>
                                                            
                                                        <?php
                                                    }
                                                    
                                                    
                                                    ?>
                                            </ul>
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

            <?php endif ?>

        <?php 

    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Team_Widget());
