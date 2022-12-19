<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_Info_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_info';
    }

    public function get_title()
    {
        return esc_html__('EG Info', 'corelaw-core');
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

        //Progress list start

        $this->start_controls_section(
            'corelaw_info_content_progress_section',
            [
                'label' => esc_html__('Progress Area', 'corelaw-core')
            ]
        );

         // Repeater for progress list start
         $repeater = new \Elementor\Repeater();
        
         $repeater->add_control(
             'corelaw_info_content_progress_title',
             [
                 'label' => esc_html__( 'Title', 'corelaw-core' ),
                 'type' => \Elementor\Controls_Manager::TEXT,
                 'default' => esc_html__( 'Case Win', 'corelaw-core' ),
                 'placeholder' => esc_html__( 'Type your item title here', 'corelaw-core' ),
                 'label_block' => true,
             ]
         );
         $repeater->add_control(
			'corelaw_info_content_progress_number',
			[
				'label' => esc_html__( 'Percentage Number', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 90,
			]
		);
        $this->add_control(
            'progress_repeater_list',
            [
                'label' => esc_html__( 'Progress List', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'corelaw_info_content_progress_title' => esc_html__( 'Progress List', 'corelaw-core' ),
                    ],

                ],
                'title_field' => '{{{ corelaw_info_content_progress_title }}}',
            ]
        );
        $this->end_controls_section();
        // Repeater end

        //Info Content Section
        $this->start_controls_section(
            'corelaw_info_content_section',
            [
                'label' => esc_html__('Info Content', 'corelaw-core')
            ]
        );
        
        $this->add_control(
            'corelaw_info_content_title',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Type your title here', 'corelaw-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'corelaw_info_content_description',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Type your Description here', 'corelaw-core'),
                'label_block' => true,
            ]
        );

        // Repeater for info list start
        $repeater2 = new \Elementor\Repeater();
        
        $repeater2->add_control(
            'corelaw_info_content_item_title',
            [
                'label' => esc_html__( 'Title', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Info List', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your item title here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );
        $repeater2->add_control(
            'corelaw_info_content_item_description',
            [
                'label' => esc_html__( 'Description', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your item description here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
			'info_repeater_list',
			[
				'label' => esc_html__( 'Info List', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'corelaw_info_address_name' => esc_html__( 'Info List', 'corelaw-core' ),
					],

				],
				'title_field' => '{{{ corelaw_info_content_item_title }}}',
			]
		);
        $this->end_controls_section();
        // Repeater end
        // End section

        // Video Play Button Started

        $this->start_controls_section(
            'corelaw_info_content_button',
            [
                'label' => esc_html__( 'Info Video', 'corelaw-core' ),
            ]
        );

        $this->add_control(
            'corelaw_info_content_button_link',
            [
                'label' => esc_html__( 'Link', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'corelaw-core' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => 'https://www.youtube.com/',
                    'is_external' => true,
                    'nofollow' => true,
                   
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //Background Started
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Background', 'corelaw-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'corelaw-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .info-section',
			]
		);

		$this->end_controls_section();

        //Background End
        
        // Progress Area Style Start
        $this->start_controls_section(
            'corelaw_info_style_progress_section',
            [
                'label' => esc_html__('Progress Area', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_info_style_progress_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progress-item h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_info_style_progress_title_typography',
                'selector' => '{{WRAPPER}} .progress-item h5',

            ]
        );

        //Progress Background Style
        $this->add_control(
            'corelaw_info_style_progress_background_color',
            [
                'label'     => esc_html__('Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progress-item' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'corelaw_info_style_progress_background_border_radius',
			[
			'corelaw_info_style_progress_background_border_radius',
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .progress-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]

		);
       
        $this->end_controls_section();

        //Progress bar Style
        $this->start_controls_section(
             'corelaw_info_style_section_progress_bar',
             [
                'label' => esc_html__('Progress Bar', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
       
        $this->add_control(
            'corelaw_info_style_section_progress_bar_active_color',
            [
                'label' => esc_html__( 'Active Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-progress path.blue' => 'stroke: {{VALUE}}',
                ],
            ]
        );

        
        $this->end_controls_section();
        // Progress Area Style End

        // Info Content Style
        $this->start_controls_section(
            'corelaw_info_style_section',
            [
                'label' => esc_html__('Info Content', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_info_style_title_color',
            [
                'label'     => esc_html__('Title Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-section .info-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'corelaw-core'),
                'name'     => 'corelaw_info_style_title_typography',
                'selector' => '{{WRAPPER}} .info-section .info-content h2',

            ]
        );
        $this->add_control(
			'corelaw_info_style_title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .info-section .info-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
            'corelaw_info_style_description_color',
            [
                'label'     => esc_html__('Description Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-section .info-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Description Typography', 'corelaw-core'),
                'name'     => 'corelaw_info_style_description_typography',
                'selector' => '{{WRAPPER}} .info-section .info-content p',

            ]
        );
        $this->add_control(
			'corelaw_info_style_description_margin',
			[
				'label' => esc_html__( 'Description Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .info-section .info-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();

        //Info list
        $this->start_controls_section(
            'corelaw_info_style_info_list_section',
            [
                'label' => esc_html__('Info List', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'corelaw_info_style_info_list_title_color',
            [
                'label'     => esc_html__('Title Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-section .info-list li h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'corelaw-core'),
                'name'     => 'corelaw_info_style_info_list_title_typography',
                'selector' => '{{WRAPPER}} .info-section .info-list li h4',

            ]
        );
        $this->add_control(
			'corelaw_info_style_info_list_title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .info-section .info-list li h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        //Description Style

        $this->add_control(
            'corelaw_info_style_info_list_description_color',
            [
                'label'     => esc_html__('Description Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-section .info-list li p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Description Typography', 'corelaw-core'),
                'name'     => 'corelaw_info_style_info_list_description_typography',
                'selector' => '{{WRAPPER}} .info-section .info-list li p',

            ]
        );
        $this->add_control(
			'corelaw_info_style_info_list_description_margin',
			[
				'label' => esc_html__( 'Description Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .info-section .info-list li p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();

        // Styles for Video Play Button
        $this->start_controls_section(
			'corelaw_info_style_play_button',
			[
				'label' 		=> esc_html__( 'Play Button', 'corelaw-core' ),
				'tab' 			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'corelaw_info_style_info_play_button_color',
            [
                'label' => esc_html__( 'Icon Color', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-section .video-play .video-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'corelaw_info_style_video_play_button_background_color',
            [
                'label' => esc_html__( 'Icon Background', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-section .video-play .video-icon::before, .info-section .video-play .video-icon::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data=$settings['progress_repeater_list'];
        $lists = $settings['info_repeater_list'];
        ?>
        <?php if( is_admin() ) : ?>
            <script>
            var countLenght = $(".progress-item").length;
            setTimeout(() => {
                for (var i = 0; i < countLenght; i++) {
                var indexNum = i + 2;
                var percentValue = $("#progress" + indexNum).attr("data-progress");
                $("#progress" + indexNum)
                    .find("#blue" + indexNum)
                    .animate({ "stroke-dashoffset": 198 * percentValue }, 2000);
                }
            }, 1600);
            </script>
        <?php endif ?>
            <div class="info-section">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-xl-2 col-lg-3 col-md-12 order-lg-1 order-3">
                            <div class="progress-area">
                                <?php foreach($data as $key=> $item): ?>
                                    <?php 
                                        $per=0;
                                        $per+=$item['corelaw_info_content_progress_number'];                                        
                                        $num=floatval($per);
                                        $val=0;
                                        $val+=((100-$num)/100);
                                    ?>
                                    <div id="progress<?php echo $key+2 ?>" data-progress="<?php echo $val ; ?>" class="progress-item single-progress mb-lg-4 mb-md-0 mb-4">
                                        <svg viewbox="0 0 110 100">
                                            <linearGradient id="gradient<?php echo $key+2 ?>" x1="0" y1="0" x2="0" y2="100%">
                                                <stop offset="0%" stop-color="#56c4fb" />
                                                <stop offset="100%" stop-color="#0baeff" />
                                            </linearGradient>
                                            <path class="grey" d="M30,90 A40,40 0 1,1 80,90" fill='none' />
                                            <path id="blue<?php echo $key+2 ?>" fill='none' class="blue" d="M30,90 A40,40 0 1,1 80,90" />
                                            <text x="50%" y="80%" dominant-baseline="middle" text-anchor="middle" style="font-size:18px;">
                                                <?php echo esc_html($item['corelaw_info_content_progress_number']) ?>%
                                            </text>
                                        </svg>
                                        <?php if( !empty( $item['corelaw_info_content_progress_title'] ) ) : ?>
                                            <h5><?php echo esc_html($item['corelaw_info_content_progress_title']) ?></h5>
                                        <?php endif ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-9 order-lg-2 order-1">
                            <div class="info-content">
                                <?php if( !empty( $settings['corelaw_info_content_title'] ) ) : ?>
                                    <h2><?php echo esc_html($settings['corelaw_info_content_title']) ?></h2>
                                <?php endif ?>
                                <?php if( !empty( $settings['corelaw_info_content_description'] ) ) : ?>
                                    <p><?php echo esc_html($settings['corelaw_info_content_description']) ?></p>
                                <?php endif ?>
                                <ul class="info-list">
                                    <?php foreach ($lists as $list): ?>
                                        <li>
                                            <?php if( !empty( $list['corelaw_info_content_item_title'] ) ) : ?>
                                                <h4><?php echo esc_html($list['corelaw_info_content_item_title']) ?></h4>
                                            <?php endif ?>
                                            <?php if( !empty( $list['corelaw_info_content_item_description'] ) ) : ?>
                                                <p><?php echo wp_kses( $list['corelaw_info_content_item_description'],wp_kses_allowed_html( 'post' ) ) ?></p>
                                            <?php endif ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-2 col-md-3 order-lg-3 order-2">
                            <?php if( !empty( $settings['corelaw_info_content_button_link']['url'] ) ) : ?>
                                <div class="info-video">
                                    <div class="video-play">
                                        <a href="<?php echo esc_url( $settings['corelaw_info_content_button_link']['url'] ) ?>" class="popup-youtube video-icon"><i class="bx bx-play"></i></a>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php  
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_Info_Widget());
