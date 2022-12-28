<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Blog_One_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_blog_one';
    }

    public function get_title()
    {
        return esc_html__('EG Blog One', 'restho-core');
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
			'restho_blog_one_column_selection',
			[
				'label'   => esc_html__('Column (Large Device)', 'restho-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'column_two'  => esc_html__('2', 'restho-core'),
					'column_three' => esc_html__('3', 'restho-core'),
					'column_four' => esc_html__('4', 'restho-core'),
				],
				'default' => 'column_three',
			]
		);


        $this->add_control(
            'restho_blog_one_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'restho-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'restho_blog_one_template_orderby',
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
            'restho_blog_one_template_order',
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
            'restho_blog_one_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'restho_blog_one_thumb_border_radius',
            [
                'label'      		=> __('Thumbnail Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .news-wrap .post-thum' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .news-wrap .post-thum img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->add_control(
            'restho_blog_one_auth_border_line_color',
            [
                'label' => esc_html__( 'Author Border Line', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .publisher::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
        //Title
        $this->start_controls_section(
            'restho_blog_one_style_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_one_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_one_title_hvr_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_one_title_typography',
                'selector' => '{{WRAPPER}} .news-wrap .news-content h3 a',
            ],
        );
        $this->add_responsive_control(
            'restho_blog_one_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .news-wrap .news-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_blog_one_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Date
        $this->start_controls_section(
            'restho_blog_one_style_date',
            [
                'label' => esc_html__('Date', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'restho_blog_one_date_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .news-wrap .post-thum .batch a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_blog_one_date_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .post-thum .batch a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_blog_one_date_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .news-wrap .post-thum .batch a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'restho_blog_one_date_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .post-thum .batch a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_one_date_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .post-thum .batch a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_one_date_typography',
                'selector' => '{{WRAPPER}} .news-wrap .post-thum .batch a',
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
            'restho_blog_one_date_hvr_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .post-thum .batch a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_one_date_hvr_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tab();
        $this->end_controls_section();
        //Author
        $this->start_controls_section(
            'restho_blog_one_style_author',
            [
                'label' => esc_html__('Author Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_one_author_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .publisher a svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_one_author_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .publisher a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_one_author_hvr_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .publisher a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_one_author_typography',
                'selector' => '{{WRAPPER}} .news-wrap .news-content .news-meta .publisher a',
            ],
        );
        $this->add_responsive_control(
            'restho_blog_one_author_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .publisher a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_blog_one_author_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .publisher a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Comment
        $this->start_controls_section(
            'restho_blog_one_style_comment',
            [
                'label' => esc_html__('Comment', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_one_comment_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .comment a svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_one_comment_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .comment a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_one_comment_hvr_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .comment a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_one_comment_typography',
                'selector' => '{{WRAPPER}} .news-wrap .news-content .news-meta .comment a',
            ],
        );
        $this->add_responsive_control(
            'restho_blog_one_comment_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .comment a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_blog_one_comment_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-wrap .news-content .news-meta .comment a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'post_type'      => 'post',
                'posts_per_page' => $settings['restho_blog_one_posts_per_page'],
                'orderby'        => $settings['restho_blog_one_template_orderby'],
                'order'          => $settings['restho_blog_one_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish'
            )
        );

        ?>
            <div class="recent-post-area">
                <div class="row g-4 justify-content-center">
                    <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                            <?php if( $settings['restho_blog_one_column_selection'] == 'column_two' ) : ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10">
                            <?php elseif ($settings['restho_blog_one_column_selection'] == 'column_three') : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                            <?php elseif ($settings['restho_blog_one_column_selection'] == 'column_four') : ?>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-10">
                            <?php endif ?>
                                <div class="news-wrap">
                                    <div class="post-thum">
                                        <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
                                        <div class="batch">
                                            <a class="primary-btn " href="<?php echo esc_url( home_url( get_the_date('Y/m/d') ) ) ?>"><?php echo get_the_date('F j, Y') ?></a>
                                        </div>
                                    </div>
                                    <div class="news-content">
                                        <div class="news-meta">
                                            <div class="publisher">
                                                <?php $author_url = get_author_posts_url(get_the_author_meta("ID")); ?>
                                                <a href="<?php echo esc_url($author_url) ?>">                                                  
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 0C5.88665 0.0269505 3.86744 0.878431 2.37295 2.37287C0.878459 3.86731 0.0269514 5.88646 0 7.99974C0.0098791 9.23083 0.303776 10.443 0.858809 11.542C1.41384 12.6409 2.21503 13.5969 3.2 14.3355V14.3995H3.28C4.63455 15.4375 6.29348 16 8 16C9.70652 16 11.3655 15.4375 12.72 14.3995H12.8V14.3355C13.785 13.5969 14.5862 12.6409 15.1412 11.542C15.6962 10.443 15.9901 9.23083 16 7.99974C15.973 5.88646 15.1215 3.86731 13.6271 2.37287C12.1326 0.878431 10.1134 0.0269505 8 0ZM4.856 13.5436C4.97279 13.0087 5.26892 12.5299 5.69527 12.1865C6.12161 11.8431 6.65255 11.6558 7.2 11.6556H8.8C9.34745 11.6558 9.87839 11.8431 10.3047 12.1865C10.7311 12.5299 11.0272 13.0087 11.144 13.5436C10.1911 14.1042 9.1056 14.3998 8 14.3998C6.8944 14.3998 5.80891 14.1042 4.856 13.5436ZM12.488 12.5116C12.1837 11.7844 11.6713 11.1633 11.0151 10.7263C10.359 10.2894 9.58834 10.0561 8.8 10.0557H7.2C6.41166 10.0561 5.64102 10.2894 4.98486 10.7263C4.32871 11.1633 3.8163 11.7844 3.512 12.5116C2.91253 11.922 2.43512 11.2201 2.10705 10.4459C1.77898 9.67174 1.60668 8.84052 1.6 7.99974C1.62075 6.30886 2.3017 4.69307 3.49746 3.49735C4.69322 2.30162 6.30906 1.6207 8 1.59995C9.69094 1.6207 11.3068 2.30162 12.5025 3.49735C13.6983 4.69307 14.3793 6.30886 14.4 7.99974C14.3933 8.84052 14.221 9.67174 13.8929 10.4459C13.5649 11.2201 13.0875 11.922 12.488 12.5116Z" fill="#BF9444"/>
                                                    <path d="M8.00016 3.20007C7.57724 3.19022 7.15671 3.26625 6.76402 3.42357C6.37132 3.58089 6.01462 3.81624 5.71549 4.11536C5.41635 4.41448 5.181 4.77117 5.02368 5.16386C4.86635 5.55654 4.79031 5.97705 4.80016 6.39996C4.79031 6.82287 4.86635 7.24339 5.02368 7.63607C5.181 8.02875 5.41635 8.38544 5.71549 8.68457C6.01462 8.98369 6.37132 9.21903 6.76402 9.37635C7.15671 9.53368 7.57724 9.60971 8.00016 9.59986C8.42309 9.60971 8.84362 9.53368 9.23631 9.37635C9.62901 9.21903 9.98571 8.98369 10.2848 8.68457C10.584 8.38544 10.8193 8.02875 10.9767 7.63607C11.134 7.24339 11.21 6.82287 11.2002 6.39996C11.21 5.97705 11.134 5.55654 10.9767 5.16386C10.8193 4.77117 10.584 4.41448 10.2848 4.11536C9.98571 3.81624 9.62901 3.58089 9.23631 3.42357C8.84362 3.26625 8.42309 3.19022 8.00016 3.20007ZM8.00016 7.99991C7.78732 8.0102 7.57469 7.97586 7.37591 7.8991C7.17713 7.82233 6.9966 7.70484 6.84592 7.55417C6.69525 7.4035 6.57775 7.22298 6.50098 7.0242C6.42422 6.82543 6.38988 6.6128 6.40016 6.39996C6.38988 6.18713 6.42422 5.9745 6.50098 5.77572C6.57775 5.57695 6.69525 5.39643 6.84592 5.24576C6.9966 5.09509 7.17713 4.9776 7.37591 4.90083C7.57469 4.82407 7.78732 4.78973 8.00016 4.80002C8.213 4.78973 8.42564 4.82407 8.62442 4.90083C8.8232 4.9776 9.00373 5.09509 9.15441 5.24576C9.30508 5.39643 9.42258 5.57695 9.49935 5.77572C9.57611 5.9745 9.61045 6.18713 9.60016 6.39996C9.61045 6.6128 9.57611 6.82543 9.49935 7.0242C9.42258 7.22298 9.30508 7.4035 9.15441 7.55417C9.00373 7.70484 8.8232 7.82233 8.62442 7.8991C8.42564 7.97586 8.213 8.0102 8.00016 7.99991Z" fill="#BF9444"/>
                                                    </svg>
                                                <?php echo esc_html__('By', 'restho') . ' ' . esc_html(get_the_author()); ?></a>
                                            </div>
                                            <div class="comment">
                                                <a href="<?php echo esc_url(get_comments_link()); ?>">                                                  
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.9998 7.1998C6.66255 7.1998 7.1998 6.66255 7.1998 5.9998C7.1998 5.33706 6.66255 4.7998 5.9998 4.7998C5.33706 4.7998 4.7998 5.33706 4.7998 5.9998C4.7998 6.66255 5.33706 7.1998 5.9998 7.1998Z" fill="#BF9444"/>
                                                    <path d="M9.9998 7.1998C10.6625 7.1998 11.1998 6.66255 11.1998 5.9998C11.1998 5.33706 10.6625 4.7998 9.9998 4.7998C9.33706 4.7998 8.7998 5.33706 8.7998 5.9998C8.7998 6.66255 9.33706 7.1998 9.9998 7.1998Z" fill="#BF9444"/>
                                                    <path d="M8 0C3.5888 0 0 2.8712 0 6.4C0 8.7264 1.5176 10.812 4 11.9472V16L8.272 12.7968C12.5576 12.6816 16 9.856 16 6.4C16 2.8712 12.4112 0 8 0ZM8 11.2H7.7336L5.6 12.8V10.8664L5.0872 10.6688C2.9368 9.8408 1.6 8.2048 1.6 6.4C1.6 3.7528 4.4712 1.6 8 1.6C11.5288 1.6 14.4 3.7528 14.4 6.4C14.4 9.0472 11.5288 11.2 8 11.2Z" fill="#BF9444"/>
                                                    </svg>
                                                <?php echo esc_html('Comments'). ' ' ?> <?php echo "(".get_comments_number().")" ?></a>
                                            </div>
                                        </div>
                                        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
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

        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Restho_Blog_One_Widget());
