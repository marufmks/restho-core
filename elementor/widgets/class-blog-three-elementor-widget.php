<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Blog_Three_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_blog_three';
    }

    public function get_title()
    {
        return esc_html__('EG Blog Three', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'restho_content_general_section',
            [
                'label' => esc_html__('General', 'restho-core')
            ]
        );
        $this->add_control(
            'restho_blog_three_template_orderby',
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
            'restho_blog_three_template_order',
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
        //Style Section Start
        //General
        $this->start_controls_section(
            'restho_blog_three_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_three_author_icon_color',
            [
                'label'     => esc_html__('Icon (Author/Comment)', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content .blog-meta ul li a svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_three_auth_border_line_color',
            [
                'label' => esc_html__( 'Author Border Line', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content .blog-meta ul li::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_blog_three_thumb_border_radius',
            [
                'label'      		=> __('Thumbnail Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .home3-blog-area .blog-card-alfa .blog-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->add_control(
            'restho_blog_three_date_border_color',
            [
                'label'     => esc_html__('Card Border Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .blog-card-alfa' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Date
        $this->start_controls_section(
            'restho_blog_three_style_date',
            [
                'label' => esc_html__('Date', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'restho_blog_three_date_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-img .batch a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_blog_three_date_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-img .batch' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_blog_three_date_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-img .batch a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->start_controls_tabs('_tab_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' 		=> __('Normal', 'restho-core'),
            ]
        );
        $this->add_control(
            'restho_blog_three_date_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-img .batch a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_three_date_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-img .batch a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_three_date_typography',
                'selector' => '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-img .batch a',
            ],
        );
        $this->end_controls_tab();

        //Hover start
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'restho-core' ),
            ]
        );
        $this->add_control(
            'restho_blog_three_date_hvr_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-img .batch a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_three_date_hvr_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-img .batch a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tab();
        $this->end_controls_section();
        //Author and Comment
        $this->start_controls_section(
            'restho_blog_three_style_author_cm',
            [
                'label' => esc_html__('Author and Comment', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_three_author_cm_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content .blog-meta ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_three_author_cm_hvr_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content .blog-meta ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_three_author_cm_typography',
                'selector' => '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content .blog-meta ul li a',
            ],
        );
        $this->add_responsive_control(
            'restho_blog_three_author_cm_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content .blog-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_blog_three_author_cm_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content .blog-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Title
        $this->start_controls_section(
            'restho_blog_three_style_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_three_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content h3 a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-blog-area .blog-card-alfa .blog-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_three_title_hvr_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content h3 a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-blog-area .blog-card-alfa .blog-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography Left Post', 'restho-core'),
                'name'     => 'restho_blog_three_title_lp_typography',
                'selector' => '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content h3 a',
            ],
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography Right Post', 'restho-core'),
                'name'     => 'restho_blog_three_title_rp_typography',
                'selector' => '{{WRAPPER}} .home3-blog-area .blog-card-alfa .blog-content h3 a',
            ],
        );
        $this->end_controls_section();
        //Description
        $this->start_controls_section(
            'restho_blog_three_style_desc',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_three_desc_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-blog-area .blog-card-alfa .blog-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography Left Post', 'restho-core'),
                'name'     => 'restho_blog_three_desc_rp_typography',
                'selector' => '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content p',
            ],
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography Right Post', 'restho-core'),
                'name'     => 'restho_blog_three_desc_rf_typography',
                'selector' => '{{WRAPPER}} .home3-blog-area .blog-card-alfa .blog-content p',
            ],
        );
        $this->end_controls_section();
        //Read More Button
        $this->start_controls_section(
            'restho_blog_three_style_rd_more',
            [
                'label' => esc_html__('Read More Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_three_rd_more_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content .continue-btn a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-blog-area .blog-card-alfa .blog-content .continue-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography Left Post', 'restho-core'),
                'name'     => 'restho_blog_three_rd_more_lp_typography',
                'selector' => '{{WRAPPER}} .home3-blog-area .h3-blog-wrap-1 .blog-content .continue-btn a',
            ],
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography Right Post', 'restho-core'),
                'name'     => 'restho_blog_three_rd_more_rp_typography',
                'selector' => '{{WRAPPER}} .home3-blog-area .blog-card-alfa .blog-content .continue-btn a',
            ],
        );
        $this->end_controls_section();

        
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        ?>
        <div class="home3-blog-area">
            <div class="row g-4 justify-content-center">
                <div class="col-xxl-6 col-xl-5 col-lg-9">
                <?php
                        $query = new \WP_Query(
                            array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'orderby'        => $settings['restho_blog_three_template_orderby'],
                                'order'          => $settings['restho_blog_three_template_order'],
                                'offset'         => 0,
                                'post_status'    => 'publish'
                            )
                        );

                        $post_data = array();
                        while ($query->have_posts()) {
                            $query->the_post();
                            $post_data[] = array(
                                "title" => get_the_title(),
                                "exercpt" => get_the_excerpt(),
                                "date" => get_the_date('F j, Y'),
                                "date_link" => home_url( get_the_date('Y/m/d') ),                                 
                                "thumbnail" => get_the_post_thumbnail_url(),
                                "author" => get_the_author_meta("display_name"),
                                "author_link" => get_author_posts_url(get_the_author_meta("ID")),
                                "permalink" => get_the_permalink(),
                                "comments" => get_comments_number(),
                                "comments_link" => get_comments_link(),
                            );
                        }
                        ?>
                    <div class="h3-blog-wrap-1">
                        <div class="blog-img">
                            <?php if (!empty($post_data[0]['thumbnail'])) :   ?>
                                <img class="img-fluid" src="<?php echo esc_url($post_data[0]['thumbnail'] ?? ''); ?>" alt="<?php echo esc_attr('blog-image') ?>">
                            <?php endif ?>
                            <?php if (!empty($post_data[0]['date'])) :   ?>
                                <div class="batch">
                                    <a href="<?php echo esc_url($post_data[0]['date_link'] ?? ''); ?>"><?php echo esc_html($post_data[0]['date'] ?? ''); ?></a>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li>
                                        <a href="<?php echo esc_url($post_data[0]['author_link'] ?? ''); ?>">                                              
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0C5.88665 0.0269505 3.86744 0.878431 2.37295 2.37287C0.878459 3.86731 0.0269514 5.88646 0 7.99974C0.0098791 9.23083 0.303776 10.443 0.858809 11.542C1.41384 12.6409 2.21503 13.5969 3.2 14.3355V14.3995H3.28C4.63455 15.4375 6.29348 16 8 16C9.70652 16 11.3655 15.4375 12.72 14.3995H12.8V14.3355C13.785 13.5969 14.5862 12.6409 15.1412 11.542C15.6962 10.443 15.9901 9.23083 16 7.99974C15.973 5.88646 15.1215 3.86731 13.6271 2.37287C12.1326 0.878431 10.1134 0.0269505 8 0ZM4.856 13.5436C4.97279 13.0087 5.26892 12.5299 5.69527 12.1865C6.12161 11.8431 6.65255 11.6558 7.2 11.6556H8.8C9.34745 11.6558 9.87839 11.8431 10.3047 12.1865C10.7311 12.5299 11.0272 13.0087 11.144 13.5436C10.1911 14.1042 9.1056 14.3998 8 14.3998C6.8944 14.3998 5.80891 14.1042 4.856 13.5436ZM12.488 12.5116C12.1837 11.7844 11.6713 11.1633 11.0151 10.7263C10.359 10.2894 9.58834 10.0561 8.8 10.0557H7.2C6.41166 10.0561 5.64102 10.2894 4.98486 10.7263C4.32871 11.1633 3.8163 11.7844 3.512 12.5116C2.91253 11.922 2.43512 11.2201 2.10705 10.4459C1.77898 9.67174 1.60668 8.84052 1.6 7.99974C1.62075 6.30886 2.3017 4.69307 3.49746 3.49735C4.69322 2.30162 6.30906 1.6207 8 1.59995C9.69094 1.6207 11.3068 2.30162 12.5025 3.49735C13.6983 4.69307 14.3793 6.30886 14.4 7.99974C14.3933 8.84052 14.221 9.67174 13.8929 10.4459C13.5649 11.2201 13.0875 11.922 12.488 12.5116Z" fill="#BF9444"/>
                                            <path d="M8.00016 3.20007C7.57724 3.19022 7.15671 3.26625 6.76402 3.42357C6.37132 3.58089 6.01462 3.81624 5.71549 4.11536C5.41635 4.41448 5.181 4.77117 5.02368 5.16386C4.86635 5.55654 4.79031 5.97705 4.80016 6.39996C4.79031 6.82287 4.86635 7.24339 5.02368 7.63607C5.181 8.02875 5.41635 8.38544 5.71549 8.68457C6.01462 8.98369 6.37132 9.21903 6.76402 9.37635C7.15671 9.53368 7.57724 9.60971 8.00016 9.59986C8.42309 9.60971 8.84362 9.53368 9.23631 9.37635C9.62901 9.21903 9.98571 8.98369 10.2848 8.68457C10.584 8.38544 10.8193 8.02875 10.9767 7.63607C11.134 7.24339 11.21 6.82287 11.2002 6.39996C11.21 5.97705 11.134 5.55654 10.9767 5.16386C10.8193 4.77117 10.584 4.41448 10.2848 4.11536C9.98571 3.81624 9.62901 3.58089 9.23631 3.42357C8.84362 3.26625 8.42309 3.19022 8.00016 3.20007ZM8.00016 7.99991C7.78732 8.0102 7.57469 7.97586 7.37591 7.8991C7.17713 7.82233 6.9966 7.70484 6.84592 7.55417C6.69525 7.4035 6.57775 7.22298 6.50098 7.0242C6.42422 6.82543 6.38988 6.6128 6.40016 6.39996C6.38988 6.18713 6.42422 5.9745 6.50098 5.77572C6.57775 5.57695 6.69525 5.39643 6.84592 5.24576C6.9966 5.09509 7.17713 4.9776 7.37591 4.90083C7.57469 4.82407 7.78732 4.78973 8.00016 4.80002C8.213 4.78973 8.42564 4.82407 8.62442 4.90083C8.8232 4.9776 9.00373 5.09509 9.15441 5.24576C9.30508 5.39643 9.42258 5.57695 9.49935 5.77572C9.57611 5.9745 9.61045 6.18713 9.60016 6.39996C9.61045 6.6128 9.57611 6.82543 9.49935 7.0242C9.42258 7.22298 9.30508 7.4035 9.15441 7.55417C9.00373 7.70484 8.8232 7.82233 8.62442 7.8991C8.42564 7.97586 8.213 8.0102 8.00016 7.99991Z" fill="#BF9444"/>
                                            </svg>
                                            <?php echo esc_html__('By', 'restho') . ' ' . esc_html($post_data[0]['author'] ?? ''); ?></a>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url($post_data[0]['comments_link'] ?? ''); ?>">                                                 
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.9998 7.1998C6.66255 7.1998 7.1998 6.66255 7.1998 5.9998C7.1998 5.33706 6.66255 4.7998 5.9998 4.7998C5.33706 4.7998 4.7998 5.33706 4.7998 5.9998C4.7998 6.66255 5.33706 7.1998 5.9998 7.1998Z" fill="#BF9444"/>
                                            <path d="M9.9998 7.1998C10.6625 7.1998 11.1998 6.66255 11.1998 5.9998C11.1998 5.33706 10.6625 4.7998 9.9998 4.7998C9.33706 4.7998 8.7998 5.33706 8.7998 5.9998C8.7998 6.66255 9.33706 7.1998 9.9998 7.1998Z" fill="#BF9444"/>
                                            <path d="M8 0C3.5888 0 0 2.8712 0 6.4C0 8.7264 1.5176 10.812 4 11.9472V16L8.272 12.7968C12.5576 12.6816 16 9.856 16 6.4C16 2.8712 12.4112 0 8 0ZM8 11.2H7.7336L5.6 12.8V10.8664L5.0872 10.6688C2.9368 9.8408 1.6 8.2048 1.6 6.4C1.6 3.7528 4.4712 1.6 8 1.6C11.5288 1.6 14.4 3.7528 14.4 6.4C14.4 9.0472 11.5288 11.2 8 11.2Z" fill="#BF9444"/>
                                            </svg>
                                            <?php echo esc_html('Comments'). ' ' ?> <?php echo "(".esc_html($post_data[0]['comments'] ?? '').")" ?></a>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <?php if (!empty($post_data[0]['title'])) :   ?>
                                <h3><a href="<?php echo esc_url($post_data[0]['permalink'] ?? ''); ?>"><?php echo wp_kses($post_data[0]['title'], wp_kses_allowed_html('post')) ?></a></h3>
                            <?php endif ?>
                            <?php if (!empty($post_data[0]['exercpt'])) :   ?>
                                <p><?php echo esc_html($post_data[0]['exercpt']); ?></p>
                            <?php endif ?>
                            <div class="continue-btn">
                                <a href="<?php echo esc_url($post_data[0]['permalink'] ?? ''); ?>"><?php echo esc_html__('Continue Reading', 'restho-core') ?> <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-7 col-lg-12">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-6 col-lg-6 col-sm-6 ">
                            <div class="blog-card-alfa one">
                                <div class="blog-content">
                                    <?php if (!empty($post_data[1]['title'])) :   ?>
                                        <h3><a href="<?php echo esc_url($post_data[1]['permalink'] ?? ''); ?>"><?php echo wp_kses($post_data[1]['title'], wp_kses_allowed_html('post')) ?></a></h3>
                                    <?php endif ?>
                                    <?php if (!empty($post_data[1]['exercpt'])) :   ?>
                                        <p><?php echo esc_html($post_data[1]['exercpt']); ?></p>
                                    <?php endif ?>
                                    <div class="continue-btn">
                                        <a href="<?php echo esc_url($post_data[1]['permalink'] ?? ''); ?>"><?php echo esc_html__('Continue Reading', 'restho-core') ?> <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                                <?php if (!empty($post_data[1]['thumbnail'])) :   ?>
                                    <div class="blog-img">
                                        <img src="<?php echo esc_url($post_data[1]['thumbnail'] ?? ''); ?>" alt="<?php echo esc_attr('blog-image') ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-6 col-lg-6 col-sm-6 ">
                            <div class="blog-card-alfa">
                                <?php if (!empty($post_data[2]['thumbnail'])) :   ?>
                                    <div class="blog-img">
                                        <img src="<?php echo esc_url($post_data[2]['thumbnail'] ?? ''); ?>" alt="<?php echo esc_attr('blog-image') ?>">
                                    </div>
                                <?php endif ?>
                                <div class="blog-content">
                                <?php if (!empty($post_data[2]['title'])) :   ?>
                                    <h3><a href="<?php echo esc_url($post_data[2]['permalink'] ?? ''); ?>"><?php echo wp_kses($post_data[2]['title'], wp_kses_allowed_html('post')) ?></a></h3>
                                <?php endif ?>
                                <?php if (!empty($post_data[2]['exercpt'])) :   ?>
                                    <p><?php echo esc_html($post_data[2]['exercpt']); ?></p>
                                <?php endif ?>
                                    <div class="continue-btn">
                                        <a href="<?php echo esc_url($post_data[2]['permalink'] ?? ''); ?>"><?php echo esc_html__('Continue Reading', 'restho-core') ?> <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Restho_Blog_Three_Widget());
