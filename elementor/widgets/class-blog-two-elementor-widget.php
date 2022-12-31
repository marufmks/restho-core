<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Blog_Two_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_blog_two';
    }

    public function get_title()
    {
        return esc_html__('EG Blog Two', 'restho-core');
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
			'restho_blog_two_column_selection',
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
            'restho_blog_two_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'restho-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'restho_blog_two_template_orderby',
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
            'restho_blog_two_template_order',
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
            'restho_blog_two_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_two_auth_border_line_color',
            [
                'label' => esc_html__( 'Author Border Line', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content .blog-meta a::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restho_blog_two_date_border_radius',
            [
                'label'      		=> __('Thumbnail Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .h2-blog-card .blog-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]

        );
        $this->end_controls_section();
        //Date
        $this->start_controls_section(
            'restho_blog_two_style_date',
            [
                'label' => esc_html__('Date', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'restho_blog_two_date_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-img .batch' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'restho_blog_two_date_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-img .batch a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_two_date_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-img .batch' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_two_date_typography',
                'selector' => '{{WRAPPER}} .h2-blog-card .blog-img .batch a, .h2-blog-card .blog-img .batch a span',
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
            'restho_blog_two_date_hvr_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-img:hover .batch a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_two_date_hvr_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-img:hover .batch' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tab();
        $this->end_controls_section();
        //Author
        $this->start_controls_section(
            'restho_blog_two_style_author',
            [
                'label' => esc_html__('Author Name', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_two_author_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content .blog-meta a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_two_author_hvr_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content .blog-meta a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_two_author_typography',
                'selector' => '{{WRAPPER}} .h2-blog-card .blog-content .blog-meta a',
            ],
        );
        $this->add_responsive_control(
            'restho_blog_two_author_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-blog-card .blog-content .blog-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_blog_two_author_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content .blog-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Title
        $this->start_controls_section(
            'restho_blog_two_style_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_two_title_color',
            [
                'label'     => esc_html__('Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_two_title_hvr_color',
            [
                'label'     => esc_html__('Hover Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_two_title_typography',
                'selector' => '{{WRAPPER}} .h2-blog-card .blog-content h3 a',
            ],
        );
        $this->add_responsive_control(
            'restho_blog_two_title_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-blog-card .blog-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_blog_two_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Read More Button
        $this->start_controls_section(
            'restho_blog_two_style_rd_more',
            [
                'label' => esc_html__('Read More Button', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_blog_two_rd_more_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content .read-more-btn a i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'restho_blog_two_rd_more_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content .read-more-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_blog_two_rd_more_typography',
                'selector' => '{{WRAPPER}} .h2-blog-card .blog-content .read-more-btn a',
            ],
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restho_blog_two_rd_more_border',
                'label' => esc_html__( 'Border', 'restho-core' ),
                'selector' => '{{WRAPPER}} .h2-blog-card .blog-content .read-more-btn a',
            ]
        );
        $this->add_responsive_control(
            'restho_blog_two_rd_more_border_radius',
            [
                'label'      		=> __('Border Radius', 'restho-core'),
                'type'       		=> Controls_Manager::DIMENSIONS,
                'size_units' 		=> ['px', '%'],
                'selectors'  		=> [
                    '{{WRAPPER}} .h2-blog-card .blog-content .read-more-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]

        );
        $this->add_responsive_control(
            'restho_blog_two_rd_more_padding',
            [
                'label'      => __('Padding', 'restho-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .h2-blog-card .blog-content .read-more-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',   
                ]
            ]
        );
        $this->add_responsive_control(
            'restho_blog_two_rd_more_margin',
            [
                'label' => esc_html__( 'Margin', 'restho-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .h2-blog-card .blog-content .read-more-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'posts_per_page' => $settings['restho_blog_two_posts_per_page'],
                'orderby'        => $settings['restho_blog_two_template_orderby'],
                'order'          => $settings['restho_blog_two_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish'
            )
        );

        ?>
            <div class="h2-blog-area">
                <div class="row g-4 justify-content-center">
                    <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                        <?php if( $settings['restho_blog_two_column_selection'] == 'column_two' ) : ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10">
                        <?php elseif ($settings['restho_blog_two_column_selection'] == 'column_three') : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                        <?php elseif ($settings['restho_blog_two_column_selection'] == 'column_four') : ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-10">
                        <?php endif ?>
                            <div class="h2-blog-card">
                                <div class="blog-img">
                                    <?php the_post_thumbnail('', array('class' => 'img-fluid')); ?>
                                    <div class="batch">
                                        <a href="<?php echo esc_url( home_url( get_the_date('Y/m/d') ) ) ?>"><span><?php echo get_the_date('j'); ?></span><br><?php echo get_the_date('M'); ?></a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <?php $author_url = get_author_posts_url(get_the_author_meta("ID")); ?>
                                            <a href="<?php echo esc_url($author_url) ?>"><?php echo esc_html__('By', 'restho') . ' ' . esc_html(get_the_author()); ?></a></a>
                                    </div>
                                    <h3><a href="<?php esc_url( the_permalink() ) ?>"><?php echo wp_kses(get_the_title(), wp_kses_allowed_html('post')) ?></a></h3>
                                    <div class="read-more-btn">
                                        <a href="<?php esc_url( the_permalink() ) ?>"><span><?php echo esc_attr('Read More','restho-core') ?></span><span><i class="bi bi-arrow-right"></i></span></a>
                                    </div>
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

Plugin::instance()->widgets_manager->register(new Restho_Blog_Two_Widget());
