<?php

//Social Link Custom Widget

class Egns_Social_Link_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_social_link',

            // Widget name
            __('Egens Social Link', 'egens-core'),

            // Widget description
            array('description' => __('Egens Recent Post', 'egens-core'),)
        );
    }

    public function widget($args, $instance)
    {

        echo $args['before_widget'];
        ?>
            <ul class="footer-social gap-4">
                <?php if( !empty( $instance['facebook_url'] ) ): ?>
                    <li><a href="<?php echo  esc_url( __( $instance['facebook_url'], 'egens-core' ) ); ?>"><i class="bx bxl-facebook"></i></a></li>
                <?php endif; ?>
                <?php if( !empty( $instance['twitter_url'] ) ): ?>
                    <li><a href="<?php echo  esc_url( __( $instance['twitter_url'], 'egens-core' ) ); ?>"><i class="bx bxl-twitter"></i></a></li>
                <?php endif; ?>
                <?php if( !empty( $instance['linkedin_url'] ) ): ?>
                    <li><a href="<?php echo  esc_url( __( $instance['linkedin_url'], 'egens-core' ) ); ?>"><i class='bx bxl-linkedin'></i></a></li>
                <?php endif; ?>
                <?php if( !empty( $instance['instagram_url'] ) ): ?>
                    <li><a href="<?php echo  esc_url( __( $instance['instagram_url'], 'egens-core' ) ); ?>"><i class="bx bxl-instagram"></i></a></li>
                <?php endif; ?>
                <?php if( !empty( $instance['pinterest_url'] ) ): ?>
                    <li><a href="<?php echo  esc_url( __( $instance['pinterest_url'], 'egens-core' ) ); ?>"><i class="bx bxl-pinterest"></i></a></li>
                <?php endif; ?>
                <?php if( !empty( $instance['whatsapp_url'] ) ): ?>
                    <li><a href="<?php echo  esc_url( __( $instance['whatsapp_url'], 'egens-core' ) ); ?>"><i class='bx bxl-whatsapp' ></i></a></li>
                <?php endif; ?>
                <?php if( !empty( $instance['youtube_url'] ) ): ?>
                    <li><a href="<?php echo  esc_url( __( $instance['youtube_url'], 'egens-core' ) ); ?>"><i class='bx bxl-youtube' ></i></a></li>
                <?php endif; ?>
            </ul>
    <?php
    echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $instagram_url = '';
        if (isset($instance['instagram_url'])) {
            $instagram_url = $instance['instagram_url'];
        }
        $facebook_url = '';
        if (isset($instance['facebook_url'])) {
            $facebook_url = $instance['facebook_url'];
        }
        $twitter_url = '';
        if (isset($instance['twitter_url'])) {
            $twitter_url = $instance['twitter_url'];
        }
        $linkedin_url = '';
        if (isset($instance['linkedin_url'])) {
            $linkedin_url = $instance['linkedin_url'];
        }
        $whatsapp_url = '';
        if (isset($instance['whatsapp_url'])) {
            $whatsapp_url = $instance['whatsapp_url'];
        }
        $pinterest_url = '';
        if (isset($instance['pinterest_url'])) {
            $pinterest_url = $instance['pinterest_url'];
        }
        $youtube_url = '';
        if (isset($instance['youtube_url'])) {
            $youtube_url = $instance['youtube_url'];
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e('Facebook URL:', 'egens-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook_url'); ?>"
                   name="<?php echo $this->get_field_name('facebook_url'); ?>" type="text"
                   value="<?php echo esc_attr($facebook_url); ?>"/>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php _e('Twitter URL:', 'egens-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>"
                   name="<?php echo $this->get_field_name('twitter_url'); ?>" type="text"
                   value="<?php echo esc_attr($twitter_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin_url'); ?>"><?php _e('Linkedin URL:', 'egens-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin_url'); ?>"
                   name="<?php echo $this->get_field_name('linkedin_url'); ?>" type="text"
                   value="<?php echo esc_attr($linkedin_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram_url'); ?>"><?php _e('Instagram URL:', 'egens-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram_url'); ?>"
                   name="<?php echo $this->get_field_name('instagram_url'); ?>" type="text"
                   value="<?php echo esc_attr($instagram_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('pinterest_url'); ?>"><?php _e('Pinterest URL:', 'egens-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('pinterest_url'); ?>"
                   name="<?php echo $this->get_field_name('pinterest_url'); ?>" type="text"
                   value="<?php echo esc_attr($pinterest_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('whatsapp_url'); ?>"><?php _e('Whatsapp URL:', 'egens-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('whatsapp_url'); ?>"
                   name="<?php echo $this->get_field_name('whatsapp_url'); ?>" type="text"
                   value="<?php echo esc_attr($whatsapp_url); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube_url'); ?>"><?php _e('Youtube URL:', 'egens-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube_url'); ?>"
                   name="<?php echo $this->get_field_name('youtube_url'); ?>" type="text"
                   value="<?php echo esc_attr($youtube_url); ?>"/>
        </p>
        <?php 

    ?>
<?php
    }

    // Updating widget replacing old instances with
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['instagram_url'] = (!empty($new_instance['instagram_url'])) ? strip_tags($new_instance['instagram_url']) : '';
        $instance['facebook_url'] = (!empty($new_instance['facebook_url'])) ? strip_tags($new_instance['facebook_url']) : '';
        $instance['twitter_url'] = (!empty($new_instance['twitter_url'])) ? strip_tags($new_instance['twitter_url']) : '';
        $instance['linkedin_url'] = (!empty($new_instance['linkedin_url'])) ? strip_tags($new_instance['linkedin_url']) : '';
        $instance['whatsapp_url'] = (!empty($new_instance['whatsapp_url'])) ? strip_tags($new_instance['whatsapp_url']) : '';
        $instance['pinterest_url'] = (!empty($new_instance['pinterest_url'])) ? strip_tags($new_instance['pinterest_url']) : '';
        $instance['youtube_url'] = (!empty($new_instance['youtube_url'])) ? strip_tags($new_instance['youtube_url']) : '';
        return $instance;
    }
}

if (!function_exists('Egns_Social_Link_Widget')) {
    function Egns_Social_Link_Widget()
    {
        register_widget('Egns_Social_Link_Widget');
    }
    add_action('widgets_init', 'Egns_Social_Link_Widget');
}
