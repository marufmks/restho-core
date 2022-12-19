<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Corelaw_History_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'corelaw_history';
    }

    public function get_title()
    {
        return esc_html__('EG History', 'corelaw-core');
    }

    public function get_icon()
    {
        return 'eicon-history';
    }

    public function get_categories()
    {
        return ['corelaw_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'corelaw_history_content',
            [
                'label' => esc_html__('General', 'corelaw-core')
            ]
        );
        // Repeater start
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'corelaw_history_content_year',
            [
                'label' => esc_html__( 'Year', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '2018', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'corelaw_history_content_title',
            [
                'label' => esc_html__( 'Title', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'We Are Started New At Corelaw.', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'corelaw_history_content_description',
            [
                'label' => esc_html__( 'Description', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'In consequat tincidunt turpis sit amet imperdie Praesent
                    Class officelan nonatoureanor mauris consequat tincidunt turpis.', 'corelaw-core' ),
                'placeholder' => esc_html__( 'Type your description here', 'corelaw-core' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
			'corelaw_history_repeater_list',
			[
				'label' => esc_html__( 'History', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'corelaw_history_content_year' => esc_html__( 'History', 'corelaw-core' ),
					],

				],
				'title_field' => '{{{ corelaw_history_content_year }}}',
			]
		);
        // Repeater end

        $this->end_controls_section();

        //Year Style

        $this->start_controls_section(
            'corelaw_history_year_style_section',
            [
                'label' => esc_html__('Year', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'corelaw_history_style_year_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_history_style_year_typography',
                'selector' => '{{WRAPPER}} .history-card span',

            ]
        );
        $this->add_control(
            'corelaw_history_style_year_background',
            [
                'label'     => esc_html__('Background', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card span' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'corelaw_history_style_year_content_color',
            [
                'label'     => esc_html__('Content Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card span::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'corelaw_history_style_year_margin',
            [
                'label' => esc_html__( 'Margin', 'corelaw-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .history-card span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'corelaw_history_style_year_radius',
			[
			'corelaw_history_style_year_border_radius',
				'label'      		=> __('Border Radius', 'corelaw-core'),
				'type'       		=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> ['px', '%'],
				'selectors'  		=> [
					'{{WRAPPER}} .history-card span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
          

			]

		);
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Hr Border', 'corelaw-core' ),
				'selector' => '{{WRAPPER}} .section-title-area hr',
			]
		);

        $this->end_controls_section();
       

        //Title Style
        $this->start_controls_section(
            'corelaw_history_title_style_section',
            [
                'label' => esc_html__('Title', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_history_style_title_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_history_style_title_typography',
                'selector' => '{{WRAPPER}} .history-card h3',

            ]
        );

        $this->add_control(
			'corelaw_history_style_title_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .history-card h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();


         //Description Style
         $this->start_controls_section(
            'corelaw_history_description_style_section',
            [
                'label' => esc_html__('Description', 'corelaw-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'corelaw_history_description_color',
            [
                'label'     => esc_html__('Color', 'corelaw-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'corelaw-core'),
                'name'     => 'corelaw_history_description_typography',
                'selector' => '{{WRAPPER}} .history-card p',

            ]
        );

        $this->add_control(
			'corelaw_history_description_margin',
			[
				'label' => esc_html__( 'Margin', 'corelaw-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .history-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();


    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $items = $settings['corelaw_history_repeater_list'];
        ?>
            <div class="history-section dark3-bg ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="section-title-area">
                            <hr class="m-0">
                        </div>
                    </div>
                    <div class="row justify-content-center padding-x g-4">
                        <?php foreach ($items as $item) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-10">
                                <div class="history-card">
                                    <?php if( !empty( $item['corelaw_history_content_year'] ) ) : ?>  
                                        <span class="date-badge"><?php echo esc_html($item['corelaw_history_content_year']) ?></span>
                                    <?php endif ?>
                                    <?php if( !empty( $item['corelaw_history_content_title'] ) ) : ?>
                                        <h3><?php echo esc_html($item['corelaw_history_content_title']) ?></h3>
                                    <?php endif ?>
                                    <?php if( !empty( $item['corelaw_history_content_description'] ) ) : ?>
                                        <p><?php echo esc_html($item['corelaw_history_content_description']) ?></p>
                                    <?php endif ?>                            
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        <?php 
        
    }
}

Plugin::instance()->widgets_manager->register(new Corelaw_History_Widget());
