<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_chef_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_chef';
    }

    public function get_title()
    {
        return esc_html__('EG Chef', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'restho_chef_content_section',
            [
                'label' => esc_html__('chef', 'restho-core')
            ]
        );
        $this->add_control(
			'restho_chef_style_selection',
			[
				'label'   => esc_html__('Chef Design', 'restho-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'style_one' => esc_html__('Style One', 'restho-core'),
					'style_two' => esc_html__('Style Two', 'restho-core'),
                    'style_three' => esc_html__('Style Three', 'restho-core')
				],
				'default' => 'style_one',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'restho_chef_content_templates_section',
            [
                'label' => esc_html__('Templates', 'restho-core')
            ]
        );


        $this->add_control(
			'restho_chef_posts_per_page',
			[
				'label'       => esc_html__('Posts Per Page', 'restho-core'),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 4,
				'label_block' => false,
			]
		);
		$this->add_control(
			'restho_chef_template_order_by',
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
			'restho_chef_template_order',
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

        //styling section starts here

        //Title Style Start
        $this->start_controls_section(
            'restho_chef_title_style_section',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_chef_style_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_chef_style_title_bar_color',
            [
                'label'     => esc_html__('Title Bar Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content h4::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_chef_style_title_typography',
                'selector' => '{{WRAPPER}} .attorney-single .content h4',

            ]
        );
        $this->add_responsive_control(
            'restho_chef_style_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
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
            'style_chef_designation_section',
            [
                'label' => esc_html__('Designation', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_chef_style_designation_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_chef_style_designation_typography',
                'selector' => '{{WRAPPER}} .attorney-single .content p',

            ]
        );
        $this->add_responsive_control(
            'restho_chef_style_designation_padding',
            [
                'label'      => __('Padding', 'restho-core'),
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
            'restho_chef_style_icon_section',
            [
                'label' => esc_html__('Social Icon', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'restho-core' ),
			]
		);
        $this->add_control(
            'restho_chef_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content .social-list li a .bx' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .attorney-single.sibling2 .social-list2 li a .bx' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .attorney-single.sibling3 .social-list2 li a .bx' => 'color: {{VALUE}};',  
                ],
            ]
        );
        $this->add_control(
            'restho_chef_style_icon_background',
            [
                'label'     => esc_html__('Icon Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .attorney-single .content .social-list li a .bx' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .attorney-single.sibling2 .social-list2 li a .bx' => 'background: {{VALUE}};',
                    
                ],
                'condition' => [
                    'restho_chef_style_selection' => [ 'style_one', 'style_two' ],
                ],
            ]
        );
        $this->add_control(
            'restho_chef_style_social_icon_background',
            [
                'label'     => esc_html__('Background', 'restho-core'),
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
            'style_chef_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'restho-core' ),
                'condition' => [
                    'restho_chef_style_selection' => [ 'style_two', 'style_three' ],
                ],
            ]
        );
        
        $this->add_control(
			'restho_chef_style_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .attorney-single.sibling3 .social-list2 li:hover a .bx' => 'color: {{VALUE}}',              
				],
                'condition' => [
                    'restho_chef_style_selection' => 'style_three',
                ],
			]
		);

        $this->add_control(
			'restho_chef_style_icon_hover_background_color',
			[
				'label' => esc_html__( 'Icon Background', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .attorney-single.sibling2 .social-list2 li:hover a .bx' => 'background: {{VALUE}}',  
				],
                'condition' => [
                    'restho_chef_style_selection' => 'style_two',
                ],
			]
		);

        $this->add_responsive_control(
            'restho_chef_style_social_list_background_padding',
            [
                'label'      => __('Padding', 'restho-core'),
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
            'style_chef_navigation_icon_section',
            [
                'label' => esc_html__('Navigation Icon', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_chef_style_navigation_icon_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet-active::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'restho_chef_style_navigation_icon_border',
				'selector' => '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet-active',
			]
		);
        $this->end_controls_section();

        //Background Style
        $this->start_controls_section(
            'style_chef_background_section',
            [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'restho_chef_style_border_radius',
			[
				'label'      		=> __('Border Radius', 'restho-core'),
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
				'post_type'      => 'egens-chef',
				'posts_per_page' => $settings['restho_chef_posts_per_page'],
				'orderby'        => $settings['restho_chef_template_order_by'],
				'order'          => $settings['restho_chef_template_order'],
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
            
           
        <?php if($settings['restho_chef_style_selection']=='style_one' ) : ?>
            <div class="chef-section">
                <div class="swiper attorney-slider pb-65">
                    <div class="swiper-wrapper">
                        <?php
                            if ( $query ->have_posts() ) {
                            while( $query -> have_posts() ) {
                                $query -> the_post();
                                $designationn = get_post_meta( get_the_ID(), 'egens_chef_designation', true);
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
                                                $socialllist = get_post_meta( get_the_ID(), 'egens_chef_short_information', true);
                                                $socilas = $socialllist['egens_chef_opt_fieldset_8']['egens_chef_short_content_8'];
                                                foreach ($socilas as $socila) {
                                                    ?>
                                                    <?php if( !empty($socila['egens_chef_social_icon'] ) ) :   ?>
                                                        <li><a href="<?php echo esc_url($socila['egens_chef_social_link'])?>"><i class='<?php echo esc_html($socila['egens_chef_social_icon'])?>'></i></a></li>          
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

            <?php if($settings['restho_chef_style_selection']=='style_two' ) : ?>
                <div class="<?php echo $settings['restho_chef_design_two_slider_choose_content'] == 'yes' ? 'chef' : 'chef' ?>-section">
                    <div class="<?php echo $settings['restho_chef_design_two_slider_choose_content'] == 'yes' ? 'swiper attorney-slider pb-65' : '' ?>">
                        <div class="<?php echo $settings['restho_chef_design_two_slider_choose_content'] == 'yes' ? 'swiper-wrapper' : 'row justify-content-center g-4' ?>">
                            <?php

                                if ( $query ->have_posts() ) {
                                while( $query -> have_posts() ) {
                                    $query -> the_post();
                                    $designationn = get_post_meta( get_the_ID(), 'egens_chef_designation', true);
                                ?>
                            
                                <div class="<?php echo $settings['restho_chef_design_two_slider_choose_content'] == 'yes' ? 'swiper-slide' : 'col-xl-3 col-lg-4 col-md-6 col-sm-10' ?>  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
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
                                                    $socialllist = get_post_meta( get_the_ID(), 'egens_chef_short_information', true);
                                                    $socilas = $socialllist['egens_chef_opt_fieldset_8']['egens_chef_short_content_8'];
                                                    foreach ($socilas as $socila) {
                                                        ?>
                                                        <?php if( !empty($socila['egens_chef_social_icon'] ) ) :   ?>
                                                            <li><a href="<?php echo esc_url($socila['egens_chef_social_link'])?>"><i class='<?php echo esc_html($socila['egens_chef_social_icon'])?>'></i></a></li>          
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

            <?php if($settings['restho_chef_style_selection']=='style_three' ) : ?>
            
                <div class="chef-section">
                    <div class="swiper attorney-slider pb-65">
                        <div class="swiper-wrapper">
                            <?php
                                if ( $query ->have_posts() ) {
                                while( $query -> have_posts() ) {
                                    $query -> the_post();
                                    $designationn = get_post_meta( get_the_ID(), 'egens_chef_designation', true);
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
                                                    $socialllist = get_post_meta( get_the_ID(), 'egens_chef_short_information', true);
                                                    $socilas = $socialllist['egens_chef_opt_fieldset_8']['egens_chef_short_content_8'];
                                                    foreach ($socilas as $socila) {
                                                        ?>
                                                        <?php if( !empty($socila['egens_chef_social_icon'] ) ) :   ?>
                                                            <li><a href="<?php echo esc_url($socila['egens_chef_social_link'])?>"><i class='<?php echo esc_html($socila['egens_chef_social_icon'])?>'></i></a></li>          
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

Plugin::instance()->widgets_manager->register(new restho_chef_Widget());
