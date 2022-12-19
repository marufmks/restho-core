<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_Single_Attorney_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_single_attorney';
    }

    public function get_title()
    {
        return esc_html__('EG Single Attorney', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-lock-user';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {

        //general Section
        $this->start_controls_section(
            'restho_single_attorney_general',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );


        $this->add_control(
			'restho_single_attorney_general_select',
			[
				'label' 			=> __('Select Attorney', 'restho-core'),
				'type' 				=> \Elementor\Controls_Manager::SELECT2,
				'label_block' 		=> true,
				'multiple'    		=> true,
				'options'     		=> egens_core()->get_post_list_by_post_type('egens-attorneys'),
			]
		);

      
        
        
        $this->end_controls_section();  

        // ----------------style --------------------//


        //Case title Style
        $this->start_controls_section(
             'restho_single_attorney_case_style',
             [
                'label' => esc_html__('Case TItle', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_single_attorney_case_style_typ',
                'selector' => '{{WRAPPER}} .title span',
        
            ]
        );
        
        $this->add_control(
            'restho_single_attorney_case_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_single_attorney_case_style_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

      
        $this->add_control(
            'restho_single_attorney_case_style_background',
            [
                'label' => esc_html__( 'Background', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();

        //Name Style
        $this->start_controls_section(
             'restho_single_attorney_name_style',
             [
                'label' => esc_html__('Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_single_attorney_name_style_typ',
                'selector' => '{{WRAPPER}} .title span',
        
            ]
        );
        
        $this->add_control(
            'restho_single_attorney_name_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_single_attorney_name_style_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        
        $this->end_controls_section();


        //Designation Style
        $this->start_controls_section(
             'restho_single_attorney_designation_style',
             [
                'label' => esc_html__('Designation', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_single_attorney_designation_style_typ',
                'selector' => '{{WRAPPER}} .title span',
        
            ]
        );
        
        $this->add_control(
            'restho_single_attorney_designation_style_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_single_attorney_designation_style_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();

        //Card Style
        $this->start_controls_section(
             'restho_single_attorney_card_style',
             [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
       
        $this->add_control(
            'restho_single_attorney_card_style_bac_color',
            [
                'label' => esc_html__( 'Background', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'background: {{VALUE}}',
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
				'post__in' => $settings['restho_single_attorney_general_select'],
				'post_status'    => 'publish',
                
			)
		);
       
        ?>
            <?php

                while( $query -> have_posts() ) {
                    $query -> the_post();
    
                ?>
                <!-- Content -->
                <div class="lawyer-intro-card">     
                    <div class="img-single-wrap">
                         <?php the_post_thumbnail( '', array( 'class' => 'img-fluid' ) );?>
                    </div>
                    <div class="designation">
                        <a href="<?php the_permalink(  )?>"><h4><?php the_title()?></h4></a>
                        <?php $designation = get_post_meta( get_the_ID(), 'egens_attorneys_designation', true);?>
                        <?php if( !empty( $designation['project_d'] ) ) :   ?>
                              <p><?php echo esc_html($designation['project_d'])?></p>               
                        <?php endif ?>  
                    </div>
                </div>
                <?php
                }
                wp_reset_postdata();   
            ?>
        <?php  
    }
}

Plugin::instance()->widgets_manager->register(new restho_Single_Attorney_Widget());
