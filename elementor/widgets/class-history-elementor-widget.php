<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_History_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_history';
    }

    public function get_title()
    {
        return esc_html__('EG History', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-history';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'restho_history_content',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        // Repeater start
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'restho_history_content_year',
            [
                'label' => esc_html__( 'Year', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '2018', 'restho-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_history_content_title',
            [
                'label' => esc_html__( 'Title', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'We Are Started New At restho.', 'restho-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_history_content_description',
            [
                'label' => esc_html__( 'Description', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'In consequat tincidunt turpis sit amet imperdie Praesent
                    Class officelan nonatoureanor mauris consequat tincidunt turpis.', 'restho-core' ),
                'placeholder' => esc_html__( 'Type your description here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
			'restho_history_repeater_list',
			[
				'label' => esc_html__( 'History', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'restho_history_content_year' => esc_html__( 'History', 'restho-core' ),
					],

				],
				'title_field' => '{{{ restho_history_content_year }}}',
			]
		);
        // Repeater end

        $this->end_controls_section();

        //Year Style

        $this->start_controls_section(
            'restho_history_year_style_section',
            [
                'label' => esc_html__('Year', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'restho_history_style_year_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_history_style_year_typography',
                'selector' => '{{WRAPPER}} .history-card span',

            ]
        );
        $this->add_control(
            'restho_history_style_year_background',
            [
                'label'     => esc_html__('Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card span' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_history_style_year_content_color',
            [
                'label'     => esc_html__('Content Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card span::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'restho_history_style_year_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .history-card span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'restho_history_style_year_radius',
			[
			'restho_history_style_year_border_radius',
				'label'      		=> __('Border Radius', 'restho-core'),
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
				'label' => esc_html__( 'Hr Border', 'restho-core' ),
				'selector' => '{{WRAPPER}} .section-title-area hr',
			]
		);

        $this->end_controls_section();
       

        //Title Style
        $this->start_controls_section(
            'restho_history_title_style_section',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_history_style_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_history_style_title_typography',
                'selector' => '{{WRAPPER}} .history-card h3',

            ]
        );

        $this->add_control(
			'restho_history_style_title_margin',
			[
				'label' => esc_html__( 'Margin', 'restho-core' ),
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
            'restho_history_description_style_section',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_history_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .history-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_history_description_typography',
                'selector' => '{{WRAPPER}} .history-card p',

            ]
        );

        $this->add_control(
			'restho_history_description_margin',
			[
				'label' => esc_html__( 'Margin', 'restho-core' ),
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
        $items = $settings['restho_history_repeater_list'];
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
                                    <?php if( !empty( $item['restho_history_content_year'] ) ) : ?>  
                                        <span class="date-badge"><?php echo esc_html($item['restho_history_content_year']) ?></span>
                                    <?php endif ?>
                                    <?php if( !empty( $item['restho_history_content_title'] ) ) : ?>
                                        <h3><?php echo esc_html($item['restho_history_content_title']) ?></h3>
                                    <?php endif ?>
                                    <?php if( !empty( $item['restho_history_content_description'] ) ) : ?>
                                        <p><?php echo esc_html($item['restho_history_content_description']) ?></p>
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

Plugin::instance()->widgets_manager->register(new restho_History_Widget());
