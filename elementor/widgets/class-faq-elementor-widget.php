<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
} //Exit if accessed directly

use Elementor\Core\Schemes;

class restho_Faq_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_faq';
    }

    public function get_title()
    {
        return esc_html__('EG FAQ', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-featured-image';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {

        //-------------Content-------------------//
        //faq Section

        $this->start_controls_section(
            'restho_section_content_faq',
            [
                'label' => esc_html__('FAQ', 'restho-core')
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();
        // faq title
        $repeater->add_control(
            'restho_section_content_faq_title', [
                'label' => esc_html__( 'Title', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Vivamus gravida sapien ut gravida volutpat Sed? ' , 'restho-core' ),
                'label_block' => true,
            ]
        );

        // faq Control
        $repeater->add_control(
            'restho_section_content_faq_description',
            [
                'label' => esc_html__( 'Description', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html__( 'Donec scelerisque ut tellus at congue. Aenean viverra tincidunt velit, nec commodo Donec quis tellus eros. Nunc faucibus leo et pellentesque porta. Integer placerat ur molestie volutpat. Maecenas rutrum urna faucibus auctor hendrerit. Suspendisse si venenatis, venenatis nisi vel, malesuada justo. Vestibulum ultrices diam nibh, sit amlacus ornare a adonil gornara fitana.', 'restho-core' ),
                'placeholder' => esc_html__( 'Type your description here', 'restho-core' ),
            ]
        );
        
        $this->add_control(
            'restho_faq_section_list',
            [
                'label' => esc_html__( 'FAQ List', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_section_content_faq_title' => esc_html__( 'Vivamus gravida sapien ut gravida volutpat Sed? ', 'restho-core' ),
                    ],

                ],
                'title_field' => '{{{ restho_section_content_faq_title }}}',
            ]
        );
        
        $this->end_controls_section();
     
        //---------------Style----------------------//

        $this->start_controls_section(
			'restho_faq_style_title_typography',
			[
				'label' => esc_html__( 'Title Typography', 'restho-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'Title_Typography',
				'selector' => '{{WRAPPER}} .faq-wrap .accordion-button',
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'restho_faq_style_toggle_title_typography',
			[
				'label' => esc_html__( 'Description Typography', 'restho-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'Toggle_Title_Typography',
				'selector' => '{{WRAPPER}} .faq-wrap .faq-body',
			]
		);


        $this->end_controls_section();

        $this->start_controls_section(
			'restho_style_selection',
			[
				'label' => esc_html__( 'FAQ Style', 'restho-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'restho_style_tabs'
		);

		$this->start_controls_tab(
			'restho_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'restho-core' ),
			]
		);

		$this->add_control(
            'restho_title_text_color',
            [
                'label' => esc_html__('Title Color', 'restho-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'restho_title_background_color',
            [
                'label' => esc_html__('Title Background Color', 'restho-core'),
                'type' => Controls_Manager::COLOR,
                
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion-button' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'restho_toggle_title_text_color',
            [
                'label' => esc_html__('Toggle Title Color', 'restho-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .faq-body' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_toggle_title_background_color',
            [
                'label' => esc_html__('Toggle Title Background Color', 'restho-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .faq-body' => 'background: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'restho_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'restho-core' ),
			]
		);

		$this->add_control(
            'restho_title_text_hover_color',
            [
                'label' => esc_html__('Title Color', 'restho-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_title_background_hover_color',
            [
                'label' => esc_html__('Title Background Color', 'restho-core'),
                'type' => Controls_Manager::COLOR,
                
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion-button:hover' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'restho_toggle_title_text_hover_color',
            [
                'label' => esc_html__('Toggle Title Color', 'restho-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .faq-body:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_toggle_title_background_hover_color',
            [
                'label' => esc_html__('Toggle Title Background Color', 'restho-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .faq-body:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
        
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $faqlists = $settings['restho_faq_section_list'];
    ?>  

        <div class="faq-wrap wow fadeInRight"  data-wow-duration="1.5s" data-wow-delay=".2s">
            <?php if( !empty( $faqlists) ) :   ?>
                <?php foreach ($faqlists as $key => $item): ?>
                    <div class="faq-item hover-btn"><span></span>
                        <?php if( !empty( $item['restho_section_content_faq_title'] ) ) : ?>
                            <h5 id="heading<?php echo $key ; ?>" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key;?>" aria-controls="collapse<?php echo $key;?>">
                                <?php echo '0'.$key+1 .'. ' ; ?><?php echo esc_html($item['restho_section_content_faq_title']) ?>
                            </h5>                           
                        <?php endif ?>
                        
                        <div id="collapse<?php echo $key ;?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $key;?>">
                            <?php if( !empty( $item['restho_section_content_faq_description'] ) ) : ?>
                                <div class="faq-body">
                                    <?php echo esc_html($item['restho_section_content_faq_description']) ?>                    
                                </div>                          
                            <?php endif ?>    
                        </div>
                    </div>
                <?php endforeach; ?>          
            <?php endif ?>
        </div>

    <?php
    }
}

Plugin::instance()->widgets_manager->register(new restho_Faq_Widget());


