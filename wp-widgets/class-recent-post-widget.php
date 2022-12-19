<?php

//recent post custom widget

class Egns_Recent_Post_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_recent_post',

            // Widget name
            __('Egns Recent Post', 'egens-core'),

            // Widget description
            array('description' => __('Egens Recent Post', 'egens-core'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
?>

            <?php if( !empty( $title ) ): ?>
                <?php echo $args['before_title']. esc_attr( __( $title, 'egens-core' ) ).$args['after_title']; ?>
            <?php endif; ?>
 


            <?php
                $egensRecentPosts = new WP_Query( array(
                    'post_type'           =>'egens-case-study',
                    'posts_per_page'      => 3,
                    'orderby'             => "asc"
                ) );
            ?>
        <div class="footer-item">
            <ul class="recent-caselist">
                <?php
                    if ( $egensRecentPosts ->have_posts() ) {
                    while( $egensRecentPosts -> have_posts() ) {
                        $egensRecentPosts -> the_post();
                ?>
                    <li>
                        <div class="image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="text">
                           <?php $post_terms = get_the_terms( get_the_ID(), 'egens-case-study-category' ); ?>
                            <span><?php echo $post_terms[0]->name; ?></span>
                            <h5>
                                <a href="<?php esc_url( the_permalink() ); ?>"><?php esc_html__( the_title() ); ?></a>
                            </h5>
                        </div>
                    </li>
                <?php
                    }
                }
                    wp_reset_postdata();
                ?>
            </ul>
        </div>
    <?php
    echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $title = '';
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
    ?>
        <!--Title-->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'egens-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }

    // Updating widget replacing old instances with
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

if (!function_exists('Egns_Recent_Post_Widget')) {
    function Egns_Recent_Post_Widget()
    {
        register_widget('Egns_Recent_Post_Widget');
    }
    add_action('widgets_init', 'Egns_Recent_Post_Widget');
}
