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
                'label' => esc_html__('General', 'restho-core')
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
                'label' => esc_html__('Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_chef_style_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-content h3 a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .best-chef-wrap .Chef-content h3 a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_chef_style_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-content h3 a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .best-chef-wrap .Chef-content h3 a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
     
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_chef_style_title_typography',
                'selector' => '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-content h3 a,
                .best-chef-wrap .Chef-content h3 a,.home3-chef .cooking-expart-wrap .exparts-content h3 a',

            ]
        );
        $this->add_responsive_control(
            'restho_chef_style_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-content h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .best-chef-wrap .Chef-content h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-content h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .best-chef-wrap .Chef-content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_chef_style_designation_typography',
                'selector' => '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-content p,
                .best-chef-wrap .Chef-content p,.home3-chef .cooking-expart-wrap .exparts-content p',

            ]
        );
        $this->add_responsive_control(
            'restho_chef_style_designation_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .best-chef-wrap .Chef-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                'label' => esc_html__('Normal', 'restho-core'),
            ]
        );
      
        $this->add_control(
            'restho_chef_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-img .social-area ul li a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .best-chef-wrap .Chef-content ul li a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-img .social-area ul li a i' => 'color: {{VALUE}};',
                    
                ],
            ]
        );
       
        $this->add_control(
            'restho_chef_style_social_icon_background',
            [
                'label'     => esc_html__('Background', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-img .social-area ul li a' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .best-chef-wrap .Chef-content ul li a' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-img .social-area ul li a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_chef_style_share_icon_color',
            [
                'label'     => esc_html__('Share Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-img .social-area .share-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-img .social-area .share-icon i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'restho_chef_style_selection' => [ 'style_one','style_three' ],
                ],
            ]
        );
        $this->add_control(
            'restho_chef_style_share_icon_background_color',
            [
                'label'     => esc_html__('Share Icon Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-img .social-area .share-icon' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-img .social-area .share-icon' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'restho_chef_style_selection' => [ 'style_one','style_three' ],
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_chef_hover_tab',
            [
                'label' => esc_html__('Hover', 'restho-core'),
                
            ]
        );

        $this->add_control(
            'restho_chef_style_icon_hover_color',
            [
                'label' => esc_html__('Icon Color', 'restho-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-img .social-area ul li a i:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .best-chef-wrap .Chef-content ul li:hover a i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-img .social-area ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .best-chef-wrap .Chef-content ul li:hover::after' => 'background-color: {{VALUE}};',
                ],
               
            ]
        );

        $this->add_control(
            'restho_chef_style_share_icon_hover_color',
            [
                'label'     => esc_html__('Share Icon Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-img:hover .share-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-img:hover .share-icon i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'restho_chef_style_selection' => [ 'style_one','style_three' ],
                ],
            ]
        );
        $this->add_control(
            'restho_chef_style_share_icon_background_hover_color',
            [
                'label'     => esc_html__('Share Icon Background Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-img:hover .share-icon' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .home3-chef .cooking-expart-wrap .exparts-img:hover .share-icon' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'restho_chef_style_selection' => [ 'style_one','style_three' ],
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tab();

        $this->end_controls_section();


        //Background Style
        $this->start_controls_section(
            'style_chef_card_background_section',
            [
                'label' => esc_html__('Card Section', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restho_chef_style_selection' => [ 'style_one', ],
                ],
            ]
        );
        $this->add_control(
            'restho_chef_style_card_overlay_color',
            [
                'label' => esc_html__('Image Overlay Color', 'restho-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cooking-expert-area .cooking-expart-wrap .exparts-img::before' => 'background-color: {{VALUE}}',
                    
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

        <?php if (is_admin()) : ?>
            <script>
                // Expart Slider
                var swiper = new Swiper(".expart-slider", {
                    slidesPerView: 3,
                    spaceBetween: 37,
                    // centeredSlides: true,
                    loop: true,
                    speed: 1500,
                    autoplay: {
                        delay: 1500,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                            spaceBetween: 15
                        },
                        480: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 25
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 25
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 25
                        },
                        1400: {
                            slidesPerView: 3
                        },
                        1600: {
                            slidesPerView: 3
                        },
                    }
                });
            </script>
        <?php endif ?>


        <?php if ($settings['restho_chef_style_selection'] == 'style_one') : ?>
            <div class="cooking-expert-area">
                <div class="container">
                    <div class="row">
                        <div class="swiper expart-slider">
                            <div class="swiper-wrapper">
                                <?php
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        $designationn = get_post_meta(get_the_ID(), 'egens_chef_designation', true);
                                ?>
                                        <div class="swiper-slide">
                                            <div class="cooking-expart-wrap">
                                                <div class="exparts-img">
                                                    <?php the_post_thumbnail() ?>
                                                    <div class="social-area">
                                                        <div class="share-icon">
                                                            <i class='bx bx-share-alt'></i>
                                                        </div>
                                                        <ul>
                                                            <?php
                                                            $socialllist = get_post_meta(get_the_ID(), 'egens_chef_short_information', true);
                                                            $socilas = $socialllist['egens_chef_opt_fieldset_8']['egens_chef_short_content_8'];
                                                            foreach ($socilas as $socila) {
                                                            ?>
                                                                <?php if (!empty($socila['egens_chef_social_icon'])) :   ?>
                                                                    <li><a href="<?php echo esc_url($socila['egens_chef_social_link']['url']) ?>"><i class='<?php echo esc_html($socila['egens_chef_social_icon']) ?>'></i></a></li>
                                                                <?php endif ?>

                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="exparts-content text-center">
                                                    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                                    <?php if (!empty($designationn['project_d'])) :   ?>
                                                        <p><?php echo esc_html($designationn['project_d']) ?></p>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['restho_chef_style_selection'] == 'style_two') : ?>
            <div class="h2-best-chef">
                <div class="container">
                    <div class="row g-4 justify-content-center">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $designationn = get_post_meta(get_the_ID(), 'egens_chef_designation', true);
                        ?>
                                <div class="col-lg-4 col-md-6 col-sm-10">
                                    <div class="best-chef-wrap">
                                        <div class="chef-img">
                                            <?php the_post_thumbnail() ?>
                                        </div>
                                        <div class="Chef-content text-center">
                                            <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                            <?php if (!empty($designationn['project_d'])) :   ?>
                                                <p><?php echo esc_html($designationn['project_d']) ?></p>
                                            <?php endif ?>
                                            <ul>
                                                <?php
                                                $socialllist = get_post_meta(get_the_ID(), 'egens_chef_short_information', true);
                                                $socilas = $socialllist['egens_chef_opt_fieldset_8']['egens_chef_short_content_8'];
                                                foreach ($socilas as $socila) {
                                                ?>
                                                    <?php if (!empty($socila['egens_chef_social_icon'])) :   ?>
                                                        <li><a href="<?php echo esc_url($socila['egens_chef_social_link']['url']) ?>"><i class='<?php echo esc_html($socila['egens_chef_social_icon']) ?>'></i></a></li>
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
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['restho_chef_style_selection'] == 'style_three') : ?>
            <div class="home3-chef">
                <div class="container">
                    <div class="row justify-content-center g-4">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $designationn = get_post_meta(get_the_ID(), 'egens_chef_designation', true);
                        ?>
                                <div class="col-lg-4 col-md-6 col-sm-10">
                                    <div class="cooking-expart-wrap">
                                        <div class="exparts-img">
                                            <?php the_post_thumbnail() ?>
                                            <div class="social-area">
                                                <div class="share-icon">
                                                    <i class="bi bi-plus-lg"></i>
                                                </div>
                                                <ul>
                                                    <?php
                                                    $socialllist = get_post_meta(get_the_ID(), 'egens_chef_short_information', true);
                                                    $socilas = $socialllist['egens_chef_opt_fieldset_8']['egens_chef_short_content_8'];
                                                    foreach ($socilas as $socila) {
                                                    ?>
                                                        <?php if (!empty($socila['egens_chef_social_icon'])) :   ?>
                                                            <li><a href="<?php echo esc_url($socila['egens_chef_social_link']['url']) ?>"><i class='<?php echo esc_html($socila['egens_chef_social_icon']) ?>'></i></a></li>
                                                        <?php endif ?>

                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="exparts-content text-center">
                                            <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                            <?php if (!empty($designationn['project_d'])) :   ?>
                                                <p><?php echo esc_html($designationn['project_d']) ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endif ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new restho_chef_Widget());
