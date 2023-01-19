<?php

//Post tags custom widget
class Egns_Footer_Logo extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            //Base ID of our widget
            'Egns_footer_logo',

            //Widget name
            __('Egns Footer Logo', 'restho-core'),

            //Widget description
            array('description' => __('Egens Footer Logo', 'restho-core'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
?>

        <div class="footer-widgetfooter-widget social-area">
            <div class="footer-logo text-center">
                <a href="<?php echo esc_url(site_url()) ?>">
                    <?php if (!empty($instance['footer_logo'])) : ?>
                        <img src="<?php echo  esc_url(__($instance['footer_logo'], 'restho-core')); ?>" alt="<?php echo esc_attr__('footer-logo', 'restho-core') ?>">
                    <?php endif; ?>
                </a>
                <?php if (!empty($instance['title'])) : ?>
                    <p><?php echo  esc_html(__($instance['title'], 'restho-core')); ?></p>
                <?php endif; ?>
                <span><img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/footer-shape.svg" alt="<?php echo esc_attr__('footer-logo', 'restho-core') ?>"></span>
            </div>
            <div class="footer-social">
                <ul class="social-link d-flex align-items-center justify-content-center">
                    <?php if (!empty($instance['facebook_url'])) : ?>
                        <li><a href="<?php echo  esc_url(__($instance['facebook_url'], 'restho-core')); ?>"><i class="bx bxl-facebook"></i></a></li>
                    <?php endif; ?>

                    <?php if (!empty($instance['instagram_url'])) : ?>
                        <li><a href="<?php echo  esc_url(__($instance['instagram_url'], 'restho-core')); ?>"><i class="bx bxl-instagram-alt"></i></a></li>
                    <?php endif; ?>

                    <?php if (!empty($instance['linkedin_url'])) : ?>
                        <li><a href="<?php echo  esc_url(__($instance['linkedin_url'], 'restho-core')); ?>"><i class="bx bxl-linkedin"></i></a></li>
                    <?php endif; ?>

                    <?php if (!empty($instance['twitter_url'])) : ?>
                        <li><a href="<?php echo  esc_url(__($instance['twitter_url'], 'restho-core')); ?>"><i class="bx bxl-twitter"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

    <?php
        echo $args['after_widget'];
    }

    //Widget Backend
    public function form($instance)
    {
        $footer_logo = '';
        if (isset($instance['footer_logo'])) {
            $footer_logo = $instance['footer_logo'];
        }

        $title = '';
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }

        $facebook_url = '';
        if (isset($instance['facebook_url'])) {
            $facebook_url = $instance['facebook_url'];
        }

        $instagram_url = '';
        if (isset($instance['instagram_url'])) {
            $instagram_url = $instance['instagram_url'];
        }

        $linkedin_url = '';
        if (isset($instance['linkedin_url'])) {
            $linkedin_url = $instance['linkedin_url'];
        }

        $twitter_url = '';
        if (isset($instance['twitter_url'])) {
            $twitter_url = $instance['twitter_url'];
        }





    ?>

        <p>
            <label for="<?php echo $this->get_field_id('footer_logo'); ?>"><?php _e('Input Logo URL:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('footer_logo'); ?>" name="<?php echo $this->get_field_name('footer_logo'); ?>" type="text" value="<?php echo esc_attr($footer_logo); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e('Facebook URL:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook_url'); ?>" name="<?php echo $this->get_field_name('facebook_url'); ?>" type="text" value="<?php echo esc_attr($facebook_url); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('instagram_url'); ?>"><?php _e('Instagram URL:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram_url'); ?>" name="<?php echo $this->get_field_name('instagram_url'); ?>" type="text" value="<?php echo esc_attr($instagram_url); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('linkedin_url'); ?>"><?php _e('Linkedin URL:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin_url'); ?>" name="<?php echo $this->get_field_name('linkedin_url'); ?>" type="text" value="<?php echo esc_attr($linkedin_url); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php _e('Twitter URL:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>" type="text" value="<?php echo esc_attr($twitter_url); ?>" />
        </p>





<?php
    }

    //Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['footer_logo'] = (!empty($new_instance['footer_logo'])) ? strip_tags($new_instance['footer_logo']) : '';

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        $instance['facebook_url'] = (!empty($new_instance['facebook_url'])) ? strip_tags($new_instance['facebook_url']) : '';

        $instance['twitter_url'] = (!empty($new_instance['twitter_url'])) ? strip_tags($new_instance['twitter_url']) : '';

        $instance['linkedin_url'] = (!empty($new_instance['linkedin_url'])) ? strip_tags($new_instance['linkedin_url']) : '';

        $instance['instagram_url'] = (!empty($new_instance['instagram_url'])) ? strip_tags($new_instance['instagram_url']) : '';


        return $instance;
    }
}
if (!function_exists('Egns_Footer_Logo')) {

    function Egns_Footer_Logo()
    {
        register_widget('Egns_Footer_Logo');
    }
    add_action('widgets_init', 'Egns_Footer_Logo');
}
