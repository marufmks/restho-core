<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Testimonial_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_testimonial';
    }

    public function get_title()
    {
        return esc_html__('EG Testimonial', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-testimonial';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
			'corelaw_testimonial_content_section',
			[
				'label' => esc_html__( 'General Section', 'corelaw-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

       

       
    
        

        $repeater = new \Elementor\Repeater();

       
        $repeater->add_control(
			'corelaw_testimonial_statements_title',
			[
				'label' => esc_html__( 'Title', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Sebastian Ethan', 'corelaw-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
			]
		);
        $repeater->add_control(
			'corelaw_testimonial_statements_post',
			[
				'label' => esc_html__( 'Category', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Crime Case', 'corelaw-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
			]
		);
        $repeater->add_control(
			'corelaw_testimonial_statements_message',
			[
				'label' => esc_html__( 'Statement', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Curabitur magna nisi, egestas quis est in, corelaw pulvinar ipsumai ni
                Nunc sitaa amet do odiotadin gone interdum, maximus dolorbankon quis, ullamcorper lectus. Mauris vitaelai faucibus andijovan godmar
                libero. Curabitur eu convallis purus. Nunc accumsan diam in thelicol arcubl pellentesque odiotadin gone interdum, maximus dolorbankon quis, foxthure themego odio.', 'corelaw-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
			]
		);

     

        $repeater->add_control(
			'corelaw_testimonial_content__quote_image',
			[
				'label' => esc_html__( 'Quote Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'corelaw_testimonial_author_image',
			[
				'label' => esc_html__( 'Author Image', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

       

        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'corelaw_testimonial_statements_title' => esc_html__( 'Author ', 'corelaw-core' ),
						
					],
					
				],
				'title_field' => '{{{ corelaw_testimonial_statements_title }}}',
			]
		);

        

        $this->end_controls_section();

        $this->start_controls_section(
			'corelaw_testimonial_content_next_prev_icon_section',
			[
				'label' => esc_html__( 'Next/Prev Icon', 'corelaw-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'corelaw_testimonials_show_icon',
			[
				'label' => esc_html__( 'Show Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'corelaw-core' ),
				'label_off' => esc_html__( 'Hide', 'corelaw-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


       
        $this->add_control(
			'corelaw_testimonial_content_prev_icon',
			[
				'label' => esc_html__( 'Prev Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
                
				
			]
		);
       

        $this->add_control(
			'corelaw_testimonial_content_next_icon',
			[
				'label' => esc_html__( 'Next Icon', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
                
				
			]
		);
       

        $this->end_controls_section();

        // style controls section start

        $this->start_controls_section(
            'corelaw_testimonial_section_style_title',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_testimonial_section_title_color',
            [
                'label' => esc_html__('Color', 'corelaw-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi3-single .image .img-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'corelaw_testimonial_section_title_typography',
                'selector' => '{{WRAPPER}} .testi3-single .image .img-content h3',
            ]
        );

        $this->add_control(
            'corelaw_testimonial_section_title_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testi3-single .image .img-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'corelaw_testimonial_section_style_post',
            [
                'label' => esc_html__('Designation', 'corelaw-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_testimonial_section_designation_color',
            [
                'label' => esc_html__('Color', 'corelaw-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi3-single .image .img-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'corelaw_testimonial_section_designation_typography',
                'selector' => '{{WRAPPER}} .testi3-single .image .img-content span',
            ]
        );

        $this->add_control(
            'corelaw_testimonial_section_designation_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testi3-single .image .img-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'corelaw_testimonial_section_style_message',
            [
                'label' => esc_html__('Client Reviews', 'corelaw-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_testimonial_section_message_color',
            [
                'label' => esc_html__('Text Color', 'corelaw-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi3-single.sibling2 .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_testimonial_section_message_background_color',
            [
                'label' => esc_html__('Background Color', 'corelaw-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi3-single .content ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'corelaw_testimonial_section_message_typography',
                'selector' => '{{WRAPPER}} .testi3-single.sibling2 .content p',
            ]
        );

        $this->add_control(
            'corelaw_testimonial_section_message_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testi3-single.sibling2 .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

       

       
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data=$settings['list'];
        ?>
        <script>
            <?php if( is_admin() ) : ?>
                // testimonial-slider
                new Swiper(".testi1-slider", {
                    slidesPerView: 1,
                    speed: 1200,
                    autoplay: true,
                    spaceBetween: 25,
                    loop: true,
                    roundLengths: true,
                    navigation: {
                    nextEl: ".testi-prev1",
                    prevEl: ".testi-next1",
                    },
                    pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                    },
                    breakpoints: {
                    280: {
                        slidesPerView: 1,
                    },
                    480: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 1,
                    },
                    992: {
                        slidesPerView: 2,
                    },
                    1200: {
                        slidesPerView: 2,
                    },
                    },
                });

                // testimonial3-slider

                new Swiper(".testi3-slider", {
                slidesPerView: 1,
                speed: 1200,
                autoplay: true,
                effect: 'fade',
                crossFade: 'true',
                spaceBetween: 25,
                autoplay: 'true',
                loop: true,
                roundLengths: true,
                navigation: {
                    nextEl: '.testi3-prev',
                    prevEl: '.testi3-next',
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                },
                breakpoints: {
                    280:{
                        slidesPerView: 1
                        },
                    480:{
                    slidesPerView: 1
                    },
                    768:{
                    slidesPerView: 1
                    },
                    992:{ 
                    slidesPerView: 1
                    },
                    1200:{
                    slidesPerView: 1
                    },
                }
                });

                <?php endif ?>
        </script>
        
        <div class="testimonial-section ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="swiper testi3-slider">
                        <div class="swiper-wrapper">
                            <?php foreach($data as $key=> $item): ?>
                                <div class="swiper-slide">
                                    <div class="testi3-single sibling2">
                                        <div class="image">
                                            <?php if( !empty( $item['corelaw_testimonial_author_image']['url'] ) ) : ?>
                                                <img alt="<?php echo esc_attr__('Author image','corelaw-core') ?>" src="<?php echo esc_url($item['corelaw_testimonial_author_image']['url']) ?>" >
                                            <?php endif ?>
                                        <div class="img-content">
                                            <?php if( !empty( $item['corelaw_testimonial_statements_title'] ) ) : ?>
                                                <h3><?php echo esc_html($item['corelaw_testimonial_statements_title']) ?></h3>                            
                                            <?php endif ?>
                                            <?php if( !empty( $item['corelaw_testimonial_statements_post'] ) ) : ?>
                                                <span><?php echo esc_html($item['corelaw_testimonial_statements_post']) ?></span>                            
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <?php if( !empty( $item['corelaw_testimonial_content__quote_image']['url'] ) ) : ?>
                                            <img src="<?php echo esc_url($item['corelaw_testimonial_content__quote_image']['url']) ?>" class="testi3-quote" alt="<?php echo esc_attr__('Author image','corelaw-core') ?>">
                                        <?php endif ?>
                                        
                                        <?php if( !empty( $item['corelaw_testimonial_statements_message'] ) ) : ?>
                                                <p class="para"><?php echo esc_html($item['corelaw_testimonial_statements_message']) ?></p>                            
                                        <?php endif ?>
                                            <span class="ms-auto"><?php echo '0'.$key+1;?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                    <?php if ( 'yes' === $settings['corelaw_testimonials_show_icon'] ) :?>
                        <div class="slider-arrows testi3-arrows text-center d-lg-flex d-none flex-row justify-content-center align-items-center gap-5">
                            <div class="testi3-prev swiper-prev-arrow style-3" tabindex="0" role="button" aria-label="Previous slide"> 
                                <?php if( !empty( $settings['corelaw_testimonial_content_prev_icon']) ) : ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_testimonial_content_prev_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php endif ?>
                            </div>
                            <div class="testi3-next swiper-next-arrow style-3" tabindex="0" role="button" aria-label="Next slide"> 
                                <?php if( !empty( $settings['corelaw_testimonial_content_next_icon']) ) : ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $settings['corelaw_testimonial_content_next_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <?php 
        
    }


}

Plugin::instance()->widgets_manager->register(new Corelaw_Testimonial_Widget());


