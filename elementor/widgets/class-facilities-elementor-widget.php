<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Facilities_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_facilities';
    }

    public function get_title()
    {
        return esc_html__('EG Facilities', 'restho-core');
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
        //Content Section Start
        $this->start_controls_section(
            'restho_facilities_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
            ]
        );
        $this->add_control(
            'restho_facilities_title_icon_switcher',
            [
                'label' => esc_html__('Title Icon (Show/Hide)', 'restho-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'restho-core'),
                'label_off' => esc_html__('Hide', 'restho-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'restho_section_content_facilities',
            [
                'label' => esc_html__('Facilities', 'restho-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_facilities_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Curious about how to build your?', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_facilities_content_image',
            [
                'label' => esc_html__('Content Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'restho_facilities_content_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => esc_html__("Almost 300 peoples could eating in our restaurant. ", 'restho-core'),
                'placeholder' => esc_html__('Type your description here', 'restho-core'),
            ]
        );
        $repeater->add_control(
            'restho_facilities_content_overlay_description',
            [
                'label' => esc_html__('Overlay Description', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => esc_html__("Standard Parking Space", 'restho-core'),
                'placeholder' => esc_html__('Type your description here', 'restho-core'),
            ]
        );
        $repeater->add_control(
            'restho_facilities_content_ovl_image',
            [
                'label' => esc_html__('Overlay Image', 'restho-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );      
        $repeater->add_control(
            'restho_facilities_list',
            [
                'label' => esc_html__('Facilities List', 'restho-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Polvinar felis ut ullamcorp.', 'restho-core'),
                'placeholder' => esc_html__('Your facilities list here', 'restho-core'),
            ]
        );
        $this->add_control(
            'restho_facilities_content',
            [
                'label' => esc_html__('Facilities Content', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_facilities_title' => esc_html__('Our Capacity', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_facilities_title }}}',
            ]
        );
        $this->end_controls_section();
        //Content Section End

        //Start Style Section
        //General Style
        $this->start_controls_section(
            'restho_facilities_general_style_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]

        );
        $this->add_control(
            'restho_title_icon_color',
            [
                'label'     => esc_html__('Title Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities-card .icon svg path' => 'fill : {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_img_border_color',
            [
                'label'     => esc_html__('Image Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .facilities-img::after' => 'border:2px dashed {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Title
        $this->start_controls_section(
            'restho_facilities_style_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_facilities_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card > h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_facilities_title_typography',
                'selector' => '{{WRAPPER}} .h3-facilities .h3-facilities-card > h3',
            ],
        );
        $this->add_responsive_control(
            'restho_facilities_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card > h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_facilities_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card > h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Description
        $this->start_controls_section(
            'restho_facilities_style_desc',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_facilities_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_facilities_desc_typography',
                'selector' => '{{WRAPPER}} .h3-facilities .h3-facilities-card p',
            ],
        );
        $this->add_responsive_control(
            'restho_facilities_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_facilities_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Overlay Title
        $this->start_controls_section(
            'restho_facilities_style_ovl_title',
            [
                'label' => esc_html__('Overlay Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_facilities_ovl_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content > h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_facilities_ovl_title_typography',
                'selector' => '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content > h3',
            ],
        );
        $this->add_responsive_control(
            'restho_facilities_ovl_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content > h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_facilities_ovl_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content > h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Overlay Description
        $this->start_controls_section(
            'restho_facilities_style_ovl_desc',
            [
                'label' => esc_html__('Overlay Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_facilities_ovl_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content > p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_facilities_ovl_desc_typography',
                'selector' => '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content > p',
            ],
        );
        $this->add_responsive_control(
            'restho_facilities_ovl_desc_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_facilities_ovl_desc_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Facilities List
        $this->start_controls_section(
            'restho_facilities_style_lists',
            [
                'label' => esc_html__('Facilities List', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_facilities_lists_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content ul li' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content ul li::after' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_facilities_lists_typography',
                'selector' => '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content ul li',
            ],
        );
        $this->add_responsive_control(
            'restho_facilities_lists_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_facilities_lists_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card .overlay .overlay-content ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Facilities Card
        $this->start_controls_section(
            'restho_facilities_style_card',
            [
                'label' => esc_html__('Card', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_facilities_style_card_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .h3-facilities .h3-facilities-card',
            ]
        );
        $this->add_responsive_control(
            'restho_facilities_style_card_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .h3-facilities .h3-facilities-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );

        $this->end_controls_section();
        
 
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $Items = $settings['restho_facilities_content'];
        ?>
            <div class="h3-facilities">
                <div class="row justify-content-center g-4">
                    <?php foreach($Items as $Item): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-10">
                            <div class="h3-facilities-card text-center">
                                <?php if ($settings['restho_facilities_title_icon_switcher'] == 'yes') : ?>
                                    <div class="icon">
                                        <svg width="28" height="9" viewBox="0 0 28 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.21551 6.42846C7.21551 6.42846 7.18808 6.45129 7.13463 6.49528C7.08118 6.53927 7.00436 6.6067 6.89279 6.68372C6.67292 6.84019 6.33789 7.06166 5.85747 7.25086C5.61703 7.34264 5.34293 7.43093 5.03362 7.49394C4.7243 7.5562 4.37992 7.58649 4.00983 7.57462C3.64223 7.56289 3.23802 7.50064 2.84534 7.37841C2.42632 7.24736 2.03722 7.03852 1.65731 6.76454C1.28208 6.48889 0.93583 6.13819 0.649887 5.7196C0.505591 5.51077 0.386383 5.28017 0.280577 5.0383C0.234608 4.91455 0.182561 4.79141 0.147812 4.66112L0.11914 4.56401L0.111972 4.53965L0.108388 4.52748C0.111193 4.54407 0.100596 4.49156 0.100752 4.49262L0.0917141 4.44863L0.0552506 4.27176C-0.0516468 3.71223 -0.00147044 3.12378 0.188794 2.56653C0.277772 2.28493 0.417549 2.01871 0.57696 1.76224C0.666716 1.64092 0.745876 1.50956 0.850436 1.39738L1.00159 1.22341L1.16848 1.06206C1.61633 0.630995 2.19678 0.318808 2.82539 0.149548L2.88414 0.132652L2.89878 0.12839L2.93805 0.120323L2.96361 0.1153L3.06567 0.0952078L3.27043 0.0548715C3.43047 0.0347795 3.6106 0.0122521 3.77297 0.00372817C4.09242 -0.00677448 4.41483 0.00357596 4.72757 0.0519795C5.35571 0.140719 5.95783 0.323374 6.51569 0.565544C7.07589 0.805126 7.60305 1.08931 8.10949 1.38582C8.36177 1.53681 8.60611 1.68674 8.8534 1.84413C9.09353 1.99619 9.33413 2.14931 9.57691 2.30944C10.0618 2.62376 10.5278 2.94691 10.9921 3.2667C11.4563 3.58604 11.9114 3.90584 12.3598 4.22184C12.8092 4.53341 13.253 4.84119 13.6897 5.14378C14.5645 5.74213 15.4186 6.29984 16.2524 6.7857C16.4596 6.9096 16.6663 7.02711 16.872 7.13898C17.0747 7.2533 17.2843 7.3635 17.4819 7.46959C17.8795 7.68101 18.2605 7.85925 18.6378 7.96945C18.8262 8.02501 19.0132 8.06413 19.198 8.08605C19.2443 8.09046 19.2904 8.09503 19.3362 8.09944C19.3826 8.10081 19.4289 8.10218 19.4749 8.10355C19.5252 8.10507 19.5752 8.1066 19.6251 8.10812C19.6734 8.10919 19.7135 8.10523 19.7577 8.10416C20.1055 8.09488 20.4608 8.03171 20.7676 7.92988C21.0774 7.82561 21.3478 7.67949 21.5839 7.52256C21.8218 7.36517 22.0026 7.17491 22.1592 6.99621C22.4501 6.62207 22.5972 6.26102 22.6569 6.0082C22.6961 5.88308 22.703 5.78216 22.7191 5.7158C22.7315 5.64852 22.7379 5.61382 22.7379 5.61382C22.7379 5.61382 22.7379 5.64898 22.7381 5.71702C22.7339 5.78475 22.7476 5.88841 22.7279 6.02038C22.7195 6.08689 22.71 6.16132 22.6997 6.24306C22.684 6.32404 22.6595 6.41126 22.6365 6.50715C22.6147 6.60365 22.569 6.69985 22.5307 6.80762C22.4878 6.91325 22.4247 7.01782 22.3652 7.13289C22.2245 7.34858 22.0531 7.58603 21.8137 7.79669C21.5781 8.01009 21.2865 8.20371 20.9492 8.36292C20.6071 8.51848 20.2319 8.63356 19.7978 8.69368C19.7443 8.70068 19.6862 8.71073 19.6352 8.71514C19.5855 8.71819 19.5355 8.72138 19.4853 8.72443C19.4306 8.72732 19.3756 8.73036 19.3202 8.73326C19.2642 8.7328 19.2078 8.73219 19.1512 8.73173C18.9247 8.72473 18.6937 8.69703 18.464 8.6506C18.0036 8.55852 17.5535 8.39123 17.1166 8.20584C16.8963 8.11345 16.6839 8.01618 16.4623 7.91192C16.2407 7.81054 16.018 7.70369 15.7952 7.5906C14.9003 7.14279 13.9887 6.61811 13.0735 6.04564C12.1566 5.47469 11.2323 4.86143 10.3007 4.24147C9.83527 3.93218 9.36171 3.62425 8.89283 3.32059C8.66049 3.16944 8.41958 3.01799 8.17712 2.86669C7.94275 2.7192 7.69888 2.57292 7.46109 2.43106C6.51086 1.86772 5.53086 1.37836 4.5465 1.2228C4.30123 1.1785 4.05798 1.17013 3.8177 1.16983C3.70036 1.17302 3.60234 1.18231 3.48532 1.18931L3.27931 1.2231L3.17662 1.24L3.15091 1.24426C3.15855 1.24258 3.11585 1.25096 3.16478 1.24091L3.1545 1.24365L3.1132 1.25461C2.67143 1.36055 2.25366 1.56314 1.91832 1.85676C1.23299 2.42786 0.886277 3.32972 0.981175 4.12214L1.00486 4.30099L1.01078 4.34543C1.01218 4.35441 1.0033 4.30844 1.00813 4.33234L1.01031 4.34178L1.01452 4.36081L1.03151 4.43706C1.0499 4.53905 1.08496 4.63692 1.11254 4.73601C1.18204 4.93023 1.26338 5.11897 1.36264 5.29706C1.56132 5.65248 1.81937 5.96771 2.11108 6.22404C2.4006 6.47899 2.73189 6.68539 3.04822 6.82527C3.39057 6.97459 3.72233 7.06273 4.05159 7.11082C4.70778 7.20459 5.30569 7.1367 5.78065 7.02087C6.2553 6.8994 6.61807 6.74597 6.8543 6.62481C6.97382 6.56651 7.06373 6.51461 7.12388 6.48021C7.18434 6.44611 7.21551 6.42846 7.21551 6.42846Z" fill="#BF9444"/>
                                        <path d="M20.7841 2.57169C20.7841 2.57169 20.8115 2.54886 20.8648 2.50487C20.9184 2.46088 20.9951 2.39345 21.1067 2.31643C21.3265 2.15996 21.6616 1.93849 22.142 1.74929C22.3824 1.6575 22.6565 1.56937 22.9658 1.5062C23.2751 1.44395 23.6195 1.41366 23.9898 1.42553C24.3574 1.43725 24.7616 1.49951 25.1543 1.62173C25.5733 1.75279 25.9624 1.96162 26.3423 2.23561C26.7175 2.51126 27.0638 2.86196 27.3497 3.28054C27.494 3.48938 27.6134 3.71998 27.7192 3.96184C27.7652 4.08559 27.8172 4.20873 27.8519 4.33903L27.8808 4.43614L27.8879 4.46049L27.8915 4.47267C27.8887 4.45608 27.8993 4.50859 27.8992 4.50753L27.9082 4.55152L27.9447 4.72839C28.0516 5.28792 28.0014 5.87637 27.8111 6.43362C27.7221 6.71521 27.5824 6.98143 27.423 7.23791C27.333 7.35922 27.2539 7.49058 27.1493 7.60276L26.9982 7.77674L26.8313 7.93809C26.3834 8.36915 25.8028 8.68134 25.1744 8.8506L25.1156 8.86749L25.101 8.87176L25.0617 8.87967L25.0362 8.88469L24.9341 8.90479L24.7293 8.94512C24.5693 8.96521 24.3892 8.98774 24.2268 8.99627C23.9073 9.00677 23.5849 8.99642 23.2722 8.94817C22.644 8.85943 22.0419 8.67662 21.4841 8.4346C20.9239 8.19502 20.3967 7.91084 19.8903 7.61433C19.638 7.46318 19.3937 7.31341 19.1464 7.15602C18.9062 7.00396 18.6656 6.85068 18.4228 6.69071C17.9379 6.37639 17.472 6.05324 17.0076 5.73344C16.5434 5.4141 16.0884 5.0943 15.6398 4.77831C15.1904 4.46673 14.7466 4.15896 14.3099 3.85636C13.4351 3.25802 12.581 2.70031 11.7472 2.2146C11.54 2.0907 11.3333 1.97319 11.1276 1.86132C10.9249 1.747 10.7153 1.6368 10.5177 1.53071C10.1201 1.31929 9.73907 1.14105 9.36181 1.03085C9.17342 0.975288 8.98642 0.936169 8.80161 0.914251C8.75533 0.909836 8.70921 0.90527 8.66339 0.900856C8.61696 0.899486 8.57068 0.898116 8.52471 0.896746C8.47438 0.895224 8.4242 0.893702 8.37449 0.89218C8.32618 0.891114 8.28614 0.895072 8.24188 0.896137C7.89408 0.905422 7.53879 0.96859 7.23197 1.07042C6.92218 1.17469 6.65182 1.32081 6.41559 1.47774C6.17764 1.63513 5.99688 1.82539 5.84027 2.00409C5.54919 2.37823 5.40224 2.73928 5.34256 2.99195C5.30329 3.11707 5.29644 3.21798 5.28039 3.2845C5.26792 3.35178 5.26153 3.38648 5.26153 3.38648C5.26153 3.38648 5.26153 3.35132 5.26153 3.28328C5.26574 3.21555 5.25203 3.11189 5.27166 2.97992C5.28008 2.91341 5.28958 2.83897 5.29987 2.75724C5.31561 2.67626 5.34007 2.58904 5.36313 2.49315C5.38495 2.39665 5.43061 2.30045 5.46894 2.19268C5.51195 2.08705 5.5749 1.98248 5.63443 1.8674C5.77514 1.65172 5.94655 1.41442 6.1859 1.20361C6.42151 0.990205 6.71306 0.796591 7.05043 0.637377C7.39247 0.481816 7.7677 0.366743 8.20183 0.306619C8.25528 0.299617 8.31341 0.289571 8.36436 0.285157C8.41407 0.282113 8.46409 0.278917 8.51427 0.275872C8.56896 0.27298 8.62397 0.269936 8.67945 0.267044C8.73539 0.267501 8.7918 0.26811 8.84836 0.268566C9.07493 0.275568 9.30587 0.303271 9.53556 0.349695C9.99603 0.441632 10.4461 0.608913 10.883 0.794155C11.1032 0.886548 11.3156 0.983964 11.5373 1.08808C11.7589 1.18945 11.9816 1.2963 12.2044 1.4094C13.0993 1.85721 14.0109 2.38188 14.9261 2.95435C15.843 3.5253 16.7673 4.13856 17.6989 4.75852C18.1643 5.06782 18.6379 5.37574 19.1068 5.67941C19.3393 5.83071 19.58 5.98185 19.8225 6.1333C20.0569 6.2808 20.3007 6.42707 20.5385 6.56894C21.4887 7.13227 22.4687 7.62164 23.4531 7.7772C23.6984 7.82149 23.9416 7.82986 24.1819 7.83017C24.2992 7.82697 24.3973 7.81769 24.5143 7.81068L24.7203 7.77689L24.823 7.76L24.8487 7.75574C24.8411 7.75741 24.8838 7.74904 24.8348 7.75893L24.8451 7.75619L24.8864 7.74523C25.3282 7.63929 25.7459 7.4367 26.0813 7.14308C26.7666 6.57198 27.1133 5.67012 27.0184 4.87771L26.9947 4.69886L26.9888 4.65441C26.9874 4.64543 26.9963 4.6914 26.9915 4.6675L26.9893 4.65806L26.9851 4.63904L26.9683 4.56324C26.9499 4.46125 26.9148 4.36338 26.8872 4.26429C26.8177 4.07022 26.7362 3.88148 26.6371 3.70324C26.4384 3.34782 26.1804 3.03259 25.8887 2.77626C25.5992 2.52131 25.2679 2.31491 24.9515 2.17502C24.6092 2.0257 24.2774 1.93757 23.9482 1.88947C23.292 1.79571 22.6941 1.8636 22.2191 1.97943C21.7445 2.1009 21.3817 2.25433 21.1455 2.37549C21.0259 2.43394 20.936 2.48569 20.8759 2.52009C20.8153 2.55403 20.7841 2.57169 20.7841 2.57169Z" fill="#BF9444"/>
                                        </svg>
                                    </div>
                                <?php endif ?>
                                    <?php if (!empty($Item['restho_facilities_title'])) : ?>
                                        <h3><?php echo wp_kses($Item['restho_facilities_title'], wp_kses_allowed_html('post')) ?></h3>
                                    <?php endif ?>
                                    <?php if (!empty($Item['restho_facilities_content_image']['url'])) : ?>
                                        <div class="facilities-img">
                                            <img src="<?php echo esc_url($Item['restho_facilities_content_image']['url']) ?>" alt="<?php echo esc_attr__('facilities-img', 'restho') ?>">
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($Item['restho_facilities_content_description'])) : ?>
                                        <p><?php echo wp_kses($Item['restho_facilities_content_description'], wp_kses_allowed_html('post')) ?></p>
                                    <?php endif ?>
                                <div class="overlay">
                                    <?php if (!empty($Item['restho_facilities_content_ovl_image']['url'])) : ?>
                                        <div class="overlay-img">
                                            <img class="img-fluid" src="<?php echo esc_url($Item['restho_facilities_content_ovl_image']['url']) ?>" alt="<?php echo esc_attr__('overlay-img', 'restho') ?>">
                                        </div>
                                    <?php endif ?>
                                    <div class="overlay-content">
                                        <?php if (!empty($Item['restho_facilities_title'])) : ?>
                                            <h3><?php echo wp_kses($Item['restho_facilities_title'], wp_kses_allowed_html('post')) ?></h3>
                                        <?php endif ?>
                                        <?php if (!empty($Item['restho_facilities_content_overlay_description'])) : ?>
                                            <p><?php echo wp_kses($Item['restho_facilities_content_overlay_description'], wp_kses_allowed_html('post')) ?></p>
                                        <?php endif ?>
                                        <?php if (!empty($Item['restho_facilities_list'])) : ?>
                                            <?php echo wp_kses($Item['restho_facilities_list'], wp_kses_allowed_html('post')) ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Restho_Facilities_Widget());
