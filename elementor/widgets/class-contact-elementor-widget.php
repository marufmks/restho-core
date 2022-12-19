<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class restho_Contact_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_contact';
    }

    public function get_title()
    {
        return esc_html__('EG Contact', 'restho-core');
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
        //Content Section
        $this->start_controls_section(
            'restho_contact_content',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        $this->add_control(
			'restho_contact_content_style_selection',
			[
				'label'   => esc_html__('Contact Style', 'restho-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'style_1' => esc_html__('Style One', 'restho-core'),
					'style_2' => esc_html__('Style Two', 'restho-core'),
					'style_3' => esc_html__('Style Three', 'restho-core'),
					'style_4' => esc_html__('Style Four', 'restho-core'),
				],
				'default' => 'style_2',
			]
		);
        //Heading Title
        $this->add_control(
            'restho_contact_content_heading_title',
            [
                'label' => esc_html__('Heading Title', 'restho-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is Heading Title', 'restho-core'),
                'label_block' => true,
                'condition' => [
                    'restho_contact_content_style_selection' => 'style_3',
                ],
            ]
        );
        //Description
        $this->add_control(
            'restho_contact_content_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('This is Description ', 'restho-core'),
                'label_block' => true,
                'condition' => [
                    'restho_contact_content_style_selection' => 'style_3',
                ],
            ]
        );
        // Repeater start
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'restho_contact_content_item_title',
            [
                'label' => esc_html__( 'Title', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Address List', 'restho-core' ),
                'placeholder' => esc_html__( 'Type your item title here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_contact_content_item_description',
            [
                'label' => esc_html__( 'Description', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '168/170, Ave 01,Old York Drive Rich Mirpur, Dhaka, Bangladesh', 'restho-core' ),
                'placeholder' => esc_html__( 'Type your item description here', 'restho-core' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
			'address_icon',
			[
				'label' => esc_html__( 'Icon', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
        $this->add_control(
			'restho_contact_repeater_list',
			[
				'label' => esc_html__( 'Address List', 'restho-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'restho_contact_address_name' => esc_html__( 'Address List', 'restho-core' ),
					],

				],
				'title_field' => '{{{ restho_contact_content_item_title }}}',
			]
		);
        // Repeater end
        
        //Image
        $this->add_control(
            'restho_contact_content_image',
            [
                'label' => esc_html__( 'Image', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'restho_contact_content_style_selection' => 'style_1',
                ],
            ]
        );
        //Background
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'restho-core' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .contact-image-area',
                'condition' => [
                    'restho_contact_content_style_selection' => 'style_1',
                ],
			]
		);
        $this->end_controls_section();
        // End section

        //Heading Title Style
        $this->start_controls_section(
            'restho_contact_style_heading_title_section',
            [
                'label' => esc_html__('Heading Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_contact_content_style_selection' => 'style_3',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_contact_style_heading_title_typography',
                'selector' => '{{WRAPPER}} .contact-text h2',

            ]
        );
        $this->add_control(
            'restho_contact_style_heading_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-text h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_contact_style_heading_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .contact-text h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Heading Description Style
        $this->start_controls_section(
            'restho_contact_style_description_section',
            [
                'label' => esc_html__('Heading Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_contact_content_style_selection' => 'style_3',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_contact_style_description_typography',
                'selector' => '{{WRAPPER}} .contact-text p',

            ]
        );
        $this->add_control(
            'restho_contact_style_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_contact_style_description_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .contact-text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

         //Address Area Style
         $this->start_controls_section(
            'restho_contact_style_address_area_section',
            [
                'label' => esc_html__('Address Area', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'restho_contact_style_address_area_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .address-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .address-list.sibling3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_contact_style_address_area_padding',
            [
                'label' => esc_html__( 'Padding', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .address-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .address-list.sibling3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();     

        //Icon Style
        $this->start_controls_section(
            'restho_contact_style_address_list_section',
            [
                'label' => esc_html__('Icon', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
       
        $this->add_control(
            'restho_contact_style_address_list_icon_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_contact_style_address_list_icon_background',
            [
                'label'     => esc_html__('Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .address-list.sibling3 .icon' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .address-list li .icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'restho_contact_style_address_list_icon_hover_background',
            [
                'label'     => esc_html__('Hover Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .address-list.sibling3 li:hover .icon' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .address-list.sibling4 li:hover .icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'restho_contact_style_address_list_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px','rem' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} ul li svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'restho-core' ),
				'selector' => '{{WRAPPER}} .address-list.sibling2 .icon',
                
			]
		);
        $this->end_controls_section();

        //Icon Title
        $this->start_controls_section(
            'restho_contact_style_address_icon_title_section',
            [
                'label' => esc_html__('Icon Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_contact_style_icon_title_typography',
                'selector' => '{{WRAPPER}} .address-list.sibling3 .text h4',

            ]
        );

        $this->add_control(
            'restho_contact_style_icon_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .address-list.sibling3 .text h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_contact_style_icon_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .address-list.sibling3 .text h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Icon Description Style
        $this->start_controls_section(
            'restho_contact_style_address_icon_description_section',
            [
                'label' => esc_html__('Icon Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_contact_style_icon_description_typography',
                'selector' => '{{WRAPPER}} .address-list li .text p',

            ]
        );
        $this->add_control(
            'restho_contact_style_icon_description_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .address-list li .text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_contact_style_icon_description_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .address-list li .text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );     
        
        $this->end_controls_section();

       

    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $items = $settings['restho_contact_repeater_list'];
        ?>
                        

            <div class="address-area">
                <?php if($settings['restho_contact_content_style_selection']=='style_3' ) :?>
                    
                        <div class="contact-text text-lg-start text-center">  
                             <?php if( !empty( $settings['restho_contact_content_heading_title'] ) ) : ?>
                                <h2><?php echo $settings['restho_contact_content_heading_title'] ?></h2>
                            <?php endif ?> 
                            <?php if( !empty( $settings['restho_contact_content_description'] ) ) : ?> 
                                <p><?php echo $settings['restho_contact_content_description'] ?></p>
                             <?php endif ?>
                        </div>
                   
                <?php endif ?>
                <ul class="address-list <?php  if($settings['restho_contact_content_style_selection']=='style_2') echo 'sibling2';
                else if ($settings['restho_contact_content_style_selection']=='style_3') echo 'sibling4';
                else if ($settings['restho_contact_content_style_selection']=='style_4') echo 'sibling3';
                else echo ''; ?>">
                    <?php foreach ($items as $item): ?>
                        <li>
                            <?php if( !empty( $item['address_icon'] ) ) :   ?>
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['address_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </div>
                            <?php endif ?>
                            <div class="text">
                                <?php if( !empty( $item['restho_contact_content_item_title'] ) ) : ?>
                                    <h4><?php echo esc_html($item['restho_contact_content_item_title']) ?></h4>
                                <?php endif ?>
                                <?php if( !empty( $item['restho_contact_content_item_description'] ) ) : ?>
                                    <p><?php echo $item['restho_contact_content_item_description'] ?></p>
                                <?php endif ?>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
                <?php if( !empty( $settings['restho_contact_content_style_selection'] ) && ($settings['restho_contact_content_style_selection'] == 'style_1') )  : ?>
                    <?php if( !empty( $settings['restho_contact_content_image']['url'] ) ) : ?>
                        <div class="contact-image-area">
                            <img src="<?php echo esc_url( $settings['restho_contact_content_image']['url']) ?>" alt="<?php esc_attr__('contact-background-image','restho-core') ?>" class="contact-img wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
                        </div>
                    <?php endif ?>
                <?php endif ?>
            </div> 
        <?php 
    }
}

Plugin::instance()->widgets_manager->register(new restho_Contact_Widget());
